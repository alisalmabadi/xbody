@extends('user.layouts.user_app')
@section('title','Xbody | reserve')
@section('head')
    <link rel="stylesheet" href="{{asset('css/jquery.Bootstrap-PersianDateTimePicker.css')}}">
    <link rel="stylesheet" href="{{asset('css/select2.min.css')}}">


@endsection
@section('content')
    <!-- page start-->
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    رزرو های کاربر

                </header>
                <table class="table table-striped border-top" id="sample_1">
                    <thead>
                    <tr>
                        <th style="width: 8px;">
                            <input type="checkbox" class="group-checkable" data-set="#sample_1 .checkboxes" />
                        </th>
                        <th>شماره رزروی</th>
                        <th class="hidden-phone">تاریخ شروع دوره</th>
                        <th>نام پکیج</th>
                        <th class="hidden-phone">روزهای</th>
                        <th class="hidden-phone">به جز</th>
                        <th>تاریخ روزها</th>
                        <th>وضعیت</th>

                    </tr>
                    </thead>
                    <tbody>
                    {{--
                                        <span class="label label-danger">Approved</span>
                    --}}
                    @php
                        $packages=getpackages($user->branch_id);
                        $packages=json_decode($packages);
                        $packages=json_decode($packages);


                    @endphp
                    @foreach($reserves as $reserve)
                        @php
                            foreach ($packages as $package){
                        if($package->PackageID == $reserve->package_id){
                        $package_name=$package->PackageName;
                        }
                    }
                        @endphp
                        <tr class="odd gradeX">
                            <td>
                                <input type="checkbox" class="checkboxes" value="1" /></td>
                            <td>{{$reserve->id}}</td>
                            <td class="hidden-phone">{{shamsi($reserve->start_date)}}</td>
                            <td>{{$package_name}}</td>
                            <td class="center hidden-phone">@if($reserve->day_type==1)زوج @elseif($reserve->day_type==2) فرد @elseif($reserve->day_type==3) همه روز ها @endif</td>
                            <td class=" center">
                                <ul>
                                    @foreach($reserve->days as $day)
                                        <li>{{$day->name}}</li>
                                    @endforeach
                                </ul>
                            </td>
                            <td class="hidden-phone">

                                <ul>
                                    @foreach($reserve->ReserveDetails as $res)
                                        <li>{{shamsi($res->date)}}</li>
                                    @endforeach
                                </ul>
                            </td>

                            <td class="hidden-phone">@if($reserve->status==1) <button class="btn" style="width: 82.53px;!important; background-color: grey; color:white; border:1px solid red;"> ثبت شده </button> @else <button class="btn btn-danger" style="border:1px solid grey;">ثبت نشده</button> @endif</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </section>

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

    <script type="text/javascript" src="{{asset('js/jquery.dataTables.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/DT_bootstrap.js')}}"></script>
    <script src="{{asset('js/dynamic-table.js')}}"></script>




@endsection