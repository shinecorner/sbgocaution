@extends('landlord.layouts.login-layout')
@section('login')
<div class="login-wrap">
    <div class="login">
        <h3 class="login-top-title">{{ __('landlord/login.LOGIN_TITLE') }}</h3>
        <hr />
        <form class="needs-validation no-cross" action="{{ url(LaravelLocalization::getURLFromRouteNameTranslated(app()->getLocale(),'landlord/login.routes.LOGIN')) }}" method="post" novalidate>
          @csrf
          @if ($errors->has('email'))
            <span class="red-alert">{{ $errors->first('email') }}</span>
          @endif
            <div class="input-wrapper">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fa fa-envelope" aria-hidden="true"></i></span>
                    </div>
                    <input type="text" class="form-control" name="email" id="validationTooltipEmail" aria-describedby="validationTooltipEmail" required="">
                    <div class="invalid-feedback">
                        {{ __('landlord/login.EMAIL_REQUIRED') }}
                    </div>
                </div>
            </div>
            <div class="input-wrapper">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="validationTooltipPasswordPrepend"><i class="fa fa-key" aria-hidden="true"></i></span>
                    </div>
                    <input type="password" name="password" class="form-control" id="validationTooltipPassword" aria-describedby="validationTooltipPassword" required="">
                    <div class="invalid-feedback">
                        {{ __('landlord/login.PASSWORD_REQUIRED') }}
                    </div>
                </div>
            </div>
            <label class="checkbox checkbox-outline-success">
                  <input type="checkbox" name="remember">
                  <span>{{ __('landlord/login.LOGIN_REMEMBER_ME') }}</span>
                  <span class="checkmark"></span>
            </label>
            <div class="form-group">
                <div class="text-center reset-btn">
                    <button type="submit" class="btn btn-success btn-block">{{ __('landlord/login.LOGIN') }}</button>
                </div>
            </div>
        </form>

    </div>
    <br />

    <div class="other-links form-group">
        <ul>
            <li><a href="{{ url(LaravelLocalization::getURLFromRouteNameTranslated(app()->getLocale(),'landlord/login.routes.FORGOT_PASSWORD_LINK')) }}" >@lang('landlord/login.FORGET_PASSWORD')</a></li>
        </ul>
    </div>
</div>
@endsection
