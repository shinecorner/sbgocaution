<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Broker extends Model
{
    protected $fillable = [
        'id', 'policy_id', 'company_name', 'first_name', 'last_name', 'address', 'zip', 'city', 'email', 'website', 'real_broker_num', 'number', 'mobile', 'phone'
    ];

	public function policies()
	{
		return $this->hasMany('App\Policy');
	}
}
