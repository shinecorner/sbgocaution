<?php

namespace App\Http\Controllers\Landlord;

use App\Http\Controllers\Controller;
use App\Http\Requests\Regrequest;
use App\Regrequest as model;
use Illuminate\Support\Facades\Mail;

class RegrequestController extends Controller
{

    public function store(Regrequest $request)
    {

        try {

            $request->request->add(['ip_address' => $request->ip()]);
            $request->request->add(['language' => $request->getLocale()]);
            $data = $request->except('_token');

            $regRequest = new model();
            $regRequest->create($data);

            Mail::to('rk@gocaution.ch')
                ->send(new \App\Mail\RegRequest($data));

        } catch (\Exception $e){
            return response()->json(['status'=>1,'error'=>$e->getMessage()]);
        }

        return response()->json(['status'=>0,'message'=>__('landlord/regrequest.THANK_YOU')]);

    }


}
