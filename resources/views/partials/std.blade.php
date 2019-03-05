<style>


    @-webkit-keyframes swing
    {
        15%
        {
            -webkit-transform: translateX(5px);
            transform: translateX(5px);
        }
        30%
        {
            -webkit-transform: translateX(-5px);
            transform: translateX(-5px);
        }
        50%
        {
            -webkit-transform: translateX(3px);
            transform: translateX(3px);
        }
        65%
        {
            -webkit-transform: translateX(-3px);
            transform: translateX(-3px);
        }
        80%
        {
            -webkit-transform: translateX(2px);
            transform: translateX(2px);
        }
        100%
        {
            -webkit-transform: translateX(0);
            transform: translateX(0);
        }
    }
    @keyframes swing
    {
        15%
        {
            -webkit-transform: translateX(5px);
            transform: translateX(5px);
        }
        30%
        {
            -webkit-transform: translateX(-5px);
            transform: translateX(-5px);
        }
        50%
        {
            -webkit-transform: translateX(3px);
            transform: translateX(3px);
        }
        65%
        {
            -webkit-transform: translateX(-3px);
            transform: translateX(-3px);
        }
        80%
        {
            -webkit-transform: translateX(2px);
            transform: translateX(2px);
        }
        100%
        {
            -webkit-transform: translateX(0);
            transform: translateX(0);
        }
    }


    .pro_ser li a:hover
    {
        -webkit-animation: swing 500ms linear;
        animation: swing 500ms  linear;
        -webkit-animation-iteration-count: 1;
        animation-iteration-count: 1;
    }
</style>

<div class="std"><div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="pro_ser">
                    <ul class="pro_ser_ser">
                        @foreach($menus as $box)
                            @if($box->boxes && $box->type==0)
                                <li>
                                    <div><a href="{{$box->link}}"><span><img width="82px" height="82px" class="hvr-wobble-horizontal" src="{{route('media',$box->icon)}}" alt=""></span> <h2> {{$box->name}}</h2></a></div>
                                </li>
                            @endif
                        @endforeach
                    </ul>
                    <ul class="pro_ser_pro">
                        @foreach($menus as $box)
                            @if($box->boxes && $box->type==1)
                                <li>
                                    <div><a href="{{$box->link}}"><span><img width="82px" height="82px" class="hvr-wobble-horizontal" src="{{route('media',$box->icon)}}" alt=""></span> <h2> {{$box->name}}</h2></a></div>
                                </li>
                            @endif
                        @endforeach

                    </ul>
                </div>
            </div>
        </div>
    </div></div>

