<?php

namespace App\Models\Book;

use Illuminate\Database\Eloquent\Model;
use DB;

class ProductModel extends Model
{
    public function getItem($url){
        return DB::table('product')
        ->join('sale','product.id_sale','=','sale.id')
        ->select(
            'product.id',
            'product.name',
            'product.evaluate',
            'product.picture',
            'product.link_document',
            'product.preview',
            'product.content',
            'product.basis_price',
            DB::raw('product.basis_price * (100 - sale.percent)/100 as price')
        )
        ->where('product.url', $url)
        ->first();
    }
    public function getCategoryProduct($id_product){
        return DB::table('category_product')
        ->join('category','category.id','=','category_product.id_category')
        ->select('category.id','category.name','category.url')
        ->where('category_product.id_product', $id_product)
        ->distinct()
        ->get();
    }
    public function getCategory(){
        return DB::table('category')
        ->select('category.id','category.name','category.url')
        ->where('category.parent_id', 0)
        ->get();
    }
    public function getProducts($arrIdCategory){
        return DB::table('product')
        ->join('category_product as cp','product.id','cp.id_product')
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
        ->whereIn('cp.id_category', $arrIdCategory)
        ->distinct()
        ->limit(20)
        ->inRandomOrder()
        ->orderBy('product.id', 'DESC')
        ->get();
    }
}
