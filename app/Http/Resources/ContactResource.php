<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Contact;

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
        $data = [
            'date' => $this->date,
            'real_contact_num' => $this->real_contact_num,
            'id' => $this->id,
            'user_id' => $this->user_id,
        ];
        $data['status'] = __('crm.' . $this->status);
        $data['status_class'] = render_status_class($this->status);

        if($this->user_id && property_exists($this, 'username')) 
            $data['joomlauser'] = $this->username;
        else 
            $data['joomlauser'] = __('JNO');

        switch($this->anrede){
            case 'mr': $data['anrede'] = __('Herr'); break;
            case 'mrs': $data['anrede'] = __('Frau'); break;
            case 'company': $data['anrede'] = __('Firma'); break;
        }

        $data['nachname'] = $this->nachname;
        $data['vorname'] = $this->vorname;
        $data['language'] = $this->language;
        $data['language_flag'] = get_language_flag($this->language);
        $data['address'] = $this->address;
        $data['email'] = $this->email;
        $data['contact_formate'] = $this->contact_formate;

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

        $data['is_duplicate'] = $this->is_duplicate;
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

        $data['plz'] = $this->plz;
        $data['ort'] = $this->ort;

        return $data;
    }

    function getContactEmailDuplicate(&$data) 
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
