<!doctype html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" type="text/css" href="{{asset('fonts/fontAwsome/css/font-awesome.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('fonts/fontAwsome/css/font-awesome.min.css')}}">

    <link rel="stylesheet" href="{{asset('css/Bodybuilding.css')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap-rtl.min.css')}}">
@yield('head')

    <title>@yield('title',\Setting::get('site_name'))</title>

</head>
<body>
@include('partials.header')
@include('partials.menu')

@yield('main_content')


@include('partials.footer')
<script src="{{asset('js/jquery-3.2.0.min.js')}}"></script>
<script src="{{asset('js/bootstrap.js')}}"></script>
<script src="{{asset('js/jq.js')}}"></script>
@yield('footer')
</body>
</html>