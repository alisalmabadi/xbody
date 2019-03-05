@extends('layouts.admin_master_full')

@section('content-header')
    <section class="content-header">
        <div class="pull-left">
            <button type="submit" form="form-category" data-toggle="tooltip" title="" class="btn btn-primary" data-original-title="ذخیره"><i class="fa fa-save"></i></button>
            <a href="{{route('admin.post.index')}}" data-toggle="tooltip" title="" class="btn btn-default" data-original-title="لغو"><i class="fa fa-reply"></i></a></div>
        <h1>
           ویرایش نوشته

        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-globe"></i> وبسایت</a></li>
            <li class="active"><i class="fa fa-sticky-note"></i>نوشته ها</li>
            <li class="active"><i class="fa fa-pencil"></i> ویرایش نوشته</li>
        </ol>
    </section>
@endsection

@section('content')

    <section class="content">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-plus "></i>ایجاد نوشته جدید</h3>
            </div>
            <div class="panel-body">
                <form action="{{route('admin.post.update',$post)}}" class="form-horizontal" method="post" enctype="multipart/form-data" id="form-category">
                    {{csrf_field()}}
                    {{method_field('PATCH')}}
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="post_type">موقعیت</label>
                        <div class="col-sm-4">
                            <label class="radio-inline"><input @if($post->post_type==1) checked @endif  type="radio" value="1" name="post_type">صفحه اصلی</label>
                            <label class="radio-inline"><input @if($post->post_type==2) checked @endif type="radio" name="post_type" value="2">دسته ها</label>
                            <label class="radio-inline"><input @if($post->post_type==3) checked @endif type="radio" name="post_type" value="3">محصولات</label>
                        </div>
                        <label class="col-sm-1 control-label" for="resource_id">برای</label>
                        <div class="col-sm-4">
                            <select  name="resource_id" id="resource_id" class="form-control typesel" >

                            </select>

                        </div>
                    </div>
                    <div class="form-group">

                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="type">نوع پست</label>
                        <div class="col-sm-4">
                            <select name="type" id="type" class="form-control typesel" >
                                <option @if($post->type==1) selected @endif value="1">متن</option>
                                <option @if($post->type==2) selected @endif value="2">متن و عکس(متن راست)</option>
                                <option @if($post->type==3) selected @endif value="3">متن و عکس(متن چپ)</option>
                                <option @if($post->type==4) selected @endif value="4">متن و ویدو(متن راست)</option>
                                <option @if($post->type==5) selected @endif value="5">متن و ویدو(متن چپ)</option>
                                <option @if($post->type==6) selected @endif value="6">عکس تکی</option>
                                <option @if($post->type==7) selected @endif value="7">عکس با عنوان</option>
                                <option @if($post->type==8) selected @endif value="8">ویدیو تکی</option>
                                <option @if($post->type==9) selected @endif value="9">ویدیو دوتایی</option>
                                <option @if($post->type==10) selected @endif value="10">اطلاعات کالا ها</option>
                                <option  @if($post->type==11) selected @endif value="11">اطلاعات کامل متن</option>
                                <option  @if($post->type==12) selected @endif value="12">اطلاعات کامل عکس</option>
                            </select>

                        </div>
                        <label class="col-sm-1  control-label" for="order">ترتیب</label>
                        <div class="col-sm-4">
                            <input id="order" name="order" value="{{$post->order}}" placeholder="یک عدد منفی یا مثبت "  class="form-control" type="text">

                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="title">عنوان</label>
                        <div class="col-sm-4">
                            <input id="title" name="title" value="{{$post->title}}" placeholder="عنوان"  class="form-control" type="text">

                        </div>
                        <label class="col-sm-1 control-label" for="link">لینک</label>
                        <div class="col-sm-4">
                            <input id="link" name="link" value="{{$post->link}}" placeholder="لنیک اختیاری برای زمان کلیک روی پست"  class="form-control" type="text">

                        </div>


                    </div>
                    <div class="form-group ">

                        <label class="col-sm-2 control-label" for="name">دکمه خرید</label>
                        <div class="input-group col-sm-6"> <span class="input-group-addon">
                            <input @if($post->button_sell) checked @endif name="button_sell" id="button_sell" type="checkbox" >
                            </span>

                            <input name="button_sell_url" style="direction: ltr" id="button_sell_url" value="{{$post->button_sell_url}}" type="text" class="form-control" placeholder="لینک دکمه خرید وارد شود.">
                        </div>

                        <label class="col-sm-2 control-label" for="name">دکمه بیشتر</label>
                        <div class="input-group col-sm-6"> <span class="input-group-addon">
                            <input @if($post->button_more) checked @endif name="button_more" id="button_more" type="checkbox" >
                            </span>

                            <input name="button_more_url" style="direction: ltr" id="button_more_url" type="text" value="{{$post->button_more_url}}" class="form-control" placeholder="لینک دکمه بیشتر وارد شود.">
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-sm-2 col-sm-offset-4">
                            <button type="button" class="btn btn-primary btn-block fileManager" data-url="{{route('home')}}/image-manager" data-multi="true">نمایش گالری</button>
                        </div>
                    </div>
                    <div id="txt_area" class="form-group required">
                        @if($post->type !=10)
                            <label class="col-sm-2 control-label" for="name">متن</label>
                            <div class="col-sm-9">
                                <textarea id="text" name="text"  placeholder="متن"  class="form-control" >
                                    {{$post->text}}
                                </textarea>

                            </div>
                        @endif


                    </div>

                    <div id="type_preload" class="form-group">



                    </div>
                </form>

            </div>
        </div>

    </section>

