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
                            <input id="title" name="name" value="{{old('name')}}" placeholder="نام"  class="form-control" type="text">
                                <label style="color: red;display: none;" id="name_error">{{$errors->first('name')}}</label>
                        </div>

                        <label class="col-sm-2 control-label" for="slug">نام انگلیسی <label style="color:red;">*</label></label>
                        <div class="col-sm-4">
                            <input id="title" name="slug" value="{{old('slug')}}" placeholder="فقط حروف انگلیسی وارد شود, بدون فاصله"  class="form-control" type="text">
                                <label style="color: red;display: none;" id="slug_error">{{$errors->first('slug')}}</label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="slug">وضعیت <label style="color:red;">*</label></label>
                        <div class="col-sm-4">
                            <select name="status" class="select2 form-control">
                                <option value="">انتخاب کنید</option>
                                <option value="1">فعال</option>
                                <option value="0">غیر فعال</option>
                            </select>
                                <label style="color: red;display: none;" id="status_error">{{$errors->first('status')}}</label>
                        </div>

                        <label class="col-sm-2 control-label" for="slug">نوع گالری <label style="color:red;">*</label></label>
                        <div class="col-sm-4">
                            <select name="type" id="select_type" class="select2 form-control">
                                <option id="null_value" value="">انتخاب کنید</option>
                                <option id="picture_value" value="0">گالری عکس</option>
                                <option id="video_value" value="1">گالری ویدئو</option>
                            </select>
                                <label style="color: red;display: none;" id="type_error">{{$errors->first('type')}}</label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="slug">انتخاب عکس برای هدر گالری<label style="color:red;">*</label></label>
                        <div class="col-sm-10">
                            <input type="file" name="image_original" id="image_original" class="form-control">
                                <label style="color: red; display: none;" id="image_original_error">{{$errors->first('image_original')}}</label>
                            <input type="hidden" name="hidden_image_original" id="hidden_image_original">
                        </div>
                    </div>

                    <br>
                    <label id="add-file-label" class="form-control label-primary" style="text-align: center;"></label>
                    <div>
                        <button type="button" class="btn btn-primary" style="display: none;" id="add-new-photo" data-toggle="modal" data-target="#modal_add_gallery_photos"><i class="fa fa-plus"></i></button>
                        <button type="button" class="btn btn-danger" style="display: none;" id="add-new-video"><i class="fa fa-plus"></i></button>
                    </div>

                    <div class="form-group" id="result-gallery">

                    </div>
                </form>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="modal_add_gallery_photos" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <form action="#" method="post" id="frm-modal-gallery-photos">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">عکس جدید</h4>
                        </div>
                        <div class="modal-body">
                            <label>عنوان <label style="color: red;">*</label> </label>
                            <input type="text" class="form-control" id="gallery_photos_title" name="gallery_photos_title" placeholder="عنوان">
                            <label>متنی که در صورت بروز خطا نمایش دهد <label style="color: red;">*</label> </label>
                            <input type="text" class="form-control" id="gallery_photos_alt" name="gallery_photos_alt" placeholder="متنی که در صورت بروز خطا نمایش دهد">
                            <label>تصویر <label style="color: red;">*</label> </label>
                            <div id="div-file">
                                <input type="file" class="form-control" id="gallery_photos_image_original" name="gallery_photos_image_original">
                                <input type="hidden" id="gallery_photos_hidden_image_original">
                                <img class="img_gallery_photo" style="width: 150px; height: 150px;margin-right: 36%;">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">بستن</button>
                            <input type="submit" value="ذخیره" class="btn btn-primary">
                        </div>
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

    <script>
        /*** vase matn e label k taghir kone ***/
        $("#select_type").on('change' , function () {
            $(this).find("#null_value").prop('disabled' , 'disabled');
            if($(this).val() == '0'){
                if($("#result-gallery").is(':empty') != true)
                {
                    Swal.fire({
                        title: 'مطمئن هستید?',
                        text: "تمامی مقادیری که برای گالری ویدئو انتخاب کرده بودید حذف میگردند!",
                        type: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        cancelButtonText: 'خیر',
                        confirmButtonText: 'بله'
                    }).then((result) => {
                        if (result.value) {
                            Swal.fire(
                                'تغییر حالت!',
                                'موفقیت آمیز',
                                'success'
                            )
                        $("#result-gallery").html('');

                        $("#div_select_photos").css('display' , 'block');
                        $("#add-new-photo").css('display' , 'block');
                        $("#div_select_videos").css('display' , 'none');
                        $("#add-new-video").css('display' , 'none');

                        $("#add-file-label").text('');
                        $("#add-file-label").append('<i class="fa fa-arrow-down"></i>' + ' انتخاب تصاویر برای این گالری ' +'<i class="fa fa-arrow-down"></i>');
                        }
                        else{
                            $("#select_type").find("#video_value").prop('selected' , 'selected');
                        }
                    })
                }
                else{
                    $("#div_select_photos").css('display' , 'block');
                    $("#add-new-photo").css('display' , 'block');
                    $("#div_select_videos").css('display' , 'none');
                    $("#add-new-video").css('display' , 'none');

                    $("#add-file-label").text('');
                    $("#add-file-label").append('<i class="fa fa-arrow-down"></i>' + ' انتخاب تصاویر برای این گالری ' +'<i class="fa fa-arrow-down"></i>');
                }
            }
            else if($(this).val() == '1'){
                if($("#result-gallery").is(':empty') != true)
                {
                    Swal.fire({
                        title: 'مطمئن هستید?',
                        text: "تمامی مقادیری که برای گالری تصاویر انتخاب کرده بودید حذف میگردند!",
                        type: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        cancelButtonText: 'خیر',
                        confirmButtonText: 'بله'
                    }).then((result) => {
                        if (result.value) {
                            Swal.fire(
                                'تغییر حالت!',
                                'موفقیت آمیز',
                                'success'
                            )
                        $("#result-gallery").html('');

                        $("#div_select_photos").css('display', 'none');
                        $("#div_select_videos").css('display', 'block');
                        $("#add-new-photo").css('display', 'none');
                        $("#add-new-video").css('display', 'block');

                        $("#add-file-label").text('');
                        $("#add-file-label").append('<i class="fa fa-arrow-down"></i>' + ' انتخاب ویدئوها برای این گالری ' + '<i class="fa fa-arrow-down"></i>');
                        }
                        else{
                            $("#select_type").find("#picture_value").prop('selected' , 'selected');
                        }
                    })
                }
                else{
                    $("#div_select_photos").css('display', 'none');
                    $("#div_select_videos").css('display', 'block');
                    $("#add-new-photo").css('display', 'none');
                    $("#add-new-video").css('display', 'block');

                    $("#add-file-label").text('');
                    $("#add-file-label").append('<i class="fa fa-arrow-down"></i>' + ' انتخاب ویدئوها برای این گالری ' + '<i class="fa fa-arrow-down"></i>');
                }
            }
            else if($(this).val() == ''){
                $("#div_select_photos").css('display' , 'none');
                $("#div_select_videos").css('display' , 'none');
                $("#add-new-photo").css('display' , 'none');
                $("#add-new-video").css('display' , 'none');

                $("#add-file-label").text('');
                $("#add-file-label").append('لطفا نوع گالری را مشخص کنید');
            }
        });
    </script>



