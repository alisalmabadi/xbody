@extends('layouts.admin_master_full')

@section('content-header')
    <section class="content-header">
        <div class="pull-left">
            <button type="submit" form="form-category" data-toggle="tooltip" title="" class="btn btn-primary" data-original-title="ذخیره"><i class="fa fa-save"></i></button>
            <a href="{{route('admin.article.index')}}" data-toggle="tooltip" title="" class="btn btn-default" data-original-title="لغو"><i class="fa fa-reply"></i></a></div>
        <h1>
            اخبار یا مقاله جدید

        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-globe"></i> بلاگ</a></li>
            <li class="active"><i class="fa fa-plus"></i>اخبار یا مقاله </li>
        </ol>
    </section>
@endsection

@section('content')

    <section class="content">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-plus "></i>ایجاد اخبار یا مقاله </h3>
            </div>
            <div class="panel-body">
                <form action="{{route('admin.article.store')}}" class="form-horizontal" method="post" enctype="multipart/form-data" id="form-category">
                    {{csrf_field()}}
                    <div class="form-group">

                        <label class="col-sm-2 control-label" for="article_category_id">انتخاب دسته </label>
                        <div class="col-sm-4">
                            <select  name="article_category_id" id="article_category_id" style="width: 100%;" class="form-control typesel" >
                                @foreach($article_categories as $article_category)
                                    <option value="{{$article_category->id}}">{{$article_category->name}}</option>
                                @endforeach
                            </select>

                        </div>
                    </div>
                    <div class="form-group">

                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="title">عنوان</label>
                        <div class="col-sm-4">
                            <input id="title" name="title" value="{{old('title')}}" placeholder="عنوان"  class="form-control" type="text">

                        </div>

                    </div>




                  {{--  <div class="row">
                        <div class="col-sm-2 col-sm-offset-4">
                            <button type="button" class="btn btn-primary btn-block fileManager" data-url="{{route('home')}}/image-manager" data-multi="true">نمایش گالری</button>
                        </div>
                    </div>--}}
                    <div id="txt_area" class="form-group required">
                        <label class="col-sm-2 control-label" for="name">متن</label>
                        <div class="col-sm-9">
                            <textarea id="body" name="body"  placeholder="متن"  class="form-control" >{{old('body')}}</textarea>

                        </div>

                    </div>

                    <h3>سئو</h3>
                    <div id="" class="form-group required">
                        <label class="col-sm-2 control-label" for="name">عنوان صفحه</label>
                        <div class="col-sm-6">
                            <input id="seo_title" name="seo_title" value="{{old('seo_title')}}" placeholder="عنوان بای تب مروگز"  class="form-control" type="text" >
                            @if ($errors->has('seo_title'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('seo_title') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div id="slugvalid" class="form-group required">
                        <label class="col-sm-2 control-label" for="name">ادرس یکتا</label>
                        <div class="col-sm-6">
                            <input id="slug" name="slug" value="{{old('slug')}}" placeholder="یک ایدی انتخاب شود که در دسته ها یکتا باشد"  class="form-control" type="text" >
                            @if ($errors->has('slug'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('slug') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="keywords">تک های سئو</label>
                        <div class="col-sm-6">
                            <select name="keywords[]" id="keywords" class="form-control keyword2" style="width: 100%;" multiple="multiple">

                                @foreach($keywords as $keyword)
                                    <option value="{{$keyword->id}}" >{{$keyword->name}}</option>
                                @endforeach
                            </select>

                        </div>
                    </div>
                    <div id="valid_dec" class="form-group required">
                        <label class="col-sm-2 control-label" for="seo_desc">توضیحات سئو</label>
                        <div class="col-sm-6">
                            <textarea id="seo_desc" name="seo_desc" placeholder="توضیح سئو حداکثر 150  کاراکتر"  class="form-control" type="text" max="150" >{{old('seo_desc')}}</textarea>
                        </div>
                    </div>

                    <div id="short_id" class="form-group required">
                        <label class="col-sm-2 control-label" for="short_id">خلاصه مطلب</label>
                        <div class="col-sm-6">
                            <textarea id="short_id" name="short" placeholder="خلاصه مطلب 100  کاراکتر"  class="form-control" type="text" max="100" >{{old('short')}}</textarea>
<span class="help-block">حداکثر 90 کاراکتر</span>
            @if($errors->has('short'))
                <span class="help block">
                    <strong>{{$errors->first('short')}}</strong>
                </span>
                @endif

                        </div>
                    </div>
                    <hr>
                  {{--  <div class="form-group required">
                        <label class="col-sm-2 control-label" for="link">تصویر بند انگشتی مقاله</label>

                        {!! ImageManager::getField(['text' => 'انتخاب عکس', 'class' => 'btn btn-primary', 'field_name' => 'img_thumbnail', 'default' => '1']) !!}

                    </div>--}}
                    <hr>
                    <div class="form-group required">
                        <label class="col-sm-2 control-label" for="link">تصویر مقاله</label>

                        {!! ImageManager::getField(['text' => 'انتخاب عکس', 'class' => 'btn btn-primary', 'field_name' => 'img', 'default' => '1']) !!}

                    </div>


                </form>

            </div>
        </div>

    </section>

@endsection
@section('admin-footer')
    <script type="application/javascript">
        $('.typesel').select2();
        CKEDITOR.replace( 'body' );





        $('#slug').keypress(function(event){
            var char = String.fromCharCode(event.which)

            var txt = $(this).val()

            if (!char.match(/[^._,? \s\\]/)){
                return false;
            }
        });
        $('#slug').on('input', function() {

            $.post('{{route('admin.article.slug')}}',{slug:$(this).val(),_token:$('meta[name=csrf-token]').attr('content')},function (data) {

                if (data == 1) {


                    $('#slugvalid').addClass('has-success');
                    $('#slugvalid').removeClass('has-error');

                } else
                {

                    $('#slugvalid').addClass('has-error');
                    $('#slugvalid').removeClass('has-success');

                }


            });
        });

        $('#seo_desc').on('input', function() {

            var txt=$(this).val();
            if(txt.length>150)
            {
                $('#valid_dec').addClass('has-warning');



            }else
            {
                $('#valid_dec').removeClass('has-warning');

            }
        });

        //detail section js

        $('.keyword2').select2({
            multiple:true,
            maximumSelectionLength:40,
            placeholder: "تگ ها را انتخاب یا اضافه کنید",
            allowClear: true,
            tags: true,
           // dir: 'rtl'
        });

    </script>

@stop