@extends('templates.admin.master')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Home
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('admin.home.index') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Thông tin công ty, group</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                        <i class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip"
                        title="Remove">
                        <i class="fa fa-times"></i>
                    </button>
                </div>
            </div>
            <form role="form" method="POST" action="#" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="box-body">
                    @if(Session::has('msg'))
                        <p class="msg">{{ Session::get('msg') }}</p>
                    @endif
                    <div class="row">
                        @php
                            $name = "";
                            $address = "";
                            $phone = "";
                            $email = "";
                            $facebook = "";
                            $preview = "";
                            $content = "";
                        @endphp
                        <div class="col-md-6">
                            @if ($errors->has('name'))
                                <div class="alert alert-danger error">
                                    <ul>
                                        @foreach ($errors->get('name') as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <div class="form-group">
                                <label>Tên công ty, group</label>
                                <input type="text" name="name" value="{{ $name }}" class="form-control" placeholder="Nhập tên bài viết">
                            </div>

                            @if ($errors->has('address'))
                                <div class="alert alert-danger error">
                                    <ul>
                                        @foreach ($errors->get('address') as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <div class="form-group">
                                <label>Địa chỉ</label>
                                <input type="text" name="address" value="{{ $address }}" class="form-control" placeholder="Nhập tên bài viết">
                            </div>

                            @if ($errors->has('preview'))
                                <div class="alert alert-danger error">
                                    <ul>
                                        @foreach ($errors->get('preview') as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <div class="form-group">
                                <label>Giới thiệu</label>
                                <textarea name="preview" class="form-control" rows="3" placeholder="Nhập giới thiệu ...">{{ $preview }}</textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            @if ($errors->has('phone'))
                                <div class="alert alert-danger error">
                                    <ul>
                                        @foreach ($errors->get('phone') as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <div class="form-group">
                                <label>SDT</label>
                                <input type="text" name="phone" value="{{ $phone }}" class="form-control" placeholder="Nhập tên bài viết">
                            </div>

                            @if ($errors->has('email'))
                                <div class="alert alert-danger error">
                                    <ul>
                                        @foreach ($errors->get('email') as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" name="email" value="{{ $email }}" class="form-control" placeholder="Nhập tên bài viết">
                            </div>

                            @if ($errors->has('facebook'))
                                <div class="alert alert-danger error">
                                    <ul>
                                        @foreach ($errors->get('facebook') as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <div class="form-group">
                                <label>link facebook</label>
                                <input type="text" name="facebook" value="{{ $facebook }}" class="form-control" placeholder="Nhập tên bài viết">
                            </div>
                        </div>
                    </div>

                    @if ($errors->has('content'))
                        <div class="alert alert-danger error">
                            <ul>
                                @foreach ($errors->get('content') as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="form-group">
                        <label>Chi tiết</label>
                        <textarea name="content" id="ckeditor1" class="form-control" rows="3" placeholder="Nhập chi tiết ...">{{ $content }}</textarea>
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Sửa</button>
                </div>
            </form>
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection
@section('js')
<script src="{{ $urlTemplateAdmin }}/ckeditor/ckeditor.js"></script>
<script>
$(document).ready(function () {
    CKEDITOR.replace( 'ckeditor1' );
})
setTimeout(function(){
    var msg = document.getElementsByClassName("msg");
    if(msg.length > 0){
        msg[0].style.display="none";
    }
}, 2000);
</script>
@endsection