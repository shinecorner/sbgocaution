<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="ltr">

<head>

    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <title>{{ __('login.LOGIN') }}</title>
    <link rel="icon" href="{{ asset('favicon.png') }}" type="image/png">

    <!--=======================CSS=============================-->
    <link rel="stylesheet" href="{{mix('Landlord/assets/styles/css/themes/lite-green.min.css')}}">
    <!--=======================CSS=============================-->

    <!--=======================js=============================-->
    <script src="/Landlord/assets/js/common-bundle-script.js"></script>
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
                                <a href="#" title="{{ __('login.TITLE') }}">
                                    <img class="logo-img" src="{{ asset('Landlord/assets/images/'.__('login.RESPONSIVE_LOGO')) }}" alt="{{ __('login.TITLE') }}" /> </a>
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
                        <div class="login-support"> <p class="log-support">{{ __('login.SUPPORT') }}</p>
                            <b>{{ __('login.CONTACT') }}</b></div>
                        <div class="logo text-center">
                            <div class="logo-image">
                                <a href="#" title="{{ __('login.TITLE') }}">
                                    <img class="logo-img" src="{{ asset('Landlord/images/'.__('login.LOGO_IMG')) }}" alt="{{ __('login.TITLE') }}" />
                                    <span>{{ __('login.LOGIN_TITLE') }}</span>
                                </a>
                                <small class="site-slogan">{{ __('login.LOGIN_TITLE') }}</small>
                            </div>
                        </div>
                        <div class="address-content">
                            {{__('login.SUPPORT_ADDRESS')}}</div>
                    </div>
                </div>

                  <div class="column-flexible">
                    <div class="promo-inner">
                        <div class="custom">
                            <h1>{{ __('login.LOGIN_PAGE_DESCRIPTION_TITLE') }}</h1>
                            <p>{{ __('login.LOGIN_PAGE_DESCRIPTION_LINE_ONE') }}
                                <br class="hidden-xs">{{ __('login.LOGIN_PAGE_DESCRIPTION_LINE_TWO') }}</p>
                            <p class="section-text">{{ __('login.LOGIN_PAGE_DESCRIPTION_LINE_THREE') }}
                                <br class="hidden-xs">{{ __('login.LOGIN_PAGE_DESCRIPTION_LINE_FOUR') }}</p>
                        </div>
                        <div class="clearfix form-group">
                            <button type="button" class="btn btn-raised btn-raised-secondary color-triplet" data-toggle="modal" data-target=".new-account-request"> {{ __('login.REQUEST_ACCESS') }}</button>
                        </div>
                    </div>
                    <span class="fixed-response">
                      <img src="{{ asset('Landlord/images/'.__('login.LOGIN_IMG')) }}">
                    </span>
                    <div class="login-bottom-block visible-xs clearfix">
                        <br/>
                        <div class="login-support">
                          {{ __('login.SUPPORT') }}<br>
                          <b>{{ __('login.CONTACT') }}</b></div>
                        <div class="logo text-center">
                            <div class="logo-image">
                                <a href="#" title="{{ __('login.TITLE') }}">
                                    <img class="logo-img" src="{{ asset('Landlord/assets/images/'.__('login.LOGO_IMG')) }}" alt="{{ __('login.TITLE') }}" />
                                    <span>{{ __('login.LOGIN_TITLE') }}</span>
                                </a>
                                <small class="site-slogan">{{ __('login.LOGIN_TITLE') }}</small>
                            </div>
                        </div>
                        <div class="mb-shift">{{ __('login.SUPPORT_ADDRESS') }}</div>
                    </div>


                @extends('Landlord.layouts.language-dropdown')
                </div>
            </div>
        </div>
    </div>
</body>
 <script src="{{asset('Landlord/assets/js/form.validation.script.js')}}"></script>
</html>
