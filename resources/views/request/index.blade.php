@extends('layouts.app')
@section('head')

    @endsection
@section('main_content')
<div class="container-fluid">
    <div class="p-2 " style="width: 100%; height: 160px;"></div>
    <div class="mx-auto mt-3 mb-4" style="text-align: center">صفحه ارسال درخواست</div>

       <div class="container">
    <div class="alert alert-success" style="text-align:center;">برای رزرو جلسات با توجه به اینکه قبلا عضو شعبات بودید یا خیر بر روی یکی از لینک های زیر کلیک کنید.</div>
       </div>
    <div class="m-2" style="width:100%;"></div>

       <div class="col-md-5 mx-auto mb-5">

           <div class="col-md-12">
       {{-- <div class="card-title pull-right m-4 ">

            لطفا کد کپچا زیر را وارد کنید:

           @if($errors->has('captcha'))
            <span style="color:red">{{$errors->first('captcha')}}</span>

               @endif
        </div>--}}

               <div class="form-group mx-auto">

                {{--   <div class="form-control mx-auto">
                       <form action="{{route('request.add')}}" method="post" class="mx-auto" id="formcap">
                           {!! $captcha !!}
                           {{csrf_field()}}
                           <p><input type="text" name="captcha" class="form-control"></p>
                           <button type="submit" --}}{{--style="transform:none;"--}}{{-- class="btn btn-success mx-auto d-flex justify-content-xl-center  mb-3">ثبت</button>
                       </form>
                   </div>--}}

                   <div class="btn-group mx-auto">
                       <a href="{{route('login')}}"> <button class="btn btn-success" style="border-radius: 0px;">رزرو عضو شعبات </button></a>
                       <a href="{{route('request.store')}}"> <button class="btn btn-danger" style="border-radius: 0px;">رزرو بازدید کننده سایت</button></a>

                   </div>
               </div>
           </div>

       </div>
</div>


@endsection