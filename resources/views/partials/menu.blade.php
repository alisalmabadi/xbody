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

            @foreach($menus->where('type',1) as $menu)

                @if($menu->parent_id==0)
                    <li class="font18"><a href="{{$menu->link}}">{{$menu->name}}@if(in_array($menu->id,array_pluck($menus,'parent_id'))) <i class="fa fa-chevron-down arrow"></i> @endif</a>
                        @if(in_array($menu->id,array_pluck($menus,'parent_id'))) <ul class="menu-level-2"> @endif

                            @foreach($menus as $submenu)
                                @if($submenu->parent_id==$menu->id)

                                    <li class="submenu"><a class="submenu-a" href="{{$submenu->link}}">{{$submenu->name}}</a></li>

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
        <div class="left-btn">
            <a href="{{route('request.page')}}" target="_blank" class="btn btn-danger login-btn" style="width: 150px;height: 39px;border-radius: 0px; margin-left: 1%;background: #df0617;border: none;">رزرو جلسه</a>

            <a href="{{route('login')}}" target="_blank" class="btn btn-danger login-btn" style="width: 150px;height: 39px;border-radius: 0px; margin-left: 1%;background: #df0617;border: none;">ورود اعضای شعبات</a>
        </div>
    @else
        <div class="left-btn">
            <a href="{{route('user.reserve')}}" target="_blank" class="btn btn-danger login-btn" style="width: 150px;height: 39px;border-radius: 0px; margin-left: 1%;background: #df0617;border: none;">رزرو جلسه</a>
            <a href="{{url('user/panel')}}" target="_blank" class="btn btn-danger login-btn" style="width: auto;height: 39px;border-radius: 0px; margin-left: 1%;"> سلام {{$user->first_name}}  {{$user->last_name}}</a></div>

    @endif
</nav>

<style>
    #menu{

        box-shadow: -3px 9px 8px 0px #d6002a36 !important;
    }
    .submenu{
        border-bottom: 1px solid white;
    }
    .submenu-a:hover{
        color: #343e44 !important;
    }

    /*--------------------------------------- Navigation (menu) ------------------*/
#menu {
    float: right;
    width: 100%;
    height: 40px;
    background: #df0617;
    box-shadow: 0 0 18px 0 rgba(0, 0, 0, 0.2);
    border-top: 1px solid #ececec;
}

.menu-level-1 {
    float: right;
    height: 40px;
    margin-right: 60px;
}

.menu-level-1 > li {
    float: right;
    height: 40px;
}

.menu-level-1 > li > a {
    padding: 0 20px;
    text-decoration: none;
    height: 40px;
    display: block;
    text-align: center;
    line-height: 38px;
    color: #ffffff;
}

.menu-level-1 > li i {
    transition: all 400ms ease;
    font-size: 15px;
    color: white;
}

.-menu-level-1 li:hover i {
    transform: rotate(180deg);
    transition: all 400ms ease;

}

.menu-level-2 {
    width: 160px;
    position: absolute;
    background: #ea040f;
    padding: 5px 10px;
    z-index: 2;
    /*right: 192px;*/
    /*top: 123px;*/
    white-space: nowrap;
    box-shadow: 0 6px 7px rgba(0, 0, 0, 0.1);
    display: none;
}

.menu-level-2 li {
    height: 40px;
    /*border-bottom: 1px solid deepskyblue;*/
}

.menu-level-2 li a {
    display: block;
    text-align: center;
    text-decoration: none;
    height: 40px;
    padding: 0 15px;
    color: white;
    line-height: 40px;
}

.menu-level-2 > li:hover > a {
    color: white;
    /*border-bottom: 1px solid red;*/
}

.container-fluid > ul > li:hover > a {
    color: white;
    background: #ff000059;
}

.login-btn:hover{
    background:#ff000059 !important ;
}

/*----------------------- ICON Responsive ----------------------------*/
.container-fluid .responsive-menu-icon {
    float: right;
    cursor: pointer;
    display: block;
}

.container-fluid .responsive-menu-icon img {
    width: 40px;
    height: 30px;
    margin-top: 5px;
    display: none;
}

@media screen and (max-width: 768px) {
    .container-fluid .responsive-menu-icon img {
        display: block !important;
    }

    #menu > .container-fluid > ul {
        display: none !important;
    }

}

/*----------------------- END ICON Responsive ----------------------------*/
/*----------------------- Responsive Menu ----------------------------*/
.responsive-menu {
    display: none;
    width: 100%;
    height: auto;
    /*background-image: linear-gradient(305deg, #6e6e6e 33%, rgba(66, 66, 66, 0.91) 93%);*/
    background: #df0617;
    position: fixed;
    top: 0;
    right: -1300px;
    margin-top: 130px;
    overflow: hidden;
    /*box-shadow: 0 0 18px 0 rgba(0, 0, 0, 0.2);*/
    box-sizing: border-box;
    box-shadow: inset 0 2px 8px 0 rgba(0, 0, 0, 0.45);

    z-index: 100;
}

.responsive-menu-level-1 {
    margin: 2px 0;
}

.responsive-menu-level-1 > li {
    margin: 0 0;
    padding: 20px 0;
    text-align: center;
    box-shadow: inset 0 6px 8px 0 rgba(0, 0, 0, 0.15);
    letter-spacing: .3px;

}

.responsive-menu-level-1 > li > a {
    display: block;
    text-decoration: none;
    color: #ffffff;
    font-size: 20px;
    /*font-weight: bolder;*/
}

.responsive-menu-level-1 > li:hover > a {
    color: #ffffff;
}

.responsive-menu-level-1 > li i {
    transition: all 400ms ease;
    font-size: 15px;
    color: red;
}

.responsive-menu-level-1 li:hover i {
    transform: rotate(180deg);
    transition: all 400ms ease;

}

.responsive-menu-level-2 {
    width: 100%;
    /*position: absolute;*/
    background: #ea040f;
    padding: 5px 10px;
    /*z-index: 2;*/
    /*right: 1px;*/
    top: 128px;
    margin-top: 10px;
    white-space: nowrap;
    box-shadow: 0 6px 7px rgba(0, 0, 0, 0.1);
    display: none;
}

.responsive-menu-level-2 li {
    height: 40px;
    /*border-bottom: 1px solid deepskyblue;*/
}

.responsive-menu-level-2 li a {
    display: block;
    text-align: center;
    text-decoration: none;
    height: 40px;
    padding: 0 15px;
    color: #ffffff;
    line-height: 40px;
}

.responsive-menu-level-2 li a:hover {
    /*background: white;*/
    color: white;
}

.back-container {
    width: 100%;
    height: 100%;
    position: fixed;
    float: right;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    transition: .7s;
    background: rgba(0, 0, 0, 0.4);
    z-index: 99;

}

/*----------------------- END Responsive Menu ----------------------------*/
</style>
<!--------------------------- end NAVIGATION(MENU)-Bodybuilding ---------------------->