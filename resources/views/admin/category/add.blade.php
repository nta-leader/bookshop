@extends('templates.admin.master')
@section('css')
<link rel="stylesheet" href="{{ $urlTemplateAdmin }}/bower_components/select2/dist/css/select2.min.css">
@endsection
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Thêm danh mục
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('admin.home.index') }}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="{{ route('admin.category.index') }}"><i class="fa fa-files-o"></i> Quản lý danh mục</a></li>
            <li class="active">Thêm danh mục</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Thông tin danh mục</h3>
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
                <form role="form" method="POST" action="{{ route('admin.category.add') }}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="box-body">
                        @if($errors->has('parent_id'))
                            <div class="alert alert-danger error">
                                <ul>
                                    @foreach ($errors->get('parent_id') as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="form-group">
                            <label>Danh mục cha</label>
                            <select name="parent_id" class="form-control" style="width: 100%;">
                                <option value="0" selected="selected">ROOT</option>
                                @php indanhmuc($data, 0, old('parent_id')); @endphp
                            </select>
                        </div>
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
                            <label>Tên danh mục</label>
                            <input type="text" name="name" value="{{ old('name') }}" class="form-control" placeholder="Nhập tên danh mục">
                        </div>
                        @if ($errors->has('url'))
                            <div class="alert alert-danger error">
                                <ul>
                                    @foreach ($errors->get('url') as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="form-group">
                            <label>Url</label>
                            <input type="text" name="url"" value="{{ old('url') }}" class="form-control" placeholder="VD: sach-on-thi">
                        </div>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Thêm</button>
                    </div>
                </form>
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
@section('js')
<script src="{{ $urlTemplateAdmin }}/bower_components/select2/dist/js/select2.full.min.js"></script>
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()
  })
</script>
@endsection