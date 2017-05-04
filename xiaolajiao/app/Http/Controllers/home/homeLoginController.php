<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use App\Http\Requests\homeLoginRequest;

use Gregwar\Captcha\CaptchaBuilder;

use Hash;

use DB;

class homeLoginController extends Controller
{
    //显示登录页面
    public function index()
    {
    	return view('home.login.login');
    }

    //
    public function check(homeLoginRequest $request)
    {
        $data = $request->except('_token');
        if(session('yzcode') == $data['yzcode']){//判断验证码
            session()->forget('yzcode');//删除session中的验证码
            $res = DB::table('home_user')->where(function($query) use($data){
                $query->where('username',$data['username'])
                      ->orWhere('email',$data['username'])
                      ->orWhere('phone',$data['username']);
            })->first();
            if($res){//判断是否有该用户
                if(Hash::check($data['pass'],$res->pass)){//判断密码
                    session(['homeuser'=>$res]);//存用户信息
                    if(session()->exists('nowaddress')){
                        return redirect(session('nowaddress'));//跳回原来页面
                    }else{
                        return redirect('/home/index/inx');
                    }
                }else{
                    return back()->with('msg','密码不对');
                }
            }else{
                return back()->with('msg','没有该用户');
            }
        }else{
            session()->forget('yzcode');//删除session中的验证码
            return back()->with('msg','验证码不对');
        }
            
    }

    //生成验证码
    public function setcode($tmp)
    {
    	//设置头信息
        header('Content-type: image/jpeg');
        //实例化
    	$builder = new CaptchaBuilder;
        //设置验证码样式：宽高
		$builder->build(120,40,null);
        //验证码内容存session
        $yzcode = $builder->getPhrase();
        session(['yzcode'=>$yzcode]);
        //输出验证码
		$builder->output();
    }
    
    //台前用户退出操作
    public function tuichu()
    {
        session()->forget('homeuser');
        return redirect('/home/index/inx');
    }
}
