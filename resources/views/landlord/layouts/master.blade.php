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

    <link rel="stylesheet" href="{{mix('landlord/assets/styles/css/themes/lite-green.min.css')}}">
    <link rel="stylesheet" href="{{asset('landlord/assets/styles/vendor/perfect-scrollbar.css')}}">
 {{-- page specific css --}}
 @yield('page-css')
</head>

<body class="text-left">
    @php
        $layout = session('layout');
    @endphp

      <!-- Pre Loader Strat  -->
    <div class='loadscreen' id="preloader">

        <div class="loader spinner-bubble spinner-bubble-primary">



        </div>
    </div>
    <!-- Pre Loader end  -->







  <!-- ============ Compact Layout start ============= -->
    @if ($layout=="compact")
    {{-- compact layout --}}
         <div class="app-admin-wrap layout-sidebar-compact sidebar-dark-purple sidenav-open clearfix">
              @include('landlord.layouts.sidebar-compact')
       {{-- end of left sidebar --}}


        <!-- ============ Body content start ============= -->
        <div class="main-content-wrap d-flex flex-column">
        @include('landlord.layouts.header-menu')
      {{-- end of header menu --}}
      <div class="main-content">
           @yield('main-content')
      </div>

            @include('landlord.layouts.footer')
        </div>
        <!-- ============ Body content End ============= -->
    </div>
    <!--=============== End app-admin-wrap ================-->

    <!-- ============ Search UI Start ============= -->
  @include('landlord.layouts.search')
    <!-- ============ Search UI End ============= -->

     @include('landlord.layouts.compact-sidebar-customizer')



       <!-- ============ Compact Layout End ============= -->











  <!-- ============ Horizontal Layout start ============= -->

 @elseif($layout=="horizontal")
    {{-- normal layout --}}
        <div class="app-admin-wrap layout-horizontal-bar clearfix">
             @include('landlord.layouts.header-menu')
      {{-- end of header menu --}}



       @include('landlord.layouts.horizontal-bar')
       {{-- end of left sidebar --}}

        <!-- ============ Body content start ============= -->
<div class="main-content-wrap  d-flex flex-column">
<div class="main-content">
    @yield('main-content')
</div>

            @include('landlord.layouts.footer')
        </div>
        <!-- ============ Body content End ============= -->
    </div>
    <!--=============== End app-admin-wrap ================-->

    <!-- ============ Search UI Start ============= -->
  @include('landlord.layouts.search')
    <!-- ============ Search UI End ============= -->

    @include('landlord.layouts.horizontal-customizer')


  <!-- ============ Horizontal Layout End ============= -->













 <!-- ============ Large SIdebar Layout start ============= -->
    @elseif($layout=="normal")
    {{-- normal layout --}}
        <div class="app-admin-wrap layout-sidebar-large clearfix">
             @include('landlord.layouts.header-menu')
      {{-- end of header menu --}}



       @include('landlord.layouts.sidebar')
       {{-- end of left sidebar --}}

        <!-- ============ Body content start ============= -->
        <div class="main-content-wrap sidenav-open d-flex flex-column">
<div class="main-content">
    @yield('main-content')
</div>

            @include('landlord.layouts.footer')
        </div>
        <!-- ============ Body content End ============= -->
    </div>
    <!--=============== End app-admin-wrap ================-->

    <!-- ============ Search UI Start ============= -->
  @include('landlord.layouts.search')
    <!-- ============ Search UI End ============= -->

    @include('landlord.layouts.large-sidebar-customizer')


      <!-- ============ Large Sidebar Layout End ============= -->





      @else
       <!-- ============Deafult  Large SIdebar Layout start ============= -->

    {{-- normal layout --}}
        <div class="app-admin-wrap layout-sidebar-large clearfix">
             @include('landlord.layouts.header-menu')
      {{-- end of header menu --}}



       @include('landlord.layouts.sidebar')
       {{-- end of left sidebar --}}

        <!-- ============ Body content start ============= -->
        <div class="main-content-wrap sidenav-open d-flex flex-column">
<div class="main-content">
    @yield('main-content')
</div>

            @include('landlord.layouts.footer')
        </div>
        <!-- ============ Body content End ============= -->
    </div>
    <!--=============== End app-admin-wrap ================-->

    <!-- ============ Search UI Start ============= -->
  @include('landlord.layouts.search')
    <!-- ============ Search UI End ============= -->

    @include('landlord.layouts.large-sidebar-customizer')


      <!-- ============ Large Sidebar Layout End ============= -->



    @endif




{{-- common js --}}
<script src="{{mix('landlord/assets/js/common-bundle-script.js')}}"></script>
    {{-- page specific javascript --}}
    @yield('page-js')

    {{-- theme javascript --}}
    {{-- <script src="{{mix('landlord/assets/js/es5/script.js')}}"></script> --}}
    <script src="{{asset('landlord/assets/js/es5/script.min.js')}}"></script>


    @if ($layout=='compact')
    <script src="{{asset('landlord/assets/js/es5/sidebar.compact.script.min.js')}}"></script>


    @elseif($layout=='normal')
<script src="{{asset('landlord/assets/js/es5/sidebar.large.script.min.js')}}"></script>


@elseif($layout=='horizontal')
<script src="{{asset('landlord/assets/js/sidebar-horizontal.script.js')}}"></script>


@else
<script src="{{asset('landlord/assets/js/es5/sidebar.large.script.min.js')}}"></script>

    @endif



    <script src="{{asset('landlord/assets/js/es5/customizer.script.min.js')}}"></script>

    {{-- laravel js --}}
    {{-- <script src="{{mix('landlord/assets/js/laravel/app.js')}}"></script> --}}

    @yield('bottom-js')
</body>

</html>
