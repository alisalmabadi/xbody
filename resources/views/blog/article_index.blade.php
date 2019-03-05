@extends('layouts.blog')

@section('head')
    <link type="text/css" rel="stylesheet" media="all" href="{{ route('home') }}/css/owl.carousel.min.css" />
    <link type="text/css" rel="stylesheet" media="all" href="{{ route('home') }}/css/owl.theme.default.css" />
@stop
@section('content')

    @include('blog.header')


    <section class="container">
        <div class="article-summary row">
            <div class="col-sm-4">
                <img src="{{route('media',$article->img)}}" alt="{{$article->title}}">
            </div>
            <div class="col-sm-8">
            <h3>چکیده</h3>
            <p>{!! $summury!!}</p>
            </div>
        </div>



    </section>

    <section class="container">
        <div class="col-sm-3">
        <section class="article-detail">

            <ul>
                <li><span class="label"><i class="fa fa-clock-o fa-lg"></i> انتشار:</span> <span class="a-detail-value">{{$article->persian_date}}</span></li>
                <li><span class="label"><i class="fa fa-user fa-lg"></i> نویسنده:</span> <span class="a-detail-value">{{$article->user->name.' '.$article->user->last_name}}</span></li>
                <li><span class="label"><i class="fa fa-graduation-cap fa-lg"></i> موضوع:</span> <span class="a-detail-value">{{$article->article_category->name}}</span></li>


            </ul>


        </section>


        </div>

        <div class="col-sm-9">
            <article class="article-content">
                {!! $article->body !!}

            </article>



        </div>



    </section>

    @include('partials.footer')
@stop

@section('script_whole')
    <script type="text/javascript" src="{{route('home')}}/js/owl.carousel.min.js"></script>
    <script>
        var owl = $('.owl-carousel');
        owl.owlCarousel({
            loop:true,
            nav:false,
            dots:false,
            margin:10,
            responsive:{
                0:{
                    items:2
                },
                600:{
                    items:3
                },
                960:{
                    items:5
                },
                1200:{
                    items:6
                }
            }
        });
        $('.logo-slider-right-handler').click(function () {
            owl.trigger('prev.owl');
        });
        $('.logo-slider-left-handler').click(function () {
            owl.trigger('next.owl');
        });

        owl.on('mousewheel', '.owl-stage', function (e) {
            if (e.deltaY>0) {
                owl.trigger('next.owl');
            } else {
                owl.trigger('prev.owl');
            }
            e.preventDefault();
        });
    </script>

@stop


