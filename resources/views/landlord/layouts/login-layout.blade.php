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
                                <a href="{{ url(app()->getLocale()) }}" title="{{ __('landlord/login.TITLE') }}">
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
                            <button type="button" class="btn btn-raised btn-raised-secondary color-triplet" data-toggle="modal" data-target="#new-account-request"> {{ __('landlord/login.REQUEST_ACCESS') }}</button>
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
                                <a href="{{ url(app()->getLocale()) }}" title="{{ __('landlord/login.TITLE') }}">
                                    <img class="logo-img" src="{{ asset('landlord/assets/images/'.__('landlord/login.LOGO_IMG')) }}" alt="{{ __('landlord/login.TITLE') }}" />
                                    <span>{{ __('landlord/login.LOGIN_TITLE') }}</span>
                                </a>
                                <small class="site-slogan">{{ __('landlord/login.LOGIN_TITLE') }}</small>
                            </div>
                        </div>
                        <div class="mb-shift">{{ __('landlord/login.SUPPORT.SUPPORT_ADDRESS') }}</div>
                    </div>

                      <!-- Modal -->
                      <div class="modal fade account-request" id="new-account-request" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle-2" aria-hidden="true">
                          <div class="modal-dialog modal-dialog-centered" role="document">
                              <div class="modal-content">
                                  <div class="modal-header">
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                      </button>
                                      <h4 class="modal-title text-center">
                                          <p class="mb-0"><i class="fa fa-check-circle fa-3x" aria-hidden="true"></i></p>
                                          <p class="mb-1">{{ __('landlord/regrequest.TITLE') }}</p>
                                      </h4>
                                  </div>
                                  <form class=" no-cross" action="{{ url(LaravelLocalization::getURLFromRouteNameTranslated(app()->getLocale(),'landlord/regrequest.routes.REGISTER_REQUEST')) }}"
                                        method="post"
                                        novalidate
                                        id="regrequest"
                                        onsubmit="regrequest(event,'regrequest')">

                                      @csrf
                                      <div class="modal-body">
                                          <span class="red-alert"></span>
                                          {{--<span class="alert-success">
                                              <i class="fa fa-info-circle" aria-hidden="true"></i>
                                              <p></p>
                                          </span>--}}
                                          <!-- start card 2 Columns Horizontal Form Layout-->
                                          <div class="card">
                                              <div class="card-header">
                                                  <i class="fa fa-info-circle" aria-hidden="true"></i>
                                                  <p>{{ __('landlord/regrequest.HEADLINE') }}</p>
                                              </div>

                                              <div class="card-body">
                                                  <div class="form-row">
                                                      <div class="form-group col-md-6">
                                                          <div class="input-group">
                                                              <label>{{ __('landlord/regrequest.FORM_FIELDS.COMPANY') }}</label>
                                                              <input type="text" class="form-control" name="company" >

                                                          </div>
                                                      </div>
                                                      <div class="form-group col-md-6">
                                                          <div class="input-group">
                                                              <label>{{ __('landlord/regrequest.FORM_FIELDS.LAST_NAME') }} *</label>
                                                              <input type="text" class="form-control" name="lastname"  required>
                                                              <div class="invalid-feedback">
                                                                  {{ __('landlord/regrequest.VALIDATION.LAST_NAME') }}
                                                              </div>
                                                          </div>
                                                      </div>
                                                  </div>
                                                  <div class="form-row">
                                                      <div class="form-group col-md-6">
                                                          <div class="input-group">
                                                              <label>{{ __('landlord/regrequest.FORM_FIELDS.FIRST_NAME') }} *</label>
                                                              <input type="text" class="form-control" name="firstname"  required="">
                                                              <div class="invalid-feedback">
                                                                  {{ __('landlord/regrequest.VALIDATION.FIRST_NAME') }}
                                                              </div>
                                                          </div>
                                                      </div>
                                                      <div class="form-group col-md-6">
                                                          <div class="input-group">
                                                              <label>{{ __('landlord/regrequest.FORM_FIELDS.ADDRESS') }} *</label>
                                                              <input type="text" class="form-control" name="address" required="">
                                                              <div class="invalid-feedback">
                                                                  {{ __('landlord/regrequest.VALIDATION.ADDRESS') }}
                                                              </div>
                                                          </div>
                                                      </div>
                                                  </div>
                                                  <div class="form-row">

                                                      <div class="form-group col-md-4">

                                                          <div class="input-group">
                                                              <label>{{ __('landlord/regrequest.FORM_FIELDS.ZIP') }} *</label>
                                                              <input type="text" class="form-control" name="zip" required="">
                                                              <div class="invalid-feedback">
                                                                  {{ __('landlord/regrequest.VALIDATION.ZIP') }}
                                                              </div>
                                                          </div>

                                                      </div>
                                                      <div class="form-group col-md-2">


                                                          <div class="input-group">
                                                              <label>{{ __('landlord/regrequest.FORM_FIELDS.CITY') }} *</label>
                                                              <input type="text" class="form-control" name="city" required="">
                                                              <div class="invalid-feedback">
                                                                  {{ __('landlord/regrequest.VALIDATION.CITY') }}
                                                              </div>
                                                          </div>
                                                      </div>

                                                      <div class="form-group col-md-6">
                                                          <div class="input-group">
                                                              <label>{{ __('landlord/regrequest.FORM_FIELDS.TELEPHONE') }} *</label>
                                                              <input type="text" class="form-control" name="telephone"  required="">
                                                              <div class="invalid-feedback">
                                                                  {{ __('landlord/regrequest.VALIDATION.TELEPHONE') }}
                                                              </div>
                                                          </div>
                                                      </div>
                                                  </div>
                                                  <div class="form-row">
                                                      <div class="form-group col-md-6">
                                                          <div class="input-group">
                                                              <label>{{ __('landlord/regrequest.FORM_FIELDS.EMAIL') }} *</label>
                                                              <input type="text" class="form-control" name="email" required="">
                                                              <div class="invalid-feedback">
                                                                  {{ __('landlord/regrequest.VALIDATION.EMAIL') }}
                                                              </div>
                                                          </div>
                                                      </div>
                                                  </div>
                                              </div>

                                          </div>
                                          <!-- end card 2 Columns Horizontal Form Layout-->

                                  </div>
                                  <div class="modal-footer">
                                      <button type="submit" id="register" class="btn btn-success ladda-button basic-ladda-button mb-3" data-style="expand-right">{{ __('landlord/regrequest.FORM_FIELDS.TO_SEND') }}</button>
                                  </div>
                                  </form>
                              </div>
                          </div>
                      </div>


                      <!-- Modal -->
                      <div class="modal fade account-request" id="success-flash-model" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle-2" aria-hidden="true">
                          <div class="modal-dialog modal-dialog-centered" role="document">
                              <div class="modal-content">
                                  <div class="modal-header">
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                      </button>
                                      <h4 class="modal-title text-center">
                                          {{--<p class="mb-0"><i class="fa fa-check-circle fa-3x" aria-hidden="true"></i></p>--}}
                                          <p class="mb-1">{{ __('landlord/regrequest.THANK_YOU_TEXT') }}</p>
                                      </h4>
                                  </div>

                                  <div class="modal-body">
                                      <span class="red-alert"></span>
                                      <span class="alert-success">
                                          <i class="fa fa-info-circle" aria-hidden="true"></i>
                                          <p></p>
                                      </span>
                                  </div>

                              </div>
                          </div>
                      </div>
                    @extends('landlord.layouts.language-dropdown')
                </div>
            </div>
        </div>
    </div>
