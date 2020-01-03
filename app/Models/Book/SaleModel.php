<?php

namespace App\Models\Book;

use Illuminate\Database\Eloquent\Model;
use DB;
class SaleModel extends Model
{
    protected $table = 'sale';
    protected $primaryKey = 'id';
    public $timestamps = false;

    public function getItems(){
        return $this->where('id','!=',0)->orderBy('id','DESC')->paginate(getenv('PAGINATE_BOOK'));
    }
    public function getItem($url){
        return $this->where('url',$url)->first();
    }
    public function getProducts($url, $orderby){
        $sale = $this->getItem($url);
        if(isset($sale->id)){
            if($orderby == 'sp-m'){
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
                ->where('product.id_sale', $sale->id)
                ->distinct()
                ->orderBy('product.id', 'DESC')
                ->paginate(getenv('PAGINATE_BOOK'));
            }elseif($orderby == 'sp-c'){
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
                ->where('product.id_sale', $sale->id)
                ->distinct()
                ->orderBy('product.id', 'ASC')
                ->paginate(getenv('PAGINATE_BOOK'));
            }elseif($orderby == 'g-t'){
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
                ->where('product.id_sale', $sale->id)
                ->distinct()
                ->orderBy('price', 'ASC')
                ->paginate(getenv('PAGINATE_BOOK'));
            }elseif($orderby == 'g-c'){
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
                ->where('product.id_sale', $sale->id)
                ->distinct()
                ->orderBy('price', 'DESC')
                ->paginate(getenv('PAGINATE_BOOK'));
            }
        }else{
            return [];
        }
    }
}
