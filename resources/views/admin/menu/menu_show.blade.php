@extends('layouts.admin_master_full')

@section('content-header')
    <section class="content-header">
        <div class="pull-left">
            <a href="/admin/menu/add" data-toggle="tooltip" title="" class="btn btn-primary" data-original-title="افزودن"><i class="fa fa-plus"></i></a> <a href="{{route('admin.menu.index')}}" data-toggle="tooltip" title="" class="btn btn-default" data-original-title="بازسازی"><i class="fa fa-refresh"></i></a>
            <button type="button" data-toggle="tooltip" title="" class="btn btn-danger" onclick="confirm('آیا مطمئن هستید؟') ? $('#form-category').submit() : false;" data-original-title="حذف"><i class="fa fa-trash-o"></i></button>
        </div>
        <h1>
            منو

        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> وبسایت</a></li>
            <li class="active">منو</li>
        </ol>
    </section>
@endsection

@section('content')

    <section class="content">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-list"></i> لیست دسته بندی ها</h3>
            </div>
            <div class="panel-group" id="accordion">
                <label style="display: none;">{{$index = 0}}</label>
                @foreach($menu_names as $menu_name)
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                {{--<li class="list-unstyled pull-left">
                                    <a href="{{route('admin.pluck.destroyListPluck',$pluck_name->name)}}" data-toggle="tooltip" title="" class="btn btn-danger" data-original-title="حذف">حذف همه پلاکها با نام {{$pluck_name->name}}</a>
                                </li>--}}
                                <li data-toggle="collapse" class="list-unstyled pluck-item" data-parent="#accordion" href="#demo{{$index}}">{{$menu_name['name']}}</li>
                            </h4>
                        </div>
                        <div id="demo{{$index}}" class="panel-collapse collapse">
            <div class="panel-body">
                <form action="/admin/menu/delete" method="post" enctype="multipart/form-data" id="form-category">
                    {{csrf_field()}}
                    {{method_field('DELETE')}}
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <td style="width: 1px;" class="text-center"><input onclick="$('input[name*=\'selected\']').prop('checked', this.checked);" type="checkbox"></td>
                                <td class="text-center"> نام دسته بندی</td>
                                <td class="text-center">آدرس پیوند</td>
                                <td class="text-center">عملیات</td>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($menus as $menu )
                                @if($menu->type == $menu_name['id'])
                                <tr>
                                    <td class="text-center">
                                    <input name="selected[]" value="{{$menu->id}}" type="checkbox">
                                    </td>
                                    <td class="text-center">@if($menu->parent_id !='0') @if($menus->find($menus->find($menu->parent_id)->parent_id)) {{$menus->find($menus->find($menu->parent_id)->parent_id)->name}}>@endif  {{$menus->find($menu->parent_id)->name}} >@endif<span style="color:red">{{$menu->name}}</span></td>
                                    <td class="text-center">{{$menu->link}}</td>
                                    <td class="text-center"><a href="/admin/menu/edit/{{$menu->id}}" data-toggle="tooltip" title="" class="btn btn-primary" data-original-title="ویرایش"><i class="fa fa-pencil"></i></a></td>

                                </tr>
                                @endif
                                <label style="display: none;">{{$index = $index+1}}</label>
                            @endforeach

                            </tbody>
                        </table>
                    </div>

                </form>
            </div>
                            @endforeach

        </div>

    </section>

@endsection