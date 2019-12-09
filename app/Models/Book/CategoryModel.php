<?php

namespace App\Models\Book;

use Illuminate\Database\Eloquent\Model;
use DB;

class CategoryModel extends Model
{
    private $arrId=[];
    private function getParent($data, $parent_id){
        $arrId = [];
        foreach ($data as $key => $item) {
            if($item->parent_id == $parent_id){
                $this->arrId[] = $item->id;
                $arrId[] = $item->id;
                unset($data[$key]);
            }
        }
        if(count($arrId) > 0){
            foreach ($arrId as $key => $id) {                
                $this->getParent($data, $id);                   
            }
        }
    }
    public function getIdCategory($url){
        $objItem = DB::table('category')->where('url', $url)->first();
        $categorys = DB::table('category')->get();
        $this->arrId = [0=>$objItem->id];
        $this->getParent($categorys,$objItem->id);
        $objItem->arrId = $this->arrId;
        return $objItem;
    }
    public function getProducts($arrIdCategory, $orderby){
        if($orderby == 'sp-m'){
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
            ->whereIn('cp.id_category',$arrIdCategory)
            ->distinct()
            ->orderBy('product.id', 'DESC')
            ->paginate(getenv('PAGINATE_BOOK'));
        }elseif($orderby == 'sp-c'){
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
            ->whereIn('cp.id_category',$arrIdCategory)
            ->distinct()
            ->orderBy('product.id', 'ASC')
            ->paginate(getenv('PAGINATE_BOOK'));
        }elseif($orderby == 'g-t'){
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
            ->whereIn('cp.id_category',$arrIdCategory)
            ->distinct()
            ->orderBy('price', 'ASC')
            ->paginate(getenv('PAGINATE_BOOK'));
        }elseif($orderby == 'g-c'){
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
            ->whereIn('cp.id_category',$arrIdCategory)
            ->distinct()
            ->orderBy('price', 'DESC')
            ->paginate(getenv('PAGINATE_BOOK'));
        }
        
    }
    public function getCategory(){
        return DB::table('category')
        ->select('category.id','category.name','category.url')
        ->where('category.parent_id', 0)
        ->get();
    }
}
