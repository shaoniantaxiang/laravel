<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use DB;

class adminOrderController extends Controller
{
    //显示信息
    public function index(Request $request)
    {
    	if($request->all()){
            if($request->has('page')){
                //当前页数
                $start = $request->input('page');
            }else{
                //当前页数
                $start = 1;
            }
            if($request->has('keyword')){
                //keyword
                $keyword = $request->input('keyword');
            }else{
                $keyword = '';
            }
            if($request->has('num')){
                //页大小
                $size = $request->input('num');
            }else{
                $size = 5;
            }
            return self::huoqu($start,$size,$keyword);
        }else{
            return view('admin.order.index');
        }
    }

     //获取数据 当前页数据、当前页码、最大页码
    public static function huoqu($start,$size,$keyword)
    {   
        if($keyword){
            //当前页面的数据
            $res = DB::table('order')->where('newtitle','like','%'.$keyword.'%')->offset(($start-1)*$size)->limit($size)->orderBy('id')->get();
            //数据的 总条数
            $total_num = DB::table('order')->where('newtitle','like','%'.$keyword.'%')->count();
        }else{
            //当前页面的数据
            $res = DB::table('order')->offset(($start-1)*$size)->limit($size)->orderBy('id')->get();
            //数据的 总条数
            $total_num = DB::table('order')->count();
        }
        
        //总页数
        $page_num = ceil($total_num/$size);
        $data = array('page_num'=>$page_num,'res'=>$res,'nowpage'=>$start);
        return json_encode($data);
    }

    //修改订单的状态
    public function setstate(Request $request)
    {
    	// dd($request->all());
    	$id = $request->input('id');
    	$express = $request->input('express');
    	if(DB::table('order')->where('id',$id)->update(['state'=>'2','express'=>$express])){
    		return '1';
    	}else{
    		return '2';
    	}
    }
}
