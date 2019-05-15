<!DOCTYPE html>
<html lang="de-ch" dir="ltr">

<head>

    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <title>login</title>

    <!--=======================CSS=============================-->
    <link id="gull-theme" rel="stylesheet" href="{{mix('Login/assets/styles/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('Login/assets/styles/css/custom.css')}}">
    <link href="{{ asset('Login/assets/styles/css/template.css') }}" rel="stylesheet" type="text/css" />

    <link href="{{ asset('Login/assets/styles/css/login-custom.css') }}" rel="stylesheet" type="text/css" />
    <!--=======================CSS=============================-->

    <!--=======================Font CSS=============================-->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Exo:400,700" rel="stylesheet" type="text/css" />
    <!--=======================Font CSS=============================-->

    <!--=======================js=============================-->
    <script src="/Login/assets/js/common-bundle-script.js"></script>
    <!--=======================js=============================-->

</head>
<body>



<div class="t3-wrapper t3-login-wrap">
<div class="t3-login ">
<div class="row login-grid">
<div class="column-fixed Site">
<div class="login-header-block visible-xs">
<div class="logo">
<div class="logo-image">
<a href="#" title="goCaution® Vermieter-Login">
    <img class="logo-img" src="{{ asset('Login/images/logo_de.png') }}" alt="goCaution® Vermieter-Login" /> </a>
</div>
</div>
</div>

<div id="system-message-container"></div>

<div class="login-content Site-content">


<div class="login-form-module">
<div class="login-wrap">
<div class="login">
    <h3 class="login-top-title">goCaution® Vermieter-Login</h3>
    <hr />
    <form style="margin-top: -10px;" action="{{ url('/doLogin') }}" method="post" class="form-horizontal">
      {{ csrf_field() }}
        <fieldset>
          @if(Session::has('message'))
          <p class="alert alert-info">{{ Session::get('message') }}</p>
          @endif
            <div class="form-group">
                <div class="control-label">
                    <label id="username-lbl" for="username" class="required">
                        @lang('username')<span class="star">&#160;*</span></label>
                </div>
                <div class="controls">
                    <input type="text" name="username" value="sandeep.p@gocaution.ch" id="username" value="" class="validate-username required" size="25" required aria-required="true" autofocus />
                    <div class="error">{{ $errors->first('username') }}</div>
                </div>
            </div>
            <div class="form-group">
                <div class="control-label">
                    <label id="password-lbl" for="password" class="required">
                        @lang('password')<span class="star">&#160;*</span></label>
                </div>
                <div class="controls">
                    <input type="password" name="password" value="GoCrm@123" id="password" value="" class="validate-password required" size="25" maxlength="99" required aria-required="true" /> </div>
                    <div class="error">{{ $errors->first('password') }}</div>
            </div>

            <div class="form-group">
                <div class="control-label">
                    <label id="username-lbl" for="username" class="required">
                        @lang('language')<span class="star">&nbsp;*</span></label>
                </div>
                <select class="selectpicker lang width100" data-width="fit" id="languagechange">
                    <option value="de" data-content='Deutsch'>Deutsch</option>
                    <option value="fr" data-content='Französisch'>Französisch</option>
                    <option value="it" data-content='Italienisch'>Italienisch</option>
                    <option value="en" data-content='English'>English</option>
                </select>
            </div>

            <div class="form-group">
                <div class="checkbox">
                    <label><input id="remember" type="checkbox" name="remember" value="yes" />@lang('remember')</label>
                </div>
            </div>

            <div class="form-group">
                <div class="text-center" style="padding-top: 10px; padding-left: 0px; padding-right: 0px;">
                    <button type="submit" class="btn btn-primary btn-block">Login</button>
                </div>

            </div>
            <input type="hidden" name="return" value="" />
            <input type="hidden" name="" value="1" /> </fieldset>
    </form>
</div>
<br />

<div class="other-links form-group">
    <ul>
        <li><a href="#">Passwort vergessen?</a></li>
        <li><a href="#">Benutzername vergessen?</a></li>
    </ul>
</div>
</div>
</div>
</div>

<div class="login-bottom-block hidden-xs">
<br/>
<div style="text-align: center; font-size: 15px">SUPPORT
    <br><b>0800 461 461</b></div>
