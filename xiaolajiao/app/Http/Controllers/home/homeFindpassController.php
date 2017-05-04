<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use DB;

use App\Http\Disanfang\Ucpaas;

use Hash;

class homeFindpassController extends Controller
{
    //输入手机号页面
    public function index()
    {
    	return view('home.forgetpass.index');
    }

    //验证手机号
    public function checkphone(Request $request)
    {
    	// dd($request->input('phone'));
    	if(DB::table('home_user')->where('phone',$request->input('phone'))->first()){
    		//初始化必填
			$options['accountsid']='5d54be4ae7c56bd83e1b5f6b71f5a860';
			$options['token']='e4527964892165b233728ba7ae9598a0';

			//初始化 $options必填
			$ucpass = new Ucpaas($options);

			//短信验证码（模板短信）,默认以65个汉字（同65个英文）为一条（可容纳字数受您应用名称占用字符影响），超过长度短信平台将会自动分割为多条发送。分割后的多条短信将按照具体占用条数计费。
			$appId = "f6327ca6de604c4dae879fcfda16d31b";
			$to = $request->input('phone');
			session(['phone'=>$to]);
			$templateId = "42284";
			$param=rand(1000,9999);
			session(['sjcode'=>$param]);
			$ucpass->templateSMS($appId,$to,$templateId,$param);
			return redirect('/home/findpass/icp')->with('msg','验证码已发送，请在三分钟之内输入');
    	}else{
    		return back()->with('msg','手机号不存在');
    	}
    }

    //呈递输入验证码、密码的页面
    public function inputcodepass()
    {
    	return view('home.forgetpass.codepass');
    }


    //输入验证码和密码 处理数据
    public function codepass(Request $request)
    {	
    	if($request->input('sjcode') == session('sjcode')){
    		
    		$phone = session('phone');
    		session()->forget('sjcode');
    		session()->forget('phone');

    		$pass = Hash::make($request->input('pass'));
    		if(DB::table('home_user')->select('phone',$phone)->update(['pass'=>$pass])){
    			
    			return redirect('/home/login/inx')->with('msg','密码修改成功，请登录');
    		}else{
    			
    			return redirect('/home/findpass/inx')->with('msg','密码修改失败');
    		}
    		
    	}else{
    		
    		return redirect('/home/findpass/inx')->with('msg','验证码不对');
    	}
    }
}
