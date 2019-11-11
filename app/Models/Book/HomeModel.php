<?php

namespace App\Models\Book;

use Illuminate\Database\Eloquent\Model;
use DB;

class HomeModel extends Model
{
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
        ->get();
    }
}
