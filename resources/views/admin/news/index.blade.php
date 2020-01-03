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
            Quản lý bài viết
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('admin.home.index') }}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><i class="fa fa-edit"></i> Quản lý bài viết</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">
                    <a href="{{ route('admin.news.add') }}" class="btn btn-success">Thêm bài viết</a>
                </h3>
            </div>
            <div class="box-body">
                <div class="box-body table-responsive no-padding">
                    @if(Session::has('msg'))
                        <p class="msg">{{ Session::get('msg') }}</p>
                    @endif
                    <form id="form" role="form" method="get" action="{{ route('admin.product.del') }}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <table id="dataTables-example" class="table table-bordered">
                        <thead>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>Tên bài viết</th>
                                <th>Hình ảnh</th>
                                <th>Trạng thái</th>
                                <th>Chức năng</th>
                            </tr>
                        </thead>
                    </table>
                    <button type="submit" class="btn btn-danger">Xóa</button>
                    </form>
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
function del(id){
    var urlDel = "{{ route('admin.news.del') }}?id[]=";
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
        url: '{{route('admin.news.active')}}',
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
<script src="{{ $urlTemplateAdmin }}/jquery.validate.min.js"></script>
<script type="text/javascript">
    $('#dataTables-example').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": {
            "url":"{{ route('admin.news.view') }}",
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
            {"data":"picture"},
            {"data":"active"},
            {"data":"action"}
        ]
    });

    $(document).ready(function() {
    //Khi bàn phím được nhấn và thả ra thì sẽ chạy phương thức này
        $("#form").validate({
            submitHandler: function (form) {
                var id=[];
                var arrId = document.querySelectorAll('.id:checked');
                for(var i=0;i<arrId.length;i++){
                    id[i]=arrId[i].value;
                }
                if(id.length == 0){
                    swal("Vui lòng chon sản phẩm cần xóa !","","error");
                }else{
                    swal({   
                        title: "Xóa những sản phẩm này",
                        text: "",         
                        type: "warning",   
                        showCancelButton: true,   
                        confirmButtonColor: "#DD6B55",   
                        confirmButtonText: "OK",   
                        cancelButtonText: "Hủy",   
                        closeOnConfirm: false,   
                        }, 
                        function(isConfirm){
                            if(isConfirm){
                                $.ajax({
                                    url: '{{route('admin.news.del')}}',
                                    type: 'get',
                                    cache: false,
                                    data: {
                                        id:id,
                                    },
                                    success: function(data){
                                        window.location.href="{{ route('admin.product.index') }}";   
                                    },
                                    error: function (){
                                        alert('Có lỗi xảy ra');
                                    }
                                });
                            }
                        }
                    );
                }
            }
        });
    });
</script>
@endsection