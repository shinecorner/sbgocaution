<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Contact extends Model
{

    protected $fillable = [
        'date', 'real_contact_num', 'id', 'user_id', 'anrede', 'nachname', 'vorname', 'language', 'address', 'contact_formate', 'status', 'rc_quote', 'plz', 'ort'
    ];

    public function getDateAttribute($value) {
        return Carbon::parse($value)->format(config('crm.display_date_format'));
    }

    public function addresses()
    {
        return $this->hasMany('App\Address')->select(array('id', 'is_primary', 'address', 'plz', 'ort'));
    }
}
