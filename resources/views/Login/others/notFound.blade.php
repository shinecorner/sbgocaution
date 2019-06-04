<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ __('login.login') }}</title>
    <link rel="icon" href="{{ asset('favicon.png') }}" type="image/png">
    <link href="https://fonts.googleapis.com/css?family=Nunito:300,400,400i,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" href="{{mix('Login/assets/styles/css/themes/lite-green.min.css')}}">
    <link rel="stylesheet" href="{{asset('Login/assets/styles/vendor/perfect-scrollbar.css')}}">
</head>

<body>
    <div class="not-found-wrap text-center">
        <h1 class="text-60">
            404
        </h1>
        <p class="text-36 subheading mb-3">{{ __('login.ERROR') }}!</p>
        <p class="mb-5  text-muted text-18">{{ __('login.404_ERROR') }}</p>
        <a class="btn btn-lg btn-primary btn-rounded" href="{{ url(app()->getLocale()) }}">{{ __('login.GO_BACK_HOME') }}</a>
    </div>
</body>

</html>
