<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\AboutModel;
use App\Http\Requests\Admin\Home\EditRequest;

class HomeController extends Controller
{
    public function index(AboutModel $about){
        $objItem = $about->getAbout();
        return view('admin.home.index',compact('objItem'));
    }
    public function edit(AboutModel $about, EditRequest $request){
        $arrItem = [
            'name'=>$request->name,
            'address'=>$request->address,
            'work_time'=>$request->work_time,
            'phone'=>$request->phone,
            'email'=>$request->email,
            'facebook'=>$request->facebook,
            'about'=>$request->about,
            'shopping_guide'=>$request->shopping_guide,
            'guarantee'=>$request->guarantee
        ];
       if($about->edit($arrItem)){
            return redirect()->route('admin.home.index')->with(['msg'=>'Sửa thành công !']);
        }else{
            return redirect()->route('admin.home.index');
        }
    }
}
