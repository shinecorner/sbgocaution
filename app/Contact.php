<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Contact extends Model
{

    protected $fillable = [
        'id', 'date', 'real_contact_num', 'user_id', 'salutation', 'name', 'firstname', 'language', 'address', 'contact_formate', 'status', 'rc_quote', 'zip', 'city'
    ];

    public function getDateAttribute($value) {
        return Carbon::parse($value)->format(config('crm.display_date_format'));
    }

    public function addresses()
    {
        return $this->hasMany('App\Address')->select(array('id', 'is_primary', 'address', 'zip', 'city'));
    }
}
