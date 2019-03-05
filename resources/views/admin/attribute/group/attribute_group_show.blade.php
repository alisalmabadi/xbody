@extends('layouts.admin_master_full')

@section('content-header')
    <section class="content-header">
        <div class="pull-left">
            <a href="{{route('admin.attribute-group.create')}}" data-toggle="tooltip" title="" class="btn btn-primary" data-original-title="افزودن"><i class="fa fa-plus"></i></a> <a href="{{route('admin.attribute-group.index')}}" data-toggle="tooltip" title="" class="btn btn-default" data-original-title="بازسازی"><i class="fa fa-refresh"></i></a>
            <button type="button" data-toggle="tooltip" title="" class="btn btn-danger" onclick="confirm('آیا مطمئن هستید؟') ? $('#form-category').submit() : false;" data-original-title="حذف"><i class="fa fa-trash-o"></i></button>
        </div>
        <h1>
گرو های خصوصیتی
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-store"></i> فروشگاه</a></li>
            <li class="active"><i class="fa fa-object-group" style="padding: 2px;"></i>گرو های خصوصیتی</li>
        </ol>
    </section>
@endsection

@section('content')

    <section class="content">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-list"></i> لیست گرو های خصوصیتی</h3>
            </div>
            <div class="panel-body">
                <form action="/admin/attribute-group/destroy" method="post" enctype="multipart/form-data" id="form-category">
                    {{csrf_field()}}
                    {{method_field('DELETE')}}
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <td style="width: 1px;" class="text-center">
                                <input onclick="$('input[name*=\'selected\']').prop('checked', this.checked);" type="checkbox"></td>
                                <td class="text-center"> نام گروه</td>
                                <td class="text-center">توضیحات</td>
                                <td class="text-center">عملیات</td>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($attribute_groups as $attribute_group)
                                <tr>
                                    <td class="text-center">
                                        <input name="selected[]" value="{{$attribute_group->id}}" type="checkbox">
                                    </td>
                                    <td class="text-center">{{$attribute_group->name}}</td>
                                    <td class="text-center">{{$attribute_group->desc}}</td>
                                    <td class="text-center">
                                        <a href="{{route('admin.attribute-group.edit',$attribute_group)}}" data-toggle="tooltip" title="" class="btn btn-primary" data-original-title="ویرایش"><i class="fa fa-pencil"></i></a>

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

