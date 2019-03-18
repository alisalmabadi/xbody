@extends('layouts.app')
<link rel="stylesheet" href="{{asset('css/Bodybuilding.css')}}">

@section('main_content')

    <div class="container-fluid" style="background-image: url({{asset('img/pass.jpg')}}); background-repeat: no-repeat; background-size: cover; clear: both;">
        <div class="row" style="height: 20px;"></div>
        <div style="background-color: rgba(255,255,255,0.3); !important; width: 90%; height: 1005px; margin-right: 5%;">
            <header class="header-interview" style="text-align: right;">
                <h1>گالری</h1>
                @foreach($categories as $category)
                    <div class="col-md-1 float-right">
                        <a href="{{route('interview.showByCategory')}}" class="show_videos" data-id="{{$category->id}}"><button type="button" class="btn-danger" style="width: 100%;height: 5%; overflow: hidden;margin-left: 2%;">{{$category->name}}</button></a>
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

        $(".show_videos").on('click' , function (e) {
           e.preventDefault();
           var id = $(this).data('id');
           var url = $(this).attr('href');
           $.ajax({
                data:{'id' : id},
                url:url,
                type:'GET',
                // async:false,
                success:function (data) {
                    $("#result").fadeOut('slow');
                    $("#result").html('');

                    $.each(data , function (interview) {
                       $("#result").append('<div class="col-md-4 float-left" style="margin-top: 5%;">\n' +
                           '                    \n' +
                           '                    '+data[interview].video+'\n' +
                           '                </div>').fadeIn('slow');
                    });
                },
                error:function (e) {
                    console.log('error in interview show');
                }
           });
        });
    </script>
@endsection