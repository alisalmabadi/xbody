@extends('layouts.admin_master_full')

@section('content-header')
    <section class="content-header">
        <div class="pull-left">
            <button type="submit" id="submit_button_of_form" form="form-category" data-toggle="tooltip" title="" class="btn btn-primary" data-original-title="ذخیره"><i class="fa fa-save"></i></button>

            <a href="{{route('admin.interview.index')}}" data-toggle="tooltip" title="" class="btn btn-default" data-original-title="لغو"><i class="fa fa-reply"></i></a></div>
        <h1>
            ویرایش مصاحبه

        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-globe"></i> مصاحبه ها</a></li>
            <li class="active"><i class="fa fa-plus"></i>ویرایش مصاحبه </li>
        </ol>
    </section>
@endsection

@section('content')

    <section class="content">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-plus "></i>ویرایش مصاحبه </h3>
            </div>
            <div class="panel-body">
                <form action="{{route('admin.interview.update' , $interview)}}" class="form-horizontal" method="post" enctype="multipart/form-data" id="form-category">
                    {{csrf_field()}}
                    {{method_field('PATCH')}}
                    <div class="form-group">

                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="title">عنوان <label style="color:red;">*</label> </label>
                        <div class="col-sm-4">
                            <input id="title" name="title" value="{{$interview->title}}" placeholder="عنوان"  class="form-control" type="text">
                            <label style="color: red;" id="title_error">{{$errors->first('title')}}</label>
                        </div>

                        <label class="col-sm-2 control-label" for="status">وضعیت <label style="color:red;">*</label></label>
                        <div class="col-sm-4">
                            <select class="select2-arrow" name="status">
                                <option value="">انتخاب کنید</option>
                                <option value="1" @if($interview->status == 1) selected @endif>فعال</option>
                                <option value="0" @if($interview->status == 0) selected @endif>غیر فعال</option>
                            </select>
                            <label style="color: red;" id="status_error">{{$errors->first('status')}}</label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="status">دسته بندی <label style="color:red;">*</label></label>
                        <div class="col-sm-4">
                            <select class="select2-arrow" name="interview_category_id">
                                <option value="">انتخاب کنید</option>
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}" @if($category->id == $interview->interview_category_id) selected @endif>{{$category->name}}</option>
                                @endforeach
                            </select>
                            <label style="color: red;" id="status_error">{{$errors->first('interview_category_id')}}</label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="slug">توضیحات <label style="color:red;">*</label></label>
                        <div class="col-sm-10">
                            <textarea id="text" class="form-control" name="desc">{{$interview->desc}}</textarea>
                            <label style="color: red;" id="desc_error">{{$errors->first('desc')}}</label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="slug">ویدئو<label style="color:red;">*</label></label>
                        <div class="col-sm-4">
                            <textarea class="form-control input_video" rows="10" name="video">{{$interview->video}}</textarea>
                            <label style="color:red;" id="video_error">{{$errors->first('video')}}</label>
                        </div>

                        <label class="col-sm-2 control-label">پیش نمایش ویدئو</label>
                        <div class="col-sm-4 show_video">
                            {{--waiting gif--}}
                            <img class="register_gif" src="{{ asset('gifs/AppleLoading.gif') }}" style="margin-top: 10%;height: 200px;width: 200px;margin-right: 37%;">
                            {{--end of waiting gif--}}
                        </div>

                    </div>

                </form>
            </div>
        </div>
    </section>

@endsection
@section('admin-footer')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>

    {{--namayesh e video--}}
    <script>
        function showVideo() {
            $(".show_video").html('');
            $(".show_video").html($(".input_video").val());
        }

        window.onload = showVideo;


        $(".input_video").bind('input propertychange' , function () {
            $(".show_video").html('');
            $(".show_video").html($(this).val());
        });
    </script>
    {{--end of namayesh e video--}}
@stop