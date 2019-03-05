@extends('layouts.mobapp')


@section('content')
<div class="modal-header">
        <button class="close" data-dismiss="modal">×</button>
        <h4 class="modal-title">ورود به لب یار</h4>
    </div>
    <div class="modal-body">
        <form  id="frm_login" method="POST" action="{{ route('login') }}">
         {{csrf_field()}}
            <div class="row">
                <div class="col-sm-8 col-sm-offset-2">
            <div class="form-group">
                <label for="name" >شماره همراه</label>

                        <input id="name" class="form-control" placeholder="0936xxxxx" name="mobile_number" value="" required="" autofocus="" type="text">
                @if ($errors->has('mobile_number'))
                    <span class="help-block">
                        <strong>{{ $errors->first('mobile_number') }}</strong>
                    </span>
                @endif

            </div>

            <div class="form-group">
                <label for="password" >گذروازه</label>


                    <input id="password" class="form-control" name="password" required="" type="password">
                @if ($errors->has('password'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                @endif

            </div>
            <div class="iam-signIn-link"><a href="{{ route('password.request') }}" >شناسه یا رمز ورود خود را فراموش کردید؟</a> <span class="break">یا</span> <a href="{{route('register')}}" >اینجا ثبت‌نام کنید</a></div>

                </div>
            </div>
        </form>
    </div>
    <div class="modal-footer">
        <button class="btn btn-danger" data-dismiss="modal">انصراف</button>
        <a href="javascript:;" onclick="$('#frm_login').submit();" class="btn btn-primary">ورود</a>
    </div>
@stop


