<!------------------------ slider-fixed ------------------------->
<div class=" text-center">
    <div class="img-backg ">

        <div class="cover container-fluid">

            <div class="row-container-first">
                <div class="row-container-full" style="padding-top: 241px !important;">
                    <div class="row">
                        @foreach($branches as $branch)
                        <div class="cover-bool col-lg-3 col-md-6 col-sm-6 col-6">
                            <div class="item-fool">
                                <a href="#">
                                    <div class="front-item">
                                        <img class="card-img-top" src="{{asset($branch->image_original)}}" alt="">
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
                        @endforeach
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
        </div>
    </div>
</div>
<!------------------------ end slider-fixed ------------------------->