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
            Quản lý size, màu
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('admin.home.index') }}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="{{ route('admin.product.index') }}"><i class="fa fa-th"></i> Quản lý sản phẩm</a></li>
            <li class="active">Quản lý size, màu</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                @if(Session::has('msg'))
                    <p class="msg">{{ Session::get('msg') }}</p>
                @endif
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Tên sản phẩm</th>
                            <th>Mã sản phẩm</th>
                            <th>Giá mặc định</th>
                            @if(isset($objItemProduct->sale))
                            <th>Sale(%)</th>
                            <th>Giá sale</th>
                            @endif
                            <th>Hình ảnh</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            
                            <td>{{ $objItemProduct->name }}</td>
                            <td>{{ $objItemProduct->product_code }}</td>
                            <td>{{ number_format($objItemProduct->default_price,0,'.',',') }} đ</td>
                            @if(isset($objItemProduct->sale))
                            @php
                                $sale_percent = $objItemProduct->sale->percent;
                                $sale_price = number_format($objItemProduct->default_price*(100-$sale_percent)/100,0,'.',',');
                                $urlDelSaleProduct = route('admin.product.sizecolor.delSaleProduct',['id_product'=>$id_product]);
                            @endphp
                            <td>
                                {{ $sale_percent }} %<br>
                                <a data-urldel="{{ $urlDelSaleProduct }}" data-title="Bạn có bỏ sale cho sản phẩm này không ?" class="del btn btn-danger">Bỏ sale</a>
                            </td>
                            <td><span style="color:red">{{ $sale_price }} đ</span></td>
                            @endif
                            <td><img src="/storage/app/files/product/{{ $objItemProduct->picture }}" width="100px"></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="box-body">
                <form role="form" method="POST" action="{{ route('admin.product.sizecolor.addSizeColor',['id_product'=>$id_product]) }}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    @if(Session::has('msg1'))
                        <p class="msg msg1">{{ Session::get('msg1') }}</p>
                    @endif
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <select name="size" class="form-control">
                                    <option value="">--Chọn size--</option>
                                    @foreach($objItemsSizeCategory as $objItem)
                                    <option @if(old('size')==$objItem->name) selected @endif value="{{ $objItem->name }}">{{ $objItem->name }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('size'))
                                <div class="alert alert-danger error">
                                    <ul>
                                        @foreach ($errors->get('size') as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="row">
                                <div class="col-md-8">
                                    <input type="text" name="color_name" class="form-control" value="{{ old('color_name') }}" placeholder="Tên màu cho sản phẩm">
                                    @if ($errors->has('color_name'))
                                    <div class="alert alert-danger error">
                                        <ul>
                                            @foreach ($errors->get('color_name') as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    @endif
                                </div>
                                <div class="col-md-4">
                                    <input type="color" name="color_code" value="{{ old('color_code') }}" class="form-control">
                                    @if ($errors->has('color_code'))
                                    <div class="alert alert-danger error">
                                        <ul>
                                            @foreach ($errors->get('color_code') as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <input id="gia" type="number" name="basis_price" value="{{ old('basis_price') }}" class="form-control" placeholder="Nhập giá">
                                @if ($errors->has('basis_price'))
                                <div class="alert alert-danger error">
                                    <ul>
                                        @foreach ($errors->get('basis_price') as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                @endif
                                <p id="view_gia" style="padding: 1px 12px;color:red;"></p>
                                @if(isset($objItemProduct->sale))
                                <p id="view_gia_sale" style="padding: 1px 12px;color:red;"></p>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <input type="submit" name="submit" value="Thêm size" class="btn btn-success">
                            </div>
                        </div>
                    </div>
                </form>
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        @foreach($objItemsSize as $objItem)
                            <li class="@if($objItem->id == $id_active) active @endif">
                                <a href="#tab_{{ $objItem->id }}" data-toggle="tab" aria-expanded="true">Size <span style="color:red;">{{ $objItem->name }}</span></a>
                            </li>
                        @endforeach
                    </ul>
                    <div class="tab-content">
                        @foreach($objItemsSize as $objItem)
                        @php
                            $id_size = $objItem->id;
                            $active_size = $objItem->active;
                            $urlDelSize = route('admin.product.sizecolor.delSize',['id_size'=>$id_size]);
                        @endphp
                        <div class="tab-pane @if($id_size == $id_active) active @endif" id="tab_{{ $id_size }}">
                            <form role="form" method="POST" action="{{ route('admin.product.sizecolor.addColor',['id_product'=>$id_product, 'id_size'=>$id_size]) }}" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                @if(Session::has('msg2'))
                                    <p class="msg msg2">{{ Session::get('msg2') }}</p>
                                @endif
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="row">
                                            <div class="col-md-8">
                                                <input type="text" name="_color_name" value="{{ old('_color_name') }}" class="form-control" placeholder="Tên màu cho sản phẩm">
                                                @if ($errors->has('_color_name'))
                                                <div class="alert alert-danger error">
                                                    <ul>
                                                        @foreach ($errors->get('_color_name') as $error)
                                                            <li>{{ $error }}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                                @endif
                                            </div>
                                            <div class="col-md-4">
                                                <input type="color" name="_color_code" value="{{ old('_color_code') }}" class="form-control">
                                                @if ($errors->has('_color_code'))
                                                <div class="alert alert-danger error">
                                                    <ul>
                                                        @foreach ($errors->get('_color_code') as $error)
                                                            <li>{{ $error }}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <input id="gia{{ $id_size }}" type="number" value="{{ old('_basis_price') }}" name="_basis_price" class="form-control" placeholder="Nhập giá">
                                            @if ($errors->has('_basis_price'))
                                            <div class="alert alert-danger error">
                                                <ul>
                                                    @foreach ($errors->get('_basis_price') as $error)
                                                        <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                            @endif
                                            <p id="view_gia{{ $id_size }}" style="padding: 1px 12px;color:red;"></p>
                                            @if(isset($objItemProduct->sale))
                                            <p id="view_gia_sale{{ $id_size }}" style="padding: 1px 12px;color:red;"></p>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <input type="submit" name="submit" value="Thêm màu" class="btn btn-success">
                                        </div>
                                    </div>
                                </div>
                                <span id="active-size{{ $id_size }}">
                                @if($active_size==0)
                                    <a class="btn btn-danger" onclick="active_size(0,{{ $id_size }})">Ẩn</a>
                                @else
                                    <a href="#" class="btn btn-success" onclick="active_size(1,{{ $id_size }})">Hiện</a>
                                @endif
                                </span>
                                <a data-urldel="{{ $urlDelSize }}" data-title="Bạn có muốn xóa size này không ?" class="del btn btn-danger"><i class="fa fa-trash-o"></i> Xóa size</a>
                                <table id="dataTables-example" class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th style="width: 10px">#</th>
                                            <th>Màu</th>
                                            <th>Giá</th>
                                            @if(isset($objItemProduct->sale))
                                            <th>Sale(%)</th>
                                            <th>Giá sale</th>
                                            @endif                                            
                                            
                                            <th>Trạng thái</th>
                                            <th>Chức năng</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($objItem->color as $stt => $item)
                                        @php
                                            $nameSize = $objItem->name;
                                            $name_color = $item->name;
                                            $color_code = $item->color_code;
                                            $basis_price = $item->basis_price;
                                            $active_default = $item->active_default;
                                            $active_color = $item->active;
                                            $urlEdit = "#";
                                            $urlDelColor = route('admin.product.sizecolor.delColor',['id_color'=>$item->id_color,'id_size'=>$id_size]);
                                        @endphp
                                        <tr>
                                            <td>{{ $stt+1 }}</td>
                                            <td style="color:{{ $color_code }};">Size {{ $nameSize }} - {{ $name_color }}</td>
                                            <td>{{ number_format($basis_price,0,'.',',') }} đ</td>
                                            @if(isset($objItemProduct->sale))
                                            <td>{{ $sale_percent }} %</td>
                                            <td><span style="color:red;">{{ number_format($basis_price*(100-$sale_percent)/100,0,'.',',') }} đ</span></td>
                                            @endif
                                            
                                            <td id="active-color{{ $item->id_color }}">
                                                @if($active_color==0)
                                                    <a class="btn btn-danger" onclick="active_color(0,{{ $item->id_color }})">Hết hàng</a>
                                                @else
                                                    <a href="#" class="btn btn-success" onclick="active_color(1,{{ $item->id_color }})">Còn hàng</a>
                                                @endif
                                            </td>
                                            <td>
                                                <a onclick="editColor({{ $item->id_color }})" data-toggle="modal" data-target="#modal-default" class="btn btn-success">
                                                    <i class="fa fa-edit"></i> Sửa
                                                </a>
                                                <a data-urldel="{{ $urlDelColor }}" data-title="Bạn có muốn xóa màu này không ?" class="del btn btn-danger">
                                                    <i class="fa fa-trash-o"></i> Xóa màu
                                                </a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </form>
                        </div>
                        @endforeach
                        <!-- /.tab-pane -->
                    </div>
                    <!-- /.tab-content -->
                </div>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<div class="modal modal-default fade" id="modal-default">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Sửa thông tin màu</h4>
              </div>
              <div class="modal-body" id="view_color">
                
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
<script>
document.addEventListener("DOMContentLoaded",function(){
    var del = document.getElementsByClassName('del');
    for(var i=0;i<del.length;i++){
        del[i].onclick = function(){
            var urlDel = this.getAttribute('data-urlDel');
            var title = this.getAttribute('data-title');
            swal({   
                title: title,
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

function active_color(active, id_color){
    $.ajax({
        url: '{{route('admin.product.sizecolor.activeColor')}}',
        type: 'get',
        cache: false,
        data: {
            id_color:id_color,
            active:active
        },
        success: function(data){
            $('#active-color'+id_color).html(data);
        },
        error: function (){
            alert('Có lỗi xảy ra');
        }
    });
};
function editColor(id_color){
    $.ajax({
        url: '{{route('admin.product.sizecolor.editColor')}}',
        type: 'get',
        cache: false,
        data: {
            id_color:id_color
        },
        success: function(data){
            $('#view_color').html(data);
        },
        error: function (){
            alert('Có lỗi xảy ra');
        }
    });
};
</script>
@endsection

@section('js')
<script>
function number_format( number, decimals, dec_point, thousands_sep ) {
    var n = number, c = isNaN(decimals = Math.abs(decimals)) ? 2 : decimals;
    var d = dec_point == undefined ? "," : dec_point;
    var t = thousands_sep == undefined ? "." : thousands_sep, s = n < 0 ? "-" : "";
    var i = parseInt(n = Math.abs(+n || 0).toFixed(c)) + "", j = (j = i.length) > 3 ? j % 3 : 0;
                              
    return s + (j ? i.substr(0, j) + t : "") + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + t) + (c ? d + Math.abs(n - i).toFixed(c).slice(2) : "");
}
$(document).ready(function(){
    $(function(){
        $("#gia").keyup(function () {
            var gia =$(this).val();
            var value='Giá : '+number_format(gia,0,'.',',')+' đ';
            $("#view_gia").text(value);

            @if(isset($objItemProduct->sale))
                var percent={{ $sale_percent }};
                var sale_price=gia*(100-percent)/100;
                sale_price='Giá sale : '+number_format(sale_price,0,'.',',')+' đ';
                $("#view_gia_sale").text(sale_price);
            @endif
        }).keyup();

        @foreach($objItemsSize as $objItem)
        $("#gia{{ $objItem->id }}").keyup(function () {
            var gia =$(this).val();
            var value='Giá : '+number_format(gia,0,'.',',')+' đ';
            $("#view_gia{{ $objItem->id }}").text(value);

            @if(isset($objItemProduct->sale))
                var percent={{ $sale_percent }};
                var sale_price=gia*(100-percent)/100;
                sale_price='Giá sale : '+number_format(sale_price,0,'.',',')+' đ';
                $("#view_gia_sale{{ $objItem->id }}").text(sale_price);
            @endif
        }).keyup();
        @endforeach
    });
});
document.addEventListener("DOMContentLoaded",function(){
    setTimeout(function(){
        var msg = document.getElementsByClassName("msg");
        if(msg.length > 0){
            msg[0].style.display="none";
        }
    }, 2000);
},false);
</script>
@endsection