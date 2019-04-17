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
            background-image: url("{{asset('img/branches_background.jpg')}}");
            background-size: cover;
            background-repeat: no-repeat;
            height: 100%;
            font-family: 'iransanse';
        }

        .container{
            height: 100%;
            align-content: center;
            font-family: 'iransanse';

        }

        .card{
            height: 370px;
            margin-top: auto;
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
            background-color: #df0617;
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
            color: white;
            background-color: #df0617;
            width: 100px;
            margin: 0 auto;
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

        .nav-tabs > li {
            float:none;
            display:inline-block;
            zoom:1;
        }

        .nav-tabs {
            text-align:center;
        }
        .i-tag-center{
            margin-left: 23%;
            color:white;
        }

        select#branch_select {
             margin-bottom: 5%;
        }
    </style>
    <!--Bootsrap 4 CDN-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <!--Fontawesome CDN-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <!--Custom styles-->
{{--
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
--}}
{{--
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
--}}
</head>
<body>
<div class="container">

    <div class="d-flex justify-content-center h-100">

        <div class="card">

          {{--  <ul class="nav nav-tabs nav-justified">
                <li class="nav-item">
                    <a class="nav-link active" href="#branch" data-toggle="tab">
                        ورود کاربران شعبات </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#user" data-toggle="tab">
                        ورود کاربران سایت </a>
                </li>
               --}}{{-- <li>
                    <a href="#tab_default_3" data-toggle="tab">
                        Tab 3 </a>
                </li>--}}{{--
            </ul>--}}

            @if(isset($cookie))
                <div class="alert alert-danger">{{$cookie->message}}</div>
                @php
                    \Cookie::queue(\Cookie::forget('error_login'));
                @endphp
            @endif

            <div class="card-body" >
{{--
                <div class="tab-content">
--}}
{{--
                    <div class="tab-pane active" id="branch">
--}}
                        <div class="branch">
                            <div class="card-header">
                                <h3>انتخاب شعبه</h3>
                            </div>
                            <select class="form-control" id="branch_select">
                                <option value="0">انتخاب کنید</option>
                                @foreach($branches as $branch)
                                    <option value="{{$branch->orginal_id}}">{{$branch['name']}}</option>
                                @endforeach
                            </select>
                        </div>
                        <form action="{{route('check_login')}}" method="post" style="display: none" class="login_form">
                            {{csrf_field()}}
                            <div class="input-group form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-user i-tag-center"></i></span>
                                </div>
                                <input name="username" type="text" class="form-control" placeholder="نام کاربری">
                                <input type="hidden" name="branchid" class="branchid" value="">

                            </div>
                            <div class="input-group form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-key i-tag-center"></i></span>
                                </div>
                                <input name="password" type="password" class="form-control" placeholder="رمز عبور">
                            </div>
                            {{-- <div class="row align-items-center remember">
                                 <input type="checkbox">مرا به خاطر بسپار!
                             </div>--}}
                            <div class="form-group" style="text-align: center;">
                                <input type="submit" value="ورود" class="btn login_btn">
                            </div>
                        </form>
{{--
                    </div>
--}}

                   {{-- <div class="tab-pane" id="user">


            </div>--}}
                </div>
          {{--  <div class="card-footer" style="display: none">
                <div class="d-flex justify-content-center links">
                    حساب کاربری ندارید؟<a href="#">عضویت</a>
                </div>
                <div class="d-flex justify-content-center">
                    <a href="#">رمزتان را فراموش کردید؟</a>
                </div>
            </div>--}}
        </div>
    </div>
</div>
<script src="{{asset('js/jquery.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
<script type="text/javascript">
        $('#branch_select').change(function () {
            var id=$(this).val();
            if(id!==0) {
             /*   $(this).hide();*/
                $('.branchid').val(id);
                $('.login_form').show();
            }
            });
</script>
</body>
</html>