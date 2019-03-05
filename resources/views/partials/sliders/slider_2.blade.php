@if($slider)
<!------------------------ SLIDER-2 -->
<div id="carouselExampleIndicators" class="carousel slide slider-2" data-ride="carousel">
    <ol class="carousel-indicators">
        @foreach($slider->slides as $slides)
        <li data-target="#carouselExampleIndicators" data-slide-to="{{$slides->id}}" class="active"></li>
{{--        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>--}}
            @endforeach
    </ol>
    <div class="carousel-inner">
        @php
            //   $res= array_shift(array_values($slides));
          $res=reset($slides);
          $res=key($res);
           $i=0;
        @endphp
    @foreach($slider->slides as $slides)

        <div class="carousel-item @if($i==0) active img-slide-2 @endif">
            <a href="{{$slides->link}}">
            <img class="d-block w-100" src="{{route('media',$slides->image)}}" style="height: 42vw"
                 alt="{{$slides->title}}">
            </a>
        </div>
            @php
                $i++;
            @endphp
    @endforeach
    </div>

    {{-- <div class="carousel-item">
         <img class="d-block w-100" src="{{asset('images/index/x-body/xbody-class-liverpool.jpg')}}" style="height: 42vw"
              alt="Second slide">
     </div>
     <div class="carousel-item">
         <img class="d-block w-100" src="{{asset('images/index/x-body/xbody-france.jpg')}}" style="height: 42vw" alt="Third slide">
     </div>--}}
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
@endif
<!------------------------ END SLIDER-2 -->
</div>