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
    <div class="alert alert-info" style="text-align: center">
        برای رزرو بعد از انتخاب تاریخ مورد نظر ساعت آن روز را انتخاب کرده و در پایان ثبت روزهای رزروی را بزنید.
    </div>

    {{--<div class="alert alert-danger">

    </div>--}}
    <!-- page start-->
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <form class="panel" action="{{route('user.finalreserve')}}" method="POST">
                    {{CSRF_FIELD()}}
                    <input type="hidden" name="reserve_id" value="{{$reserve->id}}">
                    <input type="hidden" name="package_id" value="{{$reserve->package_id}}">
                    <input type="hidden" name="start_date" value="{{$reserve->start_date}}">
                    <input type="hidden" name="count_week" value="{{$reserve->count_week}}">
                    <input type="hidden" name="day_type" value="{{$reserve->day_type}}">
                    <input type="hidden" name="branch_id" value="{{$reserve->branch_id}}">
                    <input type="hidden" name="user_originalid" value="{{$user_originalid}}">



                    {{--
                                    <input type="hidden" name="branch_id" value="{{$reserve->branch_id}}">
                    --}}


                    <header class="panel-heading">
                        روزهای پیشنهادی و تکمیل رزرو

                    </header>
                    <table class="table table-striped border-top" id="sample_1">
                        <thead>
                        <tr>
                            <th style="width: 8px;">
                                <input name="dates[]" type="checkbox" class="group-checkable"  data-set="#sample_1 .checkboxes" />
                            </th>
                            <th>تاریخ روز های پیشنهادی</th>
                            <th>ساعت ها</th>
                            {{--    <th class="hidden-phone">Points</th>
                                <th class="hidden-phone">Joined</th>
                                <th class="hidden-phone"></th>--}}
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($res->ReservationDetailList as $item)
                            <tr class="odd gradeX datacheck" style="text-align: center">
                                <td>
                                    <input name="dates[]"  type="checkbox" class="checkboxes" value="{{$item->Date}}" />
                                </td>

                                <td>{{shamsi($item->Date)}}</td>
                                <td>
                                    <button class="btn btn-danger" id="selecthour" type="button" style="width: 41%;height: 86% !important;">برای انتخاب ساعت کلیک کنید.</button>

                                    <div class="whole-row">
                                        <div class="times" style="display: none;">
                                            <select name="hour[]" class="form-control">
                                                <option value="">انتخاب کنید</option>
                                                @foreach($item->AvailableTimes as $time)

                                                    <option value="{{$time->TimeID}}">{{$time->TimeText}}</option>

                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </td>
                                {{--
                                                        <td class="hidden-phone"></td>
                                --}}
                                {{--                        <td class="center hidden-phone">02.03.2013</td>
                                                        <td class="hidden-phone"><span class="label label-success">Approved</span></td>--}}
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                    <button class="btn btn-danger" style="margin-right: 50%;margin-bottom: 1%;">ثبت روزهای رزروی</button>
                </form>

            </section>
        </div>
    </div>
    <!-- page end-->
    {{--
    {{$user->id}}
    {{$user->first_name}}
    {{$user->last_name}}
    --}}



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
    <script type="text/javascript" src="{{asset('js/jquery.dataTables.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/DT_bootstrap.js')}}"></script>
    {{--
        <script src="{{asset('js/dynamic-table.js')}}"></script>
    --}}


    <script>
        $('tr.datacheck').one('click',function () {
            $(this).find('.times').toggle('fade');
            $(this).find('#selecthour').toggle('fade');
            $(this).find('.checkboxes').prop('checked',true);
            // $(this).attr('style','background:green !important');
        });
    </script>

@endsection