{{--@extends('layouts.app')
@section('head')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>

    <link rel="stylesheet" href="{{asset('css/jquery.Bootstrap-PersianDateTimePicker.css')}}">
    <link rel="stylesheet" href="{{asset('css/select2.min.css')}}">
    <meta content="{{csrf_token()}}" name="content">

    <style>
        #formcap > img{
            margin-left: 13px;
            margin-bottom: 2%;
        }
    </style>

    @endsection
@section('main_content')--}}
   <div class="container">
    <div class="p-2 " style="width: 100%; height: 160px;"></div>
    <div class="mx-auto mt-3 mb-4" style="text-align: center">نتیحه ارسال درخواست</div>


    <div class="m-2" style="width:100%;"></div>



       <div class="row mb-5">
           <div class="col-lg-12">
               <section class="card">
                   <header class="card-header" style="text-align: right">
                     نتیجه رزرو

                   </header>
                   <div class="card-body">

                       <div class="container">
                           @if($resam==1)
                           <div class="alert alert-success" style="text-align:center;">رزرو شما با موفقیت ثبت شد،اکنون میتوانید با شماره رزروی {{$res->ReserveCode}} در شعبه مورد نظر ثبتنام خود را تکمیل نمایید.</div>
                            @elseif($resam==2)
                           <div class="alert alert-success" style="text-align:center;">مشکلی در مرحله ثبت در دیتابیس وجود داشته با پشتیبانی تماس بگیرید.</div>
                            @elseif($resam==3)

                           <div class="alert alert-success" style="text-align:center;">مشکلی (null value) پیش آمد،لطفا با پشتیبانی تماس حاصل فرمایید.</div>
                           @elseif($resam==4)

                               <div class="alert alert-success" style="text-align:center;">مشکلی در مرحله ثبت در دیتابیس پیش آمد.</div>

                           @endif
                       </div>



                       <div class="m-6"></div>
                   </div>
               </section>
           </div>
       </div>


   </div>

{{--
@endsection

@section('footer')
    <script type="text/javascript" src="{{asset('js/jquery.dataTables.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/DT_bootstrap.js')}}"></script>

    @endsection--}}
