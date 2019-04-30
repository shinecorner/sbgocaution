<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;
use App;

class ContactCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return parent::toArray($request);
    }

    /**
     * Get additional data that should be returned with the resource array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function with($request)
    {
        $data = [];
        $contact_statuses = [
            'contact_statuslist',
            'contactPDF_statuslist'
        ];
        foreach ($contact_statuses as $contact_status) {
            $this->getStatusList($data, $contact_status);
        }
        return $data;
    }

    private function getStatusList(&$data, $status){
        switch ($status) {
            case 'contact_statuslist':
                $statuses = getContactStatus();
                break;
            case 'contactPDF_statuslist':
                $statuses = getContactPDF();
                break;
        }
        $languages = config('app.languages');
        foreach($languages as $language){
            foreach($statuses as $status){
                App::setLocale($language);
                $$language[$status] = __('crm.'. $status);
            }
            $data['helpers'][$language][$status] = $$language;
        }
    }

}
