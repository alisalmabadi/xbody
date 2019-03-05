@extends('layouts.admin_master_full')

@section('content-header')
    <section class="content-header">
        <div class="pull-left">
         <a href="{{route('admin.report.reserves')}}" data-toggle="tooltip" title="" class="btn btn-default" data-original-title="بازسازی"><i class="fa fa-refresh"></i></a>
        </div>
        <h1>
            گزارش رزروها
        </h1>
        <ol class="breadcrumb">
            <li class="active"><i class="fa fa-users"></i>رزروها</li>
        </ol>
    </section>
@endsection

@section('content')
    <section class="content">


{{--
        <section style="margin-top: 10px">
            <div class="panel panel-default">

                <div class="panel-heading">
                    <h3 class="panel-title"><i class="fa fa-filter"></i> فیلتر</h3>

                </div>
                <div class="panel-body">
                    <form action="{{route('admin.report.reserves')}}" method="post" class="form-horizontal">
                        {{csrf_field()}}
                        <div class="from-group">

<div class="col-sm-3">

<label class=" control-label" for="search">جستوجو</label>

<input class="form-control" name="search" id="search" onkeyup="" value="{{$filter['search']}}" type="text">


</div>

                            <div class="col-sm-3">
                                <label class=" control-label" for="search">جستوجو</label>
                                <input class="form-control" name="search" id="search" placeholder="نام"  value="{{$filter['search']}}" type="text">
                            </div>

      <div class="col-sm-3">
                                <label class=" control-label"   for="city">شهر</label>
                                <select name="city" id="city"  class="select2" style="width: 100%;">
                                    <option value="0" @if($filter['city']==0) selected @endif>همه</option>
                                    @foreach($cities as $city)
                                        <option value="{{$city->id}}" @if($filter['city']==$city->id) selected @endif>{{$city->name}}</option>

                                    @endforeach
                                </select>
                            </div>


                            <div class="col-sm-2">
                                <label class="control-label" for="category_id">ثبت نام از تاریخ</label>

                                <input id="date_from_observer"  name="date_from"  value="{{$filter['date_from']}}" type="hidden" >
                                <input class="form-control" id="date_from"  value="{{$filter['date_from']}}" >

                            </div>
                            <div class="col-sm-2">

                                <label class="control-label" for="category_id">تا تاریخ</label>

                                <input id="date_to_observer" name="date_to"  value="{{$filter['date_to']}}" type="hidden" >
                                <input class="form-control" id="date_to"  value="{{$filter['date_to']}}" >

                            </div>
                            <div class="col-sm-2">
                                <label for="">&nbsp;&nbsp;&nbsp;</label>
                                <input class="btn btn-primary form-control" type="submit" value="اعمال" >
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
--}}


        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-list"></i>لیست رزروها</h3>
            </div>
            <div class="panel-body">
                <form action="" method="post" enctype="multipart/form-data" id="form-category">
                    {{csrf_field()}}
                    {{method_field('DELETE')}}
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover" id="example1">
                            <thead>
                            <tr>

                                <td class="text-center" style="max-width: 50px">شماره رزروی</td>
                                <td class="text-center" style="max-width: 50px">نام و خانوادگی</td>
                                <td class="text-center" style="max-width: 50px">نام کاربری</td>
                                <td class="text-center" style="max-width: 50px">شعبه</td>
                                <td class="text-center" style="max-width: 50px">تاریخ شروع</td>
                                <td class="text-center" style="max-width: 50px">آی دی پکیج</td>
                                <td class="text-center" style="max-width: 50px">روزهای</td>
                                <td class="text-center" style="max-width: 50px">به جز</td>
                                <td class="text-center" style="max-width: 50px">تاریخ روز ها</td>
                                <td class="text-center" style="max-width: 50px">وضعیت</td>





                            </tr>
                            </thead>
                            <tbody id="ajx_content_cat">
                            @foreach($reserves as $reserve)
                                <tr>
                                    <td class="text-center">{{$reserve->id}}</td>
                                    <td class="text-center">{{$reserve->user->first_name}} {{$reserve->user->last_name}}  </td>
                                    <td class="text-center">{{$reserve->user->username}}</td>
                                    <td class="text-center">{{$reserve->user->branch}}</td>
                                    <td class="text-center">{{$reserve->start_date}}</td>
                                    <td class="text-center">{{$reserve->package_id}}</td>
                                    <td class="text-center">@if($reserve->day_type==1)<button type="button" class="btn btn-success">زوج</button> @elseif($reserve->day_type==2) <button type="button" class="btn btn-success">فرد</button> @elseif($reserve->day_type==3) <button type="button" class="btn btn-success">همه روز ها</button> @endif</td>
                                    <td class="text-center">
                                        <ul >
                                        @foreach($reserve->days as $res)
                                            <li>{{$res->name}}</li>
                                        @endforeach
                                        </ul>
                                    </td>
                                    <td class="text-center">
                                        <ul>
                                    @foreach($reserve->ReserveDetails as $res)
                                        <li>{{shamsi($res->date)}}</li>
                                    @endforeach
                                        </ul>
                                    </td>
                                    <td class="text-center">
                                        @if($reserve->status==1) <button class="btn btn-success">ثبت شده</button> @else <button class="btn btn-danger">ثبت نشده</button> @endif
                                    </td>

                                </tr>
                            @endforeach

                            <div class="modal fade" id="myModal" role="dialog">
                                <div class="modal-dialog">

                                    <!-- Modal content-->
                                    <div id="modal-bodyy" class="modal-content">

                                    </div>

                                </div>
                            </div>


                            </tbody>
                        </table>
                    </div>
                </form>

            </div>
        </div>

    </section>

@endsection


@section('admin-footer')
    <script>
        $("#date_from").pDatepicker({
            observer: true,
            format: 'YYYY/MM/DD',
            altField: '#date_from_observer'
        });
        $("#date_to").pDatepicker({
            observer: true,
            format: 'YYYY/MM/DD',
            altField: '#date_to_observer'
        });


        $(document).ready(function ()
        {
            $('.select2').select2({
                dir:'rtl',
            });



        });




    </script>
    <script type="text/javascript" src="{{asset('js/jquery.dataTables.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/DT_bootstrap.js')}}"></script>
    <script src="{{asset('js/dynamic-table.js')}}"></script>
    <script type="text/javascript">
        $('#example1').dataTable();
    </script>
@stop
