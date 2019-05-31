@extends('My.layouts.login-layout')
@section('login')
<div class="login-wrap">
    <div class="login">
        <h3 class="login-top-title">{{ __('my.login_title') }}</h3>
        <hr />
        <form class="needs-validation no-cross" action="{{ url(__('my.routes.PASSWORD_UPDATE')) }}" method="post" novalidate>
          @csrf
          <input type="hidden" name="token" value="{{ $token }}">


            <div class="form-row">
                <div class="col-md-12 mb1">
                    <label for="validationCustom01">{{ __('my.username') }}<span class="star">&#160;*</span></label>
                    <input type="text" class="form-control" name="email" id="validationCustom01" placeholder="" value="" required>
                    <div class="invalid-feedback">
                        {{ __('my.username_required') }}
                    </div>
                    @if ($errors->has('email'))
                      <span class="red-alert">{{ $errors->first('email') }}</span>
                    @endif

                </div>
                <div class="col-md-12 mb1">
                    <label for="validationCustom02">{{ __('my.new_password') }}<span class="star">&#160;*</span></label>
                    <input type="password" class="form-control" name="password" id="validationCustom02" placeholder="" value="" required>
                    <div class="invalid-feedback">
                        {{ __('my.password_required') }}
                    </div>
                    @if ($errors->has('password'))
                      <div class="error" class="red-alert">{{ $errors->first('password') }}</div>
                    @endif
                </div>
                <div class="col-md-12 mb1">
                    <label for="validationCustom02">{{ __('my.confirm_password') }}<span class="star">&#160;*</span></label>
                    <input type="password" class="form-control" name="password_confirmation" id="validationCustom02" placeholder="" value="" required>
                    <div class="invalid-feedback">
                        {{ __('my.confirm_password_required') }}
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="text-center reset-btn" >
                    <button type="submit" class="btn btn-primary btn-block btn-outline-primary">{{ __('my.reset') }}</button>
                </div>
            </div>
        </form>

    </div>
    <br />

    <div class="other-links form-group">
        <ul>
          <li><a href="{{ url(app()->getLocale()) }}" >@lang('my.BACK_TO_LOGIN')</a></li>
        </ul>
    </div>
</div>
@endsection
