@if($active == 0)
    <a href="javascript:void(0)" onclick="active_color(1,{{ $id_color }})" class="btn btn-success">Còn hàng</a>
@else
    <a href="javascript:void(0)" onclick="active_color(0,{{ $id_color }})" class="btn btn-danger">Hết hàng</a>
@endif