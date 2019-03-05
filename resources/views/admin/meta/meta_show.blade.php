@extends('layouts.admin_master_full')

@section('content-header')
    <section class="content-header">
        <div class="pull-left">
            <a href="{{route('admin.meta.index')}}" data-toggle="tooltip" title="" class="btn btn-default" data-original-title="بازسازی"><i class="fa fa-refresh"></i></a>
            <button type="button" data-toggle="tooltip" title="" class="btn btn-danger" onclick="confirm('آیا مطمئن هستید؟') ? $('#form-category').submit() : false;" data-original-title="حذف"><i class="fa fa-trash-o"></i></button>
        </div>
        <h1>
            متا تگ ها
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-th"></i> دسته بندی</a></li>
            <li class="active"><i class="fa fa-tags"></i>متا تگ</li>
        </ol>
    </section>
@endsection

@section('content')

    <section class="content">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-list"></i> لیست متا تگ ها</h3>
            </div>
            <div class="panel-body">
                <form action="/admin/meta/destroy" method="post" enctype="multipart/form-data" id="form-category">
                    {{csrf_field()}}
                    {{method_field('DELETE')}}
                    <div class="table-responsive">
                        <table id="metas" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <td style="width: 1px;" class="text-center"><input onclick="$('input[name*=\'selected\']').prop('checked', this.checked);" type="checkbox"></td>
                                <td class="text-center">نام</td>
                                <td class="text-center" >توضیحات</td>
                                <td class="text-center" >عملیات</td>
                            </tr>
                            </thead>
                            <tbody>
                           @foreach($metas as $meta)
                               <tr id="meta-row{{$meta->id}}">

                                   <input name="id[]" value="{{$meta->id}}" type="hidden">
                                   <td class="text-center">
                                       <input name="selected[]" value="{{$meta->id}}" type="checkbox">
                                   </td>
                                   <td class="text-center">
                                       <input id="meta-name-{{$meta->id}}" name="name[]" value="{{$meta->name}}" placeholder="نام متا تگ"
                                                                  class="form-control" type="text"></td>
                                   <td class="text-center">
                                       <textarea type="text" id="meta-content-{{$meta->id}}" name="content[]"  placeholder="توضیحات"
                                                                     class="form-control">{{$meta->content}}</textarea></td>
                                   <td class="text-center"><a idn="{{$meta->id}}" onclick="updatemeta(this)" data-toggle="tooltip" title=""
                                                              class="btn btn-info" data-original-title="ویرایش"><i
                                                   class="fa fa-refresh"></i></a>
                                   </td>

                               </tr>

                            @endforeach


                            </tbody>
                            <tfoot>
                            <tr>
                                <td colspan="3"></td>
                                <td class="text-left"><button type="button" onclick="addmeta();" data-toggle="tooltip" title="" class="btn btn-primary" data-original-title="افزودن آگهی"><i class="fa fa-plus-circle"></i></button></td>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                </form>

            </div>
        </div>

    </section>

@endsection

@section('admin-footer')
    <script type="application/javascript">



        var meta_row={{ count($metas)+1}};
        function addmeta() {
            html  = '<tr id="meta-row' + meta_row + '">';
            html += '  <input type="hidden" name="id" value="-1"/>';
            html +='<td></td>';
            html += '  <td class="text-center" >';
            html += '<input type="text" name="name" id="meta-name-'+meta_row+'" value="" placeholder="نام متا تگ" class="form-control" />';
            html += '  </td>';
            html += '  <td class="text-center">';
            html += '<textarea type="text" id="meta-content-'+meta_row+'" name="content" value="" placeholder="توضیحات" class="form-control" />';
            html += '  </td>';
            html += '  <td class="text-center">';
            html += '<a  data-toggle="tooltip" title="" idn="'+meta_row+'" onclick="storemeta(this)" class="btn btn-primary" data-original-title="ویرایش"><i class="fa fa-save"></i></a>';
            html += '  </td>';
            html += '</tr>';

            $('#metas tbody').append(html);

            meta_row++;



        }

        function updatemeta(opbject) {
            var idm=$(opbject).attr('idn');
            var namem=$("#meta-name-"+idm).val();

            var contentm=$("#meta-content-"+idm).val();


            $.post("{{route('admin')}}/meta/"+idm, {id:idm,name:namem,content:contentm,_method:'PATCH'}, function(data) {
                location.reload();
            });

        }

        function storemeta(opbject) {
            var idm=$(opbject).attr('idn');
            var namem=$("#meta-name-"+idm).val();

            var contentm=$("#meta-content-"+idm).val();


            $.post("{{route('admin')}}/meta/", {name:namem,content:contentm}, function(data) {

                location.reload();

            });

        }


    </script>

@stop