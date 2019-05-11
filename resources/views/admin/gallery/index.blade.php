@extends('layouts.admin_master_full')

@section('content-header')
    <section class="content-header">
        <div class="pull-left">
            <a href="{{route('admin.gallery.create')}}" data-toggle="tooltip" title="" class="btn btn-primary" data-original-title="افزودن"><i class="fa fa-plus"></i></a> <a href="{{route('admin.gallery.index')}}" data-toggle="tooltip" title="" class="btn btn-default" data-original-title="بازسازی"><i class="fa fa-refresh"></i></a>
            <button type="button" data-toggle="tooltip" title="" class="btn btn-danger" onclick="confirm('آیا مطمئن هستید؟') ? $('#form-category').submit() : false;" data-original-title="حذف"><i class="fa fa-trash-o"></i></button>
        </div>
        <h1>
            نوشته ها

        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-globe"></i> وبسایت</a></li>
            <li class="active"><i class="fa fa-sticky-note"></i>نوشته ها</li>
        </ol>
    </section>
@endsection

@section('content')
    <section class="content">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-list"></i> لیست نوشته ها</h3>
            </div>
            <div class="panel-body">
                <form action="/admin/gallery/destroy" method="post" enctype="multipart/form-data" id="form-category">
                    {{csrf_field()}}

                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <td style="width: 1px;" class="text-center">
                                    <input onclick="$('input[name*=\'selected\']').prop('checked', this.checked);" type="checkbox"></td>
                                <td class="text-center">نام</td>
                                <td class="text-center">فولدر</td>
                                <td class="text-center">تصویر</td>
                                <td class="text-center">توضیحات</td>
                                <td class="text-center">وضعیت</td>
                                <td class="text-center">نوع گالری</td>
                                <td class="text-center">عملیات</td>
                            </tr>
                            </thead>
                            <tbody id="ajx_content_cat">
                            @foreach($galleries as $gallery)
                                <tr>
                                    <td class="text-center">
                                        <input name="selected[]" value="{{$gallery->id}}" type="checkbox">
                                    </td>
                                    <td class="text-center">{{$gallery->name}}</td>
                                    <td class="text-center">{{$gallery->slug}}</td>
                                    <td class="text-center">
                                        <img src="{{asset($gallery->image_original)}}" style="width: 100px; height: 100px;">
                                    </td>
                                    <td class="text-center">{{$gallery->desc}}</td>
                                    <td class="text-center">
                                        @if($gallery->status == 0)
                                            <a href="{{route('admin.gallery.changeStatus' , $gallery)}}"><button class="btn btn-danger" type="button">غیر فعال</button></a>
                                        @else
                                            <a href="{{route('admin.gallery.changeStatus' , $gallery)}}"><button class="btn btn-primary" type="button">فعال</button></a>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        @if($gallery->type == 0)
                                            <label class="label-info">گالری تصویر</label>
                                        @else
                                            <label class="label-primary">گالری ویدئو</label>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <a href="{{route('admin.gallery.edit' , $gallery)}}"><button type="button" class="btn btn-primary"><i class="fa fa-pencil-square-o"></i></button></a>
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

