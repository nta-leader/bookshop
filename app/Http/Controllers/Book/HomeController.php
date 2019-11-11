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
        return view('book.home.index',compact('slides','sale'));
    }
}
