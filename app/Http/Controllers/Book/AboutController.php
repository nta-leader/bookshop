<?php

namespace App\Http\Controllers\Book;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book\AboutModel;

class AboutController extends Controller
{
    public function index(AboutModel $about){
        $objItem = $about->getAboutUs();
        $objItem->name = "Giới thiệu";
        return view('book.about.index',compact('objItem'));
    }
    public function shopping_guide(AboutModel $about){
        $objItem = $about->getShoppingGuide();
        $objItem->name = "Hướng dẫn mua hàng";
        return view('book.about.index',compact('objItem'));
    }
    public function guarantee(AboutModel $about){
        $objItem = $about->getGuarantee();
        $objItem->name = "Chính sách bảo hành";
        return view('book.about.index',compact('objItem'));
    }
}
