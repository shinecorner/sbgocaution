@extends('Login.layouts.login-layout')
@section('login')
<div class="login-wrap">
    <div class="login">
        <h3 class="login-top-title">{{ __('login.login_title') }}</h3>
        <hr />
        <form class="needs-validation no-cross" action="{{ url(LaravelLocalization::getURLFromRouteNameTranslated(app()->getLocale(),'login.routes.LOGIN')) }}" method="post" novalidate>
          @csrf
          @if ($errors->has('email'))
            <span class="red-alert">{{ $errors->first('email') }}</span>
          @endif
            <div class="input-wrapper">
                <label for="validationTooltipEmail">{{ __('login.email') }}<span class="star">&#160;*</span></label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fa fa-envelope" aria-hidden="true"></i></span>
                    </div>
                    <input type="text" class="form-control" name="email" id="validationTooltipEmail" placeholder="{{ __('login.email') }}" aria-describedby="validationTooltipEmail" required="">
                    <div class="invalid-feedback">
                        {{ __('login.email_required') }}
                    </div>
                </div>
            </div>
            <div class="input-wrapper">
                <label for="validationTooltipPassword">{{ __('login.password') }}<span class="star">&#160;*</span></label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="validationTooltipPasswordPrepend"><i class="fa fa-key" aria-hidden="true"></i></span>
                    </div>
                    <input type="password" name="password" class="form-control" id="validationTooltipPassword" placeholder="{{ __('login.password') }}" aria-describedby="validationTooltipPassword" required="">
                    <div class="invalid-feedback">
                        {{ __('login.password_required') }}
                    </div>
                </div>
            </div>
            <label class="checkbox checkbox-outline-success">
                  <input type="checkbox" name="remember">
                  <span>{{ __('login.login_remember_me') }}</span>
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
            <li><a href="{{ url(LaravelLocalization::getURLFromRouteNameTranslated(app()->getLocale(),'login.routes.FORGOT_PASSWORD_LINK')) }}" >@lang('login.FORGET_PASSWORD')</a></li>
        </ul>
    </div>
</div>
@endsection
