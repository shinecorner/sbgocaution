<?php

namespace App\Observers;

use App\Contact;

class ContactObserver
{
    /**
     * Handle the contact "deleting" event.
     *
     * @param  \App\Contact  $contact
     * @return void
     */
    public function deleting(Contact $contact)
    {
        $contact->addresses()->delete();
        $contact->companies()->delete();
        $contact->offers()->delete();
        $contact->preconfirmations()->delete();
        //@TODO Comments and Documents
    }

    /**
     * Handle the contact "deleted" event.
     *
     * @param  \App\Contact  $contact
     * @return void
     */
    public function deleted(Contact $contact)
    {
        //
    }
}
