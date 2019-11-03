@extends('templates.admin.master')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Sửa sản phẩm
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('admin.home.index') }}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="{{ route('admin.product.index') }}"><i class="fa fa-th"></i> Quản lý sản phẩm</a></li>
            <li class="active">Sửa sản phẩm</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Thông tin sản phẩm</h3>
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
            @php
                $id = $objItemProduct->id;
                $name = $objItemProduct->name;
                $product_code = $objItemProduct->product_code;
                $id_category = $objItemProduct->id_category;
                $picture = $objItemProduct->picture;
                $content = $objItemProduct->content;
                $evaluate = $objItemProduct->evaluate;
                $active = $objItemProduct->active;
                if($active==1){
                    $hien="checked";
                    $an="";
                }else{
                    $hien="";
                    $an="checked";
                }
            @endphp
            <div class="box-body">
                <form role="form" method="POST" action="{{ route('admin.product.edit',['id'=>$id]) }}" enctype="multipart/form-data">
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
                            <label>Tên sản phẩm</label>
                            <input type="text" name="name" value="{{ $name }}" class="form-control" placeholder="Nhập tên sản phẩm">
                        </div>

                        @if ($errors->has('product_code'))
                            <div class="alert alert-danger error">
                                <ul>
                                    @foreach ($errors->get('product_code') as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="form-group">
                            <label>Mã sản phẩm</label>
                            <input type="text" name="product_code" value="{{ $product_code }}" class="form-control" placeholder="Nhập mã sản phẩm">
                        </div>

                        @if ($errors->has('id_category'))
                            <div class="alert alert-danger error">
                                <ul>
                                    @foreach ($errors->get('id_category') as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="form-group">
                            <label>Danh mục</label>
                            <select name="id_category" class="form-control">
                                <option value="">Chọn danh mục</option>
                                @foreach($objItemsCategory as $objItem)
                                <option value="{{ $objItem->id }}" @if($objItem->id == $id_category) selected @endif >{{ $objItem->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        @if ($errors->has('evaluate'))
                            <div class="alert alert-danger error">
                                <ul>
                                    @foreach ($errors->get('evaluate') as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="form-group">
                            <label>Dánh giá</label>
                            <select name="evaluate" class="form-control">
                                <option value="">Chọn sao</option>
                                @for($i=0;$i<=5;$i++)
                                <option value="{{ $i }}" @if($i == $evaluate) selected @endif >{{ $i }} sao</option>
                                @endfor
                            </select>
                        </div>

                        @if ($errors->has('picture_new'))
                            <div class="alert alert-danger error">
                                <ul>
                                    @foreach ($errors->get('picture_new') as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="form-group">
                            <label>Hình ảnh</label><br>
                            <img src="/storage/app/files/product/{{ $picture }}" width="25%">
                            <input type="text" name="picture" value="{{ $picture }}" style="display:none;">
                            <input type="file" name="picture_new">
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

                        @if ($errors->has('active'))
                            <div class="alert alert-danger error">
                                <ul>
                                    @foreach ($errors->get('active') as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="form-group">
                            <label>Trạng thái</label>
                            <div class="checkbox">
                                <label>
                                    <input type="radio" name="active" value="1" {{ $hien }}> Hiện |
                                    <input type="radio" name="active" value="0" {{ $an }}> Ẩn
                                </label>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Sửa</button>
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
<script src="{{ $urlTemplateAdmin }}/ckeditor/ckeditor.js"></script>
<script>
$(document).ready(function () {
    CKEDITOR.replace( 'ckeditor1' );
})
</script>
@endsection