@extends('layouts.app')
<link rel="stylesheet" href="{{asset('css/Bodybuilding.css')}}">

<style>
    .header-interview{
        text-align: center;
        margin-top: 10%;
    }
    .gallery-header{
        font-size: xx-large;
        text-align: center;
    }
    .gallery-header-logo{
        width: 31px;
        height: 31px;
        margin-bottom: 10px;
        border-radius: 100%;
    }
    .category-buttons-spot{
        margin-top: 2%;
        align-items: center !important;
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        border-bottom: 3px solid #df0617;
        padding-bottom: 9px;
    }
    .category-buttons{
        width: 100%;
        height: 3%;
        overflow: hidden;
        font-size: 12px;
        border-radius: 10%;
        color: white;
        text-align: center;
        opacity: 0.6;
        transition: 0.5s;
    }
    .category-buttons:hover {opacity: 1}

    .category-buttons-active{opacity: 1}
</style>

@section('main_content')

    <div class="container-fluid">
        <div class="" style="height: 20px;"></div>
        <div style="background-color: rgba(255,255,255,0.3); !important; width: 90%; height: 1005px; margin-right: 5%;">
            <header class="header-interview">

                {{--<span class="col-md-12 gallery-header"><img class="gallery-header-logo" src="{{asset('images/xmark.png')}}">ویدئو های مشتریان <span style="color:red">XBody</span></span>--}}
                <span class="col-md-12 gallery-header"><img class="gallery-header-logo" src="{{asset('images/xmark.png')}}">{{$setting->gallerycustomer_header}}<span style="color:red">XBody</span></span>


                <div class="col-md-12 category-buttons-spot">
                    <div class="col-md-1" style="margin-left: -1%;">
                        <a href="{{route('interview.showByCategory.showAll')}}" class="show_all_interviews"><button type="button" class="btn-danger category-buttons category-buttons-active" style="">نمایش همه</button></a>
                    </div>
                    @foreach($categories as $category)
                        <div class="col-md-1" style="margin-left: -1%;">
                            <a href="{{route('interview.showByCategory')}}" class="show_videos" data-id="{{$category->id}}"><button type="button" class="btn-danger category-buttons">{{$category->name}}</button></a>
                        </div>
                    @endforeach
                </div>
            </header>
            <div class="col-md-12" style="margin-top: 4%;" id="result">
                @foreach($categories as $category)
                    @foreach($category->interviews as $interview)
                        <div class="col-md-4 float-right" style="margin-top: 5%;">
                            @php echo $interview->video @endphp
                        </div>
                    @endforeach
                @endforeach
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
            $(".category-buttons").removeClass("category-buttons-active");
            $(this).find(".category-buttons").addClass("category-buttons-active");
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
                        $("#result").append('<div class="col-md-4 float-right" style="margin-top: 5%;">\n' +
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

    {{--show all--}}
    <script>
        $(".show_all_interviews").on('click' , function (e) {
            e.preventDefault();
            $(".category-buttons").removeClass("category-buttons-active");
            $(this).find(".category-buttons").addClass("category-buttons-active");
            var url = $(this).attr('href');
            $.ajax({
                data:'',
                url:url,
                type:'GET',
                success:function (data) {
                    $("#result").fadeOut('slow');
                    $("#result").html('');

                    $.each(data , function (interview) {
                        $("#result").append('<div class="col-md-4 float-right" style="margin-top: 5%;">\n' +
                            '                    \n' +
                            '                    '+data[interview].video+'\n' +
                            '                </div>').fadeIn('slow');
                    });
                },
                error:function () {
                    console.log('error in getting all interviews by ajax');
                }
            });
        });
    </script>
    {{--end of show all--}}
@endsection