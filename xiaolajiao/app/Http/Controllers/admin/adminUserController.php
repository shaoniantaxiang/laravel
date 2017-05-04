<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use DB;

use Hash;

class adminUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
            return view('admin.user.index');
        }
        
    }

    //获取数据 当前页数据、当前页码、最大页码
    public static function huoqu($start,$size,$keyword)
    {
        if($keyword){
            //当前页面的数据
            $res = DB::table('home_user')->where(function($obj) use($keyword){
                $obj->where('username','like','%'.$keyword.'%')
                    ->orwhere('phone','like','%'.$keyword.'%');
            })->offset(($start-1)*$size)->limit($size)->get();
            //数据的 总条数
            $total_num = DB::table('home_user')->where(function($obj) use($keyword){
                $obj->where('username','like','%'.$keyword.'%')
                    ->orwhere('phone','like','%'.$keyword.'%');
            })->count();
        }else{
            //当前页面的数据
            $res = DB::table('home_user')->offset(($start-1)*$size)->limit($size)->get();
            //数据的 总条数
            $total_num = DB::table('home_user')->count();
        }
        
        //总页数
        $page_num = ceil($total_num/$size);
        $data = array('page_num'=>$page_num,'res'=>$res,'nowpage'=>$start);
        return json_encode($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    //储存数据
    public function store(Request $request)
    {   
        // homeUserAddRequest
        //储存用户信息
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
        //判断是否添加成功
        if(DB::table('home_user')->insert($data)){
            return '添加成功';
        }else{
            return '添加失败';
        }

    }

    //修改数据
    public function zdyupdate(Request $request)
    {
        $res = DB::table('home_user')->where('id',$request->input('id'))->first();
        // dd($res);
        if(Hash::check($request->input('oldpass'),$res->pass)){
            $pass = Hash::make($request->input('pass'));
            if(DB::table('home_user')->where('id',$request->input('id'))->update(['pass' => $pass])){
                return '修改成功';
            }else{
                return '修改失败';
            }
        }else{
            return '原密码不正确';
        }
    }

    //删除数据
    public function zdydelete(Request $request)
    {
        if(DB::table('home_user')->where('id',$request->input('id'))->delete()){
            return '删除成功';
        }else{
            return '删除失败';
        }
    }




}
