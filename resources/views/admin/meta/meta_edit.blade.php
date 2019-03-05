@extends('layouts.admin_master_full')

@section('content-header')
    <section class="content-header">
        <div class="pull-left">
            <button type="submit" form="form-category" data-toggle="tooltip" title="" class="btn btn-primary" data-original-title="ذخیره"><i class="fa fa-save"></i></button>
            <a href="/admin/menu" data-toggle="tooltip" title="" class="btn btn-default" data-original-title="لغو"><i class="fa fa-reply"></i></a></div>
        <h1>
            منو

        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-bars"></i> وبسایت</a></li>
            <li class="active">ویرایش  منو</li>
        </ol>
    </section>
@endsection

@section('content')

    <section class="content">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-edit"></i>ویرایش منو</h3>
            </div>
            <div class="panel-body">
                <form action="/admin/menu/edit/{{$menu->id}}" enctype="multipart/form-data" class="form-horizontal" method="post"  id="form-category">
                    {{csrf_field()}}
                    {{method_field('PATCH')}}

                    <div class="form-group required">
                        <label class="col-sm-2 control-label" for="name">نام منو</label>
                        <div class="col-sm-6">
                            <input id="name" name="name"  placeholder="نام منو"  class="form-control" type="text" value="{{$menu->name}}">
                            @if($errors->has('name'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="parent_id">والد</label>
                        <div class="col-sm-6">
                            <select name="parent_id" id="parent_id" class="form-control">
                                <option @if($menu->parent_id=='0') selected @endif value="0">پدر</option>
                                @foreach($menus as $menui)
                                    <option @if($menui->id==$menu->parent_id) selected @endif value="{{$menui->id}}">{{$menui->name}}</option>
                                @endforeach
                            </select>
                            @if($errors->has('parent_id'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('link') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group required">
                        <label class="col-sm-2 control-label" for="link">آدرس پیوند</label>
                        <div class="col-sm-8">
                            <input name="link" value="{{$menu->link}}" placeholder="http://www.samsung.com" id="link" class="form-control text-left" style="direction: ltr;" type="text">
                            @if($errors->has('link'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('link') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group required">
                        <label class="col-sm-2 control-label" for="link">تصویر منو</label>
                        <div class="col-sm-3">
                            <input name="avatar" value=""   style="direction: ltr;" type="file" id="imgInp">

                        </div>
                        <div class="col-sm-4">

                            <img id="blah" src="{{$menu->avatar}}" alt="menu avatar" class="img-responsive img-thumbnail" width="400" height="240" />
                        </div>
                    </div>

                </form>

            </div>
        </div>

    </section>

@endsection