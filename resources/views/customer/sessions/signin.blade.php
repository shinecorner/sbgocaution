@extends('customer.layouts.login-layout')
@section('login')
<div class="login-wrap">
    <div class="login">
        <h3 class="login-top-title">{{ __('customer/login.LOGIN_TITLE') }}</h3>
        <hr />
        <form class="needs-validation no-cross" action="{{ url(LaravelLocalization::getURLFromRouteNameTranslated(app()->getLocale(),'customer/login.routes.LOGIN')) }}" method="post" novalidate>
          @csrf
          @if ($errors->has('email'))
            <span class="red-alert">{{ $errors->first('email') }}</span>
          @endif
            <div class="form-row pB-5 ">
              <div class="col-md-12">
                  <label for="validationCustom01">{{ __('customer/login.EMAIL') }}<span class="star">&#160;*</span></label>
                  <input type="text" class="form-control" name="email" id="validationCustom01"  value="" required>
                  <div class="invalid-feedback">
                      {{ __('customer/login.EMAIL_REQUIRED') }}
                  </div>
              </div>
            </div>
            <div class="form-row">
              <div class="col-md-12">
                  <label for="validationCustom02">{{ __('customer/login.PASSWORD') }}<span class="star">&#160;*</span></label>
                  <input type="password" class="form-control" name="password" id="validationCustom02"  value="" required>
                  <div class="invalid-feedback">
                      {{ __('customer/login.PASSWORD_REQUIRED') }}
                  </div>
              </div>
            </div>
            <label class="checkbox checkbox-outline-success">
                <input type="checkbox" name="remember" >
                <span class="chechbox-label">{{ __('customer/login.LOGIN_REMEMBER_ME') }}</span>
                <span class="checkmark"></span>
            </label>
            <div class="form-group">
                <div class="text-center reset-btn">
                    <button type="submit" class="btn btn-primary btn-block btn-outline-primary">{{ __('customer/login.LOGIN') }}</button>
                </div>
            </div>
        </form>

    </div>
    <br />

    <div class="other-links form-group">
        <ul>
            <li><a href="{{ url(LaravelLocalization::getURLFromRouteNameTranslated(app()->getLocale(),'customer/login.routes.FORGOT_PASSWORD_LINK')) }}" >@lang('customer/login.FORGET_PASSWORD')</a></li>
        </ul>
    </div>

    <div class="text-center reset-btn">
        <button type="button" data-toggle="modal" data-target="#new-account-request" class="default-whbtn">{{ __('customer/login.REQUEST_ACCESS') }}</button>
    </div>