<div class="logo text-center">
    <div class="logo-image">
        <a href="#" title="goCaution® Vermieter-Login">
            <img class="logo-img" src="{{ asset('Login/images/logo_de.png') }}" alt="goCaution® Vermieter-Login" />
            <span>goCaution® Vermieter-Login</span>
        </a>
        <small class="site-slogan">goCaution® Vermieter-Login</small>
    </div>
</div>
   <div style="text-align: center; font-size: 9px; margin-bottom: 20px;">
   goCaution AG - Freiburgstrasse 574 - 3172 Niederwangen</div>
</div>
</div>

<div class="column-flexible">
<div class="promo-inner">

<div class="custom">
<h1>Mietkautionen online verwalten</h1>
<p>Mit unserem Vermieter-Login haben Sie stets den Überblick über die Mietkautionsbürgschaften Ihrer Mieter
    <br class="hidden-xs">und können alle notwenigen Schritte – von der Eröffnung über Mutationen bis hin zur Auflösung – digital erledigen.</p>
<p class="section-text">Die web-basierte Applikation ist sofort einsetzbar, intuitiv verständlich
    <br class="hidden-xs"> und am Lebenszyklus einer Kaution orientiert.</p>
</div>
<div class="clearfix form-group">


<button type="button" class="btn btn-default" data-toggle="modal" data-target=".new-account-request">Zugang anfordern</button>
<div class="modal fade new-account-request" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
<div class="modal-dialog modal-sm" role="document">
<div class="modal-content">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title text-center" id="myModalLabel">
        <span class="clearfix"><i class="fa fa-check-circle fa-3x" aria-hidden="true"></i></span>
        <span class="clearfix">Fordern Sie Ihren Zugang an und verwalten Sie die Mieter-Policen online.</span>
</h4>
</div>


<div class="modal-body">
<div class="moduletable">
<div class="rsform">
<form method="post" id="userForm" action="https://www.login.gocaution.ch/de">
<div id="rsform_error_4" style="display: none;">
    <p class="formRed">Please complete all required fields!</p>
</div>
<fieldset class="formContainer" id="rsform_4_page_0">
    <div class="row">
        <div class="col-sm-12">
            <div class="rsform-block rsform-block-text">
                <p style="color: #8dbf43">Gerne vereinbaren wir mit Ihnen einen telefonischen Termin und führen Sie mittels Bildschirmübertragung durch die Applikation, unabhängig davon, ob bereits Mieterinnen von Ihnen eine Kautionspolice bei uns abgeschlossen haben oder nicht.</p>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <div class="form-group rsform-block rsform-block-firmenname">
                <label class="control-label formControlLabel" data-toggle="tooltip" title="" for="Firmenname">Firmenname</label>
                <div class="formControls">
                    <input type="text" value="" size="40" name="form[Firmenname]" id="Firmenname" class="rsform-input-box form-control" />
                    <span class="help-block formValidation"><span id="component40" class="formNoError">Invalid Input</span></span>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group rsform-block rsform-block-name">
                <label class="control-label formControlLabel" data-toggle="tooltip" title="" for="Name">Name<strong class="formRequired">*</strong></label>
                <div class="formControls">
                    <input type="text" value="" size="20" name="form[Name]" id="Name" class="rsform-input-box form-control" />
                    <span class="help-block formValidation"><span id="component33" class="formNoError">Bitte ausfüllen</span></span>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <div class="form-group rsform-block rsform-block-vorname">
                <label class="control-label formControlLabel" data-toggle="tooltip" title="" for="Vorname">Vorname<strong class="formRequired">*</strong></label>
                <div class="formControls">
                    <input type="text" value="" size="20" name="form[Vorname]" id="Vorname" class="rsform-input-box form-control" />
                    <span class="help-block formValidation"><span id="component37" class="formNoError">Bitte ausfüllen</span></span>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group rsform-block rsform-block-adresse">
                <label class="control-label formControlLabel" data-toggle="tooltip" title="" for="Adresse">Adresse<strong class="formRequired">*</strong></label>
                <div class="formControls">
                    <input type="text" value="" size="40" name="form[Adresse]" id="Adresse" class="rsform-input-box form-control" />
                    <span class="help-block formValidation"><span id="component41" class="formNoError">Bitten geben Sie Ihre Adresse ein</span></span>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <div class="form-group rsform-block rsform-block-postleitzahl-und-ort">
                <label class="control-label formControlLabel" data-toggle="tooltip" title="" for="Postleitzahl und Ort">Postleitzahl und Ort<strong class="formRequired">*</strong></label>
                <div class="formControls">
                    <input type="text" value="" size="40" name="form[Postleitzahl und Ort]" id="Postleitzahl und Ort" class="rsform-input-box form-control" />
                    <span class="help-block formValidation"><span id="component42" class="formNoError">Bitten geben Sie Ihre PLZ und den Ort ein.</span></span>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group rsform-block rsform-block-mobile">
                <label class="control-label formControlLabel" data-toggle="tooltip" title="" for="Mobile">Telefon/Mobile<strong class="formRequired">*</strong></label>
                <div class="formControls">
                    <input type="text" value="" size="20" name="form[Mobile]" id="Mobile" class="rsform-input-box form-control" />
                    <span class="help-block formValidation"><span id="component38" class="formNoError">Bitte ausfüllen</span></span>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <div class="form-group rsform-block rsform-block-e-mail">
                <label class="control-label formControlLabel" data-toggle="tooltip" title="" for="E-Mail">E-Mail<strong class="formRequired">*</strong></label>
                <div class="formControls">
                    <input type="text" value="" size="20" name="form[E-Mail]" id="E-Mail" class="rsform-input-box form-control" />
                    <span class="help-block formValidation"><span id="component34" class="formNoError">Bitte geben Sie eine gültige E-Mail Adresse ein.</span></span>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="form-group rsform-block rsform-block-send">
                <label class="control-label formControlLabel" data-toggle="tooltip" title="" for="Send"></label>
                <div class="formControls">
                    <button type="submit" name="form[Send]" id="Send" class="rsform-submit-button  btn btn-primary">Senden</button>
                    <span class="help-block formValidation"></span>
                </div>
            </div>
        </div>
    </div>