@endsection
@section('admin-footer')
    <script type="application/javascript">
        $('.typesel').select2();
        var content=$('#type_preload');
        var post_for={{$post->resource_id}};

        html_txt='<label class="col-sm-2 control-label" for="name">متن</label><div class="col-sm-9"><textarea id="text" name="text"  placeholder="متن"  class="form-control" type="text" ></textarea> </div>';
        var type;
        function readURL(input) {
            var d_id='#'+$(input).attr('d-id');
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $(d_id).attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }
        $('input[type=radio][name=post_type]').change(function() {
            type=$(this).val();

            $.ajax({
                url: '{{route('admin.post.get_post_type')}}',
                dataType: 'json',
                type: 'POST',
                data: {"post_type":type},
                success: function(response) {
                    $('#resource_id').empty();
                    $.each(response, function(i, obj) {



                        $('#resource_id').append('<option  value="'+obj.id+'" >'+obj.name+'</option>');
                    });
                    $('.typesel').select2();

                },
                error: function(x, e) {

                }

            });

        });
        var info_row=0;

        function add_info() {

            html  = '<tr id="image-row' + info_row + '">';
            html += '  <td class="text-center">';
            html += '</span><input type="text" name="info[' + info_row + '][title]" value="" placeholder="عنوان" class="form-control" />';
            html += '  </td>';
            html += '  <td class="text-center">';
            html += '</span><input type="text" name="info[' + info_row + '][text]" value="" placeholder="متن یا مقدار " class="form-control" />';
            html += '  </td>';

            html += '<td class="text-center" ><div class="ImageManager"><img  style="max-width:80px;" src="{{route('home')}}/image-manager/view/1/thumb" class="imageManagerImage"><br><br><button class="fileManager btn btn-primary" type="Button" data-url="{{route('home')}}/image-manager" data-multi="false">انتخاب آیکون</button><input class="inputFile" name="info[' + info_row + '][icon]" value="1" type="hidden"></div></td>';

            html += '  <td class="text-center"width="70px">';
            html+='<select type="text" id="info_type_'+info_row+'" name="info[' + info_row + '][type]"> <option value="1">متن</option> <option value="2">متن و آیکون</option></select></td>';
            html += '  <td class="text-center" ><button type="button" onclick="$(\'#image-row' + info_row  + '\').remove();" data-toggle="tooltip" title="" class="btn btn-danger"><i class="fa fa-minus-circle"></i></button></td>';
            html += '</tr>';

            $('#infos tbody').append(html);
            $("#info_type_"+info_row).select2();

            info_row++;



            $(document).on('click', '.fileManager', function() {
                var $this = $(this);
                window.ImageManagerCaller = $this;
                $.colorbox({
                    href: $this.data('url'),
                    open: true,
                    width: '100%',
                    height: '100%',
                    onComplete: function() {
                        window.ImageManager.initPopUp();
                    }
                });
            });

        }
        $('#type').change(function(){

            var content=$('#type_preload');
            var mode=this.value;

            switch(mode)
            {
                case '1':
                    content.empty();
                    $('#txt_area').empty();
                    $('#txt_area').append(html_txt);
                    CKEDITOR.replace( 'text' );
                    break;
                case '2':
                    content.empty();
                    $('#txt_area').empty();
                    $('#txt_area').append(html_txt);
                    CKEDITOR.replace( 'text' );
                    html='';
                    html=' <label class="col-sm-2 control-label" for="link">عکس</label>';
                    html +='<div class="col-sm-1">';
                    html += '<td class="text-center"><div class="ImageManager"><img src="{{route('home')}}/image-manager/view/1/thumb" class="imageManagerImage"><br><br><button class="fileManager btn btn-primary" type="Button" data-url="{{route('home')}}/image-manager" data-multi="false">انتخاب عکس </button><input class="inputFile" name="media_url1" value="1" type="hidden"></div></td>';
                    html +=' </div>';
                    html +=' </div>';
                    content.append(html);
                    $(".imgInp").change(function() {
                        readURL(this);
                    });
                    break;
                case '3':
                    content.empty();
                    $('#txt_area').empty();
                    $('#txt_area').append(html_txt);
                    CKEDITOR.replace( 'text' );
                    html='';
                    html=' <label class="col-sm-2 control-label" for="link">عکس</label>';
                    html +='<div class="col-sm-1">';
                    html += '<td class="text-center"><div class="ImageManager"><img src="{{route('home')}}/image-manager/view/1/thumb" class="imageManagerImage"><br><br><button class="fileManager btn btn-primary" type="Button" data-url="{{route('home')}}/image-manager" data-multi="false">انتخاب عکس </button><input class="inputFile" name="media_url1" value="1" type="hidden"></div></td>';
                    html +=' </div>';
                    html +=' </div>';
                    content.append(html);
                    $(".imgInp").change(function() {
                        readURL(this);
                    });
                    break;
                case '4':
                    content.empty();
                    $('#txt_area').empty();
                    $('#txt_area').append(html_txt);
                    CKEDITOR.replace( 'text' );
                    html='';
                    html='<div class="form-group">';
                    html+=' <label class="col-sm-2 control-label" for="media_url1">کد ویدیو</label>';
                    html+='<div class="col-sm-4">';
                    html+='<input id="media_url1" name="media_url1" value="" placeholder="کد ویدو اپلود شده در آپارات"  class="form-control" type="text">';
                    html+=' </div>';
                    html+=' </div>';

                    content.append(html);

                    break;
                case '5':
                    $('#txt_area').empty();
                    $('#txt_area').append(html_txt);
                    CKEDITOR.replace( 'text' );
                    content.empty();
                    html='';
                    html='<div class="form-group">';
                    html+=' <label class="col-sm-2 control-label" for="media_url1">کد ویدیو</label>';
                    html+='<div class="col-sm-4">';
                    html+='<input id="media_url1" name="media_url1" value="" placeholder="کد ویدو اپلود شده در آپارات"  class="form-control" type="text">';
                    html+=' </div>';
                    html+=' </div>';

                    content.append(html);
                    break;
                case '6':
                    content.empty();
                    $('#txt_area').empty();
                    html='';
                    html='<label class="col-sm-2 control-label" for="link">عکس</label>';
                    html +='<div class="col-sm-1">';
                    html += '<td class="text-center"><div class="ImageManager"><img src="{{route('home')}}/image-manager/view/1/thumb" class="imageManagerImage"><br><br><button class="fileManager btn btn-primary" type="Button" data-url="{{route('home')}}/image-manager" data-multi="false">انتخاب عکس </button><input class="inputFile" name="media_url1" value="1" type="hidden"></div></td>';
                    html +='</div>';
                    content.append(html);

                    break;
                case '7':
                    content.empty();
                    $('#txt_area').empty();
                    html='';
                    html=' <label class="col-sm-2 control-label" for="link">عکس</label>';
                    html +='<div class="col-sm-1">';
                    html += '<td class="text-center"><div class="ImageManager"><img src="{{route('home')}}/image-manager/view/1/thumb" class="imageManagerImage"><br><br><button class="fileManager btn btn-primary" type="Button" data-url="{{route('home')}}/image-manager" data-multi="false">انتخاب عکس </button><input class="inputFile" name="media_url1" value="1" type="hidden"></div></td>';
                    html +=' </div>';
                    html +=' </div>';
                    content.append(html);

                    break;
                case '8':
                    content.empty();
                    $('#txt_area').empty();
                    html='';
                    html='<div class="form-group">';
                    html+=' <label class="col-sm-2 control-label" for="media_url1">کد ویدیو</label>';
                    html+='<div class="col-sm-4">';
                    html+='<input id="media_url1" name="media_url1" value="" placeholder="کد ویدو اپلود شده در آپارات"  class="form-control" type="text">';
                    html+=' </div>';
                    html+=' </div>';
                    content.append(html);

                    break;
                case '9':
                    content.empty();
                    $('#txt_area').empty();
                    html='';
                    html='<div class="form-group">';
                    html+='<label class="col-sm-2 control-label" for="media_url1">کد ویدیو(راست)</label>';
                    html+='<div class="col-sm-9">';
                    html+='<input id="media_url1" name="media_url1" value="" placeholder="کد ویدو اپلود شده در آپارات"  class="form-control" type="text">';
                    html+='</div>';
                    html+='<label class="col-sm-2 control-label" for="media_url1">کد ویدیو(چپ)</label>';
                    html+='<div class="col-sm-9">';
                    html+='<input id="media_url1" name="media_url2" value="" placeholder="کد ویدو اپلود شده در آپارات"  class="form-control" type="text">';
                    html+='</div>';
                    html+='</div>';
                    content.append(html);
                    break;
                case '10':
                    content.empty();
                    $('#txt_area').empty();
                    html='';
                    html+='<label class="col-sm-2 control-label" for="media_url1">ورود اطلاعات</label>';
                    html+='<table id="infos" class="table table-striped table-bordered table-hover ">';
                    html+='<thead>';
                    html+='<tr>';
                    html+='<td class="text-center active">عنوان</td>';
                    html+='<td class="text-center active">متن</td>';
                    html+='<td class="text-center active">آیکون</td>';
                    html+='<td class="text-center active">نوع</td>';
                    html+='<td class="text-center active">عملیات</td>';
                    html+='</tr>';
                    html+='</thead>';
                    html+='<tbody>';
                    html+='</tbody>';
                    html+='<tfoot>';
                    html+='<tr>';
                    html+='<td colspan="3"></td>';
                    html+='<td class="text-left"><button type="button" onclick="add_info();" data-toggle="tooltip" title="" class="btn btn-primary" data-original-title="افزودن "><i class="fa fa-plus-circle"></i></button></td>';
                    html+='</tr>';
                    html+='</tfoot>';
                    html+='</table>';

                    content.append(html);
                    break;
                    
                case '11':
                    content.empty();
                    $('#txt_area').empty();
                    $('#txt_area').append(html_txt);
                    CKEDITOR.replace( 'text' );
                    break;
                case '12':
                    content.empty();
                    $('#txt_area').empty();
                    html='';
                    html='<label class="col-sm-2 control-label" for="link">عکس</label>';
                    html +='<div class="col-sm-1">';
                    html += '<td class="text-center"><div class="ImageManager"><img src="{{route('home')}}/image-manager/view/1/thumb" class="imageManagerImage"><br><br><button class="fileManager btn btn-primary" type="Button" data-url="{{route('home')}}/image-manager" data-multi="false">انتخاب عکس </button><input class="inputFile" name="media_url1" value="1" type="hidden"></div></td>';
                    html +='</div>';
                    content.append(html);






            }


            $(document).on('click', '.fileManager', function() {
                var $this = $(this);
                window.ImageManagerCaller = $this;
                $.colorbox({
                    href: $this.data('url'),
                    open: true,
                    width: '100%',
                    height: '100%',
                    onComplete: function() {
                        window.ImageManager.initPopUp();
                    }
                });
            });

        });

        $(document).ready(function () {
            type=$('input[type=radio][name=post_type]:checked').val();
            $.ajax({
                url: '{{route('admin.post.get_post_type')}}',
                dataType: 'json',
                type: 'POST',
                data: {"post_type":type},
                success: function(response) {
                    $('#resource_id').empty();
                    $.each(response, function(i, obj) {
                        var forcheck='';

                        if(obj.id==post_for)
                        {
                            forcheck='selected';
                        }
                        $('#resource_id').append('<option '+forcheck+' value="'+obj.id+'">'+obj.name+'</option>');
                    });
                    $('.typesel').select2();

                },
                error: function(x, e) {

                }

            });


            var mode=$('#type').val();

            switch(mode)
            {
                case '1':
                    content.empty();
                    break;
                case '2':
                    content.empty();
                    html=' <label class="col-sm-2 control-label" for="link">عکس</label>';
                    html +='<div class="col-sm-1">';
                    html += '<td class="text-center"><div class="ImageManager"><img src="{{route('showthumb',$post->media_url1)}}" class="imageManagerImage"><br><br><button class="fileManager btn btn-primary" type="Button" data-url="{{route('home')}}/image-manager" data-multi="false">انتخاب عکس </button><input class="inputFile" name="media_url1" value="{{$post->media_url1}}" type="hidden"></div></td>';
                    html +=' </div>';
                    html +=' </div>';
                    content.append(html);
                    $(".imgInp").change(function() {
                        readURL(this);
                    });
                    break;
                case '3':
                    content.empty();
                    html=' <label class="col-sm-2 control-label" for="link">عکس</label>';
                    html +='<div class="col-sm-1">';
                    html += '<td class="text-center"><div class="ImageManager"><img src="{{route('showthumb',$post->media_url1)}}" class="imageManagerImage"><br><br><button class="fileManager btn btn-primary" type="Button" data-url="{{route('home')}}/image-manager" data-multi="false">انتخاب عکس </button><input class="inputFile" name="media_url1" value="{{$post->media_url1}}" type="hidden"></div></td>';
                    html +=' </div>';
                    html +=' </div>';
                    content.append(html);
                    $(".imgInp").change(function() {
                        readURL(this);
                    });
                    break;
                case '4':
                    content.empty();
                    html='<div class="form-group">';
                    html+=' <label class="col-sm-2 control-label" for="media_url1">کد ویدیو</label>';
                    html+='<div class="col-sm-4">';
                    html+='<input id="media_url1" name="media_url1" value="{{$post->media_url1}}" placeholder="کد ویدو اپلود شده در آپارات"  class="form-control" type="text">';
                    html+=' </div>';
                    html+=' </div>';

                    content.append(html);

                    break;
                case '5':
                    content.empty();
                    html='<div class="form-group">';
                    html+=' <label class="col-sm-2 control-label" for="media_url1">کد ویدیو</label>';
                    html+='<div class="col-sm-4">';
                    html+='<input id="media_url1" name="media_url1" value="{{$post->media_url1}}" placeholder="کد ویدو اپلود شده در آپارات"  class="form-control" type="text">';
                    html+=' </div>';
                    html+=' </div>';

                    content.append(html);
                    break;
                case '6':
                    content.empty();
                    html=' <label class="col-sm-2 control-label" for="link">عکس</label>';
                    html +='<div class="col-sm-1">';
                    html += '<td class="text-center"><div class="ImageManager"><img src="{{route('showthumb',$post->media_url1)}}" class="imageManagerImage"><br><br><button class="fileManager btn btn-primary" type="Button" data-url="{{route('home')}}/image-manager" data-multi="false">انتخاب عکس </button><input class="inputFile" name="media_url1" value="{{$post->media_url1}}" type="hidden"></div></td>';
                    html +=' </div>';
                    content.append(html);
                    $(".imgInp").change(function() {
                        readURL(this);
                    });
                    break;
                case '7':
                    content.empty();
                    html=' <label class="col-sm-2 control-label" for="link">عکس</label>';
                    html +='<div class="col-sm-1">';
                    html += '<td class="text-center"><div class="ImageManager"><img src="{{route('showthumb',$post->media_url1)}}" class="imageManagerImage"><br><br><button class="fileManager btn btn-primary" type="Button" data-url="{{route('home')}}/image-manager" data-multi="false">انتخاب عکس </button><input class="inputFile" name="media_url1" value="{{$post->media_url1}}" type="hidden"></div></td>';
                    html +=' </div>';
                    html +=' </div>';
                    content.append(html);
                    $(".imgInp").change(function(){
                        readURL(this);
                    });
                    break;
                case '8':
                    content.empty();
                    html='<div class="form-group">';
                    html+=' <label class="col-sm-2 control-label" for="media_url1">کد ویدیو</label>';
                    html+='<div class="col-sm-4">';
                    html+='<input id="media_url1" name="media_url1" value="{{$post->media_url1}}" placeholder="کد ویدو اپلود شده در آپارات"  class="form-control" type="text">';
                    html+=' </div>';
                    html+=' </div>';
                    content.append(html);

                    break;
                case '9':
                    content.empty();
                    html='<div class="form-group">';
                    html+=' <label class="col-sm-2 control-label" for="media_url1">کد ویدیو(راست)</label>';
                    html+='<div class="col-sm-9">';
                    html+='<input id="media_url1" name="media_url1" value="{{$post->media_url1}}" placeholder="کد ویدو اپلود شده در آپارات"  class="form-control" type="text">';
                    html+=' </div>';
                    html+=' <label class="col-sm-2 control-label" for="media_url1">کد ویدیو(چپ)</label>';
                    html+='<div class="col-sm-9">';
                    html+='<input id="media_url1" name="media_url2" value="{{$post->media_url2}}" placeholder="کد ویدو اپلود شده در آپارات"  class="form-control" type="text">';
                    html+=' </div>';
                    html+=' </div>';
                    content.append(html);
                    break;
                case '10':
                    content.empty();
                    $('#txt_area').empty();
                    html='';
                    html+='<label class="col-sm-2 control-label" for="media_url1">ورود اطلاعات</label>';
                    html+='<table id="infos" class="table table-striped table-bordered table-hover ">';
                    html+='<thead>';
                    html+='<tr>';
                    html+='<td class="text-center active">عنوان</td>';
                    html+='<td class="text-center active">متن</td>';
                    html+='<td class="text-center active">آیکون</td>';
                    html+='<td class="text-center active">نوع</td>';
                    html+='<td class="text-center active">عملیات</td>';
                    html+='</tr>';
                    html+='</thead>';
                    html+='<tbody>';
                    @if($post->type==10)
                    var iteams={!! $post->text !!};
                    @endif
                    info_row=0;
                    $.each(iteams,function (index,obj){
                        html  += '<tr id="image-row' + info_row + '">';
                        html += '  <td class="text-center">';
                        html += '</span><input type="text" name="info[' + info_row + '][title]" value="'+obj.title+'" placeholder="عنوان" class="form-control" />';
                        html += '  </td>';
                        html += '  <td class="text-center">';
                        html += '</span><input type="text" name="info[' + info_row + '][text]" value="'+obj.text+'" placeholder="متن یا مقدار " class="form-control" />';
                        html += '  </td>';

                        html += '<td class="text-center" ><div class="ImageManager"><img  style="max-width:80px;" src="{{route('home')}}/image-manager/view/'+obj.icon+'" class="imageManagerImage"><br><br><button class="fileManager btn btn-primary" type="Button" data-url="{{route('home')}}/image-manager" data-multi="false">انتخاب آیکون</button><input class="inputFile" name="info[' + info_row + '][icon]" value="'+obj.icon+'" type="hidden"></div></td>';

                        html += '  <td class="text-center"width="70px">';
                        html+='<select type="text" id="info_type_'+info_row+'" name="info[' + info_row + '][type]"> <option ';if(obj.type==1) html+= 'selected';html+=' value="1">متن</option> <option ';if(obj.type==2) html+= 'selected'; html+=' value="2">متن و آیکون</option></select></td>';
                        html += '  <td class="text-center" ><button type="button" onclick="$(\'#image-row' + info_row  + '\').remove();" data-toggle="tooltip" title="" class="btn btn-danger"><i class="fa fa-minus-circle"></i></button></td>';
                        html += '</tr>';

                        $('#infos tbody').append(html);
                        $("#info_type_"+info_row).select2();
                        info_row++;

                    });

                    html+='</tbody>';
                    html+='<tfoot>';
                    html+='<tr>';
                    html+='<td colspan="3"></td>';
                    html+='<td class="text-left"><button type="button" onclick="add_info();" data-toggle="tooltip" title="" class="btn btn-primary" data-original-title="افزودن "><i class="fa fa-plus-circle"></i></button></td>';
                    html+='</tr>';
                    html+='</tfoot>';
                    html+='</table>';

                    content.append(html);

                    break;
                case '11':
                    content.empty();
                    break;
                case '12':
                    content.empty();
                    html=' <label class="col-sm-2 control-label" for="link">عکس</label>';
                    html +='<div class="col-sm-1">';
                    html += '<td class="text-center"><div class="ImageManager"><img src="{{route('showthumb',$post->media_url1)}}" class="imageManagerImage"><br><br><button class="fileManager btn btn-primary" type="Button" data-url="{{route('home')}}/image-manager" data-multi="false">انتخاب عکس </button><input class="inputFile" name="media_url1" value="{{$post->media_url1}}" type="hidden"></div></td>';
                    html +=' </div>';
                    content.append(html);
                    $(".imgInp").change(function() {
                        readURL(this);
                    });
                    break;
            }
            $(document).on('click', '.fileManager', function() {
                var $this = $(this);
                window.ImageManagerCaller = $this;
                $.colorbox({
                    href: $this.data('url'),
                    open: true,
                    width: '100%',
                    height: '100%',
                    onComplete: function() {
                        window.ImageManager.initPopUp();
                    }
                });
            });




        });
    </script>

@stop