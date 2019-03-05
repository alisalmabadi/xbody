@extends('layouts.admin_master_full')

@section('content-header')
    <section class="content-header">
        <div class="pull-left">
            <a href="{{route('admin.attribute.create')}}" data-toggle="tooltip" title="" class="btn btn-primary" data-original-title="افزودن"><i class="fa fa-plus"></i></a> <a href="{{route('admin.attribute.index')}}" data-toggle="tooltip" title="" class="btn btn-default" data-original-title="بازسازی"><i class="fa fa-refresh"></i></a>
            <button type="button" data-toggle="tooltip" title="" class="btn btn-danger" onclick="confirm('آیا مطمئن هستید؟') ? $('#form-category').submit() : false;" data-original-title="حذف"><i class="fa fa-trash-o"></i></button>
        </div>
        <h1>
          خصوصیت ها
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-store"></i> فروشگاه</a></li>
            <li class="active"><i class="fa fa-object-ungroup" style="padding: 2px;"></i> خصوصیت ها</li>
        </ol>
    </section>
@endsection

@section('content')

    <section class="content">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-list"></i> لیست  خصوصیت ها</h3>
            </div>
            <div class="panel-body">
                <form action="/admin/attribute/destroy" method="post" enctype="multipart/form-data" id="form-category">
                    {{csrf_field()}}
                    {{method_field('DELETE')}}
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <td style="width: 1px;" class="text-center">
                                    <input onclick="$('input[name*=\'selected\']').prop('checked', this.checked);" type="checkbox"></td>
                                <td class="text-center"> نام  خصوصیت </td>
                                <td class="text-center">نوع</td>
                                <td class="text-center">نام گروه</td>
                                <td class="text-center">عملیات</td>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($attributes as $attribute)
                                <tr>
                                    <td class="text-center">
                                        <input name="selected[]" value="{{$attribute->id}}" type="checkbox">
                                    </td>
                                    <td class="text-center">{{$attribute->name}}</td>
                                    <td class="text-center">{{option_types()->where('id',$attribute->type)->first()['name']}}</td>
                                    <td class="text-center">@foreach($attribute->attribute_groups as $attg){{$attg->name}},@endforeach</td>
                                    <td class="text-center">{{$attribute->desc}}</td>
                                    <td class="text-center">
                                        <a href="{{route('admin.attribute.edit',$attribute)}}" data-toggle="tooltip" title="" class="btn btn-primary" data-original-title="ویرایش"><i class="fa fa-pencil"></i></a>

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

