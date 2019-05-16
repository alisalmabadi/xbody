@extends('user.layouts.user_app')
@section('title','Xbody | reserve')
@section('head')
    <meta content="width=device-width, initial-scale=1" name="viewport" />

    <link rel="stylesheet" href="{{asset('css/jquery.Bootstrap-PersianDateTimePicker.css')}}">
    <link rel="stylesheet" href="{{asset('css/select2.min.css')}}">

    {{--select2 for select hours--}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
    {{--end of select2 for select hours--}}
    {{--sweet alert2--}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
    {{--end of sweet alert2--}}


<style>
    h2#swal2-title {
        font-family: iranyekan;
    }
    .inputss{
        color:grey;
    }

    .active-progress{
        background-color: red;
    }
    .bs-wizard {
        margin-top: 40px;
    }
    /*Form Wizard*/

    .bs-wizard {
        border-bottom: solid 1px #e0e0e0;
        padding: 0 0 10px 0;
    }

    .bs-wizard > .bs-wizard-step {
        padding: 0;
        position: relative;
    }

    .bs-wizard > .bs-wizard-step + .bs-wizard-step {}

    .bs-wizard > .bs-wizard-step .bs-wizard-stepnum {
        color: #595959;
        font-size: 16px;
        margin-bottom: 5px;
    }

    .bs-wizard > .bs-wizard-step .bs-wizard-info {
        color: #999;
        font-size: 14px;
    }

    .bs-wizard > .bs-wizard-step > .bs-wizard-dot {
        position: absolute;
        width: 30px;
        height: 30px;
        display: block;
        background: #ff0000;
        top: 45px;
        left: 50%;
        margin-top: -15px;
        margin-left: -15px;
        border-radius: 50%;
    }

    .bs-wizard > .bs-wizard-step > .bs-wizard-dot:after {
        content: ' ';
        width: 14px;
        height: 14px;
        background: #ffffff;
        border-radius: 50px;
        position: absolute;
        top: 8px;
        left: 8px;
    }

    .bs-wizard > .bs-wizard-step > .progress {
        position: relative;
        border-radius: 0px;
        height: 8px;
        box-shadow: none;
        margin: 20px 0;
    }

    .bs-wizard > .bs-wizard-step > .progress > .progress-bar {
        width: 0px;
        box-shadow: none;
        background: #fbe8aa;
    }

    .bs-wizard > .bs-wizard-step.complete > .progress > .progress-bar {
        width: 100%;
    }

    .bs-wizard > .bs-wizard-step.active > .progress > .progress-bar {
        width: 50%;
    }

    .bs-wizard > .bs-wizard-step:first-child.active > .progress > .progress-bar {
        width: 0%;
    }

    .bs-wizard > .bs-wizard-step:last-child.active > .progress > .progress-bar {
        width: 100%;
    }

    .bs-wizard > .bs-wizard-step.disabled > .bs-wizard-dot {
        background-color: #f5f5f5;
    }

    .bs-wizard > .bs-wizard-step.disabled > .bs-wizard-dot:after {
        opacity: 0;
    }

    .bs-wizard > .bs-wizard-step:first-child > .progress {
        left: 50%;
        width: 150%;
    }

    .bs-wizard > .bs-wizard-step:last-child > .progress {
        width: 50%;
    }

    .bs-wizard > .bs-wizard-step.disabled a.bs-wizard-dot {
        pointer-events: none;
    }
    /*END Form Wizard*/

    /*select2 for select hours*/
    .select2-results__option {
        color:grey;
    }
    .select2-results__option--highlighted {
        color: white !important;
        background-color: red !important;
    }
    .select2-container--default .select2-results__option[aria-selected=true] {
        background-color: darkgray;
    }
    /*end of select2 for select hours*/
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



                {{--step progress bar--}}
                <div class="container">
                    <div class="row bs-wizard" style="border-bottom:0;">

                        <div class="col-xs-3 bs-wizard-step active" id="first-container">
                            <!-- complete -->
                            <div class="text-center bs-wizard-stepnum">مرحله اول</div>
                            <div class="progress active-progress" id="first-progress" style="margin-right: 100%;">
                                <div class="progress-bar"></div>
                            </div>
                            <a href="#" class="bs-wizard-dot"></a>
                            <div class="bs-wizard-info text-center">انتخاب پکیج</div>
                        </div>

                        <div class="col-xs-3 bs-wizard-step pull-left disabled" id="second-container">
                            <!-- active -->
                            <div class="text-center bs-wizard-stepnum">مرحله دوم</div>
                            <div class="progress" id="second-progress" style="width: 150%;margin-right: -100%;">
                                <div class="progress-bar"></div>
                            </div>
                            <a href="#" class="bs-wizard-dot"></a>
                            <div class="bs-wizard-info text-center">جزئیات</div>
                        </div>
                    </div>
                </div>
                {{--End of step progress bar--}}




                <div class="panel-body">
                    {{--<div class="stepy-tab">
                        <ul id="default-titles" class="stepy-titles clearfix">
                            <li id="default-title-0" class="current-step">
                                <div>انتخاب پکیج مورد نظر</div>
                            </li>
                            <li id="default-title-1" class="">
                                <div>جزئیات</div>
                            </li>
                        </ul>
                    </div>--}}


                    <form class="form-horizontal" id="default" action="{{route('user.getreservedays')}}" method="POST">
                        {{csrf_field()}}
                        <fieldset title="انتخاب پکیج" class="step" id="default-step-0">
                            <legend></legend>
                            <div class="form-group " style="text-align: center;">
                                <label style="text-align: center; font-size: 17px;font-weight: bold;" class="col-lg-2 control-label col-md-offset-3">انتخاب پکیج


                                </label>



                               <!--   <div class="col-lg-8">
                                       
                                    </div> -->
                                <div class="col-lg-4">
                                    <select name="package" class="form-control inputss " id="select-package">
                                        <option value="0">
                                            انتخاب کنید
                                        </option>
                                        @foreach($packages as $package)
                                        <option value="{{$package->PackageID}}">{{$package->PackageName}} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {{$package->PackagePrice}} تومان </option>
                                            @endforeach
                                    </select>
                        

                                </div>
   <div class="col-lg-12">
                                          <label style="text-align: center; font-size: 14px;font-weight: bold; margin-top: 5%; padding-right: 27px;">پکیج مورد نظر خود از لیست بالا انتخاب نمایید و سپس روی مرحله بعد کلیک کنید.</label>
                                      </div>
                            </div>


                        </fieldset>
                        <fieldset title=" جزئیات" class="step" id="default-step-1">
                            <legend></legend>

                            <div class="form-group">
                                <label class="col-sm-1 control-label" style="text-align: left;">از تاریخ</label>

                                <div class="input-group col-md-3">
                                    <div class="input-group-addon" data-mddatetimepicker="true" data-trigger="click" data-targetselector="#toDate2" data-groupid="group2" data-todate="true" data-enabletimepicker="false" data-placement="left">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </div>
                                    <input name="date" type="text" class="form-control inputss" id="toDate2" placeholder="از تاریخ" data-mddatetimepicker="true" data-trigger="click" data-targetselector="#toDate2" data-groupid="group2" data-todate="true" data-enabletimepicker="false" data-placement="right" />
                                </div>

                                <label class="col-sm-1 control-label" style="text-align: center;">نوع روز</label>
                                <div class="col-sm-2">
                                    <select class="form-control inputss" name="DayType" id="select-day">
                                        <option value="0">انتخاب کنید</option>
                                        <option value="1">روزهای زوج</option>
                                        <option value="2">روزهای فرد</option>
                                        <option value="3">تمامی روزها</option>

                                    </select>
{{--
                                    <input type="text" class="form-control" placeholder="Phone">
--}}
                                </div>


                                <label class="col-sm-2 control-label" style="text-align: center;">تعداد روزها در هفته</label>
                                <div class="col-sm-3">
                                    <select name="countday" class="form-control inputss" id="select-daycount">
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
                                <label class="col-sm-2 control-label" style="text-align: left;">به جز روز های</label>

                                    <select name="days[]" class="expd col-md-9 inputss" multiple="">
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
                transition: 'fade',
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

    {{--select2 for select Hours--}}
    <script>
        $("#select-package").select2({
            dir:"rtl",
        });
        $("#select-day").select2({
            dir:"rtl",
        });
        $("#select-daycount").select2({
            dir:"rtl",
        });
    </script>
    {{--end of select2 for select Hours--}}

    @endsection