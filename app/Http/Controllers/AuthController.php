<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Events\UserLoggedIn;
use App\User;
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
        if(Auth::attempt(['email' => request('email'), 'password' => request('password')]))
        { 
            $user = Auth::user(); 
            $name = $user->name;
            $api_token =  $user->createToken('GoCaution CRM Token')-> accessToken; 
            $user->api_token = $api_token;
            $user->save();
            $data['api_status'] = 1;
            $data['code'] = 200;
            $data['message'] = 'Logged in Successfully.';
            $data['access_token'] = $api_token;
            $data['name'] = $user->name;
            $data['email'] = $user->email;

            $data = event(new UserLoggedIn($data));
            $data = array_pop($data);

            App::setLocale($request->lang);
            return response()->json(['response'=> $data ],200); 
        } 
        else
        { 
            return response()->json(['response'=>
                                        [
                                        'api_status'=>0,
                                        'code'=>200,
                                        'message'=>'Data is not in the proper format or check your email and password.'
                                        ]
                                ],200); 
        }
    }
}