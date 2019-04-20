<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Contact extends Model
{
	public $timestamps = false;

    protected $fillable = [
        'date', 'real_contact_num', 'id', 'user_id', 'nachname', 'vorname', 'address'
    ];

    public function getDateAttribute($value) {
        return Carbon::parse($value)->format('d.m.Y H:i:s');
    }
}
