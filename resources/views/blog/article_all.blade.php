<!doctype html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <link rel="stylesheet" type="text/css" href="{{asset('fonts/fontAwsome/css/font-awesome.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('fonts/fontAwsome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap-rtl.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/bodybuilder-blog.css')}}">
    <link rel="stylesheet" href="{{asset('css/animate.css')}}">
    <title>@yield('title','باشگاه بدنسازی xbody ')</title>

</head>
<body>
    <style>
    body{
        background:none !important;
    }
   
    .container-fluid {
        padding: 0 !important;
    }

    .blog-post {
        width: 100%;
        height: auto;
        /*background: red;*/
        float: right;
        margin-top: 60px;
        /*margin-bottom: 60px;*/
    }

    .clear {
        clear: both;
    }

    .blog-post .post {
        min-width: 100%;
        height: auto;
        /*background: #2c3;*/
        /*margin: 0 auto;*/
        margin-bottom: 80px;
        /*padding-bottom: 80px;*/
        /*float: right;*/
    }

    .post .image {
        width: 92%;
        height: 45%;
        /*position: absolute;*/
        /*cursor: pointer;*/
        /*float: right;*/
    }

    .image img {
        width: 100%;
        height: 100%;
    }

    .post .post-content {
        width: 92%;
        height: 55%;
        margin: 0 auto;
        /*background: #2c3e50;*/
        /*float: right;*/
    }

    .post-content h3 {
        width: 100%;
        text-align: right;
        padding-top: 30px;
        color: black;
    }

    .post-content .date {
        width: 100%;
        text-align: right;
            font-size: 72%;
        color: #999;
    }

    .post-content .content {
        width: 100%;
        text-align: justify;
        padding-top: 12px;
        color: #888;
    }

    .post .image a:hover .hover-overlay {
        /*-webkit-transform: scaleY(.3);*/
        /*-moz-transform: scaleY(.3);*/
        /*-ms-transform: scaleY(.3);*/
        /*-o-transform: scaleY(.3);*/
        transform: scaleY(.1);
        /*margin-top: -255px;*/
        -moz-transition-delay: 0ms;
        -o-transition-delay: 0ms;
        -webkit-transition-delay: 0ms;
        transition-delay: 0ms;

    }

    .post .image a .hover-overlay {
        position: absolute;
        left: 8%;
        right: 8%;
        bottom: 0;
        top: -54%;
        display: block;
        background: rgba(0, 0, 0, .5);
        -webkit-transform: scaleY(0);
        -moz-transform: scaleY(0);
        -ms-transform: scaleY(0);
        -o-transform: scaleY(0);
        transform: scaleY(0);
        -moz-transition: all 220ms ease-in-out;
        -o-transition: all 220ms ease-in-out;
        -webkit-transition: all 220ms ease-in-out;
        transition: all 220ms ease-in-out;
        -moz-transition-delay: 150ms;
        -o-transition-delay: 150ms;
        -webkit-transition-delay: 150ms;
        transition-delay: 150ms;
    }

    .post .image a:hover .hover-readmore {
        zoom: 1;
        display: block !important;
        /*-webkit-opacity: 1;*/
        /*-moz-opacity: 1;*/
        opacity: 1;
        /*margin-top: -140px;*/
        /*filter: alpha(opacity=100);*/
        /*-moz-transition-delay: 220ms;*/
        /*-o-transition-delay: 220ms;*/
        /*-webkit-transition-delay: 220ms;*/
        /*transition-delay: 220ms;*/
    }

    .post .image a .hover-readmore {
        position: absolute;
        display: none;
        left: 0;
        right: 0;
        top: 22%;
        color: #ffffff;
        text-align: center;
        font-size: 92%;
        margin-top: -5px;
        /*zoom: 1;*/
        /*-webkit-opacity: 0;*/
        /*-moz-opacity: 0;*/
        /*opacity: 0;*/
        /*filter: alpha(opacity=0);*/
        /*-moz-transition: all 300ms cubic-bezier(.19, 1, .965, 1);*/
        /*-o-transition: all 300ms cubic-bezier(.19, 1, .965, 1);*/
        /*-webkit-transition: all 300ms cubic-bezier(.19, 1, .965, 1);*/
        /*transition: all 300ms cubic-bezier(.19, 1, .965, 1);*/
        /*-moz-transition-delay: 0ms;*/
        /*-o-transition-delay: 0ms;*/
        /*-webkit-transition-delay: 0ms;*/
        /*transition-delay: 220ms;*/
    }
    
    .bloglink:hover{
        color:#dd1f26;
        transition:ease-in-out all 1s;
    }

    @media (max-width: 1030px) {

        .post .image a .hover-overlay {
            position: absolute;
            left: 8%;
            right: 8%;
            bottom: 0;
            top: -67%;
            display: block;
            background: rgba(0, 0, 0, .5);
            -webkit-transform: scaleY(0);
            -moz-transform: scaleY(0);
            -ms-transform: scaleY(0);
            -o-transform: scaleY(0);
            transform: scaleY(0);
            -moz-transition: all 220ms ease-in-out;
            -o-transition: all 220ms ease-in-out;
            -webkit-transition: all 220ms ease-in-out;
            transition: all 220ms ease-in-out;
            -moz-transition-delay: 150ms;
            -o-transition-delay: 150ms;
            -webkit-transition-delay: 150ms;
            transition-delay: 150ms;
        }

        .post .image a .hover-readmore {
            position: absolute;
            display: none;
            left: 0;
            right: 0;
            top: 15%;
            color: #ffffff;
            text-align: center;
            font-size: 92%;
            margin-top: -5px;
        }
    }

    @media (max-width: 330px) {

        .post .image a .hover-overlay {
            position: absolute;
            left: 1%;
            right: 9%;
            bottom: 0;
            top: -67%;
            display: block;
            background: rgba(0, 0, 0, .5);
            -webkit-transform: scaleY(0);
            -moz-transform: scaleY(0);
            -ms-transform: scaleY(0);
            -o-transform: scaleY(0);
            transform: scaleY(0);
            -moz-transition: all 220ms ease-in-out;
            -o-transition: all 220ms ease-in-out;
            -webkit-transition: all 220ms ease-in-out;
            transition: all 220ms ease-in-out;
            -moz-transition-delay: 150ms;
            -o-transition-delay: 150ms;
            -webkit-transition-delay: 150ms;
            transition-delay: 150ms;
        }

        .post .image a .hover-readmore {
            position: absolute;
            display: none;
            left: 0;
            right: 0;
            top: 15%;
            color: #ffffff;
            text-align: center;
            font-size: 92%;
            margin-top: -5px;
        }
    }
    
