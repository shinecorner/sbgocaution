<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class Contact extends Model
{

    protected $fillable = [
        'id', 'date', 'real_contact_num', 'user_id', 'salutation', 'name', 'firstname', 'language', 'address', 'contact_formate', 'status', 'rc_quote', 'zip', 'city'
    ];

    public function getDateAttribute($value) {
        return Carbon::parse($value)->format(config('crm.display_date_format'));
    }

    public function addresses()
    {
        return $this->hasMany('App\Address')->select(array('id', 'is_primary', 'address', 'zip', 'city'));
    }

    public function offers()
    {
        return $this->hasMany('App\ContactOffer');
    }

    public function preconfirmations()
    {
        return $this->hasMany('App\ContactPreconfirm');
    }

    function change_status()
    {
        $old_status = $this->status;
        $status = request()->status;

        if(in_array($old_status, array('offer','pre_confirmation_sent')) && !in_array($status, array('offer','pre_confirmation_sent'))){
            
            $directory_kundendatenbank = config('app.customer_data');
            if(!Storage::disk('public')->exists($directory_kundendatenbank)){
                Storage::disk('public')->makeDirectory($directory_kundendatenbank);
            }

            $directory_offer = 'offer';
            if(!Storage::disk('public')->exists($directory_kundendatenbank.DS.$directory_offer)){
                Storage::disk('public')->makeDirectory($directory_kundendatenbank.DS.$directory_offer);
            }

            $directory_preconfirmation = 'preconfirmation';
            if(!Storage::disk('public')->exists($directory_kundendatenbank.DS.$directory_preconfirmation)){
                Storage::disk('public')->makeDirectory($directory_kundendatenbank.DS.$directory_preconfirmation);
            }

            $offer = $directory_kundendatenbank.DS.$directory_offer.DS.$this->id;
            if(Storage::disk('public')->exists($offer)){
                Storage::disk('public')->delete($offer);
                foreach($this->offers as $offer){
                    $offer->delete();
                }
            }

            $preconfirmation = $directory_kundendatenbank.DS.$directory_preconfirmation.DS.$this->id;
            if(Storage::disk('public')->exists($preconfirmation)){
                Storage::disk('public')->delete($preconfirmation);

                foreach($this->preconfirmations as $preconfirmation){
                    $preconfirmation->delete();
                }
            }
        }
        $this->status = request()->status;
        $this->save();
        // @TODO Activity Log
        //$dispatcher->trigger('onChangeContactStatus',array($cid, $status));
        return true;
    }

}
