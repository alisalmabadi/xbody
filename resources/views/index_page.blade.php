    @extends('layouts.app')
@section('head')
{{--    <link type="text/css" rel="stylesheet" media="all" href="{{asset('css/owl.carousel.min.css')}}" />
    <link type="text/css" rel="stylesheet" media="all" href="{{asset('css/owl.theme.default.css')}}" />--}}
    <style>
    .transform{
        box-shadow: 36px 0px 5px 4px #8080804f;
    }

    .owl-carousel .owl-nav {
        background-color: blue;
        transition: ease-in-out all 1s;
    }

    .owl-carousel {
        position: relative;
    }

    .owl-carousel .owl-next,
    .owl-carousel .owl-prev {
        width: 23px;
        height: 102px;
        line-height: 50px;
        border-radius: 50%;
        position: absolute;
        top: 5%;
        font-size: 20px;
        color: black !important;
        border: 1px solid #ddd;
        text-align: center;
        background: white !important;
        opacity: 0.5;
    }


    body .owl-prev i{
        opacity: 1 !important;
        color: #35ccfe !important;


    }
    body .owl-next i{
        opacity: 1 !important;
        color: #35ccfe !important;

    }
    body .owl-next{
        opacity: 0.5;
        right: -5px;
        display: flex;
        background-color:white;
        color: black !important;
    }
    body .owl-prev{
        left: -5px;
        display: flex;
        background-color:white;
        color: black !important;
        opacity: 0.5;

    }
    body .owl-next:hover{
        opacity: 1;
    }
    body .owl-prev:hover{
        opacity: 1;
    }

    .shadow-effect {
        box-shadow:1px 2px 4px 4px #8390831c;
        border-radius: 4px;
    }
    .shadow-effect:hover {
        box-shadow: 1px 2px 2px 4px #00000017;
        transition: ease-in all 0.4s;
    }

    .title.caros{
        font-size: 12px;
        color:white
    }
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
{{--
    <script src="{{asset('js/jquery.paroller.min.js')}}"></script>
--}}
{{--
    <script type="text/javascript" src="{{asset('js/owl.carousel.min.js')}}"></script>
--}}
    <script>
      /*  $(".row-container-first").paroller({ factor: 0.7, factorXs: 0.5, factorSm: 0.7, type: 'foreground', direction: 'vertical' , transition: 'transform 0.1s ease' });*/
        // menu fixed
        $(window).bind('scroll', function() {
            // The value of where the "scroll" is.
            if($(window).scrollTop() > 150){
                $('nav').addClass('fixed-top');
                $("#menu").addClass('fixed-top');
            }else{
                $('nav').removeClass('fixed-top');
                $("#menu").removeClass('fixed-top');
            }
        });
/*
      $('.owl-one').owlCarousel({
          loop: false,
          item: 3,
          margin: 1,
          dots:false,
          //center: true,
          responsiveClass: true,
          animateIn: 'fadeIn',
          animateOut: 'fadeOut',
          autoplay: true,
          rtl:true,
          smartSpeed: 450,
          nav:true,
          // autoplayTimeout: 8500,
          // paginationSpeed : 400,
          navText: ['<img style="transform: rotate(180deg);"  src="../images/nextslide.gif">','<img src="../images/nextslide.gif">'],
          responsive: {
              0: {
                  items: 3,
                  nav: true,
                  margin:0,
              },
              600: {
                  items: 3,
                  nav: true,
                  margin: 5,
                  loop: false
              },
              1000: {
                  items: 3,
                  nav: true,
                  navRewind:true,
                  loop: false,
                  margin: 1
              }
          }
      });*/

    </script>


    {{--bad az load shodane kolle safhe, be matne "ba xbody e iran tafavot ra lams konid" ke dar safhe 'partials.welcome' hastesh, class hayi ke animate typewrite mikone ro behesh add mikone - nokte: css e animate dar safhe 'partials.welcome' neveshte shode--}}
    <script>
        $(document).ready(function() {
            $("#typewriter_text").css('display' , 'block');
            $("#typewriter_text").addClass("line-1 anim-typewriter");

            $('.imageblog').click(function () {
              /*  alert('asd');*/
                var url=$(this).data('url');
                //Window.location.href(url);
                window.open(url, '_blank');

            });
        });
    </script>
    {{--END OF bad az load shodane kolle safhe, be matne "ba xbody e iran tafavot ra lams konid" ke dar safhe 'partials.welcome' hastesh, class hayi ke animate typewrite mikone ro behesh add mikone - nokte: css e animate dar safhe 'partials.welcome' neveshte shode--}}
    @endsection
        @endsection