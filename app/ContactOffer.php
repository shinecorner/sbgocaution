<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContactOffer extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'contacts_offers';

    public function contact()
    {
        return $this->belongsTo('App\Contact');
    }

}
