<?php

namespace App\Http\Controllers\Login;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Controller\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;



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

    public function show_Link_RequestForm(Request $request, $token = null){
        return view('Login.sessions.reset');
    }

    public function showResetForm(Request $request, $token = null)
    {
        return view('Login.sessions.forgot')->with(
            ['token' => $token, 'email' => $request->email]
        );
    }


    public function log_in(Request $request){
      return (new LoginController)->Login($request);
    }

    public function log_out(Request $request){
      return (new LoginController)->logout($request);
    }

    public function show_Login_Form(){
      return (new LoginController)->showLoginForm();
    }

    public function send_Reset_Link_Email(Request $request){
      return (new ForgotPasswordController)->sendResetLinkEmail($request);
    }

    public function reset_password(Request $request){
      return (new ResetPasswordController)->reset();
    }

    public function show_Reset_Form($token){
      return (new ResetPasswordController)->showResetForm($token);
    }


}
