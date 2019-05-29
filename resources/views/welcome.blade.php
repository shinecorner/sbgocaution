<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" type="image/png" href="{{asset('favicon.png')}}" />
  
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="robots" content="noindex, nofollow" />

  <link rel="stylesheet" type="text/css" href="{{asset('fonts/montserrat/montserrat.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('fonts/material_icons/material_icons.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('fonts/materialdesign_webfont/css/materialdesignicons.min.css')}}">  
  <link rel="stylesheet" type="text/css" href="{{asset('fonts/material-design-iconic-font/css/material-design-iconic-font.min.css')}}">    
  <link rel="stylesheet" type="text/css" href="{{asset('css/app.css')}}">
  <title>{{__('general.CRM_TITLE')}}</title>
</head>

<body>
  <div id="app"></div>
  <script type="text/javascript" src="{{asset('js/main.js')}}"></script>
</body>

</html>