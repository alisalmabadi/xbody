@extends('layouts.admin_master_full')

@section('content-header')
    <section class="content-header">
        <div class="pull-left">
            <button type="submit" form="form-category" data-toggle="tooltip" title="" class="btn btn-primary" data-original-title="ذخیره"><i class="fa fa-save"></i></button>
            <a href="{{route('admin.product.index')}}" data-toggle="tooltip" title="" class="btn btn-default" data-original-title="لغو"><i class="fa fa-reply"></i></a></div>
        <h1>
            ویرایش کالا

        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-shopping-bag"></i> فروشگاه</a></li>
            <li class="active"><i class="fa fa-product-hunt"></i>کالاها</li>
            <li class="active"> ویرایش کالا</li>
        </ol>
    </section>
@endsection

@section('content')

    <section class="content">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-plus "></i>تکمیل کالا </h3>
            </div>
            <div class="panel-body">
                <form action="{{route('admin.product.update',$product)}}" class="form-horizontal" method="post" enctype="multipart/form-data" id="form-category">
                    {{csrf_field()}}
                    {{method_field('PATCH')}}

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
                                    <input id="name" name="name" value="{{$product->name}}" placeholder="نام"  class="form-control" type="text">
                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>

                                <label class="col-sm-2 control-label" for="order">انتخاب دسته</label>

                                <div class="col-sm-2">

                                    <select  name="category_id" id="category_id" class="form-control select22" disabled="disabled">
                                        <option value="0">انتخاب(اجباری)</option>
                                        @foreach($categories as $category)
                                            <option @if($category->id==$product->category_id) selected @endif value="{{$category->id}}">{{$category->name}}</option>
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

                            <div class="form-group required">
                                <label class="col-sm-2 control-label" for="name">جزئیات</label>
                                <div class="col-sm-9">
                                    <textarea id="text" name="desc"  placeholder="جزئیات"  class="form-control" type="text" >{{$product->desc}}</textarea>
                                    @if ($errors->has('desc'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('desc') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="model">مدل</label>
                                <div class="col-sm-10">
                                    <input id="model" name="model" value="{{$product->model}}" placeholder="مدل(اختیاری) مانند sm-r2548"  class="form-control" type="text">
                                </div>


                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="model">قیمت</label>
                                <div class="col-sm-9">
                                    <input id="price" name="price" value="{{$product->price}}" placeholder="مانند 12000"  class="form-control" type="text">
                                    @if ($errors->has('price'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('price') }}</strong>
                                    </span>
                                    @endif
                                </div>

                               {{-- <label class="col-sm-1 control-label" for="order">کد دسته(cat number)</label>
                                <div class="col-sm-4">
                                    <input id="serial" name="serial" value="{{$product->serial}}" placeholder="کد دسته"  class="form-control" type="text">
                                </div>--}}

                            </div>
                                <h3>سئو</h3>
                                <div class="form-group required">
                                    <label class="col-sm-2 control-label" for="name">عنوان</label>
                                    <div class="col-sm-6">
                                        <input id="title" name="title" value="{{$product->title}}" placeholder="عنوان کالا"  class="form-control" type="text" >
                                        @if ($errors->has('title'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>



                     {{--       <div class="form-group required">
                                <label class="col-sm-2 control-label" for="tol">طول</label>
                                <div class="col-sm-6">
                                    <input id="tol" name="tol" value="{{$product->tol}}" placeholder="120"  class="form-control" type="text" >
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
                                    <input id="arz" name="arz" value="{{$product->arz}}" placeholder="120"  class="form-control" type="text" >
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
                                    <input id="ertefa" name="ertefa" value="{{$product->ertefa}}" placeholder="120"  class="form-control" type="text" >
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
                                    <input id="weight" name="weight" value="{{$product->weight}}" placeholder="120"  class="form-control" type="text" >
                                    @if ($errors->has('weight'))
                                        <span class="help-block">
                                        <strong>{{$errors->first('weight')}}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group required">
                                <label class="col-sm-2 control-label" for="show_attr">نمایش مشخصات ظاهری</label>
                                <select class="" style="width: 50%" name="show_attr">
                                    <option value="1" @if($product->show_attr==1) selected @endif>نمایش مشخصات(طول و عرض و...) در صفحه محصول</option>
                                    <option value="0" @if($product->show_attr==0) selected @endif>عدم نمایش</option>
                                </select>
                            </div>
--}}
                                <div id="slugvalid" class="form-group required">
                                    <label class="col-sm-2 control-label" for="name">ادرس یکتا</label>
                                    <div class="col-sm-6">
                                        <input id="slug" name="slug" value="{{$product->slug}}" placeholder="یک ایدی انتخاب شود که در دسته ها یکتا باشد"  class="form-control" type="text" >
                                        @if ($errors->has('slug'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('slug') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group required">
                                    <label class="col-sm-2 control-label" for="keywords">تک های سئو</label>
                                    <div class="col-sm-6">
                                        <select style="width: 100%" name="keywords[]" id="keywords" class="form-control keyword2" multiple="multiple">

                                            @foreach($keywords as $keyword)
                                                <option value="{{$keyword->id}}" @if(in_array($keyword->id,$product->keywords->pluck('id')->toArray())) selected @endif >{{$keyword->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div id="valid_dec" class="form-group required">
                                    <label class="col-sm-2 control-label" for="seo_desc">توضیحات سئو</label>
                                    <div class="col-sm-6">
                                        <textarea id="seo_desc" name="seo_desc" placeholder="توضیح سئو حداکثر 150  کاراکتر"  class="form-control" type="text" max="150" >{{$product->seo_desc}}</textarea>
                                    </div>
                                </div>


                         {{--   <div class="form-group required">
                                <label class="col-sm-2 control-label" for="name">نقد و برسی</label>
                                <div class="col-sm-9">
                                    <textarea id="review" name="review"  placeholder="نقد و برسی"  class="form-control"  >{{$product->review}}</textarea>
                                    @if ($errors->has('review'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('review') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
--}}



                        </div>

                        </div>

                        <!-- seo tab content -->

                        <!-- specification tab content -->
                        <div class="tab-pan fade" id="specification">
                            <h3>خصوصیات</h3>
                            <div class="row">

                                @if ($errors->has('spec.*.value'))
                                    <span style="color: red;" class="help-block">
                                        <strong>{{ $errors->first('spec.*.value') }}</strong>
                                    </span>
                                @endif
                                @php $row=0; @endphp
                            @foreach($product->category->attribute_groups as $attribut_group)

                                    <div class="col-sm-4  padding-3x">
                                        <div class="panel  panel-default">
                                        <div class="panel-heading">
                                        <h4 class="text-center">{{$attribut_group->name}}</h4>
                                        </div>
                                        <div class="panel-body">
                                        @foreach($attribut_group->attributes as $attribute)

                                                <input type="hidden"  value="{{$attribute->id}}" name="spec[{{$row}}][att_id]">

                                                <div class="row">
                                            <div class="col-sm-4 padding-1x"><label for="">{{$attribute->name}}</label></div>

                                            @if($attribute->type==1)
                                                <div class="col-sm-8 padding-1x">

                                                    @if(($attribute->product_attribute_values()->where('product_id',$product->id)->first()))
                                                        <input type="text" class="form-control" value="{{$attribute->product_attribute_values()->where('product_id',$product->id)->first()->value}}"  name="spec[{{$row}}][value]">
                                                    @else

                                                        <input type="text" class="form-control" value=""  name="spec[{{$row}}][value]">
                                                    @endif
                                                </div>
                                            @elseif($attribute->type==2)
                                                <div class="col-sm-8 padding-1x">
                                                <select name="spec[{{$row}}][value]" class="select2 form-control">
                                                    @foreach($attribute->attribute_options as $attribute_option)
                                                        @if(($attribute->product_attribute_values()->where('product_id',$product->id)->first()))
                                                        <option value="{{$attribute_option->id}}" @if($attribute->product_attribute_values()->where('product_id',$product->id)->first()->value==$attribute_option->id) selected @endif >{{$attribute_option->title}}</option>
                                                        @else
                                                            <option value="{{$attribute_option->id}}" >{{$attribute_option->title}}</option>
                                                        @endif
                                                        @endforeach
                                                </select>
                                                </div>
                                            @endif
                                            @php
                                                $row++;
                                            @endphp
                                                </div>
                                        @endforeach
                                        </div>
                                        </div>
                                    </div>
                            @endforeach



                            </div>

                            <br>

                        </div>

                        <!-- gallery tab content -->
                        <div class="tab-pan fade" id="gallery">
                            <label for='titulo'>گالری</label>
                            {!! ImageManager::getMultiField(['field_name' => 'images', 'default' => $product->images->pluck('id')->toArray() ]) !!}
                        </div>

{{--
                        <div class="tab-pan fade" id="variety">
                            <h3>تنوع</h3>
                            <table id="opts" class="table table-striped table-bordered table-hover ">
                                <thead>
                                <tr>
                                    <td class="text-center active">شماره</td>
                                    <td class="text-center active">قیمت</td>
                                    <td class="text-center active">قیمت خرید</td>
                                    <td class="text-center active">مشخصات</td>

                                    <td class="text-center active">تعداد</td>
                                    <td class="text-center active">عملیات</td>

                                </tr>
                                </thead>
                                <tbody>
                                @foreach($product->product_variety_values as $product_attribute_value)
                                    <tr>
                                    <td class="text-center">{{$product_attribute_value->id}}</td>
                                    <td class="text-center">{{$product_attribute_value->price}}</td>
                                    <td class="text-center">{{$product_attribute_value->buy_price}}</td>
                                    <td class="text-center">@foreach($product_attribute_value->variety_options as $variety_option) {{$variety_option->title.','}} @endforeach </td>
                                    <td class="text-center">{{$product_attribute_value->count}}</td>
                                    <td class="text-center">
                                        <a href="{{route('admin.product.variety_remove',$product_attribute_value->id)}}" onclick="" data-toggle="tooltip" title="" class="btn btn-danger"><i class="fa fa-minus-circle"></i></a>
                                        <a  href="{{route('admin.product.variety_update_form',[$product_attribute_value,$product])}}"  data-toggle="modal" data-target="#update_varity_modal" title="" class="btn btn-primary" data-original-title="افزودن آگهی"><i class="fa fa-plus-circle"></i></a>
                                    </td>
                                    </tr>
                                @endforeach



                                </tbody>
                                <tfoot>
                                <tr>
                                    <td colspan="5"></td>
                                    <td class="text-left"><button type="button"  data-toggle="modal" data-target="#new_varity_modal" title="" class="btn btn-primary" data-original-title="افزودن آگهی"><i class="fa fa-plus-circle"></i></button></td>

                                </tr>
                                </tfoot>

                            </table>
                        </div>
--}}
                    </div>


</div>


                <style>
                    .padding-1x
                    {
                        padding: 3px;
                    }

                    .padding-3x
                    {
                        padding: 12px;
                    }
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
                </form>
            </div>
        </div>

    </section>

@endsection

@section('admin-footer')
    <script type="application/javascript">
        var category_sel=$('#category_id');
        var attribute_groups=$('#attribute_groups');
        var attributes=$('#attributes');
        var specification_selected=$('#specification_selected');
        var specification_values=$('#specification_values');
        CKEDITOR.replace( 'review' );
        $(document).on('hidden.bs.modal', '.modal', function () {
            var modalData = $(this).data('bs.modal');

            // Destroy modal if has remote source – don't want to destroy modals with static content.
            if (modalData && modalData.options.remote) {
                // Destroy component. Next time new component is created and loads fresh content
                $(this).removeData('bs.modal');
                // Also clear loaded content, otherwise it would flash before new one is loaded.
                $(this).find(".modal-content").empty();
            }
        });
        html='';

        $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
            var target = $(e.target).attr("href") // activated tab

            $('.keyword2').select2({
                multiple:true,
                maximumSelectionLength:40,
                placeholder: "تگ ها را انتخاب یا اضافه کنید",

                allowClear: true,
                tags: true,
            });
            $('.select22').select2({ dir: "rtl"});
            $(".sortable").sortable({placeholder: "ui-state-highlight",helper:'clone'});
            price_format();

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

        //detail section js

        // attribute_groups.change(function(){
        //     attributes.empty();
        //     var html='<option value="0">همه</option>';
        //     if(attribute_groups.val()==0)
        //     {
        //
        //         $.each(attribute_list,function (index,obj)
        //         {
        //             html+='<option value="'+obj.id+'" >'+obj.name+'</option>';
        //
        //         });
        //         attributes.append(html);
        //         attribute_groups.select();
        //
        //
        //     }else
        //     {
        //         $.each(attribute_group_list[attribute_groups.val()-1].attributes,function (index,obj)
        //         {
        //             html+='<option value="'+obj.id+'" >'+obj.name+'</option>';
        //
        //         });
        //         attributes.append(html);
        //         attribute_groups.select();
        //
        //     }
        //
        // });
    </script>
    <script type="text/javascript">
        $('.select2').select2();
        $('.select22').select2();
        $('.keyword2').select2({
            multiple:true,
            maximumSelectionLength:40,
            placeholder: "تگ ها را انتخاب یا اضافه کنید",
            allowClear: true,
            tags: true,
        });
    </script>
@stop