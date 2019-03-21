<!--------------------------- NAVIGATION(MENU)-Bodybuilding ---------------------->
<nav id="menu">

    <div class="container-fluid">

        <div class="responsive-menu-icon">
            <img src="{{asset('images/backgrounds/menu.png')}}"  alt="" style="-webkit-mask-image: url(images/index/menu.svg);
       width: 26px;
    height: 28px;
    -webkit-mask-size: auto;
    -webkit-mask-repeat: no-repeat;
    -webkit-mask-position: center center;">
        </div>
        <ul class="menu-level-1">

            @foreach($menus as $menu)

                @if($menu->parent_id==0)
                    <li class="font18"><a href="{{$menu->link}}">{{$menu->name}}@if(in_array($menu->id,array_pluck($menus,'parent_id'))) <i class="fa fa-chevron-down arrow"></i> @endif</a>
                        @if(in_array($menu->id,array_pluck($menus,'parent_id'))) <ul class="menu-level-2"> @endif

                            @foreach($menus as $submenu)
                                @if($submenu->parent_id==$menu->id)

                                    <li><a href="{{$submenu->link}}">{{$submenu->name}}</a></li>

                                @endif

                            @endforeach
                            @if(in_array($menu->id,array_pluck($menus,'parent_id'))) </ul> @endif

                    </li>
                @endif
            @endforeach
        </ul>


    </div>

    {{--    <div class="responsive-menu">
            <UL class="responsive-menu-level-1">
                <li class="font18"><a href="#">صفحه اصلی</a></li>
                <li class="font18"><a href="#"> آموزش ها <i class="fa fa-chevron-down arrow"></i></a>
                    <ul class="responsive-menu-level-2">
                        <li><a href="">PHP</a></li>
                        <li><a href="">Java</a></li>
                        <li><a href="">JavaScript</a></li>
                        <li><a href="">ReactJS</a></li>
                    </ul>
                </li>
                <li class="font14"><a href="#">تبلیغات</a></li>
                <li class="font14"><a href="#">تماس با ما</a></li>
                <li class="font14"><a href="#">درباره ما</a></li>
            </UL>
        </div>--}}

    <div class="responsive-menu">
        <UL class="responsive-menu-level-1">
            @foreach($menus as $menu)

                @if($menu->parent_id==0)
                    <li class="font18"><a href="{{$menu->link}}">{{$menu->name}} @if(in_array($menu->id,array_pluck($menus,'parent_id')))  <i class="fa fa-chevron-down arrow"></i>  @endif</a>
                        @if(in_array($menu->id,array_pluck($menus,'parent_id')))    <ul class="responsive-menu-level-2"> @endif

                            @foreach($menus as $submenu)
                                @if($submenu->parent_id==$menu->id)
                                    <li><a href="{{$submenu->link}}">{{$submenu->name}}</a></li>

                                @endif
                            @endforeach
                            @if(in_array($menu->id,array_pluck($menus,'parent_id'))) </ul> @endif

                    </li>
                @endif
            @endforeach
        </ul>
    </div>

    {{--
        <div class="left-btn"><a href="{{route('login')}}" target="_blank"><button type="button" class="btn btn-danger login-btn" style="width: 150px;height: 42px;border-radius: 0px;">ورود اعضای شعبات</button> </a></div>
    --}}
    @if(session()->get('user')==null)
        <div class="left-btn"><a href="{{route('login')}}" target="_blank" class="btn btn-danger login-btn" style="width: 150px;height: 39px;border-radius: 0px; margin-left: 1%;background: #df0617;border: none;">{{--<button type="button" class="btn btn-danger login-btn" style="width: 150px;height: 42px;border-radius: 0px;">--}}ورود اعضای شعبات{{--</button>--}} </a></div>
    @else
        <div class="left-btn"><a href="{{url('user/panel')}}" target="_blank" class="btn btn-danger login-btn" style="width: auto;height: 39px;border-radius: 0px; margin-left: 1%;"> سلام {{$user->first_name}}  {{$user->last_name}}</a></div>

    @endif
</nav>

<style>
    #menu{

        box-shadow: -3px 9px 8px 0px #d6002a36 !important;
    }
</style>
<!--------------------------- end NAVIGATION(MENU)-Bodybuilding ---------------------->