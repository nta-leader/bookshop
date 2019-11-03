@extends('templates.admin.master')
@section('css')
<!-- DataTables -->
<link rel="stylesheet" href="{{ $urlTemplateAdmin }}/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
@endsection
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Thêm sản phẩm
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('admin.home.index') }}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><i class="fa fa-book"></i> Quản lý mua thêm</li>
            <li class="active">Thêm sản phẩm</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Thông tin sản phẩm</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                        <i class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip"
                        title="Remove">
                        <i class="fa fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="box-body">
                <form role="form" method="POST" action="{{ route('admin.buymore.add') }}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    @if ($errors->has('price'))
                        <div class="alert alert-danger error">
                            <ul>
                                @foreach ($errors->get('price') as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="form-group">
                        <label>Giá ưu đãi</label>
                        <input id="gia" type="text" name="price" value="{{ old('price') }}" class="form-control" placeholder="Nhập giá ưu đãi...">
                        <p id="view_gia" style="padding: 1px 12px;color:red;"></p>
                    </div>
                    @if ($errors->has('category'))
                        <div class="alert alert-danger error">
                            <ul>
                                @foreach ($errors->get('category') as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="form-group">
                        <label>Danh mục</label>
                        <select id="category" name="category" class="form-control">
                            <option value="">Chọn danh mục</option>
                            @foreach($objItemsCategory as $objItem)
                            <option value="{{ $objItem->id }}">{{ $objItem->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div id="view">
                                
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Thêm</button>
                    </div>
                </form>
                <!-- /.box-body -->
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection
@section('js')
<!-- DataTables -->
<script src="{{ $urlTemplateAdmin }}/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="{{ $urlTemplateAdmin }}/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script>
function number_format( number, decimals, dec_point, thousands_sep ) {
    var n = number, c = isNaN(decimals = Math.abs(decimals)) ? 2 : decimals;
    var d = dec_point == undefined ? "," : dec_point;
    var t = thousands_sep == undefined ? "." : thousands_sep, s = n < 0 ? "-" : "";
    var i = parseInt(n = Math.abs(+n || 0).toFixed(c)) + "", j = (j = i.length) > 3 ? j % 3 : 0;
                            
    return s + (j ? i.substr(0, j) + t : "") + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + t) + (c ? d + Math.abs(n - i).toFixed(c).slice(2) : "");
}
$(document).ready(function(){
    $("#category").change(function(){
        var id_category=$("#category").val();
        if(id_category==""){
            $('#view').html("");
            return swal("Vui lòng chọn danh mục !","","error");
        }
        $.ajax({
            url:'{{route('admin.buymore.list')}}',
            type:'get',
            cache: false,
            data:{
                id_category:id_category
            },
            success:function(data){
                $('#view').html(data);
            },
            error:function(){
                alert('Có lỗi xảy ra');
            },
        });
    })
})
$("#gia").keyup(function () {
    var gia =$(this).val();
    var value='Giá : '+number_format(gia,0,'.',',')+' đ';
    $("#view_gia").text(value);
}).keyup();
</script>
@endsection