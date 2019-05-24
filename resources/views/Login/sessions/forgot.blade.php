@extends('Login.layouts.login-layout')
@section('login')
<div class="login-wrap">
    <div class="login">
        <h3 class="login-top-title">{{ __('login.login_title') }}</h3>
        <hr />
        <form class="needs-validation no-cross" action="{{ url(app()->getLocale(),'passwordEmail') }}" method="post" novalidate>
            @csrf
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            @if ($errors->has('email'))
              <span class="red-alert">{{ $errors->first('email') }}</span>
            @endif
              <div class="form-row">
                  <div class="col-md-12 mb1">
                      <label for="validationCustom01">{{ __('login.username') }}<span class="star">&#160;*</span></label>
                      <input type="text" class="form-control" name="email" id="validationCustom01" placeholder="username" value="" required>
                      <div class="invalid-feedback">
                          {{ __('login.username_required') }}
                      </div>
                  </div>
              </div>

            <div class="form-group">
                <div class="text-center reset-btn" >
                    <button type="submit" class="btn btn-primary btn-block btn-outline-primary">{{ __('login.get_reset_link') }}</button>
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
