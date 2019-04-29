<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{

    protected $fillable = [
        'is_primary', 'type', 'contact_id', 'co_address_name', 'address', 'plz', 'state', 'ort', 'comment'
    ];

    public function contact()
    {
        return $this->belongsTo('App\Contact');
    }
}
