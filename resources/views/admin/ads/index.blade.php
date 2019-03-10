@extends('layouts.admin_master_full')

@section('content-header')
    <section class="content-header">
        <div class="pull-left">
            <a href="{{route('admin.ads.create')}}" data-toggle="tooltip" title="" class="btn btn-primary" data-original-title="افزودن"><i class="fa fa-plus"></i></a> <a href="{{route('admin.ads.index')}}" data-toggle="tooltip" title="" class="btn btn-default" data-original-title="بازسازی"><i class="fa fa-refresh"></i></a>
            <button type="button" data-toggle="tooltip" title="" class="btn btn-danger" onclick="confirm('آیا مطمئن هستید؟') ? $('#form-category').submit() : false;" data-original-title="حذف"><i class="fa fa-trash-o"></i></button>
        </div>
        <h1>
           تبلیغات

        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> وبسایت</a></li>
            <li class="active">تبلیغات</li>
        </ol>
    </section>
@endsection

@section('content')

    <section class="content">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-list"></i> لیست تبلیغات بالای سایت </h3>
            </div>
            <form action="{{route('admin.ads.destroy')}}" method="post" enctype="multipart/form-data" id="form-category">
                {{csrf_field()}}
                {{method_field('DELETE')}}
            <div class="table-responsive">

                <table class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <td style="width: 1px;" class="text-center"><input onclick="$('input[name*=\'selected\']').prop('checked', this.checked);" type="checkbox"></td>
                        <td class="text-center"> نام </td>
                        <td class="text-center">عکس</td>
                        <td class="text-center">لینک</td>

                        <td class="text-center">عملیات</td>
                    </tr>
                    </thead>

            <tbody>

            @foreach($ads as $a)
                    <tr>
                        <td class="text-center">
                            <input name="selected[]" value="{{$a->id}}" type="checkbox">
                        </td>
                        <td class="text-center">{{$a->title}}</td>
 <td class="text-center"><img src="{{url('/')}}/{{$a->image}}" alt="{{$a->alt}}"></td>
                        <td class="text-center">{{$a->url}}</td>
                        <td class="text-center"><a href="{{route('admin.ads.edit',$a)}}" data-toggle="tooltip" title="" class="btn btn-primary" data-original-title="ویرایش"><i class="fa fa-pencil"></i></a></td>


                    </tr>

                @endforeach
            </tbody>
                </table>

{{--
                <form action="{{route('admin.slider.destroy')}}" method="post" enctype="multipart/form-data" id="form-category">
                    {{csrf_field()}}
                    {{method_field('DELETE')}}
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <td style="width: 1px;" class="text-center"><input onclick="$('input[name*=\'selected\']').prop('checked', this.checked);" type="checkbox"></td>
                                <td class="text-center"> نام اسلایدر</td>
                                <td class="text-center">وضعیت</td>
                                <td class="text-center">عملیات</td>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($sliders as $slider )
                                <tr>
                                    <td class="text-center">
                                        <input name="selected[]" value="{{$slider->id}}" type="checkbox">
                                    </td>

                                    <td class="text-center">{{$slider->name}}</td>
                                    <td class="text-center">@if($slider->state=='0') غیرفعال @else  فعال  @endif</td>
                                    <td class="text-center"><a href="{{route('admin.slider.edit',$slider)}}" data-toggle="tooltip" title="" class="btn btn-primary" data-original-title="ویرایش"><i class="fa fa-pencil"></i></a></td>

                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                </form>
--}}
            </div>
            </form>
        </div>

    </section>

@endsection