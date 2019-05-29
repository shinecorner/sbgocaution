<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Policy extends Model
{
	public function contact(){
		return $this->belongsTo('App\Contact');
	}

    public function invoices()
    {
        return $this->hasMany('App\Invoice');
    }

    public function policy_address()
    {
    	return $this->hasOne('App\PolicyAddress');
    }
	
}
