@extends('layouts.admin_master_full')

@section('content-header')
    <section class="content-header">
        <div class="pull-left">
            <a href="{{route('admin.interview.create')}}" data-toggle="tooltip" title="" class="btn btn-primary" data-original-title="افزودن"><i class="fa fa-plus"></i></a> <a href="{{route('admin.interview.index')}}" data-toggle="tooltip" title="" class="btn btn-default" data-original-title="بازسازی"><i class="fa fa-refresh"></i></a>
            <button type="button" data-toggle="tooltip" title="" class="btn btn-danger" onclick="confirm('آیا مطمئن هستید؟') ? $('#form-category').submit() : false;" data-original-title="حذف"><i class="fa fa-trash-o"></i></button>
        </div>
        <h1>
            مصاحبه ها

        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-globe"></i> وبسایت</a></li>
            <li class="active"><i class="fa fa-sticky-note"></i>مصاحبه ها</li>
        </ol>
    </section>
@endsection

@section('content')
    <section class="content">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-list"></i> لیست مصاحبه ها</h3>
            </div>
            <div class="panel-body">
                <form action="/admin/interview/destroy" method="post" enctype="multipart/form-data" id="form-category">
                    {{csrf_field()}}

                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <td style="width: 1px;" class="text-center">
                                    <input onclick="$('input[name*=\'selected\']').prop('checked', this.checked);" type="checkbox"></td>
                                <td class="text-center">عنوان</td>
                                <td class="text-center">وضعیت</td>
                                <td class="text-center">توضیحات</td>
                                <td class="text-center">دسته بندی</td>
                                <td class="text-center">پیش نمایش</td>
                                <td class="text-center">عملیات</td>
                            </tr>
                            </thead>
                            <tbody id="ajx_content_cat">
                            @foreach($interviews as $interview)
                                <tr>
                                    <td class="text-center">
                                        <input name="selected[]" value="{{$interview->id}}" type="checkbox">
                                    </td>
                                    <td class="text-center">{{$interview->title}}</td>
                                    <td class="text-center">
                                        @if($interview->status == 0)
                                            <a href="{{route('admin.interview.changeStatus' , $interview)}}"><button type="button" class="btn btn-danger">غیرفعال</button></a>
                                        @else
                                            <a href="{{route('admin.interview.changeStatus' , $interview)}}"><button type="button" class="btn btn-primary">فعال</button></a>
                                        @endif
                                    </td>
                                    <td class="text-center">{{$interview->desc}}</td>
                                    <td class="text-center">{{$interview->category->name}}</td>
                                    <td class="text-center show_video_{{$interview->id}}">
                                        @php echo $interview->video @endphp
                                    </td>
                                    <td class="text-center">
                                        <a href="{{route('admin.interview.edit' , $interview)}}"><button type="button" class="btn btn-primary">ویرایش</button></a>
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

