@extends('customer.layouts.login-layout')
@section('login')
<div class="login-wrap border-bot">
    <div class="login">
      <div class="other-links form-group  pt-41">
        <a class="users-back-button" href="{{ url('/') }}"><img src="{{asset('customer/images/icon-back.png')}}" alt="icon-back"> {{ __('customer.back') }}</a>
      </div>
        <!-- <h3 class="login-top-title">{{ __('customer.login_title') }}</h3> -->
        <div class="msg-login-forgot">
          <p>
            {{__('customer.forgot_text')}}
          </p>
        </div>
        <form class="needs-validation no-cross" action="{{ url(LaravelLocalization::getURLFromRouteNameTranslated(app()->getLocale(),'customer.routes.PASSWORD_EMAIL')) }}" method="post" novalidate>
            @csrf
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            @if ($errors->has('email'))
              <span class="red-alert">{{ $errors->first('email') }}</span>
            @endif
              <div class="form-row pt-7">
                  <div class="col-md-12 mb1">
                      <label data-toggle="popover" data-content="{{ __('customer.popover_data') }}" data-original-title="Adresse e-mail" for="validationCustom01">{{ __('customer.identifier') }}<span class="star">&#160;*</span></label>
                      <input type="text" class="form-control" name="email" id="validationCustom01" value="" required>
                      <div class="invalid-feedback">
                          {{ __('customer.username_required') }}
                      </div>
                  </div>
              </div>
            <br/>
            <div class="form-group">
                <div class="text-center reset-btn pt-0 mob-pb-10" >
                    <button type="submit" class="btn btn-primary btn-block btn-outline-primary">{{ __('customer.send_forgot_mail') }}</button>
                </div>
            </div>
        </form>
    </div>


</div>
<script>
   $("[data-toggle=popover]").popover({
     trigger : 'hover'
   });

</script>
@endsection