</style>
@include('partials.header')
@include('partials.menu')

<!------------------------------------- Box-Products ---------------------------------->

<div class="container">
  <!--  <div class="box-products-menu">
        <ul>
            <li><a class="categories" href="#" data-id="0">همه</a></li>
            @foreach($article_categories as $category)
            <li><a class="categories" href="#" data-id="{{$category->id}}">{{$category->name}}</a></li>
            @endforeach

        </ul>
    </div>-->

    <div class="blog-post row" style="margin-right: 0.2%;">
@foreach($articles as $article)
@php
$created_at=new \Verta($article->created_at);

@endphp

      <div class="col-lg-4 col-sm-6 col-12">
            <div class="post">
                <div class="image mx-auto">
                    <a href="blog/{{$article->article_category->slug}}/{{$article->slug}}"> <img src="{{route('media',$article->img_thumbnail)}}" alt="">
                        <span class="hover-overlay"></span>
                        <span class="hover-readmore">ادامه مطلب ...</span>
                    </a>
                </div>
                <div class="post-content ">
                   <a  href="blog/{{$article->article_category->slug}}/{{$article->slug}}"><h3 class="bloglink" style="font-size:18px;">{{$article->title}}</h3></a>
                    <div class="date">{{Convertnumber2english($created_at->format('%d %B, %Y'))}}</div>
                    <div class="content" style="font-size:11px;">
                        <p>{{$article->short}}</p>
                    </div>
                </div>
            </div>
        </div>
        @endforeach




    </div>
</div>
@include('partials.footer')
<script src="{{asset('js/jquery-3.2.0.min.js')}}"></script>
<script src="{{asset('js/bootstrap.js')}}"></script>
<script src="{{asset('js/jq.js')}}"></script>
<script src="{{asset('js/wow.min.js')}}"></script>

</body>
</html>