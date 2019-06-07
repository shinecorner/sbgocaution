<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PolicyAddress extends Model
{
    /**
     * Get related Policy object.
     * 
     * @return Relationship Object
     */
    public function policy()
    {
        return $this->belongsTo('App\Policy');
    }
}
