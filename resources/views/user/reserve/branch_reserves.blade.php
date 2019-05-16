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
                     رزرو های کاربر در شعبه

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
                        <th class="hidden-phone">قیمت پکیج</th>
                        <th class="hidden-phone">روز ها</th>
                       {{-- <th class="hidden-phone">به جز</th>
                        <th>تاریخ روزها</th>
                        <th>وضعیت</th>--}}

                    </tr>
                    </thead>
                    <tbody>
                    {{--
                                        <span class="label label-danger">Approved</span>
                    --}}
                    @if($reserves[0]->Contract!=null)
                    @foreach($reserves as $reserve)
                       {{-- @php
                            foreach ($packages as $package){
                        if($package->PackageID == $reserve->Contract->PackageInfo->PackageID){
                        $package_name=$package->PackageName;
                        }
                    }
                        @endphp--}}

                       @php
                       $verta=new \Verta($reserve->Contract->ContractDate);
                     $date=$verta->format('%d %B %Y');
                       @endphp
                        <tr class="odd gradeX">
                            <td>
                                <input type="checkbox" class="checkboxes" value="1" /></td>
                            <td>{{$reserve->Contract->ContractID}}</td>
                            <td class="hidden-phone">{{$date}}</td><td>{{$reserve->Contract->PackageInfo->PackageName}}</td>
                            <td>{{$reserve->Contract->PackageInfo->PackagePrice}}</td>

                            {{-- <td class="center hidden-phone">@if($reserve->day_type==1)زوج @elseif($reserve->day_type==2) فرد @elseif($reserve->day_type==3) همه روز ها @endif</td>
                             <td class=" center">
                                 <ul>
                                     @foreach($reserve->days as $day)
                                         <li>{{$day->name}}</li>
                                     @endforeach
                                 </ul>
                             </td>--}}
                            <td>
                                <div class="btn btn-info" style="background: red;border:1px solid black" data-target="#modal" data-toggle="modal">مشاهده جلسات</div>


                                <div id="modal" class="modal fade" role="dialog" >
                                    <div class="modal-dialog">

                                        <!-- Modal content-->
                                        <div class="modal-content">
                                            <div class="modal-header" style="background: #ff0000c7;">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <h4 class="modal-title" style="font-family: iranyekan;">روز های رزروی</h4>
                                            </div>
                                            <div class="modal-body">
                                                <table class="table table-striped border-top">
                                                    <thead>
                                                    <tr>
                                                        <th>تاریخ</th>
                                                        <th class="hidden-phone">نام روز</th>
                                                        <th>ساعت</th>
                                                        <th class="hidden-phone">وضعیت حضور</th>

                                                    </tr>
                                                    </thead>
                                                    <tbody>

                                                    @foreach($reserve->Contract->LstUserReservation as $UserReserve)

                                                        @php
                                                            $v=new \Verta($UserReserve->ReserveDate);
                                                           $dated=$v->format('%d %B %Y');
                                                        @endphp
                                                        <tr class="odd gradeX">
                                                            <td>{{$dated}}</td>
                                                            <td>{{PersianDay($UserReserve->DayOfWeekName)}}</td>
                                                            <td>{{$UserReserve->Time}}</td>
       <td>@if($UserReserve->State=='حضور')<i style="color:gray;    font-size: 33px;" class="icon-check"></i> @else <i style="color:red;     font-size: 33px;" class="icon-remove-circle"></i> @endif</td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>

                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">بستن</button>
                                            </div>
                                        </div>

                                    </div>
                                </div>



                            </td>
{{--
                            <td class="hidden-phone">

                                <ul style="    background: #ff6c60;
    margin: 2px;
    text-align: center;
    border-radius: 5px;
    color: white;">
                                    @foreach($reserve->Contract->LstUserReservation as $UserReserve)

                                        @php
                 $v=new \Verta($UserReserve->ReserveDate);
                       $dated=$v->format('%d %B %Y');
                                        @endphp
                   <li> شماره رزروی {{$UserReserve->ReservationID}}</li><li>{{$dated}}</li>
        <li class="btn btn-info">{{PersianDay($UserReserve->DayOfWeekName)}}</li>
      <li>{{$UserReserve->Time}}</li>
 <li class="btn btn-success" style="margin: 2px">{{$UserReserve->State}}</li>

                                </ul>               <ul style="    background: #ff6c60;
    margin: 2px;

    text-align: center;
    border-radius: 5px;
    color: white;">
                                    @endforeach

                            </td>
--}}

              {{--              <td class="hidden-phone">@if($reserve->status==1) <button class="btn btn-success" style="width: 82.53px;!important;"> ثبت شده </button> @else <button class="btn btn-danger">ثبت نشده</button> @endif</td>--}}
                        </tr>





                    @endforeach
                        @endif
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