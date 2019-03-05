<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="keywords" content="@foreach($page->keywords as $keyword){{$keyword->name.', '}} @endforeach">
    <meta name="description" content="{{$page->seo_desc}}">
    <title>@yield('title',\Setting::get('site_name'))</title>

    <link rel="stylesheet" type="text/css" href="{{asset('fonts/fontAwsome/css/font-awesome.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('fonts/fontAwsome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/index.blog.item.css')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap-rtl.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/animate.css')}}"/>

</head>
<body>
@include('partials.header')

@include('partials.menu')
<!--------------------------- end NAVIGATION(MENU)-Bodybuilding ---------------------->
<!--<div class="container-fluid">-->
<!--    <div class="img-header">-->
{{--
<!--        <img src="{{route('media',$article->img)}}" alt="">-->
--}}
<!--        <div class="img-header-title">-->
{{--
<!--            <p>{{$created}}</p>-->
--}}
<!--        </div>-->
<!--    </div>-->
<!--</div>-->

<div class="container-fluid">
    <div class="blog-proposal">
        <div class="blog-proposal-pg">
            <div class="proposal-pg-title">
                <p>{{$page->title}}</p>
            </div>
           {{-- <div class="img-header-title">
                <p>{{Convertnumber2english($created)}}</p>
            </div>--}}
            
          {{--  <div class="img-header">
                <img class=" mx-auto d-block" src="{{route('media',$article->img)}}" alt="">
            </div>--}}
            
            <div class="proposal-pg-body">
                {!! $page->text !!}
            </div>
        </div>
    </div>
</div>


@include('partials.footer')

</body>

<script src="{{asset('js/jquery-3.2.0.min.js')}}"></script>
<script src="{{asset('js/bootstrap.js')}}"></script>
<script src="{{asset('js/jq.js')}}"></script>

</html>