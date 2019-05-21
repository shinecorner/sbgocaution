<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="ltr">

<head>

    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <title>{{ __('crm.login') }}</title>

    <!--=======================CSS=============================-->
    <link rel="stylesheet" href="{{mix('Login/assets/styles/css/themes/lite-purple.min.css')}}">
    <!--=======================CSS=============================-->

    <!--=======================Font CSS=============================-->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Exo:400,700" rel="stylesheet" type="text/css" />
    <!--=======================Font CSS=============================-->

    <!--=======================js=============================-->
    <script src="/Login/assets/js/common-bundle-script.js"></script>
    <!--=======================js=============================-->

</head>

<body class="login-main">

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

                    <div class="login-content Site-content">
                        <div class="login-form-module">
                            <div class="login-wrap login-form" style="display:block">
                                <div class="login">
                                    <h3 class="login-top-title">{{ __('login.login_title') }} Vermieter-{{ __('crm.login') }}</h3>
                                    <hr />
                                    <form style="margin-top: -10px;" action="{{ route('password.update', app()->getLocale()) }}" method="post" class="form-horizontal">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="token" value="{{ $token }}">
                                        <fieldset>

                                          <div class="form-group">
                                              <div class="control-label">
                                                  <label id="new_password" for="new_password" class="required">
                                                      {{ __('login.username') }}<span class="star">&#160;*</span></label>
                                              </div>
                                              <div class="controls">
                                                  <input type="password" name="email" id="email" value="" class="validate-username required" size="25" required aria-required="true" autofocus />
                                                  <div class="error">{{ $errors->first('email') }}</div>
                                              </div>
                                          </div>
                                            <div class="form-group">
                                                <div class="control-label">
                                                    <label id="new_password" for="new_password" class="required">
                                                        {{ __('login.new_password') }}<span class="star">&#160;*</span></label>
                                                </div>
                                                <div class="controls">
                                                    <input type="password" name="password" id="password" value="" class="validate-username required" size="25" required aria-required="true" autofocus />
                                                    @if ($errors->has('password'))
                                                      <div class="error">{{ $errors->first('new_password') }}</div>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="control-label">
                                                    <label id="new_password" for="new_password" class="required">
                                                        {{ __('login.confirm_password') }}<span class="star">&#160;*</span></label>
                                                </div>
                                                <div class="controls">
                                                    <input type="password" name="password_confirmation" id="password_confirmation" value="" class="validate-username required" size="25" required aria-required="true" autofocus />

                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="text-center" style="padding-top: 10px; padding-left: 0px; padding-right: 0px;">
                                                    <button type="submit" class="btn btn-primary btn-block">{{ __('login.reset') }}</button>
                                                </div>
                                            </div>
                                        </fieldset>
                                    </form>

                                </div>
                                <br />

                                <div class="other-links form-group">
                                    <ul>
                                        <li><a href="#" onclick="show_forget_password('forgetPassword')">@lang('crm.COM_USERS_LOGIN_RESET')</a></li>

                                    </ul>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="login-bottom-block hidden-xs">
                        <br/>
                        <div style="text-align: center; font-size: 15px">{{ __('login.support')}}
                            <br><b>0800 461 461</b></div>
                        <div class="logo text-center">
                            <div class="logo-image">
                                <a href="#" title="goCaution® Vermieter-Login">
                                    <img class="logo-img" src="{{ asset('Login/images/logo_de.png') }}" alt="goCaution® Vermieter-Login" />
                                    <span>{{ __('login.login_title') }}</span>
                                </a>
                                <small class="site-slogan">{{ __('login.login_title') }}</small>
                            </div>
                        </div>
                        <div style="text-align: center; font-size: 9px; margin-bottom: 20px;">
                            goCaution AG - Freiburgstrasse 574 - 3172 Niederwangen</div>
                    </div>
                </div>

                <div class="column-flexible">
                    <div class="promo-inner">

                        <div class="custom">
                            <h1>{{ __('login.login_page_description_title') }}</h1>
                            <p>{{ __('login.login_page_description_line_one') }}
                                <br class="hidden-xs">{{ __('login.login_page_description_line_two') }}</p>
                            <p class="section-text">{{ __('login.login_page_description_line_three') }}
                                <br class="hidden-xs">{{ __('login.login_page_description_line_four') }}</p>
                        </div>
                        <div class="clearfix form-group">

                            <button type="button" class="btn btn-default" data-toggle="modal" data-target=".new-account-request">{{ __('login.request_access') }}</button>
                            <div class="modal fade new-account-request" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
                                <div class="modal-dialog modal-sm" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title text-center" id="myModalLabel">
        <span class="clearfix"><i class="fa fa-check-circle fa-3x" aria-hidden="true"></i></span>
        <span class="clearfix">{{ __('login.login_page_request_policy') }}</span>
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
                        <div style="text-align: center; font-size: 15px">{{ __('login.support') }}
                            <br><b>0800 461 461</b></div>
                        <div class="logo text-center">
                            <div class="logo-image">
                                <a href="#" title="goCaution® Vermieter-Login">
                                    <img class="logo-img" src="{{ asset('Login/images/logo_de.png') }}" alt="goCaution® Vermieter-Login" />
                                    <span>{{ __('login.login_title') }}</span>
                                </a>
                                <small class="site-slogan">{{ __('login.login_title') }}</small>
                            </div>
                        </div>
                        <div style="text-align: center; font-size: 9px; margin-bottom: 20px;">goCaution AG - Freiburgstrasse 574 - 3172 Niederwangen</div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</body>


</html>
