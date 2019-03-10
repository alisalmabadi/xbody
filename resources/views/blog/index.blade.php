@extends('layouts.app')

@section('head')
    <link type="text/css" rel="stylesheet" media="all" href="{{ route('home') }}/css/owl.carousel.min.css" />
    <link type="text/css" rel="stylesheet" media="all" href="{{ route('home') }}/css/owl.theme.default.css" />
@stop
@section('content')

    <!--@include('blog.header')-->

    <!--@include('partials.sliders.blog_slider_1')-->

    <section class="container-fluid logo-slider">
        <div class="logo-slider-left-handler hidden-xs"><i class="fa fa-2x fa-angle-left"></i></div>
        <div class="container">
        <div class=" owl-carousel owl-theme " dir="ltr">
            <div class="item">
                <img src="{{route('home')}}/images/gallery/ls/ls1.jpg" alt="">
            </div>

            <div class="item">
                <img src="{{route('home')}}/images/gallery/ls/ls2.png" alt="">
            </div>

            <div class="item">
                <img src="{{route('home')}}/images/gallery/ls/ls3.png" alt="">
            </div>

            <div class="item">
                <img src="{{route('home')}}/images/gallery/ls/ls4.png" alt="">
            </div>

            <div class="item">
                <img src="{{route('home')}}/images/gallery/ls/ls5.png" alt="">
            </div>

            <div class="item">
                <img src="{{route('home')}}/images/gallery/ls/ls6.png" alt="">
            </div>

            <div class="item">
                <img src="{{route('home')}}/images/gallery/ls/ls7.png" alt="">
            </div>

            <div class="item">
                <img src="{{route('home')}}/images/gallery/ls/ls8.png" alt="">
            </div>
            <div class="item">
                <img src="{{route('home')}}/images/gallery/ls/ls9.png" alt="">
            </div>
            <div class="item">
                <img src="{{route('home')}}/images/gallery/ls/ls10.png" alt="">
            </div>
            <div class="item">
                <img src="{{route('home')}}/images/gallery/ls/ls11.png" alt="">
            </div>
            <div class="item">
                <img src="{{route('home')}}/images/gallery/ls/ls12.png" alt="">
            </div>

        </div>
        </div>
        <div class="logo-slider-right-handler hidden-xs"><i class="fa fa-2x fa-angle-right"></i></div>



    </section>

    <section class="container blog-middle-icons-box">

        <div class="row">
            <div class="col-sm-4 text-center">
                <i class="fa fa-4x fa-adn "></i>
                <div class="upsell-text">
                    <div class="headline">دسترسی بی نهایت</div>
                    <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها
                    </p>
                </div>

            </div>
            <div class="col-sm-4 text-center">
                <i class="fa fa-4x fa-youtube "></i>
                <div class="upsell-text">
                    <div class="headline">دسترسی بی نهایت</div>
                    <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها
                    </p>
                </div>

            </div>
            <div class="col-sm-4 text-center">
                <i class="fa fa-4x fa-television "></i>
                <div class="upsell-text">
                    <div class="headline">دسترسی بی نهایت</div>
                    <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها
                    </p>
                </div>
            </div>

        </div>
        <div class="row text-center ">
            <button class="btn btn-lg btn-warning">خواندن بیشتر</button>


        </div>


    </section>

    <section class="container-fluid blog-category-box">
        <div class="container">
            <div class="row">
                <h1 class="article-category-title">دسته بندی مقالات</h1>
            </div>
            @foreach($article_categories as $article_category)
            <div class="col-sm-3">

                <article class="article-category-item text-center">
                    <a href="{{route('article_category_show',$article_category)}}">
                    <div class="article-thumnail">
                    <img src="{{route('media',$article_category->img)}}" alt="{{$article_category->title}}">
                    </div>
                    <h3 class="">{{$article_category->name}}</h3>
                    <span class="category-count"><i class="fa fa-pencil "></i>({{count($article_category->articles)}})</span>
                </a>
                </article>

            </div>
           @endforeach
        </div>


    </section>
    <section class="container-fluid article-list-box">
        <h2 class="article-list-title">مقالات</h2>
        <div class="container">

            <ul class="nav nav-pills nav-justified">

                @foreach($article_categories as $article_category)

                    <li   @if ($article_category->id == $article_categories[0]->id) class="active" @endif><a data-toggle="pill" href="#ac_{{$article_category->id}}">{{$article_category->name}}</a></li>

                @endforeach

            </ul>

            <div class="tab-content">
                @foreach($article_categories as $article_category)
                <div id="ac_{{$article_category->id}}" class="tab-pane fade  @if ($article_category->id == $article_categories[0]->id) in active @endif">
                    <div class="row">
                        @foreach($article_category->articles as $article)
                        <div class="col-sm-3">
                            <article class="article-item text-right">
                                <a href="{{route('article_show',$article)}}">
                                <div class="article-thumnail">
                                    <img src="{{route('media',$article->img_thumbnail)}}" alt="{{$article->title}}">
                                </div>
                                <div class="article-detail">
                                    <span>{{$article_category->name}}</span>
                                    <div class="article-title ">
                                        <h3 class="">{{$article->title}}</h3>
                                    </div>

                                    <span class="article-writer"><i class="fa fa-user-circle-o "></i>{{$article->user->name}}</span>

                                    <span class="article-date">{{$article->persian_date}}<i class="fa fa-calendar-check-o "></i></span>
                                </div>
                                </a>
                            </article>

                        </div>
                        @endforeach
                    </div>
                </div>
                @endforeach

            </div>



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