</body>
    <script src="{{asset('landlord/assets/js/spin.min.js')}}"></script>
    <script src="{{asset('landlord/assets/js/ladda.js')}}"></script>
    <script src="{{asset('landlord/assets/js/form.validation.script.js')}}"></script>
    <script>
        $(document).ready(function () {
            customValidateForm("regrequest");
        });

        function regrequest(e,id){

            e.preventDefault();
            e.stopPropagation();
            var  form    = document.getElementById('regrequest');
            var  event   = new CustomEvent('isFormValid');
            form.dispatchEvent(event);

            var l = Ladda.create(document.getElementById('register'));

            if(!$("#"+id).hasClass('was-validated')){

                // Start: Just for email field
                    $("input").removeClass('is-invalid');
                 // End: Just for email field

                $.ajax({
                    url: $("#"+id).attr('action'),
                    data: $("#"+id).serialize(),
                    method: "POST",
                    beforeSend: function () {
                        l.start();
                    },
                    success: function(data) {
                        l.stop();
                        $('#success-flash-model .alert-success' ).css('display','block');
                        $('#success-flash-model .alert-success p' ).text(data.message);
                        $("#new-account-request").modal('hide')
                        $("#success-flash-model").delay(100).modal('show')
                        document.getElementById(id).reset();
                    },
                    error: function(xhr, status, error) {

                        l.stop();

                        var errors = JSON.parse(xhr.responseText);

                        $.each(errors.errors,function (key, val) {
                            console.log(key,val)

                            $("#"+id+" input[name="+key+"]").addClass('is-invalid');
                            $("#"+id+" input[name="+key+"]").next('.invalid-feedback').html(val[0]);
                        })

                    }
                });
            }

        }

       
    </script>
</html>
