@extends('templates.admin.master')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Quản lý danh mục
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('admin.home.index') }}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="{{ route('admin.category.index') }}"><i class="fa fa-files-o"></i> Quản lý danh mục</a></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title"><a href="{{ route('admin.category.add') }}" class="btn btn-success">Thêm danh mục</a></h3>
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
                                <th>Tên danh mục</th>
                                <th>Icon</th>
                                <th>Số lượng sản phẩm</th>
                                <th>Chức năng</th>
                            </tr>
                            
                            @php
                                $id = 1;
                                $name = 1;
                                $picture = 1;
                                $count_product = 1;
                                $urlProduct = 1;
                                $urlSize = 1;
                                $urlEdit = route('admin.category.edit',['id'=>$id]);
                                $urlDel = route('admin.category.del',['id'=>$id]);
                            @endphp
                            <tr>
                                <td>1</td>
                                <td>{{ $name }}</td>
                                <td><img src="/storage/app/files/category/{{ $picture }}" width="50px"></td>
                                <td>{{ $count_product }}</td>
                                <td>
                                    <a href="{{ $urlProduct }}" class="btn btn-info">Xem sản phẩm</a> |
                                    <a href="{{ $urlSize }}" class="btn btn-warning">Quản lý size</a> |
                                    <a href="{{ $urlEdit }}" class="btn btn-success">Sửa</a> |
                                    <a data-urldel="{{ $urlDel }}" data-countProduct="{{ $count_product }}" class="del btn btn-danger">Xóa</a>
                                </td>
                            </tr>
                            
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
                title: "Xóa danh mục này",
                text: "và "+countProduct+" sản phẩm",         
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