<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Contact;
use App;

class ContactResource extends JsonResource
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

        $data['status'] = __('contact.status.' . $this->status);
        $data['status_class'] = "label-status-" . str_replace("_", "-", render_status_class($this->status));

        if($this->user_id && property_exists($this, 'username')) 
            $data['joomlauser'] = $this->username;
        else 
            $data['joomlauser'] = __('general.NO');

        $data['saluation_formatted'] = get_salutation($this->salutation);
        $data['language_flag'] = get_language_flag($this->language);

        $address = $this->addresses->where('is_primary', 1)->first();

        if($address){
            $data['address'] = $address->address;
            $data['zip'] = $address->zip;
            $data['city'] = $address->city;
        } else {
            $data['address'] = "";
            $data['zip'] = "";
            $data['city'] = "";
        }

        $this->policyAndInvoiceStatusCounts($data);

        if($this->rc_policy == "Yes")
            $data['rc_policy'] = 1;
        elseif($this->rc_policy == "No")
            $data['rc_policy'] = 0;

        if($this->lead_source == "Call_centre")
            $data['call_lead_source'] = 1;
        else
            $data['call_lead_source'] = 0;

        if($this->Send_Offer_By == "Post")
            $data['send_offer_by_post'] = 1;
        else
            $data['send_offer_by_post'] = 0;

        if ($this->is_duplicate) {
            $draws = Contact::where('is_duplicate', '=', 1)
            ->where('first_name', '=', $this->first_name)
            ->where('last_name', '=', $this->last_name)
            ->where('id', '!=', $this->id)
            ->groupBy('id')
            ->orderBy('id', 'asc')->get();

            $data['duplicate'] = '';

            if (!empty($draws)) {
                foreach ($draws as $key => $draw) {
                    $data['duplicate'] .= "(" .$draw->contact_num .") ";
                    $data['duplicate'] .= $draw->first_name. " ";
                    $data['duplicate'] .= $draw->last_name;
                    if(($key+1) != count($draws))
                        $data['duplicate'] .= "<br/>";
                }
            }
        }

        $this->getContactEmailDuplicate($data);

        return $data;
    }

    /**
     * if contact contains duplicate email then will return all duplicate contact numbers along with first name, last name and email.
     * 
     * @param  reference of Array $data
     * @return void
     */
    private function getContactEmailDuplicate(&$data) 
    {

        if (empty($this->email)) {
            return;
        }
        
        $draws = Contact::where('email', '=', $this->email)
        ->where('id', '!=', $this->id)
        ->orderBy('id', 'asc')->get();

        if (empty($draws)) {
            $this->duplicateEmail = '';
            return;
        }

        $data['duplicateEmail'] = '';

        foreach ($draws as $key => $draw) {
            $data['duplicateEmail'] .= "(" .$draw->contact_num .") ";
            $data['duplicateEmail'] .= $draw->first_name. " ";
            $data['duplicateEmail'] .= $draw->last_name;
            $data['duplicateEmail'] .= "<br/>";
            $data['duplicateEmail'] .= $draw->email; 
            if(($key+1) != count($draws)) 
                $data['duplicateEmail'] .= "<br/>";
        }

    }

    private function policyAndInvoiceStatusCounts(&$data){
        $policies = $this->policies;
        $data['count_policies'] = $policies->count();
        $invoice_count = 0;
        $invoice_total = 0;
        $LichtensteinZipCodes = getLichtensteinZipCodes();
        $LichtensteinMK = [];
        foreach($policies as $policy) {
            foreach($policy->invoices as $invoice){
                $invoice_count++;
                $invoice_total += $invoice->computed_total;
            }
            if(in_array($policy->policy_address->zip, $LichtensteinZipCodes)){
                $LichtensteinMK[] = $policy->policy_num;
            }
        }
        if(count($LichtensteinMK) > 0){
            $data['LichtensteinZipCodesResult'] = __('contact.INSURE_POLICY_BELONGS_LICHTENSTEIN_CONTACTSLIST', [ 'POLICY_NUMS' => implode(", ", $LichtensteinMK)]);
        }
        $data['count_invoices'] = $invoice_count;
        $data['invoice_total'] = format($invoice_total,__('general.CHF'));
        if($policies->isNotEmpty()) {

            $policy_statuses = array_keys(getPolicyStatus());
            foreach($policy_statuses as $policy_status) {
                $count = $policies->where('status', $policy_status)->count();
                if($count > 0){
                    $data['count_policy_by_status'][$policy_status]['count'] = $count;
                    $data['count_policy_by_status'][$policy_status]['class'] = render_status_class($policy_status);
                }
            }

            $invoice_statuses = array_keys(getInvoiceStatus());
            foreach($invoice_statuses as $invoice_status) {
                foreach($policies as $policy) {
                    $count = $policy->invoices->where('status', $invoice_status)->count();
                    if($count > 0) {
                        if(isset($data['count_invoice_by_status'][$invoice_status])){
                            $data['count_invoice_by_status'][$invoice_status]['count']++;
                        } else {
                            $data['count_invoice_by_status'][$invoice_status]['count'] = $count;
                        }
                        $data['count_invoice_by_status'][$invoice_status]['class'] = render_status_class($invoice_status);
                    }
                }
            }
        }
    }

}
