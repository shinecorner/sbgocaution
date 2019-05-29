<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="ltr">

<head>

    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <title>{{ __('login.login') }}</title>
    <link rel="icon" href="{{ asset('favicon.png') }}" type="image/png">
    <!--=======================CSS=============================-->
    <link rel="stylesheet" href="{{mix('Login/assets/styles/css/themes/lite-green.min.css')}}">
    <!--=======================CSS=============================-->

    <!--=======================js=============================-->
    <script src="/Login/assets/js/common-bundle-script.js"></script>

    <!--=======================js=============================-->

</head>

<body class="login-main">
    <div class="t3-wrapper t3-login-wrap">
        <div class="t3-login ">
            <div class="@if(Request::path() == app()->getLocale()) row login-grid @else row login-grid forgot-grid @endif">
                <div class="column-fixed Site">
                    <div class="login-header-block visible-xs">
                        <div class="logo">
                            <div class="logo-image">
                                <a href="#" title="{{ __('login.title') }}">
                                    <img class="logo-img" src="{{ asset('Login/assets/images/logo-w.png') }}" alt="{{ __('login.title') }}" /> </a>
                            </div>
                        </div>
                    </div>

                    <div class="login-content Site-content">
                        <div class="login-form-module">
                            @yield('login')
                        </div>
                    </div>

                    <div class="login-bottom-block hidden-xs">
                        <br/>
                        <div class="login-support"> <p class="log-support">SUPPORT</p>
                            <b>{{ __('login.contact') }}</b></div>
                        <div class="logo text-center">
                            <div class="logo-image">
                                <a href="#" title="{{ __('login.title') }}">
                                    <img class="logo-img" src="{{ asset('Login/images/'.__('login.logo_img')) }}" alt="{{ __('login.title') }}" />
                                    <span>{{ __('login.login_title') }}</span>
                                </a>
                                <small class="site-slogan">{{ __('login.login_title') }}</small>
                            </div>
                        </div>
                        <div class="address-content">
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

                            <button type="button" class="btn btn-default" data-toggle="modal" data-target=".new-account-request"> {{ __('login.request_access') }}</button>

                        </div>
                    </div>
                    <span class="fixed-response">
                      <img src="{{ asset('Login/images/'.__('login.LOGIN_IMG')) }}">
                    </span>
                    <div class="login-bottom-block visible-xs clearfix">
                        <br/>
                        <div class="login-support">
                          SUPPORT
                          <b>{{ __('login.contact') }}</b></div>
                        <div class="logo text-center">
                            <div class="logo-image">
                                <a href="#" title="{{ __('login.title') }}">
                                    <img class="logo-img" src="{{ asset('Login/images/'.__('login.logo_img')) }}" alt="{{ __('login.title') }}" />
                                    <span>{{ __('login.login_title') }}</span>
                                </a>
                                <small class="site-slogan">{{ __('login.login_title') }}</small>
                            </div>
                        </div>
                        <div class="mb-shift">goCaution AG - Freiburgstrasse 574 - 3172 Niederwangen</div>
                    </div>
                </div>

                <div class="position-absolute">
                  <div class="language-dropdown">
                      <div class="btn-group">
                          <a href="#" data-toggle="dropdown" class="btn dropdown-toggle">
                              <span class="caret"></span> &nbsp;
                              <img class="mx-15" id="selected_img" src="{{asset('/static/flag-icons/'.app()->getLocale().'.png') }}" alt="" /><span id="selected_lang">{{ __('login.'.app()->getLocale()) }}</span>
                            </a>
                              <ul class="lang-block dropdown-menu" dir="ltr">
                                @foreach(LaravelLocalization::getSupportedLocales() as $lang => $properties)
                                  <li data-content="{{$lang}}"><a href="{{LaravelLocalization::getLocalizedURL($lang)}}"><img class="mx-15 mR-5" src="{{asset('/static/flag-icons/'.$lang.'.png')}}" alt="" /> {{ __('login.'.$lang) }}</a></li>
                                @endforeach
                              </ul>
                      </div>
                  </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script>

    $('.languagechange').click(function() {
        var lang = $(this).attr('data-content');
        var url =$(location).attr('href');
        var segments = url.split("/");
        var language_segments = segments[segments.length-(segments.length-3)];
        window.location.href = url.replace(language_segments, lang);
    });


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

 <script src="{{asset('Login/assets/js/form.validation.script.js')}}"></script>




</html>