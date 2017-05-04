<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use DB;

class homeOrderController extends Controller
{
    //添加数据到订单表，同时删除购物车表
    public function store(Request $request)
    {
    	$idlist = explode(';',rtrim($request->input('id'),';'));
    	$infolist = [];
    	//查出并删除 当前用户购物车里的信息
    	foreach ($idlist as $k => $v) {
    		$infolist[] = DB::table('car')->where('id',$v)->first();
    		DB::table('car')->where('id',$v)->delete();
    	}
    	//组装 新数组
    	$newinfolist = [];
    	$picadd = '';$title = '';$num = '';$total = 0;$price = '';$gift = '';$packg = '';$goodid = '';
    	foreach ($infolist as $key => $value) {
    		foreach($value as $k => $v){
    			if($k == 'pic_add'){$picadd .= $v.'@';}
    			if($k == 'newtitle'){$title .= $v.'@';}
    			if($k == 'num'){$num .= $v.'@';}
    			if($k == 'price'){$total += $value->price * $value->num;$price .= $v.'@';}
    			if($k == 'gift'){$gift .= $v.'@';}
    			if($k == 'packg'){$packg .= $v.'@';}
    			if($k == 'goodid'){$goodid .= $v.'@';}
    		}
    	}
    	$newinfolist['pic_add'] = $picadd;
    	$newinfolist['newtitle'] = $title;
    	$newinfolist['num'] = $num;
    	$newinfolist['total'] = $total;
    	$newinfolist['price'] = $price;
    	$newinfolist['gift'] = $gift;
    	$newinfolist['packg'] = $packg;
    	$newinfolist['goodid'] = $goodid;
    	$newinfolist['home_uid'] = session('homeuser')->id;
    	$newinfolist['state'] = 0;
    	return DB::table('order')->insertGetId($newinfolist);
    }

    //呈递 给订单添加地址页面
    public function index($id)
    {
    	//本条订单信息
    	$res = DB::table('order')->where('id',$id)->first();

    	//组装 商品的数组
    	$data = [];
    	$title = self::setparam($res->newtitle);
    	$price = self::setparam($res->price);
    	$num = self::setparam($res->num);
    	for ($i=0; $i < count($title); $i++) { 
    		$data[$i]['title'] = $title[$i];
    		$data[$i]['price'] = $price[$i];
    		$data[$i]['num'] = $num[$i];
    	}
    	//套餐的数组
    	$newpackg = self::setparam($res->packg);
    	//礼品的数组
    	$newgift = self::setparam($res->gift);
    	//总价
    	$newtotal = $res->total;
    	return view('home.order.index',['data'=>$data,'newpackg'=>$newpackg,'newgift'=>$newgift,'newtotal'=>$newtotal,'id'=>$id]);
    }

    //处理各商品参数 的方法
    public static function setparam($param)
    {
    	$arr = explode('@',$param);
    	array_pop($arr);
    	return $arr;
    }

    //select 获取地址的方法
    public function findads(Request $request)
    {
    	return json_encode(DB::table('district')->where('upid',$request->input('id'))->get());
    }

    //添加地址
    public function addaddress(Request $request)
    {
    	$address = '';
    	foreach ($request->except('id') as $k => $v) {
    		$address .= $v.';';
    	}
    	DB::table('order')->where('id',$request->input('id'))->update(['address'=>$address]);
    }

    //呈递支付页面
    public function payfor($id)
    {
    	$res = DB::table('order')->where('id',$id)->first();
    	return view('home.payfor.index',['data'=>$res]);
    }

    //完成支付
    public function payforsuccess(Request $request)
    {
    	DB::table('order')->where('id',$request->input('id'))->update(['state'=>1]);
    }
}
