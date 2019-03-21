@extends('layouts.admin_master_full')

@section('content-header')
    <section class="content-header">
        <div class="pull-left">
             <a href="{{route('admin.message.index')}}" data-toggle="tooltip" title="" class="btn btn-default" data-original-title="بازسازی"><i class="fa fa-refresh"></i></a>
        </div>
        <h1>
            پیام ها

        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> وبسایت</a></li>
            <li class="active">پیام ها</li>
        </ol>
    </section>
@endsection

@section('content')

    <section class="content">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-list"></i>کلیه پیام ها</h3>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <td class="text-center">عنوان</td>
                        <td class="text-center">نام</td>
                        <td class="text-center">شماره تلفن</td>
                        <td class="text-center">وضعیت</td>
                        <td class="text-center">متن پیام</td>
                        <td class="text-center">عملیات</td>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($messages as $message)
                        <tr class="row_{{$message->id}}">
                            <td class="text-center">{{$message->title}}</td>
                            <td class="text-center">{{$message->name . ' ' .$message->lastname}}</td>
                            <td class="text-center">{{$message->phonenumber}}</td>
                            <td class="text-center">
                                <select class="select-message-status" data-id="{{$message->id}}">
                                    <option class="option-message-status" value="0" @if($message->status == 0) selected @endif>دیده نشده</option>
                                    <option class="option-message-status" value="1" @if($message->status == 1) selected @endif>دیده شده</option>
                                </select>
                            </td>
                            <td class="text-center">{{$message->text}}</td>
                            <td class="text-center">
                                <a class="btn-delete-message" href="{{route('admin.message.delete' , $message->id)}}"><button class="btn btn-danger"><i class="fa fa-trash-o"></i></button></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </section>

@endsection

@section('admin-footer')

    {{--Delete message--}}
    <script>
        $(".btn-delete-message").on('click' , function (e) {
           var conf = confirm('آیا مطمئن هستید؟');
           if(conf){}else{e.preventDefault();}
        });
    </script>

    {{--change status ajax--}}
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(".select-message-status").on('change' , function () {
            var data = $(this).val();
            var url = "{{route('admin.message.changeStatus')}}";
            var id = $(this).data('id');
           $.ajax({
                data : {'id':id , 'value':data},
                url:url,
                type:'POST',
                success:function (data) {
                    $(".row_" + data).animate({
                        backgroundColor : 'green',
                    },500);
                    $(".row_" + data).animate({
                        backgroundColor : '#fff',
                    },500);
                },
               error:function (error) {
                   console.log('err');
               }
           });
        });
    </script>

@endsection