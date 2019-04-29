<?php

namespace App\Listeners;

use App\Events\UserLoggedIn;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App;

class SendHelperData
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  UserLoggedIn  $event
     * @return void
     */
    public function handle(UserLoggedIn $event)
    {
        $data = $event->data;
        $statuses = [
        	'contact_statuslist',
        	'contactPDF_statuslist'
        ];
        foreach ($statuses as $status) {
        	$this->getStatusList($data, $status);
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
