@extends('layouts.app')
@section('title','بازنشانی کلمه عبور')
@section('content')
    @include('partials.header')
    <div class="container-fluid login-fluid">

        <div class="container">

            <section class="rest-form-main">
                <div class="head">
                    <i class="icon icon-user-changepassword"></i>
                    <h1>تغییر کلمه عبور</h1>
                </div>


                <div class="row">
                    <div class="col-sm-4 col-sm-offset-4">
                        <form  method="POST" action="{{ route('reset') }}" >
                            {{ csrf_field() }}
                            <input type="hidden" name="mobile_number" value="{{$user->mobile_number}}">

                            <div class="form-group">

                                <input  id="iptLgnPlnID"  tabindex="1" placeholder="____" maxlength="4" class="form-control comfirmation-input"   name="confirmation_code" type="text">
                                @if ($errors->has('confirmation_code'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('confirmation_code') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="password">کلمه عبور</label>
                                <input id="password" type="password" name="password" value="{{old('password')}}" class="form-control" placeholder="کلمه عبور باید 6 کاراکتر یا بیشتر باشد">
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif

                            </div>

                            <div class="form-group">
                                <label for="phone_number">تکرار کلمه عبور جدید</label>
                                <input id="password_confirmation" type="Password" name="password_confirmation" class="form-control" placeholder="تکرار کلمه عبور را وارد کنید.">
                                @if ($errors->has('confirmPassword'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('confirmPassword') }}</strong>
                                    </span>
                                @endif

                            </div>



                            <div class="form-group">
                                <button class="btn btn-primary" id="signInButton" type="submit"> بازنشانی کلمه عبور جدید</button>
                            </div>

                        </form>
                    </div>









                </div>






            </section>

        </div>
    </div>
    @include('partials.footer')

@endsection

@section('script_whole')

    <script>

        $('#reset').on('click', function () {
            var captcha = $('img.captcha-img');
            var config = captcha.data('refresh-config');
            $.ajax({
                method: 'GET',
                url: '/get_captcha/' + config,
            }).done(function (response) {
                captcha.prop('src', response);
            });
        });
    </script>

@endsection



















