@extends('layouts.app')

@section('head')
    <link rel="stylesheet" href="{{asset('css/lc_lightbox.css')}}" />
    <!-- SKINS -->
    <link rel="stylesheet" href="{{asset('css/minimal.css')}}" />
    <style>
    .col-md-4.photo_item {
        float: right;
    }
    img.img-fluid.photoimg {
        height: 326px;
        width: 100%;
    }

    .images-group {
        padding-top: 1%;
        height: auto;
        background: #ffffffa3;
        height: 510px;
    }
    .titlebar{
        width: 100%;
        margin: 0 auto;
        background: #df0617;
        text-align: center;
        color: white;
    }
    .titlegallery {
        text-align: center;
        border-bottom: 2px solid red;
        margin-bottom: 3%;
        padding-right: 39px;
       /* background: url(../images/xmark.png) no-repeat;*/
        background-position: right;
        background-size: 32px;
        font-size: 24px;
        font-weight: bold;
    }

    .view {
        padding: 0px !important;
        width: 300px;
        height: 200px;
        margin: 10px;
        float: left;
        /*border: 10px solid #fff;*/
        overflow: hidden;
        position: relative;
        text-align: center;
     /*   -webkit-box-shadow: 1px 1px 2px #e6e6e6;
        -moz-box-shadow: 1px 1px 2px #e6e6e6;
        box-shadow: 1px 1px 2px #e6e6e6;*/
        cursor: default;
      /*  background: #fff url(../images/bgimg.jpg) no-repeat center center;*/
    }
    .view .mask,.view .content {
        width: 300px;
        height: 200px;
        position: absolute;
        overflow: hidden;
        top: 0;
        left: 0;
    }
    .view img {
        display: block;
        position: relative;
    }
    .view h2 {
        text-transform: uppercase;
        color: #fff;
        text-align: center;
        position: relative;
        font-size: 17px;
        padding: 10px;
        background: rgba(0, 0, 0, 0.8);
        margin: 20px 0 0 0;
    }
    .view p {
        font-size: 12px;
        position: relative;
        color: #fff;
        padding: 10px 20px 20px;
        text-align: center;
    }
    .view a.info {
        display: inline-block;
        text-decoration: none;
        padding: 7px 14px;
        background: #000;
        color: #fff;
        text-transform: uppercase;
        -webkit-box-shadow: 0 0 1px #000;
        -moz-box-shadow: 0 0 1px #000;
        box-shadow: 0 0 1px #000;
    }
    .view a.info: hover {
        -webkit-box-shadow: 0 0 5px #000;
        -moz-box-shadow: 0 0 5px #000;
        box-shadow: 0 0 5px #000;
    }

    /* NINTH EXAMPLE*/
    .view-ninth .mask-1, .view-ninth .mask-2 {
        background-color: rgba(0, 0, 0, 0.59);
        height: 361px;
        width: 361px;
        background: rgba(223, 6, 23, 0.5);
        -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=100)";
        filter: alpha(opacity=100);
        opacity: 1;
        -webkit-transition: all 0.3s ease-in-out 0.6s;
        -moz-transition: all 0.3s ease-in-out 0.6s;
        -o-transition: all 0.3s ease-in-out 0.6s;
        transition: all 0.3s ease-in-out 0.6s;
    }
    .view-ninth .mask-1 {
        left: auto;
        right: 0;
        -webkit-transform: rotate(56.5deg) translateX(-180px);
        -moz-transform: rotate(56.5deg) translateX(-180px);
        -o-transform: rotate(56.5deg) translateX(-180px);
        -ms-transform: rotate(56.5deg) translateX(-180px);
        transform: rotate(56.5deg) translateX(-180px);
        -webkit-transform-origin: 100% 0%;
        -moz-transform-origin: 100% 0%;
        -o-transform-origin: 100% 0%;
        -ms-transform-origin: 100% 0%;
        transform-origin: 100% 0%;
    }
    .view-ninth .mask-2 {
        top: auto;
        bottom: 0;
        -webkit-transform: rotate(56.5deg) translateX(180px);
        -moz-transform: rotate(56.5deg) translateX(180px);
        -o-transform: rotate(56.5deg) translateX(180px);
        -ms-transform: rotate(56.5deg) translateX(180px);
        transform: rotate(56.5deg) translateX(180px);
        -webkit-transform-origin: 0% 100%;
        -moz-transform-origin: 0% 100%;
        -o-transform-origin: 0% 100%;
        -ms-transform-origin: 0% 100%;
        transform-origin: 0% 100%;
    }
    .view-ninth .content {
        background: rgba(0, 0, 0, 0.9);
        height: 0;
        -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=50)";
        filter: alpha(opacity=50);
        opacity: 0.5;
        width: 361px;
        overflow: hidden;
        -webkit-transform: rotate(-33.5deg) translate(-112px, 166px);
        -moz-transform: rotate(-33.5deg) translate(-112px, 166px);
        -o-transform: rotate(-33.5deg) translate(-112px, 166px);
        -ms-transform: rotate(-33.5deg) translate(-112px, 166px);
        transform: rotate(-33.5deg) translate(-112px, 166px);
        -webkit-transform-origin: 0% 100%;
        -moz-transform-origin: 0% 100%;
        -o-transform-origin: 0% 100%;
        -ms-transform-origin: 0% 100%;
        transform-origin: 0% 100%;
        -webkit-transition: all 0.4s ease-in-out 0.3s;
        -moz-transition: all 0.4s ease-in-out 0.3s;
        -o-transition: all 0.4s ease-in-out 0.3s;
        transition: all 0.4s ease-in-out 0.3s;
    }
    .view-ninth h2 {
        background: transparent;
        margin-top: 5px;
        border-bottom: 1px solid rgba(255, 255, 255, 0.2);
    }
    .view-ninth a.info {
        display: none;
    }
    .view-ninth:hover .content {
        height: 120px;
        width: 300px;
        -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=90)";
        filter: alpha(opacity=90);
        opacity: 0.9;
        top: 40px;
        -webkit-transform: rotate(0deg) translate(0, 0);
        -moz-transform: rotate(0deg) translate(0, 0);
        -o-transform: rotate(0deg) translate(0, 0);
        -ms-transform: rotate(0deg) translate(0, 0);
        transform: rotate(0deg) translate(0, 0);
    }
    .view-ninth:hover .mask-1, .view-ninth:hover .mask-2 {
        -webkit-transition-delay: 0s;
        -moz-transition-delay: 0s;
        -o-transition-delay: 0s;
        transition-delay: 0s;
    }
    .view-ninth:hover .mask-1 {
        -webkit-transform: rotate(56.5deg) translateX(1px);
        -moz-transform: rotate(56.5deg) translateX(1px);
        -o-transform: rotate(56.5deg) translateX(1px);
        -ms-transform: rotate(56.5deg) translateX(1px);
        transform: rotate(56.5deg) translateX(1px);
    }
    .view-ninth:hover .mask-2 {
        -webkit-transform: rotate(56.5deg) translateX(-1px);
        -moz-transform: rotate(56.5deg) translateX(-1px);
        -o-transform: rotate(56.5deg) translateX(-1px);
        -ms-transform: rotate(56.5deg) translateX(-1px);
        transform: rotate(56.5deg) translateX(-1px);
    }

    .open_fancybox:hover{
        cursor: pointer;
    }
