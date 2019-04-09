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
                    </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="desc">توضیحات</label>
                            <div class="col-sm-10">
                                <textarea id="text" name="desc">{{$gallery->desc}}</textarea>
                            </div>
                        </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="slug">هدر گالری<label style="color:red;">*</label></label>
                        <div class="col-sm-10">
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
                    @if($gallery->type == 0)
                        <button type="button" class="btn btn-primary" id="add-new-photo"><i class="fa fa-plus"></i></button><br>
                    @else
                        <button type="button" class="btn btn-primary" id="add-new-video"><i class="fa fa-plus"></i></button><br>
                    @endif

                    <div class="form-group" id="result-gallery">
                        @if($gallery->type == 0)
                            <table class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <td class="text-center">عنوان</td>
                                    <td class="text-center">متن خطا</td>
                                    <td class="text-center">تصویر</td>
                                    <td class="text-center">عملیات</td>
                                </tr>
                                </thead>
                                <tbody>

                            @if(!empty($gallery->photos))
                            @foreach($gallery->photos as $image)
                                <tr>
                                    <td class="text-center" id="image_title_{{$image->id}}">{{$image->title}}</td>
                                    <td class="text-center" id="image_alt_{{$image->id}}">{{$image->alt}}</td>
                                    <td class="text-center">
                                        <img id="image_src_{{$image->id}}" src="{{asset($image->image_path)}}" style="width: 200px; height: 200px;">
                                    </td>
                                    <td class="text-center">
                                        <a class="edit_photo" data-id="{{$image->id}}" href="#"><button type="button" class="btn btn-warning">ویرایش تصویر</button></a>

                                        <a class="del_photo" href="{{route('admin.gallery.deletePhotoFromGallery' , ['gallery'=>$gallery , 'photo'=>$image])}}"><button type="button" class="btn btn-danger">حذف از گالری</button></a>
                                    </td>
                                </tr>
                            @endforeach
                            @endif

                        @elseif($gallery->type == 1)
                            <table class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <td class="text-center">نام</td>
                                    <td class="text-center">ویدئو</td>
                                    <td class="text-center">عملیات</td>
                                </tr>
                                </thead>
                                <tbody>
                            @if(!empty($gallery->videos))
                            @foreach($gallery->videos as $video)
                                <tr>
                                    <td class="text-center">{{$video->title}}</td>
                                    <td class="text-center">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <span style="width: 250px; height: 250px;" id="span_show_video_{{$video->id}}">
                                                    @php echo($video->video_path) @endphp
                                                </span>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="col-md-12">برای ویرایش ویدئو, کد مربوطه را کپی کنید</label>
                                                <textarea class="form-control video_path_{{$video->id}}" rows="6">
                                                    {{$video->video_path}}
                                                </textarea>
                                                <a class="edit_video" data-id="{{$video->id}}" href="">
                                                    <button type="button" class="btn btn-warning form-control">ویرایش ویدئو</button>
                                                </a>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <a class="del_video" href="{{route('admin.gallery.delete_video_from_gallery',['gallery'=>$gallery,'video'=> $video])}}">
                                            <button type="button" class="btn btn-danger">حذف از گالری</button>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            @endif
                        @endif
                            </tbody>
                        </table>
                    </div>
                </form>
            </div>
        </div>

        <!-- Modal - add new video -->
        <div class="modal fade" id="modal_add_gallery_videos" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <form action="{{route('admin.gallery.video.add_video' , $gallery)}}" method="post" id="frm-modal-gallery-photos" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">ویدئو جدید</h4>
                        </div>
                        <div class="modal-body">
                            <label>عنوان <label style="color: red;">*</label> </label>
                            <input type="text" class="form-control" id="gallery_videos_title" name="gallery_videos_title" placeholder="عنوان" required="required">
                            <label>ویدئو <label style="color: red;">*</label> </label>
                            <div id="div-file">
                                <textarea class="form-control" id="gallery_videos_video_original" name="gallery_videos_video_original"></textarea>
                                <div class="video_display" style="width: 250px; height: 250px;"></div>
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


        <!-- Modal - add new photo -->
        <div class="modal fade" id="modal_add_gallery_photo" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <form action="{{route('admin.gallery.photo.add_photo' , $gallery)}}" method="post" id="frm-modal-gallery-photos" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">ویدئو جدید</h4>
                        </div>
                        <div class="modal-body">
                            <label>عنوان <label style="color: red;">*</label> </label>
                            <input type="text" class="form-control" id="gallery_photo_title" name="gallery_photo_title" placeholder="عنوان" required="required">
                            <label>متن خطا <label style="color: red;">*</label> </label>
                            <input type="text" class="form-control" id="gallery_photo_alt" name="gallery_photo_alt" placeholder="متن خطا" required="required">
                            <label>ویدئو <label style="color: red;">*</label> </label>
                            <div id="div-file">
                                <input type="file" class="form-control gallery_photo_image_original" id="gallery_photo_image_original" name="gallery_photo_image_original" required="required">
                                <img class="photo_display" id="gallery_photo_img" style="width: 300px; height: 300px;margin-right: 20%;">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">بستن</button>
                            <input type="submit" value="ذخیره" class="btn btn-primary modal_submit_btn">
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- Modal - add new photo -->
        <div class="modal fade" id="modal_edit_gallery_photo" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <form action="{{route('admin.gallery.photo.edit_photo' , $gallery)}}" method="post" id="frm-modal-edit-gallery-photos" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">ویدئو جدید</h4>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" id="edit_gallery_photo_id" name="edit_gallery_photo_id">
                            <label>عنوان <label style="color: red;">*</label> </label>
                            <input type="text" class="form-control" id="edit_gallery_photo_title" name="edit_gallery_photo_title" placeholder="عنوان" required="required">
                            <label>متن خطا <label style="color: red;">*</label> </label>
                            <input type="text" class="form-control" id="edit_gallery_photo_alt" name="edit_gallery_photo_alt" placeholder="متن خطا" required="required">
                            <label>ویدئو <label style="color: red;">*</label> </label>
                            <div id="div-file">
                                <input type="file" class="form-control gallery_photo_image_original" id="edit_gallery_photo_image_original" name="edit_gallery_photo_image_original">
                                <img class="photo_display" id="edit_gallery_photo_img" style="width: 300px; height: 300px;margin-right: 20%;">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">بستن</button>
                            <input type="submit" value="ذخیره" class="btn btn-primary modal_submit_btn">
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


    {{--show video modal and add new one--}}
    <script>
        $("#add-new-video").on('click' , function () {
            $("#modal_add_gallery_videos").modal("show");
        });
    </script>
    {{--END OF show video modal and add new one--}}

    {{--namayesh e video before upload, file--}}
    <script>
        /*$(document).on("change", "#gallery_videos_video_original", function(evt) {
            var $source = $('.video_display');
            $source[0].src = URL.createObjectURL(this.files[0]);
            $source.parent()[0].load();
        });*/
    </script>
    {{--END OF namayesh e video before upload--}}

    {{--namayesh e video before upload, aparat--}}
    <script>
        $(document).on("input", "#gallery_videos_video_original", function() {
            $('.video_display').html($(this).val());
        });
    </script>
    {{--END OF namayesh e video before upload--}}



    {{--Delete photo--}}
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
            }
        });


        $(".del_photo").on('click' , function(e){
            e.preventDefault();
            Swal.fire({
                title: 'مطمئن هستید?',
                text: "تصویر انتخاب شده حذف گردد؟",
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
                        console.log('errr_photo');
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
    {{--END OF Delete photo--}}

    {{--namayesh e aks bedoon e upload--}}
    <script>
        /*** namayesh e tasvire entekhab shode bedoone upload ***/
        function readURL(input) {

            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $(".photo_display").attr('src' , e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $(document).on("change",".gallery_photo_image_original" , function(){
            readURL(this);
        });
    </script>
    {{--END OF namayesh e aks bedoon e upload--}}

    {{--show photo modal and add new one--}}
    <script>
        $("#add-new-photo").on('click' , function () {
            $("#gallery_photo_id").val('');
            $("#gallery_photo_title").val('');
            $("#gallery_photo_alt").val('');
            $("#gallery_photo_img").prop('src' , '');
            $("#modal_add_gallery_photo").modal('show');
        });
    </script>
    {{--END OF show photo modal and add new one--}}


    {{--edit image--}}
    <script>
        $(".edit_photo").on('click' , function (e) {
           e.preventDefault();
           var image_id = $(this).data('id');
            /*baz shodan e modal va meghdar dehi beheshun*/
            $("#edit_gallery_photo_id").val(image_id);
            $("#edit_gallery_photo_title").val($("#image_title_" + image_id).text());
            $("#edit_gallery_photo_alt").val($("#image_alt_" + image_id).text());
            $("#edit_gallery_photo_img").prop('src' , $("#image_src_" + image_id).attr("src"));
            $("#edit_gallery_photo_image_original").val('');
            $("#modal_edit_gallery_photo").modal('show');

        });
    </script>
    {{--end of edit image--}}


    {{--Edit e video--}}
    <script>
        $(".edit_video").on('click' , function (e) {
            e.preventDefault();
            $("#register_wait").css('display' , 'block');
            var vid_id = $(this).data('id');
            var new_video = $(".video_path_" + vid_id).val();
            console.log(new_video);
            var url = "{{route('admin.gallery.edit_video_from_gallery')}}";
            $.ajax({
                data:{'id':vid_id, 'video_path':new_video},
                url:url,
                type:'GET',
                success:function (data) {
                    location.reload();
                    $("#register_wait").css('display' , 'block');
                },
                error:function(){
                    alert('error in editing video');
                    $("#register_wait").css('display' , 'block');
                }
            });
        });
    </script>
    {{--end of Edit e video--}}
@stop