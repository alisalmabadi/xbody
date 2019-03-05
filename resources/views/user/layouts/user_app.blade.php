<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Mosaddek">
    <meta name="keyword" content="FlatLab, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <link rel="shortcut icon" href="{{asset('img/picture.png')}}">
    <title>@yield('title')</title>
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/bootstrap-reset.css')}}" rel="stylesheet">
    <!--external css-->
    <link href="{{asset('css/font-awesome.css')}}" rel="stylesheet" />
{{--
    <link href="assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css" rel="stylesheet" type="text/css" media="screen"/>
--}}
{{--
    <link rel="stylesheet" href="css/owl.carousel.css" type="text/css">
--}}
    <!-- Custom styles for this template -->
    <link href="{{asset('css/style.css')}}" rel="stylesheet">
    <link href="{{asset('css/style-responsive.css')}}" rel="stylesheet" />
    @yield('head')
</head>
<body>
<section id="container" class="">
    @include('user.layouts.header')
    @include('user.layouts.sidebar')
    <!--main content start-->
        <section id="main-content">
            <section class="wrapper">
                @include('user.partials.flash')
                <!--state overview start-->
@yield('content')

            </section>
            </section>
</section>
<script src="{{asset('js/jquery.js')}}"></script>
{{--
<script src="js/jquery-1.8.3.min.js"></script>
--}}
<script src="{{asset('js/bootstrap3.7.min.js')}}"></script>
<script src="{{asset('js/jquery.scrollTo.min.js')}}"></script>
<script src="{{asset('js/jquery.nicescroll.js')}}" type="text/javascript"></script>
<script src="{{asset('js/jquery.sparkline.js')}}" type="text/javascript"></script>
{{--
<script src="assets/jquery-easy-pie-chart/jquery.easy-pie-chart.js"></script>
--}}
{{--
<script src="js/owl.carousel.js" ></script>
--}}
<script src="{{asset('js/jquery.customSelect.min.js')}}" ></script>

<!--common script for all pages-->
<script src="{{asset('js/common-scripts.js')}}"></script>
@yield('footer')
<!--script for this page-->
{{--<script src="js/sparkline-chart.js"></script>
<script src="js/easy-pie-chart.js"></script>--}}
</body>
</html>