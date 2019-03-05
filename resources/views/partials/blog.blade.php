<!----------------------------------  Proposal ----------------------------------->
<div class="full-proposal" style="width: 100%; height: 1320px; float: right; background: #F4F4F6;     box-shadow: -5px 10px 15px 0 rgba(0,0,0,0.1);">
    <div class="container-fluid text-center color">

        <div class="section-full-full2">
            <p class="col-12">اخبار و مقالات</p>
        </div>

    @php
        $i=0;
    @endphp
        <div class="proposal">
        @if(count($articles)>0)
            @foreach($articles as $article)

                    <div class="proposal-tag">
                        <div class="item-proposal">
                        <img src="{{route('media',$article->img_thumbnail)}}" alt="">
                        <div class="title-proposal">
                            <a href="{{url('/blog')}}/{{$article->article_category->slug}}/{{$article->slug}}">
                                <p>{{$article->title}}</p>
                            </a>
                        </div>
                        <!--<div class="br-proposal"></div>-->
                        <div class="footer-proposal">
                            <p>{{$article->seo_title}}</p>
                        </div>
                    </div>
                </div>

                @php  $i++; @endphp
                @if($i%2==0)
        </div> @if($i!=4)<div class="proposal">@endif
        @endif


        @endforeach
        @endif

        {{--
                <div class="row">
        --}}
        {{--<br> <br> <br>
        <hr>
        <div class="row">
            <div class="col-lg-6 col-md-12">
                <div class="proposal-right">
                    <img src="{{asset('images/index/x-body/xbody_studiograma_05-1024x683.jpg')}}" alt="">
                    <div class="title-proposal">
                        <p>باشگاه پرورش اندام عصر</p>
                    </div>
                    <!--<div class="br-proposal"></div>-->
                    <div class="footer-proposal">
                        <p> بهترین باشگاه پرورش اندام در غرب تهران</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12">
                <div class="proposal-left">
                    <img src="{{asset('images/index/x-body/xbody_studiograma_05-1024x683.jpg')}}" alt="">
                    <div class="title-proposal-left">
                        <p>باشگاه پرورش اندام عصر</p>
                    </div>
                    <!--<div class="br-proposal"></div>-->
                    <div class="footer-proposal-left">
                        <p> بهترین باشگاه پرورش اندام در غرب تهران</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 col-md-12">
                <div class="proposal-right">
                    <img src="{{asset('images/index/x-body/woman_img.jpg')}}" alt="">
                    <div class="title-proposal">
                        <p>باشگاه پرورش اندام عصر</p>
                    </div>
                    <!--<div class="br-proposal"></div>-->
                    <div class="footer-proposal">
                        <p> بهترین باشگاه پرورش اندام در غرب تهران</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12">
                <div class="proposal-left">
                    <img src="{{asset('images/index/x-body/home-service-03.jpg')}}" alt="">
                    <div class="title-proposal-left">
                        <p>باشگاه پرورش اندام عصر</p>
                    </div>
                    <!--<div class="br-proposal"></div>-->
                    <div class="footer-proposal-left">
                        <p> بهترین باشگاه پرورش اندام در غرب تهران</p>
                    </div>
                </div>
            </div>
        </div>--}}
        </div>
    </div>
    </div>
</div>
    <!---------------------------------- END Proposal ----------------------------------->