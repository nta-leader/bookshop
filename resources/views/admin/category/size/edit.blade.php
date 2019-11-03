@extends('templates.admin.master')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Sửa size
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('admin.home.index') }}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="{{ route('admin.category.index') }}"><i class="fa fa-files-o"></i> Quản lý danh mục</a></li>
            <li><a href="{{ route('admin.category.size.index',['id'=>$objItem->id_category]) }}">Quản lý size</a></li>
            <li class="active">Sửa size</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Thông tin size</h3>
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
            <div class="box-body">
                <form role="form" method="POST" action="{{ route('admin.category.size.postEdit',['id'=>$objItem->id,'id_category'=>$objItem->id_category]) }}" enctype="multipart/form-data">
                    {{ csrf_field() }}
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
                        <label>Tên size</label>
                        <input type="text" name="name" value="{{ $objItem->name }}" class="form-control" placeholder="Nhập tên size">
                    </div>
                    @if ($errors->has('height'))
                    <div class="alert alert-danger error">
                        <ul>
                            @foreach ($errors->get('height') as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <div class="form-group">
                        <label>Chiều cao(cm); vd: 155-170</label>
                        <input type="text" name="height" value="{{ $objItem->height }}" class="form-control" placeholder="Nhập chiều cao">
                    </div>
                    @if ($errors->has('weight'))
                    <div class="alert alert-danger error">
                        <ul>
                            @foreach ($errors->get('weight') as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <div class="form-group">
                        <label>Cân năng(kg); vd: 50-60</label>
                        <input type="text" name="weight" value="{{ $objItem->weight }}" class="form-control" placeholder="Nhập cân năng">
                    </div>
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Sửa</button>
                    </div>
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
@endsection