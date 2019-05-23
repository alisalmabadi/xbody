@extends('layouts.app')
@section('head')
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.4.0/dist/leaflet.css"
          integrity="sha512-puBpdR0798OZvTTbP4A8Ix/l+A4dHDD0DGqYW6RQ+9jxkRFclaxxQb/SJAWZfWAkuyeQUytO7+7N4QKrDh+drA=="
          crossorigin=""/>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <link rel="stylesheet" href="{{asset('css/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/jquery.md.bootstrap.datetimepicker.style.css')}}">
    <meta content="{{csrf_token()}}" name="content">

    <style>
        .xbody-img{
            width: 100%;
            height:80%;
            margin-left: 10%;
            margin-top: 13%;
            border-radius: 17px;
            box-shadow: 8px 9px 15px 0px grey;
        }
        .titlebranch{
            border-bottom: 1px solid #f7ced6;
            font-weight: bold;
            font-size: 25px;
        }
        .desc-element{
            margin-left: 100%;
        }

        @media only screen and (max-width: 800px) {
            .naghshe {
                height: 327px;
            }

            .naghshe-label {
                margin-left: 30% !important;
            }

            .form {
                margin-top: 20%;
            }

            .form-label {
                display: inline-flex !important;
                margin-left: 40%;
            }

            .register_gif {
                margin-top: 15% !important;
                margin-left: 10% !important;
            }

            .titlebranch{
                margin-top: 44px;
            }
            .branchinfo{
                margin-top: 13% !important;
                text-align: center !important;
            }
            span.btn.btn-primary.btn-address{
                margin-top: 7px;
                margin-bottom: 7px;
            }
        }
        .branchinfo{
            margin-top: 2%;
            margin-bottom: 3%;

        }

       .btn-address{
            background-color:#343e44;
            border-color:#dc3545;
        }

        span.btn.btn-primary.btn-address:hover {
    background: #dc3545;
    border-color: red;
}

.btnsocial {
    background: transparent !important;
    border: none;
}
    </style>
@endsection
@section('main_content')
    <div class="container-fluid">
        <div class="p-2 " style="width: 100%; height: 160px;"></div>
        @php
        $i=1;
        @endphp
        @foreach($branches as $branch)
@if($branch->page_url!=null)
        <div class="row xbody-form-group" style=" @if($i==1) display: inline-flex !important; @endif">
            @if($i%2)
            <div class="col-md-3">
                <img class="xbody-img" src="{{$branch->image_original}}">
            </div>
            <div class="col-md-9">
                <p class="titlebranch" style="text-align: right;">  شعبه {{$branch->name}}</p>
                <div style="text-align: right;">
                    {!! $branch->description !!}
                </div>

            </div>
                <div class="col-md-12 branchinfo" style="text-align: left;">
                    <span class="btn btn-danger"><i class="fa fa-phone-square"></i> {{$branch->phone}}</span>
                    <span class="btn btn-primary btn-address" style="white-space: normal;"><i class="fa fa-map"></i> {{$branch->address}}</span>
                    <a href="{{$branch->page_url}}" target="_blank">
                        <span class="btn btn-danger"><i class="fa fa-tv"></i> صفحه شعبه</span>
                    </a>
                    @if($branch->social_media)
                        @if(json_decode($branch->social_media)->telegram_id !=null)
                            <a href="https://t.me/{{json_decode($branch->social_media)->telegram_id}}" target="_blank">
                                <span class="btn btn-info btnsocial"><img src="{{asset('images/telegram.png')}}" style="width: 80%; height: 80%"></span>
                            </a>
                        @endif
                        @if(json_decode($branch->social_media)->instagram_id !=null)
                            <a href="https://instagram.com/{{json_decode($branch->social_media)->instagram_id}}" target="_blank">
                                <span class="btn btn-light btnsocial"><img src="{{asset('images/instagram.png')}}" style="width: 80%; height: 80%"></span>
                            </a>
                        @endif
                    @endif
                </div>

            @else
                <div class="col-md-9">
                    <p class="titlebranch" style="text-align: right;">شعبه {{$branch->name}} </p>
                    <p style="text-align: right;">
                        {!! $branch->description !!}
                    </p>

                </div>
                <div class="col-md-3">
                    <img class="xbody-img" src="{{$branch->image_original}}">
                </div>
                <div class="col-md-12 branchinfo" style="text-align: right;">
                    <span class="btn btn-danger"><i class="fa fa-phone-square"></i> {{$branch->phone}}</span>
                    <span class="btn btn-primary btn-address" style="white-space: normal;"><i class="fa fa-map"></i> {{$branch->address}}</span>
                    <a href="{{$branch->page_url}}" target="_blank">
                        <span class="btn btn-danger"><i class="fa fa-tv"></i> صفحه شعبه</span>
                    </a>
                    @if($branch->social_media)
                        @if(json_decode($branch->social_media)->telegram_id !=null)
                            <a href="https://t.me/{{json_decode($branch->social_media)->telegram_id}}" target="_blank">
                                <span class="btn btn-info btnsocial"><img src="{{asset('images/telegram.png')}}" style="width: 80%; height: 80%"></span>
                            </a>
                        @endif
                        @if(json_decode($branch->social_media)->instagram_id !=null)
                            <a href="https://instagram.com/{{json_decode($branch->social_media)->instagram_id}}" target="_blank">
                                <span class="btn btn-light btnsocial"><img src="{{asset('images/instagram.png')}}" style="width: 80%; height: 80%"></span>
                            </a>
                        @endif
                    @endif
                </div>

            @endif
        </div>
            @php
                $i++;
            @endphp
