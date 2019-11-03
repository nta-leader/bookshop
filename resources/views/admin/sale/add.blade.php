@extends('templates.admin.master')
@section('css')
<!-- Bootstrap time Picker -->
<link rel="stylesheet" href="{{ $urlTemplateAdmin }}/plugins/timepicker/bootstrap-timepicker.min.css">
@endsection
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Thêm sale - slide
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('admin.home.index') }}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><i class="fa fa fa-newspaper-o"></i> Quản lý sale - slide</li>
            <li class="active">Thêm sale - slide</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Thông tin sale - slide</h3>
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
                <form role="form" method="POST" action="{{ route('admin.sale.add') }}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="box-body">
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
                            <label>Tên sự kiện sale - slide</label>
                            <input type="text" name="name" value="{{ old('name') }}" class="form-control" placeholder="Nhập tên sự kiện sale - slide">
                        </div>

                        @if ($errors->has('start_date'))
                            <div class="alert alert-danger error">
                                <ul>
                                    @foreach ($errors->get('start_date') as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Thời gian bắt đầu</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <input name="start_date" type="text" class="form-control datemask" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask="" placeholder="dd/mm/yyyy">
                                        <div class="input-group-addon">
                                            <i class="fa fa-clock-o"></i>
                                        </div>
                                        <input type="text" name="start_time" class="form-control timepicker">
                                    </div>
                                </div>
                            </div>
                        </div>
                        @if ($errors->has('finish_date'))
                            <div class="alert alert-danger error">
                                <ul>
                                    @foreach ($errors->get('finish_date') as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Thời gian kết thúc</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <input name="finish_date" type="text" class="form-control datemask" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask="" placeholder="dd/mm/yyyy">
                                        <div class="input-group-addon">
                                            <i class="fa fa-clock-o"></i>
                                        </div>
                                        <input type="text" name="finish_time" class="form-control timepicker">
                                    </div>
                                </div>
                            </div>
                        </div>

                        @if ($errors->has('percent'))
                            <div class="alert alert-danger error">
                                <ul>
                                    @foreach ($errors->get('percent') as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="form-group">
                            <label>Sale(%)</label>
                            <select name="percent" class="form-control">
                                <option value="">--Chọn sale--</option>
                                @for($i=1;$i<=99;$i++)
                                <option @if(old('percent')==$i) selected @endif value="{{ $i }}">{{ $i }} %</option>
                                @endfor
                            </select>
                        </div>

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
                            <label>Hình ảnh</label><br>
                            <input type="file" name="picture" >
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
<!-- InputMask -->
<script src="{{ $urlTemplateAdmin }}/plugins/input-mask/jquery.inputmask.js"></script>
<script src="{{ $urlTemplateAdmin }}/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="{{ $urlTemplateAdmin }}/plugins/input-mask/jquery.inputmask.extensions.js"></script>
<!-- bootstrap time picker -->
<script src="{{ $urlTemplateAdmin }}/plugins/timepicker/bootstrap-timepicker.min.js"></script>
<!-- Page script -->
<script>
document.addEventListener("DOMContentLoaded",function(){
    $(function () {
        //Datemask dd/mm/yyyy
        $('.datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
        //Timepicker
        $('.timepicker').timepicker({
            showMeridian: false
        })
    });
},false);
</script>
@endsection