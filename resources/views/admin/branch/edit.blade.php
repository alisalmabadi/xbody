@extends('layouts.admin_master_full')

@section('content-header')
    <section class="content-header">
        <div class="pull-left">
            <button type="submit" form="form-category" data-toggle="tooltip" title="" class="btn btn-primary" data-original-title="ذخیره"><i class="fa fa-save"></i></button>
            <a href="{{route('admin.branches.index')}}" data-toggle="tooltip" title="" class="btn btn-default" data-original-title="لغو"><i class="fa fa-reply"></i></a></div>
        <h1>
            صفحات

        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-bars"></i> شعبات </a></li>
            <li class="active">ایجاد شعبه جدید</li>
        </ol>
    </section>
@endsection

@section('content')

    <section class="content">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-plus "></i>ایجاد شعبه جدید</h3>
            </div>
            <div class="panel-body">
                <form action="{{route('admin.branches.update' , $branch)}}" class="form-horizontal" method="post" enctype="multipart/form-data" id="form-category">
                    {{csrf_field()}}
                    {{method_field('PATCH')}}
                    <div class="form-group required">
                        <label class="col-sm-2 control-label" for="name">نام</label>
                        <div class="col-sm-6">
                            <input id="name" name="name" value="{{$branch->name}}" placeholder="نام شعبه"  class="form-control" type="text">
                            <label style="color:red">{{$errors->first('name')}}</label>
                        </div>
                    </div>
                    <div class="form-group required">
                        <label class="col-sm-2 control-label" for="name">آی دی واحد</label>
                        <div class="col-sm-6">
                            <input id="title" name="orginal_id" value="{{$branch->orginal_id}}" placeholder=""  class="form-control" type="text" disabled>
                            <label style="color:red">{{$errors->first('orginal_id')}}</label>
                        </div>
                    </div>

                    <div id="description" class="form-group required">
                        <label class="col-sm-2 control-label" for="description">توضیحات</label>
                        <div class="col-sm-9">
                            <textarea id="text" name="description"  placeholder="{{old('desciption')}}"  class="form-control" >{{$branch->description}}</textarea>
                            <label style="color:red">{{$errors->first('description')}}</label>
                        </div>
                    </div>

                    <div id="slugvalid" class="form-group required">
                        <label class="col-sm-2 control-label" for="name">نام مدیر</label>
                        <div class="col-sm-6">
                            <input id="slug" name="manager_name" value="{{$branch->manager_name}}" placeholder="نام مدیر"  class="form-control" type="text" >
                            <label style="color:red">{{$errors->first('manager_name')}}</label>
                        </div>
                    </div>

                    <div id="valid_dec" class="form-group required">
                        <label class="col-sm-2 control-label" for="seo_desc">تلفن</label>
                        <div class="col-sm-6">
                            <input id="slug" name="phone" value="{{$branch->phone}}" placeholder="تلفن"  class="form-control" type="text" >
                            <label style="color:red">{{$errors->first('phone')}}</label>
                        </div>
                    </div>
                    <div id="addr" class="form-group required">
                        <label class="col-sm-2 control-label" for="address">آدرس</label>
                        <div class="col-sm-6">
                            <input id="address" name="address" value="{{$branch->address}}" placeholder="آدرس"  class="form-control" type="text" >
                            <label style="color:red">{{$errors->first('address')}}</label>
                        </div>
                    </div>

                    <div id="page_url_dec" class="form-group required">
                        <label class="col-sm-2 control-label" for="seo_desc">صفحه معرفی شعبه</label>
                        <div class="col-sm-6">
                            <input id="slug" name="page_url" value="{{$branch->page_url}}" placeholder="page URL"  class="form-control" type="text" >
                            <label style="color:red">{{$errors->first('page_url')}}</label>
                        </div>
                    </div>
                    <div id="telegram_id" class="form-group required">
                        <label class="col-sm-2 control-label" for="telegram_id">آی دی تلگرام</label>
                        <div class="col-sm-6">
                            <input id="telegram_id" name="telegram_id" value="@if($branch->social_media){{ json_decode($branch->social_media)->telegram_id}} @endif" placeholder="telegram_id"  class="form-control" type="text">
                            <label style="color:red">{{$errors->first('telegram_id')}}</label>
                        </div>
                    </div>

                    <div id="instagram_id" class="form-group required">
                        <label class="col-sm-2 control-label" for="instagram_id">آی دی اینستاگرام</label>
                        <div class="col-sm-6">
                            <input id="instagram_id" name="instagram_id" value="@if($branch->social_media) {{json_decode($branch->social_media)->instagram_id}} @endif" placeholder="instagram_id"  class="form-control" type="text">
                            <label style="color:red">{{$errors->first('instagram_id')}}</label>
                        </div>
                    </div>

                    <div id="instagram_id" class="form-group required">
                        <label class="col-sm-2 control-label" for="instagram_id">ترتیب</label>
                        <div class="col-sm-6">
                            <input id="instagram_id" name="order_id" value="{{$branch->order_id}}" placeholder=""  class="form-control" type="number">
                            <label style="color:red">{{$errors->first('order_id')}}</label>
                        </div>
                    </div>

                    <div id="instagram_id" class="form-group required">
                        <label class="col-sm-2 control-label" for="instagram_id">مختصات <a href="https://jsfiddle.net/ehLr8ehk/">لیفلت</a> </label>
                        <div class="col-sm-3">
                            <input id="xplace" name="xplace" value="{{$branch->xplace}}" placeholder="xplace"  class="form-control" type="text">
                            <label class="success">
                                مختصات lat
                            </label>
                            <label style="color:red">{{$errors->first('xplace')}}</label>
                        </div>
                        <div class="col-sm-3">
                            <input id="yplace" name="yplace" value="{{$branch->yplace}}" placeholder="yplace"  class="form-control" type="text">
                            <label class="success">
                                مختصات lng
                            </label>
                            <label style="color:red">{{$errors->first('yplace')}}</label>
                        </div>
                    </div>

                    <div id="image_original" class="form-group required">
                        <label class="col-sm-2 control-label" for="seo_desc">تصویر</label>
                        <div class="col-sm-4">
                            <input type="file" name="image_original">
                            <label style="color:red">{{$errors->first('image_original')}}</label>
                        </div>
                        <label class="col-sm-2 control-label" for="image_thumbnail">تصویر قبلی</label>
                        <div class="col-sm-4">
                            <img src="{{asset($branch->image_thumbnail)}}">
                        </div>
                    </div>


                </form>

            </div>
        </div>

    </section>

@endsection
@section('admin-footer')

@stop