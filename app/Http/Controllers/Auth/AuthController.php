<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\PostLoginRequest;
use App\Http\Requests\Auth\PostPasswordRequest;
use App\Models\UsersModel;
use Auth;

class AuthController extends Controller
{
    public function login(){
        if (Auth::check()) {
            return redirect()->route('admin.home.index')->with(['msg'=>'Chào mừng bạn đến với trang quản trị !']);
        }
        return view('auth.login');
    }
    public function postLogin(PostLoginRequest $request){
        $data = $request->only(['username','password']);
    	if (Auth::attempt($data)) {
    		$auth=Auth::user();
    		return redirect()->route('admin.home.index')->with(['msg'=>'Chào mừng bạn đến với trang quản trị !']);
		}else{
			return redirect()->back()->with(['msg'=>'Sai tài khoản hoặc mật khẩu !']);
		}
    }
    public function password(){
        return view('auth.password');
    }
    public function postPassword(UsersModel $users, PostPasswordRequest $request){
        $auth = Auth::user();
        $data = [
            'username'=>$auth->username,
            'password'=>$request->password
        ];
        if (Auth::attempt($data)) {
            $data['password'] = bcrypt($request->passwordNew);
            $users->doiMatKhau($data);
    		return redirect()->back()->with(['msg'=>'Đổi mật khẩu thành công !']);
		}else{
			return redirect()->back()->with(['msg'=>'Sai mật khẩu !']);
		}
    }
    public function logout(){
        Auth::logout();
    	return redirect('/');
    }
}