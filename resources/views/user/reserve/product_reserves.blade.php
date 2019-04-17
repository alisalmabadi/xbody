@extends('user.layouts.user_app')
@section('title','Xbody | reserve')
@section('head')
    <link rel="stylesheet" href="{{asset('css/jquery.Bootstrap-PersianDateTimePicker.css')}}">
    <link rel="stylesheet" href="{{asset('css/select2.min.css')}}">


@endsection
@section('content')
    <!-- page start-->
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    رزرو های کاربر

                </header>
                <table class="table table-striped border-top" id="sample_1">
                    <thead>
                    <tr>
                        <th style="width: 8px;">
                            <input type="checkbox" class="group-checkable" data-set="#sample_1 .checkboxes" /></th>
                        <th>شماره رزروی</th>
                        <th class="hidden-phone">تاریخ رزرو</th>
                        <th>نام محصول</th>
                        <th>تعداد</th>
                        <th class="hidden-phone">وضعیت</th>

                    </tr>
                    </thead>
                    <tbody>
                    {{--
                                        <span class="label label-danger">Approved</span>
                    --}}

                    @foreach($productreserve as $productreserveha)

                        <tr class="odd gradeX">
                            <td>
                                <input type="checkbox" class="checkboxes" value="1" />
                            </td>
                            <td>{{Convertnumber2english($productreserveha->id)}}</td>
                            <td class="hidden-phone">{{Convertnumber2english($productreserveha->date)}}</td>
                            <td class="hidden-phone"><a href="{{url('product/')}}/{{$productreserveha->product->category->slug}}/{{$productreserveha->product->slug}}">{{$productreserveha->product->name}}</a></td>
                            <td class="hidden-phone">{{Convertnumber2english($productreserveha->count)}}</td>

                            <td class="hidden-phone">@if($productreserveha->status==1) <button class="btn btn-success" style="background: white;color: black;border: 1px solid#2a3542;"  type="button">تماس گرفته شد</button>  @else <button class="btn btn-danger" type="button">در انتظار تماس</button>  @endif </td>

                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </section>

        </div>
    </div>
    <!-- page end-->


@endsection


@section('footer')
    <script src="{{asset('js/select2.min.js')}}"></script>
    {{--
        <script src="{{asset('js/jalaali.js')}}" type="text/javascript"></script>
    --}}
    {{--
        <script src="{{asset('js/jquery.Bootstrap-PersianDateTimePicker.js')}}" type="text/javascript"></script>
    --}}

    <script type="text/javascript" src="{{asset('js/jquery.dataTables.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/DT_bootstrap.js')}}"></script>
    <script src="{{asset('js/dynamic-table.js')}}"></script>




@endsection