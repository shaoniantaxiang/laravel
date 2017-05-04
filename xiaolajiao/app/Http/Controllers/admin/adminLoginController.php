<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use DB;

use Hash;

class adminLoginController extends Controller
{	
	//呈递后台登录页面
    public function index()
    {
    	return view('admin.login.login');
    }

    //检测用户信息
    public function check(Request $request)
    {
        $this->validate($request, [
	        'username' => 'required',
	        'pass' => 'required',
	    ],[
	    	'username.required' => '用户名没写',
	    	'pass.required' => '密码没写',
	    ]);

    	$data = $request->except('_token');
    	if($res = DB::table('admin_user')->where('username',$data['username'])->first()){
    		if(Hash::check($data['pass'],$res->pass)){
    			session(['adminuser'=>$res]);
    			return redirect('/admins');
    		}else{
    			return back()->with('msg','密码不对');
    		}
    	}else{
    		return back()->with('msg','该用户不存在');
    	}
    }

    //退出操作
    public function tuichu()
    {
    	session()->forget('adminuser');
    	return redirect('/admins/login/inx')->with('msg','退出成功');
    }
}
