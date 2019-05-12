<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('site_name',\Setting::get('site_name'))</title>
<!--
    <link rel="stylesheet" type="text/css" href="{{asset('css/font-awesome.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/font-awesome.min.css')}}"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{asset('css/single-page.css')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap-rtl.min.css')}}">

    <link rel="stylesheet" href="{{asset('css/products.css')}}">
    <link rel="stylesheet" href="{{asset('css/index.blog.item.css')}}">

    <style>
        .adress {
            width: 100%;
            height: 50px;
            float: right;
            margin-top: 20px;
            /*background: #99ffff;*/
            border-bottom: 1px solid #dadcdd;
        }

        .adress p {
            color: black;
            line-height: 50px;
            float: right;
            /*font-family: IRANYekan;*/
        }


        .paragraf {
            width: 100%;
            height: auto;
            /*background: #99ffff;*/
            float: right;
        }

        .paragraf p {
            padding-top: 60px;
            /*font-family: ;*/
            font-size: 30px;
            color: black;
            text-align: center;
        }

        .paragraf h3 {
            /*width: 90%;*/
            /*font-family: ;*/
            font-size: 20px;
            color: black;
            padding-bottom: 40px;
            /*margin: 0 auto;*/
            text-align: center;
        }

        .paragraf h2 {
            /*width: 90%;*/
            /*font-family: ;*/
            font-size: 27px;
            color: black;
            /*margin: 0 auto;*/
            text-align: center;
        }

        @media (max-width: 700px) {
            .paragraf {
                width: 100%;
                height: auto;
                /*background: #99ffff;*/
                float: right;
            }

            .paragraf p {
                padding-top: 20px;
                /*font-family: ;*/
                font-size: 4vw;
                color: black;
                text-align: center;
            }

            .paragraf h3 {
                /*width: 90%;*/
                /*font-family: ;*/
                font-size: 2.3vw;
                color: black;
                /*margin: 0 auto;*/
                text-align: center;
            }

            .paragraf h2 {
                /*width: 90%;*/
                /*font-family: ;*/
                font-size: 5vw;
                color: black;
                /*margin: 0 auto;*/
                text-align: center;
            }

        }


        /*--------------------- Box Products --------------------------*/
        .box-products {
            width: 100%;
            height: auto;
            /*background: #d1d1d1;*/
            float: right;
            margin: 20px auto;
            /*box-shadow: 0px -10px 16px 8px rgba(0, 0, 0, 0.1);*/
            /*border-top: 1px solid #787878;*/

        }

        .item p {
            text-align: center;
            font-size: 1.4vw;
        }

        /* .item:hover p {
             color: #d6002a;
         }
 */
        .item:hover h5 {
            color: #d6002a;
        }

        .item h5 {
            text-align: center;
            font-size: 1.3vw;
        }

        .box-products-item .item {
            /*width: 100%;*/
            /*height: 30vw;*/
            background: rgb(43, 91, 105);
            height: 420px;
            width: 100%;
            margin-top: 20px;
        }

        .box-products-item .item:hover {
            box-shadow: 0 0 18px 8px rgba(0, 0, 0, 0.2);

        }

        .box-products-item .item .item-img {
            width: 100%;
            height: 65%;
            float: right;
        }

        .box-products-item .item .item-img img {
            width: 100%;
            height: 100%;
        }

        .box-products-item .item .item-title {
            background: grey;
            width: 100%;
            height: 35%;
            float: right;
        }

        .box-products-item .item .item-title h4 {
            color: whitesmoke;
            padding-top: 50px;
            text-align: center;
        }

        .box-products-item .item .item-new {
            background: #0c5460;
            width: 20%;
            height: 15%;
            float: left;
            z-index: 99;
            margin: -185px 0 0 20px;
            transition: all 400ms ease;
            border-radius: 4px;
        }

        .box-products-item .item:hover .item-new {
            margin: -220px 0 0 20px;
            transition: all 400ms ease;
        }

        .box-products-item .item .item-new > h3 {
            color: #1fa4b3;
            z-index: 223423;
            padding-top: 10px;
            text-align: center;
        }

        .box-products-item .item .item-new > ::after {
            content: "";
            position: absolute;
            width: 0;
            height: 0;
            top: 295px;
            margin: 0 auto;
            right: 228px;
            left: 0;
            transition: all 400ms ease;
            z-index: 90;
            border-style: solid;
            border-width: 0 12px 12px 12px;
            border-color: transparent transparent #0c5460 transparent;

        }

        .box-products-item .item:hover .item-new > ::after {
            content: "";
            position: absolute;
            width: 0;
            height: 0;
            top: 198px;
            margin: 0 auto;
            right: 228px;
            left: 0;
            transition: all 400ms ease;
            border-style: solid;
            border-width: 0 12px 12px 12px;
            border-color: transparent transparent #0c5460 transparent;

        }

        .blog-item {
            width: auto;
            height: auto;
            /*background: #448da4;*/
            float: right;
            margin-bottom: 20px;
            margin-right: 25px;
            /*transition: all 400ms ease-in-out;*/

        }

        .item {
            width: 22vw;
            height: 25vw;
            background: white;
            float: right;
            margin: 0 14px 10px 10px;
            position: relative;
            overflow: hidden;
        }
        .item:hover{
            -webkit-box-shadow: 0 0 10px 0 rgba(0,0,0,.1);
            box-shadow: 0 0 10px 0 rgba(0,0,0,.1);
        }
        .item2 {
            width: 22vw;
            height: 20vw;
            background: #ff56ba;
            float: right;
            margin: 0 14px 10px 10px;
            position: relative;
            overflow: hidden;
        }

        .item2 img {
            width: 100%;
            height: 100%;
            /*position: relative;*/
        }

        .item2 .item-title {
            width: 100%;
            height: 100%;
            background-color: rgba(43, 91, 105, 0.83);
            float: right;
            position: absolute;
            bottom: 0;
            display: none;
            transition: all 700ms;

        }

        .item2:hover .item-title {
            width: 100%;
            height: 100%;
            background-color: rgba(43, 91, 105, 0.83);
            float: right;
            position: absolute;
            bottom: 0;
            display: block !important;
            transition: all 700ms;
        }

        .item2 .item-title:hover {
            height: 100%;
            transition: all 600ms ease-in;
        }

        .item img {
            width: 70%;
            height: 60%;
            margin: 4% 15%;
            border-radius: 100%;
            /* position: relative; */
            border-right: 4px solid #00000029;
            padding: 8px;
            border-left: 4px solid #00000029;
            box-shadow: 0px 6px 6px -3px #80808059;
            margin-bottom: 12%;
            transition: 1s all ease-in-out;

        }
        .item img:hover{
            border-right: 4px solid rgba(0, 0, 0, 0.45);
            border-left: 4px solid rgba(0, 0, 0, 0.45);
            opacity: 0.999;
        }

        .item .item-title {
            width: 100%;
            height: 20%;
            background-color: rgba(43, 91, 105, 0.83);
            float: right;
            position: absolute;
            bottom: 0;
            transition: all 600ms ease-in;

        }

        .item .item-title:hover {
            height: 100%;
            transition: all 600ms ease-in;
        }

        .item-title .title-titre {
            width: 100%;
            height: auto;
            /*background: grey;*/
        }

        .title-titre p {
            color: white;
            font-weight: bolder;
            font-size: 1.6vw;
            text-align: center;
            line-height: 60px;
        }

        .item-title .title-pg {
            width: 100%;
            height: 80%;
            /*margin-top: 20%;*/
            /*background: #687980;*/
        }

        .title-pg p {
            color: white;
            font-size: 1.1vw;
            font-weight: bold;
            text-align: justify;
            padding: 10px 10px 0 10px;
        }

        @media (max-width: 992px) {
            .item {
                width: 30vw;
                height: 40vw;
                margin: 0 1.2vw 10px 1vw;
            }

            .item p {
                text-align: center;
                font-size: 3vw;
                padding-top: 10px;
            }

            .item h5 {
                text-align: center;
                font-size: 2.3vw;
            }
        }

        @media (max-width: 768px) {
            .item {
                width: 40vw;
                height: 40vw;
                /*margin: 0 5px 10px 5px;*/
            }

            .item p {
                text-align: center;
                font-size: 3vw;
                padding-top: 10px;
            }

            .item h5 {
                text-align: center;
                font-size: 2.3vw;
            }

        }

        @media (max-width: 576px) {
            .item {
                width: 33vw;
                height: 40vw;
                margin: 0 6vw 10px 6vw;
            }

            .item p {
                text-align: center;
                font-size: 3vw;
                padding-top: 2px;
            }

            .item h5 {
                text-align: center;
                font-size: 2.3vw;
                line-height: 0;
            }
        }

        @media (max-width: 390px) {

            .item {
                width: 70vw;
                height: 70vw;
                margin: 0 3.5vw 10px 3.5vw;
            }

            .item p {
                text-align: center;
                font-size: 5vw;
                padding-top: 2px;
                color: black;
            }

            .item h5 {
                text-align: center;
                font-size: 4vw;
                line-height: 0;
                color: black;
            }
        }

        /*@media (max-width: 290px) {*/
        /*.item {*/
        /*width: 60vw;*/
        /*height: 40vw;*/
        /*margin: 0 8vw 10px 5vw;*/
        /*}*/

        /*.title-titre p {*/
        /*color: white;*/
        /*font-weight: bolder;*/
        /*font-size: 4vw;*/
        /*text-align: center;*/
        /*line-height: 20px;*/
        /*}*/

        /*.title-pg p {*/
        /*color: white;*/
        /*font-size: 2.5vw;*/
        /*font-weight: bold;*/
        /*text-align: justify;*/
        /*padding: 10px 10px 0 10px;*/
        /*}*/
        /*}*/
        /*--------------------- End Box Products --------------------------*/
    </style>
</head>
<body>
@include('partials.header')
@include('partials.menu')
<div class="container">
    <div class="paragraf">
        <p>{{$setting->product_header}}</p>
        <br>
        <h3>
            {{$setting->product_des}}
        </h3>
        <!--<br>-->
        <!--<h2>باشگاه بدنسازی عصر</h2>-->
    </div>
</div>
<div class="box-products container-fluid">

    <div class="blog-item">
        @foreach($products as $product)
            <div class="item">
                <a href="{{url('/product')}}/{{$product->category->slug}}/{{$product->slug}}" style="color: black">
                    <img src="{{route('media',$product->images()->first())}}" alt="">
                    <p>{{$product->name}}</p>
                    <h5>
                        @if(($product->price)=='0')
                            <span style="color: white;
    background: #df0617;
    border-radius: 9px;
    padding: 5px;font-size:14px">تماس بگیرید</span>
                        @else

                            {{Convertnumber2english($product->price)  }}  تومان

                        @endif
                    </h5>
                </a>
            </div>
        @endforeach
    </div>
</div>

@include('partials.footer')
<script src="https://payalord.github.io/xZoom/js/vendor/jquery.js" type="text/javascript"></script>

<script src="{{asset('js/bootstrap.js')}}"></script>
<script src="{{asset('js/jq.js')}}"></script>
</body>
</html>