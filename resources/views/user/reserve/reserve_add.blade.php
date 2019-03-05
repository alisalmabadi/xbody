@extends('user.layouts.user_app')
@section('title','Xbody | reserve')
@section('head')
    <meta content="width=device-width, initial-scale=1" name="viewport" />

    <link rel="stylesheet" href="{{asset('css/jquery.Bootstrap-PersianDateTimePicker.css')}}">
    <link rel="stylesheet" href="{{asset('css/select2.min.css')}}">
<style>


</style>
    @endsection
@section('content')
    <!-- page start-->
    @if(!empty($errors))
        @foreach($errors->all() as $error)
<div class="alert alert-block alert-danger fade in">
<strong>{{$error}}</strong>
    <button data-dismiss="alert" class="close close-sm" type="button">
        <i class="fa fa-times"></i>
    </button>
</div>
        @endforeach

        @endif
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                 رزرو جلسات

                </header>
                <div class="panel-body">
                    <div class="stepy-tab">
                        <ul id="default-titles" class="stepy-titles clearfix">
                            <li id="default-title-0" class="current-step">
                                <div>انتخاب پکیج مورد نظر</div>
                            </li>
                            <li id="default-title-1" class="">
                                <div>جزئیات</div>
                            </li>
                           {{-- <li id="default-title-2" class="">
                                <div>انتخاب روز ها</div>
                            </li>--}}
                        </ul>
                    </div>
                    <form class="form-horizontal" id="default" action="{{route('user.getreservedays')}}" method="POST">
                        {{csrf_field()}}
                        <fieldset title="انتخاب پکیج" class="step" id="default-step-0">
                            <legend></legend>
                            <div class="form-group ">
                                <label class="col-lg-2 control-label col-md-offset-3">انتخاب پکیج مورد نظر</label>
                                <div class="col-lg-4">
                                    <select name="package" class="form-control">
                                        <option value="0">
                                            انتخاب کنید
                                        </option>
                                        @foreach($packages as $package)
                                        <option value="{{$package->PackageID}}">{{$package->PackageName}} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {{$package->PackagePrice}} تومان </option>
                                            @endforeach
                                    </select>
{{--
                                    <input type="text" class="form-control" placeholder="Full Name">
--}}
                                </div>
                            </div>


                        </fieldset>
                        <fieldset title=" جزئیات" class="step" id="default-step-1">
                            <legend></legend>

                            <div class="form-group">
                                <label class="col-sm-1 control-label">از تاریخ</label>

                                <div class="input-group col-md-3">
                                    <div class="input-group-addon" data-mddatetimepicker="true" data-trigger="click" data-targetselector="#toDate2" data-groupid="group2" data-todate="true" data-enabletimepicker="false" data-placement="left">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </div>
                                    <input name="date" type="text" class="form-control" id="toDate2" placeholder="از تاریخ" data-mddatetimepicker="true" data-trigger="click" data-targetselector="#toDate2" data-groupid="group2" data-todate="true" data-enabletimepicker="false" data-placement="right" />
                                </div>

                                <label class="col-sm-1 control-label">نوع روز</label>
                                <div class="col-sm-2">
                                    <select class="form-control" name="DayType">
                                        <option value="0">انتخاب کنید</option>
                                        <option value="1">روزهای زوج</option>
                                        <option value="2">روزهای فرد</option>
                                        <option value="3">تمامی روزها</option>

                                    </select>
{{--
                                    <input type="text" class="form-control" placeholder="Phone">
--}}
                                </div>


                                <label class="col-sm-2 control-label">تعداد روزها در هفته</label>
                                <div class="col-sm-3">
                                    <select name="countday" class="form-control">
                                        <option value="0">انتخاب کنید</option>
                                        <option value="1">یک روز در هفته</option>
                                        <option value="2">دو روز در هفته</option>
                                        <option value="3">سه روز در هفته</option>
                                        <option value="4">چهار روز در هفته</option>
                                        <option value="5">پنج روز در هفته</option>
                                        <option value="6">شش روز در هفته</option>
                                        <option value="7">هفت روز کامل</option>

                                    </select>
                                    {{--
                                                                        <input type="text" class="form-control" placeholder="Phone">
                                    --}}
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">به جز روز های</label>

                                    <select name="days[]" class="expd col-md-9" multiple="">
                                        @foreach($days as $day)
                                            <option value="{{$day->slug}}">{{$day->name}}</option>
                                            @endforeach
                                    </select>
                            </div>
                        </fieldset>

                        <input type="submit" class="finish btn btn-danger" value="نمایش روزهای پیشنهادی" />
                    </form>
                </div>
            </section>
        </div>
    </div>
    <!-- page end-->
{{--
{{$user->id}}
{{$user->first_name}}
{{$user->last_name}}
--}}



@endsection


@section('footer')
    <script src="{{asset('js/select2.min.js')}}"></script>
    <script src="{{asset('js/jalaali.js')}}" type="text/javascript"></script>
    <script src="{{asset('js/jquery.Bootstrap-PersianDateTimePicker.js')}}" type="text/javascript"></script>
    <script src="{{asset('js/jquery.stepy.js')}}" type="text/javascript"></script>
    <script>

        //step wizard

        $(function () {
            $('#default').stepy({
                backLabel: 'مرحله قبل',
                block: true,
                nextLabel: 'مرحله بعدی',
                titleClick: true,
                titleTarget: '.stepy-tab',
                transition: 'fade'
            });
        });

        $('#input1').change(function() {
            var $this = $(this),
                value = $this.val();
            alert(value);
        });
        $('#textbox1').change(function () {
            var $this = $(this),
                value = $this.val();
            alert(value);
        });
        $('[data-name="disable-button"]').click(function() {
            $('[data-mddatetimepicker="true"][data-targetselector="#input1"]').MdPersianDateTimePicker('disable', true);
        });
        $('[data-name="enable-button"]').click(function () {
            $('[data-mddatetimepicker="true"][data-targetselector="#input1"]').MdPersianDateTimePicker('disable', false);
        });

        $(".expd").select2({dir:"rtl"});

    </script>

    @endsection