{{--Image modal functions--}}
    <script>
        $("#frm-modal-gallery-photos").on('submit' , function (e) {
            e.preventDefault();
            var title = $(this).find("#gallery_photos_title").val();
            var alt = $(this).find("#gallery_photos_alt").val();
            var pic = $(this).find("#gallery_photos_hidden_image_original").val();

            /*validations*/
            if(title == ''){
                alert('لطفا فیلدها را کامل کنید');
                $(this).find("#gallery_photos_title").animate({
                    backgroundColor : 'red'
                } , 1000);
                $(this).find("#gallery_photos_title").animate({
                    backgroundColor : 'white'
                } , 1000);
                return false;
            }
            if(alt == ''){
                alert('لطفا فیلدها را کامل کنید');
                $(this).find("#gallery_photos_alt").animate({
                    backgroundColor : 'red'
                } , 1000);
                $(this).find("#gallery_photos_alt").animate({
                    backgroundColor : 'white'
                } , 1000);
                return false;
            }
            if(pic == ''){
                alert('لطفا عکس انتخاب کنید');
                $(this).find('.img_gallery_photo').animate({
                    backgroundColor : 'red'
                },1000);
                $(this).find('.img_gallery_photo').animate({
                    backgroundColor : 'white'
                },1000);
                $(this).find('#gallery_photos_image_original').animate({
                    backgroundColor : 'red'
                },1000);
                $(this).find('#gallery_photos_image_original').animate({
                    backgroundColor : 'white'
                },1000);
                return false;
            }
            /*end of validation*/

            $("#result-gallery").append('<div class="col-md-9" style="margin-top: 5%;">\n' +
                '                            <div class="row">\n' +
                '                                <label class="col-md-4">عنوان</label>\n' +
                '                                <div class="col-md-8">\n' +
                '                                    <input type="text" name="gallery_photo_title[]" class="form-control" value="'+title+'">\n' +
                '                                </div>\n' +
                '                            </div>\n' +
                '                            <div class="row" style="margin-top: 7%;">\n' +
                '                                <label class="col-md-4">توضیحات</label>\n' +
                '                                <div class="col-md-8">\n' +
                '                                    <input type="text" name="gallery_photo_alt[]" class="form-control" value="'+alt+'">\n' +
                '                                </div>\n' +
                '                            </div>\n' +
                '                        </div>\n' +
                '                        <div class="col-md-3" style="margin-top: 5%;">\n' +
                '                        <input type="text" value="'+pic+'" name="gallery_photo_image_original[]" style="display:block;">\n' +
                '                            <img src="'+pic+'" style="width: 150px; height: 150px;">\n' +
                '                        </div>');

            $(this).find("#gallery_photos_title").val('');
            $(this).find("#gallery_photos_alt").val('');
            $(this).find("#gallery_photos_image_original").val('');
            $(this).find("#gallery_photos_hidden_image_original").val('');
            $(this).find(".img_gallery_photo").attr('src' , '#');

            $("#modal_add_gallery_photos").modal('hide');
        });
    </script>
{{--End of image modal functions--}}



