@extends('landlord.layouts.login-layout')
@section('login')
<div class="login-wrap">
    <div class="login">
        <h3 class="login-top-title">{{ __('landlord.LOGIN_TITLE') }}</h3>
        <hr />
        <form class="needs-validation no-cross" action="{{ url(LaravelLocalization::getURLFromRouteNameTranslated(app()->getLocale(),'landlord.routes.PASSWORD_UPDATE')) }}" method="post" novalidate>
          @csrf
          @if ($errors->has('email'))
            <span class="red-alert">{{ $errors->first('email') }}</span>
          @endif
          @if ($errors->has('password'))
            <div class="error" class="red-alert">{{ $errors->first('password') }}</div>
          @endif
          <input type="hidden" name="token" value="{{ $token }}">
                <div class="input-wrapper">
                    <label for="validationTooltipEmail">{{ __('landlord.EMAIL') }}<span class="star">&#160;*</span></label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="validationTooltipEmailPrepend"><i class="fa fa-user" aria-hidden="true"></i></span>
                        </div>
                        <input type="text" class="form-control" name="email" id="validationTooltipEmail" placeholder="{{ __('landlord.EMAIL') }}" aria-describedby="validationTooltipEmail" required="">
                        <div class="invalid-feedback">
                            {{ __('landlord.EMAIL_REQUIRED') }}
                        </div>
                    </div>
                </div>

                <div class="input-wrapper">
                    <label for="validationTooltipUsername">{{ __('landlord.NEW_PASSWORD') }}<span class="star">&#160;*</span></label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="validationTooltipUsernamePrepend"><i class="fa fa-key" aria-hidden="true"></i></span>
                        </div>
                        <input type="password" class="form-control" name="password" id="validationTooltipUsername" placeholder="{{ __('landlord.NEW_PASSWORD') }}" aria-describedby="validationTooltipUsernamePrepend" required="">
                        <div class="invalid-feedback">
                            {{ __('landlord.PASSWORD_REQUIRED') }}
                        </div>
                    </div>

                </div>
                <div class="input-wrapper">
                    <label for="validationTooltipUsername">{{ __('landlord.CONFIRM_PASSWORD') }}<span class="star">&#160;*</span></label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="validationTooltipUsernamePrepend"><i class="fa fa-key" aria-hidden="true"></i></span>
                        </div>
                        <input type="password" class="form-control" name="password_confirmation" placeholder="{{ __('landlord.CONFIRM_PASSWORD') }}" aria-describedby="validationTooltipUsernamePrepend" required="">
                        <div class="invalid-feedback">
                            {{ __('landlord.CONFIRM_PASSWORD_REQUIRED') }}
                        </div>
                    </div>
                </div>
            <div class="form-group">
                <div class="text-center reset-btn">
                    <button type="submit" class="btn btn-success btn-block">{{ __('landlord.RESET') }}</button>
                </div>
            </div>
        </form>

    </div>
    <br />

    <div class="other-links form-group">
        <ul>
          <li><a href="{{ url(app()->getLocale()) }}" >@lang('login.BACK_TO_LOGIN')</a></li>
        </ul>
    </div>
</div>
@endsection
