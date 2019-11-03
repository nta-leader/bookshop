@extends('templates.admin.master')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Quản lý mua thêm
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('admin.home.index') }}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="{{ route('admin.buymore.index') }}"><i class="fa fa-book"></i> Quản lý mua thêm</a></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title"><a href="{{ route('admin.buymore.add') }}" class="btn btn-success">Thêm sản phẩm</a></h3>
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
                                <th>Tên sản phẩm</th>
                                <th>Danh mục</th>
                                <th>Hình ảnh</th>
                                <th>Giá bán</th>
                                <th>Chức năng</th>
                            </tr>
                            @foreach($objItems as $stt => $objItem)
                            @php
                                $id = $objItem->id;
                                $name = $objItem->name;
                                $name_category = $objItem->name_category;
                                $picture = $objItem->picture;
                                $price = $objItem->price;
                                $urlDel = route('admin.buymore.del',['id'=>$id]);
                            @endphp
                            <tr>
                                <td>{{ $stt + 1 }}</td>
                                <td>{{ $name }}</td>
                                <td>{{ $name_category }}</td>
                                <td><img src="/storage/app/files/product/{{ $picture }}" width="50px"></td>
                                <td>{{ number_format($price,0,'.',',') }} đ</td>
                                <td>
                                    <a data-urldel="{{ $urlDel }}" class="del btn btn-danger">Xóa</a>
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