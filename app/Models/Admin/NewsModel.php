<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Storage;

class NewsModel extends Model
{
    protected $table = 'news';
    protected $primaryKey = 'id';
    public $timestamps = false;

    public function add($arrItem){
        return $this->insert($arrItem);
    }
    public function edit($id, $arrItem){
        return $this->where('id', $id)->update($arrItem);
    }
    public function getItem($id){
        return $this->findOrFail($id);
    }
    public function del($arrId){
        $objItems = $this->select('id','picture')->whereIn('id', $arrId)->get();
        foreach ($objItems as $key => $value) {
            if(Storage::exists('files/news/'.$value->picture)){
                Storage::delete('files/news/'.$value->picture);
            }
        }
        return $this->whereIn('id', $arrId)->delete();
    }
}
