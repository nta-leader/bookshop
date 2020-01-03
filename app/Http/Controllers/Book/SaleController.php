<?php

namespace App\Http\Controllers\Book;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book\SaleModel;
use App\Models\Book\CategoryModel;

class SaleController extends Controller
{
    public function index(SaleModel $sale){
        $objItems = $sale->getItems();
        return view('book.sale.index',compact('objItems'));
    }
    public function detail($url, SaleModel $sale, CategoryModel $category, Request $request){
        if($request->has('orderby')){
            $orderby = $request->get('orderby');
            $request->session()->put('orderby', $orderby);
        }elseif($request->session()->has('orderby')){
            $orderby = $request->session()->get('orderby');
        }else{
            $orderby = 'sp-m';
        }

        $objItem = $sale->getItem($url);
        $objItems = $sale->getProducts($url, $orderby);
        $category = $category->getCategory();
        return view('book.sale.detail',compact('objItems','objItem','category'));
    }
}
