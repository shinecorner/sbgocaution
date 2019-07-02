<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Template extends Model
{
    protected $fillable = [
        'id', 'name', 'section', 'template_key', 'template_desc', 'status', 'type'
    ];
}
