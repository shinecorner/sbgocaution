<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Gull - Laravel + Bootstrap 4 admin template</title>
    <link href="https://fonts.googleapis.com/css?family=Nunito:300,400,400i,600,700,800,900" rel="stylesheet">
@yield('before-css')
    {{-- theme css --}}

    <link rel="stylesheet" href="{{mix('customer/assets/styles/css/themes/lite-green.min.css')}}">
    <link rel="stylesheet" href="{{asset('customer/assets/styles/vendor/perfect-scrollbar.css')}}">
 {{-- page specific css --}}
 @yield('page-css')
</head>

<body class="text-left">
    @php
        $layout = session('layout');
    @endphp

      <!-- Pre Loader Strat  -->
  {{--  <div class='loadscreen' id="preloader">

        <div class="loader spinner-bubble spinner-bubble-primary">



        </div>
    </div>--}}
    <!-- Pre Loader end  -->







  <!-- ============ Compact Layout start ============= -->
    @if ($layout=="compact")
    {{-- compact layout --}}
         <div class="app-admin-wrap layout-sidebar-compact sidebar-dark-purple sidenav-open clearfix">
              @include('customer.layouts.sidebar-compact')
       {{-- end of left sidebar --}}


        <!-- ============ Body content start ============= -->
        <div class="main-content-wrap d-flex flex-column">
        @include('customer.layouts.header-menu')
      {{-- end of header menu --}}
      <div class="main-content">
           @yield('main-content')
      </div>

            @include('customer.layouts.footer')
        </div>
        <!-- ============ Body content End ============= -->
    </div>
    <!--=============== End app-admin-wrap ================-->

    <!-- ============ Search UI Start ============= -->
  @include('customer.layouts.search')
    <!-- ============ Search UI End ============= -->

     @include('customer.layouts.compact-sidebar-customizer')



       <!-- ============ Compact Layout End ============= -->











  <!-- ============ Horizontal Layout start ============= -->

 @elseif($layout=="horizontal")
    {{-- normal layout --}}
        <div class="app-admin-wrap layout-horizontal-bar clearfix">
             @include('customer.layouts.header-menu')
      {{-- end of header menu --}}



       @include('customer.layouts.horizontal-bar')
       {{-- end of left sidebar --}}

        <!-- ============ Body content start ============= -->
<div class="main-content-wrap  d-flex flex-column">
<div class="main-content">
    @yield('main-content')
</div>

            @include('customer.layouts.footer')
        </div>
        <!-- ============ Body content End ============= -->
    </div>
    <!--=============== End app-admin-wrap ================-->

    <!-- ============ Search UI Start ============= -->
  @include('customer.layouts.search')
    <!-- ============ Search UI End ============= -->

{{--
    @include('customer.layouts.horizontal-customizer')
--}}


  <!-- ============ Horizontal Layout End ============= -->













 <!-- ============ Large SIdebar Layout start ============= -->
    @elseif($layout=="normal")
    {{-- normal layout --}}
        <div class="app-admin-wrap layout-sidebar-large clearfix">
             @include('customer.layouts.header-menu')
      {{-- end of header menu --}}



       @include('customer.layouts.sidebar')
       {{-- end of left sidebar --}}

        <!-- ============ Body content start ============= -->
        <div class="main-content-wrap sidenav-open d-flex flex-column">
<div class="main-content">
    @yield('main-content')
</div>

            @include('customer.layouts.footer')
        </div>
        <!-- ============ Body content End ============= -->
    </div>
    <!--=============== End app-admin-wrap ================-->

    <!-- ============ Search UI Start ============= -->
  @include('customer.layouts.search')
    <!-- ============ Search UI End ============= -->

    @include('customer.layouts.large-sidebar-customizer')


      <!-- ============ Large Sidebar Layout End ============= -->





      @else
       <!-- ============Deafult  Large SIdebar Layout start ============= -->

    {{-- normal layout --}}
        <div class="app-admin-wrap layout-sidebar-large clearfix">
             @include('customer.layouts.header-menu')
      {{-- end of header menu --}}



       @include('customer.layouts.sidebar')
       {{-- end of left sidebar --}}

        <!-- ============ Body content start ============= -->
        <div class="main-content-wrap sidenav-open d-flex flex-column">
<div class="main-content">
    @yield('main-content')
</div>

            @include('customer.layouts.footer')
        </div>
        <!-- ============ Body content End ============= -->
    </div>
    <!--=============== End app-admin-wrap ================-->

    <!-- ============ Search UI Start ============= -->
  @include('customer.layouts.search')
    <!-- ============ Search UI End ============= -->

    {{--@include('customer.layouts.large-sidebar-customizer')--}}


      <!-- ============ Large Sidebar Layout End ============= -->



    @endif




{{-- common js --}}
<script src="{{mix('customer/assets/js/common-bundle-script.js')}}"></script>
    {{-- page specific javascript --}}
    @yield('page-js')

    {{-- theme javascript --}}
    {{-- <script src="{{mix('customer/assets/js/es5/script.js')}}"></script> --}}
    <script src="{{asset('customer/assets/js/es5/script.min.js')}}"></script>


    @if ($layout=='compact')
    <script src="{{asset('customer/assets/js/es5/sidebar.compact.script.min.js')}}"></script>


    @elseif($layout=='normal')
<script src="{{asset('customer/assets/js/es5/sidebar.large.script.min.js')}}"></script>


@elseif($layout=='horizontal')
<script src="{{asset('customer/assets/js/sidebar-horizontal.script.js')}}"></script>


@else
<script src="{{asset('customer/assets/js/es5/sidebar.large.script.min.js')}}"></script>

    @endif


ro
    <script src="{{asset('customer/assets/js/es5/customizer.script.min.js')}}"></script>

    {{-- laravel js --}}
    {{-- <script src="{{mix('customer/assets/js/laravel/app.js')}}"></script> --}}

    @yield('bottom-js')
</body>

</html>
