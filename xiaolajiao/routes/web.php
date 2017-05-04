<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});



//后台 呈递登录页面
Route::get('/admins/login/inx','admin\adminLoginController@index');

//后台 检测用户信息
Route::post('/admins/login/chk','admin\adminLoginController@check');


//后台路由组
Route::group(['middleware' => ['checkadminuser']], function () {
	//后台 退出操作
	Route::get('/admins/login/tih','admin\adminLoginController@tuichu');



	//后台 首页控制器
	Route::get('/admins','admin\adminIndexController@index');



	//后台 执行前台用户删除
	Route::post('/admins/user/dlt','admin\adminUserController@zdydelete');

	//后台 执行前台用户更新
	Route::post('/admins/user/upt','admin\adminUserController@zdyupdate');

	//后台 前台用户控制器
	Route::resource('/admins/user','admin\adminUserController');


	//后台 执行后台用户删除
	Route::post('/admins/admins/dlt','admin\adminAdminController@zdydelete');

	//后台 执行后台用户更新
	Route::post('/admins/admins/upt','admin\adminAdminController@zdyupdate');

	//后台 后台用户控制器
	Route::resource('/admins/admins','admin\adminAdminController');


	//后台 无限级分类首页
	Route::get('/admins/type/inx','admin\adminTypeController@index');

	//后台 添加无限分类
	Route::post('/admins/type/ad','admin\adminTypeController@add');

	//后台 删除无限分类
	Route::post('/admins/type/dlt','admin\adminTypeController@delete');

	//后台 查询无限分类
	Route::get('/admins/type/slt','admin\adminTypeController@select');

	//后台 更新无限分类
	Route::post('/admins/type/upt','admin\adminTypeController@update');



	//后台 商品首页
	Route::get('/admins/good/inx','admin\adminGoodController@index');

	//后台 添加商品
	Route::post('/admins/good/ad','admin\adminGoodController@add');

	//后台 删除商品
	Route::post('/admins/good/dlt','admin\adminGoodController@delete');

	//后台 查询商品分类
	Route::get('/admins/good/slt','admin\adminGoodController@select');

	//后台 查询具体商品信息
	Route::get('/admins/good/fid','admin\adminGoodController@find');

	//后台 更新商品
	Route::post('/admins/good/upt','admin\adminGoodController@update');

	//后台 添加商品图片
	Route::get('/admins/good/pph','admin\adminGoodController@picpath');



	//后台 轮播图显示
	Route::get('/admins/lunbo/inx','admin\adminLunboController@index');

	//后台 轮播图请求数据
	Route::get('/admins/lunbo/show','admin\adminLunboController@showindex');

	//后台 执行图片的插入
	Route::get('/admins/lunbo/pph','admin\adminLunboController@add');

	//后台 执行图片的删除
	Route::post('/admins/lunbo/dlt','admin\adminLunboController@delete');



	//后台 呈递订单
	Route::get('/admins/order/inx','admin\adminOrderController@index');

	//后台 修改订单
	Route::get('/admins/order/sos','admin\adminOrderController@setstate');
});





//后台 生成加密签名
Route::get('/admins/port/sgn/{username}/{pass}','admin\adminPassportController@sign');

//后台 返回数据
Route::get('/admins/port/bkd/{bcksig}/{goodtype}','admin\adminPassportController@backdata');






//前台 呈递前台注册页面
Route::get('/home/register/inx','home\homeRegisterController@index');

//前台 添加注册用户
Route::post('/home/register/ad','home\homeRegisterController@add');

//前台 验证邮件，修改用户激活状态
Route::get('/home/register/stt/{id}/{token}','home\homeRegisterController@setstate');



//前台 登录页面
Route::get('/home/login/inx','home\homeLoginController@index');

//前台 验证用户
Route::post('/home/login/chk','home\homeLoginController@check');

//前台 生成验证码
Route::get('/home/login/cod/{tmp}','home\homeLoginController@setcode');



//前台 忘记密码 呈递输入手机号页面
Route::get('/home/findpass/inx','home\homeFindpassController@index');

//前台 检测手机号是否存在的路由
Route::post('/home/findpass/cph','home\homeFindpassController@checkphone');

//前台 呈递输入验证码、密码的页面
Route::get('/home/findpass/icp','home\homeFindpassController@inputcodepass');

//前台 处理输入的短信验证码和密码
Route::post('/home/findpass/cps','home\homeFindpassController@codepass');



//前台 呈递前台首页
Route::get('/home/index/inx','home\homeIndexController@index');



//前台 呈递前台首页跳列表页(一级分类的情况)
Route::get('/home/list/inx/{id}','home\homeListController@index');

//前台 呈递前台列表页跳列表页(一级分类的情况)
Route::get('/home/list/inxinx','home\homeListController@inxindex');

//前台 呈递前台列表页(二级分类的情况)
Route::get('/home/list/sndinx','home\homeListController@sndindex');

//前台 前台列表页排序
Route::get('/home/list/ord','home\homeListController@order');



//前台 呈递前台详情页
Route::get('/home/detail/inx/{id}','home\homeDetailController@index');



//前台路由组
Route::group(['middleware' => ['checkhomeuser']], function () {

    //前台 用户退出
	Route::get('/home/login/out','home\homeLoginController@tuichu');

	

	//前台 储存商品详情页的信息到购物车表
	Route::post('/home/car/inx','home\homeCarController@index');

	//前台 呈递购物车页面
	Route::get('/home/car/showinx','home\homeCarController@carindex');

	//前台 删除购物车本条信息
	Route::get('/home/car/delwhl','home\homeCarController@delwhole');

	//前台 加减数量 修改购物车和商品表的库存
	Route::post('/home/car/delns','home\homeCarController@delnumstore');

	//前台 直接输入 修改购物车和商品表的库存
	Route::post('/home/car/ipns','home\homeCarController@setnumstore');



	//前台 把购物车信息 提交信息给订单
	Route::post('/home/order/sto','home\homeOrderController@store');

	//前台 呈递给该订单添加地址页面
	Route::get('/home/order/inx/{id}','home\homeOrderController@index');

	//前台 订单 select框选地址
	Route::get('/home/order/ads','home\homeOrderController@findads');

	//前台 订单 添加地址
	Route::post('/home/order/adds','home\homeOrderController@addaddress');

	//前台 订单 支付页面
	Route::get('/home/order/pfo/{id}','home\homeOrderController@payfor');

	//前台 订单 支付成功
	Route::get('/home/order/pfos','home\homeOrderController@payforsuccess');



	//前台 个人中心 订单页
	Route::get('/home/center/inx','home\homeCenterController@index');

	//前台 个人中心 更改订单状态
	Route::get('/home/center/sse','home\homeCenterController@setstate');

	//前台 个人中心 物流页面
	Route::get('/home/center/wul','home\homeCenterController@wuliu');

	//前台 个人中心 传递快递单号
	Route::get('/home/center/swul','home\homeCenterController@setwuliu');

	//前台 个人中心 呈递修改密码页面
	Route::get('/home/center/srp','home\homeCenterController@resetpass');

	//前台 输入的原密码是否正确
	Route::post('/home/center/cop','home\homeCenterController@checkoldpass');

	//前台 执行密码的修改
	Route::post('/home/center/drp','home\homeCenterController@doresetpass');
});


























