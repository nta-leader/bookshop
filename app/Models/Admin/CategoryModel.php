<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use DB;

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
        DB::table('category_product')->whereIn('id_category', $this->arrId)->delete();
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
    public function delProduct($arrId){
        return DB::table('category_product')->whereIn('id', $arrId)->delete();
    }
    public function getItemsProduct(){
        return DB::table("product")
        ->leftjoin('sale','product.id_sale','=','sale.id')
        ->select(
            'product.id', 
            'product.name', 
            'product.product_code', 
            'product.basis_price', 
            'product.picture',
            DB::raw(
                'product.basis_price*(100-sale.percent)/100 as price'
            ),
        )
        ->where('product.active',1)
        ->get();
    }
    public function add_product_category($id_category, $id_product){
        foreach ($id_product as $key => $id) {
            $check = DB::table('category_product')->where('id_category', $id_category)->where('id_product', $id)->count();
            if($check == 0){
               DB::table('category_product')->insert(['id_category'=>$id_category,'id_product'=>$id]); 
            }
        }
        return true;
    }
}
