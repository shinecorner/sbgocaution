<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PrivateLandlord extends Model
{
    protected $fillable = [
        'id', 'user_id', 'real_privatelandlord_num', 'privatelandlord_num', 'is_duplicate', 'number', 'salutation', 'last_name', 'first_name', 'contact_person', 'address', 'zip', 'state', 'city', 'language', 'country', 'phone', 'email', 'website', 'notes', 'fax', 'policy_comment_notification', 'damage_comment_notification', 'payment_recipient_bank', 'payment_recipient_iban', 'payment_recipient_post_account', 'certificate_email', 'file_names'
    ];

	public function policies()
	{
		return $this->hasMany('App\Policy', 'privatelandlord_id');
	}
}
