@extends('layouts.app')
<link rel="stylesheet" href="{{asset('css/Bodybuilding.css')}}">

@section('main_content')

    <div class="container-fluid" style="background-image: url({{asset('img/pass.jpg')}}); background-repeat: no-repeat; background-size: cover; clear: both;">
        <div class="row" style="height: 20px;"></div>
        <div style="background-color: rgba(255,255,255,0.3); !important; width: 90%; height: 1005px; margin-right: 5%;">
            <header class="header-interview" style="text-align: right;">
                <h1>گالری</h1>
                @foreach($galleries as $gallery)
                    <div class="col-md-1 float-right">
                        <a href="{{route('gallery.showByCategory')}}" class="show_gallery" data-id="{{$gallery->id}}" data-type="{{$gallery->type}}"><button type="button" class="btn-danger" style="width: 100%;height: 5%; overflow: hidden;margin-left: 2%;">{{$gallery->name}}</button></a>
                    </div>
                @endforeach
            </header>
            <div class="" id="result">
            </div>
        </div>
        <div class="row" style="height: 20px;"></div>
    </div>

@endsection

@section('footer')
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(".show_gallery").on('click' , function (e) {
            e.preventDefault();
            var id = $(this).data('id');
            var type = $(this).data('type');
            var url = $(this).attr('href');
            $.ajax({
                data:{'id' : id , 'type' : type},
                url:url,
                type:'GET',
                // async:false,
                success:function (data) {
                    $("#result").fadeOut('slow');
                    $("#result").html('');
                    /*gallery_photo*/
                    if(type == '0'){
                        $.each(data , function(gallery){
                            var site_path = '{{ URL::asset('') }}';
                            var image_path = site_path + data[gallery].image_path;
                            $("#result").append('<div class="col-md-4 float-left" style="margin-top: 5%;">\n' +
                                '                    \n' +
                                '<img src="'+image_path+'" style="width:350px;height:300px;">\n' +
                                '                </div>').fadeIn('slow');
                        });
                    }/*gallery_video*/
                    else if(type == 1){
                        $.each(data , function (gallery) {
                            $("#result").append('<div class="col-md-4 float-left" style="margin-top: 5%;">\n' +
                                '                    \n' +
                                '                    '+data[gallery].video_path+'\n' +
                                '                </div>').fadeIn('slow');
                        });
                    }
                    /*$.each(data , function (gallery) {
                        $("#result").append('<div class="col-md-4 float-left" style="margin-top: 5%;">\n' +
                            '                    \n' +
                            '                    '+data[gallery].video+'\n' +
                            '                </div>').fadeIn('slow');
                    });*/
                },
                error:function (e) {
                    console.log('error in interview show');
                }
            });
        });
    </script>
@endsection