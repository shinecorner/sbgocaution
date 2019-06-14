<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="ltr">

<head>

    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <title>{{ __('landlord/login.LOGIN') }}</title>
    <link rel="icon" href="{{ asset('favicon.png') }}" type="image/png">

    <!--=======================CSS=============================-->
    <link rel="stylesheet" href="{{mix('landlord/assets/styles/css/themes/lite-green.min.css')}}">
    <!--=======================CSS=============================-->

    <!--=======================js=============================-->
    <script src="/landlord/assets/js/common-bundle-script.js"></script>
    <!--=======================js=============================-->

</head>
<body class="login-wrapper">
    <div class="page-wrapper">
        <div class="login-inner-wrapper">
            <div class="@if(Request::path() == app()->getLocale()) row login-grid @else row login-grid forgot-grid @endif">
                <div class="column-fixed vh-min-100">
                    <div class="login-header-block d-block d-md-none mob-header">
                        <div class="logo">
                            <div class="logo-image">
                                <a href="#" title="{{ __('login.TITLE') }}">
                                    <img class="logo-img" src="{{ asset('landlord/assets/images/'.__('landlord/login.RESPONSIVE_LOGO')) }}" alt="{{ __('landlord/login.TITLE') }}" /> </a>
                            </div>
                        </div>
                    </div>

                    <div class="login-content Site-content">
                        <div class="login-form-module">
                            @yield('login')
                        </div>
                    </div>

                    <div class="login-bottom-block d-none d-md-block">
                        <br/>
                        <div class="login-support"> <p class="log-support">{{ __('landlord/login.SUPPORT.SUPPORT') }}</p>
                            <b>{{ __('landlord/login.SUPPORT.MOBILE') }}</b></div>
                        <div class="logo text-center">
                            <div class="logo-image">
                                <a href="#" title="{{ __('landlord/login.TITLE') }}">
                                    <img class="logo-img" src="{{ asset('landlord/images/'.__('landlord/login.LOGO_IMG')) }}" alt="{{ __('landlord/login.TITLE') }}" />
                                    <span>{{ __('landlord/login.LOGIN_TITLE') }}</span>
                                </a>
                                <small class="site-slogan">{{ __('landlord/login.LOGIN_TITLE') }}</small>
                            </div>
                        </div>
                        <div class="address-content">
                            {{__('landlord/login.SUPPORT.SUPPORT_ADDRESS')}}</div>
                    </div>
                </div>

                  <div class="column-flexible">
                    <div class="promo-inner">
                        <div class="custom">
                            <h1>{{ __('landlord/login.LOGIN_PAGE_DESCRIPTION.TITLE') }}</h1>
                            <p>{{ __('landlord/login.LOGIN_PAGE_DESCRIPTION.LINE_ONE') }}
                                <br class="hidden-xs">{{ __('landlord/login.LOGIN_PAGE_DESCRIPTION.LINE_TWO') }}</p>
                            <p class="section-text">{{ __('landlord/login.LOGIN_PAGE_DESCRIPTION.LINE_THREE') }}
                                <br class="hidden-xs">{{ __('landlord/login.LOGIN_PAGE_DESCRIPTION.LINE_FOUR') }}</p>
                        </div>
                        <div class="clearfix form-group">
                            <button type="button" class="btn btn-raised btn-raised-secondary color-triplet" data-toggle="modal" data-target=".new-account-request"> {{ __('landlord/login.REQUEST_ACCESS') }}</button>
                        </div>
                    </div>
                    <span class="fixed-response">
                      <img src="{{ asset('landlord/images/'.__('landlord/login.LOGIN_IMG')) }}">
                    </span>
                    <div class="login-bottom-block d-block d-md-none clearfix">
                        <br/>
                        <div class="login-support">
                          {{ __('landlord/login.SUPPORT.SUPPORT') }}<br>
                          <b>{{ __('landlord/login.SUPPORT.MOBILE') }}</b></div>
                        <div class="logo text-center">
                            <div class="logo-image">
                                <a href="#" title="{{ __('landlord/login.TITLE') }}">
                                    <img class="logo-img" src="{{ asset('landlord/assets/images/'.__('landlord/login.LOGO_IMG')) }}" alt="{{ __('landlord/login.TITLE') }}" />
                                    <span>{{ __('landlord/login.LOGIN_TITLE') }}</span>
                                </a>
                                <small class="site-slogan">{{ __('landlord/login.LOGIN_TITLE') }}</small>
                            </div>
                        </div>
                        <div class="mb-shift">{{ __('landlordlogin.SUPPORT.SUPPORT_ADDRESS') }}</div>
                    </div>


                @extends('landlord.layouts.language-dropdown')
                </div>
            </div>
        </div>
    </div>
</body>
 <script src="{{asset('landlord/assets/js/form.validation.script.js')}}"></script>
</html>
