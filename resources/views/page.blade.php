@extends('layouts.app')
@yield('meta_description',$page->seo_desc)
@yield('title',$page->title)
@yield('meta_title',$page->title)

@section('head')
    <meta name="keywords" content="@foreach($page->keywords as $keyword){{$keyword->name.', '}} @endforeach">
    <link rel="stylesheet" type="text/css" href="{{asset('css/index.blog.item.css')}}">



@endsection
@section('main_content')

    <div class="container-fluid">
        <div class="blog-proposal">
            <div class="blog-proposal-pg">
                <div class="proposal-pg-body">
                    {!! $page->text !!}
                </div>
            </div>
        </div>
    </div>


@endsection

@section('footer')

@endsection
