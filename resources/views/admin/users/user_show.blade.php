@extends('layouts.admin_master_full')

@section('content-header')
    <section class="content-header">
        <div class="pull-left">
         <a href="{{route('admin.user.index')}}" data-toggle="tooltip" title="" class="btn btn-default" data-original-title="بازسازی"><i class="fa fa-refresh"></i></a>
        </div>
        <h1>
            مشتریان
        </h1>
        <ol class="breadcrumb">
            <li class="active"><i class="fa fa-users"></i>مشتریان</li>
        </ol>
    </section>
@endsection

@section('content')
    <section class="content">
        <section style="margin-top: 10px">
            <div class="panel panel-default">

                <div class="panel-heading">
                    <h3 class="panel-title"><i class="fa fa-filter"></i> فیلتر</h3>

                </div>
                <div class="panel-body">

                        {{csrf_field()}}
                        <div class="from-group">

                            <div class="col-sm-3">
                            <label class=" control-label" for="search">جستوجو</label>
                            <input class="form-control" name="search" id="search" onkeyup="filter_cat($('#search').val(),$('#city').val())" value="" type="text">
                            </div>

                            <div class="col-sm-3">
                                <label class=" control-label"   for="city">شهر</label>
                                <select name="city" id="city" onchange="filter_cat($('#search').val(),$('#city').val())" class="select2" style="width: 100%;">
                                    <option value="0">همه</option>
                                    @foreach($cities as $city)
                                        <option value="{{$city->id}}">{{$city->name}}</option>

                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>

        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-list"></i>لیست مشتریان</h3>
            </div>
            <div class="panel-body">
                <form action="/admin//destroy" method="post" enctype="multipart/form-data" id="form-category">
                    {{csrf_field()}}
                    {{method_field('DELETE')}}
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <td style="width: 1px;" class="text-center">
                                <input onclick="$('input[name*=\'selected\']').prop('checked', this.checked);" type="checkbox"></td>
                                <td class="text-center" style="max-width: 50px"> نام</td>
                                <td class="text-center" style="max-width: 50px">نام خانودگی</td>
{{--
                                <td class="text-center" style="max-width: 50px">کد ملی</td>
--}}
                                <td class="text-center" style="max-width: 50px">شماره تلفن</td>
                                <td class="text-center" style="max-width: 50px">شماره موبایل</td>
                                <td class="text-center" style="max-width: 30px">استان</td>
                                <td class="text-center" style="max-width: 30px;">شهر</td>
                                <td class="text-center" style="max-width: 150px;text-overflow: ellipsis;">آدرس</td>
                                <td class="text-center" style="max-width: 70px">کد پستی</td>
                                <td class="text-center" style="max-width: 70px">نوع کاربر</td>
                                <td class="text-center" style="max-width: 150px">عملیات</td>


                            </thead>
                            <tbody id="ajx_content_cat">
                            @foreach($users as $user)
                                <tr>
                                    <td class="text-center">
                                        <input name="selected[]" value="{{$user->id}}" type="checkbox">
                                    </td>
                                    <td class="text-center">{{$user->name}}</td>
                                    <td class="text-center">{{$user->last_name}}</td>
{{--
                                    <td class="text-center">{{$user->nation_code}}</td>
--}}
                                    <td class="text-center">{{$user->tel_number}}</td>
                                    <td class="text-center">{{$user->mobile_number}}</td>
                                    <td class="text-center">@if(!is_null($user->province)){{$user->province->name}}@else تنظیم نشده @endif </td>
                                    <td class="text-center">@if(!is_null($user->city)){{$user->city->name}}@else تنظیم نشده @endif </td>

                                    <td class="text-center" style="max-width: 150px;text-overflow: ellipsis;">{{$user->address}}</td>
                                    <td class="text-center">{{$user->postal_code}}</td>
                                    <td class="text-center">@if($user->user_type==0)<button class="btn btn-success" type="button">حقیقی</button> @else<button class="btn btn-danger" type="button">حقوقی</button> @endif</td>
                                    <td class="text-center">

                                        <a href="{{route('admin.user.destroy',$user)}}" onclick="return confirm('با حذف مشتری تمام سفارشات و مشتری نیز حذف خواهد شد!')" data-toggle="tooltip" title="حذف" class="btn btn-danger" data-original-title="حذف"><i class="fa fa-remove"></i></a>
                                    </td>


                                </tr>
                            @endforeach

                            <div class="modal fade" id="myModal" role="dialog">
                                <div class="modal-dialog">

                                    <!-- Modal content-->
                                    <div id="modal-bodyy" class="modal-content">

                                    </div>

                                </div>
                            </div>


                            </tbody>
                        </table>
                    </div>
                </form>

            </div>
        </div>

    </section>

@endsection


@section('admin-footer')
    <script>
      var html;
    $(document).ready(function ()
    {
        $('.select2').select2({
        dir:'rtl',
        });
    });

    function filter_cat(search,category_id) {

        var data={
            search:search,
            city:category_id,
            _token:$('input[name=_token]').val()

        };
        $.post('{{route('admin.user.filter')}}',data,function(response)
        {
            $('#ajx_content_cat').empty();
            $.each(response, function(i, obj) {
                    html='<tr>';
                    html+='<td class="text-center">';
                    html+='<input name="selected[]" value="'+obj.id+'" type="checkbox">';
                    html+='</td>';
                    html+='<td class="text-center">'+obj.name+'</td>';
                    if(obj.last_name !==null)
                    {
                        html+='<td class="text-center">'+obj.last_name+'</td>';
                    }else
                    {
                        html+='<td class="text-center">تنظیم نشده</td>';
                    }


                    if(obj.tel_number !==null)
                    {
                        html+='<td class="text-center">'+obj.tel_number+'</td>';
                    }else
                    {
                        html+='<td class="text-center">تنظیم نشده</td>';
                    }

                    html+='<td class="text-center">'+obj.mobile_number+'</td>';
                    if(obj.province !==null)
                    {
                        html+='<td class="text-center">'+obj.province.name+'</td>';
                    }else
                    {
                        html+='<td class="text-center">تنظیم نشده</td>';
                    }

                    if(obj.city !==null)
                    {
                        html+='<td class="text-center">'+obj.city.name+'</td>';
                    }else
                    {
                        html+='<td class="text-center">تنظیم نشده</td>';
                    }

                    if(obj.address !== null)
                    {
                        html+='<td class="text-center" style="max-width: 150px;text-overflow: ellipsis;">'+obj.address+'</td>';
                    }else
                    {
                        html+='<td class="text-center">تنظیم نشده</td>';
                    }
                    if(obj.postal_code !== null)
                    {
                        html+='<td class="text-center">'+obj.postal_code+'</td>';
                    }else
                    {
                        html+='<td class="text-center">تنظیم نشده</td>';
                    }



                    html+='<td class="text-center">';
                    html+='<a href="{{route('home')}}/admin/user/destroy/'+obj.id+'" onclick="return confirm(\'با حذف مشتری تمام سفارشات و مشتری نیز حذف خواهد شد!\')" data-toggle="tooltip" title="حذف" class="btn btn-danger" data-original-title="حذف"><i class="fa fa-remove"></i></a> </td>';
                $('#ajx_content_cat').append(html);
            });
        });
    }
    </script>
@stop
