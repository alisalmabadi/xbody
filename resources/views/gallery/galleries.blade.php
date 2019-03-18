@extends('layouts.app')

@section('head')
    <title>@yield('site_name',\Setting::get('site_name'))</title>
    @include('partials.header')
    @include('partials.menu')
@endsection

@section('main_content')

@endsection

@section('footer')

@endsection