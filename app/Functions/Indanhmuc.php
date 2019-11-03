<?php
function indanhmuc($data, $parent_id = 0, $active = 0, $str = "--------|"){
    foreach ($data as $key => $item) {
        if($item->parent_id == $parent_id){
            echo '<option value="'.$item->id.'" style="bor">'.$str.' '.$item->name.'</option>';
            unset($data[$key]);
            indanhmuc($data, $item->id, $active, $str."--------|");
        }
    }
}