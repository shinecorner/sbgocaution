<?php

namespace App\Listeners;

use App\Events\UserLoggedIn;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App;

class SendStatusList
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
        $statuses = getContactStatus();
        $languages = config('app.languages');
        foreach($languages as $language){
            foreach($statuses as $status){
                App::setLocale($language);
                $$language[$status] = __('crm.'. $status);
            }
            $data['helpers']['contact_statuslist'][$language] = $$language;
        }
        return $data;
    }
}
