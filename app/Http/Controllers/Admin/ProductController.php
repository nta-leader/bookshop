<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\Product\AddRequest;
use App\Http\Requests\Admin\Product\EditRequest;
use App\Models\Admin\ProductModel;
use DB;
use Storage;

class ProductController extends Controller
{
    public function index(){
        return view('admin.product.index');
    }
    public function view(Request $req){
    	$columns = [
    		0 => "id",
    		1 => "name",
            2 => "product_code",			
            3 => "price",
            4 => "link_document",
            5 => "picture",
            6 => "active",
            7 => "action"
    	];
		
		$totalData = DB::table("product")->count();
    	$limit = $req->input('length');
    	$start = $req->input('start');
    	$order = $columns[$req->input("order.0.column")];
    	$dir   = $req->input("order.0.dir");

    	if( empty( $req->input('search.value') ) ){
            $posts = DB::table("product")
            ->join('sale','product.id_sale','=','sale.id')
            ->select(
                'product.id', 
                'product.name', 
                'product.product_code', 
                'product.link_document',
                'product.basis_price', 
                DB::raw('product.basis_price*((100-sale.percent)/100) as price'),
                'product.picture',
                'product.active'
            )
            ->offset($start)
            ->limit($limit)
            ->orderBy($order,$dir)
            ->get();

            $totalFiltered = $totalData;
    	}else{
            $posts = DB::table("product")
            ->join('sale','product.id_sale','=','sale.id')
            ->select(
                'product.id', 
                'product.name', 
                'product.product_code', 
                'product.link_document',
                'product.basis_price', 
                DB::raw('product.basis_price*((100-sale.percent)/100) as price'),
                'product.picture',
                'product.active'
            )
            ->where([
                ["product.product_code","like","%{$req->input('search.value')}%"]
            ])
            ->orWhere([
                ["product.name","like","%{$req->input('search.value')}%"]
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
                if($objItem->basis_price == $objItem->price){
                    $nestedData['price'] = 'Giá bán: <span style="color:red;">'.number_format($objItem->price,0,'.',',').' đ</span>';
                }else{
                    $nestedData['price'] = 'Giá bán: <span style="color:red;">'.number_format($objItem->price,0,'.',',').' đ</span> <br>Giá gốc: '.number_format($objItem->basis_price,0,'.',',');
                }
                
                $nestedData['link_document'] = '<a target="_blank" href="'.$objItem->link_document.'">Xem</a>';
				$urlPicture = "#";
				$nestedData['picture'] = "<img style='width:100px;' src='/storage/app/files/product/{$objItem->picture}'>";
				if($objItem->active==1){
					$nestedData['active'] = '<span id="active'. $objItem->id .'"><a onclick="active(1,'. $objItem->id .')" class="btn btn-success">Hiện</a></span>';
				}else{
					$nestedData['active'] = '<span id="active'. $objItem->id .'"><a onclick="active(0,'. $objItem->id .')" class="btn btn-danger">Ẩn</a></span>';
				}
				$urlEdit=route('admin.product.edit',['id'=>$objItem->id]);
                $nestedData['action'] = '<a href="'. $urlEdit .'" class="btn btn-success">Sửa</a> | <a onclick="del('.$objItem->id.')" class="del btn btn-danger">Xóa</a>';
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
    public function add(){
        return view('admin.product.add');
    }
    public function postAdd(ProductModel $product, AddRequest $request){
        $picture = $request->file('picture')->store('files/product');
		$arrP = explode('/', $picture);
		$picture = end($arrP);
		$arrItem = [
            'id_sale'=>0,
			'name'=>$request->name,
			'url'=>str_slug($request->name),
			'product_code'=>$request->product_code,
			'link_document'=>$request->link_document,
			'picture'=>$picture,
			'preview'=>$request->preview,
			'content'=>$request->content,
			'evaluate'=>$request->evaluate,
			'basis_price'=>$request->basis_price,
			'active'=>$request->active
		];
		if($product->add($arrItem)){
			return redirect()->route('admin.product.index')->with(['msg'=>'Thêm thành công !']);
		}else{
			return redirect()->back()->with(['msg'=>'Có lỗi xảy ra !']);
		}
    }
    public function edit($id, ProductModel $product){
        $objItem = $product->getItem($id);
        return view('admin.product.edit',compact('objItem'));
    }
    public function postEdit($id, ProductModel $product, EditRequest $request){
        if($request->has('picture_new')){
			$this->validate($request,
				[
					"picture_new"=>"image"
				],
				[
					"picture_new.image"=>"Vui lòng chọn đúng file hình ảnh !",    
				]
			);
			$picture = $request->file('picture_new')->store('files/product');
			$arrP = explode('/', $picture);
			$picture = end($arrP);
			if(Storage::exists('files/product/'.$request->picture)){
                Storage::delete('files/product/'.$request->picture);
            }
		}else{
			$picture = $request->picture;
		}
		$arrItem = [
            'id_sale'=>0,
			'name'=>$request->name,
			'url'=>str_slug($request->name),
			'product_code'=>$request->product_code,
			'link_document'=>$request->link_document,
			'picture'=>$picture,
			'content'=>$request->priview,
			'content'=>$request->content,
			'evaluate'=>$request->evaluate,
			'basis_price'=>$request->basis_price,
			'active'=>$request->active
		];
		if($product->edit($id, $arrItem)){
			return redirect()->route('admin.product.index')->with(['msg'=>'Sửa thành công !']);
		}else{
			return redirect()->route('admin.product.index');
		}
    }
    public function del(ProductModel $product, Request $request){
        if($request->id==null){
            return redirect()->back();
        }elseif($product->del($request->id)){
			return redirect()->back()->with(['msg'=>'Xóa thành công !']);
        }else{
			return redirect()->back()->with(['msg'=>'Có lỗi xảy ra !']);
		}
    }
    public function active(ProductModel $product, Request $request){
		$active = $request->active;
		$id = $request->id;
		if($active==1){
			$arrItem = [
				'active'=>0
			];
		}else{
			$arrItem = [
				'active'=>1
			];
		}
		$product->edit($id, $arrItem);
		return view('admin.product.active',compact('id','active'));
	}
}
