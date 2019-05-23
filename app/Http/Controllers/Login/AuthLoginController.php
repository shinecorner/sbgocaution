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

    /**
     * Creating instance of controller.
     */

    public function __construct(){
      $this->loginInstance = new LoginController();
      $this->ForgotPasswordInstance = new ForgotPasswordController();
      $this->ResetPasswordInstance = new ResetPasswordController();
    }

    /**
     * Display Link Request form to user
     *
     * @param  Request, token
     *
     * @return view
     */

    public function showLinkRequestForm(Request $request, $token = null){
        return view('Login.sessions.forgot');
    }

    /**
     * Display Reset form to user
     *
     * @param  Request, token
     *
     * @return view
     */

    public function showResetForm(Request $request, $token = null)
    {
      $token = $request->segment(4);
        return view('Login.sessions.reset')->with(
            ['token' => $token, 'email' => $request->email]
        );
    }

    /**
     * Authenticate user
     *
     * @param  Request
     *
     * @return success, error
     */

    public function login(Request $request){
      return $this->loginInstance->Login($request);
    }

    /**
     * Logout the user
     *
     * @param  Request
     *
     * @return to login page
     */

    public function logout(Request $request){
      return $this->loginInstance->logout($request);
    }

    /**
     * Display Login form to user
     *
     * @param  Request, token
     *
     * @return view
     */

    public function showLoginForm(){
      return $this->loginInstance->showLoginForm();
    }

    /**
     * Send reset password link to user
     *
     * @param  Request, token
     *
     * @return view
     */

    public function sendResetLinkEmail(Request $request){
      return $this->ForgotPasswordInstance->sendResetLinkEmail($request);
    }

    /**
     * Reset user's password
     *
     * @param  Request
     *
     * @return success
     */

    public function reset(Request $request){
      return $this->ResetPasswordInstance->reset($request);
    }

}
