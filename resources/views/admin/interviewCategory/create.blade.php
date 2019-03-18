@extends('layouts.admin_master_full')

@section('content-header')
    <section class="content-header">
        <div class="pull-left">
            <button type="submit" id="submit_button_of_form" form="form-category" data-toggle="tooltip" title="" class="btn btn-primary" data-original-title="ذخیره"><i class="fa fa-save"></i></button>

            <a href="{{route('admin.interviewCategory.index')}}" data-toggle="tooltip" title="" class="btn btn-default" data-original-title="لغو"><i class="fa fa-reply"></i></a></div>
        <h1>
            دسته بندی مصاحبه جدید

        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-globe"></i> مصاحبه ها</a></li>
            <li class="active"><i class="fa fa-plus"></i>دسته بندی مصاحبه جدید </li>
        </ol>
    </section>
@endsection

@section('content')

    <section class="content">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-plus "></i>ایجاد دسته بندی مصاحبه </h3>
            </div>
            <div class="panel-body">
                <form action="{{route('admin.interviewCategory.store')}}" class="form-horizontal" method="post" enctype="multipart/form-data" id="form-category">
                    {{csrf_field()}}
                    <div class="form-group">

                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="title">نام <label style="color:red;">*</label> </label>
                        <div class="col-sm-4">
                            <input id="title" name="name" value="{{old('name')}}" placeholder="نام"  class="form-control" type="text">
                            <label style="color: red;" id="name_error">{{$errors->first('name')}}</label>
                        </div>

                        <label class="col-sm-2 control-label" for="status">نام انگلیسی <label style="color:red;">*</label></label>
                        <div class="col-sm-4">
                            <input id="title" name="slug" value="{{old('slug')}}" placeholder="لطفا فقط کاراکتر انگلیسی وارد کنید، بدون فاصله"  class="form-control" type="text">
                            <label style="color: red;" id="slug_error">{{$errors->first('slug')}}</label>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </section>

@endsection
@section('admin-footer')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
@stop