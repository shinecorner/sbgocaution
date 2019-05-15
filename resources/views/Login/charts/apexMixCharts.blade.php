@extends('Login.layouts.master')
@section('before-css')


@endsection

@section('page-css')

    <link rel="stylesheet" href="{{asset('Login/assets/styles/vendor/apexcharts.css')}}">
@endsection

@section('main-content')

  <div class="breadcrumb">
                    <h1>ApexCharts</h1>
                    <ul>
                        <li><a href="">Charts</a></li>
                        <li>Apex Mix Charts</li>
                    </ul>
                </div>

                <div class="separator-breadcrumb border-top"></div>

                <div class="row">
                    <div class=" col-md-6">
                        <div class="card mb-4">
                            <div class="card-body">
                                <div class="card-title"> Line Column (Traffic Sources)</div>
                                <div id="lineColumn"></div>
                            </div>
                        </div>
                    </div>

                    <div class=" col-md-6">
                        <div class="card mb-4">
                            <div class="card-body">
                                <div class="card-title"> Multiple Y-Axis(XYZ - Stock Analysis (2009 - 2016)) </div>
                                <div id="multipleYxis"></div>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- end of row -->

                <div class="row">
                    <div class=" col-md-6">
                        <div class="card mb-4">
                            <div class="card-body">
                                <div class="card-title">
                                    Line & Area(Team A VS Team B)
                                </div>

                                <div id="lineArea"></div>
                            </div>
                        </div>
                    </div>

                    <div class=" col-md-6">
                        <div class="card mb-4">
                            <div class="card-body">
                                <div class="card-title">Line Column Area
                                </div>
                                <div id="lineColumnArea"></div>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- end of row -->















@endsection

@section('page-js')



    <script src="{{asset('Login/assets/js/vendor/apexcharts.min.js')}}"></script>
    <script src="{{asset('Login/assets/js/vendor/apexcharts.dataseries.js')}}"></script>
    <script src="{{asset('Login/assets/js/es5/apexMixChart.script.min.js')}}"></script>





@endsection

@section('bottom-js')




@endsection
