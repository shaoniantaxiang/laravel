<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use DB;

class adminTypeController extends Controller
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
            return view('admin.type.index');
        }
    }

     //获取数据 当前页数据、当前页码、最大页码
    public static function huoqu($start,$size,$keyword)
    {   
        if($keyword){
            //当前页面的数据
            $res = DB::table('type')->where('classname','like','%'.$keyword.'%')->offset(($start-1)*$size)->limit($size)->get();
            //数据的 总条数
            $total_num = DB::table('type')->where('classname','like','%'.$keyword.'%')->count();
        }else{
            //当前页面的数据
            $res = DB::table('type')->offset(($start-1)*$size)->limit($size)->get();
            //数据的 总条数
            $total_num = DB::table('type')->count();
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
    	$data['path'] = DB::table('type')->where('id',$request->input('pid'))->first()->path.$request->input('pid').',';
    	if(DB::table('type')->insert($data)){
    		return '添加成功';
    	}else{
    		return '添加失败';
    	}
    }

    //执行删除
    public function delete(Request $request)
    {
        $id = $request->input('id');
        $res = DB::table('type')->where('pid',$id)->first();
        $result = DB::table('good')->where('typeid',$id)->first();
        if($res || $result){
            return '有子类或该类有商品，不能删除';
        }else{
            $res = DB::table('type')->where('id',$id)->delete();
            if($res){
                return '删除成功';
            }else{
                return '删除失败';
            }
        }
    }

    //执行更新
    public function update(request $request)
    {
    	if(DB::table('type')->where('id',$request->input('id'))->update($request->all())){
    		return '修改成功';
    	}else{
    		return '修改失败';
    	}
    }

    //执行查询
    public function select()
    {
    	return json_encode(DB::select('select * from type order by concat(path,id)'));
    }
}