</fieldset>
<input type="hidden" name="form[formId]" value="4" />
</form>
</div>
</div>
</div>
</div>
</div>
</div>

</div>
</div>


<img src="{{ asset('Login/images/vermieter-login-app.png') }}">
<div class="login-bottom-block visible-xs clearfix">
    <br/>
    <div style="text-align: center; font-size: 15px">SUPPORT
        <br><b>0800 461 461</b></div>
    <div class="logo text-center">
        <div class="logo-image">
            <a href="#" title="goCaution® Vermieter-Login">
                <img class="logo-img" src="{{ asset('Login/images/logo_de.png') }}" alt="goCaution® Vermieter-Login" />
                <span>goCaution® Vermieter-Login</span>
            </a>
            <small class="site-slogan">goCaution® Vermieter-Login</small>
        </div>
    </div>
    <div style="text-align: center; font-size: 9px; margin-bottom: 20px;">goCaution AG - Freiburgstrasse 574 - 3172 Niederwangen</div>
</div>
</div>
</div>

<div class="position-absolute">
<!-- <div class="mod-languages">
    <div class="btn-group">
        <a href="#" data-toggle="dropdown" class="btn dropdown-toggle">
            <span class="caret"></span> &nbsp;
            <img src="{{ asset('Login/images/de_ch.gif') }}" alt="" /> Deutsch </a>
        <ul class="lang-block dropdown-menu" dir="ltr">
            <li class="lang-active"><a href="#"><img src="Login/images/de_ch.gif" alt="" /> Deutsch </a></li>
            <li><a href="#"><img src="{{ asset('Login/Login/images/fr_fr.gif') }}" alt="" /> Français </a></li>
        </ul>
    </div>
</div> -->
</div>
</div>

</div>
</body>
<script>
$(document).ready(function(){
    var lang = $(location).attr('href');
    var selectedLang = lang.substr(lang.length - 3);
    if( selectedLang =='/it') $("#languagechange").val('it');
    else if( selectedLang == '/fr') $("#languagechange").val('fr');
    else if( selectedLang == '/de') $("#languagechange").val('de');
    else if( selectedLang == '/en') $("#languagechange").val('en');
});
  $('#languagechange').change(function(){
      var lang = $('#languagechange').val();
      var pageURL = $(location).attr('href').split("/").splice(0, 4).join("/");
      window.location.href=pageURL+"/"+lang;
  });
</script>
</html>
