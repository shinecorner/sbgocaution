<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="ltr">

<head>

    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
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
<body class="login-wrapper">
    <div class="page-wrapper">
        <div class="login-inner-wrapper">
            <div class="@if(Request::path() == app()->getLocale()) row login-grid @else row login-grid forgot-grid @endif">
                <div class="column-fixed Site">
                    <div class="login-header-block visible-xs">
                        <div class="logo">
                            <div class="logo-image">
                                <a href="#" title="{{ __('login.title') }}">
                                    <img class="logo-img" src="{{ asset('Login/assets/images/'.__('login.responsive_logo')) }}" alt="{{ __('login.title') }}" /> </a>
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
                        <div class="login-support"> <p class="log-support">{{ __('login.support') }}</p>
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
                            <button type="button" class="btn btn-raised btn-raised-secondary color-triplet" data-toggle="modal" data-target=".new-account-request"> {{ __('login.request_access') }}</button>
                        </div>
                    </div>
                    <span class="fixed-response">
                      <img src="{{ asset('Login/images/'.__('login.LOGIN_IMG')) }}">
                    </span>
                    <div class="login-bottom-block visible-xs clearfix">
                        <br/>
                        <div class="login-support">
                          {{ __('login.support') }}<br>
                          <b>{{ __('login.contact') }}</b></div>
                        <div class="logo text-center">
                            <div class="logo-image">
                                <a href="#" title="{{ __('login.title') }}">
                                    <img class="logo-img" src="{{ asset('Login/assets/images/'.__('login.logo_img')) }}" alt="{{ __('login.title') }}" />
                                    <span>{{ __('login.login_title') }}</span>
                                </a>
                                <small class="site-slogan">{{ __('login.login_title') }}</small>
                            </div>
                        </div>
                        <div class="mb-shift">{{ __('login.support_address') }}</div>
                    </div>


                @extends('Login.layouts.language-dropdown')
                </div>
            </div>
        </div>
    </div>
</body>
 <script src="{{asset('Login/assets/js/form.validation.script.js')}}"></script>
</html>
