<?php

namespace App\Http\Controllers\Api;

use App\Contact;
use App\ContactAdditional;
use App\Config;
use Illuminate\Http\Request;
use App\Http\Resources\ContactResource;
use App\Http\Controllers\Controller;
use App\Events\ContactStatusChange;
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
        $data = [];

        $helpers = [
            'statuses' => [
                'contact',
                //'contactPDF',
                'policy',
                'invoice'
            ],
            'other' => [
                'lead_sources',
                'contact_salutation'
            ]
        ];

        $this->responseHelper($data, $helpers);

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
            'contact_type' => 'required',
            'salutation' => 'required',
            'last_name' => 'required',
            'first_name' => 'required',
            'language' => 'required',
            'email' => 'required'
        ]);
        $contact = new Contact();
        $real_contact_num = Contact::latest()->first();
        $real_contact_num = $real_contact_num == null ? 1 : $real_contact_num->id + 1; 
        $contact->real_contact_num = $real_contact_num;
        $contact->contact_num = getUniqueNum($real_contact_num, 3);
        $contact->contact_type = $request->contact_type;
        $contact->salutation = $request->salutation;
        $contact->last_name = $request->last_name;
        $contact->first_name = $request->first_name;
        $contact->language = $request->language;
        $contact->email = $request->email;
        
        if($request->has('phone')) {
            $contact->phone = $request->phone;
        }

        if($request->has('mobile')) {
            $contact->mobile = $request->mobile;
        }

        if($request->has('birthdate')) {
            $contact->birthdate = $request->birthdate;
        }

        if($request->has('nation')) {
            $contact->nation = $request->nation;
        }

        $contact->indebted = $request->indebted;

        if($request->has('status')) {
            $contact->status = $request->status;
        }

        if($request->has('lead_source')) {
            $contact->lead_source = $request->lead_source;
        }

        $contact->pay_options = $request->pay_options;
        $contact->co_options = $request->co_options;
        $contact->rc_active = $request->rc_active;
        $contact->rc_policy = $request->rc_policy;
        $contact->rc_company = $request->rc_company;
        $contact->ip_user = $request->ip_user;
        $contact->iban = $request->iban;
        $contact->promo_code = $request->promo_code;
        $contact->client_notice = $request->client_notice;
        $contact->promo_success = $request->promo_success;
        $contact->promo_review = $request->promo_review;
        $contact->promo_review_facebook = $request->promo_review_facebook;
        $contact->promo_review_google = $request->promo_review_google;
        $contact->promo_review_local = $request->promo_review_local;
        $contact->save();

        // Contact Additionals

        $contact_additional = new ContactAdditional();
        $contact_additional->property_address = $request->property_address;
        $contact_additional->property_zip = $request->property_zip;
        $contact_additional->property_city = $request->property_city;
        $contact_additional->lessor_name = $request->lessor_name;
        $contact_additional->lessor_contact = $request->lessor_contact;
        $contact_additional->lessor_address = $request->lessor_address;
        $contact_additional->lessor_zip = $request->lessor_zip;
        $contact_additional->lessor_city = $request->lessor_city;
        $contact_additional->rent_begin = $request->rent_begin;
        $contact_additional->rent_amount = $request->rent_amount;
        $contact_additional->contact_id = $contact->id;
        $contact_additional->save();

        return new ContactResource($contact);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function show(Contact $contact)
    {
        return response()->json([
            "data" => new ContactResource($contact)
        ], 200);
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
    public function destroy($id)
    {
        $ids = explode(",", $id);
        $success = 0;
        $failed = 0;
        $delete_contact = [];
        $result = false;
        foreach($ids as $cid) {
            $contact = Contact::findOrFail($cid);
            $data = [];
            $data['id'] = $contact->id;
            $data['last_name'] = $contact->last_name;
            $data['first_name']  = $contact->first_name;
            $data['birthdate'] = $contact->birthdate;
            $data['new_addresses'] = 0;
            $data['addresses'] = $contact->addresses->where('is_primary', 1)->first();
            if(isPaidContactOrPaidInvoice($cid, 'contact'))
            {
                $delete_contact[] = $contact->contact_num;
                $failed++;
                continue;
            } else {
                $success++;
            }

            if ($dups = checkDuplicateContact(2, $data)) {
                $this->updateDuplicateContact($dups, 1);                  
            }

            $contact->delete();
            //@TODO
        }

        if($success > 0) {
            $message = __('contact.DELETE_SUCCESS'); 
        }

        if($failed > 0) {

            if(count($delete_contact) > 1) {
                $new_delete_contact = $delete_contact;
                unset($new_delete_contact[count($delete_contact)-1]);
                $last = end($delete_contact);
                $info_1 = implode(",", $new_delete_contact);
                $info_2 = $last;
                $message = __('contact.ERROR_DELETE_SELECTED_CONTACTS', ['info_1' => $info_1, 'info_2' => $info_2]);
            } else {
                $new_delete_contact = $delete_contact;
                $info_1 = implode(",", $new_delete_contact);
                $message = __('contact.ERROR_DELETE_SELECTED_CONTACTS_ONE', ['info_1' => $info_1]);
            }

            // check if this on edit view 
            if(count($id) == 1) {
                $message = __('contact.ERROR_DELETE_SELECTED_CONTACT');
            }

        }

        return response()->json([
            "message" => $message
        ], 200);
    }

    public function change_status(Request $request, $id){
        $contact = Contact::find($id);
        $result = $contact->changeStatus();
        event(new ContactStatusChange(['event_data' => $contact]));
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

    private function updateDuplicateContact($dups, $type = 0)
    {
   
        foreach ($dups as $dup) {            
            $dup->is_duplicate = 0;
            
            switch ($type) {
                case 1:
                    if (count($dups) > 1) {
                        $dup->is_duplicate = 1;
                    }  
                    break;                
                default:
                    if (count($dups) > 0) {
                        $dup->is_duplicate = 1;
                    }  
                    break;
            }
            $dup->save();            
        }
        return true;
    }

}
