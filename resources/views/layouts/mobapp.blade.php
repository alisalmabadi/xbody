<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <script>

        var subdomain = 'http://';
        var url = window.location.href;

        var rest = url.match(/:\/\/\mob.(.+)/)[1];
        var mobile = (/iphone|ipad|ipod|android|blackberry|mini|windows\sce|palm/i.test(navigator.userAgent.toLowerCase()));
        if (!mobile) {
            window.location.href= subdomain + rest;

        } //-->


    </script>

@yield('metas')
<!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Styles -->
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/mobapp.css') }}" rel="stylesheet">
    <style>
        .dropdown-menu {

            left: 0;
            right: auto;
        }
    </style>
    @yield('head')
</head>
<body cz-shortcut-listen="true" >

@yield('content')

<script src="{{ asset('js/mobapp.js') }}"></script>

<script src="{{ route('home') }}/js/jssor.slider.min.js"></script>

@yield('script_whole')

<script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA1XIzPPJ8J5j2jU-YmyPlDJW77DUamv_k&callback=initMap"></script>

<script>
    function initMap() {
        var uluru = {lat: 35.705287, lng: 51.406663};
        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 16,
            center: uluru
        });
        var marker =new google.maps.Marker({
            position: uluru,

            title: 'siar',

            map: map
        });


    }
</script>



</body>
</html>
