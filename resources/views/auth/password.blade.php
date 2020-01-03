@extends('templates.admin.master')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Đổi mật khẩu
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
                <h3 class="box-title">Đổi mật khẩu</h3>
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
            <form role="form" method="POST" action="{{ route('auth.password') }}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="box-body">
                    @if(Session::has('msg'))
                        <p class="msg">{{ Session::get('msg') }}</p>
                    @endif
                    @if ($errors->has('password'))
                        <div class="alert alert-danger error">
                            <ul>
                                @foreach ($errors->get('password') as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="form-group">
                        <label>Mật khẩu cũ</label>
                        <input type="password" name="password" value="" class="form-control" placeholder="Nhập mật khẩu cũ !">
                    </div>

                    @if ($errors->has('passwordNew'))
                        <div class="alert alert-danger error">
                            <ul>
                                @foreach ($errors->get('password') as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="form-group">
                        <label>Mật khẩu mới</label>
                        <input type="password" name="passwordNew" value="" class="form-control" placeholder="Nhập mật khẩu cũ !">
                    </div>

                    @if ($errors->has('rPasswordNew'))
                        <div class="alert alert-danger error">
                            <ul>
                                @foreach ($errors->get('rPasswordNew') as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="form-group">
                        <label>Nhập lại mật khẩu mới</label>
                        <input type="password" name="rPasswordNew" value="" class="form-control" placeholder="Nhập lại mật khẩu mới !">
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Đổi</button>
                </div>
            </form>
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection
@section('js')
<script>
setTimeout(function(){
    var msg = document.getElementsByClassName("msg");
    if(msg.length > 0){
        msg[0].style.display="none";
    }
}, 2000);
</script>
@endsection