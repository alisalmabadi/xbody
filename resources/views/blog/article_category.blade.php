@extends('layouts.blog')

@section('head')
    <link type="text/css" rel="stylesheet" media="all" href="{{ route('home') }}/css/owl.carousel.min.css" />
    <link type="text/css" rel="stylesheet" media="all" href="{{ route('home') }}/css/owl.theme.default.css" />

    <style>
        .behclick-panel  .list-group {
        margin-bottom: 0px;
        }
        .behclick-panel .list-group-item:first-child {
        border-top-left-radius:0px;
        border-top-right-radius:0px;
        }
        .behclick-panel .list-group-item {
        border-right:0px;
        border-left:0px;
        }
        .behclick-panel .list-group-item:last-child{
        border-bottom-right-radius:0px;
        border-bottom-left-radius:0px;
        }
        .behclick-panel .list-group-item {
        padding: 5px;
        }
        .behclick-panel .panel-heading {
        /* 				padding: 10px 15px;
        border-bottom: 1px solid transparent; */
        border-top-right-radius: 0px;
        border-top-left-radius: 0px;
        border-bottom: 1px solid #f9f1f5;
        }
        .behclick-panel .panel-heading:last-child{
        /* border-bottom: 0px; */
        }
        .behclick-panel {
        border-radius: 0px;
        border-right: 0px;
        border-left: 0px;
        border-bottom: 0px;
        box-shadow: 0 0px 0px rgba(0, 0, 0, 0);
        }
        .behclick-panel .radio, .checkbox {
        margin: 0px;
        padding-left: 10px;
        }
        .behclick-panel .panel-title > a, .panel-title > small, .panel-title > .small, .panel-title > small > a, .panel-title > .small > a {
        outline: none;
        }
        .behclick-panel .panel-body > .panel-heading{
        padding:10px 10px;
        }
        .behclick-panel .panel-body {
        padding: 0px;
        }
        /* unvisited link */
        .behclick-panel a:link {
        text-decoration:none;
        }

        /* visited link */
        .behclick-panel a:visited {
        text-decoration:none;
        }

        /* mouse over link */
        .behclick-panel a:hover {
        text-decoration:none;
        }
        .indicator
        {
        float: left;
        }
        .filter-title
        {
        background-color: #0f1112 !important;

        }

    </style>
@stop
@section('content')

    @include('blog.header')

    <section class="container-fluid article-category-page-header">
      <div class="back-img">  <img src="{{route('home')}}/images/articale_category_img.jpg" alt=""></div>
        <div class="container">

        <h1>{{$article_category->name}}</h1>
        <p>{{$article_category->desc}}</p>
        </div>
    </section>

    <section class="container">
        <div class="row">
            <div class="col-sm-5">
                <h2>نمایش <span>{{count($article_category->articles)}}</span>نتیجه</h2>

            </div>
            <div class="col-sm-5 col-sm-offset-2" style="padding-top: 25px">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="جستوجو" onkeyup="$('input[name=search]').val($(this).val());$(this).val()==''? filter():'';" name="article_search">
                    <span class="input-group-btn"> <button class="btn btn-default" type="button" onclick="$('input[name=search]').val($('input[name=article_search]').val());filter();"> <span class="fa fa-search"></span></button></span>

                </div>

            </div>

        </div>
        <hr>
    </section>




    <section class="container-fluid article-list-box">

        <div class="container">

                    <div class="row">
                        <div class="col-sm-3">
                            <section class="article-search-filter">
                                <div id="accordion" class="panel panel-primary behclick-panel">

                                    <div class="panel-heading filter-title">
                                        <h3 class="panel-title" > فیلتر <span class="fa fa-filter"></span></h3>
                                    </div>
                                    <div class="panel-body" >
                                        <form id="frm_filter"  action="{{route('article_category_show_f',$article_category)}}" method="post" class="js-news-form">
                                            {{csrf_field()}}
                                            <input type="hidden" name="search" value="">
                                            <div class="panel-heading " >
                                                <h4 class="panel-title">
                                                    <a data-toggle="collapse" href="#collapseP">
                                                      نویسنده
                                                        <i class="indicator fa fa-caret-left" aria-hidden="true"></i>
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="collapseP" class="panel-collapse collapse" >
                                                <ul class="list-group">
                                                    @foreach($users as $user)
                                                        <li class="list-group-item">
                                                            <div class="checkbox">
                                                                <label>
                                                                    <input type="checkbox" name="user_ids[]" class="filter" value="{{$user->id}}">
                                                                    {{$user->name.' '.$user->last_name}}
                                                                </label>
                                                            </div>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </div>

                                            <div class="panel-heading">
                                                <h4 class="panel-title">
                                                    <a data-toggle="collapse" href="#collapseC">
                                                        دسته بندی
                                                        <i class="indicator fa fa-caret-left" aria-hidden="true"></i>
                                                    </a>
                                                </h4>
                                            </div>

                                            <div id="collapseC" class="panel-collapse collapse" >
                                                <ul class="list-group">
                                                    @foreach($article_categories as $article_category)

                                                        <li class="list-group-item">
                                                            <div class="checkbox">
                                                                <label>
                                                                    <input type="checkbox" name="category_ids[]" class="filter" value="{{$article_category->id}}">
                                                                    {{$article_category->name}}
                                                                </label>
                                                            </div>
                                                        </li>

                                                    @endforeach
                                                </ul>
                                            </div>

                                        </form>

                                    </div>
                                </div>
                            </section>
                        </div>
                        <div id="filter_areia" class="col-sm-9">
                            <div  class="row">
                                @foreach($articles as $article)
                                  <div class="col-sm-4">
                                      <article class="article-item text-right">
                                          <a href="{{route('article_show',$article)}}">
                                              <div class="article-thumnail">
                                                  <img src="{{route('media',$article->img_thumbnail)}}" alt="{{$article->title}}" style="min-height: 170px;">
                                              </div>
                                              <div class="article-detail">
                                                  <span>{{$article->article_category->name}}</span>
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
                            <div class="row text-center">
                                {{$articles->links('partials.pagination')}}
                            </div>

                    </div>


        </div>
        </div>







    </section>


    @include('partials.footer')
@stop

@section('script_whole')
    <script type="text/javascript" src="{{route('home')}}/js/owl.carousel.min.js"></script>
    <script>
        function toggleChevron(e) {
            $(e.target)
                .prev('.panel-heading')
                .find("i.indicator")
                .toggleClass('fa-caret-down fa-caret-left');
        }
        $('#accordion').on('hidden.bs.collapse', toggleChevron);
        $('#accordion').on('shown.bs.collapse', toggleChevron);


        $(document).ajaxStart(function () {
            $('.loading').show();
        });
        $(document).ajaxStop(function () {
            $('.loading').hide();
        });

        function paginator(obj)
        {
            var url=$(obj).attr('ahref');
            //$('.s-news-lst-content').html('<div class="sc-news-lst s-news-nodata">\n' +
            //'<div class="s-loading"><span class="blind">در حال بارگذاری</span></div>\n' +
            //'</div>');

            $('#filter_areia').load(url);

        }


        $('input.filter').change(function () {
            filter();
        });

        function  filter()
        {
            $.ajax({
                url:'{{route('article_category_show_f',$article_category)}}',
                method:'post',
                data:$('#frm_filter').serialize(),
                success:function (response) {
                    $('#filter_areia').html(response);
                }
            });

        }
    </script>

@stop


