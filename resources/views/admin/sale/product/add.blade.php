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
            Thêm sale - slide
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('admin.home.index') }}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><i class="fa fa fa-newspaper-o"></i> Quản lý sale - slide</li>
            <li class="active">Áp dụng sale vào sản phẩm</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Thông tin sale - slide</h3>
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
                <form role="form" method="POST" action="{{ route('admin.sale.product.add',['id_sale'=>$id_sale]) }}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="box-body">
                        @if ($errors->has('choose'))
                            <div class="alert alert-danger error">
                                <ul>
                                    @foreach ($errors->get('choose') as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="form-group">
                            <label>Loại sản phẩm</label>
                            <select id="type_product" class="form-control">
                                <option value="">--Chọn loại sản phẩm--</option>
                                <option value="0">Sản phẩm chưa được sale</option>
                                <option value="1">Tất cả(ghi đè nếu sản phẩm đã ở sale khác)</option>
                            </select>
                        </div>
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
$(document).ready(function(){
    $("#type_product").change(function(){
        var type=$("#type_product").val();
        if(type==""){
            $('#view').html("");
            return swal("Vui lòng chọn loại sản phẩm !","","error");
        }
        $.ajax({
            url:'{{route('admin.sale.product.list')}}',
            type:'get',
            cache: false,
            data:{
                type:type,
                id_sale:{{ $id_sale }}
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
</script>
@endsection