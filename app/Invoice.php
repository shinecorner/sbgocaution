<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
	public function policy()
	{
		return $this->belongsTo('App\Policy');
	}

	public function payments()
	{
		return $this->hasMany('App\Payment');
	}
}
