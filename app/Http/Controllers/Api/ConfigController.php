<?php

namespace App\Http\Controllers\Api;

use App\Config;
use App\Http\Resources\ConfigResource;
use App\Http\Resources\ConfigCollection;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ConfigController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new ConfigCollection(Config::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'option' => 'required|alpha_dash|unique:configs,option',
            'value' => 'required'        
        ]);

        return new ConfigResource(Config::create($request->all()));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Config  $config
     * @return \Illuminate\Http\Response
     */
    public function show(Config $config)
    {
        return new ConfigResource($config);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Config  $config
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Config $config)
    {
        $request->validate([
            'option' => 'required|alpha_dash|unique:configs,option,' . $config->id,
            'value' => 'required'
        ]);

        return response()->json([
            "api_status" => $config->update($request->all()),
            "data" => $config
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Config  $config
     * @return \Illuminate\Http\Response
     */
    public function destroy(Config $config)
    {
        return response()->json([
            "api_status" => $config->delete()
        ], 200);
    }

    /**
     * Update whole resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function updateAll(Request $request)
    {
        $status = true;
        foreach($request->all() as $key => $value){
            $config = Config::where('option', $key)->first();
            $config->value = $value;
            if(!$config->save()){
                $status = false;
            }
        }
        return response()->json([
            "api_status" => $status,
            "message" => __('general.SAVE_SUCCESSFULLY')
        ], 200);
    }
}
