@extends('layouts.admin_master_full')

@section('content-header')
    <section class="content-header">
        <div class="pull-left">
            <a href="{{route('admin.product.create')}}" data-toggle="tooltip" title="" class="btn btn-primary" data-original-title="افزودن"><i class="fa fa-plus"></i></a> <a href="{{route('admin.product.index')}}" data-toggle="tooltip" title="" class="btn btn-default" data-original-title="بازسازی"><i class="fa fa-refresh"></i></a>
            <button type="button" data-toggle="tooltip" title="" class="btn btn-danger" onclick="confirm('آیا مطمئن هستید؟') ? $('#form-category').submit() : false;" data-original-title="حذف"><i class="fa fa-trash-o"></i></button>
        </div>
        <h1>
            کالا ها
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-shopping-bag"></i> فروشگاه</a></li>
            <li class="active"><i class="fa fa-product-hunt"></i>کالاها</li>
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
                        <label class=" control-label" for="search">جستجو</label>
                        <input type="text" class="form-control" name="search" id="search" onkeyup="filter_cat($('#search').val(),$('#category_id').val())">

                    </div>

                    <div class="col-sm-2">
                        <label class=" control-label" for="category_id">دسته بندی</label>
                        <select  name="category_id" id="category_id" style=" width: 100%!important;" class="form-control typesel" onchange="filter_cat($('#search').val(),$('#category_id').val())">
                            <option value="0">همه</option>
                            @foreach($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>

                    </div>



                </div>
            </div>
        </div>
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
                                <td style="width: 1px;" class="text-center">
                                    <input onclick="$('input[name*=\'selected\']').prop('checked', this.checked);" type="checkbox"></td>
                                <td class="text-center">کد</td>
                                <td class="text-center">نام</td>
                                <td class="text-center">دسته</td>
                                <td class="text-center">مدل</td>
                                <td class="text-center">تاریخ ایجاد</td>
                                <td class="text-center">ترتیب</td>
                                <td class="text-center">عملیات</td>
                            </tr>
                            </thead>
                            <tbody id="ajx_content_cat">
                            @foreach($products as $product)
                                <tr>
                                    <td class="text-center">
                                        <input name="selected[]" value="{{$product->id}}" type="checkbox">
                                    </td>
                                    <td class="text-center">{{$product->id}}</td>
                                    <td class="text-center">{{$product->name}}</td>
                                    <td class="text-center">{{$product->category->name}}</td>
                                    <td class="text-center">{{$product->model}}</td>
                                    <td class="text-center">{{$product->created_at}}</td>
                                    <td class="text-center">{{$product->order}}</td>
                                    <td class="text-center">
                                        <a href="{{route('admin.product.edit',$product)}}" data-toggle="tooltip" title="" class="btn btn-primary" data-original-title="ویرایش"><i class="fa fa-pencil"></i></a>
{{--
                                        <a href="{{route('admin.product.copy',$product)}}" data-toggle="tooltip" title="" class="btn btn-success" data-original-title="کپی کردن"><i class="fa fa-sticky-note-o"></i></a>
--}}
{{--
                                        <a href="{{route('admin.post.show_bay_product',$product)}}" data-toggle="tooltip" title="" class="btn btn-warning" data-original-title="نمایش پست ها"><i class="fa fa-eye"></i></a>
--}}
                                    </td>
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



        $('.typesel').select2();


        function filter_cat(search,category_id) {

            var data={
                r_search:search,
                r_category_id:category_id

            };
            $.post('{{route('admin.product.filter')}}',data,function(response)
            {
                $('#ajx_content_cat').empty();
                $.each(response, function(i, obj) {
                    html='<tr>';
                    html+='<td class="text-center">';
                    html+='<input name="selected[]" value="'+obj.id+'" type="checkbox">';
                    html+='</td>';
                    html+='<td class="text-center">'+obj.name+'</td>';
                    html+='<td class="text-center">'+obj.category_id+'</td>';
                    html+='<td class="text-center">'+obj.model+'</td>';
                    html+='<td class="text-center">'+obj.created_at+'</td>';
                    html+='<td class="text-center">'+obj.order+'</td>';
                    html+='<td class="text-center"><a href="/admin/product/'+obj.slug+'/edit" data-toggle="tooltip" title="" class="btn btn-primary" data-original-title="ویرایش"><i class="fa fa-pencil"></i></a></td>';
                    html+='</tr>';
                    $('#ajx_content_cat').append(html);
                });
            });
        }

        [{
            "id": 1079,
            "product_id": 35,
            "index": 0,
            "price": "0",
            "buy_price": "0",
            "count": 0,
            "created_at": "2018-06-10 15:52:58",
            "updated_at": "2018-06-10 15:52:58",
            "images": [{
                "id": 636,
                "name": "2a210e0350a75f01fc5f297d6db4d7b3.jpg",
                "originalName": "bar plus 32-01.jpg",
                "type": "image\/jpeg",
                "path": "2a210e0350a75f01fc5f297d6db4d7b3.jpg",
                "size": 32238,
                "created_at": "2018-06-10 15:14:05",
                "updated_at": "2018-06-10 15:14:05",
                "deleted_at": null,
                "from_manager": 1,
                "pivot": {"product_value_id": 1079, "image_manager_files_id": 636}
            }, {
                "id": 639,
                "name": "85af03c99378bb37743d974bc9365529.jpg",
                "originalName": "bar plus 32-04.jpg",
                "type": "image\/jpeg",
                "path": "85af03c99378bb37743d974bc9365529.jpg",
                "size": 38409,
                "created_at": "2018-06-10 15:14:06",
                "updated_at": "2018-06-10 15:14:06",
                "deleted_at": null,
                "from_manager": 1,
                "pivot": {"product_value_id": 1079, "image_manager_files_id": 639}
            }, {
                "id": 637,
                "name": "7e50938af75d9b8be8ba277e1e8826be.jpg",
                "originalName": "bar plus 32-02.jpg",
                "type": "image\/jpeg",
                "path": "7e50938af75d9b8be8ba277e1e8826be.jpg",
                "size": 44311,
                "created_at": "2018-06-10 15:14:05",
                "updated_at": "2018-06-10 15:14:05",
                "deleted_at": null,
                "from_manager": 1,
                "pivot": {"product_value_id": 1079, "image_manager_files_id": 637}
            }, {
                "id": 638,
                "name": "46a10c770efe464ae58b58c72981e6b2.jpg",
                "originalName": "bar plus 32-03.jpg",
                "type": "image\/jpeg",
                "path": "46a10c770efe464ae58b58c72981e6b2.jpg",
                "size": 40889,
                "created_at": "2018-06-10 15:14:06",
                "updated_at": "2018-06-10 15:14:06",
                "deleted_at": null,
                "from_manager": 1,
                "pivot": {"product_value_id": 1079, "image_manager_files_id": 638}
            }, {
                "id": 640,
                "name": "3311bb3047019bb22921f8291ce770df.jpg",
                "originalName": "bar plus 32-05.jpg",
                "type": "image\/jpeg",
                "path": "3311bb3047019bb22921f8291ce770df.jpg",
                "size": 24826,
                "created_at": "2018-06-10 15:14:06",
                "updated_at": "2018-06-10 15:14:06",
                "deleted_at": null,
                "from_manager": 1,
                "pivot": {"product_value_id": 1079, "image_manager_files_id": 640}
            }, {
                "id": 641,
                "name": "af2a011aeeb1780c04577c3dda4dba98.jpg",
                "originalName": "bar plus 32-06.jpg",
                "type": "image\/jpeg",
                "path": "af2a011aeeb1780c04577c3dda4dba98.jpg",
                "size": 55003,
                "created_at": "2018-06-10 15:14:07",
                "updated_at": "2018-06-10 15:14:07",
                "deleted_at": null,
                "from_manager": 1,
                "pivot": {"product_value_id": 1079, "image_manager_files_id": 641}
            }]
        }, {
            "id": 1080,
            "product_id": 35,
            "index": 1,
            "price": "0",
            "buy_price": "0",
            "count": 0,
            "created_at": "2018-06-10 15:52:59",
            "updated_at": "2018-06-10 15:52:59",
            "images": [{
                "id": 642,
                "name": "8e852b98834314b924c47bcc3173b96a.jpg",
                "originalName": "bar plus64-05.jpg",
                "type": "image\/jpeg",
                "path": "8e852b98834314b924c47bcc3173b96a.jpg",
                "size": 31690,
                "created_at": "2018-06-10 15:14:56",
                "updated_at": "2018-06-10 15:14:56",
                "deleted_at": null,
                "from_manager": 1,
                "pivot": {"product_value_id": 1080, "image_manager_files_id": 642}
            }, {
                "id": 639,
                "name": "85af03c99378bb37743d974bc9365529.jpg",
                "originalName": "bar plus 32-04.jpg",
                "type": "image\/jpeg",
                "path": "85af03c99378bb37743d974bc9365529.jpg",
                "size": 38409,
                "created_at": "2018-06-10 15:14:06",
                "updated_at": "2018-06-10 15:14:06",
                "deleted_at": null,
                "from_manager": 1,
                "pivot": {"product_value_id": 1080, "image_manager_files_id": 639}
            }, {
                "id": 637,
                "name": "7e50938af75d9b8be8ba277e1e8826be.jpg",
                "originalName": "bar plus 32-02.jpg",
                "type": "image\/jpeg",
                "path": "7e50938af75d9b8be8ba277e1e8826be.jpg",
                "size": 44311,
                "created_at": "2018-06-10 15:14:05",
                "updated_at": "2018-06-10 15:14:05",
                "deleted_at": null,
                "from_manager": 1,
                "pivot": {"product_value_id": 1080, "image_manager_files_id": 637}
            }, {
                "id": 638,
                "name": "46a10c770efe464ae58b58c72981e6b2.jpg",
                "originalName": "bar plus 32-03.jpg",
                "type": "image\/jpeg",
                "path": "46a10c770efe464ae58b58c72981e6b2.jpg",
                "size": 40889,
                "created_at": "2018-06-10 15:14:06",
                "updated_at": "2018-06-10 15:14:06",
                "deleted_at": null,
                "from_manager": 1,
                "pivot": {"product_value_id": 1080, "image_manager_files_id": 638}
            }, {
                "id": 640,
                "name": "3311bb3047019bb22921f8291ce770df.jpg",
                "originalName": "bar plus 32-05.jpg",
                "type": "image\/jpeg",
                "path": "3311bb3047019bb22921f8291ce770df.jpg",
                "size": 24826,
                "created_at": "2018-06-10 15:14:06",
                "updated_at": "2018-06-10 15:14:06",
                "deleted_at": null,
                "from_manager": 1,
                "pivot": {"product_value_id": 1080, "image_manager_files_id": 640}
            }, {
                "id": 643,
                "name": "47c4d0581c23f9e1ceba5cf0bd93f075.jpg",
                "originalName": "bar plus64-06.jpg",
                "type": "image\/jpeg",
                "path": "47c4d0581c23f9e1ceba5cf0bd93f075.jpg",
                "size": 56239,
                "created_at": "2018-06-10 15:14:56",
                "updated_at": "2018-06-10 15:14:56",
                "deleted_at": null,
                "from_manager": 1,
                "pivot": {"product_value_id": 1080, "image_manager_files_id": 643}
            }]
        }, {
            "id": 1081,
            "product_id": 35,
            "index": 2,
            "price": "0",
            "buy_price": "0",
            "count": 0,
            "created_at": "2018-06-10 15:52:59",
            "updated_at": "2018-06-10 15:52:59",
            "images": [{
                "id": 644,
                "name": "084dbcd5694e5b6e886e6dc358e46298.jpg",
                "originalName": "bar plus 128-05.jpg",
                "type": "image\/jpeg",
                "path": "084dbcd5694e5b6e886e6dc358e46298.jpg",
                "size": 34573,
                "created_at": "2018-06-10 15:17:28",
                "updated_at": "2018-06-10 15:17:28",
                "deleted_at": null,
                "from_manager": 1,
                "pivot": {"product_value_id": 1081, "image_manager_files_id": 644}
            }, {
                "id": 639,
                "name": "85af03c99378bb37743d974bc9365529.jpg",
                "originalName": "bar plus 32-04.jpg",
                "type": "image\/jpeg",
                "path": "85af03c99378bb37743d974bc9365529.jpg",
                "size": 38409,
                "created_at": "2018-06-10 15:14:06",
                "updated_at": "2018-06-10 15:14:06",
                "deleted_at": null,
                "from_manager": 1,
                "pivot": {"product_value_id": 1081, "image_manager_files_id": 639}
            }, {
                "id": 637,
                "name": "7e50938af75d9b8be8ba277e1e8826be.jpg",
                "originalName": "bar plus 32-02.jpg",
                "type": "image\/jpeg",
                "path": "7e50938af75d9b8be8ba277e1e8826be.jpg",
                "size": 44311,
                "created_at": "2018-06-10 15:14:05",
                "updated_at": "2018-06-10 15:14:05",
                "deleted_at": null,
                "from_manager": 1,
                "pivot": {"product_value_id": 1081, "image_manager_files_id": 637}
            }, {
                "id": 638,
                "name": "46a10c770efe464ae58b58c72981e6b2.jpg",
                "originalName": "bar plus 32-03.jpg",
                "type": "image\/jpeg",
                "path": "46a10c770efe464ae58b58c72981e6b2.jpg",
                "size": 40889,
                "created_at": "2018-06-10 15:14:06",
                "updated_at": "2018-06-10 15:14:06",
                "deleted_at": null,
                "from_manager": 1,
                "pivot": {"product_value_id": 1081, "image_manager_files_id": 638}
            }, {
                "id": 640,
                "name": "3311bb3047019bb22921f8291ce770df.jpg",
                "originalName": "bar plus 32-05.jpg",
                "type": "image\/jpeg",
                "path": "3311bb3047019bb22921f8291ce770df.jpg",
                "size": 24826,
                "created_at": "2018-06-10 15:14:06",
                "updated_at": "2018-06-10 15:14:06",
                "deleted_at": null,
                "from_manager": 1,
                "pivot": {"product_value_id": 1081, "image_manager_files_id": 640}
            }, {
                "id": 645,
                "name": "3233e88059b1d4591466b533fd93ae3d.jpg",
                "originalName": "bar plus 128-06.jpg",
                "type": "image\/jpeg",
                "path": "3233e88059b1d4591466b533fd93ae3d.jpg",
                "size": 56776,
                "created_at": "2018-06-10 15:17:29",
                "updated_at": "2018-06-10 15:17:29",
                "deleted_at": null,
                "from_manager": 1,
                "pivot": {"product_value_id": 1081, "image_manager_files_id": 645}
            }]
        }, {
            "id": 1082,
            "product_id": 35,
            "index": 3,
            "price": "0",
            "buy_price": "0",
            "count": 0,
            "created_at": "2018-06-10 15:52:59",
            "updated_at": "2018-06-10 15:52:59",
            "images": [{
                "id": 646,
                "name": "ef860fa2e206ae73453e0df6baa7caf1.jpg",
                "originalName": "bar plus 256-05.jpg",
                "type": "image\/jpeg",
                "path": "ef860fa2e206ae73453e0df6baa7caf1.jpg",
                "size": 31734,
                "created_at": "2018-06-10 15:18:28",
                "updated_at": "2018-06-10 15:18:28",
                "deleted_at": null,
                "from_manager": 1,
                "pivot": {"product_value_id": 1082, "image_manager_files_id": 646}
            }, {
                "id": 639,
                "name": "85af03c99378bb37743d974bc9365529.jpg",
                "originalName": "bar plus 32-04.jpg",
                "type": "image\/jpeg",
                "path": "85af03c99378bb37743d974bc9365529.jpg",
                "size": 38409,
                "created_at": "2018-06-10 15:14:06",
                "updated_at": "2018-06-10 15:14:06",
                "deleted_at": null,
                "from_manager": 1,
                "pivot": {"product_value_id": 1082, "image_manager_files_id": 639}
            }, {
                "id": 637,
                "name": "7e50938af75d9b8be8ba277e1e8826be.jpg",
                "originalName": "bar plus 32-02.jpg",
                "type": "image\/jpeg",
                "path": "7e50938af75d9b8be8ba277e1e8826be.jpg",
                "size": 44311,
                "created_at": "2018-06-10 15:14:05",
                "updated_at": "2018-06-10 15:14:05",
                "deleted_at": null,
                "from_manager": 1,
                "pivot": {"product_value_id": 1082, "image_manager_files_id": 637}
            }, {
                "id": 638,
                "name": "46a10c770efe464ae58b58c72981e6b2.jpg",
                "originalName": "bar plus 32-03.jpg",
                "type": "image\/jpeg",
                "path": "46a10c770efe464ae58b58c72981e6b2.jpg",
                "size": 40889,
                "created_at": "2018-06-10 15:14:06",
                "updated_at": "2018-06-10 15:14:06",
                "deleted_at": null,
                "from_manager": 1,
                "pivot": {"product_value_id": 1082, "image_manager_files_id": 638}
            }, {
                "id": 640,
                "name": "3311bb3047019bb22921f8291ce770df.jpg",
                "originalName": "bar plus 32-05.jpg",
                "type": "image\/jpeg",
                "path": "3311bb3047019bb22921f8291ce770df.jpg",
                "size": 24826,
                "created_at": "2018-06-10 15:14:06",
                "updated_at": "2018-06-10 15:14:06",
                "deleted_at": null,
                "from_manager": 1,
                "pivot": {"product_value_id": 1082, "image_manager_files_id": 640}
            }, {
                "id": 647,
                "name": "df3c54846ed4f82a10f6aba9aa335ada.jpg",
                "originalName": "bar plus 256-06.jpg",
                "type": "image\/jpeg",
                "path": "df3c54846ed4f82a10f6aba9aa335ada.jpg",
                "size": 57474,
                "created_at": "2018-06-10 15:18:29",
                "updated_at": "2018-06-10 15:18:29",
                "deleted_at": null,
                "from_manager": 1,
                "pivot": {"product_value_id": 1082, "image_manager_files_id": 647}
            }]
        }, {
            "id": 1083,
            "product_id": 35,
            "index": 4,
            "price": "0",
            "buy_price": "0",
            "count": 0,
            "created_at": "2018-06-10 15:52:59",
            "updated_at": "2018-06-10 15:52:59",
            "images": [{
                "id": 648,
                "name": "c366b3148c91b29e7cff661999f0a40a.jpg",
                "originalName": "bar plus gray 32-01.jpg",
                "type": "image\/jpeg",
                "path": "c366b3148c91b29e7cff661999f0a40a.jpg",
                "size": 34789,
                "created_at": "2018-06-10 15:37:46",
                "updated_at": "2018-06-10 15:37:46",
                "deleted_at": null,
                "from_manager": 1,
                "pivot": {"product_value_id": 1083, "image_manager_files_id": 648}
            }, {
                "id": 650,
                "name": "a88fe792f53bac16c36cb9f90b4e75d3.jpg",
                "originalName": "bar plus gray-02.jpg",
                "type": "image\/jpeg",
                "path": "a88fe792f53bac16c36cb9f90b4e75d3.jpg",
                "size": 43023,
                "created_at": "2018-06-10 15:37:46",
                "updated_at": "2018-06-10 15:37:46",
                "deleted_at": null,
                "from_manager": 1,
                "pivot": {"product_value_id": 1083, "image_manager_files_id": 650}
            }, {
                "id": 652,
                "name": "2f9b7cde18bd944f9889cda8a48c6355.jpg",
                "originalName": "bar plus gray-04.jpg",
                "type": "image\/jpeg",
                "path": "2f9b7cde18bd944f9889cda8a48c6355.jpg",
                "size": 44544,
                "created_at": "2018-06-10 15:37:47",
                "updated_at": "2018-06-10 15:37:47",
                "deleted_at": null,
                "from_manager": 1,
                "pivot": {"product_value_id": 1083, "image_manager_files_id": 652}
            }, {
                "id": 651,
                "name": "faa49f47b058e39c9e09ce87198d4ab0.jpg",
                "originalName": "bar plus gray-03.jpg",
                "type": "image\/jpeg",
                "path": "faa49f47b058e39c9e09ce87198d4ab0.jpg",
                "size": 42467,
                "created_at": "2018-06-10 15:37:46",
                "updated_at": "2018-06-10 15:37:46",
                "deleted_at": null,
                "from_manager": 1,
                "pivot": {"product_value_id": 1083, "image_manager_files_id": 651}
            }, {
                "id": 653,
                "name": "e0b14b034627d0d0fd9ee8f243f24418.jpg",
                "originalName": "bar plus gray-05.jpg",
                "type": "image\/jpeg",
                "path": "e0b14b034627d0d0fd9ee8f243f24418.jpg",
                "size": 27711,
                "created_at": "2018-06-10 15:37:47",
                "updated_at": "2018-06-10 15:37:47",
                "deleted_at": null,
                "from_manager": 1,
                "pivot": {"product_value_id": 1083, "image_manager_files_id": 653}
            }, {
                "id": 649,
                "name": "b292b0316b29a06f13f1aa2dcf9b7292.jpg",
                "originalName": "bar plus gray 32-06.jpg",
                "type": "image\/jpeg",
                "path": "b292b0316b29a06f13f1aa2dcf9b7292.jpg",
                "size": 57343,
                "created_at": "2018-06-10 15:37:46",
                "updated_at": "2018-06-10 15:37:46",
                "deleted_at": null,
                "from_manager": 1,
                "pivot": {"product_value_id": 1083, "image_manager_files_id": 649}
            }]
        }, {
            "id": 1084,
            "product_id": 35,
            "index": 5,
            "price": "0",
            "buy_price": "0",
            "count": 0,
            "created_at": "2018-06-10 15:52:59",
            "updated_at": "2018-06-10 15:52:59",
            "images": [{
                "id": 654,
                "name": "2ca8959a8db8bfaf7e5ac227a2e68451.jpg",
                "originalName": "bar plus gray 64-01.jpg",
                "type": "image\/jpeg",
                "path": "2ca8959a8db8bfaf7e5ac227a2e68451.jpg",
                "size": 37774,
                "created_at": "2018-06-10 15:38:28",
                "updated_at": "2018-06-10 15:38:28",
                "deleted_at": null,
                "from_manager": 1,
                "pivot": {"product_value_id": 1084, "image_manager_files_id": 654}
            }, {
                "id": 650,
                "name": "a88fe792f53bac16c36cb9f90b4e75d3.jpg",
                "originalName": "bar plus gray-02.jpg",
                "type": "image\/jpeg",
                "path": "a88fe792f53bac16c36cb9f90b4e75d3.jpg",
                "size": 43023,
                "created_at": "2018-06-10 15:37:46",
                "updated_at": "2018-06-10 15:37:46",
                "deleted_at": null,
                "from_manager": 1,
                "pivot": {"product_value_id": 1084, "image_manager_files_id": 650}
            }, {
                "id": 652,
                "name": "2f9b7cde18bd944f9889cda8a48c6355.jpg",
                "originalName": "bar plus gray-04.jpg",
                "type": "image\/jpeg",
                "path": "2f9b7cde18bd944f9889cda8a48c6355.jpg",
                "size": 44544,
                "created_at": "2018-06-10 15:37:47",
                "updated_at": "2018-06-10 15:37:47",
                "deleted_at": null,
                "from_manager": 1,
                "pivot": {"product_value_id": 1084, "image_manager_files_id": 652}
            }, {
                "id": 651,
                "name": "faa49f47b058e39c9e09ce87198d4ab0.jpg",
                "originalName": "bar plus gray-03.jpg",
                "type": "image\/jpeg",
                "path": "faa49f47b058e39c9e09ce87198d4ab0.jpg",
                "size": 42467,
                "created_at": "2018-06-10 15:37:46",
                "updated_at": "2018-06-10 15:37:46",
                "deleted_at": null,
                "from_manager": 1,
                "pivot": {"product_value_id": 1084, "image_manager_files_id": 651}
            }, {
                "id": 653,
                "name": "e0b14b034627d0d0fd9ee8f243f24418.jpg",
                "originalName": "bar plus gray-05.jpg",
                "type": "image\/jpeg",
                "path": "e0b14b034627d0d0fd9ee8f243f24418.jpg",
                "size": 27711,
                "created_at": "2018-06-10 15:37:47",
                "updated_at": "2018-06-10 15:37:47",
                "deleted_at": null,
                "from_manager": 1,
                "pivot": {"product_value_id": 1084, "image_manager_files_id": 653}
            }, {
                "id": 655,
                "name": "53f2625cc4f0cd7db280ccde0d82ee02.jpg",
                "originalName": "bar plus gray 64-06.jpg",
                "type": "image\/jpeg",
                "path": "53f2625cc4f0cd7db280ccde0d82ee02.jpg",
                "size": 57718,
                "created_at": "2018-06-10 15:38:29",
                "updated_at": "2018-06-10 15:38:29",
                "deleted_at": null,
                "from_manager": 1,
                "pivot": {"product_value_id": 1084, "image_manager_files_id": 655}
            }]
        }, {
            "id": 1085,
            "product_id": 35,
            "index": 6,
            "price": "0",
            "buy_price": "0",
            "count": 0,
            "created_at": "2018-06-10 15:52:59",
            "updated_at": "2018-06-10 15:52:59",
            "images": [{
                "id": 656,
                "name": "ab164dbca427d562be26ac6b0b51f853.jpg",
                "originalName": "bar plus gray 128-01.jpg",
                "type": "image\/jpeg",
                "path": "ab164dbca427d562be26ac6b0b51f853.jpg",
                "size": 39593,
                "created_at": "2018-06-10 15:39:30",
                "updated_at": "2018-06-10 15:39:30",
                "deleted_at": null,
                "from_manager": 1,
                "pivot": {"product_value_id": 1085, "image_manager_files_id": 656}
            }, {
                "id": 650,
                "name": "a88fe792f53bac16c36cb9f90b4e75d3.jpg",
                "originalName": "bar plus gray-02.jpg",
                "type": "image\/jpeg",
                "path": "a88fe792f53bac16c36cb9f90b4e75d3.jpg",
                "size": 43023,
                "created_at": "2018-06-10 15:37:46",
                "updated_at": "2018-06-10 15:37:46",
                "deleted_at": null,
                "from_manager": 1,
                "pivot": {"product_value_id": 1085, "image_manager_files_id": 650}
            }, {
                "id": 652,
                "name": "2f9b7cde18bd944f9889cda8a48c6355.jpg",
                "originalName": "bar plus gray-04.jpg",
                "type": "image\/jpeg",
                "path": "2f9b7cde18bd944f9889cda8a48c6355.jpg",
                "size": 44544,
                "created_at": "2018-06-10 15:37:47",
                "updated_at": "2018-06-10 15:37:47",
                "deleted_at": null,
                "from_manager": 1,
                "pivot": {"product_value_id": 1085, "image_manager_files_id": 652}
            }, {
                "id": 651,
                "name": "faa49f47b058e39c9e09ce87198d4ab0.jpg",
                "originalName": "bar plus gray-03.jpg",
                "type": "image\/jpeg",
                "path": "faa49f47b058e39c9e09ce87198d4ab0.jpg",
                "size": 42467,
                "created_at": "2018-06-10 15:37:46",
                "updated_at": "2018-06-10 15:37:46",
                "deleted_at": null,
                "from_manager": 1,
                "pivot": {"product_value_id": 1085, "image_manager_files_id": 651}
            }, {
                "id": 653,
                "name": "e0b14b034627d0d0fd9ee8f243f24418.jpg",
                "originalName": "bar plus gray-05.jpg",
                "type": "image\/jpeg",
                "path": "e0b14b034627d0d0fd9ee8f243f24418.jpg",
                "size": 27711,
                "created_at": "2018-06-10 15:37:47",
                "updated_at": "2018-06-10 15:37:47",
                "deleted_at": null,
                "from_manager": 1,
                "pivot": {"product_value_id": 1085, "image_manager_files_id": 653}
            }, {
                "id": 657,
                "name": "b8c0aed3079164d36fd01f4010df463b.jpg",
                "originalName": "bar plus gray 128-06.jpg",
                "type": "image\/jpeg",
                "path": "b8c0aed3079164d36fd01f4010df463b.jpg",
                "size": 59370,
                "created_at": "2018-06-10 15:39:30",
                "updated_at": "2018-06-10 15:39:30",
                "deleted_at": null,
                "from_manager": 1,
                "pivot": {"product_value_id": 1085, "image_manager_files_id": 657}
            }]
        }, {
            "id": 1086,
            "product_id": 35,
            "index": 7,
            "price": "0",
            "buy_price": "0",
            "count": 0,
            "created_at": "2018-06-10 15:52:59",
            "updated_at": "2018-06-10 15:52:59",
            "images": [{
                "id": 659,
                "name": "d608a099a4bed35ddce37ed0752c28d9.jpg",
                "originalName": "bar plus gray 256-01.jpg",
                "type": "image\/jpeg",
                "path": "d608a099a4bed35ddce37ed0752c28d9.jpg",
                "size": 42064,
                "created_at": "2018-06-10 15:41:11",
                "updated_at": "2018-06-10 15:41:11",
                "deleted_at": null,
                "from_manager": 1,
                "pivot": {"product_value_id": 1086, "image_manager_files_id": 659}
            }, {
                "id": 650,
                "name": "a88fe792f53bac16c36cb9f90b4e75d3.jpg",
                "originalName": "bar plus gray-02.jpg",
                "type": "image\/jpeg",
                "path": "a88fe792f53bac16c36cb9f90b4e75d3.jpg",
                "size": 43023,
                "created_at": "2018-06-10 15:37:46",
                "updated_at": "2018-06-10 15:37:46",
                "deleted_at": null,
                "from_manager": 1,
                "pivot": {"product_value_id": 1086, "image_manager_files_id": 650}
            }, {
                "id": 652,
                "name": "2f9b7cde18bd944f9889cda8a48c6355.jpg",
                "originalName": "bar plus gray-04.jpg",
                "type": "image\/jpeg",
                "path": "2f9b7cde18bd944f9889cda8a48c6355.jpg",
                "size": 44544,
                "created_at": "2018-06-10 15:37:47",
                "updated_at": "2018-06-10 15:37:47",
                "deleted_at": null,
                "from_manager": 1,
                "pivot": {"product_value_id": 1086, "image_manager_files_id": 652}
            }, {
                "id": 651,
                "name": "faa49f47b058e39c9e09ce87198d4ab0.jpg",
                "originalName": "bar plus gray-03.jpg",
                "type": "image\/jpeg",
                "path": "faa49f47b058e39c9e09ce87198d4ab0.jpg",
                "size": 42467,
                "created_at": "2018-06-10 15:37:46",
                "updated_at": "2018-06-10 15:37:46",
                "deleted_at": null,
                "from_manager": 1,
                "pivot": {"product_value_id": 1086, "image_manager_files_id": 651}
            }, {
                "id": 653,
                "name": "e0b14b034627d0d0fd9ee8f243f24418.jpg",
                "originalName": "bar plus gray-05.jpg",
                "type": "image\/jpeg",
                "path": "e0b14b034627d0d0fd9ee8f243f24418.jpg",
                "size": 27711,
                "created_at": "2018-06-10 15:37:47",
                "updated_at": "2018-06-10 15:37:47",
                "deleted_at": null,
                "from_manager": 1,
                "pivot": {"product_value_id": 1086, "image_manager_files_id": 653}
            }, {
                "id": 658,
                "name": "405011d3796b87197f10074c3975bf9d.jpg",
                "originalName": "bar plus gray 256-06.jpg",
                "type": "image\/jpeg",
                "path": "405011d3796b87197f10074c3975bf9d.jpg",
                "size": 58648,
                "created_at": "2018-06-10 15:41:04",
                "updated_at": "2018-06-10 15:41:04",
                "deleted_at": null,
                "from_manager": 1,
                "pivot": {"product_value_id": 1086, "image_manager_files_id": 658}
            }]
        }];

    </script>

@stop

