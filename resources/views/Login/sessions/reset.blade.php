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

                            <!-- Forget password -->
                            <div class="login-wrap forgetPassword-form">
                                <div class="login">
                                    <h3 class="login-top-title">{{ __('login.login_title') }} Vermieter-{{ __('login.forget_password')}}</h3>
                                    <hr />
                                    <form style="margin-top: -10px;" action="{{ url( app()->getLocale(),'passwordEmail') }}" method="post" class="form-horizontal">
                                        {{ csrf_field() }}
                                        <fieldset>
                                          @if (session('status'))
                                              <div class="alert alert-success" role="alert">
                                                  {{ session('status') }}
                                              </div>
                                          @endif

                                            <div class="form-group">
                                                <div class="control-label">
                                                    <label id="username-lbl" for="username" class="required">
                                                        {{ __('login.username') }}<span class="star">&#160;*</span></label>
                                                </div>
                                                <div class="controls">
                                                    <input type="text" name="email" value="{{ old('email') }}" class="validate-username required" size="25" required aria-required="true" autofocus />
                                                      @if ($errors->has('email'))
                                                        <div class="error">{{ $errors->first('email') }}</div>
                                                      @endif
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
                                        <li><a href ="{{url(app()->getLocale())}}" >{{ __('login.back_to_login') }}</a></li>
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
            </div>
        </div>

    </div>

</body>
<script>

    $(document).ready(function() {
        var lang = $(location).attr('href');
         var selectedLang = lang.substr(lang.length - 3);
         if (selectedLang == '/it') $("#languagechange").val('it');
         else if (selectedLang == '/fr') $("#languagechange").val('fr');
         else if (selectedLang == '/de') $("#languagechange").val('de');
         else if (selectedLang == '/en') $("#languagechange").val('en');
    });

    $('.languagechange').click(function() {
       var langName = $(this).text();
       alert($(this).find( "img" ));
        // var lang = $(this).attr('data-content');
        // var pageURL = $(location).attr('href').split("/").splice(0, 3).join("/");
        // window.location.href = pageURL + "/" + lang;
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
