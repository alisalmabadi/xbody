@extends('layouts.admin_master_full')

@section('content-header')
    <section class="content-header">
        <div class="pull-left">
            <button type="submit" form="form-category" data-toggle="tooltip" title="" class="btn btn-primary" data-original-title="ذخیره"><i class="fa fa-save"></i></button>
            <a href="{{route('admin.delivery.index')}}" data-toggle="tooltip" title="" class="btn btn-default" data-original-title="لغو"><i class="fa fa-reply"></i></a></div>
        <h1>
            فروش

        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-shoping-cart"></i>فروش</a></li>
            <li class="active">ارسال جدید</li>
        </ol>
    </section>
@endsection

@section('content')

    <section class="content">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-plus "></i>ارسال جدید</h3>
            </div>
            <div class="panel-body">
                <form action="{{route('admin.delivery.store')}}" class="form-horizontal" method="post" enctype="multipart/form-data" id="form-category">
                    {{csrf_field()}}

                        <div class="form-group required">
                            <label class="col-sm-2 control-label" for="name">نام</label>
                            <div class="col-sm-6">
                                <input id="name" name="name" value="{{old('name')}}" placeholder="نام"  class="form-control" type="text" required>
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>

                        </div>

                        <div class="form-group required">
                            <label class="col-sm-2 control-label" for="state">وضعیت</label>
                            <div class="col-sm-3">
                                <select name="state" id="state" class="form-control city-type-sel">
                                    <option value="0">غیر فعال</option>
                                    <option value="1" selected>فعال</option>

                                </select>

                            </div>
                        </div>

                    <div class="form-group required">
                        <label class="col-sm-2 control-label" for="price">هزینه</label>
                        <div class="col-sm-6">
                            <input id="price" name="price" value="{{old('price')}}" placeholder="هزینه"  class="form-control" type="text" required>
                            @if ($errors->has('price'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('price') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group required">
                        <label class="col-sm-2 control-label" for="free">ارسال رایگان</label>
                        <div class="col-sm-6">
                            <div class="input-group">
                                <span class="input-group-addon" id="basic-addon1">
                                <input id="free" name="free"   type="checkbox">
                                    </span>
                                <input id="free_price" name="free_price" value="{{old('free_price')}}" placeholder="برای خرید بالای (تومان)"  class="form-control" type="text" >
                            </div>
                            @if ($errors->has('free_price'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('free_price') }}</strong>
                                    </span>
                            @endif
                            </div>
                    </div>

                    <div id="valid_dec" class="form-group required">
                        <label class="col-sm-2 control-label" for="desc">توضیحات</label>
                        <div class="col-sm-6">
                            <textarea id="desc" name="desc" placeholder="اختیاری"  class="form-control" type="text" max="150" >{{old('seo_desc')}}</textarea>
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="city_filter_type">برای</label>
                        <div class="col-sm-3">

                            <select name="city_filter_type" id="city_filter_type" class="form-control city-type-sel" required>

                                @foreach(city_filter_types() as $type)
                                    <option value="{{$type['id']}}" @if($type['id']==0) selected="true" @endif >{{$type['name']}}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('city_filter_type'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('city_filter_type') }}</strong>
                                    </span>
                            @endif

                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="cites">انتخاب شهر ها</label>
                        <div class="col-sm-6">

                            <select name="cities[]" id="cites" class="form-control city-select2" multiple="multiple">

                                @foreach($cities as $city)
                                    <option value="{{ $city->id}}" >{{ $city->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>



                </form>

            </div>
        </div>

    </section>

@endsection
@section('admin-footer')
    <script type="application/javascript">

    $(document).ready(function () {
        $('.city-type-sel').select2();
        $('.city-select2').select2(
            {
                multiple:true,
                maximumSelectionLength:500,
                placeholder: "شهرها را اضافه کنید",
                allowClear: true,


            }
        );

    });






    </script>

@stop