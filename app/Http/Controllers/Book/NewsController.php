<?php

namespace App\Http\Controllers\Book;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book\NewsModel;
use App\Models\Book\CategoryModel;

class NewsController extends Controller
{
    public function index(NewsModel $news, CategoryModel $category){
        $objItems = $news->getItems();
        $category = $category->getCategory();
        return view('book.news.index',compact('objItems','category'));
    }
    public function detail($url, NewsModel $news, CategoryModel $category){
        $objItem = $news->getItem($url);
        $category = $category->getCategory();
        return view('book.news.detail',compact('objItem','category'));
    }
}
