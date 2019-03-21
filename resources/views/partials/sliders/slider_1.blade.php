<!------------------------ slider-fixed ------------------------->
<div class=" text-center parallax-window">
    <div class="img-backg">

        <div class="cover container-fluid">

            <div class="row-container-first">
                <div class="row-container-full" style="padding-top: 59px !important;">
                    <div class="row">
                        @php
                            $m=0;
                        @endphp
                        @foreach($branches as $branch)
@php
    if($m==0){
                     $color='zard';
                     }elseif($m==1){
                     $color='abi';
                     }elseif ($m==2){
                     $color='banafsh';
                     }elseif ($m==3){
                    $color='ghermez';
                     }elseif($m==4){
                 $color='sabz';
                     }
        @endphp
                            <div class="cover-bool col-lg-4 col-md-6 col-sm-6 col-6  @if($m==0) wow slideInUp @elseif($m==1) wow slideInUp @elseif($m==2) wow slideInUp  @elseif($m==3) wow slideInUp @else  wow slideInUp  @endif"  data-wow-duration="3s" style="">
                                <div class="item-fool">
                                    <a href="#">
                                        <div class="front-item">
                                            <img class="card-img-top" src="{{asset($branch->image_original)}}" alt="">


                                            <div class="middle" style="background: url('images/backgrounds/<?php echo $color; ?>.png') right no-repeat;
    background-size: cover;
    position: absolute;
    padding-right: 9px;
    padding-left: 9px;
    padding-top: 7px;
    padding-bottom: 7px;
    width: 194px;
    bottom: 0%;
    border-radius: 0 10px 10px 0;
    height: 100%;">
                                                <div class="middle" style="/*background: #00000069;*/position: absolute;bottom: 14%;right: 9%;padding-right: 9px;padding-left: 9px;padding-top: 7px;padding-bottom: 7px; width: 67%;">
                                                    <a href="" class="btnx btn1">
                                                        <span style="color:white">{{$branch->name}}</span>
                                                    </a>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="back-item text-center">

                                            <div class="middle">
                                                <a href="" class="btnx btn1">
                                                    <p>مشاهده</p>
                                                </a>
                                            </div>

                                            <div class="middle2">
                                                <a href="" class="btnx btn1">
                                                    <p style="color:white !important;">رزرو</p>
                                                </a>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            @php
                                $m++;
                            @endphp
                        @endforeach

                        <div class="cover-bool col-lg-4 col-md-6 col-sm-6 col-6   wow slideInUp"  data-wow-duration="3s" style="">
                            <div class="item-fool">
                                <a href="#">
                                    <div class="front-item">
                                        <img class="card-img-top" src="{{asset('images/q.jpg')}}" alt="">


                                        <div class="middle" style="background: url('images/backgrounds/abi.png') right no-repeat;
                                                background-size: cover;
                                                position: absolute;
                                                padding-right: 9px;
                                                padding-left: 9px;
                                                padding-top: 7px;
                                                padding-bottom: 7px;
                                                width: 194px;
                                                bottom: 0%;
                                                border-radius: 0 10px 10px 0;
                                                height: 100%;">
                                            <div class="middle" style="/*background: #00000069;*/position: absolute;bottom: 14%;right: 9%;padding-right: 9px;padding-left: 9px;padding-top: 7px;padding-bottom: 7px; width: 67%;">
                                                <a href="" class="btnx btn1">
                                                    <span style="color:white">به زودی</span>
                                                </a>
                                            </div>
                                        </div>

                                    </div>
{{--
                                    <div class="back-item text-center">

                                        <div class="middle">
                                            <a href="" class="btnx btn1">
                                                <p>مشاهده</p>
                                            </a>
                                        </div>

                                        <div class="middle2">
                                            <a href="" class="btnx btn1">
                                                <p>رزرو</p>
                                            </a>
                                        </div>
                                    </div>
--}}
                                </a>
                            </div>
                        </div>
                        <div class="cover-bool col-lg-4 col-md-6 col-sm-6 col-6   wow slideInUp"  data-wow-duration="3s" style="">
                            <div class="item-fool">
                                <a href="#">
                                    <div class="front-item">
                                        <img class="card-img-top" src="{{asset('images/q.jpg')}}" alt="">


                                        <div class="middle" style="background: url('images/backgrounds/sabz.png') right no-repeat;
                                                background-size: cover;
                                                position: absolute;
                                                padding-right: 9px;
                                                padding-left: 9px;
                                                padding-top: 7px;
                                                padding-bottom: 7px;
                                                width: 194px;
                                                bottom: 0%;
                                                border-radius: 0 10px 10px 0;
                                                height: 100%;">
                                            <div class="middle" style="/*background: #00000069;*/position: absolute;bottom: 14%;right: 9%;padding-right: 9px;padding-left: 9px;padding-top: 7px;padding-bottom: 7px; width: 67%;">
                                                <a href="" class="btnx btn1">
                                                    <span style="color:white">به زودی</span>
                                                </a>
                                            </div>
                                        </div>

                                    </div>
                                    {{--
                                                                        <div class="back-item text-center">

                                                                            <div class="middle">
                                                                                <a href="" class="btnx btn1">
                                                                                    <p>مشاهده</p>
                                                                                </a>
                                                                            </div>

                                                                            <div class="middle2">
                                                                                <a href="" class="btnx btn1">
                                                                                    <p>رزرو</p>
                                                                                </a>
                                                                            </div>
                                                                        </div>
                                    --}}
                                </a>
                            </div>
                        </div>
                        {{--<div class="cover-bool col-lg-3 col-md-6 col-sm-6 col-6">
                            <div class="item-fool">
                                <a href="#">
                                    <div class="front-item">
                                        <img class="card-img-top" src="{{asset('images/index/x-body/xbody03.jpg')}}" alt="">
                                    </div>
                                    <div class="back-item text-center">

                                        <!--<div class="middle">-->
                                        <!--    <a href="" class="btnx btn1">-->
                                        <!--        <p>مشاهده</p>-->
                                        <!--    </a>-->
                                        <!--</div>-->

                                        <div class="middle2">
                                            <a href="" class="btnx btn1">
                                                <p>رزرو</p>
                                            </a>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="cover-bool col-lg-3 col-md-6 col-sm-6 col-6">
                            <div class="item-fool">
                                <a href="#">
                                    <div class="front-item">
                                        <img class="card-img-top" src="{{asset('images/index/x-body/xbody03.jpg')}}" alt="">
                                    </div>
                                    <div class="back-item text-center">

                                        <!--<div class="middle">-->
                                        <!--    <a href="" class="btnx btn1">-->
                                        <!--        <p>مشاهده</p>-->
                                        <!--    </a>-->
                                        <!--</div>-->

                                        <div class="middle2">
                                            <a href="" class="btnx btn1">
                                                <p>رزرو</p>
                                            </a>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="cover-bool col-lg-3 col-md-6 col-sm-6 col-6">
                            <div class="item-fool">
                                <a href="#">
                                    <div class="front-item">
                                        <img class="card-img-top" src="{{{asset('images/index/x-body/xbody03.jpg')}}}" alt="">
                                    </div>
                                    <div class="back-item text-center">

                                        <!--<div class="middle">-->
                                        <!--    <a href="" class="btnx btn1">-->
                                        <!--        <p>مشاهده</p>-->
                                        <!--    </a>-->
                                        <!--</div>-->

                                        <div class="middle2">
                                            <a href="" class="btnx btn1">
                                                <p>رزرو</p>
                                            </a>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>--}}
                    </div>


                    {{--
                                        <div class="row">
                                            @php
                                            $m=0;
                                            @endphp
                                            @foreach($branches as $branch)

                                            <div class="cover-bool col-lg-3 col-md-6 col-sm-6 col-6 @if($m==0) wow slideInLeft @elseif($m==1) wow flipOutY @elseif($m==2) wow zoomInDown  @elseif($m==3) wow rotateIn @endif"  data-wow-duration="3s">
                                                <div class="item-fool">
                                                    <a href="#">
                                                        <div class="front-item">
                                                            <img class="card-img-top" src="{{asset($branch->image_original)}}" alt="">
                                                            <div class="middle" style="background: #00000069;position: absolute;bottom: 36%;right: 17%;padding-right: 9px;padding-left: 9px;padding-top: 7px;padding-bottom: 7px; width: 67%;">
                                                                <a href="" class="btnx btn1">
                                                                    <span style="color:white">{{$branch->name}}</span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <div class="back-item text-center">

                                                        <div class="middle">
                                                               <a href="" class="btnx btn1">
                                                              <p>مشاهده</p>
                                                                </a>
                                                            </div>

                                                            <div class="middle2">
                                                                <a href="" class="btnx btn1">
                                                                    <p>رزرو</p>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                                @php
                                                    $m++
                                                @endphp
                                            @endforeach
                                            --}}
{{--<div class="cover-bool col-lg-3 col-md-6 col-sm-6 col-6">
                            <div class="item-fool">
                                <a href="#">
                                    <div class="front-item">
                                        <img class="card-img-top" src="{{asset('images/index/x-body/xbody03.jpg')}}" alt="">
                                    </div>
                                    <div class="back-item text-center">

                                        <!--<div class="middle">-->
                                        <!--    <a href="" class="btnx btn1">-->
                                        <!--        <p>مشاهده</p>-->
                                        <!--    </a>-->
                                        <!--</div>-->

                                        <div class="middle2">
                                            <a href="" class="btnx btn1">
                                                <p>رزرو</p>
                                            </a>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="cover-bool col-lg-3 col-md-6 col-sm-6 col-6">
                            <div class="item-fool">
                                <a href="#">
                                    <div class="front-item">
                                        <img class="card-img-top" src="{{asset('images/index/x-body/xbody03.jpg')}}" alt="">
                                    </div>
                                    <div class="back-item text-center">

                                        <!--<div class="middle">-->
                                        <!--    <a href="" class="btnx btn1">-->
                                        <!--        <p>مشاهده</p>-->
                                        <!--    </a>-->
                                        <!--</div>-->

                                        <div class="middle2">
                                            <a href="" class="btnx btn1">
                                                <p>رزرو</p>
                                            </a>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="cover-bool col-lg-3 col-md-6 col-sm-6 col-6">
                            <div class="item-fool">
                                <a href="#">
                                    <div class="front-item">
                                        <img class="card-img-top" src="{{{asset('images/index/x-body/xbody03.jpg')}}}" alt="">
                                    </div>
                                    <div class="back-item text-center">

                                        <!--<div class="middle">-->
                                        <!--    <a href="" class="btnx btn1">-->
                                        <!--        <p>مشاهده</p>-->
                                        <!--    </a>-->
                                        <!--</div>-->

                                        <div class="middle2">
                                            <a href="" class="btnx btn1">
                                                <p>رزرو</p>
                                            </a>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>--}}{{--

                    </div>
--}}
                </div>
            </div>
            {{--<div class="row-container">
                <div class="row-container-full">
                    <div class="row">
                        <div class="cover-bool col-lg-3 col-md-6 col-sm-6 col-6">
                            <div class="item-fool">
                                <a href="#">
                                    <div class="front-item">
                                        <img class="card-img-top" src="{{asset('images/index/x-body/xbody03.jpg')}}" alt="">

                                    </div>
                                    <div class="back-item text-center">

                                        <!--<div class="middle">-->
                                        <!--    <a href="" class="btnx btn1">-->
                                        <!--        <p>مشاهده</p>-->
                                        <!--    </a>-->
                                        <!--</div>-->

                                        <div class="middle2">
                                            <a href="" class="btnx btn1">
                                                <p>رزرو</p>
                                            </a>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="cover-bool col-lg-3 col-md-6 col-sm-6 col-6">
                            <div class="item-fool">
                                <a href="#">
                                    <div class="front-item">
                                        <img class="card-img-top" src="{{asset('images/index/x-body/xbody03.jpg')}}" alt="">
                                    </div>
                                    <div class="back-item text-center">

                                        <!--<div class="middle">-->
                                        <!--    <a href="" class="btnx btn1">-->
                                        <!--        <p>مشاهده</p>-->
                                        <!--    </a>-->
                                        <!--</div>-->

                                        <div class="middle2">
                                            <a href="" class="btnx btn1">
                                                <p>رزرو</p>
                                            </a>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="cover-bool col-lg-3 col-md-6 col-sm-6 col-6">
                            <div class="item-fool">
                                <a href="#">
                                    <div class="front-item">
                                        <img class="card-img-top" src="{{asset('images/index/x-body/xbody03.jpg')}}" alt="">
                                    </div>
                                    <div class="back-item text-center">

                                        <!--<div class="middle">-->
                                        <!--    <a href="" class="btnx btn1">-->
                                        <!--        <p>مشاهده</p>-->
                                        <!--    </a>-->
                                        <!--</div>-->

                                        <div class="middle2">
                                            <a href="" class="btnx btn1">
                                                <p>رزرو</p>
                                            </a>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="cover-bool col-lg-3 col-md-6 col-sm-6 col-6">
                            <div class="item-fool">
                                <a href="#">
                                    <div class="front-item">
                                        <img class="card-img-top" src="{{asset('images/index/x-body/xbody03.jpg')}}" alt="">
                                    </div>

                                    <!--<div class="back-item text-center">-->

                                        <div class="middle">
                                            <a href="" class="btnx btn1">
                                                <p>مشاهده</p>
                                            </a>
                                        </div>
                                        <div class="middle2">
                                            <a href="" class="btnx btn1">
                                                <p>رزرو</p>
                                            </a>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>--}}

            <div class="" style="width: 100%;height: 115px; position: absolute;overflow: visible; left:0px!important; margin-top: 59px; ">
                <div style="width: 100%;height: 100%; position: absolute;overflow: hidden !important;;">
                    <div class="transform" style="
    right: -5px;
    width: 110%;
    height: 100%;
    -webkit-transform-origin:left;
    transform-origin: left;
    -webkit-transform: rotate(3deg);
    transform: rotate(3deg);
    position: absolute;background: white">

                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<!------------------------ end slider-fixed ------------------------->
