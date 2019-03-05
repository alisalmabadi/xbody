@extends('layouts.admin_master_full')

@section('content-header')
    <section class="content-header">
        <div class="pull-left">
            <button type="submit" form="form-category" data-toggle="tooltip" title="" class="btn btn-primary" data-original-title="ذخیره"><i class="fa fa-save"></i></button>
            <a href="{{route('admin.download-category.index')}}" data-toggle="tooltip" title="" class="btn btn-default" data-original-title="لغو"><i class="fa fa-reply"></i></a></div>
        <h1>
            دسته دانلود ها

        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-download"></i>دسته دانلود ها</a></li>
            <li class="active"> ویرایش دسته دانلود </li>
        </ol>
    </section>
@endsection

@section('content')
    <section class="content">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-plus "></i>ویرایش دسته دانلود</h3>
            </div>
            <div class="panel-body">
                <form action="{{route('admin.download-category.update',$download_category)}}" class="form-horizontal" method="post" enctype="multipart/form-data" id="form-category">
                    {{csrf_field()}}
                    {{method_field('PATCH')}}
                    <div class="form-group required">
                        <label class="col-sm-2 control-label" for="name">نام دانلود</label>
                        <div class="col-sm-6">
                            <input id="name" name="name" value="{{$download_category->name}}" placeholder="نام دانلود"  class="form-control" type="text">
                        </div>
                    </div>
                    <div class="form-group required">
                        <label class="col-sm-2 control-label" for="type_id">انتخاب عنوان</label>
                        <div class="col-sm-6">
                            <select name="type_id" id="type_id">
                                @foreach(download_types() as $type)
                                    <option value="{{$type->get('id')}}" @if($type->get('id')==$download_category->type_id) selected @endif>{{$type->get('name')}}</option>
                                @endforeach

                            </select>
                        </div>
                    </div>
            <div class="form-group required">
                <label class="col-sm-2 control-label" for="name">توضیحات</label>
                <div class="col-sm-6">
                    <textarea id="desc"  name="desc"  class="form-control">{{$download_category->desc}}</textarea>
                </div>
            </div>
                </form>
            </div>
        </div>

    </section>

@endsection
@section('admin-footer')
    <script type="application/javascript">

        $(document).ready(
            function () {

                $('#lfm').filemanager('file');

            });

    </script>

@stop