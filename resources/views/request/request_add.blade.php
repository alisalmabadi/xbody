@extends('layouts.app')
@section('head')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>

    {{--
        <link rel="stylesheet" href="{{asset('css/jquery.Bootstrap-PersianDateTimePicker.css')}}">
    --}}
    <link rel="stylesheet" href="{{asset('css/select2.min.css')}}">

    <link rel="stylesheet" href="{{asset('css/jquery.md.bootstrap.datetimepicker.style.css')}}">
    <meta content="{{csrf_token()}}" name="content">

    <style>
        #formcap > img{
            margin-left: 13px;
            margin-bottom: 2%;
        }

        .cursor-pointer {
            cursor: pointer;
        }
        .form-group.required .control-label:after {
            content:"*";
            color:red;
        }
    </style>

@endsection
@section('main_content')
    <div class="container">
        <div class="p-2 " style="width: 100%; height: 160px;"></div>
        <div class="mx-auto mt-3 mb-4" style="text-align: center">صفحه ارسال درخواست</div>

        <div class="container">
            <div class="alert alert-success" style="text-align:center;">در این صفحه میتوانید درخواستی برای رزرو جلسات در هر یک از شعبات ایکس بادی ثبت کنید.</div>
        </div>

        <div class="container">
            <div class="alert alert-danger" style="text-align:center;">موارد ستاره دار الزامی میباشند.</div>
        </div>
        <div class="container">
            @if(!empty($errors))
                @foreach($errors->all() as $error)
            <div class="alert alert-danger" style="text-align:center;">{{$error}}</div>
                @endforeach
            @endif
        </div>


        <div class="m-2" style="width:100%;"></div>



        <div class="row mb-5">
            <div class="col-lg-12">
                <section class="card">
                    <header class="card-header" style="text-align: right">
                        رزرو جلسات

                    </header>
                    <div class="card-body">
                        {{--  <div class="stepy-tab">
                              <ul id="default-titles" class="stepy-titles clearfix">
                                  <li id="default-title-0" class="current-step">
                                      <div>انتخاب پکیج مورد نظر</div>
                                  </li>
                                  <li id="default-title-1" class="">
                                      <div>جزئیات</div>
                                  </li>
                                  --}}{{-- <li id="default-title-2" class="">
                                       <div>انتخاب روز ها</div>
                                   </li>--}}{{--
                              </ul>
                          </div>--}}



                        <form class="form-horizontal" id="default" action="{{route('request.getreservesdays')}}" method="POST">
                            {{csrf_field()}}
                            <legend></legend>
                            <div class="form-group form-inline required">
                                <label class="col-md-1 control-label" for="name">نام </label>
                                <div class="col-md-2">
                                    <input name="name" value="{{old('name')}}" class="form-control" style="width: 100%">

                                </div>

                                <label class="col-md-3 control-label" for="lastname">نام خانوادگی</label>
                                <div class="col-md-2">
                                    <input name="lastname" value="{{old('lastname')}}" class="form-control required" style="width: 100%">

                                </div>

                                <label class="col-md-2 control-label" for="lastname">شماره همراه</label>
                                <div class="col-md-2">
                                    <input name="phonenumber" value="{{old('phonenumber')}}" type="number" class="form-control required" style="width: 100%">

                                </div>
                            </div>
                            <div class="form-group form-inline required">
                                <label class="col-md-1 d-inline-block control-label" for="branch" style="text-align: right"> شعبه</label>
                                <div class="col-md-3">
                                    <select name="branch" id="branchs" class="form-control form-control-sm d-inline-block mb-2 mr-sm-2" style="width: 100%;">
                                        <option value="0">
                                            انتخاب کنید
                                        </option>
                                        @foreach($branches as $branch)
                                            <option value="{{$branch->orginal_id}}">{{$branch->name}}</option>
                                        @endforeach
                                    </select>
                                    {{--
                                                                        <input type="text" class="form-control" placeholder="Full Name">
                                    --}}


                                </div>

                                <label class="col-lg-3 control-label">انتخاب پکیج </label>
                                <div class="col-lg-5">
                                    <select name="package" id="package" class="form-control" style="width: 100%;">
                                        <option value="0">
                                            انتخاب کنید
                                        </option>

                                    </select>

                                </div>
                            </div>



                            <div class="form-group form-inline required">
                                <label class="col-sm-2 control-label" style="text-align: right !important;
