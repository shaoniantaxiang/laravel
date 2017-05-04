<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use DB;

use App\Http\Requests\homeRegisterRequest;

use Hash;

use Illuminate\Support\Facades\Mail;

use App\Mail\RegisterMail;

class homeRegisterController extends Controller
{
    //展示注册页面
    public function index()
    {
    	return view('home.register.register');
    }

    //注册 添加用户
    public function add(homeRegisterRequest $request)
    {
    	$data = $request->except('_token','repass');
        //密码哈希加密
        $data['pass'] = Hash::make($data['pass']);
        //随机token值，邮箱验证使用
        $data['token'] = str_random(66);
        //账户状态
        $data['status'] = 0;
        //随机userchatid，用户聊天id
        do{
            $data['userchatid'] = rand(00000,39999);
        }while(DB::table('home_user')->where('userchatid',$data['userchatid'])->first());
        //判断是否注册成功
        if($id = DB::table('home_user')->insertGetId($data)){
            //注册成功，发送邮件
            Mail::to($data['email'])->send(new RegisterMail($id,$data['token']));
            return '激活邮件已发送至邮箱，请前往激活';
        }else{
            return back()->with('msg','注册失败');
        }
    }

    //修改用户的注册状态
    public function setstate($id,$token)
    {
        $res = DB::table('home_user')->where('id',$id)->first();
        if($token == $res->token){
            if(DB::table('home_user')->where('id',$id)->update(['status'=>1])){
                return redirect('/home/login/inx')->with('msg','邮箱已激活，请登录');
            }else{
                return redirect('/home/register/inx')->with('msg','邮箱激活失败');
            }
        }else{
            return redirect('/home/register/inx')->with('msg','非法请求');
        }
    }

}
