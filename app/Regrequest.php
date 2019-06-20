<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Regrequest extends Model
{
    //

    protected $table = 'landlord_registrations';

    protected $fillable = [
        'company','firstname','lastname','address','zip','city','telephone','ip_address','email','language'
    ];
}
