<?php
namespace App\Http\Controllers\Api;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use App\Events\UserLoggedIn;
use App\User;
use App\Config;
use App\Contact;
use DB;
use Validator;
use App;

class AuthController extends Controller
{

    private $successStatus = ['api_status' =>1 ,'code' => 200,];
    private $wrongHTTP = ['response'=>[
                                        'api_status'=>0,
                                        'code'=>400,
                                        'message'=>'Your HTTP method is not correct.'
                                        ]
                                ];
    
    public function signup(Request $request)
    {
        $validator = Validator::make($request->all(), [ 
                    'name' => 'required', 
                    'email' => 'required|email', 
                    'password' => 'required', 
                    ]);
        if ($validator->fails()) {        
            return response()->json(['response'=>[
                                            'code'=>400,
                                            'api_status'=>0,
                                            'message'=>'Data is not in the proper format.',
                                                ]
                                    ]);        
            }
        $email = $request->email;
        $eid =DB::table('users')->where('email' , $email)->exists();
        if($eid == true)
        {
            return response()->json(['response'=>[
                                            'api_status' => 0 ,
                                            'code' => 200,
                                            'message'=> 'This email already exist.'
                                            ]
                                ],200);
        }
        else
        {
            $input = $request->all(); 
            $input['password'] = bcrypt($input['password']); 
            $user = User::create($input);
            $token =  $user->createToken('Personal Access Token')-> accessToken; 
            $name =  $user->name;
            $email = $user->email;
            return response()->json(['response' => [
                                            'api_status'=>1,
                                            'code'=>201,
                                            'message' => 'Successfully registered.',
                                            ]
                                    ],201); 
        }
    }

    public function login(Request $request)
    { 
        if(Auth::attempt(['email' => request('email'), 'password' => request('password'), 'status' => 1]))
        { 
            $user = Auth::user(); 
            $name = $user->name;
            $api_token =  $user->createToken('GoCaution CRM Token')-> accessToken; 
            $user->api_token = $api_token;
            $user->save();
            App::setLocale($request->lang);
            $data['api_status'] = 1;
            $data['code'] = 200;
            $data['message'] = __('general.AUTH_LOGIN_SUCCESS');
            $data['access_token'] = $api_token;
            $data['name'] = $user->name;
            $data['email'] = $user->email;
            $data['premium_amount'] = format(177.23);
            $statuses = [
                'contact',
                //'contactPDF',
                'policy',
                'invoice'
            ];
            foreach ($statuses as $status) {
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

            $data['helpers']['navbar_contacts_count'] = Contact::whereIn('status', [
                "new", "status_policy_waiting", "pre_confirmation_pending"
            ])->count();

            $configs = Config::all();
            $config_data = $configs->reduce(function ($configLookup, $config) {
                $configLookup[$config['option']] = $config['value'];
                return $configLookup;
            }, []);

            $data['helpers']['configs'] = $config_data;
            $data['helpers']['lead_sources'] = getLeadSource();
            return response()->json($data, 200); 
        } 
        else
        {
            App::setLocale($request->lang); 
            return response()->json([
                                        'api_status'=>0,
                                        'code'=>200,
                                        'message'=> __('general.AUTH_LOGIN_FAIL')
                                    ], 200); 
        }
    }
}