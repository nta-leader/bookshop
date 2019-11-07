<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\CategoryModel;
use App\Http\Requests\Admin\Category\AddRequest;
use App\Http\Requests\Admin\Category\EditRequest;

class CategoryController extends Controller
{
    public function index(CategoryModel $category){
        $objItems = $category->getItems();
        return view('admin.category.index',compact('objItems'));
    }
    public function add(CategoryModel $category){
        $data = $category->getItems();
        return view('admin.category.add',compact('data'));
    }
    public function postAdd(CategoryModel $category, AddRequest $request){
        $arrItem = [
            'name'      => $request->name,
            'url'       => str_slug($request->url),
            'parent_id' => $request->parent_id
        ];
        if($category->add($arrItem)){
            return redirect()->route('admin.category.index')->with(['msg'=>'Thêm thành công !']);
        }else{
            return redirect()->back()->with(['msg'=>'Có lỗi xảy ra !']);
        }
    }
    public function edit($id, CategoryModel $category){
        $data = $category->getItems();
        $objItem= $category->getItem($id);
        return view('admin.category.edit',compact('data', 'objItem'));
    }
    public function postEdit($id, CategoryModel $category, EditRequest $request){
        $arrItem = [
            'name'      => $request->name,
            'url'       => str_slug($request->url),
            'parent_id' => $request->parent_id
        ];
        if($category->edit($id, $arrItem)){
            return redirect()->route('admin.category.index')->with(['msg'=>'Sửa thành công !']);
        }else{
            return redirect()->route('admin.category.index');
        }
    }
    public function del($id, CategoryModel $category){
        if($category->del($id)){
            return redirect()->back()->with(['msg'=>'Xóa thành công !']);
        }else{
            return redirect()->back()->with(['msg'=>'Có lỗi xảy ra !']);
        }
    }
}
