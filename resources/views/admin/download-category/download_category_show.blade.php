@extends('layouts.admin_master_full')

@section('content-header')
    <section class="content-header">
        <div class="pull-left">
            <a href="{{route('admin.download-category.create')}}" data-toggle="tooltip" title="" class="btn btn-primary" data-original-title="افزودن"><i class="fa fa-plus"></i></a> <a href="{{route('admin.download-category.index')}}" data-toggle="tooltip" title="" class="btn btn-default" data-original-title="بازسازی"><i class="fa fa-refresh"></i></a>
            <button type="button" data-toggle="tooltip" title="" class="btn btn-danger" onclick="confirm('آیا مطمئن هستید؟') ? $('#form-category').submit() : false;" data-original-title="حذف"><i class="fa fa-trash-o"></i></button>
        </div>
        <h1>
          دسته دانلودها

        </h1>
        <ol class="breadcrumb">

            <li class="active"><i class="fa fa-download"></i>دسته دانلودها</li>
        </ol>
    </section>
@endsection

@section('content')

    <section class="content">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-list"></i> لیست دسته دانلود ها</h3>
            </div>
            <div class="panel-body">
                <form action="/admin/download-category/destroy" method="post" enctype="multipart/form-data" id="form-category">
                    {{csrf_field()}}
                    {{method_field('DELETE')}}
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <td style="width: 1px;" class="text-center">
                                <input onclick="$('input[name*=\'selected\']').prop('checked', this.checked);" type="checkbox"></td>
                                <td class="text-center"> نام دسته دانلود</td>
                                <td class="text-center">نوع</td>
                                <td class="text-center">عملیات</td>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($download_categories as $download_category)
                                <tr>
                                    <td class="text-center">
                                        <input name="selected[]" value="{{$download_category->id}}" type="checkbox">
                                    </td>
                                    <td class="text-center">{{$download_category->name}}</td>
                                    <td class="text-center">{{download_types()->where('id','=',$download_category->type_id)->first()->get('name') }}</td>
                                    <td class="text-center">
                                        <a href="{{route('admin.download-category.edit',$download_category)}}" data-toggle="tooltip" title="" class="btn btn-primary" data-original-title="ویرایش"><i class="fa fa-pencil"></i></a>
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

