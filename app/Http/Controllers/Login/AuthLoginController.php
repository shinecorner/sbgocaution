<?php

namespace App\Http\Controllers\Login;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use Mail;
use Cookie;


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

    protected $loginInstance;
    protected $ForgotPasswordInstance;
    protected $ResetPasswordInstance;

    public function __construct(){
      $this->loginInstance = new LoginController();
      $this->ForgotPasswordInstance = new ForgotPasswordController();
      $this->ResetPasswordInstance = new ResetPasswordController();
    }

    public function showLinkRequestForm(Request $request, $token = null){
        return view('Login.sessions.reset');
    }

    public function showResetForm(Request $request, $token = null)
    {
      $token = $request->segment(4);
        return view('Login.sessions.resetPassword')->with(
            ['token' => $token, 'email' => $request->email]
        );
    }

    public function login(Request $request){
      return $this->loginInstance->Login($request);
    }

    public function logout(Request $request){
      return $this->loginInstance->logout($request);
    }

    public function showLoginForm(){
      return $this->loginInstance->showLoginForm();
    }

    public function sendResetLinkEmail(Request $request){
      return $this->ForgotPasswordInstance->sendResetLinkEmail($request);
    }

    public function reset(Request $request){
      return $this->ResetPasswordInstance->reset($request);
    }

}
