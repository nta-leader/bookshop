<?php

namespace App\Http\Controllers\Book;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book\HomeModel;

class HomeController extends Controller
{
    public function index(HomeModel $home){
        $slides = $home->getSlides();
        $sale = $home->getSale();
        $categorys = $home->getCategory();
        $news = $home->getNews();
        return view('book.home.index',compact('slides','sale','categorys','news'));
    }
}
