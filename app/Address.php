<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{

    protected $fillable = [
        'is_primary', 'type', 'contact_id', 'co_address_name', 'address', 'zip', 'state', 'city', 'comment'
    ];

    /**
     * Get related Contact object.
     * 
     * @return Relationship Object
     */
    public function contact()
    {
        return $this->belongsTo('App\Contact');
    }
}
