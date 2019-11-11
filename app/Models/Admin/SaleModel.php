<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use DB;

class SaleModel extends Model
{
    protected $table = "sale";
    protected $primaryKey = "id";
    public $timestamps = false;

    public function getItems(){
        $objItems = $this->orderBy('id','DESC')->get();
        foreach ($objItems as $key => $value) {
            $objItems[$key]->count_product=DB::table('product')->where('id_sale',$value->id)->count();
        }
        return $objItems;
    }
    public function getItem($id){
        return $this->findOrFail($id);
    }
    public function add($arrItem){
        return $this->insert($arrItem);
    }
    public function edit($id, $arrItem){
        return  $this->where('id',$id)->update($arrItem);
    }
    public function getListProduct($type, $persent){
        if($type==0){
            return DB::table("product")
            ->leftjoin('sale','product.id_sale','=','sale.id')
            ->select(
                'product.id', 
                'product.name', 
                'product.product_code', 
                'product.basis_price', 
                'product.picture',
                DB::raw(
                    'product.basis_price*(100-'.$persent.')/100 as price'
                ),
            )
            ->where('product.id_sale',0)
            ->where('product.active',1)
            ->get();
        }else{
            return DB::table("product")
            ->leftjoin('sale','product.id_sale','=','sale.id')
            ->select(
                'product.id', 
                'product.name', 
                'product.product_code', 
                'product.basis_price', 
                'product.picture',
                DB::raw(
                    'product.basis_price*(100-'.$persent.')/100 as price'
                ),
            )
            ->where('product.active',1)
            ->get();
        }
    }
    public function addSaleProduct($arrItem,$id_sale){
        return DB::table('product')
        ->whereIn('id',$arrItem)
        ->update(['id_sale'=>$id_sale]);
    }
    public function del($id){
        $objItem = $this->getItem($id);
        if(Storage::exists('files/sale/'.$objItem->picture)){
            Storage::delete('files/sale/'.$objItem->picture);
        }
        DB::table('product')->where('id_sale',$id)->update(['id_sale'=>0]);
        return $this->where('id',$id)->delete();
    }
    public function delSaleProduct($id_product){
        return DB::table('product')->whereIn('id',$id_product)->update(['id_sale'=>0]);
    }
}
