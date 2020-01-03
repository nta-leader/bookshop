<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\Admin\OrderFormModel;

class OrderformController extends Controller
{
    public function index(){
        return view('admin.orderform.index');
    }
    public function api_index(Request $req){
        $columns = [
            0 => "id",
            1 => "date",
            2 => "name",
            3 => "phone",
            4 => "address",
            5 => "active",
            6 => "action",
        ];

        $totalData = DB::table("order_form")->where('active', 0)->count();
        $limit = $req->input('length');
        $start = $req->input('start');
        $order = $columns[$req->input("order.0.column")];
        $dir   = $req->input("order.0.dir");

        if( empty( $req->input('search.value') ) ){
            $posts = DB::table("order_form")
            ->where([
                ['active',0],
                ['phone','like','%'.$req->input('search.value').'%']
            ])
            ->offset($start)
            ->limit($limit)
            ->orderBy($order,$dir)
            ->get();

            $totalFiltered = $totalData;
        }else{
            $posts = DB::table("order_form")
            ->Where(function ($query) use ($req) {
                $arrDate = explode('-',$req->input('search.value'));
                if(count($arrDate)==3){
                    $query->where('active',0)->whereYear('date', '=', $arrDate[2])
                      ->whereDay('date', '=', $arrDate[0])
                      ->whereMonth('date', '=', $arrDate[1]);
                }  
            })
            ->orWhere([
                ['active',0],
                ['phone','like','%'.$req->input('search.value').'%']
            ])
            ->orWhere([
                ['active',0],
                ['name','like','%'.$req->input('search.value').'%']
            ])
            ->orWhere([
                ['active',0],
                ['address','like','%'.$req->input('search.value').'%']
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
                $nestedData['id'] = $objItem->id;

                $date = date('H:i:s | d-m-Y',  strtotime($objItem->date));
                $nestedData['date'] = $date;
                $nestedData['name'] = $objItem->name;
                $nestedData['phone'] = $objItem->phone;
                $nestedData['address'] = $objItem->address;
                $nestedData['active'] = '<a class="btn btn-warning">chờ xác nhận</a>';
                
                $nestedData['action'] = '<a class="btn btn-success" onclick="detail('.$objItem->id.')" data-toggle="modal" data-target="#modal-default">Chi tiết đơn hàng</a>';
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
    public function confirmed(){
        return view('admin.orderform.confirmed');
    }
    public function api_confirmed(Request $req){
        $columns = [
            0 => "id",
            1 => "date",
            2 => "name",
            3 => "phone",
            4 => "address",
            5 => "active",
            6 => "action",
        ];

        $totalData = DB::table("order_form")->where('active', 1)->count();
        $limit = $req->input('length');
        $start = $req->input('start');
        $order = $columns[$req->input("order.0.column")];
        $dir   = $req->input("order.0.dir");

        if( empty( $req->input('search.value') ) ){
            $posts = DB::table("order_form")
            ->where([
                ['active',1],
                ['phone','like','%'.$req->input('search.value').'%']
            ])
            ->offset($start)
            ->limit($limit)
            ->orderBy($order,$dir)
            ->get();

            $totalFiltered = $totalData;
        }else{
            $posts = DB::table("order_form")
            ->Where(function ($query) use ($req) {
                $arrDate = explode('-',$req->input('search.value'));
                if(count($arrDate)==3){
                    $query->where('active',1)
                    ->whereYear('date', '=', $arrDate[2])
                      ->whereDay('date', '=', $arrDate[0])
                      ->whereMonth('date', '=', $arrDate[1]);
                }  
            })
            ->orWhere([
                ['active',1],
                ['phone','like','%'.$req->input('search.value').'%']
            ])
            ->orWhere([
                ['active',1],
                ['name','like','%'.$req->input('search.value').'%']
            ])
            ->orWhere([
                ['active',1],
                ['address','like','%'.$req->input('search.value').'%']
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
                $nestedData['id'] =$objItem->id;

                $date = date('H:i:s | d-m-Y',  strtotime($objItem->date));
                $nestedData['date'] = $date;
                $nestedData['name'] = $objItem->name;
                $nestedData['phone'] = $objItem->phone;
                $nestedData['address'] = $objItem->address;
                $nestedData['active'] = '<a class="btn btn-primary">Đã xác nhận</a>';
                
                $nestedData['action'] = '<a class="btn btn-success" onclick="detail('.$objItem->id.')" data-toggle="modal" data-target="#modal-default">Chi tiết đơn hàng</a>';
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
    public function success(){
        return view('admin.orderform.success');
    }
    public function api_success(Request $req){
        $columns = [
            0 => "id",
            1 => "date",
            2 => "name",
            3 => "phone",
            4 => "address",
            5 => "active",
            6 => "waybill_code",
            7 => "action"
        ];

        $totalData = DB::table("order_form")->where('active', 2)->count();
        $limit = $req->input('length');
        $start = $req->input('start');
        $order = $columns[$req->input("order.0.column")];
        $dir   = $req->input("order.0.dir");

        if( empty( $req->input('search.value') ) ){
            $posts = DB::table("order_form")
            ->where([
                ['active',2],
                ['phone','like','%'.$req->input('search.value').'%']
            ])
            ->offset($start)
            ->limit($limit)
            ->orderBy($order,$dir)
            ->get();

            $totalFiltered = $totalData;
        }else{
            $posts = DB::table("order_form")
            ->Where(function ($query) use ($req) {
                $arrDate = explode('-',$req->input('search.value'));
                if(count($arrDate)==3){
                    $query->where('active',2)->whereYear('date', '=', $arrDate[2])
                      ->whereDay('date', '=', $arrDate[0])
                      ->whereMonth('date', '=', $arrDate[1]);
                }  
            })
            ->orWhere([
                ['active',2],
                ['phone','like','%'.$req->input('search.value').'%']
            ])
            ->orWhere([
                ['active',2],
                ['name','like','%'.$req->input('search.value').'%']
            ])
            ->orWhere([
                ['active',2],
                ['address','like','%'.$req->input('search.value').'%']
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
                $nestedData['id'] =$objItem->id;

                $date = date('H:i:s | d-m-Y',  strtotime($objItem->date));
                $nestedData['date'] = $date;
                $nestedData['name'] = $objItem->name;
                $nestedData['phone'] = $objItem->phone;
                $nestedData['address'] = $objItem->address;
                $nestedData['active'] = '<a class="btn btn-success">Đã đóng gói</a>';
                $nestedData['waybill_code'] = '<a target="_blank" href="http://www.vnpost.vn/en-us/dinh-vi/buu-pham?key='.$objItem->waybill_code.'">'.$objItem->waybill_code.'</a>';
                $nestedData['action'] = '<a class="btn btn-success" onclick="detail('.$objItem->id.')" data-toggle="modal" data-target="#modal-default">Chi tiết đơn hàng</a>';
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
    public function cancel(){
        return view('admin.orderform.cancel');
    }
    public function api_cancel(Request $req){
        $columns = [
            0 => "id",
            1 => "date",
            2 => "name",
            3 => "phone",
            4 => "address",
            5 => "active",
            6 => "action",
        ];

        $totalData = DB::table("order_form")->where('active', -1)->count();
        $limit = $req->input('length');
        $start = $req->input('start');
        $order = $columns[$req->input("order.0.column")];
        $dir   = $req->input("order.0.dir");

        if( empty( $req->input('search.value') ) ){
            $posts = DB::table("order_form")
            ->where([
                ['active',-1],
                ['phone','like','%'.$req->input('search.value').'%']
            ])
            ->offset($start)
            ->limit($limit)
            ->orderBy($order,$dir)
            ->get();

            $totalFiltered = $totalData;
        }else{
            $posts = DB::table("order_form")
            ->Where(function ($query) use ($req) {
                $arrDate = explode('-',$req->input('search.value'));
                if(count($arrDate)==3){
                    $query->where('active',-1)->whereYear('date', '=', $arrDate[2])
                      ->whereDay('date', '=', $arrDate[0])
                      ->whereMonth('date', '=', $arrDate[1]);
                }  
            })
            ->orWhere([
                ['active',-1],
                ['phone','like','%'.$req->input('search.value').'%']
            ])
            ->orWhere([
                ['active',-1],
                ['name','like','%'.$req->input('search.value').'%']
            ])
            ->orWhere([
                ['active',-1],
                ['address','like','%'.$req->input('search.value').'%']
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

                $date = date('H:i:s | d-m-Y',  strtotime($objItem->date));
                $nestedData['date'] = $date;
                $nestedData['name'] = $objItem->name;
                $nestedData['phone'] = $objItem->phone;
                $nestedData['address'] = $objItem->address;
                $nestedData['active'] = '<a class="btn btn-danger">Đã hủy</a>';
                
                $nestedData['action'] = '<a class="btn btn-success" onclick="detail('.$objItem->id.')" data-toggle="modal" data-target="#modal-default">Chi tiết đơn hàng</a>';
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
    public function detail(OrderFormModel $orderform, Request $request){
        $objItem = $orderform->getItem($request->id);
        $arrItem=[
            "id"=>$objItem->id,
            "date"=>date('H:i:s | d-m-Y',  strtotime($objItem->date)),
            "name"=>$objItem->name,
            "phone"=>$objItem->phone,
            "address"=>$objItem->address
        ];
        $arrItem['product']=[];
        $products = json_decode($objItem->product);
        
        foreach ($products as $key => $value) {
            $product = [
                "id_product"=>$value->id_product,
                "name"=>$value->name,
                "picture"=>$value->picture,
                "price"=>$value->price,
                "quantity"=>$value->quantity
            ];
            $arrItem['product'][]=$product;
        }
        return response()->json($arrItem);
    }
    public function update(OrderFormModel $orderform, Request $request){
        $arrItem = [
            'active'=>$request->active
        ];
        if(isset($request->waybill_code)){
            $arrItem['waybill_code']=$request->waybill_code;
        }
        if($orderform->edit($request->id, $arrItem)){
            return route('admin.orderform.index');
        }
    }
}
