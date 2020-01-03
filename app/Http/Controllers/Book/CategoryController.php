<?php

namespace App\Http\Controllers\Book;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book\CategoryModel;

class CategoryController extends Controller
{
    public function index($url ,CategoryModel $category, Request $request){
        if($request->has('orderby')){
            $orderby = $request->get('orderby');
            $request->session()->put('orderby', $orderby);
        }elseif($request->session()->has('orderby')){
            $orderby = $request->session()->get('orderby');
        }else{
            $orderby = 'sp-m';
        }
        $objItem = $category->getIdCategory($url);
        $objItem->products = $category->getProducts($objItem->arrId, $orderby);
        $category = $category->getCategory();
        return view('book.category.index',compact('objItem','category'));
    }
    public function search(CategoryModel $category, Request $request){
        $key = $request->search;
        
        if($key != null){
            $request->session()->put('search', $key);
        }else{
            $key = $request->session()->get('search');
        }
        $request->session()->put('search',$key);
        if($request->has('orderby')){
            $orderby = $request->get('orderby');
            $request->session()->put('orderby', $orderby);
        }elseif($request->session()->has('orderby')){
            $orderby = $request->session()->get('orderby');
        }else{
            $orderby = 'sp-m';
        }
        $objItem = json_decode('{"name":"Tìm kiếm:'.$key.'"}');
        $objItem->products = $category->getSearch($key, $orderby);
        $category = $category->getCategory();
        return view('book.category.index',compact('objItem','category'));
    }
}
