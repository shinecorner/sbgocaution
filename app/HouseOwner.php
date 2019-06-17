<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HouseOwner extends Model
{
    protected $fillable = [
        'id', 'realestate_agency_id', 'name', 'address', 'zip', 'city', 'status', 'email', 'website', 'phone', 'fax', 'payment_recipient_bank', 'payment_recipient_iban', 'payment_recipient_post_account', 'is_duplicate'
    ];

	public function policies()
	{
		return $this->hasMany('App\Policy', 'houseowner_id');
	}
}
