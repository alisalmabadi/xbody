@extends('layouts.admin_master_full')

@section('content-header')
    <section class="content-header">
        <div class="pull-left">
            <a href="{{route('admin.branches.create')}}" data-toggle="tooltip" title="" class="btn btn-primary" data-original-title="افزودن"><i class="fa fa-plus"></i></a> <a href="{{route('admin.branches.index')}}" data-toggle="tooltip" title="" class="btn btn-default" data-original-title="بازسازی"><i class="fa fa-refresh"></i></a>
            <button type="button" data-toggle="tooltip" title="" class="btn btn-danger" onclick="confirm('آیا مطمئن هستید؟') ? $('#form-category').submit() : false;" data-original-title="حذف"><i class="fa fa-trash-o"></i></button>
        </div>
        <h1>
            شعبات

        </h1>
        <ol class="breadcrumb">

            <li class="active"><i class="fa fa-image"></i>شعبات</li>
        </ol>
    </section>
@endsection

@section('content')

    <section class="content">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-list"></i> لیست شعبات</h3>
            </div>
            <div class="panel-body">
                <form action="/admin/branches/destroy" method="post" enctype="multipart/form-data" id="form-category">
                    {{csrf_field()}}
                    {{method_field('DELETE')}}
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <td style="width: 1px;" class="text-center">
                                    <input onclick="$('input[name*=\'selected\']').prop('checked', this.checked);" type="checkbox"></td>
                                <td class="text-center">نام</td>
                                <td class="text-center">آدرس</td>
                                <td class="text-center">نام مدیر</td>
                                <td class="text-center">تلفن</td>
                                <td class="text-center">تصویر</td>
                                <td class="text-center">ادرس</td>
                                <td class="text-center">عملیات</td>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($branches as $branch)
                                <tr>
                                    <td class="text-center">
                                        <input name="selected[]" value="{{$branch->id}}" type="checkbox">
                                    </td>
                                    <td class="text-center">{{$branch->name}}</td>
                                    <td class="text-center">{{$branch->address}}</td>
                                    <td class="text-center">{{$branch->manager_name}}</td>
                                    <td class="text-center">{{$branch->phone}}</td>
                                    <td class="text-center">
                                        <img src="{{asset($branch->image_original)}}" style="width: 100px;height:100px;">
                                    </td>
                                    <td class="text-center">{{$branch->page_url}}</td>
                                    <td class="text-center">
                                        <a href="{{route('admin.branches.edit' , $branch)}}"><button type="button" class="btn btn-primary"><i class="fa fa-pencil-square-o"></i></button></a>
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

