@extends('layouts.admin_master_full')

@section('content-header')
    <section class="content-header">
        <div class="pull-left">
            <a href="{{route('admin.interviewCategory.create')}}" data-toggle="tooltip" title="" class="btn btn-primary" data-original-title="افزودن"><i class="fa fa-plus"></i></a> <a href="{{route('admin.interviewCategory.index')}}" data-toggle="tooltip" title="" class="btn btn-default" data-original-title="بازسازی"><i class="fa fa-refresh"></i></a>
            <button type="button" data-toggle="tooltip" title="" class="btn btn-danger" onclick="confirm('آیا مطمئن هستید؟') ? $('#form-category').submit() : false;" data-original-title="حذف"><i class="fa fa-trash-o"></i></button>
        </div>
        <h1>
            دسته بندی مصاحبه ها

        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-globe"></i> وبسایت</a></li>
            <li class="active"><i class="fa fa-sticky-note"></i>دسته بندی مصاحبه ها</li>
        </ol>
    </section>
@endsection

@section('content')
    <section class="content">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-list"></i>لیست دسته بندی مصاحبه ها</h3>
            </div>
            <div class="panel-body">
                <form action="/admin/interviewCategory/destroy" method="post" enctype="multipart/form-data" id="form-category">
                    {{csrf_field()}}

                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <td style="width: 1px;" class="text-center">
                                    <input onclick="$('input[name*=\'selected\']').prop('checked', this.checked);" type="checkbox"></td>
                                <td class="text-center">نام</td>
                                <td class="text-center">نام انگلیسی</td>
                                <td class="text-center">عملیات</td>
                            </tr>
                            </thead>
                            <tbody id="ajx_content_cat">
                            @foreach($categories as $category)
                                <tr>
                                    <td class="text-center">
                                        <input name="selected[]" value="{{$category->id}}" type="checkbox">
                                    </td>
                                    <td class="text-center">{{$category->name}}</td>
                                    <td class="text-center">{{$category->slug}}</td>
                                    <td class="text-center">
                                        <a href="{{route('admin.interviewCategory.edit' , $category)}}"><button type="button" class="btn btn-primary">ویرایش</button></a>
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
@section('admin-footer')

@stop

