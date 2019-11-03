<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\CategoryModel;

class CategoryController extends Controller
{
    public function index(){
        return view('admin.category.index');
    }
    public function add(CategoryModel $category){
        $data = $category->getItems();
        return view('admin.category.add',compact('data'));
    }
}
