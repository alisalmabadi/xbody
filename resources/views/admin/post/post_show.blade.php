@extends('layouts.admin_master_full')

@section('content-header')
    <section class="content-header">
        <div class="pull-left">
            <a href="{{route('admin.post.create')}}" data-toggle="tooltip" title="" class="btn btn-primary" data-original-title="افزودن"><i class="fa fa-plus"></i></a> <a href="{{route('admin.post.index')}}" data-toggle="tooltip" title="" class="btn btn-default" data-original-title="بازسازی"><i class="fa fa-refresh"></i></a>
            <button type="button" data-toggle="tooltip" title="" class="btn btn-danger" onclick="confirm('آیا مطمئن هستید؟') ? $('#form-category').submit() : false;" data-original-title="حذف"><i class="fa fa-trash-o"></i></button>
        </div>
        <h1>
           نوشته ها

        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-globe"></i> وبسایت</a></li>
            <li class="active"><i class="fa fa-sticky-note"></i>نوشته ها</li>
        </ol>
    </section>
@endsection

@section('content')
    <section  style="margin-top: 10px">
        <div class="panel panel-default">

            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-filter"></i> فیلتر</h3>

                </div>
            <div class="panel-body">
                <div class="from-group">

                    <div class="col-sm-3">
                        <label class=" control-label" for="search">جستوجو</label>
                        <input type="text" class="form-control" name="search" id="search" onkeyup="filter_cat($('#search').val(),$('#type').val(),$('#post_type').val(),$('#resource_id').val())">

                    </div>

                    <div class="col-sm-2">
                        <label class=" control-label" for="post_type">موقعیت</label>
                        <select   name="post_type" id="post_type" style=" width: 100%!important;" class="form-control typesel" onchange="filter_cat($('#search').val(),$('#type').val(),$('#post_type').val(),$('#resource_id').val())">
                            <option value="0">همه</option>
                            <option value="1">صفحه اصلی</option>
                            <option value="2">دسته ها</option>
                            <option value="3">محصولات</option>
                        </select>

                    </div>

                    <div class="col-sm-3">
                        <label class="control-label" for="resource_id">برای</label>
                        <select  name="resource_id" id="resource_id" style=" width: 100%!important;"  class="form-control typeselreq" onchange="filter_cat($('#search').val(),$('#type').val(),$('#post_type').val(),$('#resource_id').val())">
                            <option value="0">همه</option>
                        </select>

                    </div>
                    <div class="col-sm-3">
                        <label class="control-label" for="resource_id">نوع</label>
                        <select name="type" id="type" style=" width: 100%!important;" onchange="filter_cat($('#search').val(),$('#type').val(),$('#post_type').val(),$('#resource_id').val())" class="form-control typesel" >
                            <option value="0">همه</option>
                            <option value="1">متن</option>
                            <option value="2">متن و عکس(متن راست)</option>
                            <option value="3">متن و عکس(متن چپ)</option>
                            <option value="4">متن و ویدو(متن راست)</option>
                            <option value="5">متن و ویدو(متن چپ)</option>
                            <option value="6">عکس تکی</option>
                            <option value="7">عکس با عنوان</option>
                            <option value="8">ویدیو تکی</option>
                            <option value="9">ویدیو دوتایی</option>
                            <option value="10">اطلاعات کالا ها</option>
                            <option value="11">اطلاعات کامل متن</option>
                            <option value="12">اطلاعات کامل عکس</option>
                        </select>


                    </div>

                </div>
        </div>
        </div>
    </section>
    <section class="content">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-list"></i> لیست نوشته ها</h3>
            </div>
            <div class="panel-body">
                <form action="/admin/post/destroy" method="post" enctype="multipart/form-data" id="form-category">
                    {{csrf_field()}}
                    {{method_field('DELETE')}}
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <td style="width: 1px;" class="text-center">
                                <input onclick="$('input[name*=\'selected\']').prop('checked', this.checked);" type="checkbox"></td>
                                <td class="text-center">عنوان</td>
                                <td class="text-center">نوع</td>
                                <td class="text-center">صفحه</td>
                                <td class="text-center">تاریخ ایجاد</td>
                                <td class="text-center">ترتیب</td>
                                <td class="text-center">عملیات</td>
                            </tr>
                            </thead>
                            <tbody id="ajx_content_cat">
                            @foreach($posts as $post)
                                <tr>
                                <td class="text-center">
                                <input name="selected[]" value="{{$post->id}}" type="checkbox">
                                </td>
                                <td class="text-center">{{$post->title}}</td>
                                <td class="text-center">{{get_type_name($post->type)}}</td>
                                <td class="text-center">{{get_post_type_name($post->post_type)}}</td>
                                <td class="text-center">{{$post->created_at}}</td>
                                <td class="text-center">{{$post->order}}</td>
                                <td class="text-center"><a href="{{route('admin.post.edit',$post)}}" data-toggle="tooltip" title="" class="btn btn-primary" data-original-title="ویرایش"><i class="fa fa-pencil"></i></a></td>
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
        function get_post_type_name(id)
        {
            var list=["","صفحه اصلی","دسته ها","محصولات"];


            return list[id];

        }

        function get_type_name(id)
        {
            var list=["","متن","متن و عکس(متن راست)","متن و عکس(متن چپ)","متن و ویدو(متن راست)",
                "متن و ویدو(متن چپ)","عکس تکی","عکس با عنوان","ویدیو تکی","ویدیو دوتایی"];


            return list[id];

        }

        $('.typesel').select2();
        $('.typeselreq').select2({placeholder:'موقعیت انتخاب شود'});

        function filter_cat(search,type,posttype,resorece) {

            var data={
                r_search:search,
                r_type:type,
                r_posttype:posttype,
                r_resorece:resorece
            };

            $.post('{{route('admin.post.filter')}}',data,function(response)
            {
                $('#ajx_content_cat').empty();
                $.each(response, function(i, obj) {
                    html='<tr>';
                    html+='<td class="text-center">';
                    html+='<input name="selected[]" value="'+obj.id+'" type="checkbox">';
                    html+='</td>';
                    html+='<td class="text-center">'+obj.title+'</td>';
                    html+='<td class="text-center">'+get_type_name(obj.type)+'</td>';
                    html+='<td class="text-center">'+get_post_type_name(obj.post_type)+'</td>';
                    html+='<td class="text-center">'+obj.created_at+'</td>';
                    html+='<td class="text-center">'+obj.order+'</td>';
                    html+='<td class="text-center"><a href="/admin/post/'+obj.id+'/edit" data-toggle="tooltip" title="" class="btn btn-primary" data-original-title="ویرایش"><i class="fa fa-pencil"></i></a></td>';
                    html+='</tr>';
                    $('#ajx_content_cat').append(html);

                });

            });


        }

        $('#post_type').change(function() {

            type=this.value;

            $.ajax({
                url: '{{route('admin.post.get_post_type')}}',
                dataType: 'json',
                type: 'POST',
                data: {"post_type":type},
                success: function(response) {
                    $('#resource_id').empty();
                    $('#resource_id').append('<option value="0">همه</option>');
                    $.each(response, function(i, obj) {
                        $('#resource_id').append('<option value="'+obj.id+'">'+obj.name+'</option>');
                    });
                    $('.typesel').select2();

                },
                error: function(x, e) {

                }

            });

        });




    </script>

@stop

