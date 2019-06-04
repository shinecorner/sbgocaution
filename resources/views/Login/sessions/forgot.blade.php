@extends('Login.layouts.login-layout')
@section('login')

  <div class="login-wrap border-bot ">
    <form class="needs-validation no-cross" action="{{ url(LaravelLocalization::getURLFromRouteNameTranslated(app()->getLocale(),'login.routes.PASSWORD_EMAIL')) }}" method="post" novalidate>
      <a class="users-back-button" href="javascript:history.go(-1)"><i class="fa fa-long-arrow-left"></i> Zurück</a>
				<p>Bitte eine E-Mail-Adresse für das Benutzerkonto eingeben. Ein Bestätigungscode wird dann an diese verschickt. Sobald der Code vorliegt, kann ein neues Passwort für das Benutzerkonto festgelegt werden.</p>
        @csrf
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        @if ($errors->has('email'))
          <span class="red-alert">{{ $errors->first('email') }}</span>
        @endif
        <div class="input-wrapper">
            <label for="validationTooltipUsername">{{ __('login.identifier') }}<span class="star">&#160;*</span></label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="validationTooltipUsernamePrepend"><i class="fa fa-user" aria-hidden="true"></i></span>
                </div>
                <input type="text" class="form-control" name="email" id="validationTooltipUsername" placeholder="{{ __('login.identifier') }}" aria-describedby="validationTooltipUsernamePrepend" required="">
                <div class="invalid-feedback">
                    {{ __('login.username_required') }}
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="text-center reset-btn">
                <button type="submit" class="btn btn-success btn-block">{{ __('login.send_forgot_mail') }}</button>
            </div>
        </div>
    </form>
</div>

<!-- <div class="login-wrap border-bot">
    <div class="login">
      <div class="other-links form-group  pt-25">
        <a class="users-back-button" href="{{ url(app()->getLocale()) }}"><i class="fa fa-long-arrow-left" aria-hidden="true"></i>{{ __('login.back') }}</a>
      </div>

        <div class="msg-login-forgot">
          <p>
            {{__('login.forgot_text')}}
          </p>
        </div>
        <form class="needs-validation no-cross" action="{{ url(LaravelLocalization::getURLFromRouteNameTranslated(app()->getLocale(),'login.routes.PASSWORD_EMAIL')) }}" method="post" novalidate>
            @csrf
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            @if ($errors->has('email'))
              <span class="red-alert">{{ $errors->first('email') }}</span>
            @endif
            <div class="input-wrapper">
                <label for="validationTooltipUsername">{{ __('login.identifier') }}<span class="star">&#160;*</span></label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="validationTooltipUsernamePrepend"><i class="fa fa-user" aria-hidden="true"></i></span>
                    </div>
                    <input type="text" class="form-control" name="email" id="validationTooltipUsername" placeholder="{{ __('login.identifier') }}" aria-describedby="validationTooltipUsernamePrepend" required="">
                    <div class="invalid-feedback">
                        {{ __('login.username_required') }}
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="text-center reset-btn">
                    <button type="submit" class="btn btn-success btn-block">{{ __('login.send_forgot_mail') }}</button>
                </div>
            </div>
        </form>
    </div>
</div> -->
<script>
   $("[data-toggle=popover]").popover({
     trigger : 'hover'
   }
   );

</script>
@endsection
