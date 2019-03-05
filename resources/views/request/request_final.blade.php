@extends('layouts.app')
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
@section('main_content')
    <div class="container">
        <div class="p-2 " style="width: 100%; height: 160px;"></div>
        {{--
            <div class="mx-auto mt-3 mb-4" style="text-align: center">صفحه ارسال درخواست</div>
        --}}

        <div class="container">
            <div class="alert alert-success" style="text-align:center;">برای رزرو بعد از انتخاب تاریخ مورد نظر ساعت آن روز را انتخاب کرده و در پایان ثبت روزهای رزروی را بزنید.</div>
        </div>
        <div class="m-2" style="width:100%;"></div>



        <div class="row mb-5">
            <div class="col-lg-12">
                <section class="card">
                    <header class="card-header" style="text-align: right">
                        رزرو جلسات

                    </header>
                    <div class="card-body">
                        {{--  <div class="stepy-tab">
                              <ul id="default-titles" class="stepy-titles clearfix">
                                  <li id="default-title-0" class="current-step">
                                      <div>انتخاب پکیج مورد نظر</div>
                                  </li>
                                  <li id="default-title-1" class="">
                                      <div>جزئیات</div>
                                  </li>
                                  --}}{{-- <li id="default-title-2" class="">
                                       <div>انتخاب روز ها</div>
                                   </li>--}}{{--
                              </ul>
                          </div>--}}



                        <form class="form-horizontal" action="{{route('request.finalreserves')}}" id="myForm" method="POST">
                            {{CSRF_FIELD()}}
                            <input type="hidden" name="reserve_id" value="{{$reserve->id}}">
                            <input type="hidden" name="package_id" value="{{$reserve->package_id}}">
                            <input type="hidden" name="start_date" value="{{$reserve->start_date}}">
                            <input type="hidden" name="count_week" value="{{$reserve->count_week}}">
                            <input type="hidden" name="day_type" value="{{$reserve->day_type}}">
                            <input type="hidden" name="branch_id" value="{{$reserve->branch_id}}">
                            <input type="hidden" name="name" value="{{$name}}">
                            <input type="hidden" name="lastname" value="{{$last_name}}">
                            <input type="hidden" name="phonenumber" value="{{$phonenumber}}">




                            {{--
                                            <input type="hidden" name="branch_id" value="{{$reserve->branch_id}}">
                            --}}


                            <header class="panel-heading" style="text-align: center;margin-bottom: 2%;">
                                روزهای پیشنهادی و تکمیل رزرو

                            </header>
                            <div id="errors">

                            </div>
                            <table class="table table-striped border-top" id="sample_1" style="text-align: center">
                                <thead>
                                <tr>
                                    <th style="width: 8px;">
                                        {{--
                                                                               <input name="dates[]" type="checkbox" class="group-checkable"  data-set="#sample_1 .checkboxes" />
                                        --}}
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


                        <div class="m-6"></div>
                    </div>
                </section>
            </div>
        </div>


    </div>

@endsection

@section('footer')
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

        /*
                $(function() {
        */
        // bind 'myForm' and provide a simple callback function
        $('#myForm').on('submit',function (e) {
            e.preventDefault();
            var data=$(this).serialize();
            var type = $(this).attr('method');
            var url = $(this).attr('action');
            $.ajax({
                data:data,
                type:type,
                url:url,
                dataTy:'JSON',
                success:function (data)
                {

                    console.log(data);
                    $('.container').html(data);

                } ,
                error:function (e){
                    /*if(e.responseJSON.hour){
                $('#errors').append(e.responseJSON.hour[0]);
                    }
                    if(e.responseJSON.dates){
                        $('#errors').append( e.responseJSON.dates[0]);

                    }*/
                    $('#errors').html('');
                    $.each(e.responseJSON.errors, function(key,value) {
                        $('#errors').append('<div class="alert alert-danger">'+value+'</div');
                    });

                }
            });
        });
    </script>
@endsection