@extends('layouts.admin_master_full')

@section('content-header')
    <section class="content-header">
        <div class="pull-left">
            <button type="submit" form="form-category" data-toggle="tooltip" title="" class="btn btn-primary" data-original-title="ذخیره"><i class="fa fa-save"></i></button>
            <a href="/admin/menu" data-toggle="tooltip" title="" class="btn btn-default" data-original-title="لغو"><i class="fa fa-reply"></i></a></div>
        <h1>
           تنظیمات سایت

        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-bars"></i> وبسایت</a></li>
            <li class="active">تنظیمات سایت</li>
        </ol>
    </section>
@endsection

@section('content')

    <section class="content">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-plus "></i>تنظیمات سایت</h3>
            </div>
            <div class="panel-body">
                <form action="{{route('admin.setting.update')}}" class="form-horizontal" method="post" enctype="multipart/form-data" id="form-category">
                    {{csrf_field()}}
{{method_field('PATCH')}}
                    <div class="form-group required">
                        <label class="col-sm-2 control-label" for="name">لوگو</label>
                        <div class="col-sm-6">
                            <input id="name" name="logo" value="{{old('logo')}}"  class="form-control" type="file">
                            @if ($errors->has('logo'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('logo') }}</strong>
                                    </span>
                            @endif
                        </div>
                        <img src="{{url('/')}}/{{$setting->logo}}" width="300" height="100">

                    </div>

                    <div class="form-group required">
                        <label class="col-sm-2 control-label" for="link">

                            عنوان صفحه اصلی
                            <label class="help-block">و هر صفحه ای که عنوان ندارد.</label>
                        </label>
                        <div class="col-sm-8">
                            <input name="mainpage_header" value="{{$setting->mainpage_header}}" placeholder="" id="link" class="form-control text-left" style="direction: ltr;" type="text">
                            @if ($errors->has('mainpage_header'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('mainpage_header') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group required">
                        <label class="col-sm-2 control-label" for="link">توضیحات متای صفحه اصلی</label>
                        <div class="col-sm-8">
                            <textarea name="mainpage_desc"  placeholder="{{$setting->mainpage_desc}}" id="link" class="form-control text-left" style="direction: ltr;" type="text">{{$setting->mainpage_desc}}</textarea>
                            @if ($errors->has('product_des'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('mainpage_desc') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                    <hr/>

                    <div class="form-group required">
                        <label class="col-sm-2 control-label" for="link">عنوان صفحه کلیه محصولات</label>
                        <div class="col-sm-8">
                            <textarea name="product_title"  placeholder="{{$setting->product_title}}" id="link" class="form-control text-left" style="direction: ltr;" type="text">{{$setting->product_title}}</textarea>
                            @if ($errors->has('product_title'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('product_title') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group required">
                        <label class="col-sm-2 control-label" for="link">متن بالای صفحه محصول</label>
                        <div class="col-sm-8">
                            <input name="product_header" value="{{$setting->product_header}}" placeholder="" id="link" class="form-control text-left" style="direction: ltr;" type="text">
                            @if ($errors->has('product_header'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('product_header') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group required">
                        <label class="col-sm-2 control-label" for="link">متن زیر عنوان صفحه محصول</label>
                        <div class="col-sm-8">
                            <textarea name="product_des"  placeholder="{{$setting->product_des}}" id="link" class="form-control text-left" style="direction: ltr;" type="text">{{$setting->product_des}}</textarea>
                            @if ($errors->has('product_des'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('product_des') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group required">
                        <label class="col-sm-2 control-label" for="link">توضیحات متای صفحه محصول</label>
                        <div class="col-sm-8">
                            <textarea name="product_meta_desc"  placeholder="{{$setting->product_meta_desc}}" id="link" class="form-control text-left" style="direction: ltr;" type="text">{{$setting->product_meta_desc}}</textarea>
                            @if ($errors->has('product_meta_desc'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('product_meta_desc') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                    <hr/>
                    <div class="form-group required">
                        <label class="col-sm-2 control-label" for="link">عنوان گالری تصاویر</label>
                        <div class="col-sm-8">
                            <input name="galleryphoto_title" value="{{$setting->galleryphoto_title}}" placeholder="" id="link" class="form-control text-left" style="direction: ltr;" type="text">
                            @if ($errors->has('galleryphoto_title'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('galleryphoto_title') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group required">
                        <label class="col-sm-2 control-label" for="link">متن بالای گالری تصاویر</label>
                        <div class="col-sm-8">
                            <input name="galleryphoto_header" value="{{$setting->galleryphoto_header}}" placeholder="" id="link" class="form-control text-left" style="direction: ltr;" type="text">
                            @if ($errors->has('galleryphoto_header'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('galleryphoto_header') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group required">
                        <label class="col-sm-2 control-label" for="link">توضیحات متای گالری تصاویر</label>
                        <div class="col-sm-8">
                            <textarea name="galleryphoto_des"  placeholder="{{$setting->galleryphoto_des}}" id="link" class="form-control text-left" style="direction: ltr;" type="text">{{$setting->galleryphoto_des}}</textarea>
                            @if ($errors->has('galleryphoto_des'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('galleryphoto_des') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>


                    <hr/>
                    <div class="form-group required">
                        <label class="col-sm-2 control-label" for="link">عنوان گالری ویدئو ها</label>
                        <div class="col-sm-8">
                            <input name="galleryvideo_title" value="{{$setting->galleryvideo_title}}" placeholder="" id="link" class="form-control text-left" style="direction: ltr;" type="text">
                            @if ($errors->has('galleryvideo_title'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('galleryvideo_title') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group required">
                        <label class="col-sm-2 control-label" for="link">متن بالای گالری ویدئو ها</label>
                        <div class="col-sm-8">
                            <input name="galleryvideo_header" value="{{$setting->galleryvideo_header}}" placeholder="" id="link" class="form-control text-left" style="direction: ltr;" type="text">
                            @if ($errors->has('galleryvideo_header'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('galleryvideo_header') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group required">
                        <label class="col-sm-2 control-label" for="link">توضیحات متای گالری ویدئوها</label>
                        <div class="col-sm-8">
                            <textarea name="galleryvideo_des"  placeholder="{{$setting->galleryvideo_des}}" id="link" class="form-control text-left" style="direction: ltr;" type="text">{{$setting->galleryvideo_des}}</textarea>
                            @if ($errors->has('galleryvideo_des'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('galleryvideo_des') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                    <hr/>
                    <div class="form-group required">
                        <label class="col-sm-2 control-label" for="link">عنوان گالری مشتری های ایکس بادی</label>
                        <div class="col-sm-8">
                            <input name="gallerycustomer_title" value="{{$setting->gallerycustomer_title}}" placeholder="" id="link" class="form-control text-left" style="direction: ltr;" type="text">
                            @if ($errors->has('gallerycustomer_title'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('gallerycustomer_title') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group required">
                        <label class="col-sm-2 control-label" for="link">متن بالای گالری ویدئوهای مشتری</label>
                        <div class="col-sm-8">
                            <input name="gallerycustomer_header" value="{{$setting->gallerycustomer_header}}" placeholder="" id="link" class="form-control text-left" style="direction: ltr;" type="text">
                            @if ($errors->has('gallerycustomer_header'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('gallerycustomer_header') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group required">
                        <label class="col-sm-2 control-label" for="link">توضیحات متای گالری ویدئوهای مشتری</label>
                        <div class="col-sm-8">
                            <textarea name="gallerycustomer_des"  placeholder="{{$setting->gallerycustomer_des}}" id="link" class="form-control text-left" style="direction: ltr;" type="text">{{$setting->gallerycustomer_des}}</textarea>
                            @if ($errors->has('gallerycustomer_des'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('gallerycustomer_des') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                    <hr/>


                        <div class="form-group required">
                            <label class="col-sm-2 control-label" for="link">آی دی فیس بوک</label>
                            <div class="col-sm-8">
                                <input name="facebook" value="{{$setting->facebook}}" placeholder="xbody" id="link" class="form-control text-left" style="direction: ltr;" type="text">
                                @if ($errors->has('facebook'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('facebook') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                    <div class="form-group required">
                        <label class="col-sm-2 control-label" for="link">آی دی تلگرام</label>
                        <div class="col-sm-8">
                            <input name="telegram" value="{{$setting->telegram}}" placeholder="xbody" id="link" class="form-control text-left" style="direction: ltr;" type="text">
                            @if ($errors->has('telegram'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('telegram') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group required">
                        <label class="col-sm-2 control-label" for="link">آی دی اینستاگرام</label>
                        <div class="col-sm-8">
                            <input name="instagram" value="{{$setting->instagram}}" placeholder="xbody" id="link" class="form-control text-left" style="direction: ltr;" type="text">
                            @if ($errors->has('instagram'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('instagram') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                    <hr/>


                    <div class="form-group required">
                        <label class="col-sm-2 control-label" for="link">نوشته درباره مای فوتر</label>
                        <div class="col-sm-8">
                            <textarea name="fabout"  placeholder="{{$setting->fabout}}" id="text2" class="form-control text-left" style="direction: ltr;" type="text">{{$setting->fabout}}</textarea>
                            @if ($errors->has('fabout'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('fabout') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group required">
                        <label class="col-sm-2 control-label" for="link">نوشته ارتباط با ما فوتر</label>
                        <div class="col-sm-8">
                            <textarea id="text" name="fcontactus"  placeholder="نوشته ارتباط با ما فوتر"  class="form-control" type="text" >{{$setting->fcontactus}}</textarea>
                            @if ($errors->has('fcontactus'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('fcontactus') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

{{--
                    <div class="form-group required">
                        <label class="col-sm-2 control-label" for="link">آی دی اینستاگرام</label>
                        <div class="col-sm-8">
                            <input name="instagram" value="{{$setting->instagram}}" placeholder="xbody" id="link" class="form-control text-left" style="direction: ltr;" type="text">
                            @if ($errors->has('instagram'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('instagram') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
--}}

</form>

</div>
</div>

</section>

@endsection