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
            <li><a href="{{ route('admin.category.index') }}"><i class="fa fa-files-o"></i> Quản lý danh mục</a></li>
            <li><a href="{{ route('admin.category.product.index',['id_category'=>$id_category]) }}">Quản lý sản phẩm</a></li>
            <li><a>Thêm sản phẩm</a></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">
                    Thêm sản phẩm
                </h3>
            </div>
            <div class="box-body">
                <form role="form" method="POST" action="{{ route('admin.category.product.add',['id_category'=>$id_category]) }}"" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="box-body table-responsive no-padding">
                        <table  class="table table-striped table-bordered table-hover" id="example" style="width: 100%;">
                            <label><input type="checkbox" id="selecctall" class="flat-red"> Chọn tất cả</label>
                            <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Tên sản phẩm</th>
                                    <th>Mã sản phẩm</th>
                                    <th>Giá</th>
                                    <th>Giá sale</th>
                                    <th>Hình ảnh</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($objItems as $objItem)
                            @php
                                $id=$objItem->id;
                                $name=$objItem->name;
                                $product_code=$objItem->product_code;
                                $basis_price=$objItem->basis_price;
                                $price=$objItem->price;
                                $picture=$objItem->picture;
                            @endphp
                                <tr>
                                    <td><input class="checkbox1 flat-red" type="checkbox" name="id_product[]" value="{{ $id }}">{{ $id }}</td>
                                    <td>{{ $name }}</td>
                                    <td>{{ $product_code }}</td>
                                    <td>{{ number_format($basis_price,0) }}đ</td>
                                    <td><span style="color:red;">{{ number_format($price,0) }}đ</span></td>
                                    <td><img width="50px" src="/storage/app/files/product/{{ $picture }}"</td>                            
                                </tr>
                            @endforeach                           
                            </tbody>
                            
                        </table>
                    </div>
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Thêm</button>
                    </div>
                    <!-- /.box-body -->
                </form>
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
$(document).ready(function() {
    $('#example').DataTable( {
        "language": {
          "lengthMenu": "Hiển thị _MENU_ hàng",
          "zeroRecords": "Không có dữ liệu !",
          "search": 'Tìm kiếm',
          "info": "Trang _PAGE_ / _PAGES_",
          "infoEmpty": "Không có dữ liệu !",
          "infoFiltered": "",
          "processing": "Xin chờ...",
          "paginate": {
              "first":      "Đầu",
              "last":       "Cuối",
              "next":       ">",
              "previous":   "<"
          }
        }
    } );
    $("#selecctall").change(function(){
        $(".checkbox1").prop('checked', $(this).prop("checked"));
    });
} );
</script>
@endsection