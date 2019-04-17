<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
	public $timestamps = false;

    protected $fillable = [
        'date', 'real_contact_num', 'id', 'user_id', 'nachname', 'vorname', 'address'
    ];
}
