@extends('layouts.admin_master_full')

@section('content-header')
    <section class="content-header">
        <div class="pull-left">
            <a href="{{route('admin.category.create')}}" data-toggle="tooltip" title="" class="btn btn-primary" data-original-title="افزودن"><i class="fa fa-plus"></i></a> <a href="{{route('admin.category.index')}}" data-toggle="tooltip" title="" class="btn btn-default" data-original-title="بازسازی"><i class="fa fa-refresh"></i></a>
            <button type="button" data-toggle="tooltip" title="" class="btn btn-danger" onclick="confirm('آیا مطمئن هستید؟') ? $('#form-category').submit() : false;" data-original-title="حذف"><i class="fa fa-trash-o"></i></button>
        </div>
        <h1>
            دسته بندی

        </h1>
        <ol class="breadcrumb">

            <li class="active"><i class="fa fa-th"></i>دسته بندی</li>
        </ol>
    </section>
@endsection

@section('content')

    <section class="content">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-list"></i> لیست دسته بندی ها</h3>
            </div>
            <div class="panel-body">
                <form action="/admin/category/destroy" method="post" enctype="multipart/form-data" id="form-category">
                    {{csrf_field()}}
                    {{method_field('DELETE')}}
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <td style="width: 1px;" class="text-center">
                                <input onclick="$('input[name*=\'selected\']').prop('checked', this.checked);" type="checkbox"></td>
                                <td class="text-center"> نام دسته بندی</td>
                                <td class="text-center">آدرس پیوند</td>
                                <td class="text-center">عملیات</td>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($categories as $category)
                                <tr>
                                    <td class="text-center">
                                        <input name="selected[]" value="{{$category->id}}" type="checkbox">
                                    </td>
                                    <td class="text-center">{{$category->name}}</td>
                                    <td class="text-center">{{route('home')}}/category/{{$category->slug}}</td>
                                    <td class="text-center">
                                        <a href="{{route('admin.category.edit',$category)}}" data-toggle="tooltip" title="" class="btn btn-primary" data-original-title="ویرایش"><i class="fa fa-pencil"></i></a>
                                        {{--<a href="{{route('admin.post.create_bay_cat',$category)}}" data-toggle="tooltip" title="" class="btn btn-success" data-original-title="افزودن پست"><i class="fa fa-sticky-note-o"></i></a>
                                        <a href="{{route('admin.post.show_bay_cat',$category)}}" data-toggle="tooltip" title="" class="btn btn-warning" data-original-title="نمایش پست ها"><i class="fa fa-eye"></i></a>--}}
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

