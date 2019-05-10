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

        $data['status'] = __('crm.' . $this->status);
        $data['status_class'] = "label-status-" . str_replace("_", "-", render_status_class($this->status));

        if($this->user_id && property_exists($this, 'username')) 
            $data['joomlauser'] = $this->username;
        else 
            $data['joomlauser'] = __('JNO');

        $data['anrede'] = get_anrede($this->anrede);
        
        $data['language_flag'] = get_language_flag($this->language);

        $address = $this->addresses->where('is_primary', 1)->first();
        $data['address'] = $address != null ? $address->address : "";
        $data['plz'] = $address != null ? $address->plz : "";
        $data['ort'] = $address != null ? $address->ort : "";

        if($this->rc_quote == "Yes")
            $data['rc_quote'] = 1;
        elseif($this->rc_quote == "No")
            $data['rc_quote'] = 0;

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
            ->where('nachname', '=', $this->nachname)
            ->where('vorname', '=', $this->vorname)
            ->where('id', '!=', $this->id)
            ->groupBy('id')
            ->orderBy('id', 'asc')->get();

            $data['duplicate'] = '';

            if (!empty($draws)) {
                foreach ($draws as $key => $draw) {
                    $data['duplicate'] .= "(" .$draw->contact_formate .") ";
                    $data['duplicate'] .= $draw->nachname. " ";
                    $data['duplicate'] .= $draw->vorname;
                    if(($key+1) != count($draws))
                        $data['duplicate'] .= "<br/>";
                }
            }
        }

        $this->getContactEmailDuplicate($data);

        return $data;
    }

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
            $data['duplicateEmail'] .= "(" .$draw->contact_formate .") ";
            $data['duplicateEmail'] .= $draw->nachname. " ";
            $data['duplicateEmail'] .= $draw->vorname;
            $data['duplicateEmail'] .= "<br/>";
            $data['duplicateEmail'] .= $draw->email; 
            if(($key+1) != count($draws)) 
                $data['duplicateEmail'] .= "<br/>";
        }

    }

}
