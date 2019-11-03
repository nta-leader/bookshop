@if(!$active == 1)
    <a href="javascript:void(0)" onclick="active(1,{{ $id }})" class="btn btn-success">Hiện</a>
@else
    <a href="javascript:void(0)" onclick="active(0,{{ $id }})" class="btn btn-danger">Ẩn</a>
@endif