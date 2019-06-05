<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Garant extends Model
{
	public function policy() {
		return $this->belongsTo('App\Policy');
	}
}
