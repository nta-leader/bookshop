@extends('templates.admin.master')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Quản lý slide
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('admin.home.index') }}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><i class="fa fa fa-newspaper-o"></i> Quản lý sale - slide</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title"><a href="{{ route('admin.sale.add') }}" class="btn btn-success">Thêm sale - slide</a></h3>
            </div>
            <div class="box-body">
                <div class="box-body table-responsive no-padding">
                    @if(Session::has('msg'))
                        <p class="msg">{{ Session::get('msg') }}</p>
                    @endif
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <th style="width: 10px;">#</th>
                                <th>Tên slide</th>
                                <th>Thời gian</th>
                                <th>Giảm(%)</th>
                                <th>Hình ảnh</th>
                                <th>Số lượng sản phẩm</th>
                                <th>Chức năng</th>
                            </tr>
                            @foreach($objItems as $stt => $objItem)
                            @php
                                $id = $objItem->id;
                                $name = $objItem->name;
                                $start = date('H:i d/m/Y',$objItem->start);
                                $finish = date('H:i d/m/Y',$objItem->finish);
                                $picture = $objItem->picture;
                                $percent = $objItem->percent;
                                $count_product = $objItem->count_product;
                                $urlProduct = route('admin.sale.product.index',['id_sale'=>$id,'id_category'=>0]);
                                $urlEdit = route('admin.sale.edit',['id'=>$id]);
                                $urlDel = route('admin.sale.del',['id'=>$id]);
                            @endphp
                            <tr>
                                <td>{{ $stt + 1 }}</td>
                                <td>{{ $name }}</td>
                                <td>{{ $start." - ".$finish }}</td>
                                <td>{{ $percent }} %</td>
                                <td><img src="/storage/app/files/sale/{{ $picture }}" width="200px"></td>
                                <td>{{ $count_product }}</td>
                                <td>
                                    <a href="{{ $urlProduct }}" class="btn btn-info">Xem sản phẩm</a> |
                                    <a href="{{ $urlEdit }}" class="btn btn-success">Sửa</a> |
                                    <a data-urldel="{{ $urlDel }}" data-countProduct="{{ $count_product }}" class="del btn btn-danger">Xóa</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
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
document.addEventListener("DOMContentLoaded",function(){
    var del = document.getElementsByClassName('del');
    for(var i=0;i<del.length;i++){
        del[i].onclick = function(){
            var urlDel = this.getAttribute('data-urlDel');
            var countProduct = this.getAttribute('data-countProduct');
            swal({   
                title: "Xóa sale này",
                text: "và "+countProduct+" sản phẩm về giá cũ",         
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
        }
    }
}, false);

setTimeout(function(){
    var msg = document.getElementsByClassName("msg");
    if(msg.length > 0){
        msg[0].style.display="none";
    }
}, 2000);
</script>
@endsection