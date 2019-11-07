<?php
use Illuminate\Support\Facades\DB;

function indanhmuc($data, $parent_id = 0, $active_id = 0, $str = "--------|"){
    foreach ($data as $key => $item) {
        if($item->parent_id == $parent_id){
            if($item->id == $active_id){
                $active = "selected";
            }else{
                $active = "";
            }
            echo '<option '.$active.' value="'.$item->id.'" style="bor">'.$str.' '.$item->name.'</option>';
            unset($data[$key]);
            indanhmuc($data, $item->id, $active_id, $str."--------|");
        }
    }
}
function indanhmuc_category_admin_index($data, $parent_id = 0){
    echo '<ul>';
    foreach ($data as $key => $item) {
        if($item->parent_id == $parent_id){
            $urlEdit = route('admin.category.edit',['id'=>$item->id]);
            $urlDel = route('admin.category.del',['id'=>$item->id]);
            echo '<li class="li-cat">'.$item->name.' <a class="btna btn-warning">QL sản phẩm</a> | <a href="'.$urlEdit.'" class="btna btn-success">Sửa</a> | <a data-urlDel="'.$urlDel.'" class="del btna btn-danger">Xóa</a></li>';
            unset($data[$key]);
            indanhmuc_category_admin_index($data, $item->id);
        }
    }
    echo '</ul>';
}
function indanhmuc_menu_public($data, $parent_id = 0){
    echo '<ul class="sub-menu">';
    foreach ($data as $key => $item) {
        if($item->parent_id == $parent_id){
            $url = route('book.category.index',['url'=>$item->url]);
            $check = DB::table('category')->where('parent_id', $item->id)->count();
            if($check==0){
                $str = "";
            }else{
                $str = "menu-item-has-children";
            }
            echo '<li class="'.$str.'"><a href="'.$url.'">'.$item->name.'</a>';
            unset($data[$key]);
            indanhmuc_menu_public($data, $item->id);
            echo '</li>';
        }
    }
    echo '</ul>';
}