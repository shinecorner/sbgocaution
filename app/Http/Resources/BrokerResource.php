<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Carbon\Carbon;

class BrokerResource extends JsonResource
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
        $this->policyAndInvoiceStatusCounts($data);
        return $data;
    }

    private function policyAndInvoiceStatusCounts(&$data) 
    {
        $policies = $this->policies;
        $data['count_policies'] = $policies->count();
        $invoice_count = 0;
        $invoice_total = 0;
        foreach($policies as $policy) {
            foreach($policy->invoices as $invoice){
                $invoice_count++;
                $invoice_total += $invoice->computed_total;
            }
        }
        $data['count_invoices'] = $invoice_count;
        $data['invoice_total'] = format($invoice_total);
        if($policies->isNotEmpty()) {

            $policy_statuses = array_keys(getPolicyStatus());
            foreach($policy_statuses as $policy_status) {
                $count = $policies->where('status', $policy_status)->count();
                if($count > 0) {
                    $count_class = [
                        'count' => $count,
                        'class' => renderStatusClass($policy_status)
                    ];
                    $data['count_policy_by_status'][$policy_status] = $count_class;
                }
            }
            
        }
    }

}
