<!----------------------------------  Proposal ----------------------------------->
<div class="full-proposal" style="width: 100%; height: auto; background-attachment: fixed;    box-shadow: -5px 10px 15px 0 rgba(0,0,0,0.1);">
  <div class="color">

        <div class="section-full-full2">
            <p>اخبار و مقالات</p> {{--<img src="../images/xmark.png" style="width: 10px; height: 10px;">--}}
        </div>
  </div>
   {{-- @php
        $i=0;
    @endphp
        <div class="proposal wow slideInUp">
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

        </div>--}}
{{--
    <div class="col-md-8 " style="margin: 0 auto">
        <div class="owl-carousel owl-theme owl-one">
            @foreach($articles as $article)

                <div class="item">
                    <div class="shadow-effect">


                        <img class="img-fluid" src="images/thumbnails/{{$article->img_thumbnail}}" style="width: 300px; height: 300px;">

                                                                      <h5 class="titles-dast"><p class="title caros">{{$article->title}}</p></h5>


                        --}}{{-- <div class="item-details">
                                                     <h5><span data-price="@if($product->product_variety_values->first()){{$product->product_variety_values->first()->price}}@else 0 @endif">
                                                                          @if($product->product_variety_values->first())
                                                                 {{$product->price_variety}}
                                                             @else
                                                                 0
                                                             @endif
                                                             تومان
                                                                     </span></h5>
                                                 </div>--}}{{--

                    </div>
                </div>
            @endforeach

        </div>

    </div>--}}

      @php
          $i=0;
      @endphp
      <div class="proposal">

          @if(count($articles)>0)
              @foreach($articles as $article)
                  <div class="col-md-3 proposal wow slideInUp">
                  <div class="proposal-tag">
                      <div class="item-proposal">
                          <img class="imageblog" src="{{--images/thumbnails/{{$article->img_thumbnail}}--}}{{route('media',$article->img)}}" alt="" data-url="{{url('/blog')}}/{{$article->article_category->slug}}/{{$article->slug}}">
                          <div class="title-proposal">
                              <a href="{{url('/blog')}}/{{$article->article_category->slug}}/{{$article->slug}}">
                                  <p>{{$article->title}}</p>
                              </a>
                          </div>
                          <!--<div class="br-proposal"></div>-->
                          <div class="footer-proposal">
                              <p>{{$article->short}}</p>
                          </div>
                      </div>
                  </div>
      </div>

                 {{-- @php  $i++; @endphp
 @if($i%2==0)
      </div> @if($i!=4)<div class="proposal">@endif--}}
{{--
          @endif
--}}


          @endforeach
          @endif

      </div>

    </div>




    <!---------------------------------- END Proposal ----------------------------------->