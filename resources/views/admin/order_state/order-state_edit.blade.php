@extends('layouts.admin_master_full')

@section('content-header')
    <section class="content-header">
        <div class="pull-left">
            <button type="submit" form="form-category" data-toggle="tooltip" title="ذخیره" class="btn btn-primary" data-original-title="ذخیره"><i class="fa fa-save"></i></button>
            <a href="{{route('admin.order-state.index')}}" data-toggle="tooltip" title="لغو" class="btn btn-default" data-original-title="لغو"><i class="fa fa-reply"></i></a></div>
        <h1>
            وضعیت سفارشات
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-bars"></i> وضعیت سغارشات</a></li>
            <li class="active">ویرایش</li>
        </ol>
    </section>
@endsection

@section('content')

    <section class="content">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-plus "></i>ویرایش وضعیت</h3>
            </div>
            <div class="panel-body">
                <form action="{{route('admin.order-state.update',$order_state)}}" class="form-horizontal" method="post" enctype="multipart/form-data" id="form-category">
                    {{csrf_field()}}
                    {{method_field('PATCH')}}
                    <div class="form-group required">
                        <label class="col-sm-2 control-label" for="name">نام وضعیت</label>
                        <div class="col-sm-6">
                            <input id="name" name="name" value="{{$order_state->name}}" placeholder="نام"  class="form-control" type="text">
                        </div>
                        @if($errors->has('name'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                        @endif
                    </div>
                    <div class="form-group required">
                        <label class="col-sm-2 control-label" for="type_id">نوع وضعیت</label>
                        <div class="col-sm-3">
                            <select name="type_id" class="select2" id="type_id" style="width: 100%">
                                <option value="0" >انتخاب(اجباری)</option>
                                @foreach(order_state_types() as $order_state_type)
                                    <option value="{{$order_state_type->get('id')}}"  @if($order_state_type->get('id')==$order_state->type_id) selected @endif >{{$order_state_type->get('name')}}</option>
                                @endforeach
                            </select>

                        </div>
                        @if($errors->has('type_id'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('type_id') }}</strong>
                                    </span>
                        @endif
                    </div>

                    <div class="form-group required">
                        <label class="col-sm-2 control-label" for="class">رنگ نمایش</label>
                        <div class="col-sm-3">
                            <select name="class" class="select2" id="class" style="width: 100%">
                              @foreach(order_state_colors() as $color)
                                    <option value="{{$color->get('value')}}" @if($color->get('value')==$order_state->class) selected @endif >{{$color->get('name')}}</option>

                              @endforeach
                            </select>

                        </div>
                        @if($errors->has('class'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('class') }}</strong>
                                    </span>
                        @endif
                    </div>

                    <div class="form-group required">
                        <label class="col-sm-2 control-label" for="class">ارسال SMS</label>
                        <div class="col-sm-6">
                            <label><input type="radio" value="0" @if($order_state->send_sms==0) checked @endif name="send_sms">خیر</label>
                            <label><input type="radio" value="1" @if($order_state->send_sms==1) checked @endif name="send_sms">بله</label>
                        </div>
                        @if($errors->has('send_sms'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('send_sms') }}</strong>
                            </span>
                        @endif
                    </div>


                    <div class="form-group required">
                        <label class="col-sm-2 control-label" for="class">متن  SMS <i title="به جای نام مشتری از  _name_ و برای شماره سفارش _order_ استفاده شود." style="color: #0d6aad" data-toggle="tooltip" class="fa fa-info-circle"></i></label>
                        <div class="col-sm-6">
                            <textarea name="sms_text" id="" cols="30" rows="10">{{$order_state->sms_text}}</textarea>
                        </div>

                    </div>




                </form>

            </div>
        </div>

    </section>

@endsection
@section('admin-footer')

    <script>
        $(document).ready(function ()
        {
            $('.select2').select2({
                dir:"rtl",
            });
        });

    </script>

@stop