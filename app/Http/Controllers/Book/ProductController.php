<?php

namespace App\Http\Controllers\Book;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book\ProductModel;

class ProductController extends Controller
{
    public function index($url, ProductModel $product){
        $objItem = $product->getItem($url);
        $objItem->category = $product->getCategoryProduct($objItem->id);
        $arrIdCategory = [];
        foreach($objItem->category as $key => $item){
            $arrIdCategory[] = $item->id;
        }
        $products = $product->getProducts($arrIdCategory);
        $category = $product ->getCategory();
        return view('book.product.index',compact('objItem','products','category'));
    }
}
