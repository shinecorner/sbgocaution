<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContactPreconfirm extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'contacts_preconfirmations';

    public function contact()
    {
        return $this->belongsTo('App\Contact');
    }
    
}
