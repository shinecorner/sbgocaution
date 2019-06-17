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
        $contact_statuses = [
            'contact',
            //'contactPDF',
            'policy',
            'invoice'
        ];
        
        $data = [];
        foreach ($contact_statuses as $contact_status) {
            $this->getStatusList($data, $contact_status);
        }

        $data['helpers']['navbar_contacts_count'] = Contact::whereIn('status', [
            "new", "status_policy_waiting", "pre_confirmation_pending"
        ])->count();

        $configs = Config::all();
        $config_data = $configs->reduce(function ($configLookup, $config) {
            $configLookup[$config['option']] = $config['value'];
            return $configLookup;
        }, []);

        $data['helpers']['configs'] = $config_data;
        $data['helpers']['lead_sources'] = getLeadSource(1);

        $query = Contact::latest();

        if($request->has('filters')) {
            $this->filters($request, $query, ['keyword_search' ,'status', 'diverse', 'language', 'created_from', 'created_to', 'birthdate', 'salutation', 'lead_source', 'rc_policy', 'promo_success', 'duplicate', 'duplicate_email', 'incorrect_address']);
        }

        $query->orderBy('created_at');

        if($request->has('order_by') && $request->has('order')) {
            $query->orderBy($request->order_by, $request->order);
        }

        if($request->has('limit')) {
            $contacts = $query->paginate($request->limit);
        } else {
            $contacts = $query->paginate($request->per_page);
        }

        return ContactResource::collection($contacts)->additional($data);
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
            "data" => new ContactResource($contact)
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
        $result = $contact->changeStatus();
        if($result) {
            $message = __('contact.STATUS_CHANGE_SUCCESS');
        } else {
            $message = __('contact.STATUS_CHANGE_FAIL');
        }
        return response()->json([
            "api_status" => $result,
            "message" => $message,
            "data" => new ContactResource($contact)
        ], 200);
    }

    /**
     * Returns the translated statues.
     * 
     * @param reference array of $data
     * @param string $status
     * @return void
     */
    private function getStatusList(&$data, $status) 
    {
        switch ($status) {
            case 'contact':
                $data['helpers']['statuses'][$status] = getContactStatus(1);
                break;
            case 'contactPDF':
                $data['helpers']['statuses'][$status] = getContactPDF(1);
                break;
            case 'policy':
                $data['helpers']['statuses'][$status] = getPolicyStatus(1);
                break;
            case 'invoice':
                $data['helpers']['statuses'][$status] = getInvoiceStatus(1);
                break;
        }
    }

    private function search($keyword, $query) 
    {
        $searchWildcard = '%' . request()->{'filters.'.$keyword} . '%';

        $query->where(function($query) use($searchWildcard) {
            $fields = ['first_name', 'last_name', 'email', 'contact_num', 'ip_user', 'phone', 'mobile', 'birthdate'];
            foreach($fields as $field) {
                if($field == 'birthdate') {
                    $query->orWhere($field, '=', date('Y-m-d', strtotime(str_replace(".", "-", request()->search))));
                } else {
                    $query->orWhere($field, 'LIKE', $searchWildcard);
                }
            }
        });

        $query->orWhereHas('addresses', function($query) use($searchWildcard) {
            $query->where('is_primary', 1);
            $query->where('address', 'LIKE', $searchWildcard); 
        });

        $query->orWhereHas('companies', function($query) use($searchWildcard) {
            $query->where('phone', 'LIKE', $searchWildcard);
        });

        $query->orWhereHas('policies.garants', function($query) use($searchWildcard) {
            $query->where('first_name', 'LIKE', $searchWildcard);
            $query->orWhere('last_name', 'LIKE', $searchWildcard);                
        });
    }

    private function filters($request, $query, $fields) 
    {
        foreach($request->filters as $key => $value) {
            if($request->has('filters.'.$key) && in_array($key, $fields)) {
                if($key == 'diverse')
                {
                    if($value == 0) { //Contacts status accepted with 0 policies
                        $query->has('policies', '=', 0);
                        $query->where('status', '=', 'accepted');
                    } else if($value == 1) {
                        $query->has('policies', '=', 1);
                    } else if($value == 2) {
                        $query->has('policies', '=', 2);
                    } else if($value == 3) {
                        $query->has('policies', '=', 3);
                    } else if($value == 4) {
                        $query->has('policies', '>=', 4);
                    } else if($value == 5) { //Check Login Details
                        $query->where('user_id', '=', 0);
                        $query->where('status', '=', 'accepted');
                    }
                } else if($key == 'created_from') {
                    $query->where('created_at', '>=', date('Y-m-d', strtotime($value)));
                } else if($key == 'created_to') {
                    $query->where('created_at', '<=', date('Y-m-d', strtotime($value)));
                } else if($key == 'birthdate') {
                    $query->where('birthdate', '=', date('Y-m-d', strtotime($value)));
                } else if($key == 'duplicate') {
                    $query->where('is_duplicate', '=', 1);
                } else if($key == 'promo_success') {
                    $query->where('promo_success', '=', $request->promo_success);
                } else if($key == 'duplicate_email') {
                    $query->whereIn('id', function($query) {
                        $query->select('id')->from('contacts')->groupBy('email')->havingRaw('count(email)>1');
                    });
                } else if($key == 'incorrect_address') {
                    $query->whereHas('addresses', function($query) {
                        $query->where('not_correct', '=', 1);
                    });
                } else if($key == 'keyword_search') {
                    $this->search($key, $query);
                } else {
                    $query->where($key, '=', $value);
                }
            }
        }
    }

}
