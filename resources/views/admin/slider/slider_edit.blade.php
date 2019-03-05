@extends('layouts.admin_master_full')

@section('content-header')
    <section class="content-header">
        <div class="pull-left">
            <button type="submit" form="form-category" data-toggle="tooltip" title="" class="btn btn-primary" data-original-title="ذخیره"><i class="fa fa-save"></i></button>
            <a href="{{route('admin.slider.index')}}" data-toggle="tooltip" title="" class="btn btn-default" data-original-title="لغو"><i class="fa fa-reply"></i></a></div>
        <h1>
        ویرایش اسلایدر

        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-bars"></i> وبسایت</a></li>
            <li class="active">ویرایش اسلایدر</li>
        </ol>
    </section>
@endsection

@section('content')

    <section class="content">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-sliders"></i>ویرایش اسلایدر جدید</h3>
            </div>
            <div class="panel-body">
                <form action="{{route('admin.slider.update',$sliders)}}" class="form-horizontal" method="post" enctype="multipart/form-data" id="form-category">
                    {{csrf_field()}}
                    {{method_field('PATCH')}}
                    <div class="form-group required">
                        <label class="col-sm-2 control-label" for="input-name">نام اسلایدر</label>
                        <div class="col-sm-5">
                            <input name="name" value="{{$sliders->name}}" placeholder="نام اسلایدر" id="input-name" class="form-control" type="text">
                        </div>
                    </div>

                  {{--  <div class="form-group">
                        <label class="col-sm-2 control-label" for="input-status">برای</label>
                        <div class="col-sm-5">
                            <select name="type_id" id="input-status" class="form-control">
                                <option value="1" @if($sliders->type_id==1) selected @endif >صفحه اصلی</option>
                                <option value="2" @if($sliders->type_id==2) selected @endif>دسته ها</option>

                            </select>
                            @if($errors->has('type_id'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('type_id') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>--}}
                {{--    @if($sliders->type_id==1)
                        <div class="form-group" id="resource_aria" style="display: none">
                            <label class="col-sm-2 control-label" for="input-status">دسته ی</label>
                            <div class="col-sm-5">
                                <select name="resource_id" id="input-status" class="form-control">

                                </select>
                                @if($errors->has('resource_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('resource_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    @else
                        <div class="form-group" id="resource_aria" >
                            <label class="col-sm-2 control-label" for="input-status">دسته ی</label>
                            <div class="col-sm-5">
                                <select name="resource_id" id="input-status" class="form-control">
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}" @if($category->id==$sliders->resource_id) selected @endif >{{$category->name}}</option>
                                    @endforeach
                                </select>
                                @if($errors->has('resource_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('resource_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    @endif
--}}

                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="input-status">وضعیت</label>
                        <div class="col-sm-5">
                            <select name="state" id="input-status" class="form-control">
                                <option value="1" @if($sliders->state=='1') selected @endif >فعال</option>
                                <option value="0" @if($sliders->state=='0') selected @endif >غیرفعال</option>
                            </select>
                        </div>
                    </div>
                    <table id="slides" class="table table-striped table-bordered table-hover">
                        <thead>
                        <tr>
                            <td class="text-center">عنوان</td>
                            <td class="text-center">لینک</td>
                            <td class="text-center">تصویر</td>
                            <td class="text-center">ترتیب</td>
                            <td class="text-center">ویرایش</td>

                        </tr>
                        </thead>
                        <tbody>
                        @php $image_row=0; @endphp
                        @foreach($sliders->slides as $slide)

                            <tr id="image-row{{$image_row}}">
                                <input type="hidden" name="slide[{{$image_row}}][id]" value="{{$slide->id}}">
                                <td class="text-center">
                                  <input name="slide[{{$image_row}}][title]" value="{{$slide->title}}"
                                                                    placeholder="عنوان اسلاید " class="form-control"
                                                                    type="text">
                                </td>
                                <td class="text-left" width="200px" ><input name="slide[{{$image_row}}][link]" value="{{$slide->link}}" placeholder="لینک"
                                                               class="form-control" type="text"></td>
                               {{-- <td class="text-left">
                                    <select name="slide[{{$image_row}}][btn_type]" id="btn_type{{$image_row}}">
                                        <option value="1" @if($slide->btn_type==1) selected @endif >هیچ کدام</option>
                                        <option value="2" @if($slide->btn_type==2) selected @endif  >بیشتر</option>
                                        <option value="3" @if($slide->btn_type==3) selected @endif  >خرید</option>
                                    </select>
                                </td>--}}
                                <td class="text-center" style="max-width: 200px;" >
                                    <div class="ImageManager"><img  src="{{route('media',$slide->image)}}" class="imageManagerImage img-responsive"><br><br><button class="fileManager btn btn-primary" type="Button" data-url="{{route('home')}}/image-manager" data-multi="false">انتخاب عکس منو</button><input class="inputFile" name="slide[{{$image_row}}][image]" value="{{$slide->image}}" type="hidden"></div>
                                </td>
                                <td class="text-center" width="70px"><input name="slide[{{$image_row}}][order]" value="{{$slide->order}}" placeholder="ترتیب"
                                                               class="form-control" type="text"></td>
                                <td class="text-center">
                                    <button type="button" onclick="$('#image-row{{$image_row}}').remove();" data-toggle="tooltip"
                                            title="" class="btn btn-danger"><i class="fa fa-minus-circle"></i></button>
                                </td>
                            </tr>
                            @php $image_row++; @endphp
                        @endforeach

                        </tbody>

                        <tfoot>
                        <tr>
                            <td colspan="4"></td>
                            <td class="text-left"><button type="button" onclick="addslide();" data-toggle="tooltip" title="" class="btn btn-primary" data-original-title="افزودن آگهی"><i class="fa fa-plus-circle"></i></button></td>
                        </tr>
                        </tfoot>
                    </table>



                </form>
                <ul>
                    @if($errors->has('*'))
                        @foreach ($errors->all() as $error)
                            <li>
                                <span class="help-block"><strong>{{ $error }}</strong></span>
                            </li>

                        @endforeach
                    @endif



                </ul>

            </div>
        </div>

    </section>

@endsection
@section('admin-footer')
    <script type="application/javascript">

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

        $('select[name=type_id]').change(function() {
            type=this.value;
            if(type==1)
            {
                $('#resource_aria').css('display','none');
                $('select[name=resource_id]').empty();
            }else if(type==2)
            {
                $('#resource_aria').css('display','block');
                $.ajax({
                    url: '{{route('admin.slider.get_categories')}}',
                    dataType: 'json',
                    type: 'POST',
                    data: {"_token":'{{csrf_token()}}'},
                    success: function(response) {
                        $('select[name=resource_id]').empty();
                        $.each(response, function(i, obj) {
                            $('select[name=resource_id]').append('<option value="'+obj.id+'">'+obj.name+'</option>');
                        });


                    },
                    error: function(x, e) {

                    }

                });
            }



        });
        var image_row = {{$image_row}};
        function addslide() {

            html  = '<tr id="image-row' + image_row + '">';
            html += '  <td class="text-center">';
            html += '<input type="hidden" name="slide[' + image_row + '][id]" value="-1">';
            html += '</span><input type="text" name="slide[' + image_row + '][title]" value="" placeholder="عنوان اسلاید " class="form-control" />';
            html += '  </td>';
            html += '  <td class="text-left"  width="200px"><input type="text" name="slide[' + image_row + '][link]" value="" placeholder="لینک" class="form-control text-left" /></td>';
/*
            html += '  <td class="text-left"><select name="slide['+image_row+'][btn_type]" id="btn_type'+image_row+'"> <option value="1">هیچ کدام</option><option value="2">بیشتر</option><option value="3">خرید</option></select></td>';
*/
            html += '<td class="text-center"><div class="ImageManager"><img src="{{route('home')}}/image-manager/view/1/thumb" class="imageManagerImage"><br><br><button class="fileManager btn btn-primary" type="Button" data-url="{{route('home')}}/image-manager" data-multi="false">انتخاب عکس منو</button><input class="inputFile" name="slide[' + image_row + '][image]" value="1" type="hidden"></div></td>';
            html += '  <td class="text-center"  width="70px"><input type="text" name="slide[' + image_row + '][order]" value="" placeholder="ترتیب" class="form-control" /></td>';
            html += '  <td class="text-center"><button type="button" onclick="$(\'#image-row' + image_row  + '\').remove();" data-toggle="tooltip" title="" class="btn btn-danger"><i class="fa fa-minus-circle"></i></button></td>';
            html += '</tr>';

            $('#slides tbody').append(html);

            image_row++;

            $(".imgInp").change(function() {
                readURL(this);
            });

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





    </script>

@stop