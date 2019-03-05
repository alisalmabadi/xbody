@extends('layouts.admin_master_full')

@section('content-header')
    <section class="content-header">
        <div class="pull-left">
            <button type="submit" form="form-category" data-toggle="tooltip" title="" class="btn btn-primary" data-original-title="ذخیره"><i class="fa fa-save"></i></button>
            <a href="{{route('admin.attribute-group.index')}}" data-toggle="tooltip" title="" class="btn btn-default" data-original-title="لغو"><i class="fa fa-reply"></i></a></div>
        <h1>
            گروهای خصوصیتی

        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-store"></i> فروشگاه</a></li>
            <li class="active"><i class="fa fa-object-group" style="padding: 2px;"></i>گرو های خصوصیتی</li>
            <li class="active"> ویرایش</li>
        </ol>
    </section>
@endsection

@section('content')

    <section class="content">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-plus "></i>ویرایش گروه خصوصیتی</h3>
            </div>
            <div class="panel-body">
                <form action="{{route('admin.attribute-group.update',$attribute_group)}}" class="form-horizontal" method="post" enctype="multipart/form-data" id="form-category">
                    {{csrf_field()}}
                    {{method_field('PATCH')}}

                    <div class="form-group required">
                        <label class="col-sm-2 control-label" for="name">نام گروه</label>
                        <div class="col-sm-6">
                            <input id="name" name="name" value="{{$attribute_group->name}}" placeholder="نام گروه"  class="form-control" type="text">
                            @if ($errors->has('name'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group required">
                        <label class="col-sm-2 control-label" for="attribute_group_id">دسته</label>
                        <div class="col-sm-6">
                            <select name="attribute_category_id[]" style="width: 100%" id="attribute_category_id" class="form-control" multiple>
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}"   @foreach($attribute_group->categories as  $att_c) @if($att_c->id == $category->id) selected @endif @endforeach>{{$category->name}}</option>
                                @endforeach
                            </select>

                        </div>
                    </div>
                    <div class="form-group required">
                        <label class="col-sm-2 control-label" for="name">توضیحات</label>
                        <div class="col-sm-6">
                            <textarea id="desc" name="desc"  placeholder="توضیحات"  class="form-control">{{$attribute_group->desc}}</textarea>

                        </div>
                    </div>

                </form>

            </div>
        </div>

    </section>

@endsection
@section('admin-footer')
    <script type="application/javascript">
        $('.typesel').select2();
        $('.typeselm').select2(
            {
                multiple:true,
                maximumSelectionLength:40,
                placeholder: "گروه ها را انتخاب کنید",

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