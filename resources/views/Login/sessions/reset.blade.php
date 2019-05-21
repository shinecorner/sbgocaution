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
    <!-- <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Exo:400,700" rel="stylesheet" type="text/css" /> -->
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
                                        <sapn style="color:red;">{{ $errors->first('email') }}</span>
                                      @endif
                                        <div class="form-row">
                                            <div class="col-md-12 mb1">
                                                <label for="validationCustom01">{{ __('login.username') }}<span class="star">&#160;*</span></label>
                                                <input type="text" class="form-control" name="email" id="validationCustom01" placeholder="username" value="" required>
                                                <div class="invalid-feedback">
                                                    Please provide a valid username.
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="text-center" style="padding-top: 10px; padding-left: 0px; padding-right: 0px;">
                                                <button type="submit" class="btn btn-primary btn-block">{{ __('login.get_reset_link') }}</button>
                                            </div>
                                        </div>
                                    </form>

                                </div>
                                <br />

                                <div class="other-links form-group">
                                    <ul>
                                        <li><a href="{{ url(app()->getLocale()) }}" >@lang('login.BACK_TO_LOGIN')</a></li>
                                        <li><a href="#" >@lang('login.COM_USERS_USERNAME_RESET')</a></li>
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
                            {{__('login.support_address')}}</div>
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
                            @if(app()->getLocale()=='de')
                            <img class="mx-20 mR-5" id="selected_img" src="{{asset('/static/flag-icons/de.png')}}" alt="" /><span id="selected_lang"> Deutsch </span>
                            @elseif(app()->getLocale()=='fr')
                            <img class="mx-20 mR-5" id="selected_img" src="{{asset('/static/flag-icons/fr.png')}}" alt="" /><span id="selected_lang"> Français </span>
                            @elseif(app()->getLocale()=='it')
                            <img class="mx-20 mR-5" id="selected_img" src="{{asset('/static/flag-icons/it.png')}}" alt="" /><span id="selected_lang"> Italienisch </span>
                            @else
                            <img class="mx-20 mR-5" id="selected_img" src="{{asset('/static/flag-icons/en.png')}}" alt="" /><span id="selected_lang"> English </span>
                            @endif
                          </a>
                            <ul class="lang-block dropdown-menu" dir="ltr">
                                <li data-content="de" class="languagechange"><a href="#"><img class="mx-20 mR-5" src="{{asset('/static/flag-icons/de.png')}}" alt="" /> Deutsch </a></li>
                                <li data-content="fr" class="languagechange"><a href="#"><img class="mx-20 mR-5" src="{{asset('/static/flag-icons/fr.png')}}" alt="" /> Français </a></li>
                                <li data-content="it" class="languagechange"><a href="#"><img class="mx-20 mR-5" src="{{asset('/static/flag-icons/it.png')}}" alt="" /> Italienisch </a></li>
                                <li data-content="en" class="languagechange"><a href="#"><img class="mx-20 mR-5" src="{{asset('/static/flag-icons/en.png')}}" alt="" /> English </a></li>
                            </ul>
                    </div>
                  </div>
                </div>
            </div>

        </div>

    </div>

</body>


 <script src="{{asset('Login/assets/js/form.validation.script.js')}}"></script>

</html>
