<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="ltr">

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
                                    <form style="margin-top: -10px;" action="{{ url(app()->getLocale(),'login') }}" method="post" class="form-horizontal">
                                        {{ csrf_field() }}
                                        <fieldset>

                                            <div class="form-group">
                                                <div class="control-label">
                                                    <label id="username-lbl" for="username" class="required">
                                                        {{ __('login.username') }}<span class="star">&#160;*</span></label>
                                                </div>
                                                <div class="controls">
                                                    <input type="text" name="email" value="{{ Cookie::get('login_username') }}" id="email" value="" class="validate-username required" size="25" required aria-required="true" autofocus />
                                                    <div class="error">{{ $errors->first('email') }}</div>
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
                                                <div class="checkbox">
                                                    <label>

                                                        <input id="remember" type="checkbox"  name="remember" value="yes" />{{ __('login.com_users_login_remember_me') }}</label>
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
                                      <!-- <li><a href="#" onclick="show_forget_password('forgetPassword')">@lang('crm.COM_USERS_LOGIN_RESET')</a></li> -->
                                        <li><a href="{{ url(app()->getLocale(), 'passwordRequest') }}" >@lang('crm.COM_USERS_LOGIN_RESET')</a></li>

                                    </ul>
                                </div>
                            </div>
                            <!-- Forget password -->
                            <div class="login-wrap forgetPassword-form" style="display:none">
                                <div class="login">
                                    <h3 class="login-top-title">{{ __('login.login_title') }} Vermieter-</h3>
                                    <hr />
                                    <form style="margin-top: -10px;" action="" method="post" class="form-horizontal">
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
                <div class="position-absolute">
                  <div class="mod-languages">
                      <div class="btn-group">
                          <a href="#" data-toggle="dropdown" class="btn dropdown-toggle">
                              <span class="caret"></span> &nbsp;
                              <img id="selected_img" src="{{asset('/static/flag-icons/de.png')}}" alt="" /><span id="selected_lang"> Deutsch </span></a>
                              <ul class="lang-block dropdown-menu" dir="ltr">
                                  <li data-content="de" class="languagechange"><a href="#"><img src="{{asset('/static/flag-icons/de.png')}}" alt="" /> Deutsch </a></li>
                                  <li data-content="fr" class="languagechange"><a href="#"><img src="{{asset('/static/flag-icons/fr.png')}}" alt="" /> Français </a></li>
                                  <li data-content="it" class="languagechange"><a href="#"><img src="{{asset('/static/flag-icons/it.png')}}" alt="" /> Italienisch </a></li>
                                  <li data-content="en" class="languagechange"><a href="#"><img src="{{asset('/static/flag-icons/en.png')}}" alt="" /> English </a></li>
                              </ul>
                      </div>
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
