@extends('templates.admin.master')
@section('css')
<!-- DataTables -->
<link rel="stylesheet" href="{{ $urlTemplateAdmin }}/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
<style>a.del {cursor: pointer;}</style>
@endsection

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Quản lý ảnh
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('admin.home.index') }}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="{{ route('admin.product.index') }}"><i class="fa fa-th"></i> Quản lý sản phẩm</a></li>
            <li class="active">Quản lý ảnh</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <form role="form" method="POST" action="{{ route('admin.product.picture.add',['id_product'=>$id_product]) }}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    @if ($errors->has('picture'))
                        <div class="alert alert-danger error">
                            <ul>
                                @foreach ($errors->get('picture') as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="form-group">
                        <label>Upload ảnh(Chọn 1 hoặc nhiều file)</label>
                        @if(Session::has('msg'))
                            <p class="msg">{{ Session::get('msg') }}</p>
                        @endif
                        <input type="file" name="picture[]" multiple>
                    </div>
                    <button type="submit" class="btn btn-save">Upload</button>
                </form>
            </div>
            <div class="box-body">
                <ul class="mailbox-attachments clearfix">
                    @foreach($objItems as $stt => $objItem)
                    @php
                        $id_picture = $objItem->id;
                        $name = $objItem->name;
                        $urlDel = route('admin.product.picture.del',['id'=>$id_picture]);
                    @endphp
                    <li>
                        <span class="mailbox-attachment-icon has-img">
                            <img src="/storage/app/files/product/{{ $name }}">
                        </span>
                        <div class="mailbox-attachment-info">
                            <a data-urlDel="{{ $urlDel }}" class="del" mailbox-attachment-name"><i class="fa fa-trash-o"></i> Xóa</a>
                        </div>
                    </li>
                    @endforeach
                </ul>
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
            swal({   
                title: "Xóa hình này",
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
}, 5000);
</script>
@endsection