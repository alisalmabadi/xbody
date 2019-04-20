@extends('user.layouts.user_app')
@section('title','Xbody | reserve')
@section('head')
    <link rel="stylesheet" href="{{asset('css/jquery.Bootstrap-PersianDateTimePicker.css')}}">
    <link rel="stylesheet" href="{{asset('css/select2.min.css')}}">

    <style type="text/css">
        tbody tr:hover td,tbody tr:hover th {
            background-color: #00ff34 !important;
            transition: all ease-in-out 1s;
        }


    </style>
    @endsection
@section('content')
    <!-- page start-->
    <div class="row">
        <div class="col-lg-12">

            <aside class="profile-nav col-lg-3">
                <section class="panel">
                    <div class="user-heading round">
                        <a href="#">
                            <img src="{{asset('img/picture.png')}}" alt="">
                        </a>
                        <h1 style="font-family: iransanse">{{$user->first_name}}  {{$user->last_name}}   </h1>
{{--
                        <p>jsmith@flatlab.com</p>
--}}
                    </div>

                    <ul class="nav nav-pills nav-stacked">
                        <li class="active"><a href="{{route('user.profile')}}"><i class="icon-user"></i>پروفایل</a></li>
{{--
                        <li><a href="profile-activity.html"><i class="icon-calendar"></i>Recent Activity <span class="label label-danger pull-right r-activity">9</span></a></li>
--}}
{{--
                        <li><a href="profile-edit.html"><i class="icon-edit"></i>Edit profile</a></li>
--}}
                    </ul>

                </section>
            </aside>
            <aside class="profile-info col-lg-9">

                <section class="panel">
                    <div class="bio-graph-heading">
اطلاعات کلی
                    </div>
                    <div class="panel-body bio-graph-info">
{{--
                        <h1>خلاصه اطلاعات</h1>
--}}
                        <div class="row">
                            <div class="bio-row">
                                <p><span>نام</span>: {{$user->first_name}}</p>
                            </div>
                            <div class="bio-row">
                                <p><span>نام خانوادگی </span>: {{$user->last_name}}</p>
                            </div>
                            <div class="bio-row">
                                <p><span>شعبه </span>: {{$user->branch}}</p>
                            </div>
                            <div class="bio-row">
                                <p><span>جنسیت</span>: @if($user->gender==1) <button style=" background: white; color: #020202; border: 1px solid #e4e5e7;" type="button" class="btn btn-success">آقا</button> @else <button type="button" class="btn btn-danger">خانم</button>  @endif</p>
                            </div>
                        {{--    <div class="bio-row">
                                <p><span>Occupation </span>: UI Designer</p>
                            </div>
                            <div class="bio-row">
                                <p><span>Email </span>: jsmith@flatlab.com</p>
                            </div>
                            <div class="bio-row">
                                <p><span>Mobile </span>: (12) 03 4567890</p>
                            </div>
                            <div class="bio-row">
                                <p><span>Phone </span>: 88 (02) 123456</p>
                            </div>--}}
                        </div>
                    </div>
                </section>
              {{--  <section>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="panel">
                                <div class="panel-body">
                                    <div class="bio-chart">
                                        <input class="knob" data-width="100" data-height="100" data-displayprevious="true" data-thickness=".2" value="35" data-fgcolor="#e06b7d" data-bgcolor="#e8e8e8">
                                    </div>
                                    <div class="bio-desk">
                                        <h4 class="red">Envato Website</h4>
                                        <p>Started : 15 July</p>
                                        <p>Deadline : 15 August</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="panel">
                                <div class="panel-body">
                                    <div class="bio-chart">
                                        <input class="knob" data-width="100" data-height="100" data-displayprevious="true" data-thickness=".2" value="63" data-fgcolor="#4CC5CD" data-bgcolor="#e8e8e8">
                                    </div>
                                    <div class="bio-desk">
                                        <h4 class="terques">ThemeForest CMS </h4>
                                        <p>Started : 15 July</p>
                                        <p>Deadline : 15 August</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="panel">
                                <div class="panel-body">
                                    <div class="bio-chart">
                                        <input class="knob" data-width="100" data-height="100" data-displayprevious="true" data-thickness=".2" value="75" data-fgcolor="#96be4b" data-bgcolor="#e8e8e8">
                                    </div>
                                    <div class="bio-desk">
                                        <h4 class="green">VectorLab Portfolio</h4>
                                        <p>Started : 15 July</p>
                                        <p>Deadline : 15 August</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="panel">
                                <div class="panel-body">
                                    <div class="bio-chart">
                                        <input class="knob" data-width="100" data-height="100" data-displayprevious="true" data-thickness=".2" value="50" data-fgcolor="#cba4db" data-bgcolor="#e8e8e8">
                                    </div>
                                    <div class="bio-desk">
                                        <h4 class="purple">Adobe Muse Template</h4>
                                        <p>Started : 15 July</p>
                                        <p>Deadline : 15 August</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>--}}
            </aside>



        </div>
    </div>
    <!-- page end-->



@endsection


@section('footer')
    <script src="{{asset('js/select2.min.js')}}"></script>
{{--
    <script src="{{asset('js/jalaali.js')}}" type="text/javascript"></script>
--}}
{{--
    <script src="{{asset('js/jquery.Bootstrap-PersianDateTimePicker.js')}}" type="text/javascript"></script>
--}}
{{--
    <script src="{{asset('js/jquery.stepy.js')}}" type="text/javascript"></script>
--}}
{{--
    <script type="text/javascript" src="{{asset('js/jquery.dataTables.js')}}"></script>
--}}
    <script type="text/javascript" src="{{asset('js/DT_bootstrap.js')}}"></script>
{{--
    <script src="{{asset('js/dynamic-table.js')}}"></script>
--}}




    @endsection