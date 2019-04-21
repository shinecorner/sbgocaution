<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Contact extends Model
{
	public $timestamps = false;

    protected $fillable = [
        'date', 'real_contact_num', 'id', 'user_id', 'nachname', 'vorname', 'address', 'contact_formate'
    ];

    public function getDateAttribute($value) {
        return Carbon::parse($value)->format(config('date_format.display_date_format'));
    }
}
