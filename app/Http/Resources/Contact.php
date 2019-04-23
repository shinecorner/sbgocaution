<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Contact extends JsonResource
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

        switch($this->anrede){
            case 'mr': $data['anrede'] = __('Herr'); break;
            case 'mrs': $data['anrede'] = __('Frau'); break;
            case 'company': $data['anrede'] = __('Firma'); break;
        }

        $data['nachname'] = $this->nachname;
        $data['vorname'] = $this->vorname;
        $data['language_flag'] = get_language_flag($this->language);
        $data['address'] = $this->address;
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

        return $data;
    }
}
