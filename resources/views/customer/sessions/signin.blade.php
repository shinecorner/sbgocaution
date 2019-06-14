@extends('customer.layouts.login-layout')
@section('login')
<div class="login-wrap">
    <div class="login">
        <h3 class="login-top-title">{{ __('customer.login_title') }}</h3>
        <hr />
        <form class="needs-validation no-cross" action="{{ url(LaravelLocalization::getURLFromRouteNameTranslated(app()->getLocale(),'customer.routes.LOGIN')) }}" method="post" novalidate>
          @csrf
         {{-- @if ($errors->has('email'))
            <span class="red-alert">{{ $errors->first('email') }}</span>
          @endif--}}
            <div class="form-row pB-5 ">
              <div class="col-md-12">
                  <label for="validationCustom01">{{ __('customer.username') }}<span class="star">&#160;*</span></label>
                  <input type="text" class="form-control" name="email" id="validationCustom01"  value="" required>
                  <div class="invalid-feedback">
                      {{ __('customer.username_required') }}
                  </div>
              </div>
            </div>
            <div class="form-row">
              <div class="col-md-12">
                  <label for="validationCustom02">{{ __('customer.password') }}<span class="star">&#160;*</span></label>
                  <input type="password" class="form-control" name="password" id="validationCustom02"  value="" required>
                  <div class="invalid-feedback">
                      {{ __('customer.password_required') }}
                  </div>
              </div>
            </div>
            <label class="checkbox checkbox-outline-success">
                <input type="checkbox" name="remember" >
                <span class="chechbox-label">{{ __('customer.LOGIN_REMEMBER_ME') }}</span>
                <span class="checkmark"></span>
            </label>
            <div class="form-group">
                <div class="text-center reset-btn">
                    <button type="submit" class="btn btn-primary btn-block btn-outline-primary">{{ __('customer.login') }}</button>
                </div>
            </div>
        </form>

    </div>
    <br />

    <div class="other-links form-group">
        <ul>
            <li><a href="{{ url(LaravelLocalization::getURLFromRouteNameTranslated(app()->getLocale(),'customer.routes.FORGOT_PASSWORD_LINK')) }}" >@lang('customer.FORGET_PASSWORD')</a></li>
        </ul>
    </div>
</div>

@endsection
