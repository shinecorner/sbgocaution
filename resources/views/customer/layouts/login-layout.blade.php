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
    <link rel="stylesheet" href="{{mix('customer/assets/styles/css/themes/lite-green.min.css')}}">

    <!--=======================CSS=============================-->

    <!--=======================js=============================-->
    <script src="/customer/assets/js/common-bundle-script.js"></script>
    
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
                                <a href="#" title="{{ __('customer/login.title') }}">
                                    <img class="logo-img" src="{{ asset('customer/assets/images/logo-w.png') }}" alt="{{ __('login.title') }}" /> </a>
                            </div>
                        </div>
                    </div>

                    <div class="login-content Site-content">
                        <div class="login-form-module">
                            @yield('login')
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <section class="middle_section">
            <div class="container">
                <div class="main_box">

                    <div class="row">
                        <div class="col-md-8">
                            <div class="left_box">
                                <h1>{{__('customer/login.YOUR_RENTAL_DEPOSIT_ALWAYS_IN_REACH')}}</h1>
                                <hr>
                                <p>{{__('customer/login.YOUR_RENTAL_DEPOSIT_ALWAYS_IN_REACH_DESCRIPTION')}}</p>
                                <div class="column_box">
                                    <div class="col-md-4 text-center">
                                        <div class="box_1">
                                            <i class="fa fa-file-text" aria-hidden="true"></i>
                                            <h2>{{__('customer/login.AT_A_GLANCE')}}</h2>
                                            <p>{{__('customer/login.AT_A_GLANCE_DESCRIPTION')}}</p>
                                        </div>
                                    </div>
                                    <div class="col-md-4 text-center">
                                        <div class="box_1">
                                            <i class="fa fa-pencil" aria-hidden="true"></i>
                                            <h2>{{__('customer/login.REPORT_MOVE')}}</h2>
                                            <p>{{__('customer/login.REPORT_MOVE_DESCRIPTION')}}</p>
                                        </div>
                                    </div>
                                    <div class="col-md-4 text-center">
                                        <div class="box_1">
                                            <i class="fa fa-commenting" aria-hidden="true"></i>
                                            <h2>{{__('customer/login.FAST_SUPPORT')}}</h2>
                                            <p>{{__('customer/login.FAST_SUPPORT_DESCRIPTION')}}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="right_box">
                                <h1>{{__('customer/login.DO_YOU_NEED_HELP')}}</h1>
                                <hr>
                                <div class="box_2">
                                    <p>{{__('customer/login.DO_YOU_NEED_HELP_DESCRIPTION')}}</p>
                                    <i class="fa fa-phone" aria-hidden="true"></i>&nbsp;0800 461 461<br>
                                    <i class="fa fa-envelope" aria-hidden="true"></i>&nbsp;login@gocaution.ch
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>
    </div>
</body>
<script src="{{asset('customer/assets/js/form.validation.script.js')}}"></script>
</html>
