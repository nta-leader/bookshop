<table  class="table table-striped table-bordered table-hover" id="example" style="width: 100%;">
    <label><input type="checkbox" id="selecctall" class="flat-red"> Chọn tất cả</label>
    <thead>
        <tr>
            <th style="width: 10px">#</th>
            <th>Tên sản phẩm</th>
            <th>Mã sản phẩm</th>
            <th>Giá</th>
            <th>Sale(%)</th>
            <th>Giá sale</th>
            <th>Hình ảnh</th>
        </tr>
    </thead>
    <tbody>
    @php $percent=$objItem->percent @endphp
    @foreach($objItems as $objItem)
    @php
        $id=$objItem->id;
        $name=$objItem->name;
        $product_code=$objItem->product_code;
        $basis_price=$objItem->basis_price;
        $price=$objItem->price;
        $picture=$objItem->picture;
    @endphp
        <tr>
            <td><input class="checkbox1 flat-red" type="checkbox" name="choose[]" value="{{ $id }}"></td>
            <td>{{ $name }}</td>
            <td>{{ $product_code }}</td>
            <td>{{ number_format($basis_price,0) }}đ</td>
            <td>{{ $percent }}%</td>
            <td><span style="color:red;">{{ number_format($price,0) }}đ</span></td>
            <td><img width="50px" src="/storage/app/files/product/{{ $picture }}"</td>                            
        </tr>
    @endforeach
    </tbody>
</table>
<script>
$(document).ready(function() {
    $('#example').DataTable( {
        "language": {
          "lengthMenu": "Hiển thị _MENU_ hàng",
          "zeroRecords": "Không có dữ liệu !",
          "search": 'Tìm kiếm',
          "info": "Trang _PAGE_ / _PAGES_",
          "infoEmpty": "Không có dữ liệu !",
          "infoFiltered": "",
          "processing": "Xin chờ...",
          "paginate": {
              "first":      "Đầu",
              "last":       "Cuối",
              "next":       ">",
              "previous":   "<"
          }
        }
    } );
    $("#selecctall").change(function(){
        $(".checkbox1").prop('checked', $(this).prop("checked"));
    });
} );
</script>