@extends('layouts.admin_master_full')

@section('content-header')
    <section class="content-header">
        <div class="pull-left">

            <button type="submit" id="submit_button_of_form" form="form-category" data-toggle="tooltip" title="" class="btn btn-primary" data-original-title="ذخیره"><i class="fa fa-save"></i></button>

            <a href="{{route('admin.gallery.index')}}" data-toggle="tooltip" title="" class="btn btn-default" data-original-title="لغو"><i class="fa fa-reply"></i></a></div>
        <h1>
            گالری جدید

        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-globe"></i> گالری</a></li>
            <li class="active"><i class="fa fa-plus"></i>گالری جدید </li>
        </ol>
    </section>
@endsection

@section('content')

    <section class="content">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-plus "></i>ایجاد گالری </h3>
            </div>
            <div class="panel-body">
                <form action="{{route('admin.gallery.update' , $gallery)}}" class="form-horizontal" method="post" enctype="multipart/form-data" id="form-category">
                    {{csrf_field()}}
                    {{method_field('PATCH')}}
                    <div class="form-group">

                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="name">نام <label style="color:red;">*</label> </label>
                        <div class="col-sm-4">
                            <input id="title" name="name" value="{{$gallery->name}}" placeholder="نام"  class="form-control" type="text">
                            <label style="color: red;display: none;" id="name_error">{{$errors->first('name')}}</label>
                        </div>

                        <label class="col-sm-2 control-label" for="slug">نام انگلیسی <label style="color:red;">*</label></label>
                        <div class="col-sm-4">
                            <input id="title" name="slug" value="{{$gallery->slug}}" placeholder="فقط حروف انگلیسی وارد شود, بدون فاصله"  class="form-control" type="text" disabled>
                            <label style="color: red;display: none;" id="slug_error">{{$errors->first('slug')}}</label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="slug">وضعیت <label style="color:red;">*</label></label>
                        <div class="col-sm-2">
                            <select name="status" class="select2 form-control">
                                <option value="1" @if($gallery->status == 1) selected @endif>فعال</option>
                                <option value="0" @if($gallery->status == 0) selected @endif>غیر فعال</option>
                            </select>
                            <label style="color: red;display: none;" id="status_error">{{$errors->first('status')}}</label>
                        </div>

                        <label class="col-sm-2 control-label" for="slug">نوع گالری <label style="color:red;">*</label></label>
                        <div class="col-sm-2">
                            <select name="type" id="select_type" class="select2 form-control">
                                <option id="picture_value" value="0" @if($gallery->type == 0) selected @else disabled @endif>گالری عکس</option>
                                <option id="video_value" value="1" @if($gallery->type == 1) selected @else disabled @endif>گالری ویدئو</option>
                            </select>
                            <label style="color: red;display: none;" id="type_error">{{$errors->first('type')}}</label>
                        </div>

                        <label class="col-sm-2 control-label" for="slug">هدر گالری<label style="color:red;">*</label></label>
                        <div class="col-sm-2">
                            <img src="{{asset($gallery->image_original)}}" style="width: 100px; height: 100px;">
                        </div>
                    </div>

                    <br>
                    <label id="add-file-label" class="form-control label-primary" style="text-align: center;">
                        @if($gallery->type == 0)
                            تصاویر مربوط به این آلبوم
                        @else
                            ویدئو های مربوط به این آلبوم
                        @endif
                    </label>

                    <div class="form-group" id="result-gallery">
                        <table class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <td class="text-center">نام</td>
                                <td class="text-center">نام انگلیسی</td>
                                <td class="text-center">عملیات</td>
                            </tr>
                            </thead>
                            <tbody>

                        @if($gallery->type == 0)

                        @elseif($gallery->type == 1)
                            @foreach($gallery->videos as $video)
                                <tr>
                                    <td class="text-center">{{$video->title}}</td>
                                    <td class="text-center">
                                        <video style="width:10%;" autoplay>
                                            <source src="{{asset($video->video_path)}}">
                                        </video>
                                    </td>
                                    <td class="text-center">
                                        <a class="del_video" href="{{route('admin.gallery.delete_video_from_gallery',['gallery'=>$gallery,'video'=> $video])}}">
                                            <button type="button" class="btn btn-danger">حذف از گالری</button>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                            </tbody>
                        </table>
                    </div>
                </form>
            </div>
        </div>

        {{--waiting gif--}}
        <div class="container-fluid" id="register_wait" style="width: 100%;height: 100%;position: fixed;top: 0;background-color: #0000005c;z-index:5;display: none;">
            <img class="register_gif" src="{{ asset('gifs/AppleLoading.gif') }}" style="margin-top: 10%;height: 200px;width: 200px;margin-right: 37%;">
        </div>
        {{--end of waiting gif--}}

    </section>

@endsection
@section('admin-footer')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>

    {{--Delete video--}}
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
            }
        });


        $(".del_video").on('click' , function(e){
            e.preventDefault();
            Swal.fire({
                title: 'مطمئن هستید?',
                text: "ویدئو انتخاب شده حذف گردد؟",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                cancelButtonText: 'خیر',
                confirmButtonText: 'بله'
            }).then((result) => {
                if (result.value) {
                    Swal.fire(
                        'حذف',
                        'موفقیت آمیز',
                        'success'
                    )
                    /*ajax deleting*/
                    var url = $(this).attr('href');
                    $.get({
                        data:'',
                        url:url,
                        type:'GET',
                        success:function(){
                            location.reload();
                        },
                        error:function(){
                            console.log('errr');
                        }
                    });
                    /*END OF ajax deleting*/
                }
                else{
                    e.preventDefault();
                }
            });
        });
    </script>
    {{--END OF Delete video--}}
@stop