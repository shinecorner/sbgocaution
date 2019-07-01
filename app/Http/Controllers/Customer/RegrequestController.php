<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Http\Requests\Customer\RegRequest;
use App\CustomerRegRequest as model;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class RegrequestController extends Controller
{

    public function store(RegRequest $request)
    {

        try {

            $request->request->add(['ip_address' => $request->ip()]);
            $request->request->add(['language' => $request->getLocale()]);
            $data = $request->except('_token');
            $data['dob'] = date($request->year.'/'.$request->month.'/'.$request->day);

            $regRequest = new model();
            $regRequest->create($data);

            Mail::to('rk@gocaution.ch')
                ->send(new \App\Mail\Customer\RegRequest($data));

        } catch (\Exception $e){
            return response()->json(['status'=>1,'error'=>$e->getMessage()]);
        }

        return response()->json(['status'=>0,'message'=>__('customer/regrequest.THANK_YOU')]);

    }


}
