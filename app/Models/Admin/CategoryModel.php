<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class CategoryModel extends Model
{
    protected $table = 'category';
    protected $primaryKey = 'id';
    public $timestamps = false;

    public function getItems(){
        return $this->get();
    }
    public function getItem($id){
        return $this->where('id', $id)->first();
    }
    public function add($arrItem){
        return $this->insert($arrItem);
    }
    public function edit($id, $arrItem){
        return $this->where('id', $id)->update($arrItem);
    }
    public function del($id){
        $this->findParent($id, $this->getItems());
        $this->arrId[] = $id;
        return $this->whereIn('id', $this->arrId)->delete();
    }
    private $arrId = [];
    public function findParent($id, $data, $arrItems = []){
        foreach ($data as $key => $item) {
            if($item->parent_id == $id){
                $arrItems[] = $item;
                $this->arrId[] = $item->id;
                unset($data[$key]);
            }
        }
        foreach ($arrItems as $key => $item) {
            $this->findParent($item->id,$data);
        }
    }
}
