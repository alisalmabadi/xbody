@extends('layouts.admin_master_full')

@section('content-header')
    <section class="content-header">
        <div class="pull-left">
            <button type="submit" data-url="{{route('admin.gallery.store_validation')}}" id="btn_form_validation" class="btn btn-primary" data-original-title="ذخیره"><i class="fa fa-save"></i></button>

            <button type="submit" id="submit_button_of_form" form="form-category" data-toggle="tooltip" title="" class="btn btn-primary" data-original-title="ذخیره" style="display: none;"><i class="fa fa-save"></i></button>

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
                <form action="{{route('admin.gallery.store')}}" class="form-horizontal" method="post" enctype="multipart/form-data" id="form-category">
                    {{csrf_field()}}
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
                                <option value="">انتخاب کنید</option>
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


    {{--ajax validation--}}
    <script>
        /*chon ba ajax nemishe file ferestad, pas ye input e hidden amade kardim ke faghat befahmim tooy e filemoon ye chizi hast :D*/
        $('#image_original').on('change', function(){
            $("#hidden_image_original").val('faghat vase inke validation befahme ke aksi vase heder e gallery ferestade shode :D');
        });
        /*end of chon ba ajax nemishe file ferestad, pas ye input e hidden amade kardim ke faghat befahmim tooy e filemoon ye chizi hast :D*/

        $("#btn_form_validation").on('click' , function () {
            /*check kone ke agar image ya video khast befreste, agar null bood ejaze be anjam e baghie karha nade ke karbar natune null befreste*/
            if($("#select_type").val() == '1'){
                /*video*/ /*-*/ /*title*/
                var inputs = $(".video_titles");
                for(var i = 0; i < inputs.length; i++){
                    if(inputs[i].value == ''){
                        Swal.fire(
                            'خطا!',
                            'لطفا تمامی فیلدها را پر کنید',
                            'error'
                        )
                        inputs[i].style.backgroundColor = 'rgba(255, 125, 115, 0.42)';
                        return false;
                    }
                }

                /*video*/ /*-*/ /*video*/
                var inputs2 = $(".file_multi_video");
                for(var i = 0; i < inputs2.length; i++){
                    if(inputs2[i].value == ''){
                        Swal.fire(
                            'خطا!',
                            'لطفا برای تمامی فیلدها ویدئو انتخاب کنید',
                            'error'
                        )
                        inputs2[i].style.backgroundColor = 'rgba(255, 125, 115, 0.42)';
                        return false;
                    }
                }

            }
            /*END OF check kone ke agar image ya video khast befreste, agar null bood ejaze be anjam e baghie karha nade ke karbar natune null befreste*/

            $("#register_wait").css('display' , 'block');
            $("#name_error").css('display' , 'none');
            $("#slug_error").css('display' , 'none');
            $("#status_error").css('display' , 'none');
            $("#type_error").css('display' , 'none');
            $("#image_original_error").css('display' , 'none');

            var data = $("#form-category").serialize();
            var url = $("#btn_form_validation").attr('data-url');
            var type = $("#form-category").attr('method');

            $.ajax({
                data:data,
                url:url,
                type:type,
                success:function () {
                    $("#btn_form_validation").css('display' , 'none');
                    $("#submit_button_of_form").css('display' , 'block');
                    $("#register_wait").css('display' , 'none');
                    $("#submit_button_of_form").trigger('click');
                },
                error:function (error) {
                    console.log(error.responseJSON.errors);
                    if(error.responseJSON.errors.name){
                        $("#name_error").css('display' , 'block');
                        $("#name_error").text(error.responseJSON.errors.name[0]);
                    }
                    if(error.responseJSON.errors.slug){
                        $("#slug_error").css('display' , 'block');
                        $("#slug_error").text(error.responseJSON.errors.slug[0]);
                    }
                    if(error.responseJSON.errors.status){
                        $("#status_error").css('display' , 'block');
                        $("#status_error").text(error.responseJSON.errors.status[0]);
                    }
                    if(error.responseJSON.errors.type){
                        $("#type_error").css('display' , 'block');
                        $("#type_error").text(error.responseJSON.errors.type[0]);
                    }
                    if(error.responseJSON.errors.hidden_image_original){
                        $("#image_original_error").css('display' , 'block');
                        $("#image_original_error").text(error.responseJSON.errors.hidden_image_original[0]);
                    }

                    $("#register_wait").css('display' , 'none');
                }
            });
        });
    </script>
    {{--END OF ajax validation--}}
@stop