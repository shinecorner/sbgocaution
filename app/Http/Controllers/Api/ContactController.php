<?php

namespace App\Http\Controllers\Api;

use App\Contact;
use App\Config;
use Illuminate\Http\Request;
use App\Http\Resources\ContactResource;
use App\Http\Controllers\Controller;
use App;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->has('per_page')){
            $per_page = $request->per_page;
        } else {
            $per_page = config('crm.items_per_page');
        }

        $contact_statuses = [
            'contact_statuslist',
            'contactPDF_statuslist'
        ];
        
        $data = [];
        foreach ($contact_statuses as $contact_status) {
            $this->getStatusList($data, $contact_status);
        }

        $data['helpers']['navbar_contacts_count'] = Contact::whereIn('status', [
            "new", "status_quote_waiting", "pre_confirmation_pending"
        ])->count();

        $configs = Config::all();
        $config_data = $configs->reduce(function ($configLookup, $config) {
            $configLookup[$config['option']] = $config['value'];
            return $configLookup;
        }, []);

        $data['helpers']['configs'] = $config_data;

        return ContactResource::collection(Contact::latest()->paginate($per_page))->additional($data);
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
            'date' => 'required',
            'real_contact_num' => 'required',
            'user_id' => 'required'
        ]);

        return new ContactResource(Contact::create($request->all()));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function show(Contact $contact)
    {
        return new ContactResource($contact);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contact $contact)
    {
        $request->validate([
            'date' => 'required',
            'real_contact_num' => 'required',
            'user_id' => 'required'
        ]);

        return response()->json([
            "api_status" => $contact->update($request->all()),
            "data" => $contact
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contact $contact)
    {
        return response()->json([
            "api_status" => $contact->delete()
        ], 200);
    }

    public function change_status(Request $request, $id){
        $contact = Contact::find($id);
        return response()->json([
            "api_status" => $contact->change_status(),
            "data" => $contact
        ], 200);
    }

    /**
     * Returns the translated statues.
     * 
     * @param reference array of $data
     * @param string $status
     * @return void
     */
    private function getStatusList(&$data, $status){
        switch ($status) {
            case 'contact_statuslist':
                $statuses = getContactStatus();
                break;
            case 'contactPDF_statuslist':
                $statuses = getContactPDF();
                break;
        }
        $languages = config('app.languages');
        foreach($languages as $language){
            foreach($statuses as $status){
                App::setLocale($language);
                $$language[$status] = __('crm.'. $status);
            }
            $data['helpers'][$language][$status] = $$language;
        }
        $local = (request()->hasHeader('X-localization')) ? request()->header('X-localization') : 'de';
        app()->setLocale($local);
    }


}
