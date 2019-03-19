<!----------------- HEADER-Bodybuilding -------------------------->
<div class="container-fluid header">
    <div class="header_right col-lg-3 col-md-3 col-12">
        <a class="navbar-brand" href="{{url('/')}}"><img class="img-fluid" src="{{url('/')}}/{{$setting->logo}}" alt=""></a>
    </div>
    <div class="header_left col-lg-9 col-md-9 col-12 hidden-sm">
   {{--     <a href="{{$setting->ads_url}}"><img class="img-fluid" src="{{url('/')}}/{{$setting->ads}}" alt=""></a>


        <div class="allimage"><img data-id="'.$bast->id.'" class="img-responsive bastimg bottom" src="../storage/images/'.$bast->image_path.'"><img data-id="'.$bast->id.'" class="img-responsive bastimg top" src="../storage/images/'.$bast->image_path2.'" >--}}
          {{--  <div class="allimage">
                <a href="{{$setting->ads_url}}"><img class="img-responsive bastimg bottom" src="{{url('/')}}/{{$setting->ads}}" alt=""></a>
                <a href="{{$setting->ads_url}}"><img class="img-responsive bastimg top" src="{{url('/')}}/images/setting/2.png" alt=""></a>
            </div>--}}
         <div class="allimage" style="margin-top: 1%">
             @php $i=0; @endphp
                @foreach($ads as $ad)
                 @php $i++; @endphp

             <a href="{{$ad->ads_url}}"><img class="img-responsive bastimg @if($i==1) bottom @else top @endif" src="{{url('/')}}/{{$ad->image}}" alt="{{$ad->alt}}"></a>
                    @endforeach
            </div>
    </div>
</div>
<!----------------- END HEADER-Bodybuilding -------------------------->