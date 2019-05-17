<?php

namespace App\Http\Controllers\Login;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\ResetPassword;
use App;
use Mail;
use Lang;
use Cookie;

class LoginController extends Controller
{

   /**
   * Function to Login a user
   */

    public function login(Request $request) {
      $validatedData = $request->validate([
          'username' => 'required',
          'password' => 'required',
      ]);
      $user = User::where('email', $request->username)->first();
      if($user){
        if (Hash::check($request->password, $user->password))
        {
          session(['username' => $user->username, 'user_id' => $user->id]);
          if($request->has('remember_me')){
            Cookie::queue('login_username', $request->username, '14400');
            Cookie::queue('login_password', $request->password, '14400');
            Cookie::queue('login_remember', $request->remember_me, '14400');
          } else {
            Cookie::queue(Cookie::forget('login_username'));
            Cookie::queue(Cookie::forget('login_password'));
            Cookie::queue(Cookie::forget('login_remember'));
          }
          return redirect(app()->getLocale().'/dashboard');
        } else {
            return redirect(app()->getLocale().'/')->with('error', 'ERROR_INVALID_PASSWORD');
        }
      } else {
        return redirect(app()->getLocale().'/')->with('error', 'ERROR_USER_DOESNOT_EXISTS');
      }
    }

    /**
    * Function to logout a user
    */

    public function logout(Request $request){
      $request->session()->flush();
      return redirect(app()->getLocale().'/');
    }

    /**
    * Function to Send email for reset password
    */

    public function password_reset_link(Request $request){
      $validatedData = $request->validate([
          'username' => 'required'
      ]);
      $user = User::where('email', $request->username)->first();
      if($user){
        $token = rand(10000,99999);
        $data = new ResetPassword();
        $data->user_id = $user->id;
        $data->token = $token;
        $data->save();
        $url = array('url' => url(app()->getLocale().'/resetPassword/'.$user->id.'/'.$token));

        /* send email for reset link */
        $email = $user->email;
        $name = 'Sandeep';
        Mail::send('Login.sessions.email', array('url' => $url), function($message)  use ($email, $name)
        {
            $message->to($email, $name);
            $message->subject('Welcome!');
        });
        /* end */

        return redirect(app()->getLocale().'/')->with('message','RESET_LINK_SENT');
      } else {
        return redirect(app()->getLocale().'/forgetPassword')->with('error','UNREGISTERED_EMAIL');
      }
    }

    /**
    * Function to display reset password page
    */

    public function reset_password(){
      $id = \Request::segment(3);
      $token = \Request::segment(4);
      $data = ResetPassword::where('user_id', $id)->orderBy('id', 'desc')->first();
      if($data){
        if(!$data->is_used){
            if($data->token == $token){
              return view('Login.sessions.resetPassword')->with(array('user_id' => $id, 'token' => $token));
            } else {
              return redirect(app()->getLocale().'/')->with('error','RESET_TOKEN_MISSMATCH');
            }
        } else {
          return redirect(app()->getLocale().'/')->with('error','USED_LINK');
        }
      } else {
        return redirect(app()->getLocale().'/')-> with('error','INVALID_USER_ID');
      }
    }

    /**
    * Function to display reset password page
    */

    public function update_password(Request $request){
      $validatedData = $request->validate([
          'new_password' => 'required|confirmed',
          'user_id' => 'required',
          'token'   => 'required'
      ]);
      User::where('id',$request->user_id)
          ->update(['password' => bcrypt($request->new_password)]);

      ResetPassword::where(['user_id' => $request->user_id, 'token' => $request->token])
                    ->update(['is_used' => true]);

      return redirect(app()->getLocale().'/')->with('message', "PASSWORD_RESET_SUCCESS");
    }

      public function sendMail()
      {
        $email = 'sandeep.p@gocaution.ch';
        $name = 'Sandeep';
        Mail::send('Login.sessions.email', array('user' => $name), function($message)  use ($email, $name)
        {
            $message->to($email, $name);
            $message->subject('Welcome!');
        });
      }
}
