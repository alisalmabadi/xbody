@php
    if(\Cookie::get('error_login')){
    $cookie=\Cookie::get('error_login');
    $cookie=json_decode($cookie);
    }else{
            $cookie=null;
    }


@endphp

        <!DOCTYPE html>
<html>
<head>
    <title>صفحه ورود اعضا</title>
    <!--Made with love by Mutiullah Samim -->
    <style>
        /* Made with love by Mutiullah Samim*/

        @font-face {
            font-family: 'iransanse';
            src: url(../fonts/IRANSansWeb.eot?e43cfbc1a67d90e910398ded8345cd32);
            src: url(../fonts/IRANSansWeb.eot?e43cfbc1a67d90e910398ded8345cd32) format("embedded-opentype"), url(/fonts/IRANSansWeb.woff?df14582918ca379a280e453bb3cc6ba5) format("woff"), url(/fonts/IRANSansWeb.ttf?ac22d187130d6c3433a49a1e98bfa968) format("truetype");
        }
        html,body{
            background-image: url('http://getwallpapers.com/wallpaper/full/a/5/d/544750.jpg');
            background-size: cover;
            /*background-repeat: no-repeat;*/
            height: 100%;
            width: 100%;
            font-family: 'iransanse';
        }

        .container{
            height: 100%;
            align-content: center;
            font-family: 'iransanse';

        }

        .card{
            height: auto;
            margin-top: 1%;
            margin-bottom: auto;
            width: 400px;
            background-color: rgba(0,0,0,0.5) !important;
            font-family: 'iransanse';

        }

        .social_icon span{
            font-size: 60px;
            margin-left: 10px;
            color: #FFC312;
            font-family: 'iransanse';

        }

        .social_icon span:hover{
            color: white;
            cursor: pointer;
            font-family: 'iransanse';

        }

        .card-header h3{
            color: white;
            font-family: 'iransanse';

        }

        .social_icon{
            position: absolute;
            right: 20px;
            top: -45px;
            font-family: 'iransanse';

        }

        .input-group-prepend span{
            width: 50px;
            background-color: #FFC312;
            color: black;
            border:0 !important;
            font-family: 'iransanse';

        }

        input:focus{
            outline: 0 0 0 0  !important;
            box-shadow: 0 0 0 0 !important;

        }

        .remember{
            color: white;
        }

        .remember input
        {
            width: 20px;
            height: 20px;
            margin-left: 15px;
            margin-right: 5px;
        }

        .login_btn{
            color: black;
            background-color: #FFC312;
            width: 100px;
        }

        .login_btn:hover{
            color: black;
            background-color: white;
        }

        .links{
            color: white;
        }

        .links a{
            margin-left: 4px;
        }
    </style>
    <!--Bootsrap 4 CDN-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <!--Fontawesome CDN-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <!--Custom styles-->
</head>
<body>
<div class="container">
    @if(session()->has('flash_message'))

        <div class="alert alert-{{session()->get('flash_message_level')}} alert-dismissable" role="alert" style="opacity: 1; direction: rtl;text-align: center;">
            <button type="button" class="close" data-dismiss="alert">
                <span aria-hidden="true" ></span><span class="sr-only">close</span>
            </button>
            {{session()->get('flash_message')}}
        </div>

    @endif
    <div class="d-flex justify-content-center h-100">

        <div class="card">
            {{--<div class="card-header">
                <h3>وارد شدن</h3>
                <div class="d-flex justify-content-end social_icon">
                    <span><i class="fab fa-facebook-square"></i></span>
                    <span><i class="fab fa-google-plus-square"></i></span>
                    <span><i class="fab fa-twitter-square"></i></span>
                </div>
            </div--}}
            <div class="card-body" >
                @if(isset($cookie))
                    <div class="alert alert-danger">{{$cookie->message}}</div>
                    @php
                        \Cookie::queue(\Cookie::forget('error_login'));
                    @endphp
                @endif


                    @foreach($errors->all() as $error)
                        <div class="alert alert-danger" style="direction: rtl; text-align: center">{{$error}}</div>
                    @endforeach

                <div class="branch">
                    <div class="card-header">
                        <h3 style="float: right;">ثبت نام</h3>
                    </div>

                </div>
                <form action="{{route('check_register')}}" method="post" class="login_form">
                    {{csrf_field()}}
                  {{--  <div class="input-group form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                        </div>
                        <input name="username" type="text" class="form-control" placeholder="نام کاربری">

                    </div>--}}
                    <div class="input-group form-group">

                        <input name="first_name" type="text" class="form-control" placeholder="نام">
                        <div class="input-group-prepend">
                            <span class="input-group-text">نام</span>
                        </div>
                    </div>
                    <div class="input-group form-group">
                        <input name="last_name" type="text" class="form-control" placeholder="نام خانوادگی">
                        <div class="input-group-prepend">
                            <span style="width:110px;" class="input-group-text">نام خانوادگی</span>
                        </div>
                    </div>

                    <div class="input-group form-group">
                        <input name="email" type="text" class="form-control" placeholder="ایمیل">
                        <div class="input-group-prepend">
                            <span style="width:60px;" class="input-group-text">ایمیل</span>
                        </div>
                    </div>

                    <div class="input-group form-group">

                        <input name="username" type="text" class="form-control" placeholder="نام کاربری">
                        <div class="input-group-prepend">
                            <span style="width:90px;" class="input-group-text">نام کاربری{{--<i class="fas fa-user" style="margin-left: 10%"></i>--}}</span>
                        </div>
                    </div>


                    <div class="input-group form-group">

                        <input name="password" type="password" class="form-control" placeholder="رمز عبور">
                        <div class="input-group-prepend">
                            <span style="width:70px;" class="input-group-text">رمزعبور{{--<i class="fas fa-key" style="margin-left: 10%"></i>--}}</span>
                        </div>
                    </div>

                    <div class="input-group form-group">

                        <input name="confirm_password" type="password" class="form-control" placeholder="تکرار رمز عبور">
                        <div class="input-group-prepend">
                            <span style="width:100px;" class="input-group-text">تکرار رمزعبور {{--<i class="fas fa-key" style="margin-left: 3%"></i>--}} </span>
                        </div>
                    </div>



                    <div class="branch">
                        <div class="card-header">
                            <h3 style="float: right;">جنسیت</h3>
                        </div>
                        <select name="gender" class="form-control" id="branch_select">
                            <option value="null">جنسیت خود را انتخاب کنید</option>
                            <option value="1">آقا</option>
                            <option value="2">خانم</option>
                        </select>
                    </div>
                    {{-- <div class="row align-items-center remember">
                         <input type="checkbox">مرا به خاطر بسپار!
                     </div>--}}
                    <div class="form-group">
                        <input type="submit" value="ثبت نام" class="btn float-right login_btn" style="margin-right: auto;  margin-left: auto; margin-top: 2%;">
                    </div>
                </form>
            </div>
            <div class="card-footer" style="display: none">
                <div class="d-flex justify-content-center links">
                    حساب کاربری ندارید؟<a href="#">عضویت</a>
                </div>
                <div class="d-flex justify-content-center">
                    <a href="#">رمزتان را فراموش کردید؟</a>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{asset('js/jquery.js')}}"></script>

<script type="text/javascript">
   /* $('#branch_select').change(function () {
        var id=$(this).val();
        if(id!==0) {
            $(this).hide();
            $('.branchid').val(id);
            $('.login_form').show();
        }
    });*/
</script>
</body>
</html>