<?php

namespace App\Http\Controllers\Book;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book\AboutModel;

class AboutController extends Controller
{
    public function index(AboutModel $about){
        $objItem = $about->getItem();
        return view('book.about.index',compact('objItem'));
    }
}