@endif
            @endforeach
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-6 naghshe">
                <label class="naghshe-label" style="margin-left: 66%;">موقعیت شعبات روی نقشه</label>
                <div id="mapid" style="height: 88%; z-index: 2;"></div>
            </div>
            <div class="col-md-6 form">
                <label class="form-label" style="display: none;">فرم تماس با ما</label>
                <form action="{{route('message.store')}}" method="post" id="frm-send-message">
                    {{csrf_field()}}
                    <input type="hidden" name="status" value="0">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <input class="form-control" type="text" id="field_name" name="name" placeholder="نام">
                                <label id="name_error" class="pull-right" style="color:red; display: none;font-size: 12px;"></label>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group">
                                <input class="form-control" type="text" id="field_lastname" name="lastname" placeholder="نام خانوادگی">
                                <label id="lastname_error" class="pull-right" style="color:red; display: none;font-size: 12px;"></label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="text" name="phonenumber" id="field_phonenumber" placeholder="تلفن همراه">
                        <label id="phonenumber_error" class="pull-right" style="color:red; display: none;font-size: 12px;"></label>
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="text" name="title" id="field_title" placeholder="عنوان">
                        <label id="title_error" class="pull-right" style="color:red; display: none;font-size: 12px;"></label>
                    </div>
                    <div class="form-group">
                        <textarea name="text" rows="5" class="form-control" id="field_text" placeholder="متن"></textarea>
                        <label id="text_error" class="pull-right" style="color:red; display: none;font-size: 12px;"></label>
                    </div>
                    <div class="form-group">
                        <button class="form-control btn btn-danger" id="btn-send-message">ارسال</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{--waiting gif--}}
    <div class="container-fluid" id="register_wait" style="width: 100%;height: 100%;position: fixed;top: 0;background-color: #0000005c;z-index:5;display: none;">
        <img class="register_gif" src="{{ asset('images/rolling.gif') }}" style="margin-top: 8%;margin-left: 36%;">
    </div>
    {{--end of waiting gif--}}
@endsection

