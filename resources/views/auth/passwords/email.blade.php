@extends('layouts.app')
@section('title','باریابی کلمه عبور')
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
                        <form   method="POST"  action="{{route('reset-password')}}" >
                                {{ csrf_field() }}

                        <div class="form-group">
                            <label for="mobile_number">شماره همراه</label>
                            <input  id="mobile_number"  placeholder="مانند 09xxx" maxlength="100" class="form-control"  name="mobile_number" type="tel">
                            <div class="error-msg">
                                @if ($errors->has('mobile_number'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('mobile_number') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                         <div class="form-group">
                                 <img src="{{ captcha_src() }}" alt="captcha" class="captcha-img" data-refresh-config="default">
                                 <button type="button" class="btn btn-link" id="reset">reset</button>
                        </div>
                        <div class="form-group">
                            <input id="securityAnswer" placeholder="پاسخ امنیتی"  name="captcha" class="form-control" type="text">
                            <div class="error-msg">
                            @if ($errors->has('captcha'))
                                <span class="help-block">
                                <strong>{{ $errors->first('captcha')}}</strong>
                            </span>
                            @endif
                            </div>
                        </div>
                            <div class="form-group">
                                <button class="btn btn-primary" id="signInButton" type="submit">بازیابی کلمه عبور</button>
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



@endsection



