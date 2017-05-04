<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use DB;

class homeCarController extends Controller
{
    //往购物车表添加数据
    public function index(Request $request)
    {
        //商品详情页 传过来的信息
    	$carinfo = $request->all();
    	//商品表里 该商品信息
    	$data = DB::table('good')->where('id',$carinfo['goodid'])->first();

    	$carinfo['pic_add'] = $data->main_figure;
    	$carinfo['newtitle'] = rtrim($data->title.';'.$carinfo['version'].';'.$carinfo['color'],';');
    	$carinfo['price'] = $data->nowprice;
    	unset($carinfo['version'],$carinfo['color']);
    	if(DB::table('car')->insert($carinfo)){
    		//商品表的库存相应的减少
    		DB::table('good')->where('id',$carinfo['goodid'])->update(['store'=>($data->store - $carinfo['num'])]);
    		return '1';
    	}else{
    		return '2';
    	}
    }

    //呈递当前用户的购物车
    public function carindex()
    {
        $res = DB::table('car')->where('home_uid',session('homeuser')->id)->get();
    	return view('home.car.index',['list'=>$res]);
    }

    //删除购物车表本条信息  更新商品表的库存
    public function delwhole(Request $request)
    {
        $id = $request->input('id');
        //购物车的信息
        $data = DB::table('car')->where('id',$id)->first();
        //商品表里的信息
        $good = DB::table('good')->where('id',$data->goodid)->first();
        //更新商品表的库存
        DB::table('good')->where('id',$data->goodid)->update(['store'=>($data->num + $good->store)]);
        //删除购物车信息
        if(DB::table('car')->where('id',$id)->delete()){
            return '1';
        }else{
            return '2';
        }
    }

    //加减操作 更新购物车表的数量、商品表的库存
    public function delnumstore(Request $request)
    {
        if($request->input('type') == 'del'){//减少

            self::deladdnum($request->input('id'),$request->input('num'),1);
            return '增加';

        }else{//增加
            $num = DB::table('car')
                ->join('good','car.goodid','=','good.id')
                ->where('car.id','=',$request->input('id'))
                ->select('good.store')
                ->first();
            if($num->store >= 1){//商品表库存 >=1的情况

                self::deladdnum($request->input('id'),$request->input('num'),-1);
                return '减少';

            }elseif($num->store <= 0){//商品表库存 =0的情况

                return '最大库存';

            }
        }
    }

    //＋ － 操作的具体方法
    public static function deladdnum($id,$num,$param)
    {
        //更新购物车里商品的num
        DB::table('car')->where('id',$id)->update(['num'=>$num]);
        $goodid = DB::table('car')->where('id',$id)->first()->goodid;
        //更新商品表里的store
        $store = DB::table('good')->where('id',$goodid)->first()->store;
        DB::table('good')->where('id',$goodid)->update(['store'=> $store+$param]);
    }

    //直接输入 原来、现有的值不相同时 更新购物车和商品表
    public function setnumstore(Request $request)
    {
        $oldnum = (int)$request->input('oldnum');
        $nownum = (int)$request->input('nownum');
        $id = $request->input('id');
        $store = (int)DB::table('car')->join('good','car.goodid','=','good.id')->where('car.id','=',$id)->select('good.store')->first()->store;
        
        if($nownum < $oldnum){//购物车数量减少

            return self::count_different($nownum,$oldnum,$id,$store);

        }elseif(($nownum > $oldnum) && ($nownum-$oldnum <= $store)){//购物车数量增加，且增数小于等于商品表库存

            return self::count_different($nownum,$oldnum,$id,$store);

        }elseif(($nownum > $oldnum) && ($nownum-$oldnum > $store)){//购物车数量增加，且增数大于商品表库存

            $num = $oldnum + $store;
            DB::table('car')->where('id',$id)->update(['num'=>$num]);
            $goodid = DB::table('car')->where('id',$id)->first()->goodid;
            DB::table('good')->where('id',$goodid)->update(['store'=>0]);
            return $num;

        }
    }

    //直接输入商品数量  具体处理的方法
    public static function count_different($nownum,$oldnum,$id,$store)
    {
        $different = (int)$nownum - $oldnum;
        DB::table('car')->where('id',$id)->update(['num'=>$nownum]);
        $goodid = DB::table('car')->where('id',$id)->first()->goodid;
        DB::table('good')->where('id',$goodid)->update(['store' => ($store - $different)]);
        return '正常';
    }
}
