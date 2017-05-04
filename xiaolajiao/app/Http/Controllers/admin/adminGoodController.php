<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use DB;

class adminGoodController extends Controller
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
            return view('admin.good.index');
        }
    }

    //获取数据 当前页数据、当前页码、最大页码
    public static function huoqu($start,$size,$keyword)
    {
        if($keyword){
            //当前页面的数据
            $res = DB::table('good')->where(function($query) use($keyword){
                $query->where('title','like','%'.$keyword.'%')
                      ->orwhere('subtitle','like','%'.$keyword.'%')
                      ->orwhere('script','like','%'.$keyword.'%');
            })->offset(($start-1)*$size)->limit($size)->get();
            //数据的 总条数
            $total_num = DB::table('good')->where(function($query) use($keyword){
                $query->where('title','like','%'.$keyword.'%')
                      ->orwhere('subtitle','like','%'.$keyword.'%')
                      ->orwhere('script','like','%'.$keyword.'%');
            })->count();
        }else{
            //当前页面的数据
            $res = DB::table('good')->offset(($start-1)*$size)->limit($size)->get();
            //数据的 总条数
            $total_num = DB::table('good')->count();
        }
        
        //总页数
        $page_num = ceil($total_num/$size);
        $data = array('page_num'=>$page_num,'res'=>$res,'nowpage'=>$start);
        return json_encode($data);
    }

    //执行添加
    public function add(Request $request)
    {
        $data = $request->all();
        $data['time'] = time();
        $res = DB::table('good')->insertGetId($data);
        //存 刚插入商品信息的id
        session(['id'=> $res]);
        return $res;
    }

    //执行删除
    public function delete(Request $request)
    {
        $res = DB::table('good')->where('id',$request->input('id'))->first();
        $pictures = explode('@',rtrim($res->pictures,'@'));
        if(DB::table('good')->where('id',$request->input('id'))->delete()){
            
            //删除其他图片
            foreach ($pictures as $k => $v) {
                if(file_exists('.'.$v)){
                    unlink('.'.$v);
                }
            }

            //删除主图
            if(file_exists('.'.$res->main_figure)){
                unlink('.'.$res->main_figure);
            }
            return '删除成功';
        }else{
            return '删除失败';
        }
    }

    //查询商品分类
    public function select(Request $request)
    {
        return json_encode(DB::select('select * from type order by concat(path,id)'));
    }

    //更新商品
    public function update(Request $request)
    {
        if(DB::table('good')->where('id',$request->input('id'))->update($request->all())){
            return '修改成功';
        }else{
            return '修改失败';
        }
    }

    //查询具体商品信息
    public function find(Request $request)
    {
        return json_encode(DB::table('good')->where('id',$request->input('id'))->first());
    }

    //接收处理session里的图片的路径
    public function picpath(Request $request)
    {
        session_start();
        //获取要插入图片 的商品的id
        $id = session('id');
        //获取 插件中处理图片之后的返回值
        $res = $_SESSION['picpath'];
        //处理$res
        $str = '';
        for ($i=0; $i < count($res); $i++) { 

            if($i == 0){//存主图
                $url = json_decode($res[$i],true)['url'];
                $url = str_replace('\\','',$url);
                DB::table('good')->where('id',$id)->update(['main_figure'=>$url]);
            }else{//存其他商品图片
                $url = json_decode($res[$i],true)['url'];
                $url = str_replace('\\','',$url).'@';
                $str .= $url;
            }
        }
        DB::table('good')->where('id',$id)->update(['pictures'=>$str]);
        // 删除session中 插件处理的图片的返回值
        unset($_SESSION['picpath']);
        // 删除session中 商品的id
        session(['id'=> '']);
    }
    
}
