<?php

namespace App\Http\Controllers\Landlord;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\ResetPasswordController;
use Mail;
use Cookie;


class AuthLoginController extends controller
{

    use SendsPasswordResetEmails;
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
    protected $ResetPasswordInstance;

    /**
     * Creating instance of controller.
     */

    public function __construct(){
      $this->loginInstance = new LoginController();
      $this->ResetPasswordInstance = new ResetPasswordController();

    }

    public function loginForm(){
      return view('Landlord.sessions.signin');
    }

    /**
     * Display Link Request form to user
     *
     * @param  Request, token
     *
     * @return view
     */

    public function showForgetPasswordForm(Request $request, $token = null){
        return view('Landlord.sessions.forgot');
    }

    /**
     * Display Reset form to user
     *
     * @param  Request, token
     *
     * @return view
     */

    public function showResetPasswordForm(Request $request, $token = null)
    {
        return view('Landlord.sessions.reset')->with(
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
      return $this->loginInstance->login($request);
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

    public function sendResetPasswordLinkEmail(Request $request){
      return $this->sendResetLinkEmail($request);
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

    /**
     * Reset user's password
     *
     * @param  Request
     *
     * @return success
     */


    protected function guard()
    {
        return \Auth::guard('landlord');
    }

    protected function broker() {
        return \Password::broker('landlord');
    }
}
