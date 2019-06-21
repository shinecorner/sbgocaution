<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Canton extends Model
{
    protected $fillable = [
        'id', 'shortcode', 'german', 'french', 'italian', 'language'
    ];
}
