@extends('user.layouts.user_app')
@section('title','Xbody')
@section('content')

    <div class="row state-overview">
        <div class="col-lg-3 col-sm-6">
            <section class="panel">
                <div class="symbol red">
                    <i class="icon-user"></i>
                </div>
                <div class="value">
                    <h1>{{$loader['all']}}</h1>
                    <p>رزرو های کاربر</p>
                </div>
            </section>
        </div>
        <div class="col-lg-3 col-sm-6">
            <section class="panel">
                <div class="symbol red">
                    <i class="icon-tags"></i>
                </div>
                <div class="value">
                    <h1>{{$loader['zoj']}}</h1>
                    <p>رزور در روزهای زوج</p>
                </div>
            </section>
        </div>
        <div class="col-lg-3 col-sm-6">
            <section class="panel">
                <div class="symbol red">
                    <i class="icon-shopping-cart"></i>
                </div>
                <div class="value">
                    <h1>{{$loader['date']}}</h1>
                    <p>کلیه روز ها</p>
                </div>
            </section>
        </div>
        <div class="col-lg-3 col-sm-6">
            <section class="panel">
                <div class="symbol red">
                    <i class="icon-bar-chart"></i>
                </div>
                <div class="value">
                    <h1>{{$loader['active']}}</h1>
                    <p>رزروهای ثبت شده</p>
                </div>
            </section>
        </div>
    </div>


    @endsection