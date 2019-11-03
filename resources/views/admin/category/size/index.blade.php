@extends('templates.admin.master')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Quản lý size({{ $objItemCategory->name }})
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('admin.home.index') }}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="{{ route('admin.category.index') }}"><i class="fa fa-files-o"></i> Quản lý danh mục</a></li>
            <li>Quản lý size</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                
            </div>
            <div class="box-body">
                <form role="form" method="POST" action="{{ route('admin.category.size.add',['id_category'=>$objItemCategory->id]) }}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    @if(Session::has('msg1'))
                        <p class="msg msg1">{{ Session::get('msg1') }}</p>
                    @endif
                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group">
                                <input type="text" name="name" class="form-control" placeholder="Nhập size ; vd: S">
                                @if ($errors->has('name'))
                                <div class="alert alert-danger error">
                                    <ul>
                                        @foreach ($errors->get('name') as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <input type="text" name="height" class="form-control" placeholder="Chiều cao(cm); vd: 155-160">
                                @if ($errors->has('height'))
                                <div class="alert alert-danger error">
                                    <ul>
                                        @foreach ($errors->get('height') as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <input type="text" name="weight" class="form-control" placeholder="Cân nặng(kg); vd: 49-55">
                                @if ($errors->has('weight'))
                                <div class="alert alert-danger error">
                                    <ul>
                                        @foreach ($errors->get('weight') as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <input type="submit" name="submit" value="Thêm size" class="btn btn-success">
                            </div>
                        </div>
                    </div>
                </form>
                <div class="box-body table-responsive no-padding">
                    @if(Session::has('msg'))
                        <p class="msg">{{ Session::get('msg') }}</p>
                    @endif
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <th style="width: 10px;">#</th>
                                <th>Tên size</th>
                                <th>Chiều cao(cm)</th>
                                <th>Cân nặng(kg)</th>
                                <th>Chức năng</th>
                            </tr>
                            @foreach($objItems as $stt => $objItem)
                            @php
                                $id = $objItem->id;
                                $name = $objItem->name;
                                $height = $objItem->height;
                                $weight = $objItem->weight;
                                $urlEdit = route('admin.category.size.edit',['id'=>$id]);
                                $urlDel = route('admin.category.size.del',['id'=>$id]);
                            @endphp
                            <tr>
                                <td>{{ $stt + 1 }}</td>
                                <td>{{ $name }}</td>
                                <td>{{ $height }}</td>
                                <td>{{ $weight }}</td>
                                <td>
                                    <a href="{{ $urlEdit }}" class="btn btn-success">Sửa</a> |
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
            swal({   
                title: "Xóa size này không ?",
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