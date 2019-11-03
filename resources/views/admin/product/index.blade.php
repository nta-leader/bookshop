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
            Quản lý sản phẩm
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('admin.home.index') }}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><i class="fa fa-th"></i> Quản lý sản phẩm</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">
                    <a href="{{ route('admin.product.add') }}" class="btn btn-success">Thêm sản phẩm</a>
                </h3>
            </div>
            <div class="box-body">
                <div class="box-body table-responsive no-padding">
                    @if(Session::has('msg'))
                        <p class="msg">{{ Session::get('msg') }}</p>
                    @endif
                    <table id="dataTables-example" class="table table-bordered">
                        <thead>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>Tên sản phẩm</th>
                                <th>Mã sản phẩm</th>
                                <th>
                                    <select id="danhmuc" class="form-control">
                                        <option value="{{ route('admin.product.index',['id_category'=>0]) }}">Tất cả danh mục</option>
                                        @foreach($objItemsCategory as $objItem)
                                        <option @if($objItem->id==$id_category) selected @endif value="{{ route('admin.product.index',['id_category'=>$objItem->id]) }}">{{ $objItem->name }}</option>
                                        @endforeach
                                    </select>
                                </th>
                                <th>Giá</th>
                                <th>Hình ảnh</th>
                                <th>Trạng thái</th>
                                <th>Chức năng</th>
                            </tr>
                        </thead>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<script>
function del(id,id_category=0){
    var urlDel = "{{ route('admin.product.del') }}?id=";
    urlDel +=id;
    swal({   
        title: "Xóa sản phẩm này",
        text: "",         
        type: "warning",   
        showCancelButton: true,   
        confirmButtonColor: "#DD6B55",   
        confirmButtonText: "OK",   
        cancelButtonText: "Hủy",   
        closeOnConfirm: false,   
        }, 
        function(isConfirm){   
            if (isConfirm) {   
                window.location.href=urlDel;   
            }
        }
    );
};
function active(active, id){
    $.ajax({
        url: '{{route('admin.product.active')}}',
        type: 'get',
        cache: false,
        data: {
            id:id,
            active:active
        },
        success: function(data){
            $('#active'+id).html(data);
        },
        error: function (){
            alert('Có lỗi xảy ra');
        }
    });
};

setTimeout(function(){
    var msg = document.getElementsByClassName("msg");
    if(msg.length > 0){
        msg[0].style.display="none";
    }
}, 2000);
</script>
@endsection

@section('js')
<!-- DataTables -->
<script src="{{ $urlTemplateAdmin }}/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="{{ $urlTemplateAdmin }}/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script type="text/javascript">
    $('#dataTables-example').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": {
            "url":"{{ route('admin.product.view',['id_category'=>$id_category]) }}",
            "dataType":"json",
            "type":"POST",
            "data":{"_token":"{{ csrf_token() }}"}
        },
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
          },
        },
        "columns":[
            {"data":"id"},
            {"data":"name"},
            {"data":"product_code"},
            {"data":"category_name"},
            {"data":"default_price"},
            {"data":"picture"},
            {"data":"active"},
            {"data":"action"}
        ]
    });

    $(document).ready(function(){
        $("#danhmuc").change(function(){
            var url = $("#danhmuc").val();
            window.location.href=url;   
        })
    })
</script>
@endsection