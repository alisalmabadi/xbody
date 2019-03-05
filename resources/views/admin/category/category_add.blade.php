@extends('layouts.admin_master_full')

@section('content-header')
    <section class="content-header">
        <div class="pull-left">
            <button type="submit" form="form-category" data-toggle="tooltip" title="" class="btn btn-primary" data-original-title="ذخیره"><i class="fa fa-save"></i></button>
            <a href="{{route('admin.category.index')}}" data-toggle="tooltip" title="" class="btn btn-default" data-original-title="لغو"><i class="fa fa-reply"></i></a></div>
        <h1>
            دسته بندی

        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-bars"></i> دسته بندی</a></li>
            <li class="active">ایجاد دسته جدید</li>
        </ol>
    </section>
@endsection

@section('content')

    <section class="content">

        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-plus "></i>ایجاد دسته جدید</h3>
            </div>
            <div class="panel-body">
                <form action="{{route('admin.category.store')}}" class="form-horizontal" method="post" enctype="multipart/form-data" id="form-category">
                    {{csrf_field()}}

                        <div class="form-group required">
                            <label class="col-sm-2 control-label" for="name">نام دسته</label>
                            <div class="col-sm-6">
                                <input id="name" name="name" value="{{old('name')}}" placeholder="نام دسته"  class="form-control" type="text">
                            </div>
                        </div>
                       <div class="form-group required">

                        <div class="col-sm-6 col-sm-offset-2">
                            <div class="checkbox">

                                <label>
                                <input id="state" name="state" value="{{old('state')}}"  type="checkbox">
                                نمایش در صفحه اصلی
                                </label>
                            </div>
                            </div>
                        </div>
                        <div class="form-group required">
                            <label class="col-sm-2 control-label" for="name">عنوان</label>
                            <div class="col-sm-6">
                                <input id="title" name="title" value="{{old('title')}}" placeholder="عنوان دسته"  class="form-control" type="text" >

                            </div>
                        </div>
                    <div class="form-group required">
                        <label class="col-sm-2 control-label" for="skill">نقطه قوت</label>
                        <div class="col-sm-6">
                            <input id="skill" name="skill" value="{{old('skill')}}" placeholder="نقطه قوت"  class="form-control" type="text" >

                        </div>
                    </div>

                    <div id="slugvalid" class="form-group required">
                            <label class="col-sm-2 control-label" for="name">ادرس یکتا</label>
                            <div class="col-sm-6">
                                <input id="slug" name="slug" value="{{old('slug')}}" placeholder="یک ایدی انتخاب شود که در دسته ها یکتا باشد"  class="form-control" type="text" >
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="keywords">تک های سئو</label>
                            <div class="col-sm-6">
                                <select name="keywords[]" id="keywords" class="form-control keyword" multiple="multiple" style="width: 100%;">

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

                    <div class="form-group required">
                        <label class="col-sm-2 control-label" for="link">تصویر دسته</label>

                        {!! ImageManager::getField(['text' => 'انتخاب عکس', 'class' => 'btn btn-primary', 'field_name' => 'image', 'default' => '1']) !!}

                    </div>



                </form>

            </div>
        </div>

    </section>

@endsection
@section('admin-footer')
    <script type="application/javascript">

        $('#slug').keypress(function(event){
            var char = String.fromCharCode(event.which)

            var txt = $(this).val()

            if (!char.match(/[^._,? \s\\]/)){

                return false;
            }

        });

        $(document).ready(
            function () {

            $('#lfm').filemanager('file');

        });

        $('#slug').on('input', function() {

            $.post('{{route('admin.category.slug')}}',{slug:$(this).val()},function (data) {

                if (data == '1') {


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
            }
            else
            {
                $('#valid_dec').removeClass('has-warning');
            }
        });
    </script>

@stop