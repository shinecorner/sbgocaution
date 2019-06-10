@extends('landlord.layouts.login-layout')
@section('login')

  <div class="login-wrap border-bot ">
    <form class="needs-validation no-cross" action="{{ url(LaravelLocalization::getURLFromRouteNameTranslated(app()->getLocale(),'landlord.routes.PASSWORD_EMAIL')) }}" method="post" novalidate>
      <a class="users-back-button" href="javascript:history.go(-1)"><i class="fa fa-long-arrow-left"></i> Zurück</a>
				<p>{{ __('landlord.FORGOT_PASSWORD_NOTE') }}</p>
        @csrf
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                <i class="fa fa-info-circle" aria-hidden="true"></i>
                <p>{{ session('status') }}</p>
            </div>
        @endif
        @if ($errors->has('email'))
          <span class="red-alert">{{ $errors->first('email') }}</span>
        @endif
        <div class="input-wrapper">
            <label for="validationTooltipEmail">{{ __('landlord.EMAIL') }}<span class="star">&#160;*</span></label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="validationTooltipEmailPrepend"><i class="fa fa-envelope" aria-hidden="true"></i></span>
                </div>
                <input type="text" class="form-control" name="email" id="validationTooltipEmail" placeholder="{{ __('landlord.EMAIL') }}" aria-describedby="validationTooltipEmail" required="">
                <div class="invalid-feedback">
                    {{ __('landlord.EMAIL_REQUIRED') }}
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="text-center reset-btn">
                <button type="submit" class="btn btn-success btn-block">{{ __('landlord.SEND_FORGOT_MAIL') }}</button>
            </div>
        </div>
    </form>
</div>


<script>
   $("[data-toggle=popover]").popover({
     trigger : 'hover'
   }
   );

</script>
@endsection
