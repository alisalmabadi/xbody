@extends('layouts.admin_master_full')

@section('content-header')
    <section class="content-header">
        <div class="pull-left">
            <a href="#" data-toggle="modal"   data-target="#new_admin_modal" title="افزودن کابر ادمین" class="btn btn-primary" data-original-title="افزودن"><i class="fa fa-plus"></i></a> <a href="{{route('admin.admin.index')}}" data-toggle="tooltip" title="" class="btn btn-default" data-original-title="بازسازی"><i class="fa fa-refresh"></i></a>

        </div>
        <h1>
            کاربران ادمین

        </h1>
        <ol class="breadcrumb">

            <li class="active"><i class="fa fa-users"></i>ادمین</li>
        </ol>
    </section>
@endsection

@section('content')

    <section class="content">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-list"></i>لیست ادمین ها</h3>
            </div>
            <div class="panel-body">
                <form action="" method="post" enctype="multipart/form-data" id="form-category">
                    {{csrf_field()}}
                    {{method_field('DELETE')}}
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead>
                            <tr>

                                <td class="text-center"> نام</td>
                                <td class="text-center">ایمیل</td>
                                <td class="text-center">عملیات</td>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($admins as $admin)
                                <tr>

                                    <td class="text-center">{{$admin->name}}</td>
                                    <td class="text-center">{{$admin->email}}</td>

                                    <td class="text-center">
                                        <a href="{{route('admin.admin.edit',$admin)}}" data-toggle="modal" data-target="#edit_admin_modal" title="" class="btn btn-primary" data-original-title="ویرایش"><i class="fa fa-pencil"></i></a>
                                    </td>

                                </tr>
                            @endforeach


                            </tbody>
                        </table>
                    </div>
                </form>

            </div>
        </div>

        <div class="modal fade" id="new_admin_modal" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div id="modal-bodyy" class="modal-content">
                    <div class="modal-header">
                        <button class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">کابر مدیر جدید</h4>
                    </div>
                    <div class="modal-body">
                        <form id="admin_reg_form" action="{{route('admin.register')}}" method="post" class="form-horizontal">
                            {{csrf_field()}}

                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-4 control-label">نام</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email" class="col-md-4 control-label">ادرس ایمیل</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label for="password" class="col-md-4 control-label">گذروازه</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control" name="password" required>

                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="password-confirm" class="col-md-4 control-label">تکرار گذروازه</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                </div>
                            </div>

                        </form>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-danger" data-dismiss="modal">بستن</button>
                        <a href="javascript:;" onclick="$('#admin_reg_form').submit();" class="btn btn-primary">افزودن کابر</a>
                    </div>
                </div>

            </div>
        </div>

        <div class="modal fade" id="edit_admin_modal" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div id="modal-bodyy" class="modal-content">

                </div>
            </div>
        </div>


    </section>


@endsection

