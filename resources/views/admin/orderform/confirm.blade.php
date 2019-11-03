@extends('templates.admin.master')
@section('css')
<style>
tr:hover {
    cursor: pointer;
    background: #eee;
}
</style>
@endsection()
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Quản lý đơn hàng đã xác nhận
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('admin.home.index') }}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><i class="fa fa-pie-chart"></i> Các đơn hàng đã xác nhận</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">
            <div class="box-body">
                <div class="box box-solid">
                    <div class="box-header with-border">
                        <h3 class="box-title">Các đơn hàng đã xác nhận</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        @if(Session::has('msg'))
                            <p class="msg">{{ Session::get('msg') }}</p>
                        @endif
                        <div class="box-group" id="accordion">
                            @foreach($objItems as $stt => $objItem)
                            @php
                                $id = $objItem->id;

                                $date = $objItem->date;
                                $date = strtotime($date);
                                $date = date('H:i d/m/Y',$date);

                                $phone = $objItem->phone;
                                $name = $objItem->name;
                                $address = $objItem->address;
                                $product = json_decode($objItem->product);
                                $buy_more = json_decode($objItem->buy_more);
                            @endphp
                            <div class="panel box box-success">
                                <div class="box-header with-border">
                                    <h4 class="box-title">
                                        <a class="title" data-toggle="collapse" data-parent="#accordion" href="#collapse{{ $id }}">
                                            # {{ $stt+1 }}<br>
                                            <span style="color:red;">{{ $date }}</span><br>
                                            SDT: <span style="color:red;">{{ $phone }}</span> |
                                            Tên: <span style="color:red;">{{ $name }}</span> |
                                            Địa chỉ: <span style="color:red;">{{ $address }}</span>
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapse{{ $id }}" class="panel-collapse collapse @if($stt == 0) in @endif">
                                    <div class="box-body">
                                        <div class="box-body table-responsive no-padding">
                                            <table class="table table-bordered">
                                                <tbody>
                                                    <tr>
                                                        <th style="width: 10px;">#</th>
                                                        <th>Tên sản phẩm</th>
                                                        <th>Size</th>
                                                        <th>Màu</th>
                                                        <th>Giá</th>
                                                        <th>Số lượng</th>
                                                        <th>Tổng</th>
                                                    </tr>
                                                    @php $sum = 0; $sumBuymore = 0; @endphp
                                                    @foreach($product as $stt => $item)
                                                    @php
                                                        $name = $item->name;
                                                        $size = $item->size;
                                                        $color = $item->color;
                                                        $quantity = $item->quantity;
                                                        $price = $item->price;
                                                        $sum_row = $price*$quantity;
                                                        $sum += $sum_row;
                                                    @endphp
                                                    <tr>
                                                        <td>{{ $stt + 1 }}</td>
                                                        <td>{{ $name }}</td>
                                                        <td>{{ $size }}</td>
                                                        <td>{{ $color }}</td>
                                                        <td>{{ number_format($price,0,'.',',') }} đ</td>
                                                        <td>{{ $quantity }}</td>
                                                        <td>{{ number_format($sum_row,0,'.',',') }} đ</td>
                                                    </tr>
                                                    @endforeach

                                                    @if($buy_more != null)
                                                    <tr>
                                                        <td colspan="6" style="text-align:right;">
                                                            Tổng:
                                                        </td>
                                                        <td>{{ number_format($sum,0,'.',',') }} đ</td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="7" style="text-align:left;font-size:20px;">
                                                            Các sản phẩm mua thêm( Ưu đãi sau khi đặt hàng ! )
                                                        </td>
                                                    </tr>
                                                    @foreach($buy_more as $stt => $item)
                                                    @php
                                                        $name = $item->name;
                                                        $size = $item->size;
                                                        $color = $item->color;
                                                        $quantity = $item->quantity;
                                                        $price = $item->price;
                                                        $sum_row = $price*$quantity;
                                                        $sumBuymore += $sum_row;
                                                        $sum += $sum_row;
                                                    @endphp
                                                    <tr>
                                                        <td>{{ $stt + 1 }}</td>
                                                        <td>{{ $name }}</td>
                                                        <td>{{ $size }}</td>
                                                        <td>{{ $color }}</td>
                                                        <td>{{ number_format($price,0,'.',',') }} đ</td>
                                                        <td>{{ $quantity }}</td>
                                                        <td>{{ number_format($sum_row,0,'.',',') }} đ</td>
                                                    </tr>
                                                    @endforeach
                                                    <tr>
                                                        <td colspan="6" style="text-align:right;">
                                                            Tổng:
                                                        </td>
                                                        <td>{{ number_format($sumBuymore,0,'.',',') }} đ</td>
                                                    </tr>
                                                    @endif
                                                    <tr>
                                                        <td colspan="6" style="text-align:right;">
                                                            
                                                        </td>
                                                        <td>{{ number_format($sum,0,'.',',') }} đ</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        {{ $objItems->links() }}
                    </div>
                    <!-- /.box-body -->
                </div>
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
    var del = document.getElementsByClassName('confirm');
    for(var i=0;i<del.length;i++){
        del[i].onclick = function(){
            var url = this.getAttribute('data-url');
            var content = this.getAttribute('data-content');
            swal({   
                title: content,
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
                        window.location.href=url;   
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