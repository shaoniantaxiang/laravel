<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use DB;

use Hash;


class homeCenterController extends Controller
{
    //呈递个人中心首页
    public function index()
    {
    	$res = DB::table('order')->where('home_uid',session('homeuser')->id)->orderBy('id')->get();
    	//拼接商品标题、版本、赠品 成一个字符串
    	$total_title = [];
    	foreach ($res as $k => $v) {
    		$total_title[] = $v->newtitle.$v->packg.$v->gift;
    	}


    	//分割字符串成数组
    	for ($i=0; $i < count($total_title); $i++) { 
    		//标题
    		$data[] = self::setparam($total_title[$i]);
    		//价格
    		$price[] = self::setparam($res[$i]->price);
    		//数量
    		$num[] = self::setparam($res[$i]->num);
    		//图片
    		$picture[] = self::setparam($res[$i]->pic_add);
    	}

    	//拼接成一个数组
    	$newdata = [];
    	for ($i=0; $i < count($data); $i++) { 
    		for ($k=0; $k < count($data[$i]); $k++) { 
    			//有商品名称
    			if($data[$i][$k] != ''){
    				//商品名称
    				$newdata[$i][$k]['title'] = $data[$i][$k];
    				//商品图片
    				if(isset($picture[$i][$k])){
    					$newdata[$i][$k]['picture'] = $picture[$i][$k];
    				}else{
    					$newdata[$i][$k]['picture'] = '/defaultimage/logo.gif';
    				}
    				//商品价格
    				if(isset($price[$i][$k])){
	    				$newdata[$i][$k]['price'] = $price[$i][$k];
	    			}else{
	    				$newdata[$i][$k]['price'] = 0;
	    			}
	    			//商品数量
	    			if(isset($num[$i][$k])){
	    				$newdata[$i][$k]['num'] = $num[$i][$k];
	    			}else{
	    				$newdata[$i][$k]['num'] = 1;
	    			}
    			}
    		}
    		//订单ID
    		$newdata[$i]['id'] = $res[$i]->id;
    		//订单状态
    		$newdata[$i]['state'] = $res[$i]->state;
    		//订单总价
    		$newdata[$i]['total'] = $res[$i]->total;
    		//订单快递单号
    		if($res[$i]->express){
    			$newdata[$i]['express'] = $res[$i]->express;
    		}else{
    			$newdata[$i]['express'] = '';
    		}
    		
    	}
    	// dd($newdata);
    	return view('home.center.order',['list'=>$newdata]);
    }

    //处理各商品参数 的方法
    public static function setparam($param)
    {
    	$arr = explode('@',$param);
    	array_pop($arr);
    	return $arr;
    }

    //更改订单的状态
    public function setstate(Request $request)
    {
    	$id = $request->input('id');
    	$state = $request->input('state');
    	if($state == 0){
    		if(DB::table('order')->where('id',$id)->update(['state'=>1])){
    			return 1;
    		}else{
    			return 11;
    		}
    		
    	}elseif($state == 2){
    		if(DB::table('order')->where('id',$id)->update(['state'=>3])){
    			return 2;
    		}else{
    			return 12;
    		}
    		
    	}
    	
    }

    //显示物流页面
    public function wuliu()
    {
    	return view('home.center.wuliu');
    }

    //查看物流
    public function setwuliu(Request $request)
    {
    	//Post请求获取快递公司的名称
    	$url = 'http://www.kuaidi100.com/autonumber/autoComNum?text='.$request->input('code');
    	//初始化
    	$curl = curl_init($url);
    	//拼装参数
    	$data = array('text'=>$request->input('code'));
    	//请求数据不直接输出
    	curl_setopt($curl,CURLOPT_RETURNTRANSFER,1);
    	//设置超时时间
		curl_setopt($curl,CURLOPT_TIMEOUT,10);
		//设置请求方式
		curl_setopt($curl,CURLOPT_POST,1);
		//绑定参数
		curl_setopt($curl,CURLOPT_POSTFIELDS,$data);
		//发送请求
		$res = curl_exec($curl);
		//获取公司名称
		$name = json_decode($res,true)['auto'][0]['comCode'];
		//Get请求获取快递状态
		$url = 'http://www.kuaidi100.com/query?type='.$name.'&postid='.$request->input('code').'&id=1&valicode=&temp=0.6118170138539524';
		//初始化请求
		$curl = curl_init($url);
		//请求数据不直接输出
		curl_setopt($curl,CURLOPT_RETURNTRANSFER,1);
		//超时时间
		curl_setopt($curl,CURLOPT_TIMEOUT,10);
		//发送请求
		$res = curl_exec($curl);
		//获取快递的状态
		$info = json_decode($res,true)['data'];
		return json_encode($info);
    }

    //呈递修改密码页面
    public function resetpass()
    {
        return view('home.center.resetpass');
    }

    //判断原密码是否正确
    public function checkoldpass(Request $request)
    {
        $oldpass = $request->input('oldpass');
        $id = session('homeuser')->id;
        $pass = DB::table('home_user')->where('id',$id)->first()->pass;
        if (Hash::check($oldpass,$pass)) {
            return '1';
        }else{
            return '2';
        }
    }

    //执行密码的修改
    public function doresetpass(Request $request)
    {
        $newpass = Hash::make($request->input('newpass'));
        $id = session('homeuser')->id;
        if(DB::table('home_user')->where('id',$id)->update(['pass'=>$newpass])){
            session()->forget('homeuser');
            return '1';
        }else{
            return '2';
        }
    }
}
