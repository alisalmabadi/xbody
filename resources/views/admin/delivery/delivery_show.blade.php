@extends('layouts.admin_master_full')

@section('content-header')
    <section class="content-header">
        <div class="pull-left">
            <a href="{{route('admin.delivery.create')}}" data-toggle="tooltip" title="" class="btn btn-primary" data-original-title="افزودن"><i class="fa fa-plus"></i></a> <a href="{{route('admin.delivery.index')}}" data-toggle="tooltip" title="" class="btn btn-default" data-original-title="بازسازی"><i class="fa fa-refresh"></i></a>
            <button type="button" data-toggle="tooltip" title="" class="btn btn-danger" onclick="confirm('آیا مطمئن هستید؟') ? $('#form-category').submit() : false;" data-original-title="حذف"><i class="fa fa-trash-o"></i></button>
        </div>
        <h1>
            فروش

        </h1>
        <ol class="breadcrumb">

            <li class="active"><i class="fa fa-th"></i>فروش</li>
        </ol>
    </section>
@endsection

@section('content')

    <section class="content">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-list"></i> لیست روش های ارسال ها</h3>
            </div>
            <div class="panel-body">
                <form action="/admin/delivery/destroy" method="post" enctype="multipart/form-data" id="form-category">
                    {{csrf_field()}}
                    {{method_field('DELETE')}}
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <td style="width: 1px;" class="text-center">
                                <input onclick="$('input[name*=\'selected\']').prop('checked', this.checked);" type="checkbox"></td>
                                <td class="text-center"> نام</td>
                                <td class="text-center">هزینه</td>
                                <td class="text-center">وضعیت</td>
                                <td class="text-center">عملیات</td>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($deliveries as $delivery)
                                <tr>
                                    <td class="text-center">
                                        <input name="selected[]" value="{{$delivery->id}}" type="checkbox">
                                    </td>
                                    <td class="text-center">{{$delivery->name}}</td>
                                    <td class="text-center">{{$delivery->price}}</td>
                                    <td class="text-center">{{$delivery->state? 'فعال':'غیر فعال'}}</td>
                                    <td class="text-center">
                                        <a href="{{route('admin.delivery.edit',$delivery)}}" data-toggle="tooltip" title="" class="btn btn-primary" data-original-title="ویرایش"><i class="fa fa-pencil"></i></a>


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

