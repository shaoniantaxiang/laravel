<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use DB;

class homeDetailController extends Controller
{
    //呈递详情页
    public function index($id)
    {
        //删除session中的 本页面路径
        if(session()->exists('nowaddress')){
            session()->forget('nowaddress');
        }
        
    	$type = DB::table('type')->where('pid',0)->get();
    	$good = DB::table('good')->get();
    	$data = DB::table('good')->where('id',$id)->first();
    	return view('home.detail.index',['type'=>$type,'good'=>$good,'data'=>$data]);
    }

    //处理参数
    public static function setparam($param)
    {
    	return json_encode(explode('@',rtrim($param,'@')));
    }

    //查询库存
    public static function countnum($id)
    {
        return DB::table('good')->where('id',$id)->first()->store;
    }
}
