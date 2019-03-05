@extends('layouts.admin_master_full')

@section('content-header')
    <section class="content-header">
        <div class="pull-left">

            <a href="{{route('admin.order.index')}}" data-toggle="tooltip" title="" class="btn btn-default" data-original-title="بازسازی"><i class="fa fa-refresh"></i></a>

        </div>
        <h1>
            گزارشات

        </h1>
        <ol class="breadcrumb">

            <li class="active"><i class="fa fa-first-order"></i>سفارشات</li>
        </ol>
    </section>
@endsection

@section('content')
    <script>
        var OrdrNumber=0;
        var OrdrPrice=0;
    </script>
    <section class="content">
        <section style="margin-top: 10px">
            <div class="panel panel-default">

                <div class="panel-heading">
                    <h3 class="panel-title"><i class="fa fa-filter"></i> فیلتر</h3>

                </div>
                <div class="panel-body">
                    <form action="{{route('admin.report.order')}}" method="post" class="form-horizontal">
                        {{csrf_field()}}
                        <div class="from-group">

                            {{--<div class="col-sm-3">--}}
                            {{--<label class=" control-label" for="search">جستوجو</label>--}}
                            {{--<input class="form-control" name="search" id="search" onkeyup="" value="{{$filter['search']}}" type="text">--}}

                            {{--</div>--}}


                            <div class="col-sm-2">

                                <label class="control-label" for="state">وضعیت</label>

                                <select name="state"  class="select2" id="state" style="width: 100%">
                                    <option value="0" @if($filter['state']==0) selected @endif>همه</option>
                                    @foreach($order_states as $order_state)
                                        <option value="{{$order_state->id}}" @if($filter['state']==$order_state->id) selected @endif>{{$order_state->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-2">

                                <label class="control-label" for="state">مشتری</label>

                                <select name="user"  class="select2" id="state" style="width: 100%">
                                    <option value="0" @if($filter['user']==0) selected @endif>همه</option>
                                    @foreach($users as $user)
                                        <option value="{{$user->id}}" @if($filter['user']==$user->id) selected @endif>{{$user->name.' '.$user->last_name}}</option>
                                    @endforeach
                                </select>
                            </div>


                            <div class="col-sm-2">
                                <label class="control-label" for="category_id">از تاریخ</label>

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
        <section style="margin-top: 10px">
            <div class="panel panel-default">

                <div class="panel-heading">
                    <h3 class="panel-title"><i class="fa fa-list-alt"></i> نتیجه گزارش</h3>

                </div>
                <div class="panel-body">
                    <div class="col-sm-3">
                        <label for="total_count_orders">تعداد سفارشات</label>
                        <span id="total_count_orders"   class="form-control"  style="width: 100%;">{{count($orders)}}</span>
                    </div>
                    <div class="col-sm-3">
                        <label for="total_orders_price">مجموع سفارشات</label>
                        <span id="total_orders_price"   class="price-field form-control"  style="width: 100%;">{{$total_order_price}}</span>
                    </div>

                    <div class="col-sm-3">
                        <label for="total_profit_orders">سود</label>
                        <span id="total_profit_orders"   class="price-field form-control"  style="width: 100%;">{{$total_profit}}</span>
                    </div>


                </div>
            </div>
        </section>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-list"></i>لیست سفارشات</h3>
            </div>
            <div class="panel-body">
                <form action="#" method="post" enctype="multipart/form-data" id="form-category">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>

                                <td class="text-center">شماره سفارش</td>
                                <td class="text-center">مشتری</td>
                                <td class="text-center">تاریخ</td>
                                <td class="text-center" style="width: 150px">وضعیت</td>
                                <td class="text-center">آدرس</td>
                                <td class="text-center">پرداخت</td>
                                <td class="text-center">مبلغ فاکتور<span class="label label-warning" style="margin: 7px;">ریال</span></td>
                                <td class="text-center">سود<span class="label label-sucess" style="margin: 7px;">ریال</span></td>
                                <td class="text-center">هزینه ارسال<span class="label label-warning" style="margin: 7px;">ریال</span></td>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($orders as $order)
                                <tr  class="{{$order->order_state->class}}" >

                                    <td class="text-center">MITO-{{$order->id}}</td>
                                    <td class="text-center"><a href="#" data-toggle="tooltip" title="Tel:{{$order->user->mobile_number}}"  data-original-title="{{$order->user->mobile_number}}">{{$order->user->name.' '.$order->user->last_name}}</a></td>
                                    <td class="text-center">{{$order->created_atp}}</td>
                                    <td class="text-center">
                                        <select disabled name="order_state{{$order->id}}" order_id="{{$order->id}}" class="order_state select2" id="order_state{{$order->id}}" style="width: 100%;">
                                            @foreach($order_states as $order_state)
                                                <option value="{{$order_state->id}}" @if($order_state->id == $order->order_state->id) selected="selected" @endif @if($order_state->type_id==3)  disabled @endif >{{$order_state->name}}</option>
                                            @endforeach
                                        </select>

                                    </td>
                                    <td class="text-center"><a href="" data-toggle="tooltip" title="{{$order->address}}">{{$order->city->name}}</a></td>
                                    <td class="text-center" data-toggle="tooltip" title=" @if(!is_null($order->payment))  @if($order->payment->state==1) {{$order->payment->payment_method->name}}:{{$order->payment->refid}}:({{$order->payment->amount}} ریال )@endif @else   پرداخت نشده   @endif ">@if(!is_null($order->payment))
                                            @if($order->payment->state==1)
                                                <span><i class="fa  fa-check-circle" style="color: green"></i> پرداخت شده</span>
                                            @else
                                                <span><i class="fa fa-info-circle" style="color:orange"></i> پرداخت ناموفق</span>
                                            @endif
                                        @else
                                            <span><i class="fa fa-times-circle" style="color: red"></i> پرداخت نشده</span>
                                        @endif
                                    </td>
                                    <td class="text-center"><span class="price-field">{{$order->total_price}}</span></td>
                                    <td class="text-center"><span class="price-field">{{$order->profit}}</span></td>
                                    <td class="text-center"><span class="price-field">{{$order->delivery->price}}</span></td>


                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </form>

            </div>
        </div>

        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div id="modal-bodyy" class="modal-content">

                </div>

            </div>
        </div>

        <div class="modal fade" id="order_reject_modal" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div id="modal-bodyy" class="modal-content">
                    <div class="modal-header">
                        <button class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">استرداد سفارش</h4>
                    </div>
                    <div class="modal-body">
                        <form id="oreder_reject_form" action="{{route('admin')}}/order/reject" method="post" class="form-horizontal">
                            {{csrf_field()}}
                            <input id="order_id"  type="hidden" name="order_id" value="0">
                            <div class="row">
                                <div class="form-group">
                                    <label for="price" class="col-sm-3 col-sm-offset-1" >مبلغ استرداد</label>
                                    <div class="col-sm-6">
                                        <input  type="text" class="form-control" value="" name="price">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="price" class="col-sm-3 col-sm-offset-1">بازگشت به انبار؟</label>
                                    <div class="col-sm-6">
                                        <label ><input type="radio" name="add_to_store" value="0">خیر</label>
                                        <label ><input type="radio" name="add_to_store" checked value="1">بله</label>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label for="modal_order_state" class="col-sm-3 col-sm-offset-1" >انتخاب وضعیت</label>
                                    <div class="col-sm-6">
                                        <select name="order_state" id="modal_order_state">
                                            @foreach($order_states as $order_state)
                                                @if($order_state->type_id==3)
                                                    <option value="{{$order_state->id}}">{{$order_state->name}}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="price" class="col-sm-3 col-sm-offset-1">توضیحات</label>
                                    <div class="col-sm-6">
                                        <textarea  class="form-control"  name="price"></textarea>
                                    </div>
                                </div>
                            </div>


                        </form>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-danger" data-dismiss="modal">بستن</button>
                        <a href="javascript:;" onclick="$('#oreder_reject_form').submit();" class="btn btn-primary">استرداد</a>
                    </div>
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
@stop