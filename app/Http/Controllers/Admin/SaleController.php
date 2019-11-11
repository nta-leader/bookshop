<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\Sale\AddRequest;
use App\Http\Requests\Admin\Sale\EditRequest;
use App\Models\Admin\SaleModel;
use DB;
use Storage;

class SaleController extends Controller
{
    public function index(SaleModel $sale){
        $objItems = $sale->getItems();
        return view('admin.sale.index',compact('objItems'));
    }
    public function add(){
        return view('admin.sale.add');
    }
    public function postAdd(AddRequest $request, SaleModel $sale){
        $picture = $request->file('picture')->store('files/sale');
        $arrP = explode('/',$picture);
        $picture = end($arrP);

        $arrItem = [
            'name'=>$request->name,
            'url'=>str_slug($request->name),
            'picture'=>$picture,
            'percent'=>$request->percent,
        ];
        if($sale->add($arrItem)){
            return redirect()->route('admin.sale.index')->with(['msg'=>'Thêm thành công !']);
        }else{
            return redirect()->back()->with(['msg'=>'Có lỗi xảy ra !']);
        }
    }
    public function edit($id, SaleModel $sale){
        $objItem = $sale->getItem($id);
        if($id == 0){
            return redirect()->route('admin.sale.index')->with(['msg'=>'Không sửa sale mặc định !']);
        }
        return view('admin.sale.edit',compact('id','objItem'));
    }
    public function postEdit($id, SaleModel $sale, EditRequest $request){
        if($request->has('picture_new')){
            $this->validate($request,[
                'picture_new'=>'image'
            ],[
                'picture_new.img'=>'Chọn đúng định dạng hình ảnh !'
            ]);
            $picture = $request->file('picture_new')->store('files/sale');
            $arrP = explode('/',$picture);
            $picture = end($arrP);
            if(Storage::exists('files/sale/'.$request->picture)){
                Storage::delete('files/sale/'.$request->picture);
            }
        }else{
            $picture = $request->picture;
        }

        $arrItem = [
            'name'=>$request->name,
            'url'=>str_slug($request->name),
            'picture'=>$picture,
            'percent'=>$request->percent,
        ];
        if($id == 0){
            return redirect()->route('admin.sale.index')->with(['msg'=>'Không sửa sale mặc định !']);
        }elseif($sale->edit($id, $arrItem)){
            return redirect()->route('admin.sale.index')->with(['msg'=>'Sửa thành công !']);
        }else{
            return redirect()->route('admin.sale.index');
        }
    }
    public function del($id, SaleModel $sale){
        if($id == 0){
            return redirect()->route('admin.sale.index')->with(['msg'=>'Không xóa sale mặc định !']);
        }elseif($sale->del($id)){
            return redirect()->route('admin.sale.index')->with(['msg'=>'Xóa thành công !']);
        }else{
            return redirect()->route('admin.sale.index');
        }
    }

    public function indexProduct($id_sale, SaleModel $sale){
        $objItem = $sale->getItem($id_sale);
        return view('admin.sale.product.index',compact('objItem'));
    }
    public function viewProduct($id_sale, Request $req){
        //ten o day phai trung voi cac ten o database
        $columns = [
            0 => "id",
            1 => "name",
            2 => "product_code",
            3 => "basis_price",
            4 => "price",
            5 => "picture",
            6 => "action"
        ];

        $totalData = DB::table("product")->where('id_sale', $id_sale)->where('active',1)->count();
        $limit = $req->input('length');
        $start = $req->input('start');
        $order = $columns[$req->input("order.0.column")];
        $dir   = $req->input("order.0.dir");

        if( empty( $req->input('search.value') ) ){
            $posts = DB::table("product")
            ->leftjoin('sale','product.id_sale','=','sale.id')
            ->select(
                'product.id', 
                'product.name', 
                'product.product_code', 
                'product.basis_price', 
                'product.picture',
                DB::raw('product.basis_price*(100 - sale.percent)/100 as price'),
            )
            ->where('product.id_sale',$id_sale)
            ->where('active',1)
            ->offset($start)
            ->limit($limit)
            ->orderBy($order,$dir)
            ->get();

            $totalFiltered = $totalData;
        }else{
            $posts = DB::table("product")
            ->leftjoin('sale','product.id_sale','=','sale.id')
            ->select(
                'product.id', 
                'product.name', 
                'product.product_code', 
                'product.basis_price', 
                'product.picture',
                DB::raw('product.basis_price*(100 - sale.percent)/100 as price'),
            )
            ->where([
                ["product.product_code","like","%{$req->input('search.value')}%"],
                ['product.id_sale',$id_sale],
                ['product.active',1]
            ])
            ->orWhere([
                ["product.name","like","%{$req->input('search.value')}%"],
                ['product.id_sale',$id_sale],
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
                $nestedData['basis_price'] = number_format($objItem->basis_price,0,'.',',').' đ';
                $nestedData['price'] = '<span style="color:red;">'.number_format($objItem->price,0,'.',',').' đ</span>';
                $nestedData['picture'] = "<img style='width:70px;' src='/storage/app/files/product/{$objItem->picture}'>";
                $nestedData['action'] = '<a onclick="del('.$objItem->id.')" class="del btn btn-danger">Bỏ sale</a>';
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
    public function addSaleProduct($id_sale){
        return view('admin.sale.product.add',compact('id_sale'));
    }
    public function list(Request $request,SaleModel $sale){
        $type=$request->type;
        $objItem = $sale->getItem($request->id_sale);
        $objItems = $sale->getListProduct($type, $objItem->percent);
        return view('admin.sale.product.list',compact('objItems','objItem'));
    }
    public function addPostSaleProduct($id_sale,SaleModel $sale,Request $request){
        $this->validate($request,[
            'choose'=>'required'
        ],[
            'choose.required'=>'Chưa chọn sản phẩm sale !'
        ]);
        if($sale->addSaleProduct($request->choose,$id_sale)){
            return redirect()->route('admin.sale.product.index',['id_sale'=>$id_sale])->with(['msg'=>'Thêm thành công !']);
        }else{
            return redirect()->route('admin.sale.product.index',['id_sale'=>$id_sale])->with(['msg'=>'Có lỗi xảy ra !']);
        }
    }
    public function delSaleProduct(Request $request, SaleModel $sale){
        $id_product = $request->id_product;
        if($sale->delSaleProduct($id_product)){
            return redirect()->back()->with(['msg'=>'Xóa thành công !']);
        }else{
            return redirect()->back()->with(['msg'=>'Có lỗi xảy ra !']);
        }
    }
}