</div>
<div class="modal fade account-request" id="new-account-request" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle-2" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title text-center">
                    <p class="mb-0"><i class="fa fa-check-circle fa-3x" aria-hidden="true"></i></p>
                    <p class="mb-1">{{ __('customer/regrequest.TITLE') }}</p>
                </h4>
            </div>
            <form class=" no-cross" action="{{ url(LaravelLocalization::getURLFromRouteNameTranslated(app()->getLocale(),'customer/regrequest.routes.REGISTER_REQUEST')) }}"
                  method="post"
                  novalidate
                  id="regrequest"
                  onsubmit="regrequest(event,'regrequest')">

                @csrf
                <div class="modal-body">
                    <span class="red-alert"></span>
                    <div class="card">
                        <div class="card-header">
                            <i class="fa fa-info-circle" aria-hidden="true"></i>
                            <p>{{ __('customer/regrequest.HEADLINE') }}</p>
                        </div>

                        <div class="card-body">
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <div class="input-group">
                                        <label>{{ __('customer/regrequest.FORM_FIELDS.NAME') }} *</label>
                                        <input type="text" class="form-control" name="lastname" required>
                                        <div class="invalid-feedback">
                                            {{ __('customer/regrequest.VALIDATION.NAME') }}
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <div class="input-group">
                                        <label>{{ __('customer/regrequest.FORM_FIELDS.FIRSTNAME') }} *</label>
                                        <input type="text" class="form-control" name="firstname" required>
                                        <div class="invalid-feedback">
                                            {{ __('customer/regrequest.VALIDATION.FIRSTNAME') }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-12">
                                    <label>{{ __('customer/regrequest.FORM_FIELDS.DOB') }} *</label>
                                </div>
                                <div class="form-group col-md-4">
                                    <div class="input-group">

                                        <select class="form-control" name="day" required>
                                            <option value="">{{ __('customer/regrequest.FORM_FIELDS.DAY') }}</option>
                                            @for($day=1;$day<=\App\CustomerRegRequest::DAYS_ITERATION;$day++)
                                                <option value="{{$day}}">{{$day}}</option>
                                            @endfor
                                        </select>
                                        <div class="invalid-feedback">
                                            {{ __('customer/regrequest.VALIDATION.DAY') }}
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-md-4">
                                    <div class="input-group">
                                        <select class="form-control" name="month" required>
                                            <option value="">{{ __('customer/regrequest.FORM_FIELDS.MONTH') }}</option>
                                            @for($month=1;$month<=\App\CustomerRegRequest::MONTH_ITERATION;$month++)
                                                <option value="{{$month}}">{{$month}}</option>
                                            @endfor
                                        </select>
                                        <div class="invalid-feedback">
                                            {{ __('customer/regrequest.VALIDATION.MONTH') }}
                                        </div>

                                    </div>
                                </div>
                                <div class="form-group col-md-4">
                                    <div class="input-group">
                                        <select class="form-control" name="year" required>
                                            <option value="">{{ __('customer/regrequest.FORM_FIELDS.YEAR') }}</option>
                                            @for($year=\App\CustomerRegRequest::YEAR_START_ITERATION;$year<=\App\CustomerRegRequest::YEAR_END_ITERATION;$year++)
                                                <option value="{{$year}}">{{$year}}</option>
                                            @endfor
                                        </select>
                                        <div class="invalid-feedback">
                                            {{ __('customer/regrequest.VALIDATION.YEAR') }}
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <div class="input-group">
                                        <label>{{ __('customer/regrequest.FORM_FIELDS.MOBILE') }} *</label>
                                        <input type="text" class="form-control" name="mobile" required>
                                        <div class="invalid-feedback">
                                            {{ __('customer/regrequest.VALIDATION.MOBILE') }}
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <div class="input-group">
                                        <label>{{ __('customer/regrequest.FORM_FIELDS.EMAIL') }} *</label>
                                        <input type="text" class="form-control" name="email" required>
                                        <div class="invalid-feedback">
                                            {{ __('customer/regrequest.VALIDATION.EMAIL') }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- end card 2 Columns Horizontal Form Layout-->

                </div>
                <div class="modal-footer">
                    <button type="submit" id="register" class="btn btn-success ladda-button basic-ladda-button mb-3" data-style="expand-right">{{ __('customer/regrequest.FORM_FIELDS.TO_SEND') }}</button>
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
                    <p class="mb-1">{{ __('customer/regrequest.THANK_YOU_TEXT') }}</p>
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
@endsection

@section('page-script')
    <script>
        $(document).ready(function () {
            customValidateForm("regrequest");
        });

        function regrequest(e,id){
           // alert('hiii');
            e.preventDefault();
            e.stopPropagation();
           //
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
                        $("#new-account-request").modal('hide');
                        $("#success-flash-model").delay(100).modal('show');
                        document.getElementById(id).reset();
                    },
                    error: function(xhr, status, error) {

                        l.stop();

                        var errors = JSON.parse(xhr.responseText);

                        $.each(errors.errors,function (key, val) {

                            $("#"+id+" input[name="+key+"]").addClass('is-invalid');
                            $("#"+id+" input[name="+key+"]").next('.invalid-feedback').html(val[0]);
                        })

                    }
                });
            }
            return false;
        }


    </script>
@endsection
