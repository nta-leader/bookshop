<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\CategoryModel;
use App\Http\Requests\Admin\Category\AddRequest;
use App\Http\Requests\Admin\Category\EditRequest;
use DB;

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
    public function indexProduct($id_category, CategoryModel $category){
        $objItem = $category->getItem($id_category);
        return view('admin.category.product.index',compact('objItem'));
    }
    public function viewProduct($id_category, Request $req){
        //ten o day phai trung voi cac ten o database
        $columns = [
            0 => "id",
            1 => "name",
            2 => "product_code",
            3 => "price",
            4 => "picture",
            5 => "action"
        ];

        $totalData = DB::table("product")
                    ->leftjoin('category_product as cp','product.id','cp.id_product')
                    ->leftjoin('category','category.id','cp.id_category')
                    ->where('category.id', $id_category)
                    ->where('product.active',1)
                    ->count();
        $limit = $req->input('length');
        $start = $req->input('start');
        $order = $columns[$req->input("order.0.column")];
        $dir   = $req->input("order.0.dir");

        if( empty( $req->input('search.value') ) ){
            $posts = DB::table("product")
            ->leftjoin('category_product as cp','product.id','cp.id_product')
            ->leftjoin('category','category.id','cp.id_category')
            ->leftjoin('sale','product.id_sale','=','sale.id')
            ->select(
                'cp.id', 
                'product.name', 
                'product.product_code', 
                'product.basis_price', 
                'product.picture',
                DB::raw('product.basis_price*(100 - sale.percent)/100 as price'),
            )
            ->where('category.id',$id_category)
            ->where('product.active',1)
            ->offset($start)
            ->limit($limit)
            ->orderBy($order,$dir)
            ->get();

            $totalFiltered = $totalData;
        }else{
            $posts = DB::table("product")
            ->leftjoin('category_product as cp','product.id','cp.id_product')
            ->leftjoin('category','category.id','cp.id_category')
            ->leftjoin('sale','product.id_sale','=','sale.id')
            ->select(
                'cp.id', 
                'product.name', 
                'product.product_code', 
                'product.basis_price', 
                'product.picture',
                DB::raw('product.basis_price*(100 - sale.percent)/100 as price'),
            )
            ->where([
                ["product.product_code","like","%{$req->input('search.value')}%"],
                ['category.id',$id_category],
                ['product.active',1]
            ])
            ->orWhere([
                ["product.name","like","%{$req->input('search.value')}%"],
                ['category.id',$id_category],
                ['product.active',1]
            ])
            ->offset($start)
            ->limit($limit)
            ->orderBy($order,$dir)
            ->get();

            $totalFiltered = count($posts);
        }
    
        $data = array();
        if($posts){
            foreach ($posts as $stt => $objItem) {
                //ten o day phai trung vs ten o table "<th>"
                $nestedData['id'] ='<input class="id" type="checkbox" name="id[]" value="'.$objItem->id.'"> '.$objItem->id;
                $nestedData['name'] = $objItem->name;
                $nestedData['product_code'] = $objItem->product_code;
                $nestedData['price'] = '<span style="color:red;">'.number_format($objItem->price,0,'.',',').' đ</span>';
                $nestedData['picture'] = "<img style='width:70px;' src='/storage/app/files/product/{$objItem->picture}'>";
                $nestedData['action'] = '<a onclick="del('.$objItem->id.')" class="del btn btn-danger">Xóa</a>';
                $data[] = $nestedData;
            }
        }
        $json_data = [
            "draw"=>intval($req->input('draw')),
            "recordsTotal"=>intval($totalData),
            "recordsFiltered"=>intval($totalFiltered),
            "data"=>$data
        ];
        echo json_encode($json_data);
    }
    public function addProduct($id_category ,CategoryModel $category){
        $objItems = $category->getItemsProduct();
        return view('admin.category.product.add',compact('id_category','objItems'));
    }
    public function postAddProduct($id_category ,CategoryModel $category, Request $request){
        $id_product = $request->id_product;
        if($category->add_product_category($id_category, $id_product)){
            return redirect()->route('admin.category.product.index',['id_category'=>$id_category])->with(['msg'=>'Thêm thành công !']);
        }else{
            return redirect()->back()->with(['msg'=>'Có lỗi xảy ra !']);
        }
    }
    public function delProduct(Request $request, CategoryModel $category){
        $id_category_product = $request->id;
        if($category->delProduct($id_category_product)){
            return redirect()->back()->with(['msg'=>'Xóa thành công !']);
        }else{
            return redirect()->back()->with(['msg'=>'Có lỗi xảy ra !']);
        }
    }
}
