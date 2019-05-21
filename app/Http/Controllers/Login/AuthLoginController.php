<?php

namespace App\Http\Controllers\Login;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Controller\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use Mail;



class AuthLoginController extends controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    public function showLinkRequestForm(Request $request, $token = null){
        return view('Login.sessions.reset');
    }

    public function showResetForm(Request $request, $token = null)
    {
        return view('Login.sessions.resetPassword')->with(
            ['token' => $token, 'email' => $request->email]
        );
    }

    public function login(Request $request){
      return (new LoginController)->Login($request);
    }

    public function logout(Request $request){
      return (new LoginController)->logout($request);
    }

    public function showLoginForm(){
      return (new LoginController)->showLoginForm();
    }

    public function sendResetLinkEmail(Request $request){
      return (new ForgotPasswordController)->sendResetLinkEmail($request);
    }

    public function reset(Request $request){
      return (new ResetPasswordController)->reset();
    }


    // public function sendMail(){
    //   config(['mail.driver' => 'smtp']);
    //   config(['mail.host' => 'smtp.gmail.com']);
    //   config(['mail.port' => '465']);
    //   config(['mail.username' => 'kundanfortest@gmail.com']);
    //   config(['mail.password' => 'AB3d@#12@']);
    //   config(['mail.from.address' => 'kundanfortest@gmail.com']);
    //   config(['mail.from.name' => 'sandeep']);
    //   config(['mail.reply_to.address' => 'kundanfortest@gmail.com']);
    //   // dd(env('MAIL_HOST'));
    //   $user["name"] = "sandeep";
    //   Mail::send('Login.sessions.email', ['user' => $user], function ($m) use ($user) {
    //         $m->from('hello@app.com', 'Your Application');
    //
    //         $m->to('kundanfortest@gmail.com', 'sandeep')->subject('Your Reminder!');
    //     });
    // }


}
