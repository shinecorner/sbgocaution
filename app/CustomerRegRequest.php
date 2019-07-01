<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CustomerRegRequest extends Model
{
    //

    const DAYS_ITERATION = 31;
    const MONTH_ITERATION = 12;
    const YEAR_START_ITERATION =1930;
    const YEAR_END_ITERATION =2000;

    protected $table = 'customer_registrations';

    protected $fillable = [
        'firstname','lastname','dob','mobile','ip_address','email','language'
    ];
}