{{--namayesh e aks bedoon e upload--}}
    <script>
        /*** namayesh e tasvire entekhab shode bedoone upload ***/
        function readURL(input) {

            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $(".img_gallery_photo").attr('src' , e.target.result);
                    $("#gallery_photos_hidden_image_original").val(e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#gallery_photos_image_original").change(function() {
            readURL(this);
        });
    </script>
{{--END OF namayesh e aks bedoon e upload--}}



{{--namayesh e video before upload--}}
    <script>
        $(document).on("change", ".file_multi_video:last", function(evt) {
            var $source = $('.video_here:last');
            $source[0].src = URL.createObjectURL(this.files[0]);
            $source.parent()[0].load();
        });
    </script>
{{--END OF namayesh e video before upload--}}



{{--Add new video--}}
    <script>
        $("#add-new-video").on('click' , function () {
            $("#result-gallery").append('<div class="col-md-8" style="margin-top: 5%;">\n' +
                '                            <div class="row">\n' +
                '                                <div class="col-md-12">\n' +
                '                                    <label class="col-md-4">عنوان</label>\n' +
                '                                    <textarea class="form-control video_titles" name="gallery_video_title[]" rows="5"></textarea>\n' +
                '                                </div>\n' +
                '                            </div>\n' +
                '                        </div>\n' +
                '                        <div class="col-md-4" style="margin-top: 5%;">\n' +
                '                            <input type="hidden" value="" name="gallery_video_video_original[]">\n' +
                    '<input type="file" name="gallery_video_video_original[]" class="btn btn-primary file_multi_video" style="width: 92%;t" accept="video/*">'+
                '<video width="400" controls autoplay>\n' +
                '                            <source src="mov_bbb.mp4" id="video_here" class="video_here">\n' +
                '                        </video>\n');
        });
    </script>
{{--END OF Add new video--}}






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


    {{--on load functions--}}
    <script>
        window.onload = doSth;

        function doSth()
        {
            $("#result-gallery").html('');
        }
    </script>
    {{--end of on load functions--}}
@stop