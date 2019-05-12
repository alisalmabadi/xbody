@extends('layouts.admin_master_full')

@section('content-header')
    <section class="content-header">
        <div class="pull-left">
            <button type="submit" form="form-category" data-toggle="tooltip" title="" class="btn btn-primary" data-original-title="ذخیره"><i class="fa fa-save"></i></button>
            <a href="{{route('admin.product.index')}}" data-toggle="tooltip" title="" class="btn btn-default" data-original-title="لغو"><i class="fa fa-reply"></i></a></div>
        <h1>
            کالای جدید

        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-shopping-bag"></i> فروشگاه</a></li>
            <li class="active"><i class="fa fa-product-hunt"></i>کالاها</li>
            <li class="active">کالای جدید</li>
        </ol>
    </section>
@endsection

@section('content')

    <section class="content">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-plus "></i>کالای جدید</h3>
            </div>
            <div class="panel-body">
                <form action="{{route('admin.product.store')}}" class="form-horizontal" method="post" enctype="multipart/form-data" id="form-category">
                    {{csrf_field()}}

                    <ul class="nav nav-tabs">

                        <li class="active"><a href="#general" data-toggle="tab">عمومی</a></li>
                        <li><a href="#specification" data-toggle="tab">خصوصیات</a></li>
                        <li><a href="#gallery" data-toggle="tab">گالری</a></li>
{{--
                        <li><a href="#variety" data-toggle="tab">تنوع</a></li>
--}}

                    </ul>

                    <div class="tab-content">
                        <!-- general tab content -->
                        <div class="tab-pan fade in active" id="general">
                            <h3>عمومی</h3>
                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="name">نام</label>
                                <div class="col-sm-2">
                                    <input id="name" name="name" value="{{old('name')}}" placeholder="نام"  class="form-control" type="text">
                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>

                                <label class="col-sm-2 control-label" for="order">انتخاب دسته</label>
                                    <div class="col-sm-2">
                                        <select  name="category_id" id="category_id" class="form-control select2" >
                                            <option value="0">انتخاب(اجباری)</option>
                                            @foreach($categories as $category)
                                                <option value="{{$category->id}}">{{$category->name}}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('category_id'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('category_id') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                <!-- gallery select image -->
                                <div class="" id="gallery">
                                    <div class="col-sm-1 control-label">
                                        <label for='titulo'>گالری</label>
                                    </div>
                                    <div class="col-sm-1">
                                        {!! ImageManager::getField(['text' => 'آپلود عکس','field_name' => 'images', 'class' => 'btn btn-primary' ]) !!}
                                    </div>
                                </div>
                                <!-- gallery select image -->
                            </div>
                          {{--  <div class="form-group">
                                <label class="col-sm-2 control-label" for="order">انتخاب فروشنده</label>
                                <div class="col-sm-3">
                                    <select  name="seller_id" id="seller_id" class="form-control select2" >
                                        <option value="0">انتخاب(اجباری)</option>
                                        @foreach($sellers as $seller)
                                            <option value="{{$seller->id}}">{{$seller->company_name}}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('seller_id'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('seller_id') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <label class="col-sm-2 control-label" for="order">انتخاب سازنده</label>
                                <div class="col-sm-3">
                                    <select  name="company_id" id="company_id" class="form-control select2" >
                                        <option value="0">انتخاب</option>
                                        @foreach($companies as $company)
                                            <option value="{{$company->id}}">{{$company->name}}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('company_id'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('company_id') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>--}}
                            {{--<div class="form-group">
                                <label class="col-sm-2 control-label" for="order">انتخاب(generic)</label>
                                <div class="col-sm-3">
                                    <select  name="generic_id" id="generic_id" class="form-control select2" >
                                        <option value="0">انتخاب(اجباری)</option>
                                        @foreach($generics as $generic)
                                            <option value="{{$generic->id}}">{{$generic->name}}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('generic_id'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('generic_id') }}</strong>
                                    </span>
                                    @endif
                                </div>

                            </div>--}}
                            <div class="form-group required">
                                <label class="col-sm-2 control-label" for="name">جزئیات</label>
                                <div class="col-sm-9">
                                    <textarea id="text" name="desc"  placeholder="جزئیات"  class="form-control" type="text" >{{old('desc')}}</textarea>
                                    @if ($errors->has('desc'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('desc') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="model">مدل</label>
                                <div class="col-sm-9">
                                    <input id="model" name="model" value="{{old('model')}}" placeholder="مدل(اختیاری) مانند sm-r2548"  class="form-control" type="text">
                                    @if ($errors->has('model'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('model') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                    <label class="col-sm-2 control-label" for="model">قیمت</label>
                                    <div class="col-sm-9">
                                        <input id="price" name="price" value="{{old('price')}}" placeholder="مانند 12000"  class="form-control" type="text">
                                        @if ($errors->has('price'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('price') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>
                                {{--<label class="col-sm-2 control-label" for="order">کد دسته(cat number)</label>
                                <div class="col-sm-3">
                                    <input id="serial" name="serial" value="{{old('order')}}" placeholder="کد دسته"  class="form-control" type="text">
                                    @if ($errors->has('order'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('order') }}</strong>
                                    </span>
                                    @endif
                                </div>--}}



                            <h3>سئو</h3>
                            <div class="form-group required">
                                <label class="col-sm-2 control-label" for="name">عنوان</label>
                                <div class="col-sm-6">
                                    <input id="title" name="title" value="{{old('title')}}" placeholder="عنوان کالا"  class="form-control" type="text" >
                                    @if ($errors->has('title'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                        {{--    <div class="form-group required">
                                <label class="col-sm-2 control-label" for="tol">طول</label>
                                <div class="col-sm-6">
                                    <input id="tol" name="tol" value="{{old('tol')}}" placeholder="120"  class="form-control" type="text" >
                                    @if ($errors->has('tol'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('tol') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group required">
                                <label class="col-sm-2 control-label" for="arz">عرض</label>
                                <div class="col-sm-6">
                                    <input id="arz" name="arz" value="{{old('tol')}}" placeholder="120"  class="form-control" type="text" >
                                    @if ($errors->has('arz'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('arz') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group required">
                                <label class="col-sm-2 control-label" for="arz">ارتفاع</label>
                                <div class="col-sm-6">
                                    <input id="ertefa" name="ertefa" value="{{old('ertefa')}}" placeholder="120"  class="form-control" type="text" >
                                    @if ($errors->has('ertefa'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('ertefa') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group required">
                                <label class="col-sm-2 control-label" for="arz">وزن</label>
                                <div class="col-sm-6">
                                    <input id="weight" name="weight" value="{{old('weight')}}" placeholder="120"  class="form-control" type="text" >
                                    @if ($errors->has('weight'))
                                        <span class="help-block">
                                        <strong>{{$errors->first('weight')}}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>--}}

                          {{--  <div class="form-group required">
                                <label class="col-sm-2 control-label" for="show_attr">نمایش مشخصات ظاهری</label>
                            <select class="" style="width: 50%" name="show_attr">
                                <option value="1">نمایش مشخصات(طول و عرض و...) در صفحه محصول</option>
                                <option value="0">عدم نمایش</option>
                            </select>
                            </div>
--}}

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

                                    <select name="keywords[]" id="keywords" class="form-control keyword2" style="width: 100%"  multiple="" tabindex="-1">

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

                           {{-- <div class="form-group required">
                                <label class="col-sm-2 control-label" for="name">نقد و برسی</label>
                                <div class="col-sm-9">
                                    <textarea id="review" name="review"  placeholder="نقد و برسی"  class="form-control"  >{{old('review')}}</textarea>
                                    @if ($errors->has('review'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('review') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>--}}

                        </div>
                        <!-- specification tab content -->
                        <div class="tab-pan fade" id="specification" >
                            <h3>خصوصیات</h3>

                           <h4 class="text-center">محصول ثبت نشده است</h4>




                            <br>


                        </div>
                        <!-- gallery tab content -->
                        <div class="tab-pan fade" id="gallery">
                            <h3>گالری</h3>
                            <h4 class="text-center">محصول ثبت نشده است</h4>
                        </div>

                        {{--<div class="tab-pan fade" id="variety">
                            <h3>تنوع</h3>
                            <h4 class="text-center">محصول ثبت نشده است</h4>
                        </div>--}}
                </div>



                </form>


            </div>
        </div>
        <style>
            .tab-content > .tab-pan{
                display: none;
            }
            .tab-content > .active{
                display: block;
            }
            .attribute-options-list
            {
                margin: 5px 0px;
                padding: 0;
            }
            .attribute-options-list>li
            {   margin: 10px 0px;
                list-style: none;
            }
            .attribute-options-list > li > span.badge
            {
                float: left;


            }
            .attribute-options-list > li > span.title
            {

                color: blue;


            }
            .att_separator
            {   color:#ff8a10;
                font-size:10px;
                padding: 0px 3px;
            }

        </style>

    </section>

@endsection

@section('admin-footer')
    <script type="application/javascript">
        var category_sel=$('#category_id');
        var attribute_groups=$('#attribute_groups');
        var attributes=$('#attributes');
        var specification_selected=$('#specification_selected');
        var specification_values=$('#specification_values');
        //CKEDITOR.replace( 'review' );



        //seo section js
        $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
            var target = $(e.target).attr("href") // activated tab

            $('.select22').select2({ dir: "rtl"});
            $(".sortable").sortable({placeholder: "ui-state-highlight",helper:'clone'});

        });

        $('#slug').keypress(function(event){
            var char = String.fromCharCode(event.which)

            var txt = $(this).val()

            if (!char.match(/[^._,? \s\\]/)){
                return false;
            }
        });
        $('#slug').on('input', function() {
            $.post('{{route('admin.product.slug')}}',{slug:$(this).val()},function (data) {
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



            }else
            {
                $('#valid_dec').removeClass('has-warning');

            }
        });

        //detail section js

/*
        $('.select2').select2({dir: "rtl"});
*/

    </script>
    <script type="text/javascript">
        $('.select2').select2({dir: "rtl"});
        $('#keywords').select2({
            multiple:true,
           maximumSelectionLength:40,
            placeholder: "تگ ها را انتخاب یا اضافه کنید",
            allowClear: true,
            tags: true,
        }
        );
    </script>

@stop