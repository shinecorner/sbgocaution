<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="ltr">

<head>

    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <title>{{ __('login.login') }}</title>

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
                                    <h3 class="login-top-title">{{ __('login.login_title') }} Vermieter-{{ __('login.login') }}</h3>
                                    <hr />
                                    <form style="margin-top: -10px;" action="{{ route('doLogin', app()->getLocale()) }}" method="post" class="form-horizontal">
                                        {{ csrf_field() }}
                                        <fieldset>
                                            @if(Session::has('message'))
                                            <p class="alert alert-info cstm-alert">{{ __('login.'.Session::get('message')) }}</p>
                                            @endif

                                            @if(Session::has('error'))
                                            <p class="alert alert-info cstm-alert error">{{ __('login.'.Session::get('error')) }}</p>
                                            @endif

                                            <div class="form-group">
                                                <div class="control-label">
                                                    <label id="username-lbl" for="username" class="required">
                                                        {{ __('login.username') }}<span class="star">&#160;*</span></label>
                                                </div>
                                                <div class="controls">
                                                    <input type="text" name="username" value="{{ Cookie::get('login_username') }}" id="username" value="" class="validate-username required" size="25" required aria-required="true" autofocus />
                                                    <div class="error">{{ $errors->first('username') }}</div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="control-label">
                                                    <label id="password-lbl" for="password" class="required">
                                                        {{ __('login.password') }}<span class="star">&#160;*</span></label>
                                                </div>
                                                <div class="controls">
                                                    <input type="password" name="password" value="{{ Cookie::get('login_password') }}" id="password" value="" class="validate-password required" size="25" maxlength="99" required aria-required="true" /> </div>
                                                <div class="error">{{ $errors->first('password') }}</div>
                                            </div>

                                            <div class="form-group">
                                                <div class="control-label">
                                                    <label id="username-lbl" for="username" class="required">
                                                        {{ __('login.language') }}<span class="star">&nbsp;*</span></label>
                                                </div>
                                                <!-- <select class="selectpicker lang width100" data-width="fit" id="languagechange">
                                                  <option data-content='<span class="flag-icon flag-icon-us"></span> English'>English</option>
                                                   <option  data-content='<span class="flag-icon flag-icon-mx"></span> Español'>Español</option>
                                                    <option data-content='<span class="flag-icon flag-icon-us"></span> Deutsch' value="de" data-content='Deutsch'>{{ __('login.org_language_de') }}</option>
                                                    <option data-content='<span class="flag-icon flag-icon-us"></span> Französisch' value="fr" data-content='Französisch'>{{ __('login.org_language_fr') }}</option>
                                                    <option data-content='<span class="flag-icon flag-icon-us"></span> Italienisch' value="it" data-content='Italienisch'>{{ __('login.org_language_it') }}</option>
                                                    <option data-content='<span class="flag-icon flag-icon-us"></span> English' value="en" data-content='English'>{{ __('login.org_language_en') }}</option>
                                                </select> -->
                                                <div class="cstm-dropdown">
                                                  <a href="#" class="js-link"><span class="flag-icon"><img id="selected_img" data-v-d7480896="" src="/static/flag-icons/de.png"></span><span id="selected_lang">Deutsch</span><i class="fa fa-chevron-down"></i></a>
                                                  <ul class="js-dropdown-list">
                                                    <li  data-content="de" class="languagechange"><span class="flag-icon"><img data-v-d7480896="" src="/static/flag-icons/de.png"></span> Deutsch</li>
                                                    <li  data-content="fr" class="languagechange"><span class="flag-icon"><img data-v-d7480896="" src="/static/flag-icons/fr.png"></span> Französisch</li>
                                                    <li  data-content="it" class="languagechange"><span class="flag-icon"><img data-v-d7480896="" src="/static/flag-icons/it.png"></span> Italienisch</li>
                                                    <li  data-content="en" class="languagechange"><span class="flag-icon"><img data-v-d7480896="" src="/static/flag-icons/en.png"></span> English</li>
                                                  </ul>
                                                </div>


                                            </div>

                                            <div class="form-group">
                                                <div class="checkbox">
                                                    <label>

                                                        <input id="remember" type="checkbox" @if (Cookie::get('login_remember')) checked @endif name="remember" value="yes" />{{ __('login.com_users_login_remember_me') }}</label>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="text-center" style="padding-top: 10px; padding-left: 0px; padding-right: 0px;">
                                                    <button type="submit" class="btn btn-primary btn-block">{{ __('login.login') }}</button>
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
                            <!-- Forget password -->
                            <div class="login-wrap forgetPassword-form" style="display:none">
                                <div class="login">
                                    <h3 class="login-top-title">{{ __('login.login_title') }} Vermieter-</h3>
                                    <hr />
                                    <form style="margin-top: -10px;" action="{{ route('getResetLink', app()->getLocale()) }}" method="post" class="form-horizontal">
                                        {{ csrf_field() }}
                                        <fieldset>
                                            @if(Session::has('message'))
                                            <p class="alert cstm-alert alert-info">{{ Session::get('message') }}</p>
                                            @endif

                                            <div class="form-group">
                                                <div class="control-label">
                                                    <label id="username-lbl" for="username" class="required">
                                                        {{ __('login.username') }}<span class="star">&#160;*</span></label>
                                                </div>
                                                <div class="controls">
                                                    <input type="text" name="username" value="" id="username" value="" class="validate-username required" size="25" required aria-required="true" autofocus />
                                                    <div class="error">{{ $errors->first('username') }}</div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="text-center" style="padding-top: 10px; padding-left: 0px; padding-right: 0px;">
                                                    <button type="submit" class="btn btn-primary btn-block">{{ __('login.get_reset_link') }}</button>
                                                </div>
                                            </div>
                                        </fieldset>
                                    </form>
                                </div>
                                <br />

                                <div class="other-links form-group">
                                    <ul>
                                        <li><a href ="#" onclick="show_forget_password('login')">{{ __('login.back_to_login') }}</a></li>
                                    </ul>
                                </div>
                            </div>
                            <!-- from end -->

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
                            <!-- <div class="modal fade new-account-request" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
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
                            </div> -->

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
<script>

    $(document).ready(function() {
        var lang = $(location).attr('href');
         var selectedLang = lang.substr(lang.length - 3);
         if (selectedLang == '/it'){
           $('#selected_img').attr('src','/static/flag-icons/it.png');
           $('#selected_lang').text(" Italienisch");
         }
         else if (selectedLang == '/fr'){
           $('#selected_img').attr('src','/static/flag-icons/fr.png');
           $('#selected_lang').text(" Französisch");
         }
         else if (selectedLang == '/de'){
           $('#selected_img').attr('src','/static/flag-icons/de.png');
           $('#selected_lang').text(" Deutsch");
         }
         else{
           $('#selected_img').attr('src','/static/flag-icons/en.png');
           $('#selected_lang').text(" English");
         }
    });

    $('.languagechange').click(function() {

        var lang = $(this).attr('data-content');
        var pageURL = $(location).attr('href').split("/").splice(0, 3).join("/");
        window.location.href = pageURL + "/" + lang;
    });

    function show_forget_password(openFrom) {
        if (openFrom == 'forgetPassword') {
            $(".forgetPassword-form").css("display", "block");
            $('.login-form').css("display", "none");
        } else {
            $(".forgetPassword-form").css("display", "none");
            $('.login-form').css("display", "block");
        }
    }
    $(function() {
      var list = $('.js-dropdown-list');
      var link = $('.js-link');
      link.click(function(e) {
        e.preventDefault();
        list.slideToggle(200);
      });
      list.find('li').click(function() {
        var text = $(this).html();
        var icon = '<i class="fa fa-chevron-down"></i>';
        link.html(text+icon);
        list.slideToggle(200);
        if (text === '* Reset') {
          link.html('Select one option'+icon);
        }
      });
    });
</script>

</html>
