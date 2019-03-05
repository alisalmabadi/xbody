@extends('layouts.admin_master_full')

@section('content-header')
    <section class="content-header">
        <div class="pull-left">
            <button type="submit" form="form-category" data-toggle="tooltip" title="" class="btn btn-primary" data-original-title="ذخیره"><i class="fa fa-save"></i></button>
            <a href="{{route('admin.payment-method.index')}}" data-toggle="tooltip" title="" class="btn btn-default" data-original-title="لغو"><i class="fa fa-reply"></i></a></div>
        <h1>
            روش های پرداخت ها

        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-credit-card-alt"></i>روش های پرداخت</a></li>
            <li class="active">ویرایش</li>
        </ol>
    </section>
@endsection

@section('content')

    <section class="content">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-plus "></i>ویرایش روش پرداخت </h3>
            </div>
            <div class="panel-body">
                <form action="{{route('admin.payment-method.update',$payment_method)}}" class="form-horizontal" method="post" enctype="multipart/form-data" id="form-category">
                    {{csrf_field()}}
                    {{method_field('PATCH')}}
                    <div class="form-group required">
                        <label class="col-sm-2 control-label" for="name">نام</label>
                        <div class="col-sm-6">
                            <input id="name" name="name" value="{{$payment_method->name}}" placeholder="نام"  class="form-control" type="text">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="input-status">نوع</label>
                        <div class="col-sm-6">
                            <select name="type" id="type" class="form-control" required>
                                <option value="0">انتخاب</option>
                                @foreach(get_payment_method() as $payment_methodd)
                                    <option value="{{$payment_methodd['id']}}" @if($payment_methodd['id']==$payment_method->type) selected @endif>{{$payment_methodd['name']}}</option>
                                @endforeach
                            </select>
                            @if($errors->has('type'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('type') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="input-status">وضعیت</label>
                        <div class="col-sm-6">
                            <select name="state" id="input-status" class="form-control">
                                <option value="1" @if($payment_method->state==1) selected @endif >فعال</option>
                                <option value="0" @if($payment_method->state==0) selected @endif> غیرفعال</option>
                            </select>
                            @if($errors->has('state'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('state') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                    <div id="dynamic_place">
                        @if($payment_method->type==2)

                            <div class="form-group required">
                                <label class="col-sm-2 control-label" for="method_opt1">ایدی زرین پال</label>
                                <div class="col-sm-6">
                                    <input id="method_opt1" name="method_opt1" value="{{$payment_method->method_opt1}}" placeholder="مرچنت ایدی"  class="form-control" type="text">
                                </div>
                            </div>
                        @endif
                            @if($payment_method->type==3)

                                <div class="form-group required">
                                    <label class="col-sm-2 control-label" for="method_opt1">نام کاربری</label>
                                    <div class="col-sm-6">
                                        <input id="method_opt1" name="method_opt1" value="{{$payment_method->method_opt1}}" placeholder="نام کاربری"  class="form-control" type="text">
                                    </div>
                                </div>

                                <div class="form-group required">
                                    <label class="col-sm-2 control-label" for="method_opt1">کلمه عبور</label>
                                    <div class="col-sm-6">
                                        <input id="method_opt2" name="method_opt2" value="{{$payment_method->method_opt2}}" placeholder="کلمه عبور"  class="form-control" type="text">
                                    </div>
                                </div>

                                <div class="form-group required">
                                    <label class="col-sm-2 control-label" for="method_opt1">شماره پایانه</label>
                                    <div class="col-sm-6">
                                        <input id="method_opt3" name="method_opt3" value="{{$payment_method->method_opt3}}" placeholder="شماره پایانه"  class="form-control" type="text">
                                    </div>
                                </div>
                            @endif

                    </div>

                    {{--<div class="form-group required">--}}
                        {{--<label class="col-sm-2 control-label" for="name">توضیحات</label>--}}
                        {{--<div class="col-sm-6">--}}
                            {{--<textarea id="desc"  name="desc"  class="form-control">{{$payment_method->desc}}</textarea>--}}
                        {{--</div>--}}
                    {{--</div>--}}


                    <div class="form-group required">
                        <label class="col-sm-2 control-label" for="link">عکس</label>
                        <div class="col-sm-4">
                            {!! ImageManager::getField(['text' => 'انتخاب عکس', 'class' => 'btn btn-primary', 'field_name' => 'image_id', 'default' => $payment_method->image_id ]) !!}
                        </div>
                    </div>


                </form>

            </div>
        </div>

    </section>

@endsection
@section('admin-footer')
    <script type="application/javascript">

        $('#type').change(function ()
        {
            $('#dynamic_place').empty();
            var html='<div class="form-group required">';
            html+='<label class="col-sm-2 control-label" for="method_opt1">ایدی زرین پال</label>';
            html+='<div class="col-sm-6">';
            html+='<input id="method_opt1" name="method_opt1"  placeholder="مرچنت ایدی"  class="form-control" type="text">';
            html+='</div>';
            html+='</div>';

            var html2='<div class="form-group required">';
            html2+='<label class="col-sm-2 control-label" for="method_opt1">نام کاربری</label>';
            html2+='<div class="col-sm-6">';
            html2+='<input id="method_opt1" name="method_opt1"  placeholder="نام کاربری"  class="form-control" type="text">';
            html2+='</div>';
            html2+='</div>';
            html2+='<div class="form-group required">';
            html2+='<label class="col-sm-2 control-label" for="method_opt1">کلمه عبور</label>';
            html2+='<div class="col-sm-6">';
            html2+='<input id="method_opt1" name="method_opt2"  placeholder="کلمه عبور"  class="form-control" type="text">';
            html2+='</div>';
            html2+='</div>';
            html2+='<div class="form-group required">';
            html2+='<label class="col-sm-2 control-label" for="method_opt1">شماره پایانه</label>';
            html2+='<div class="col-sm-6">';
            html2+='<input id="method_opt1" name="method_opt3"  placeholder="شماره پایانه"  class="form-control" type="text">';
            html2+='</div>';
            html2+='</div>';

            if($(this).val()==2)
            {
                $('#dynamic_place').append(html);
            }else if($(this).val()==3)
            {
                $('#dynamic_place').append(html2);
            }
        });







    </script>

@stop