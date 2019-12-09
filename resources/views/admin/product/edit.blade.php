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
                $id = $objItem->id;
                $name = $objItem->name;
                $product_code = $objItem->product_code;
                $basis_price = $objItem->basis_price;
                $link_document = $objItem->link_document;
                $picture = $objItem->picture;
                $preview = $objItem->preview;
                $content = $objItem->content;
                $evaluate = $objItem->evaluate;
                $active = $objItem->active;
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

                        @if ($errors->has('basis_price'))
                            <div class="alert alert-danger error">
                                <ul>
                                    @foreach ($errors->get('basis_price') as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="form-group">
                            <label>Giá</label>
                            <input id="gia_color" type="number" name="basis_price" value="{{ $basis_price }}" class="form-control" placeholder="Nhập giá sản phẩm">
                            <p id="view_gia_color" style="padding: 1px 12px;color:red;"></p>
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

                        @if ($errors->has('link_document'))
                            <div class="alert alert-danger error">
                                <ul>
                                    @foreach ($errors->get('link_document') as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="form-group">
                            <label>link document</label>
                            <input type="text" name="link_document" value="{{ $link_document }}" class="form-control" placeholder="link đọc thử ">
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
                            <label>giới thiệu</label>
                            <textarea name="preview" class="form-control" rows="3" placeholder="Nhập giới thiệu ...">{{ $preview }}</textarea>
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
function number_format( number, decimals, dec_point, thousands_sep ) {
    var n = number, c = isNaN(decimals = Math.abs(decimals)) ? 2 : decimals;
    var d = dec_point == undefined ? "," : dec_point;
    var t = thousands_sep == undefined ? "." : thousands_sep, s = n < 0 ? "-" : "";
    var i = parseInt(n = Math.abs(+n || 0).toFixed(c)) + "", j = (j = i.length) > 3 ? j % 3 : 0;
                              
    return s + (j ? i.substr(0, j) + t : "") + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + t) + (c ? d + Math.abs(n - i).toFixed(c).slice(2) : "");
}
$("#gia_color").keyup(function () {
    var gia =$(this).val();
    var value='Giá : '+number_format(gia,0,'.',',')+' đ';
    $("#view_gia_color").text(value);
}).keyup();
</script>
@endsection