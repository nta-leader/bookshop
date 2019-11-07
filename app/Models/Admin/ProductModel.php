<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Storage;

class ProductModel extends Model
{
    protected $table = 'product';
    protected $primaryKey = 'id';
    public $timestamps = false;

    public function add($arrItem){
        return $this->insert($arrItem);
    }
    public function getItem($id){
        return $this->where('id', $id)->first();
    }
    public function edit($id, $arrItem){
        return $this->where('id', $id)->update($arrItem);
    }
    public function del($arrId){
        $objItems = $this->select('id','picture')->whereIn('id', $arrId)->get();
        foreach ($objItems as $key => $value) {
            if(Storage::exists('files/product/'.$value->picture)){
                Storage::delete('files/product/'.$value->picture);
            }
        }
        return $this->whereIn('id', $arrId)->delete();
    }
}
