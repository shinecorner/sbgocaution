@extends('landlord.layouts.login-layout')
@section('login')
<div class="login-wrap">
    <div class="login">
        <h3 class="login-top-title">{{ __('landlord/login.LOGIN_TITLE') }}</h3>
        <hr />
        <form class="needs-validation no-cross" action="{{ url(LaravelLocalization::getURLFromRouteNameTranslated(app()->getLocale(),'landlord.routes.PASSWORD_UPDATE')) }}" method="post" novalidate>
          @csrf
          @if ($errors->has('email'))
            <span class="red-alert">{{ $errors->first('email') }}</span>
          @endif
          @if ($errors->has('password'))
            <div class="red-alert">{{ $errors->first('password') }}</div>
          @endif
          <input type="hidden" name="token" value="{{ $token }}">
                <div class="input-wrapper">
                    <label for="validationTooltipEmail">{{ __('landlord/login.EMAIL') }}<span class="star">&#160;*</span></label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="validationTooltipEmailPrepend"><i class="fa fa-user" aria-hidden="true"></i></span>
                        </div>
                        <input type="text" class="form-control" name="email" id="validationTooltipEmail" aria-describedby="validationTooltipEmail" required="">
                        <div class="invalid-feedback">
                            {{ __('landlord/login.EMAIL_REQUIRED') }}
                        </div>
                    </div>
                </div>

                <div class="input-wrapper">
                    <label for="validationTooltipUsername">{{ __('landlord/login.NEW_PASSWORD') }}<span class="star">&#160;*</span></label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="validationTooltipUsernamePrepend"><i class="fa fa-key" aria-hidden="true"></i></span>
                        </div>
                        <input type="password" class="form-control" name="password" id="validationTooltipUsername" aria-describedby="validationTooltipUsernamePrepend" required="">
                        <div class="invalid-feedback">
                            {{ __('landlord/login.PASSWORD_REQUIRED') }}
                        </div>
                    </div>

                </div>
                <div class="input-wrapper">
                    <label for="validationTooltipUsername">{{ __('landlord/login.CONFIRM_PASSWORD') }}<span class="star">&#160;*</span></label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="validationTooltipUsernamePrepend"><i class="fa fa-key" aria-hidden="true"></i></span>
                        </div>
                        <input type="password" class="form-control" name="password_confirmation" aria-describedby="validationTooltipUsernamePrepend" required="">
                        <div class="invalid-feedback">
                            {{ __('landlord/login.CONFIRM_PASSWORD_REQUIRED') }}
                        </div>
                    </div>
                </div>
            <div class="form-group">
                <div class="text-center reset-btn">
                    <button type="submit" class="btn btn-success btn-block">{{ __('landlord/login.RESET') }}</button>
                </div>
            </div>
        </form>

    </div>
    <br />

    <div class="other-links form-group">
        <ul>
          <li><a href="{{ url(app()->getLocale()) }}" >@lang('landlord/login.BACK_TO_LOGIN')</a></li>
        </ul>
    </div>
</div>
@endsection