@section('footer')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.2.2/jquery.form.min.js" integrity="sha384-FzT3vTVGXqf7wRfy8k4BiyzvbNfeYjK+frTVqZeNDFl8woCbF0CYG6g2fMEFFo/i" crossorigin="anonymous"></script>

    <script type="text/javascript" src="{{asset('js/jquery.md.bootstrap.datetimepicker.js')}}"></script>
    <script src="{{asset('js/select2.min.js')}}"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.33.1/dist/sweetalert2.all.min.js"></script>

    <!-- Make sure you put this AFTER Leaflet's CSS -->
    <script src="https://unpkg.com/leaflet@1.4.0/dist/leaflet.js"
            integrity="sha512-QVftwZFqvtRNi0ZyCtsznlKSWOStnDORoefr1enyq5mVL4tmKB3S/EnC3rRJcxCPavG10IcrVGSmPh6Qw5lwrg=="
            crossorigin=""></script>
    {{--map script--}}
    <script>
        var mymap = L.map('mapid').setView([35.69522525087309, 51.40777587890626], 13);
        L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
            maxZoom: 18,
           /* attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
            '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
            'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',*/
            id: 'mapbox.streets'
        }).addTo(mymap);
        var DefaultIcon = L.icon({
            iconUrl: '{{asset('images/mapicon.png')}}',
            /* shadowUrl: 'leaf-shadow.png',*/

            iconSize:     [38, 60], // size of the icon
            shadowSize:   [50, 64], // size of the shadow
            iconAnchor:   [22, 94], // point of the icon which will correspond to marker's location
            shadowAnchor: [4, 62],  // the same for the shadow
            popupAnchor:  [-3, -76] // point from which the popup should open relative to the iconAnchor
        });
        /*marker*/
        <?php
        foreach($branches as $branch){
        ?>
        var marker = L.marker([{{$branch->xplace}},{{$branch->yplace}}],{icon:DefaultIcon}).addTo(mymap);
        /*marker text*/



        marker.bindPopup("<b>{{$branch->name}}</b><br>ایکس بادی").openPopup();
<?php } ?>
       {{-- var marker2 = L.marker([35.66622234103479, 51.37893676757813]).addTo(mymap);
        marker2.bindPopup("<b>شعبه پاسداران</b><br>ایکس بادی").openPopup();--}}
    </script>



    {{--ajax send message--}}
    <script>
        $("#btn-send-message").on('click' , function (event) {
           event.preventDefault();
            $("#register_wait").css('display' , 'block');
            $("#name_error").css('display' , 'none');
            $("#lastname_error").css('display' , 'none');
            $("#title_error").css('display' , 'none');
            $("#phonenumber_error").css('display' , 'none');
            $("#text_error").css('display' , 'none');

            var data = $("#frm-send-message").serialize();
            var url = $("#frm-send-message").attr('action');
            var type = $("#frm-send-message").attr('method');

            $.ajax({
                data:data,
                url:url,
                type:type,
                success:function (data) {
                    $("#register_wait").css('display' , 'none');
                    swal(
                        'ارسال شد',
                        'پیام شما با موفقیت ارسال شد.',
                        'success'
                    );
                    $('#field_name').val('');
                    $('#field_lastname').val('');
                    $('#field_phonenumber').val('');
                    $('#field_title').val('');
                    $('#field_text').val('');

                },
                error:function (error) {
                    if(error.responseJSON.errors.name){
                        $("#name_error").text(error.responseJSON.errors.name[0]);
                        $("#name_error").css('display' , 'inline-flex');
                    }
                    if(error.responseJSON.errors.lastname){
                        $("#lastname_error").text(error.responseJSON.errors.lastname[0]);
                        $("#lastname_error").css('display' , 'inline-flex');
                    }
                    if(error.responseJSON.errors.phonenumber){
                        $("#phonenumber_error").text(error.responseJSON.errors.phonenumber[0]);
                        $("#phonenumber_error").css('display' , 'inline-flex');
                    }
                    if(error.responseJSON.errors.title){
                        $("#title_error").text(error.responseJSON.errors.title[0]);
                        $("#title_error").css('display' , 'inline-flex');
                    }
                    if(error.responseJSON.errors.text){
                        $("#text_error").text(error.responseJSON.errors.text[0]);
                        $("#text_error").css('display' , 'inline-flex');
                    }
                    $("#register_wait").css('display' , 'none');
                }
            });
        });
    </script>



@endsection