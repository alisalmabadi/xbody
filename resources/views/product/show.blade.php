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

{{--
    <link href="{{ route('home') }}/css/xzoom.css" rel="stylesheet">
--}}
    {{--
        <link href="{{ route('home') }}/css/magnific-popup.css" rel="stylesheet">
    --}}
    {{--<link type="text/css" rel="stylesheet" media="all" href="{{ route('home') }}/css/jquery.fancybox.css" />--}}
    <link rel="stylesheet" href="{{asset('css/scroll.css')}}">
    <link rel="stylesheet" href="{{asset('css/slick.css')}}"/>
    <link rel="stylesheet" href="{{asset('css/slick-theme.css')}}"/>
    <!-- fotorama.css & fotorama.js. -->
    <link  href="http://cdnjs.cloudflare.com/ajax/libs/fotorama/4.6.4/fotorama.css" rel="stylesheet"> <!-- 3 KB -->

    <style type="text/css">


        /***fade image ********/

        @keyframes animate {
            0% {
                opacity:1;
            }
            45% {
                opacity:1;
            }
            55% {
                opacity:1;
            }
            100% {
                opacity:0;
            }
        }

        .allimage img.top {
            animation-name: animate;
            animation-timing-function: ease-in-out;
            animation-iteration-count: infinite;
            animation-duration: 3s;
            animation-direction: alternate;
        }

        /*.allimage{
            height: 86px;
            padding: 10px;
        }*/

        img.img-responsive.bastimg{
            position: absolute;
            width: auto;
            left: 0px;
        }
        img.img-responsive.lockimg{
            position: absolute;

            width: 83%;
            height: 96px;
        }
        /*fade image ********/
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
        .fotorama__fullscreen-icon{
            top: 22px !important;
            right: 28px !important;
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
            <div class="productbox" style="width: 100%; height: 100%;  margin-top: 13%;margin-right: 13%">
                <div class="fotorama"
                     data-nav="thumbs">
                    @foreach($products->images as $image)
                    <a href="{{route('media',$image->id)}}"><img src="{{route('media',$image->id)}}" width="144" height="130"></a>
                    @endforeach
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
                    <a href="{{url('product')}}/{{$product->category->slug}}/{{$product->slug}}" target="_blank">
                    <img src="{{route('media',$product->images()->first())}}" class="img-fluid">
                    </a>
                </div>
                <div class="blog-item-content">
                    <h5 class="text-center"><a class="text-dark" href="{{url('product')}}/{{$product->category->slug}}/{{$product->slug}}"
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
                {{--waiting gif--}}
                <div class="container-fluid" id="div_wait" style="width: 100%;height: 100%;position: fixed;top: 0;z-index:5;display: none;">
                    <img src="{{ asset('gifs/AppleLoading.gif') }}" style="margin-top: 62%;height: 200px;width: 200px;margin-left: 32%;">
                </div>
                {{--end of waiting gif--}}
            <form class="form-horizontal frm-add-reserve" id="default" action="{{route('product.reserve')}}" method="POST">
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
                            <td><div class=" offset-3"> {{$products->name}}</div></td>
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
                    <label class="control-label d-inline-block">نام</label>
                    <div class="col-sm-12">
                        <input name="name" class="form-control" type="text" placeholder="نام"/>
                        <label id="name_error" style="color:red; display:none;" class="pull-right"></label>
                    </div>
                </div>
                <div class="form-group form-inline">
                    <label class="control-label d-inline-block">نام خانوادگی</label>
                    <div class="col-sm-12">
                        <input name="lastname" class="form-control" type="text" placeholder="نام خانوادگی"/>
                        <label id="lastname_error" style="color:red; display:none;" class="pull-right"></label>
                    </div>
                </div>
                <div class="form-group form-inline">
                    <label class="control-label d-inline-block">شماره تماس</label>
                    <div class="col-sm-12">
                        <input name="phonenumber" class="form-control" type="text" style="width: 100%" placeholder="شماره تماس"/>
                        <label id="phone_error" style="color:red; display:none;" class="pull-right"></label>
                    </div>
                </div>
                <div class="form-group form-inline">
                    <label class="control-label d-inline-block">تعداد</label>
                    <div class="col-sm-12">
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
            <button class="btn btn-success form-control reserve_add offset-4">ثبت رزرو محصول</button>
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

<script src="http://cdnjs.cloudflare.com/ajax/libs/fotorama/4.6.4/fotorama.js"></script> <!-- 16 KB -->
<script src="{{route('home')}}/js/modernizr.js"></script>
<script src="{{asset('js/bootstrap.js')}}"></script>
<script src="{{asset('js/jq.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.32.2/dist/sweetalert2.all.min.js"></script>


<script type="text/javascript">
    $('.reserve_add').click(function (e) {
        e.preventDefault();

        $("#div_wait").css('display' , 'block');
        $("#name_error").css('display' , 'none');
        $("#lastname_error").css('display' , 'none');
        $("#phone_error").css('display' , 'none');

        var data = $(".frm-add-reserve").serialize();
        var url = $(".frm-add-reserve").attr('action');
        var type = $(".frm-add-reserve").attr('method');
        console.log(url);
        $.ajax({
            data:data,
            type:type,
            url:url,
            success:function(data){
                Swal(
                    'رزرو شما با موفقیت انجام شد!',
                    'به زودی با شما تماس خواهیم گرفت.',
                    'success'
                )
                $("#div_wait").css('display' , 'none');
                location.reload();
            },
            error:function (error) {
                console.log(error.responseJSON.errors);
                if(error.responseJSON.errors.name){
                    $("#name_error").text(error.responseJSON.errors.name[0]);
                    $("#name_error").css('display' , 'block');
                }
                if(error.responseJSON.errors.lastname){
                    $("#lastname_error").text(error.responseJSON.errors.lastname[0]);
                    $("#lastname_error").css('display' , 'block');
                }
                if(error.responseJSON.errors.phonenumber){
                    $("#phone_error").text(error.responseJSON.errors.phonenumber[0]);
                    $("#phone_error").css('display' , 'block');
                }
                $("#div_wait").css('display' , 'none');
            }
        });
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

    $('.fotorama').fotorama({
        maxwidth: '100%',
        maxHeight: '100%',
        height:'380',
        width:'400',
        allowfullscreen: true,
        nav: 'thumbs'
    });
</script>

</body>
</html>