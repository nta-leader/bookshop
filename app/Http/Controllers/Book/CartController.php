<?php

namespace App\Http\Controllers\Book;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book\ProductModel;
use App\Models\Book\OrderFormModel;

class CartController extends Controller
{
    public function index(ProductModel $product, Request $request){
        if($request->session()->has('cart')){
            $cart = $request->session()->get('cart');
        }else{
            $cart = [];
        }

        $cart_arr = array();
        $cart_arr['data'] = array();
        foreach ($cart as $key => $value) {
            $objItem = $product->getItemId($key);
            
            $post_item = array(
                'id_product'=> $objItem->id,
                'name'=>$objItem->name,
                'picture'=>$objItem->picture,
                'price'=>$objItem->price,
                'quantity'=>$value['quantity']
            );
            // Push ti "data
            array_push($cart_arr['data'], $post_item);
        }
        return response()->json($cart_arr);
    }
    public function check_waybill_code(OrderFormModel $orderform, ProductModel $product, Request $request){
        $phone = $request->phone;
        $objItems = $orderform->getItem($phone);
        //dd($objItems);
        $category = $product ->getCategory();
       return view('book.cart.checkwaybillcode',compact('objItems','category'));
    }
    public function addProduct(ProductModel $product, Request $request){
        if($request->session()->has('cart')){
            $cart = $request->session()->get('cart');
            if(isset($cart[$request->id_product])){
                $cart[$request->id_product]['quantity'] += $request->quantity;
                $message = "Đã cập nhật số lượng !";
            }else{
                $cart[$request->id_product]['id_product'] = $request->id_product;
                $cart[$request->id_product]['quantity'] = $request->quantity;
                $message = "Đã thêm vào giỏ hàng !";
            }
            $request->session()->put('cart',$cart);
        }else{// truong hop them san pham dau tien
            $cart = [];
            $cart[$request->id_product] = [
                'id_product'=> $request->id_product,
                'quantity'=> (int)$request->quantity
            ];
            $request->session()->put('cart',$cart);
            $message = "Đã thêm vào giỏ hàng !";
        }

        $cart_arr = array();
        $cart_arr['data'] = array();
        $cart_arr['message'] = $message;
        foreach ($cart as $key => $value) {
            $objItem = $product->getItemId($key);
            
            $post_item = array(
                'id_product'=> $objItem->id,
                'name'=>$objItem->name,
                'picture'=>$objItem->picture,
                'price'=>$objItem->price,
                'quantity'=>$value['quantity']
            );
            // Push ti "data
            array_push($cart_arr['data'], $post_item);
        }
        return response()->json($cart_arr);
    }
    public function update(ProductModel $product, Request $request){
        if($request->session()->has('cart')){
            $cart = $request->session()->get('cart');

            if(isset($cart[$request->id_product])){

                if($request->value != 0){
                    $cart[$request->id_product]['quantity'] += (int)$request->value;
                }else{
                    unset($cart[$request->id_product]);                   
                }
                $request->session()->put('cart',$cart);

                $cart_arr = array();
                $cart_arr['data'] = array();
                foreach ($cart as $key => $value) {
                    $objItem = $product->getItemId($key);
                    
                    $post_item = array(
                        'id_product'=> $objItem->id,
                        'name'=>$objItem->name,
                        'picture'=>$objItem->picture,
                        'price'=>$objItem->price,
                        'quantity'=>$value['quantity']
                    );
                    // Push ti "data
                    array_push($cart_arr['data'], $post_item);
                }
                return response()->json($cart_arr);
            }
        }
    }
    public function checkout(OrderFormModel $orderform, ProductModel $product, Request $request){
        $name = $request->name;
        $phone = $request->phone;
        $address = $request->address;

        $cart = $request->session()->get('cart');
        $cart_arr = array();
        foreach ($cart as $key => $value) {
            $objItem = $product->getItemId($key);
            $value['name'] = $objItem->name;
            $value['picture'] = $objItem->picture;
            $value['price'] = $objItem->price;
            array_push($cart_arr, $value);
        }

        $date = time();
        $date = date('Y-m-d H:i:s',$date);
        $objItem= [
            'date'=>$date,
            'name'=>$name,
            'phone'=>$phone,
            'address'=>$address,
            'product'=>json_encode($cart_arr),
            'active'=>0
        ];
        if($orderform->add($objItem)){
            $request->session()->forget('cart');
            return response()->json(['message'=>'Đặt hàng thành công !','data'=>[]]);
        }else{
            return response()->json(['message'=>'Có lỗi xảy ra !','data'=>[]]);
        }
    }
    public function delCart(Request $request){
        $request->session()->forget('cart');
        return response()->json(['data'=>[]]);
    }
}
