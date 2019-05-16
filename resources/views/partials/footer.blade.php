<div class="container-fluid text-center footer">
    <div class="row">
        <div class="col-xl-3 col-lg-3 col-md-6 col-12 ">
            <div class="item-footer">
                <div class="footer-title">
                    <p>منوی میانبر</p>
                </div>
                <div class="footer-body">
                    <ul>
                        @foreach($menus->where('type',2) as $menu)
                        <li><a href="{{$menu->link}}">{{$menu->name}}</a></a></li>
                        @endforeach
                       {{-- <li><a href="#">آموزش ها</a></li>
                        <li><a href="#">درباره ما</a></li>
                        <li><a href="#">تماس با ما</a></li>
                        <li><a href="#">بلاگ</a></li>--}}
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-3 col-md-6 col-12 ">
            <div class="item-footer">
                <div class="footer-title">
                    <p>ارتباط با ما</p>
                </div>
                <div class="footer-body">
                    {!! $setting->fcontactus !!}

                    <div class="l-icon">
                        <div class="icon">
                            <div class="icon-2">
                                    <a href="https://facebook.com/{{$setting->facebook}}"><i class="fa fa-facebook"></i></a>
                                </div>
                            <div class="icon-2">
                                    <a href="https://telegram.me/{{$setting->telegram}}"><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/8/82/Telegram_logo.svg/32px-Telegram_logo.svg.png"></a>
                                </div>
                            <div class="icon-2">
                                    <a href="https://instagram.com/{{$setting->instagram}}"><i class="fa fa-instagram"></i></a>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <style>

        .l-icon .icon {
            margin-top: 30px;
            margin-right: 65px;
            /*background: #d39e00;*/
        }

        .l-icon .icon-2 {
            width: 40px;
            height: 40px;
            /*background: rgb(20, 184, 204);*/
            border-radius: 4px;
            float: right;
            margin: 0 16px 0 10px;
        }

        .icon .icon-2 i {
            display: block;
            font-size: 30px;
            margin-top: 3px;
            width: 40px;
            transition: all 400ms ease;

        }

        .icon .icon-2 i {
            color: #2c3e50;
        }

        .icon .icon-2 i:hover {
            color: #d6002a;
            font-size: 40px;
            transition: all 400ms ease;
        }

        .l-icon .icon-2 {
            margin-bottom: 10px;
        }
       /*------------------------------------ End Proposal ----------------------------------*//*---------------------------- Footer ----------------------*/

    .footer {
        width: 100%;
        height: auto;
        float: right;
        padding-top: 40px;
        background:#dadcdc;
        /*margin-top:50px;*/
    }

    .footer .item-footer {
        width: 100%;
        height: 400px;
        /*background: #2c3e50;*/
        margin-bottom: 20px;
    }

    .footer-title {
        width: 100%;
        height: auto;
        /*background: grey;*/
        border-bottom: 3px solid #d6002a;
    }

    .footer-title p {
        color: #3e3d40;
        text-align: center;
        padding-top: 20px;
    }

    .footer-body {
        width: 100%;
        height: auto;
        /*background: #1fa4b3;*/
        margin-top: 20px;
    }

    .footer-body ul li {
        width: 100%;
        height: 40px;
        /*background: grey;*/
        margin-bottom: 10px;
        line-height: 40px;
    }
    .footer-body p{
        text-align: right;
        color: #707172;
    }
    .footer-body ul li a i{
        color: white;
        text-align: right;
        font-size:30px;
        transition:all 400ms ease-in-out;
    }

    .footer-body ul li a i:hover{
        color: #d6002a;
        text-align: right;
        font-size:40px;
        transition:all 400ms ease-in-out;
    }

    .footer-body ul li a {
        display: block;
        /*width: auto;*/
        /*height: auto;*/
        color: #707172;
    }

    .footer-body ul li a:hover {
        cursor: pointer;
        /*display: block;*/
        /*color: #df2726;*/
    }

/*-------------------------- End Footer ----------------------*/
/*------------------------------- Footer-Fine-2 -----------------------------*/
.footer-fine2 {
    height: 60px;
    float: right;
    background: #707172;
}
.footer-right {
    float: left;
    width: 100%;
    height: auto;
}

.footer-right p {
    /*float: right;*/
    /*display: bloc k;*/
    text-align: center;
    /*font-weight: bolder;*/
    font-family: iranyekan;
    font-size: 15px;
    color: #dadcdc;
    line-height: 45px;
    padding-right: 40px;
    /*margin: 0 auto;*/
}

.footer-left{
    float: left;
    width: 100%;
    height: auto;
}

.footer-left p{
    text-align: center;
    /*font-weight: bolder;*/
    font-family: iranyekan;
    font-size: 15px;
    line-height: 45px;
    color: #dadcdc;
}

@media (max-width: 800px ){
    .footer-fine2 {
        height:auto;
        float: right;
        background: #707172;
    }
}

@media (max-width: 600px ) {
    .footer-fine2 {
        height:auto;
        float: right;
        background: #707172;
    }
    .footer-fine2 .footer-left p{
        /*padding-left: 20px;*/
        font-size: 13px;
        text-align:center;
    }
    
    .footer-right p {
        
        text-align: center;
        /*font-weight: bolder;*/
        font-family: iranyekan;
        text-align: center;
        font-size: 5vw;
        color: #dadcdc;
        /*padding-right: 40px;*/
        
}
}



/*------------------------------- End Footer-Fine-2 -----------------------------*/

    </style>
        <div class="col-xl-6 col-lg-6 col-md-12 col-12 ">
            <div class="item-footer">
                <div class="footer-title">
                    <p>درباره ما</p>
                </div>
                <div class="footer-body">

                     {!! $setting->fabout !!}

                </div>
            </div>
        </div>
    </div>
</div>
<!----------------------------------- End Footer ------------------------------>
<!-------------------------------- Footer-Fine2 ------------------------------->
<div class="container-fluid footer-fine2">
    <div class="row">
        <div class="col-xl-6 col-lg-6 col-md-6 col-12 ">
            <div class="footer-right">
                <p> طراحی و سئو سایت : ایده آفرین </p>
            </div>
        </div>
        <div class="col-xl-6 col-lg-6 col-md-6 col-12">
            <div class="footer-left">
                <p> Copyright © 1995-2018 mit-group All Rights reserved. </p>
            </div>
        </div>
    </div>
</div>
<!----------------------------- End Footer-Fine2 ------------------------------>