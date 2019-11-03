<form action="{{ route('admin.product.sizecolor.editPostColor',['id_color'=>$objItem->id_color]) }}" method="post">
    {{ csrf_field() }}
    <div class="row">
        <div class="col-md-6">
            <div class="row">
                <div class="col-md-8">
                    <input type="text" name="color_name" value="{{ $objItem->color_name }}" class="form-control" placeholder="Tên màu cho sản phẩm">
                </div>
                <div class="col-md-4">
                    <input type="color" name="color_code" value="{{ $objItem->color_code }}" class="form-control">
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <input id="gia_color" type="number" value="{{ $objItem->basis_price }}" name="basis_price" class="form-control" placeholder="Nhập giá">
                <p id="view_gia_color" style="padding: 1px 12px;color:red;"></p>
                @if($objItem->id_sale!=null)
                <p id="view_gia_sale_color" style="padding: 1px 12px;color:red;"></p>
                @endif
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <input type="submit" name="submit" value="Sửa" class="btn btn-success">
            </div>
        </div>
    </div>
</form>
<script>
$("#gia_color").keyup(function () {
    var gia =$(this).val();
    var value='Giá : '+number_format(gia,0,'.',',')+' đ';
    $("#view_gia_color").text(value);

    @if($objItem->id_sale!=null)
        var percent={{ $objItem->percent }};
        var sale_price=gia*(100-percent)/100;
        sale_price='Giá sale : '+number_format(sale_price,0,'.',',')+' đ';
        $("#view_gia_sale_color").text(sale_price);
    @endif
}).keyup();
</script>