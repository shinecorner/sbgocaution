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
            <div class="form-row pB-5 ">
              <div class="col-md-12">
                  <label for="validationCustom01">{{ __('login.username') }}<span class="star">&#160;*</span></label>
                  <input type="text" class="form-control" name="email" id="validationCustom01"  value="" required>
                  <div class="invalid-feedback">
                      {{ __('login.username_required') }}
                  </div>
              </div>
            </div>
            <div class="form-row">
              <div class="col-md-12">
                  <label for="validationCustom02">{{ __('login.password') }}<span class="star">&#160;*</span></label>
                  <input type="password" class="form-control" name="password" id="validationCustom02"  value="" required>
                  <div class="invalid-feedback">
                      {{ __('login.password_required') }}
                  </div>
              </div>
            </div>
            <label class="checkbox checkbox-outline-success">
                <input type="checkbox" name="remember" >
                <span class="chechbox-label">{{ __('login.com_users_login_remember_me') }}</span>
                <span class="checkmark"></span>
            </label>
            <div class="form-group">
                <div class="text-center reset-btn">
                    <button type="submit" class="btn btn-primary btn-block btn-outline-primary">{{ __('login.login') }}</button>
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
