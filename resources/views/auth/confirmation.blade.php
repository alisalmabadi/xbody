
@extends(str_contains(Request::root(), 'mob.')? 'layouts.mobapp':'layouts.app')
@section('title','تایید شماره')
@section('content')
    @include(str_contains(Request::root(), 'mob.')? 'partials.mobheader':'partials.header')
    <div class="container-fluid login-fluid">

        <div class="container">

            <section class="register-form-main">
                <div class="row">
                    <div class="col-sm-6 register-form" style="height: 500px">
                        <h1 class="title">تایید شماره تلفن همراه</h1>
                        <hr>
                        <div class="col-sm-10 col-sm-offset-1">
                            @if ($errors->has('code_error'))

                                <div class="well confirmation-sended-f">
                                    <i class="icon icon-verifynumber-f"></i>
                                    <span>متاسفانه برای شماره همراه
                                &nbsp;<span id="phone_n" style="font-weight:bold;">{{$user->mobile_number}}</span>&nbsp;
                            کد تایید ارسال نشد لطفا پس از 3 دقیقه مجدد تلاش فرمایید.
                                        {{--<a id="phone_number_mistake" >ویرایش شماره تماس</a>--}}
                                </span>
                                </div>
                            @elseif($errors->has('code_success'))
                                    <div class="well confirmation-sended">
                                        <i class="icon icon-verifynumber"></i>
                                        <span>برای شماره همراه
                                &nbsp;<span id="phone_n" style="font-weight:bold;">{{$user->mobile_number}}</span>&nbsp;
                            کد تایید ارسال گردید
                                            {{--<a id="phone_number_mistake" >ویرایش شماره تماس</a>--}}
                                </span>
                                    </div>
                            @else
                                    <div class="well confirmation-sended">
                                        <i class="icon icon-verifynumber"></i>
                                        <span>برای شماره همراه
                                &nbsp;<span id="phone_n" style="font-weight:bold;">{{$user->mobile_number}}</span>&nbsp;
                            کد تایید ارسال گردید
                                            {{--<a id="phone_number_mistake" >ویرایش شماره تماس</a>--}}
                                </span>
                                    </div>
                            @endif

                            <form  method="POST" action="{{ route('user.confirm',$user) }}" >
                                {{ csrf_field() }}

                                    <div class="form-group">

                                        <input  id="iptLgnPlnID"  tabindex="1" placeholder="____" maxlength="4" class="form-control comfirmation-input"  name="confirmation_code" type="text">

                                    </div>
                                <div class="form-group">

                                    <a href="{{ route('user.resend_code') }}" >ارسال مجدد کد</a>
                                </div>
                                    <div class="form-group">

                                        <input  type="submit" class="btn btn-primary"  value="تایید">

                                    </div>



                            </form>

                        </div>

                    </div>
                    <div class="col-sm-6 register-guidance"  style="height: 500px">

                        <div class="guidance__thumb">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="184px" height="183px" viewBox="0 0 184 183" version="1.1">
                                <defs>
                                    <polygon id="path-1" points="109.965687 100.463101 109.965687 0 55.0189337 0 0.0721807556 0 0.0721807556 100.463101 109.965687 100.463101"></polygon>
                                </defs>
                                <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <g id="verify-code" transform="translate(-398.000000, -277.000000)">
                                        <g id="Page-1" transform="translate(398.000000, 277.000000)">
                                            <path d="M119.051448,91.5 C114.003843,91.5 109.89365,95.6066929 109.89365,100.65 L109.89365,146.4 L18.3156684,146.4 L18.3156684,18.3 L45.7890629,18.3 C50.8366682,18.3 54.9468611,14.1933071 54.9468611,9.15 C54.9468611,4.10669291 50.8366682,0 45.7890629,0 L9.15787027,0 C4.11026499,0 7.21086471e-05,4.10669291 7.21086471e-05,9.15 L7.21086471e-05,173.85 C7.21086471e-05,178.893307 4.11026499,183 9.15787027,183 L119.051448,183 C124.099054,183 128.208886,178.893307 128.208886,173.85 L128.208886,100.65 C128.208886,95.6066929 124.099054,91.5 119.051448,91.5" id="Fill-1" fill="#E6ECEC"></path>
                                            <g id="Group-5" transform="translate(73.190277, 0.000000)">
                                                <mask id="mask-2" fill="white">
                                                    <use xlink:href="#path-1"></use>
                                                </mask>
                                                <g id="Clip-4"></g>
                                                <path d="M91.6501624,45.75 C86.6025571,45.75 82.4923642,41.6433071 82.4923642,36.6 C82.4923642,31.5566929 86.6025571,27.45 91.6501624,27.45 C96.6977677,27.45 100.8076,31.5566929 100.8076,36.6 C100.8076,41.6433071 96.6977677,45.75 91.6501624,45.75 M55.0186092,45.75 C49.9710039,45.75 45.8611716,41.6433071 45.8611716,36.6 C45.8611716,31.5566929 49.9710039,27.45 55.0186092,27.45 C60.0662145,27.45 64.1767679,31.5566929 64.1767679,36.6 C64.1767679,41.6433071 60.0662145,45.75 55.0186092,45.75 M18.3877771,45.75 C13.3401718,45.75 9.22997892,41.6433071 9.22997892,36.6 C9.22997892,31.5566929 13.3401718,27.45 18.3877771,27.45 C23.4353824,27.45 27.5455753,31.5566929 27.5455753,36.6 C27.5455753,41.6433071 23.4353824,45.75 18.3877771,45.75 M106.288218,0 L3.74972175,0 C1.73067964,0 0.0721807556,1.65708661 0.0721807556,3.67440945 L0.0721807556,96.7954724 C0.0721807556,100.037598 4.00210202,101.694685 6.30957872,99.3891732 L35.6217437,74.2807087 C36.3067759,73.5962598 37.2441883,73.2 38.217655,73.2 L106.288218,73.2 C108.30726,73.2 109.965759,71.578937 109.965759,69.5255906 L109.965759,3.67440945 C109.965759,1.65708661 108.30726,0 106.288218,0" id="Fill-3" fill="#E6ECEC" mask="url(#mask-2)"></path>
                                            </g>
                                        </g>
                                    </g>
                                </g>
                            </svg>
                        </div>

                        <div class="guidance__rules rules guidance__rules--verify">

                            <h3 class="rules__title">نحوه تایید شماره تلفن همراه</h3>


                            <ul>
                                <li><span>تا لحظاتی دیگر یک کد احراز هویت از طریق سامانه لب یار برای شما پیامک خواهد شد.</span></li>
                                <li><span>در صورتی که پیامک را دریافت نکردید می توانید مجددا اقدام به دریافت پیامک کنید.</span></li>
                                <li><span>احراز تلفن همراه برای ثبت نام در لب یار الزامیست</span></li>
                            </ul>
                        </div>

                    </div>

                </div>


            </section>

        </div>
    </div>
    @include('partials.footer')

@endsection

@section('script_whole')

@endsection











