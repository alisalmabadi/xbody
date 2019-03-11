    @extends('layouts.app')
@section('head')
    <style>


    </style>
    @endsection
    @section('main_content')

        @include('partials.sliders.slider_1')
        @include('partials.welcome')
        @include('partials.attr')
        @include('partials.sliders.slider_2')
        @include('partials.cards')
        @include('partials.item_only')
        @include('partials.attr2')
        @include('partials.blog')

@section('footer')
    <script>
        new WOW().init();
    </script>
    <script src="{{asset('js/jquery.paroller.min.js')}}"></script>
    <script>
        $(".row-container-first").paroller({ factor: 0.7, factorXs: 0.5, factorSm: 0.7, type: 'foreground', direction: 'vertical' , transition: 'transform 0.1s ease' });

    </script>
    @endsection
        @endsection