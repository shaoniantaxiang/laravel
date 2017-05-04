<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use DB;

class adminLunboController extends Controller
{
    //显示轮播图
    public function index()
    {
    	return view('admin.lunbo.index');
    	
    }

    //返回数据
    public function showindex()
    {
    	return json_encode(DB::table('turn')->get());
    }

    //图片的插入
    public function add()
    {
    	session_start();
    	$pic = json_decode($_SESSION['trun'],true)['url'];
    	DB::table('turn')->insert(['pic'=>$pic]);
    	unset($_SESSION['trun']);
    }

    //执行图片的删除
    public function delete(Request $request)
    {
    	$id = $request->input('id');
    	$data = DB::table('turn')->where('id',$id)->first();
    	if(file_exists('.'.$data->pic)){
    		if(unlink('.'.$data->pic) && DB::table('turn')->where('id',$id)->delete()){
    			return '删除成功';
    		}else{
    			return '删除失败';
    		}
    	}else{
    		return '文件不存在';
    	}
    }

}
