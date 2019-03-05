<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#"><span class="fa  fa-search"></span></a>
            <div class="navbar-brand dropdown">
                <a class="navbar-link dropdown-toggle" data-toggle="dropdown"  href="#"><span class="fa  fa-user-circle"></span></a>
                <ul class="dropdown-menu" id="mob-site-user">
                    @if(Auth::guard('web')->check())
                        <li>
                            <a href="#">سلام،{{Auth::guard('web')->user()->name}}</a>
                            <a href="{{route('user.profile')}}">پروفایل</a>
                            <a href="{{route('logout')}}">خروج</a>
                        </li>
                    @else
                        <li>
                            <a href="{{route('loginm')}}"  data-target="#loginM">ورود به حساب کاربری</a>
                        </li>
                    @endif
                </ul>
            </div>
            @if(\Auth::guard('web')->check())
                @php
                    $user=Auth::guard('web')->user();
                        $total_price=0;
                            foreach ($user->carts as $cart)
                            {
                             $total_price+=$cart->product->product_variety_values()->where('id',$cart->product_variety_value_id)->first()->price*$cart['count'];
                            }
                @endphp
                <div class="navbar-brand dropdown">
                    <a class="navbar-link dropdown-toggle"   href="{{route('user.cart')}}"><span class="fa  fa-shopping-cart"></span></a>
                </div>
            @else
                @php
                    $count=0;
                    $total_price=0;
                        if(\Cookie::get("carts"))
                          {
                              $json_str = \Cookie::get("carts");
                              $rearr = json_decode($json_str);

                              foreach($rearr as $obj)
                              {
                               $count++;
                                  $total_price += $obj->price * $obj->count;

                              }

                          }

                @endphp
                <div class="navbar-brand dropdown">
                    <a class="navbar-link dropdown-toggle"   href="{{route('user.cart')}}"><span class="fa  fa-shopping-cart"></span></a>
                </div>

            @endif




            {{--<a class="navbar-brand" href="#"></a>--}}
        </div>
        <style>
            #mob-menu-toggle
            {
                width: 53px;
                height: 45px;
                float: left;
                position: absolute;
                left: 0;
                background: transparent;
                border: none;
                color: #fff;
            }
        </style>





        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

            <div class="mob-menu-content-top">
                <button id="mob-menu-toggle" type="button" class="collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="fa fa-2x fa-arrow-circle-o-right"></span>
                </button>


                <div class="mob-menu-top-img">
                    <img src="{{route('mobhome')}}/images/logo.png" alt="siar shop">
                </div>
                <div class="mob-menu-top-tittle">
                    <h4>لب یار</h4>
                </div>

            </div>
            <nav class="mob-nav" role="navigation">
                <ul class="mob-menu">
                    @foreach($menus as $menu)
                        @if($menu->parent_id==0 && $menu->mobile)
                        <li>
                        <a href="#" >
                              <span class="pull-right">
                               {{$menu->name}}
                              </span>

                            <span class="pull-left">
                                  <i class="fa fa-2x fa-caret-down"></i>
                              </span>
                        </a>
                        <ul class="collapse">

                            @foreach($menus as $menul2)
                                @if($menul2->parent_id==$menu->id && $menul2->mobile)
                            <li>
                                <a href="{{$menul2->link}}">{{$menul2->name}}</a>
                            </li>
                                @endif
                            @endforeach

                        </ul>
                    </li>

                        @endif
                    @endforeach

                </ul>
            </nav>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->

    <div id="loginM" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                {{--<div class="modal-header">--}}
                {{--<button type="button" class="close" data-dismiss="modal">&times;</button>--}}
                {{--<h4 class="modal-title">Modal Header</h4>--}}
                {{--</div>--}}
                {{--<div class="modal-body">--}}
                {{--<p>Some text in the modal.</p>--}}
                {{--</div>--}}
                {{--<div class="modal-footer">--}}
                {{--<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>--}}
                {{--</div>--}}
            </div>

        </div>
    </div>
</nav>