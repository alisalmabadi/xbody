@extends('layouts.admin_master_full')

@section('content-header')
    <section class="content-header">
        <div class="pull-left">
             <a href="{{route('admin.report.product')}}" data-toggle="tooltip" title="" class="btn btn-default" data-original-title="بازسازی"><i class="fa fa-refresh"></i></a>

        </div>
        <h1>
          گزارشات
        </h1>
        <ol class="breadcrumb">

            <li class="active"><i class="fa fa-product-hunt"></i>کالاها</li>
        </ol>
    </section>
@endsection

@section('content')
    <section  style="margin-top: 10px">

        <section style="margin-top: 10px">
            <div class="panel panel-default">

                <div class="panel-heading">
                    <h3 class="panel-title"><i class="fa fa-filter"></i> فیلتر</h3>

                </div>
                <div class="panel-body">
                    <form action="{{route('admin.report.product')}}" method="post" class="form-horizontal">
                        {{csrf_field()}}
                        <div class="from-group">

                            {{--<div class="col-sm-3">--}}
                            {{--<label class=" control-label" for="search">جستوجو</label>--}}
                            {{--<input class="form-control" name="search" id="search" onkeyup="" value="{{$filter['search']}}" type="text">--}}

                            {{--</div>--}}
                            <div class="col-sm-3">
                                <label class=" control-label" for="search">جستوجو</label>
                                <input type="text" class="form-control" name="search" id="search" value="{{$filter['search']}}">

                            </div>

                            <div class="col-sm-2">
                                <label class=" control-label" for="category">دسته بندی</label>
                                <select  name="category" id="category" class="form-control select2">
                                    <option value="0" @if($filter['category']==0) selected @endif>همه</option>
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}" @if($filter['category']==$category->id) selected @endif>{{$category->name}}</option>
                                    @endforeach
                                </select>

                            </div>

                            <div class="col-sm-2">
                                <label class="control-label" for="category_id">فروش از تاریخ</label>

                                <input id="date_from_observer"  name="date_from"  value="{{$filter['date_from']}}" type="hidden" >
                                <input class="form-control" id="date_from"  value="{{$filter['date_from']}}" >

                            </div>
                            <div class="col-sm-2">

                                <label class="control-label" for="category_id">تا تاریخ</label>

                                <input id="date_to_observer" name="date_to"  value="{{$filter['date_to']}}" type="hidden" >
                                <input class="form-control" id="date_to"  value="{{$filter['date_to']}}" >

                            </div>
                            <div class="col-sm-2">
                                <label for="">&nbsp;&nbsp;&nbsp;</label>
                                <input class="btn btn-primary form-control" type="submit" value="اعمال" >
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </section>
        <section style="margin-top: 10px">
            <div class="panel panel-default">

                <div class="panel-heading">
                    <h3 class="panel-title"><i class="fa fa-list-alt"></i> نتیجه گزارش</h3>

                </div>
                <div class="panel-body">
                    <div class="col-sm-3">
                        <label for="total_count_orders">تعداد کل فروش</label>
                        <span id="total_count_orders"   class="form-control"  style="width: 100%;">{{$total_count}}</span>
                    </div>
                    <div class="col-sm-3">
                        <label for="total_orders_price">مبلغ کل فروش</label>
                        <span id="total_orders_price"   class="price-field form-control"  style="width: 100%;">{{$total_price}}</span>
                    </div>
                    <div class="col-sm-3">
                        <label for="total_profit_orders">مبلغ کل سود</label>
                        <span id="total_profit_orders"   class="price-field form-control"  style="width: 100%;">{{$total_profit}}</span>
                    </div>
                </div>
            </div>
        </section>

    </section>
    <section class="content">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-list"></i>لیست کالاها</h3>
            </div>
            <div class="panel-body">
                <form action="/admin/product/destroy" method="post" enctype="multipart/form-data" id="form-category">
                    {{csrf_field()}}
                    {{method_field('DELETE')}}
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead>
                            <tr>

                                <td class="text-center">کد</td>
                                <td class="text-center">نام</td>
                                <td class="text-center">دسته</td>
                                <td class="text-center">تعداد فروش(در بازه تاریخ)</td>
                                <td class="text-center">میزان فروش(ریال)</td>
                                <td class="text-center">میزان سود(ریال)</td>

                            </tr>
                            </thead>
                            <tbody id="ajx_content_cat">
                            @foreach($products as $product)
                                <tr>
                                    <td class="text-center">{{$product->id}}</td>
                                    <td class="text-center">{{$product->name}}</td>
                                    <td class="text-center">{{$product->category->name}}</td>
                                    <td class="text-center">{{$product->sell_count}}</td>
                                    <td class="text-center" class="price-field"><span class="price-field"> {{$product->sell_price}}</span></td>
                                    <td class="text-center" > <span class="price-field"> {{$product->sell_profit}}</span></td>

                                </tr>
                            @endforeach



                            </tbody>
                        </table>
                    </div>
                </form>

            </div>
        </div>

    </section>

@endsection
@section('admin-footer')
    <script type="application/javascript">


        $("#date_from").pDatepicker({
            observer: true,
            format: 'YYYY/MM/DD',
            altField: '#date_from_observer'
        });
        $("#date_to").pDatepicker({
            observer: true,
            format: 'YYYY/MM/DD',
            altField: '#date_to_observer'
        });


        $(document).ready(function ()
        {
            $('.select2').select2({
                dir:'rtl',
            });
        });

    </script>

@stop

