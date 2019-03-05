@extends('layouts.admin_master_full')

@section('content-header')
    <section class="content-header">
        <div class="pull-left">
         <a href="{{route('admin.report.users')}}" data-toggle="tooltip" title="" class="btn btn-default" data-original-title="بازسازی"><i class="fa fa-refresh"></i></a>
        </div>
        <h1>
سفارشات
        </h1>
        <ol class="breadcrumb">
            <li class="active"><i class="fa fa-users"></i>آخرین رزرو محصولات</li>
        </ol>
    </section>
@endsection

@section('content')
    <section class="content">
{{--
<div class="alert alert-info">سشی</div>
--}}

        <section style="margin-top: 10px">
            <div class="panel panel-default">

                <div class="panel-heading">
                    <h3 class="panel-title"><i class="fa fa-filter"></i> فیلتر</h3>

                </div>
                <div class="panel-body">
                    <form action="{{route('admin.product.reserves.filter')}}" method="post" class="form-horizontal">
                        {{csrf_field()}}

                        <div class="from-group">

                            {{--<div class="col-sm-3">--}}
                            {{--<label class=" control-label" for="search">جستوجو</label>--}}
                            {{--<input class="form-control" name="search" id="search" onkeyup="" value="{{$filter['search']}}" type="text">--}}

                            {{--</div>--}}
                         {{--   <div class="col-sm-3">
                                <label class=" control-label" for="search">جستجو</label>
                                <input class="form-control" name="search" id="search" placeholder="نام"  value="" type="text">
                            </div>--}}

                            <div class="col-sm-3">
                                <label class=" control-label"   for="type">نوع کاربر</label>
                                <select name="type" id="type"  class="select2" style="width: 100%;">
                                    <option value="1">بازدید کننده</option>
                                    <option value="2">کاربر شعبات</option>
                                </select>
                            </div>
                        {{--    <div class="col-sm-2">
                                <label class="control-label" for="category_id">ثبت نام از تاریخ</label>

                                <input id="date_from_observer"  name="date_from"  value="--}}{{--{{$filter['date_from']}}--}}{{--" type="hidden" >
                                <input class="form-control" id="date_from"  value="--}}{{--{{$filter['date_from']}}--}}{{--" >

                            </div>
                            <div class="col-sm-2">

                                <label class="control-label" for="category_id">تا تاریخ</label>

                                <input id="date_to_observer" name="date_to"  value="--}}{{--{{$filter['date_to']}}--}}{{--" type="hidden" >
                                <input class="form-control" id="date_to"  value="--}}{{--{{$filter['date_to']}}--}}{{--" >

                            </div>--}}
                            <div class="col-sm-2">
                                <label for="">&nbsp;&nbsp;&nbsp;</label>
                                <input class="btn btn-primary form-control" type="submit" value="اعمال" >
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

{{--
                    {{method_field('DELETE')}}
--}}
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover" id="example1">
                            <thead>
                            <tr>
                                <td class="text-center" style="max-width: 50px">شماره رزروی</td>
                                <td class="text-center" style="max-width: 50px"> نام</td>
                                <td class="text-center" style="max-width: 50px">نام خانودگی</td>
                                <td class="text-center" style="max-width: 50px">شماره موبایل</td>
                                <td class="text-center" style="max-width: 50px">نام محصول</td>
                                <td class="text-center" style="max-width: 50px">وضعیت</td>
                                <td class="text-center" style="max-width: 50px">نوع کاربر</td>
                                <td class="text-center" style="max-width: 50px">تعداد</td>
                                <td class="text-center" style="max-width: 50px">تاریخ ثبت </td>
                                <td class="text-center" style="max-width: 50px">تاریخ بروزرسانی </td>


                            </tr>
                            </thead>
                            <tbody id="ajx_content_cat">
                            @foreach($product_reserves as $product_reserve)
                                <tr>
                                    <td class="text-center">{{$product_reserve->id}}</td>
                                    <td class="text-center">{{$product_reserve->name}}</td>
                                    <td class="text-center">{{$product_reserve->lastname}}</td>
                                    <td class="text-center">{{$product_reserve->phonenumber}}</td>
                                    <td class="text-center"><a href="{{url('product/')}}/{{$product_reserve->product->category->slug}}/{{$product_reserve->product->slug}}">{{$product_reserve->product->name}}</a></td>
                                    <td class="text-center" data-toggle="modal" data-target="#myModal{{$product_reserve->id}}">@if($product_reserve->status==1) <button class="btn btn-success" type="button">تماس گرفته شده</button>  @else <button class="btn btn-danger" type="button">تماس گرفته نشده</button>  @endif </td>
                                    <td class="text-center">@if($product_reserve->type==1) <button class="btn btn-success" type="button">بازدید کننده</button>  @elseif($product_reserve->type==2) <button class="btn btn-danger" type="button">کاربر شعبات</button> @else @endif </td>
                                    <td class="text-center">{{Convertnumber2english($product_reserve->count)}}</td>
                                    <td class="text-center">{{$product_reserve->date}}</td>
                                    <td class="text-center">{{$product_reserve->u_date}}</td>

                                </tr>



                            <!-- Modal -->
                            <div class="modal fade" id="myModal{{$product_reserve->id}}" role="dialog">
                                <div class="modal-dialog">

                                    <!-- Modal content-->
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title">تغییر وضیعیت سفارش</h4>
                                        </div>
                                        <div class="modal-body">
                                        <form action="{{route('admin.reserves.change')}}" method="POST">
                                            {{csrf_field()}}
                                            <input type="hidden" name="reserve_id" value="{{$product_reserve->id}}">
                                            <select class="form-control" name="status">
                                                <option value="1">تماس گرفته شده</option>
                                                <option value="0">تماس گرفته نشده</option>
                                            </select>
                                            <button class="btn btn-success center-block" style="margin-top: 1%;">ثبت تغییرات</button>
                                        </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">بستن</button>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            @endforeach
                            </tbody>
                        </table>
                    </div>


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
     $('#example1').dataTable({
         bSort: false
     });

    </script>
@stop
