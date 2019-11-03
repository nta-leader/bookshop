@extends('templates.admin.master')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Quản lý mail
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('admin.home.index') }}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="{{ route('admin.mail.index') }}"><i class="fa fa-envelope"></i> Quản lý mail</a></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Khi có đơn hàng mới thông báo đến Email nhân viên</h3>
            </div>
            <div class="box-body">
                <form role="form" method="POST" action="{{ route('admin.mail.add') }}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    @if(Session::has('msg1'))
                        <p class="msg msg1">{{ Session::get('msg1') }}</p>
                    @endif
                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group">
                                <input type="text" name="name" class="form-control" placeholder="Nhập tên nv...">
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
                                <input type="email" name="email" class="form-control" placeholder="Nhập email nv...">
                                @if ($errors->has('email'))
                                <div class="alert alert-danger error">
                                    <ul>
                                        @foreach ($errors->get('email') as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <input type="submit" name="submit" value="Thêm email" class="btn btn-success">
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
                                <th>Họ tên</th>
                                <th>Email</th>
                                <th>Chức năng</th>
                            </tr>
                            @foreach($objItems as $stt => $objItem)
                            @php
                                $id = $objItem->id;
                                $name = $objItem->name;
                                $email = $objItem->email;
                                $urlDel = route('admin.mail.del',['id'=>$id]);
                            @endphp
                            <tr>
                                <td>{{ $stt + 1 }}</td>
                                <td>{{ $name }}</td>
                                <td>{{ $email }}</td>
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
            swal({   
                title: "Xóa mail này không ?",
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