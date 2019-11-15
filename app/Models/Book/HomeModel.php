<?php

namespace App\Models\Book;

use Illuminate\Database\Eloquent\Model;
use DB;

class HomeModel extends Model
{
    protected $arrId=[];

    public function getSlides(){
        return DB::table('sale')->where('id','!=',0)->get();
    }
    public function getSale(){
        return DB::table('product')
        ->join('sale','product.id_sale','=','sale.id')
        ->select(
            'product.id',
            'product.name',
            'product.url',
            'product.evaluate',
            'product.picture',
            'product.basis_price',
            DB::raw('product.basis_price*(100-sale.percent)/100 as price')
        )
        ->where('product.active', 1)
        ->limit(20)
        ->inRandomOrder()
        ->get();
    }
    public function getCategory(){
        $category = DB::table('category')->where('parent_id', 0)->get();
        $categoryAll = DB::table('category')->get();
        foreach ($category as $key => $item) {
            
        }
    }
    public function getParent($data, $parent_id){
        foreach ($data as $key => $item) {
            if($item->parent_id == $parent_id){
                $this->arrId[] = $item->id;
                unset($data[$key]);
            }
        }
    }
}