justify-content: left;">از تاریخ</label>

                                <div class="input-group col-md-3">
                                    <span class="input-group-text cursor-pointer" id="date4" data-mdpersiandatetimepicker="" data-mdpersiandatetimepicker-group="rangeSelector1" data-todate="" data-original-title="" title=""><i class="fa fa-calendar"></i> </span>

                                    <input name="date" type="text" class="form-control" id="toDate2" placeholder="از تاریخ" value="{{old('date')}}" aria-label="date4"
                                           aria-describedby="date4"/>
                                </div>

                                <label class="col-sm-1 control-label">نوع روز</label>
                                <div class="col-sm-1">
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


                                <label class="col-sm-2 control-label mr-5">تعداد روزها در هفته</label>
                                <div class="col-sm-2">
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
                            <div class="form-group form-inline">
                                <label class="col-sm-2 control-label">به جز روز های</label>

                                <select name="days[]" class="expd col-md-9" multiple="">
                                    @foreach($days as $day)
                                        <option value="{{$day->slug}}">{{$day->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group form-inline d-flex justify-content-xl-center  mb-3 control-label required">
                                <label class="col-sm-3 control-label">لطفا کد امنیتی روبرو را وارد کنید:</label>
                                <div id="formcap">
                                    {!! $captcha !!}
                                </div>
                                <input type="text" name="captcha" class="form-control col-md-5">
                            </div>
                            <input type="submit" class="finish btn btn-danger offset-5" value="نمایش روزهای پیشنهادی" />

                        </form>
                        <div class="m-6"></div>
                    </div>
                </section>
            </div>
        </div>


    </div>

@endsection

@section('footer')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.2.2/jquery.form.min.js" integrity="sha384-FzT3vTVGXqf7wRfy8k4BiyzvbNfeYjK+frTVqZeNDFl8woCbF0CYG6g2fMEFFo/i" crossorigin="anonymous"></script>

    <script type="text/javascript" src="{{asset('js/jquery.md.bootstrap.datetimepicker.js')}}"></script>
    <script src="{{asset('js/select2.min.js')}}"></script>
    {{--
        <script src="{{asset('js/jalaali.js')}}" type="text/javascript"></script>
    --}}
    {{--
        <script src="{{asset('js/jquery.Bootstrap-PersianDateTimePicker.js')}}" type="text/javascript"></script>
    --}}
    <script type="text/javascript">

        $('#date4').MdPersianDateTimePicker({
            targetTextSelector: '#toDate2',
            inLine: false,
            groupId: 'rangeSelector1'
        });
        $(".expd").select2({dir:"rtl"});
        /*
            $('#toDate2').change(function () {
                var $this = $(this),
                    value = $this.val();
                alert(value);
            });
            $('[data-name="disable-button"]').click(function() {
                $('[data-mddatetimepicker="true"][data-targetselector="#toDate2"]').MdPersianDateTimePicker('disable', true);
            });
            $('[data-name="enable-button"]').click(function () {
                $('[data-mddatetimepicker="true"][data-targetselector="#toDate2"]').MdPersianDateTimePicker('disable', false);
            });*/

        $('#branchs').change(function () {
            var ids= $(this).val();
            if(ids!=0) {
                $.ajax({
                    url: '{{route('getpackages')}}',
                    type: 'POST',
                    data: {id: ids, _token: $('meta[name="content"]').attr('content')},
                    success: function (data) {
                        $('#package').html(data);
                        /*    $.each(data,function(key,datas){
                                console.log(datas);
                              /!*    $.each(datas,function(index,data2){
                                    /!*  console.log(datas);*!/
          *!/
                                      var html='';
                                 html+= '<option value="'+datas[key].PackageID+'">';
                                 html+= datas[key].PackageName +"</option>";

          /!*
                                  });
          *!/
                               });
          */


                    },
                    error: function (request, data) {
                        alert('ارتباط برقرار نیست لطفا دوباره تلاش کنید.');
                    }
                });
            }

        });


    </script>
@endsection