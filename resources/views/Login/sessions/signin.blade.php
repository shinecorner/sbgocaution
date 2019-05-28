@extends('Login.layouts.login-layout')
@section('login')
<div class="login-wrap">
    <div class="login">
        <h3 class="login-top-title">{{ __('login.login_title') }}</h3>
        <hr />
        <form class="needs-validation no-cross" action="{{ url(LaravelLocalization::getURLFromRouteNameTranslated(app()->getLocale(),'login.ROUTES.LOGIN')) }}" method="post" novalidate>
          @csrf
          @if ($errors->has('email'))
            <span class="red-alert">{{ $errors->first('email') }}</span>
          @endif
            <div class="input-wrapper">
                <label for="validationTooltipUsername">{{ __('login.username') }}<span class="star">&#160;*</span></label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="validationTooltipUsernamePrepend"><i class="fa fa-user" aria-hidden="true"></i></span>
                    </div>
                    <input type="text" class="form-control" name="email" id="validationTooltipUsername" placeholder="{{ __('login.username') }}" aria-describedby="validationTooltipUsernamePrepend" required="">
                    <div class="invalid-feedback">
                        {{ __('login.username_required') }}
                    </div>
                </div>
            </div>
            <div class="input-wrapper">
                <label for="validationTooltipUsername">{{ __('login.password') }}<span class="star">&#160;*</span></label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="validationTooltipUsernamePrepend"><i class="fa fa-key" aria-hidden="true"></i></span>
                    </div>
                    <input type="password" name="password" class="form-control" id="validationTooltipUsername" placeholder="{{ __('login.password') }}" aria-describedby="validationTooltipUsernamePrepend" required="">
                    <div class="invalid-feedback">
                        {{ __('login.password_required') }}
                    </div>
                </div>
            </div>
            <label class="checkbox checkbox-outline-success">
                  <input type="checkbox" name="remember">
                  <span>{{ __('login.com_users_login_remember_me') }}</span>
                  <span class="checkmark"></span>
              </label>
            <div class="form-group">
                <div class="text-center reset-btn">
                    <button type="submit" class="btn btn-success btn-block">{{ __('login.login') }}</button>
                </div>
            </div>
        </form>

    </div>
    <br />

    <div class="other-links form-group">
        <ul>
            <li><a href="{{ url(LaravelLocalization::getURLFromRouteNameTranslated(app()->getLocale(),'login.ROUTES.FORGOT_PASSWORD_LINK')) }}" >@lang('login.FORGET_PASSWORD')</a></li>
        </ul>
    </div>
</div>
@endsection
