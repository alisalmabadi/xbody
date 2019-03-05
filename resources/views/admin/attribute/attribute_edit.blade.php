@extends('layouts.admin_master_full')

@section('content-header')
    <section class="content-header">
        <div class="pull-left">
            <button type="submit" form="form-category" data-toggle="tooltip" title="" class="btn btn-primary" data-original-title="ذخیره"><i class="fa fa-save"></i></button>
            <a href="{{route('admin.attribute.index')}}" data-toggle="tooltip" title="" class="btn btn-default" data-original-title="لغو"><i class="fa fa-reply"></i></a></div>
        <h1>
            خصوصیت

        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-store"></i> فروشگاه</a></li>
            <li class="active"><i class="fa fa-object-group" style="padding: 2px;"></i>خصوصیت</li>
            <li class="active"> ویرایش</li>
        </ol>
    </section>
@endsection

@section('content')


    <section class="content">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-plus "></i>ویرایش خصوصیت</h3>
            </div>
            <div class="panel-body">
                <form action="{{route('admin.attribute.update',$attribute)}}" class="form-horizontal" method="post" enctype="multipart/form-data" id="form-category">
                    {{csrf_field()}}
                    {{method_field('PATCH')}}
                    <div class="form-group required">
                        <label class="col-sm-2 control-label" for="name">نام خصوصیت</label>
                        <div class="col-sm-6">
                            <input id="name" name="name" value="{{$attribute->name}}" placeholder="نام خصوصیت"  class="form-control" type="text">

                        </div>
                    </div>
                    <div class="form-group required">
                        <label class="col-sm-2 control-label" for="name">توضیحات</label>
                        <div class="col-sm-6">
                            <textarea id="desc" name="desc"  placeholder="توضیحات"  class="form-control">{{$attribute->desc}}</textarea>

                        </div>
                    </div>

                    <div class="form-group required">
                        <label class="col-sm-2 control-label" for="attribute_group_id">گروه</label>
                        <div class="col-sm-6">
                            <select name="attribute_group_id[]" id="attribute_group_id" style="width: 100%" class="form-control typeselm" multiple>
                                @foreach($attribute_groups as $attribute_group)
                                    <option value="{{$attribute_group->id}}" @foreach($attribute->attribute_groups as  $att_g) @if($att_g->id==$attribute_group->id) selected @endif @endforeach  >{{$attribute_group->name}}</option>
                                @endforeach
                            </select>

                        </div>
                    </div>

                    <div class="form-group required">
                        <label class="col-sm-2 control-label" for="type">نوع</label>
                        <div class="col-sm-6">
                            <select name="type" id="type" class="form-control typesel"  >
                                @foreach($options->all() as $option)
                                    <option value="{{$option['id']}}" @if($attribute->type==$option['id']) selected @endif>{{$option['name']}}</option>
                                @endforeach
                            </select>

                        </div>
                    </div>
                    <div id="opt_place">


                    </div>
                </form>

            </div>
        </div>

    </section>

@endsection

