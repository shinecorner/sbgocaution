<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Regrequest extends Model
{
    //

    protected $table = 'landlord_registrations';

    protected $fillable = [
        'society','name','first_name','address','location','phone','ip_address','email','language'
    ];
}
