<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="description" content="{{$article->seo_desc}}">
    <meta name="title" content="{{$article->seo_title}}">
    <meta name="keywords" content="@foreach($article->keywords as $keyword) {{$keyword->name}}, @endforeach">
    <title>@yield('title',$article->title)</title>

    <link rel="stylesheet" type="text/css" href="{{asset('fontAwsome/css/font-awesome.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('fontAwsome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/index.blog.item.css')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap-rtl.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/animate.css')}}"/>
<style>
    .proposal-pg-titles {
        width: 90%;
        height: 80px;
        text-align: center;
        margin: 0 auto;
    }
    .proposal-pg-titles p {
        /* text-align: center; */
        line-height: 20px;
        font-size: 2vw;
        font-weight: bold;
    }
</style>
</head>
<body>
@include('partials.header')

@include('partials.menu')
<!--------------------------- end NAVIGATION(MENU)-Bodybuilding ---------------------->
<!--<div class="container-fluid">-->
<!--    <div class="img-header">-->
<!--        <img src="{{route('media',$article->img)}}" alt="">-->
<!--        <div class="img-header-title">-->
<!--            <p>{{$created}}</p>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->

<div class="container-fluid">
    <div class="blog-proposal">
        <div class="blog-proposal-pg">
            <div class="proposal-pg-titles">
                <p>{{$article->title}}</p>
            </div>
            <div class="img-header-title">
                <p>{{Convertnumber2english($created)}}</p>
            </div>
            
            <div class="img-header">
                <img class=" mx-auto d-block" src="{{route('media',$article->img)}}" alt="">
            </div>
            
            <div class="proposal-pg-body">
                {!! $article->body !!}
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