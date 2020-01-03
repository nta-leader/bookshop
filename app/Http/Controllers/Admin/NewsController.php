<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Http\Requests\Admin\News\AddRequest;
use App\Http\Requests\Admin\News\EditRequest;
use App\Models\Admin\NewsModel;
use Storage;

class NewsController extends Controller
{
    public function index(){
        return view('admin.news.index');
    }
    public function view(Request $req){
        $columns = [
    		0 => "id",
    		1 => "name",
            2 => "picture",
            3 => "active",
            4 => "action"
    	];
		
		$totalData = DB::table("news")->count();
    	$limit = $req->input('length');
    	$start = $req->input('start');
    	$order = $columns[$req->input("order.0.column")];
    	$dir   = $req->input("order.0.dir");

    	if( empty( $req->input('search.value') ) ){
            $posts = DB::table("news")
            ->offset($start)
            ->limit($limit)
            ->orderBy($order,$dir)
            ->get();

            $totalFiltered = $totalData;
    	}else{
            $posts = DB::table("news")
            ->where([
                ["name","like","%{$req->input('search.value')}%"]
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
				$nestedData['picture'] = "<img style='width:100px;' src='/storage/app/files/news/{$objItem->picture}'>";
				if($objItem->active==1){
					$nestedData['active'] = '<span id="active'. $objItem->id .'"><a onclick="active(1,'. $objItem->id .')" class="btn btn-success">Hiện</a></span>';
				}else{
					$nestedData['active'] = '<span id="active'. $objItem->id .'"><a onclick="active(0,'. $objItem->id .')" class="btn btn-danger">Ẩn</a></span>';
				}
				$urlEdit=route('admin.news.edit',['id'=>$objItem->id]);
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
        return view('admin.news.add');
    }
    public function postAdd(NewsModel $news, AddRequest $request){
        $picture = $request->file('picture')->store('files/news');
        $picture = explode('/',$picture);
        $picture = end($picture);
        $arrItem = [
            'name'=>    $request->name,
            'url'=>     str_slug($request->name),
            'picture'=> $picture,
            'content'=> $request->content,
            'active'=>  $request->active
        ];
        if($news->add($arrItem)){
            return redirect()->route('admin.news.index')->with(['msg'=>'Thêm thành công !']);
        }else{
            return redirect()->back()->with(['msg'=>'Có lỗi xảy ra']);
        }
    }
    public function edit($id, NewsModel $news){
        $objItem = $news->getItem($id);
        return view('admin.news.edit',compact('objItem'));
    }
    public function postEdit($id, NewsModel $news, EditRequest $request){
        if($request->has('picture_new')){
            $this->validate($request,
                [
                    "picture_new"=>"image"
                ],
                [
                    "picture_new.image"=>"Vui lòng chọn đúng file hình ảnh !",    
                ]
            );

            $picture = $request->file('picture_new')->store('files/news');
            $picture = explode('/',$picture);
            $picture = end($picture);
            if(Storage::exists('files/news/'.$request->picture)){
                Storage::delete('files/news/'.$request->picture);
            }
        }else{
            $picture =$request->picture;
        }
        
        $arrItem = [
            'name'=>    $request->name,
            'url'=>     str_slug($request->name),
            'picture'=> $picture,
            'content'=> $request->content,
            'active'=>  $request->active
        ];
        if($news->edit($id, $arrItem)){
            return redirect()->route('admin.news.index')->with(['msg'=>'Sửa thành công !']);
        }else{
            return redirect()->route('admin.news.index');
        }
    }
    public function del(NewsModel $news, Request $request){
        if($request->id==null){
            return redirect()->back();
        }elseif($news->del($request->id)){
			return redirect()->back()->with(['msg'=>'Xóa thành công !']);
        }else{
			return redirect()->back()->with(['msg'=>'Có lỗi xảy ra !']);
		}
    }
    public function active(NewsModel $news, Request $request){
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
		$news->edit($id, $arrItem);
		return view('admin.news.active',compact('id','active'));
	}
}
