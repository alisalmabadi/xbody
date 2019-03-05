@extends('layouts.admin_master_full')
@section('admin-head')
{{--
    <link href="{{asset('css/sweetalert2.min.css')}}" rel="stylesheet">
--}}

@endsection
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
        <section style="margin-top: 10px">
            <div class="panel panel-default">

                <div class="panel-heading">
                    <h3 class="panel-title"><i class="fa fa-filter"></i> فیلتر</h3>

                </div>
                <div class="panel-body">
                    <form action="{{route('admin.report.site-reservess')}}" method="post" class="form-horizontal">
                        <div class="from-group">

{{csrf_field()}}
                            <div class="col-sm-3">
                                <label class=" control-label" for="search">انتخاب شعبه</label>
                                <select class="form-control" name="id">
                                    <option value="0">همه شعبات</option>
                                    <option value="1">پاسداران</option>
                                    <option value="2">سهروردی</option>
                                    <option value="3">تهرانپارس</option>
                                    <option value="4">فرشته</option>
                                </select>
                            </div>
                            <div class="col-sm-2">
                                <label for="">&nbsp;&nbsp;&nbsp;</label>
                                <input class="btn btn-primary form-control" type="submit" value="اعمال">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>


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
                                <td class="text-center" style="max-width: 50px">شماره مبایل</td>
                                <td class="text-center" style="max-width: 50px">شعبه</td>
                                <td class="text-center" style="max-width: 50px">تاریخ شروع</td>
                                <td class="text-center" style="max-width: 50px">آی دی پکیج</td>
                                <td class="text-center" style="max-width: 50px">روزهای</td>
                                <td class="text-center" style="max-width: 50px">به جز</td>
                                <td class="text-center" style="max-width: 50px">تاریخ روز ها</td>
                                <td class="text-center" style="max-width: 50px">مرحله</td>
                                <td class="text-center" style="max-width: 50px">وضعیت</td>





                            </tr>
                            </thead>
                            <tbody id="ajx_content_cat">
                            @foreach($reserves as $reserve)
                                <tr id="trr" @if($reserve->status==1) data-id="{{$reserve->id}}" @endif>
                                    <td class="text-center">{{$reserve->id}}</td>
                                    <td class="text-center">{{$reserve->name}} {{$reserve->lastname}}  </td>
                                    <td class="text-center">{{$reserve->phonenumber}}</td>
                                    <td class="text-center">{{$reserve->branch->name}}</td>
                                    <td class="text-center">{{$reserve->start_date}}</td>
                                    <td class="text-center">{{$reserve->package_id}}</td>
                                    <td class="text-center">@if($reserve->day_type==1)<button type="button" class="btn btn-success">زوج</button> @elseif($reserve->day_type==2) <button type="button" class="btn btn-success">فرد</button> @elseif($reserve->day_type==3) <button type="button" class="btn btn-success">همه روز ها</button> @endif</td>
                                    <td class="text-center">
                                        @if(count($reserve->days)>0)
                                        <ul >
                                        @foreach($reserve->days as $res)
                                            <li>{{$res->name}}</li>
                                        @endforeach
                                        </ul>
                                            @else
                                        <button class="btn btn-info">ندارد</button>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        @if(count($reserve->ReserveDetails)>0)

                                        <ul>
                                    @foreach($reserve->ReserveDetails as $res)
                                        <li>{{shamsi($res->date)}}</li>
                                    @endforeach
                                        </ul>
                                            @else
                                        <button class="btn btn-default">ثبت نشده</button>

                                        @endif
                                    </td>
                                    <td class="text-center" id="result1">
                                        <div id="resultt">
                                        @if($reserve->stage==1 && $reserve->status==1) <button type="button" class="btn btn-success">دیده شده</button> @elseif($reserve->stage==0 && $reserve->status==1) <button data-id="{{$reserve->id}}" id="seened" type="button" class="btn btn-danger">دیده نشده</button>@else<input type="hidden" value="0" id="notvalid"> @endif
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        @if($reserve->status==1) <button type="button" class="btn btn-success">ثبت شده</button> @else <button type="button" class="btn btn-danger">ثبت نشده</button> @endif
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.28.11/dist/sweetalert2.all.min.js"></script>
{{--
    <script src="https://cdn.jsdelivr.net/npm/promise-polyfill@8/dist/polyfill.js"></script>
--}}



    <script type="text/javascript">



        $(document).ready(function () {
            $('#example1').dataTable();
        });

        $('tr#trr').click(function () {

            const toast = Swal.mixin({
                toast: true,
                position: 'bottom-end',
                showConfirmButton: false,
                timer: 3000
            });
            const select=$(this);
          var id=  $(this).data('id');

            if(id!=null) {
              $.ajax({
                  url: '{{route('admin.report.seenreserve')}}',
                  type: 'POST',
                  data: {id: id, _token: $('meta[name="csrf-token"]').attr('content')},
                  success: function (data) {

                      toast({
                          type: 'success',
                          title: 'رزرو با موفقیت دیده شده علامت زده شد!'
                      });

/*
                      alert($(this).find('td:nth-child(10)').text());
*/
                      select.find('td:nth-child(10)').html('<button id="seened" type="button" class="btn btn-success">دیده شده</button>');

/*
                      $(this).find('td').eq(9).html('<button id="seened" type="button" class="btn btn-success">دیده شده</button>');
*/


                  },
                  error: function (request, er) {
                      alert('error');

                  }
              });
          }
        });



    </script>
@stop
