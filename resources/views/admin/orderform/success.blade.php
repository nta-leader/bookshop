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
            Quản lý đơn hàng
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('admin.home.index') }}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><i class="fa fa-th"></i> Quản lý đơn hàng</li>
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
                    <form id="form" role="form" method="get" action="{{ route('admin.product.del') }}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <table id="dataTables-example" class="table table-bordered">
                        <thead>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>Thời gian</th>
                                <th>Họ tên</th>
                                <th>SDT</th>
                                <th>Địa chỉ</th>
                                <th>Trạng thái</th>
                                <th>Mã vận đơn</th>
                                <th>Chức năng</th>
                            </tr>
                        </thead>
                    </table>
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
<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" style="color:#605ca8;">Đơn hàng</h4>
            <h4 class="modal-title">Thời gian: <span id="date" style="color:red;"></span></h4>
            <h4 class="modal-title">Họ tên: <span id="name" style="color:red;"></span></h4>
            <h4 class="modal-title">SDT: <span id="phone" style="color:red;"></span></h4>
            <h4 class="modal-title">Địa chỉ: <span id="address" style="color:red;"></span></h4>
        </div>
        <div class="modal-body">
            <table id="dataTables-example" class="table table-bordered">
                <thead>
                    <tr>
                        <th style="width: 10px">#</th>
                        <th>Tên</th>
                        <th>Hình ảnh</th>
                        <th>Đơn giá</th>
                        <th>Số lượng</th>
                        <th>Tổng(VND)</th>
                    </tr>
                </thead>
                <tbody id="products">
                    
                </tbody>
            </table>
        </div>
        <div class="modal-footer" id="modal-footer">
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Thoát</button>
            <button type="button" class="btn btn-success">Xác nhận đơn</button>
            <button type="button" class="btn btn-danger">Hủy đơn</button>
        </div>
    </div>
    <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<script>
function number_format( number, decimals, dec_point, thousands_sep ) {
	var n = number, c = isNaN(decimals = Math.abs(decimals)) ? 2 : decimals;
	var d = dec_point == undefined ? "," : dec_point;
	var t = thousands_sep == undefined ? "." : thousands_sep, s = n < 0 ? "-" : "";
	var i = parseInt(n = Math.abs(+n || 0).toFixed(c)) + "", j = (j = i.length) > 3 ? j % 3 : 0;
							
	return s + (j ? i.substr(0, j) + t : "") + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + t) + (c ? d + Math.abs(n - i).toFixed(c).slice(2) : "");
}
function detail(id){
    $.ajax({
        url: '{{route('admin.orderform.detail')}}',
        type: 'get',
        cache: false,
        data: {
            id:id
        },
        success: function(data){
            console.log(data.product);
            document.getElementById("date").innerText=data.date;
            document.getElementById("name").innerText=data.name;
            document.getElementById("phone").innerText=data.phone;
            document.getElementById("address").innerText=data.address;
            let price = 0;
            let div="";
            data.product.forEach(function(item){
                price += item.price*item.quantity;
                div += '<tr>'+
                            '<td>'+ item.id_product +'</td>'+
                            '<td>'+ item.name +'</td>'+
                            '<td><img src="/storage/app/files/product/'+ item.picture +'" style="height:80px"></td>'+
                            '<td>'+ number_format(item.price,0,'.',',') +'đ</td>'+
                            '<td>'+ item.quantity +'</td>'+
                            '<td>'+ number_format(price,0,'.',',') +'đ</td>'+
                        '<tr>';
            });
            div += '<tr>'+
                        '<td colspan="5" style="text-align:right;">Tổng</td>'+
                        '<td>'+ number_format(price,0,'.',',') +'đ</td>'+
                    '<tr>';
            document.getElementById('products').innerHTML = div;

            let modalfooter = '<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Thoát</button>'+
                                '<button onclick="update('+data.id+',-1)" type="button" class="btn btn-danger">Hủy đơn</button>';
            document.getElementById('modal-footer').innerHTML = modalfooter;

        },
        error: function (){
            alert('Có lỗi xảy ra');
        }
    });
};
function update(id,active){
    let title="";
    if(active==1){
        title="Bạn muốn xác nhận đơn hàng này không !";
    }else if(active==-1){
        title="Bạn muốn hủy đơn hàng này không !";
    }
    swal({   
        title: title,
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
                    url: '{{route('admin.orderform.update')}}',
                    type: 'get',
                    cache: false,
                    data: {
                        id:id,
                        active:active
                    },
                    success: function(data){
                        location.reload();
                    },
                    error: function (){
                        alert('Có lỗi xảy ra');
                    }
                });
            }
        }
    );
}
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
            "url":"{{ route('admin.orderform.apisuccess') }}",
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
            {"data":"date"},
            {"data":"name"},
            {"data":"phone"},
            {"data":"address"},
            {"data":"active"},
            {"data":"waybill_code"},
            {"data":"action"}
        ]
    });
</script>
@endsection