@extends('Login.layouts.master')
@section('before-css')


@endsection

@section('main-content')
            <div class="breadcrumb">
                <h1>Layouts</h1>
                <ul>
                    <li><a href="">Forms</a></li>
                    <li>Form Layouts</li>
                </ul>
            </div>

            <div class="separator-breadcrumb border-top"></div>

            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <h4>Horizontal Layout</h4>
                    <p>A form control layout using row to create horizontal alignment.</p>
                    <div class="card mb-5">
                        <div class="card-body">
                            <div class="row row-xs">
                                <div class="col-md-5">
                                    <input type="text" class="form-control" placeholder="Enter your username">
                                </div>
                                <div class="col-md-5 mt-3 mt-md-0">
                                    <input type="password" class="form-control" placeholder="Enter your password">
                                </div>
                                <div class="col-md-2 mt-3 mt-md-0">
                                    <button class="btn btn-primary btn-block">Sign In</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="border-top mb-5"></div>
            <div class="row">
                <div class="col-md-6">
                    <h4>Verticle Layout</h4>
                    <p>A form control layout using flex to create verticle alignment.</p>
                    <div class="card mb-5">
                        <div class="card-body">
                            <div class="d-flex flex-column">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Enter your username">
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" placeholder="Enter your password">
                                </div>
                                <button class="btn btn-primary pd-x-20">Sign In</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="border-top mb-5"></div>

            <div class="row">
                <div class="col-md-6">
                    <h4>Left Label Alignment</h4>
                    <p>A form control layout using row with left label alignment.</p>
                    <div class="card mb-5">
                        <div class="card-body">
                            <form>
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
                                    <div class="col-sm-10">
                                        <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
                                    <div class="col-sm-10">
                                        <input type="password" class="form-control" id="inputPassword3" placeholder="Password">
                                    </div>
                                </div>
                                <fieldset class="form-group">
                                    <div class="row">
                                        <div class="col-form-label col-sm-2 pt-0">Radios</div>
                                        <div class="col-sm-10">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="option1" checked>
                                                <label class="form-check-label" for="gridRadios1">
                                                    First radio
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios2" value="option2">
                                                <label class="form-check-label" for="gridRadios2">
                                                    Second radio
                                                </label>
                                            </div>
                                            <div class="form-check disabled">
                                                <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios3" value="option3" disabled>
                                                <label class="form-check-label" for="gridRadios3">
                                                    Third disabled radio
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                                <div class="form-group row">
                                    <div class="col-sm-2">Checkbox</div>
                                    <div class="col-sm-10">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="gridCheck1">
                                            <label class="form-check-label" for="gridCheck1">
                                                Example checkbox
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-10">
                                        <button type="submit" class="btn btn-primary">Sign in</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="border-top mb-5"></div>


            <div class="row">
                <div class="col-md-6">
                    <h4>Form Inside Dropdown</h4>
                    <p>A form group layout inside dropdown</p>
                    <div class="btn-group">
                        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Download File
                        </button>
                        <div class="dropdown-menu bg-transparent shadow-none p-0 m-0" style="width: 320px">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-title mb-1">Please Sign In First</div>
                                    <p>Lorem ipsum dolor sit amet.</p>
                                    <div class="d-flex flex-column">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Enter your username">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control" placeholder="Enter your password">
                                        </div>
                                        <button class="btn btn-primary pd-x-20">Sign In</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

@endsection

@section('page-js')




@endsection

@section('bottom-js')




@endsection
