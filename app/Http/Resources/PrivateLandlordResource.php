<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Carbon\Carbon;
use App\PrivateLandlord;

class PrivateLandlordResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $data = parent::toArray($request); 
        $data['created_at_formatted'] = Carbon::parse($this->created_at)->format(config('crm.display_date_format'));
        $data['language_flag'] = get_language_flag($this->language);
        $this->invoiceStatusCountAndAmount($data);
        if ($this->is_duplicate) {
            $this->getPrivateLandlordDuplicate($data);
        }
        return $data;
    }

    private function invoiceStatusCountAndAmount(&$data) {
        $policies = $this->policies;
        $data['count_policies'] = $policies->count();
        $invoice_count = 0;
        $invoice_total = 0;
        foreach($policies as $policy) {
            foreach($policy->invoices as $invoice) {
                $invoice_count++;
                $invoice_total += $invoice->computed_total;
            }
        }
        $data['count_invoices'] = $invoice_count;
        $data['invoice_total'] = format($invoice_total);
        if($policies->isNotEmpty()) {
            $invoice_statuses = array_keys(getInvoiceStatus());
            $count_class['count'] = 0;
            foreach($invoice_statuses as $invoice_status) {
                foreach($policies as $policy) {
                    $count = $policy->invoices->where('status', $invoice_status)->count();
                    if($count > 0) {
                        if(isset($data['count_invoice_by_status'][$invoice_status])){
                            $count_class['count']++;
                        } else {
                            $count_class['count'] = $count;
                        }
                        $count_class['class'] = render_status_class($invoice_status);
                        $data['count_invoice_by_status'][$invoice_status] = $count_class;
                    }
                }
            }
        }
    }

    private function getPrivateLandlordDuplicate(&$data) 
    {
        $draws = PrivateLandlord::where('is_duplicate', '=', 0)
            ->where('first_name', '=', $this->first_name)
            ->where('last_name', '=', $this->last_name)
            ->where('zip', '=', $this->zip)
            ->where('id', '!=', $this->id)
            ->groupBy('id')
            ->orderBy('id', 'asc')->get();

        $data['duplicate'] = '';

        foreach ($draws as $key => $draw) {
            $data['duplicate'] .= "(" .$draw->number .") ";
            $data['duplicate'] .= $draw->first_name. " ";
            $data['duplicate'] .= $draw->last_name;
            $data['duplicate'] .= " - ". $draw->zip;
            if(($key+1) != count($draws))
                $data['duplicate'] .= "<br/>";
        }
    }

}
