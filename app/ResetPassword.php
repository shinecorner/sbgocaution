<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ResetPassword extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'token', 'is_used',
    ];

    protected $table = 'reset_password_token';
}