@section('admin-footer')
    <script type="application/javascript">

        var htmlopt_place='  <table id="opts" class="table table-striped table-bordered table-hover ">\n' +
            '                        <thead>\n' +
            '                        <tr>\n' +
            '                            <td class="text-center active">عنوان</td>\n' +
            '                            <td class="text-center active">تصویر</td>\n' +
            '                            <td class="text-center active">ترتیب</td>\n' +
            '                            <td  class="text-center active">عملیات</td>\n' +
            '\n' +
            '                        </tr>\n' +
            '                        </thead>\n' +
            '                        <tbody>\n' +
            '\n' +
            '\n' +
            '                        </tbody>\n' +
            '                        <tfoot>\n' +
            '                        <tr>\n' +
            '                            <td colspan="3"></td>\n' +
            '                            <td class="text-left"><button type="button" onclick="addopt();" data-toggle="tooltip" title="" class="btn btn-primary" data-original-title="افزودن آگهی"><i class="fa fa-plus-circle"></i></button></td>\n' +
            '                        </tr>\n' +
            '                        </tfoot>\n' +
            '\n' +
            '                    </table>';


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

        var opt_row=0;
        function addopt() {

            html  = '<tr id="opt-row' + opt_row + '">';
            html += '  <td class="text-center">';
            html+='<input type="hidden" name="opt[' + opt_row + '][id]" value="-1" />';
            html += '      </span><input type="text" name="opt[' + opt_row + '][title]" value="" placeholder="عنوان گزینه " class="form-control" />';
            html += '  </td>';
            html += '  <td class="text-center">' +
                '<div class="row text-center"><img id="img_'+ opt_row + '" class="img-responsive img-bordered" style="max-height: 100px;margin: auto;" src="{{URL::to('/')}}/images/noimage.jpeg" alt="" title="" data-placeholder="" /></div>' +
                '<div class="row text-center" ><label class="btn btn-primary btn-file"> انتخاب<input type="file" name="opt[' + opt_row + '][image]" value="" d-id="img_'+opt_row+'" class="imgInp" /></label></div></td>';
            html += '  <td class="text-center" ><input type="text" name="opt[' + opt_row + '][order]" value="" placeholder="ترتیب" class="form-control" /></td>';
            html += '  <td class="text-center" ><button type="button" onclick="$(\'#opt-row' + opt_row  + '\').remove();" data-toggle="tooltip" title="" class="btn btn-danger"><i class="fa fa-minus-circle"></i></button></td>';
            html += '</tr>';

            $('#opts tbody').append(html);

            opt_row++;

            $(".imgInp").change(function() {
                readURL(this);
            });

        }




        $('#type').change(function () {
            if($(this).val()==1)
            {
                $('#opt_place').empty();

            }else
            {

                $('#opt_place').empty();
                $('#opt_place').append(htmlopt_place);
            }


        });
        @if($attribute->attribute_options && $attribute->type !='1')
                $('#opt_place').empty();
                $('#opt_place').append(htmlopt_place);
            @forEach($attribute->attribute_options  as $option)

                 html  = '<tr id="opt-row' + opt_row + '">';
                 html += '  <td class="text-center">';
                 html+='<input type="hidden" name="opt[' + opt_row + '][id]" value="{{$option->id}}" />';
                 html += '      </span><input type="text" name="opt[' + opt_row + '][title]" value="{{$option->title}}" placeholder="عنوان گزینه " class="form-control" />';
                 html += '  </td>';
                 html += '  <td class="text-center">' +
                 '<div class="row text-center"><img id="img_'+ opt_row + '" class="img-responsive img-bordered" style="max-height: 100px;margin: auto;" src="{{$option->image}}" alt="" title="" data-placeholder="" /></div>' +
                 '<div class="row text-center" ><label class="btn btn-primary btn-file"> انتخاب<input type="file" name="opt[' + opt_row + '][image]" value="" d-id="img_'+opt_row+'" class="imgInp" /></label></div></td>';
                 html += '  <td class="text-center" ><input type="text" name="opt[' + opt_row + '][order]" value="{{$option->order}}" placeholder="ترتیب" class="form-control" /></td>';
                 html += '  <td class="text-center" ><button type="button" onclick="$(\'#opt-row' + opt_row  + '\').remove();" data-toggle="tooltip" title="" class="btn btn-danger"><i class="fa fa-minus-circle"></i></button></td>';
                 html += '</tr>';

            $('#opts tbody').append(html);

            opt_row++;

            @endforeach

        @endif



    </script>
    <script type="text/javascript">
        $('.typesel').select2();
        $('.typeselm').select2(
            {
                multiple:true,
                maximumSelectionLength:40,
                placeholder: "گروه ها را انتخاب یا اضافه کنید",
                allowClear: true,
            }
        );
        $('#attribute_category_id').select2(
            {
                multiple:true,
                maximumSelectionLength:40,
                placeholder: "دسته ها را انتخاب  کنید",
                allowClear: true,
            }
        );
    </script>


@stop