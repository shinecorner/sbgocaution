<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContactCompany extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'contacts_companies';

    public function contact() {
    	return $this->belongsTo('App\Contact');
    }
}