</style>
@endsection

@section('main_content')
<div class="container-fluid whole-image_gallery" style="clear: both;/*background: url(../images/backgrounds/bggallery.jpg) no-repeat;
    background-size: cover;*/">
    <div class="row" style="height: 30px;"></div>
    <div class="col-xl-12 col-md-12 images-group">
        <div class="titlegallery"><img style="width: 31px;height: 31px;margin-bottom: 4px;" src="../images/xmark.png"> گالری تصاویر</div>
        @foreach($galleries as $gallery)
        <div class="col-md-4 photo_item view view-ninth">
            <a class="open_fancybox" data-id="{{$gallery->id}}" data-token="{{csrf_token()}}">
            <img class="img-fluid photoimg" src="../{{$gallery->image_original}}">
                <div class="mask mask-1"></div>
                <div class="mask mask-2"></div>
                <div class="content">
                    <h2>{{$gallery->name}}</h2>
                    <p>{{$gallery->desc}}</p>
        {{--
                    <a href="#" class="info">Read More</a>
--}}
                </div>
        {{--    <div class="titlebar">
            <span>{{$gallery->name}}</span>
            </div>--}}
            </a>
        </div>
            @endforeach


        </div>
    <div class="row" style="height: 30px;"></div>
    <div class="resultgallery">

    </div>
</div>

@endsection



@section('footer')
    <script src="{{asset('js/lc_lightbox.lite.js')}}" type="text/javascript"></script>
    <!-- ASSETS -->
    <script src="{{asset('js/alloy_finger.min.js')}}" type="text/javascript"></script>



    <script>
    $(".open_fancybox").click(function(e) {
        var id=$(this).data('id');
        var token=$(this).data('token');
        e.preventDefault();
        $.ajax({
           url:'{{route('gallery.getimages')}}',
            method:'POST',
            data:{id:id, _token: token},
            success:function (data) {
                var html='';
               $.each(data,function (index,value) {
                   html+='<a class="elem" href="../'+value.image_path+'" title="'+value.title+'" data-lcl-txt="'+value.alt+'"  data-lcl-thumb="../'+value.image_path+'">\n' +
                       '        \t<span style="background-image: url(../'+value.image_path+');"></span>\n' +
                       '        </a>';
               });

               $('.resultgallery').html(html);

                   // live handler
                   lc_lightbox('.elem', {
                       wrap_class: 'lcl_fade_oc',
                       gallery : true,
                       thumb_attr: 'data-lcl-thumb',

                       skin: 'minimal',
                       radius: 0,
                       padding	: 0,
                       border_w: 0,
                   });

               $('.elem').trigger('click');
            },
            error:function () {

            }
        });
    });
/*
    $(".open_fancybox").click(function(e) {
        e.preventDefault();

        var images=$(this).find('.photosinfo').val().split(",");
        images.pop();
      /!* alert(images);*!/
      // var imagesarr=images.;
       console.log(images);
        $.each(images, function(index, value) {
          alert('{href :"../'+value+'"},');
        });
    /!*   var titles=$('.photosinfo').data('title');*!/
        $.fancybox.open([
            /!*$.each(images, function(index, value) {
                '{href :"../'+value+'",title : "salam"},'
            })*!/
            $.each(images, function(index, value) {
                {
                    href : value
                }
            })
          /!*  {
                href:'http://fancyapps.com/fancybox/demo/1_b.jpg',
            }*!/
        ], {
            nextEffect : 'none',
            prevEffect : 'none',
            padding    : 0,
            helpers    : {
                title : {
                    type: 'over'
                },
                thumbs : {
                    width  : 75,
                    height : 50,
                    source : function( item ) {
                        return item.href.replace('_b.jpg', '_s.jpg');
                    }
                }
            }
        });

        return false;
    });
*/
</script>
@endsection