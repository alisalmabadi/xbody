@extends('layouts.admin_master_full')

@section('content-header')
    <section class="content-header">
        <div class="pull-left">
            <a href="{{route('admin.order-state.create')}}" data-toggle="tooltip" title="" class="btn btn-primary" data-original-title="افزودن"><i class="fa fa-plus"></i></a> <a href="{{route('admin.order-state.index')}}" data-toggle="tooltip" title="" class="btn btn-default" data-original-title="بازسازی"><i class="fa fa-refresh"></i></a>
            <button type="button" data-toggle="tooltip" title="" class="btn btn-danger" onclick="confirm('آیا مطمئن هستید؟(سفارشات از نوع این وضعیت حذف خواهند شد!)') ? $('#form-category').submit() : false;" data-original-title="حذف"><i class="fa fa-trash-o"></i></button>
        </div>
        <h1>
            وضعیت های سفارش

        </h1>
        <ol class="breadcrumb">

            <li class="active"><i class="fa fa-flag"></i>وضعیت های سفارش</li>
        </ol>
    </section>
@endsection

@section('content')

    <section class="content">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-list"></i> لیست وضعیت ها</h3>
            </div>
            <div class="panel-body">
                <form action="/admin/order-state/destroy" method="post" enctype="multipart/form-data" id="form-category">
                    {{csrf_field()}}
                    {{method_field('DELETE')}}
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <td style="width: 1px;" class="text-center">
                                <input onclick="$('input[name*=\'selected\']').prop('checked', this.checked);" type="checkbox"></td>
                                <td class="text-center"> نام وضعیت</td>
                                <td class="text-center">نوع</td>
                                <td class="text-center">ارسال اس ام اس</td>
                                <td class="text-center">متن اسم ام اس</td>
                                <td class="text-center">عملیات</td>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($order_states as $order_state)
                                <tr>
                                    <td class="text-center">
                                        <input name="selected[]" value="{{$order_state->id}}" type="checkbox">
                                    </td>
                                    <td class="text-center">{{$order_state->name}}</td>
                                    <td class="text-center">{{order_state_types()->where('id','=',$order_state->type_id)->first()->get('name')}}</td>
                                    <td class="text-center" data-toggle="tooltip" title="ارسال اس ام اس در صورت قرار گرفتن در این وضعیت!">{{$order_state->send_sms ? 'بله':'خیر'}}</td>
                                    <td class="text-center">{{$order_state->sms_text}}</td>
                                    <td class="text-center">
                                        <a href="{{route('admin.order-state.edit',$order_state)}}" data-toggle="tooltip" title="ویرایش" class="btn btn-primary" data-original-title="ویرایش"><i class="fa fa-pencil"></i></a>
                                    </td>

                                </tr>
                            @endforeach


                            </tbody>
                        </table>
                    </div>
                </form>

            </div>
        </div>

    </section>

@endsection

