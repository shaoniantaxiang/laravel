<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use DB;

class homeListController extends Controller
{
    //从首页跳到列表页 一级分类
    public function index($id)
    {
        //一级分类
    	$type = DB::table('type')->where('pid',0)->get();
    	//当前一级分类下的二级分类
    	$subtype = DB::table('type')->where('pid',$id)->get();
    	//所有的商品
    	$good = DB::table('good')->get();
    	//当前 一级分类下的所有的商品
    	$goods = [];
    	foreach($subtype as $v){
    		$res = DB::table('good')->where('typeid',$v->id)->get();
    		foreach($res as $v){
    			$goods[] = $v;
    		}
    	}
        //商品数据储存session
        session(['order'=>$goods]);
    	return view('home.list.index',['type'=>$type,'good'=>$good,'subtype'=>$subtype,'goods'=>$goods]);
    }

    //呈递从列表页调到列表页 一级分类
    public function inxindex(Request $request)
    {   
        //删除session中的商品数据
        session()->forget('order');

    	$id = $request->input('id');
    	$subtype = DB::table('type')->where('pid',$id)->get();
    	$goods = [];
    	foreach($subtype as $v){
    		$res = DB::table('good')->where('typeid',$v->id)->get();
    		foreach($res as $v){
    			$goods[] = $v;
    		}
    	}

        //商品数据储存session
        session(['order'=>$goods]);
    	return json_encode(['subtype'=>$subtype,'goods'=>$goods]);
    }

    //呈递从列表页调到列表页 二级分类
    public function sndindex(Request $request)
    {
        //删除session中的商品数据
        session()->forget('order');

    	$id = $request->input('id');
        $goods = DB::table('good')->where('typeid',$id)->get();

        //商品数据储存session
        session(['order'=>$goods]);
    	return json_encode($goods);
    }


    //按价格排序
    public function order(Request $request)
    {
        // dd(session('order'));
        $price = 'nowprice';
        $time = 'time';
        $goods = session('order');

        if($request->input('id') == 1 && $request->input('type')==1){//价格升序
            
            $resgoods = homeListController::ascendorder($goods,$price);
            
        }elseif($request->input('id') == 2 && $request->input('type')==1){//价格降序
            
            $resgoods = homeListController::descendorder($goods,$price);

        }elseif($request->input('id') == 1 && $request->input('type')==2){//时间升序
            
            $resgoods = homeListController::ascendorder($goods,$time);

        }elseif($request->input('id') == 2 && $request->input('type')==2){//时间降序
            
            $resgoods = homeListController::descendorder($goods,$time);
        }
        
        return json_encode($resgoods);
    }

    //升序排序
    public static function ascendorder($goods,$param)
    {
        //开关 停止循环用的
        $num = 0;
        for ($i=0; $i < count($goods); $i++) {
            if($i < count($goods)-1){
                if($goods[$i]->$param > $goods[$i+1]->$param){
                    $container = $goods[$i+1];
                    $goods[$i+1] = $goods[$i];
                    $goods[$i] = $container;
                    $num = 1;
                }
            }
        }
        if($num == 0){
            //没有位置调换，停止调用该排序方法，返回结果
            return $goods;
        }else{
            //有位置调换，继续调用该方法
            return homeListController::ascendorder($goods,$param);
        }
    }

    //降序排序
    public static function descendorder($goods,$param)
    {
        //开关 停止循环用的
        $num = 0;
        for ($i=0; $i < count($goods); $i++) {
            if($i < count($goods)-1){
                if($goods[$i]->$param < $goods[$i+1]->$param){
                    $container = $goods[$i+1];
                    $goods[$i+1] = $goods[$i];
                    $goods[$i] = $container;
                    $num = 1;
                }
            }
        }
        if($num == 0){
            //没有位置调换，停止调用该排序方法，返回结果
            return $goods;
        }else{
            //有位置调换，继续调用该方法
            return homeListController::descendorder($goods,$param);
        }
    }
}

 