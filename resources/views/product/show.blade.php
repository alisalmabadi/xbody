<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">


    <title>@yield('title',\Setting::get('site_name'))</title>

    {{--
        <link rel="stylesheet" type="text/css" href="{{asset('css/font-awesome.css')}}">
    --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!--<link rel="stylesheet" href="../css/Bodybuilding.css">-->
    <link rel="stylesheet" href="{{asset('css/single-page.css')}}">
{{--
    <link rel="stylesheet" href="{{asset('css/bootstrap4.min.css')}}">
--}}

    <link rel="stylesheet" href="{{asset('css/bootstrap-rtl.min.css')}}">

    <link href="{{ route('home') }}/css/xzoom.css" rel="stylesheet">
    {{--
        <link href="{{ route('home') }}/css/magnific-popup.css" rel="stylesheet">
    --}}
    {{--<link type="text/css" rel="stylesheet" media="all" href="{{ route('home') }}/css/jquery.fancybox.css" />--}}
    <link rel="stylesheet" href="{{asset('css/scroll.css')}}">
    <link rel="stylesheet" href="{{asset('css/slick.css')}}"/>
    <link rel="stylesheet" href="{{asset('css/slick-theme.css')}}"/>
    <style type="text/css">
        .slick-prev:before,
        .slick-next:before {
            color: black;
            background: white;
        }

        .p-spec-tab-header{font-size:18px;width:65%}.p-spec-tab-header>h1{padding:0;margin:0;display:block;font-size:26px;font-weight:700}.p-spec-tab-header>h1>span{font-size:15px;color:#999;font-weight:bolder;display:block;margin:3px;line-height:2.2;font-weight:300;margin-bottom:30px}.p-spec-tab-title{padding-top:45px;padding-bottom:8px;display:inline-grid;}.p-spec-tab-title>span{font:normal 16px iranyekan;color:#555}.p-spec-tab-title>i:before{/*background:url("/images/slices.png") no-repeat;background-position:-36px -652px!important;*/height:10px;width:5px;content:"";display:inline-block;margin:0 0 0 16px;right:0;position:relative}ul.spec-list{margin-bottom:38px;margin:0;margin-bottom:0;padding:0;list-style:none;border-width:0}ul.spec-list span.technicalspecs-value{background:#f7f9fa;width:75%;color:#777;float:left}.mob-technicalspecs-title,ul.spec-list span.technicalspecs-value{display:block;white-space:normal;border-radius:2px;margin-bottom:9px;padding:9px 21px;height:auto}.mob-technicalspecs-title{margin-left:19px;color:#000}.mob-technicalspecs-value{color:#777}.mob-technicalspecs-value,ul.spec-list span.technicalspecs-title{display:block;white-space:normal;border-radius:2px;margin-bottom:9px;float:right;height:auto;padding:9px 21px}ul.spec-list span.technicalspecs-title{background:#f0f1f2;width:21%;margin-left:19px}

        @media (max-width: 761px) {

            ul.spec-list span.technicalspecs-value{background:#f7f9fa;width:73%;color:#777;float:left}

        }

        @media (max-width: 380px) {

            ul.spec-list span.technicalspecs-value{background:#f7f9fa;width:71%;color:#777;float:left}

        }

        .dokmebaste{
            position:absolute;
            left:0px;
        }

    </style>

</head>
<body>
@include('partials.header')
@include('partials.menu')

<!--------------------------- single-full (body) ---------------------->
<div class="container-fluid text-center">
    <div class="single-full ">
        <div class="single-right">
            <div class="productbox" style="width: 60%; margin-right: 10%; margin-top: 5%">

                <div class="xzoom-container">

                    @if($products->images()->first())
                        <img class="xzoom3" id="xzoom-fancy" src="{{route('media',$products->images()->first()->id)}}" xoriginal="{{route('media',$products->images()->first()->id)}}"/>
                        <div class="xzoom-thumbs">

                            @foreach($products->images as $image)
                                <a href="{{route('media',$image->id)}}"><img class="xzoom-gallery3" width="60" src="{{route('media',$image->id)}}"  xpreview="{{route('media',$image->id)}}" ></a>
                            @endforeach

                        </div>

                    @endif

                </div>
            </div>
        </div>

        <div class="single-left">
            <div class="single-title">
                <p>{{$products->name}}</p>
            </div>
            <div class="single-body">
                <div class="single-body-right">
                    <ul>
                        <li><p> نام محصول :</p></li>
                        <li><p>قیمت محصول :</p></li>
                        <li><p>درباره محصول :</p></li>
                    </ul>
                </div>
                <div class="single-body-left">
                    <ul>
                        <li><p>{{$products->model}}</p></li>
                        <li><p> {{Convertnumber2english($products->price)  }}  تومان</p></li>
                        <li>
                            <p class="abut-kala">
                                {{$products->seo_desc}}
                            </p>
                        </li>
                    </ul>
                </div>
            </div>

            @php

                if(\Cookie::get('reserved')!=null){
                $reserved=\Cookie::get('reserved');
                $array=json_decode($reserved);
                foreach ($array as $item){
                $product_id[]=$item->product_id;
                }
                //$array=array_pluck($array,'product_id');

                //$var[]=$array[0];
                /*foreach ($array as $reserve){
                $var=$reserve['product_id'];
                }*/

              //print_r($array);
                }else{
                $product_id=0;
                }

           //  $var['product_id']=0;
            @endphp
           @if(session()->get('user')!=null)
                <div class="button">
                    <a href="" class="btnx btn1" id="reservep" data-toggle="modal" data-target="#reserve_user">رزرو محصول</a>
                </div>

            @elseif($product_id[0]!=$products->id && session()->get('user')==null)

                <div class="button">
                    <a href="" class="btnx btn1" id="reservep" data-toggle="modal" data-target="#reserve">رزرو محصول</a>
                </div>
            @elseif($product_id[0]==$products->id && session()->get('user')==null)
                <div class="button">
                    <a href="" class="btnx btn1" id="reservep" >این محصول قبلا توسط شما رزرو شده است.</a>
                </div>
            @endif


        </div>
    </div>
</div>
<!--------------------------- End single-full (body) ---------------------->
<!------------------------------------ toggleable tab ----------------------------------------->
<div class="tab-toggle">

    <div class="container-fluid">

        <!-- Nav tabs -->
        <ul class="nav nav-tabs" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#home">نقد و بررسی</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#menu1">ویژگی های محصول</a>
            </li>
        </ul>

        <!-- Tab panes -->
        <div class="tab-content" style="margin-right:-150p;">
            <div id="home" class="container tab-pane active" style="text-align: right"><br>
                <h3>نقد و بررسی</h3>
                {!! $products->desc !!}
            </div>
            <div id="menu1" class="container tab-pane fade" style="text-align: right"><br>
                <h3>ویژگی های محصول</h3>

                @foreach($products->category->attribute_groups as $attribute_group)
                    <b class="p-spec-tab-title"><span><i style="color:#dc3545;" class="fa fa-caret-square-o-left"></i> {{$attribute_group->name}}</span> </b>
                    <ul class="spec-list">
                        @foreach($attribute_group->attributes as $attribute)
                            <li>
                                <span class="technicalspecs-title"> {{$attribute->name}}</span>
                                <span class="technicalspecs-value ">
                                    <span>
                                        @if($products->product_attribute_values()->where('attribute_id',$attribute->id)->first())
                                            @if($attribute->type==1)
                                                @if(($attribute->product_attribute_values()->where('product_id',$products->id)->first()))
                                                    {{$attribute->product_attribute_values()->where('product_id',$products->id)->first()->value}}
                                                @endif
                                            @elseif($attribute->type==2)

                                                @foreach($attribute->attribute_options as $attribute_option)
                                                    @if(($attribute->product_attribute_values()->where('product_id',$products->id)->first()))
                                                        @if($attribute->product_attribute_values()->where('product_id',$products->id)->first()->value==$attribute_option->id) {{$attribute_option->title}} @endif
                                                    @endif
                                                @endforeach
                                            @endif
                                        @endif
                                    </span>
                                </span>
                            </li>
                        @endforeach
                    </ul>
                @endforeach


            </div>
        </div>
    </div>
</div>
<!------------------------------------ End toggleable tab ----------------------------------------->
<!-------------------------------- Tabs Cuorsel (Blog-Page) ----------------------------------->
<div class="sliderScroll container-fluid">
    <!--------------------- Start SliderScroll ---------------------->
    <section class="autoplay slider container" style="direction: ltr; margine-bottom:100px !important;">
        @foreach($product_related as $product)
            <div class="blog-item hvr-float-shadow">
                <div class="blog-item-image">
                    <img src="{{route('media',$product->images()->first())}}" class="img-fluid">
                </div>
                <div class="blog-item-content">
                    <h5 class="text-center"><a class="text-dark" href="#"
                                               style="font-family: iranyekan;text-decoration: none; font-size: 15px">
                            {{$product->title}}
                        </a></h5>
                    <p class="text-center" style="font-family: iranyekan; font-size: 17px;color: #d6002a; direction: rtl">
                        {{Convertnumber2english($product->price)  }}  تومان
                    </p>
                </div>
            </div>
        @endforeach

    </section>
    <!--------------------- End SliderScroll ---------------------->
</div>


<!-- The Modal -->
<div class="modal" id="reserve">
    <div class="modal-dialog">
        <div class="modal-content" style="background:white;">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">رزرو این محصول</h4>
                <button type="button" class="close dokmebaste" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
            <form class="form-horizontal" id="default" action="{{route('product.reserve')}}" method="POST">
                {{csrf_field()}}
                <div class="table-responsive">
<table class="table" style="text-align:center;">
    <thead>
    <tr>
        <th>عکس محصول</th>
        <th>توضیحات کلی</th>

    </tr>
    </thead>
    <tbody>
    <tr>
        <td style="width:59%;">
           @if($products->images()->first())
            <img src="{{route('media',$products->images()->first()->id)}}" class="img-thumbnail" style="width: 63%; height: 91px">
       @endif
        </td>
        <td>
                    <ul>
                        <li><p>درباره محصول :</p></li>
                        <li>
                            <p class="abut-kala">
                                {{$products->seo_desc}}
                            </p>
                        </li>

                    </ul>





        </td>


    </tr>
    <tr>
        <td>   <div class=" offset-3"> {{$products->name}}</div></td>
        <td>
            قیمت محصول:
            {{Convertnumber2english($products->price)}}

        </td>
    </tr>
    </tbody>
</table>
                </div>

<input name="product_id" type="hidden" value="{{$products->id}}">
                <div class="form-group form-inline">
                    <label class="col-sm-1 control-label d-inline-block">نام</label>
                    <div class="col-sm-4">
                        <input name="name" class="form-control" type="text"/>
                    </div>
                    <label class="col-sm-3 control-label d-inline-block">نام خانوادگی</label>
                    <div class="col-sm-3">

                            <input name="lastname" class="form-control" type="text"/>

                    </div>


                    </div>

                <div class="form-group form-inline">
                    <label class="col-sm-3 control-label d-inline-block">شماره تماس</label>
                    <div class="col-sm-5">

                        <input name="phonenumber" class="form-control" type="text" style="width: 100%"/>

                    </div>
                   <label class="col-sm-2 control-label d-inline-block">تعداد</label>
                    <div class="col-sm-2">

                           <select class="form-control" name="count">
                               <option value="1">1</option>
                               <option value="2">2</option>
                               <option value="3">3</option>
                               <option value="4">4</option>
                               <option value="5">5</option>
                               <option value="6">6</option>
                               <option value="7">7</option>
                               <option value="8">8</option>
                               <option value="9">9</option>
                               <option value="10">10</option>

                           </select>

                    </div>


                </div>



        <button class="btn btn-success reserve_add offset-4">ثبت رزرو محصول</button>

            </form>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">بستن</button>
            </div>

        </div>
    </div>
</div>
@if(session()->get('user')!=null)

<div class="modal" id="reserve_user">
    <div class="modal-dialog">
        <div class="modal-content" style="background:white;">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">رزرو این محصول</h4>
                <button type="button" class="close dokmebaste" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form class="form-horizontal" id="default" action="{{route('product.reserve.user')}}" method="POST">
                    {{csrf_field()}}
                    <div class="table-responsive">
                        <table class="table" style="text-align:center;">
                            <thead>
                            <tr>
                                <th>عکس محصول</th>
                                <th>توضیحات کلی</th>

                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td style="width:59%;">
                                    @if($products->images()->first())
                                        <img src="{{route('media',$products->images()->first()->id)}}" class="img-thumbnail" style="width: 63%;height: 91px">
                                    @endif
                                </td>
                                <td>
                                    <ul>
                                        <li><p>درباره محصول :</p></li>
                                        <li>
                                            <p class="abut-kala">
                                                {{$products->seo_desc}}
                                            </p>
                                        </li>

                                    </ul>

                                </td>


                            </tr>
                            <tr>
                                <td>   <div class=" offset-3"> {{$products->name}}</div></td>
                                <td>
                                    قیمت محصول:
                                    {{Convertnumber2english($products->price)}}

                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                        <input type="hidden" name="user_id" value="{{$user->id}}">

                    <input name="product_id" type="hidden" value="{{$products->id}}">
                    <div class="form-group form-inline">
{{--
                        <label class="col-sm-1 control-label d-inline-block">نام</label>
--}}
                        <div class="col-sm-4">
                            <input name="name" class="form-control" type="hidden" value="{{$user->first_name}}"/>
                        </div>
{{--
                        <label class="col-sm-3 control-label d-inline-block">نام خانوادگی</label>
--}}
                        <div class="col-sm-3">

                            <input name="lastname" class="form-control" type="hidden" value="{{$user->last_name}}"/>

                        </div>


                    </div>

                    <div class="form-group form-inline">
{{--
                        <label class="col-sm-3 control-label d-inline-block">شماره تماس</label>
--}}
                        <div class="col-sm-8">

                            <input name="phonenumber" value="{{$user->username}}" class="form-control" type="hidden" style="width: 100%"/>

                        </div>


                    </div>

      <div class="form-group form-inline">

                   <label class="col-sm-2 control-label d-inline-block mx-auto">تعداد</label>
                    <div class="col-sm-2 mx-auto">

                           <select class="form-control" name="count">
                               <option value="1">1</option>
                               <option value="2">2</option>
                               <option value="3">3</option>
                               <option value="4">4</option>
                               <option value="5">5</option>
                               <option value="6">6</option>
                               <option value="7">7</option>
                               <option value="8">8</option>
                               <option value="9">9</option>
                               <option value="10">10</option>

                           </select>

                    </div>


                </div>

                    <button class="btn btn-success reserve_add offset-4">ثبت رزرو محصول</button>

                </form>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">بستن</button>
            </div>

        </div>
    </div>
</div>
@endif
@include('partials.footer')


{{--
<script src="{{asset('js/jquery-3.2.0.min.js')}}"></script>
--}}
{{--
<script src="{{asset('js/jquery2.2.0.js')}}" type="text/javascript"></script>
--}}
<script src="https://payalord.github.io/xZoom/js/vendor/jquery.js" type="text/javascript"></script>



<script src="{{route('home')}}/js/modernizr.js"></script>
<script type="text/javascript" src="{{route('home')}}/js/xzoom.js"></script>
{{--
<script type="text/javascript" src="{{route('home')}}/js/hammer.min.js"></script>
--}}
{{--
<script type="text/javascript" src="{{route('home')}}/js/jquery.fancybox.js"></script>
--}}
{{--
<script type="text/javascript" src="{{route('home')}}/js/magnific-popup.js"></script>
--}}

<script src="{{asset('js/bootstrap.js')}}"></script>
<script src="{{asset('js/jq.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.32.2/dist/sweetalert2.all.min.js"></script>


<script type="text/javascript">
    $(document).ready(function() {
        $('.xzoom, .xzoom-gallery').xzoom({zoomWidth: 100,zoomHeight: 100, title: true, tint: '#333', Xoffset: 20});
        $('.xzoom2, .xzoom-gallery2').xzoom({position: '#xzoom2-id', tint: '#ffa200'});
        $('.xzoom3, .xzoom-gallery3').xzoom({

            position: 'lens',
            lensShape: 'circle',
            //   sourceClass: 'xzoom-hidden',
            //   zoomWidth: 100,
            //zoomHeight: 100,
            //  position: 'inside', //top, left, right, bottom, inside, lens, fullscreen, #ID
            mposition: 'inside', //inside, fullscreen
            rootOutput: true,
            Xoffset: 0,
            Yoffset: 0,
            fadeIn: true,
            fadeTrans: true,
            fadeOut: true,
            smoothZoomMove: 1,
            smoothLensMove: 1,
            smoothScale: 1,
            defaultScale: -1, //from -1 to 1, that means -100% till 100% scale
            scroll: false,
            tint: false, //'#color'
            tintOpacity: 0.1,
            lens: true, //'#color'
            lensOpacity: 0.1,
            lensShape: 'circle', //'box', 'circle'
            zoomWidth: '200',
            zoomHeight: '200',
            sourceClass: 'xzoom-source',
            loadingClass: 'xzoom-loading',
            lensClass: 'xzoom-lens',
            zoomClass: 'xzoom-preview',
            activeClass: 'xactive',
            hover: false,
            adaptive: true,
            lensReverse: true,
            adaptiveReverse: false,
            title: false,
            titleClass: 'xzoom-caption',
            bg: true //zoom image output as background
        });
        $('.xzoom4, .xzoom-gallery4').xzoom({tint: '#006699', Xoffset: 15,zoomWidth: 100,zoomHeight: 100, title: true});
        $('.xzoom5, .xzoom-gallery5').xzoom({tint: '#006699', Xoffset: 15});

        //Integration with hammer.js
        var isTouchSupported = 'ontouchstart' in window;

        if (isTouchSupported) {

            //If touch device
            $('.xzoom, .xzoom2, .xzoom3, .xzoom4, .xzoom5').each(function(){
                var xzoom = $(this).data('xzoom');
                xzoom.eventunbind();
            });

            $('.xzoom, .xzoom2, .xzoom3').each(function() {
                var xzoom = $(this).data('xzoom');
                $(this).hammer().on("tap", function(event) {
                    event.pageX = event.gesture.center.pageX;
                    event.pageY = event.gesture.center.pageY;
                    var s = 1, ls;

                    xzoom.eventmove = function(element) {
                        element.hammer().on('drag', function(event) {
                            event.pageX = event.gesture.center.pageX;
                            event.pageY = event.gesture.center.pageY;
                            xzoom.movezoom(event);
                            event.gesture.preventDefault();
                        });
                    }

                    xzoom.eventleave = function(element) {
                        element.hammer().on('tap', function(event) {
                            xzoom.closezoom();
                        });
                    }
                    xzoom.openzoom(event);
                });
            });

            $('.xzoom4').each(function() {
                var xzoom = $(this).data('xzoom');
                $(this).hammer().on("tap", function(event) {
                    event.pageX = event.gesture.center.pageX;
                    event.pageY = event.gesture.center.pageY;
                    var s = 1, ls;

                    xzoom.eventmove = function(element) {
                        element.hammer().on('drag', function(event) {
                            event.pageX = event.gesture.center.pageX;
                            event.pageY = event.gesture.center.pageY;
                            xzoom.movezoom(event);
                            event.gesture.preventDefault();
                        });
                    }

                    var counter = 0;
                    xzoom.eventclick = function(element) {
                        element.hammer().on('tap', function() {
                            counter++;
                            if (counter == 1) setTimeout(openfancy,300);
                            event.gesture.preventDefault();
                        });
                    }

                    function openfancy() {
                        if (counter == 2) {
                            xzoom.closezoom();
                            $.fancybox.open(xzoom.gallery().cgallery);
                        } else {
                            xzoom.closezoom();
                        }
                        counter = 0;
                    }
                    xzoom.openzoom(event);
                });
            });

            $('.xzoom5').each(function() {
                var xzoom = $(this).data('xzoom');
                $(this).hammer().on("tap", function(event) {
                    event.pageX = event.gesture.center.pageX;
                    event.pageY = event.gesture.center.pageY;
                    var s = 1, ls;

                    xzoom.eventmove = function(element) {
                        element.hammer().on('drag', function(event) {
                            event.pageX = event.gesture.center.pageX;
                            event.pageY = event.gesture.center.pageY;
                            xzoom.movezoom(event);
                            event.gesture.preventDefault();
                        });
                    }

                    var counter = 0;
                    xzoom.eventclick = function(element) {
                        element.hammer().on('tap', function() {
                            counter++;
                            if (counter == 1) setTimeout(openmagnific,300);
                            event.gesture.preventDefault();
                        });
                    }

                    function openmagnific() {
                        if (counter == 2) {
                            xzoom.closezoom();
                            var gallery = xzoom.gallery().cgallery;
                            var i, images = new Array();
                            for (i in gallery) {
                                images[i] = {src: gallery[i]};
                            }
                            $.magnificPopup.open({items: images, type:'image', gallery: {enabled: true}});
                        } else {
                            xzoom.closezoom();
                        }
                        counter = 0;
                    }
                    xzoom.openzoom(event);
                });
            });

        } else {
            //If not touch device

            //Integration with fancybox plugin
            $('#xzoom-fancy').bind('click', function(event) {
                var xzoom = $(this).data('xzoom');
                xzoom.closezoom();
                $.fancybox.open(xzoom.gallery().cgallery, {padding: 0, helpers: {overlay: {locked: false}}});
                event.preventDefault();
            });

            //Integration with magnific popup plugin
            $('#xzoom-magnific').bind('click', function(event) {
                var xzoom = $(this).data('xzoom');
                xzoom.closezoom();
                var gallery = xzoom.gallery().cgallery;
                var i, images = new Array();
                for (i in gallery) {
                    images[i] = {src: gallery[i]};
                }
                $.magnificPopup.open({items: images, type:'image', gallery: {enabled: true}});
                event.preventDefault();
            });
        }

    });

    $('.reserve_add').click(function () {
        Swal(
            'رزرو شما با موفقیت انجام شد!',
            'به زودی با شما تماس خواهیم گرفت.',
            'success'
        )
    });
</script>

{{--
<script src="{{asset('js/jquery2.2.0.js')}}" type="text/javascript"></script>
--}}
<script src="{{asset('js/slick.js')}}"></script>
<script type="text/javascript">
    $('#reservep').click(function(e){
        e.preventDefault();
    });

    $('.sliderScroll .autoplay').slick({
        slidesToShow: 3,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 2000,
        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 3,
                    infinite: true,
                    dots: true
                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    infinite: true,
                    dots: true
                }
            },
            // {
            //     breakpoint: 480,
            //     settings: {
            //         slidesToShow: 1,
            //         slidesToScroll: 1
            //     }
            // }
            // You can unslick at a given breakpoint now by adding:
            // settings: "unslick"
            // instead of a settings object
        ]
    });
</script>

</body>
</html>