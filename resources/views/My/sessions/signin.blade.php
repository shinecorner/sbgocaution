@extends('My.layouts.login-layout')
@section('login')
<div class="login-wrap">
    <div class="login">
        <h3 class="login-top-title">{{ __('my.login_title') }}</h3>
        <hr />
        <form class="needs-validation no-cross" action="{{ url(LaravelLocalization::getURLFromRouteNameTranslated(app()->getLocale(),'my.routes.LOGIN')) }}" method="post" novalidate>
          @csrf
         {{-- @if ($errors->has('email'))
            <span class="red-alert">{{ $errors->first('email') }}</span>
          @endif--}}
            <div class="form-row pB-5 ">
              <div class="col-md-12">
                  <label for="validationCustom01">{{ __('my.username') }}<span class="star">&#160;*</span></label>
                  <input type="text" class="form-control" name="email" id="validationCustom01"  value="" required>
                  <div class="invalid-feedback">
                      {{ __('my.username_required') }}
                  </div>
              </div>
            </div>
            <div class="form-row">
              <div class="col-md-12">
                  <label for="validationCustom02">{{ __('my.password') }}<span class="star">&#160;*</span></label>
                  <input type="password" class="form-control" name="password" id="validationCustom02"  value="" required>
                  <div class="invalid-feedback">
                      {{ __('my.password_required') }}
                  </div>
              </div>
            </div>
            <label class="checkbox checkbox-outline-success">
                <input type="checkbox" name="remember" >
                <span class="chechbox-label">{{ __('my.LOGIN_REMEMBER_ME') }}</span>
                <span class="checkmark"></span>
            </label>
            <div class="form-group">
                <div class="text-center reset-btn">
                    <button type="submit" class="btn btn-primary btn-block btn-outline-primary">{{ __('my.login') }}</button>
                </div>
            </div>
        </form>

    </div>
    <br />

    <div class="other-links form-group">
        <ul>
            <li><a href="{{ url(LaravelLocalization::getURLFromRouteNameTranslated(app()->getLocale(),'my.routes.FORGOT_PASSWORD_LINK')) }}" >@lang('my.FORGET_PASSWORD')</a></li>
        </ul>
    </div>
</div>

@endsection
