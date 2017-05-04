<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use DB;

use Hash;

class adminPassportController extends Controller
{
    //生成加密签名
    public function sign($username,$pass)
    {
    	//是否有该用户
    	if($res = DB::table('home_user')->where('username',$username)->first()){
    		//密码是否正确
    		if(Hash::check($pass,$res->pass)){
    			//生成加密签名
    			$sig = Hash::make('xlj'.$username.$pass.time());
    			$newsig = str_replace('/','',$sig);
    			session(['passid'=>$newsig]);
    			echo $newsig;
    		}
    	}
    }

    //返回数据
    public function backdata($bcksig,$goodtype)
    {
    	// dd($bcksig);
    	if($bcksig != session('passid')){//==============================？？？？==============================
    		session()->forget('passid');
    		$res = DB::table('good')->where('typeid',$goodtype)->get();
    		echo json_encode($res);
    	}else{
    		exit('非法请求');
    	}
    }
}
