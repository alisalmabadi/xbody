
<header class="container-fluid">
    <nav class="navbar navbar-default">
        <div class="container">

            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a href="{{route('home')}}" class=" navbar-brand hidden-xs">
                    <span class="btn btn-primary">فروشگاه</span>

                </a>
                <a href="#" class="navbar-brand search collapsed visible-xs"  data-toggle="collapse" data-target="#bs-example-navbar-collapse-2" aria-expanded="false">
                    <span class="fa fa-search"></span>

                </a>
                <a class="navbar-brand logo " href="#">
                    <img src="{{route('home')}}/images/logo.png" alt="">

                </a>


            </div>

            @if(Auth::guard('web')->check())

                <a href="{{route('user.profile')}}" class=" navbar-brand hidden-xs">
                    <span class="btn btn-primary">سلام،{{Auth::guard('web')->user()->name}}</span>

                </a>
            @else


                <a  href="{{route('login')}}" class=" navbar-brand hidden-xs" data-toggle="modal" data-target="#loginM">
                    <span class="btn btn-link">ورود</span>
                </a>
            @endif


            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

                <form class="navbar-form navbar-right hidden-xs">
                    <div class="input-group" style="width: 460px;">

                        <input type="text" class="form-control" placeholder="Search">
                        <span class="input-group-btn">
                                    <button class="btn btn-default" type="button"><span class="fa fa-search"></span></button>
                                 </span>

                    </div>

                </form>
                <ul class="nav navbar-nav visible-xs">
                    @foreach($article_categories as $article_category)
                        <li><a href="{{route('article_category_show',$article_category)}}">{{$article_category->name}}</a></li>
                    @endforeach
                    <li class="visible-xs"><a href="#">ورود</a></li>
                    <li class="visible-xs"><a href="#">ثبت نام</a></li>
                </ul>
            </div>



        </div>






    </nav>
    <nav class="navbar navbar-default hidden-xs nav-layer-tow">
        <div class="container">
            <ul class="nav navbar-nav hidden-xs">
                @foreach($article_categories as $article_category)
                <li><a href="{{route('article_category_show',$article_category)}}">{{$article_category->name}}</a></li>
                @endforeach



            </ul></div>

    </nav>
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
</header>
<div class="visible-xs">
    <div  class="collapse navbar-collapse" id="bs-example-navbar-collapse-2" style="padding: 0">
        <form action="">
            <input type="text" class="form-control" placeholder="جستوجوی مقالات">
        </form>

    </div>
</div>