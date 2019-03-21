<!----------------------------------  Proposal ----------------------------------->
<div class="full-proposal" style="width: 100%; height: auto; background-attachment: fixed;    box-shadow: -5px 10px 15px 0 rgba(0,0,0,0.1);">
  <div class="color">

        <div class="section-full-full2">
            <p>اخبار و مقالات</p> {{--<img src="../images/xmark.png" style="width: 10px; height: 10px;">--}}
        </div>
  </div>
    <div id="exampleSlider">

      <div class=" MS-content">

          @if(count($articles)>0)
              @foreach($articles as $article)
                  <div class="col-md-3 wow slideInUp item">
                  <div class="proposal-tag">
                      <div class="item-proposal">
                          <img class="imageblog" src="{{--images/thumbnails/{{$article->img_thumbnail}}--}}{{route('media',$article->img)}}" alt="" data-url="{{url('/blog')}}/{{$article->article_category->slug}}/{{$article->slug}}">
                          <div class="title-proposal">
                              <a href="{{url('/blog')}}/{{$article->article_category->slug}}/{{$article->slug}}">
                                  <p class="titlecard">{{$article->title}}</p>
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
    <div class="MS-controls">
        <span class="MS-left"><i class="fa fa-chevron-left" aria-hidden="true"></i></span>
        <span class="MS-right"><i class="fa fa-chevron-right" aria-hidden="true"></i></span>
    </div>


    </div>
    </div>




    <!---------------------------------- END Proposal ----------------------------------->