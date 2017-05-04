<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use DB;

class homeIndexController extends Controller
{
    //呈递首页
    public function index()
    {	
    	//轮播图
    	$lunbo = DB::table('turn')->get();
    	//商品
    	$good = DB::table('good')->get();
    	//商品分类
    	$type = DB::table('type')->where('pid',0)->get();
    	return view('home.index.index',['good'=>$good,'type'=>$type,'lunbo'=>$lunbo]);
    }

    public static function setscript($script)
    {
    	return json_encode(explode(';',rtrim($script,';')));

    }
}
