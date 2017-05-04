@extends('home.parent.index')


@section('metalink')
    @include('home.detail.metalink')
@endsection


@section('script')
    @include('home.detail.script')
@endsection


@section('subject')

    
    <div class="login-info-main">
        <div class="login-info-relative">
            <div class="login-info">
                <div class="login-info-icon"></div>
                <ul>
                    <li class="first"><a href="user.php?act=order_list">我的订单</a></li>
                    <li><a href="user.php?act=transform_points">我的积分</a></li>
                    <li><a href="user.php?act=bonus">我的优惠券</a></li>
                    <li class="last"><a href="http://account.xiaolajiao.com/passport.php?act=logout&callback=http%3A%2F%2Fwww.xiaolajiao.com%2Fgoods-345.html">退出登录</a></li>
                </ul>
            </div>
         </div>
    </div>
 
    <div class="xlj-cart-main" id="xlj_cart_list"></div>

<div class="site-header-nav-show nav-show" data-id="0">
	<ul>


		@foreach($good as $v)
        @if(($v->typeid==12 || $v->typeid==13) && $v->dppg==1 && $v->dpps==1 && $v->state==1)
        <li>

            <a href="/home/detail/inx/{{ $v->id }}"><img src="{{ $v->main_figure }}" /> 

                <p>

                    {{ $v->title }}

                </p>

                <span>{{ $v->nowprice }}</span>
            </a> 

        </li>
        @endif
        @endforeach



	</ul>
</div>
<div class="site-header-nav-show nav-show" data-id="1">
	<ul>

		@foreach($good as $v)
        @if(($v->typeid==9 || $v->typeid==10 || $v->typeid==11) && $v->dppg==1 && $v->dpps==1 && $v->state==1)
        <li>

            <a href="/home/detail/inx/{{ $v->id }}"><img src="{{ $v->main_figure }}" /> 

                <p>

                    {{ $v->title }}

                </p>

                <span>{{ $v->nowprice }}</span>
            </a> 

        </li>
        @endif
        @endforeach

	</ul>
</div>
<div class="site-header">
<div class="site-header-relative">
    
    <a href="/home/index/inx"><div class="site-header-logo"></div></a>
    
    
        <div class="site-header-nav">
	<ul>
		
        @foreach($type as $v)
        @if($v->id == 1)
            <li>
                <a href="/home/list/inx/{{ $v->id }}" data-id="1">{{ $v->classname }}</a>
            </li>
        @endif
        @endforeach

        @foreach($type as $v)
        @if($v->id == 2)
            <li>
                <a href="/home/list/inx/{{ $v->id }}" data-id="0">{{ $v->classname }}</a>
            </li>
        @endif
        @endforeach

        @foreach($type as $v)
        @if($v->id!=1 && $v->id!=2 && $v->xswz!=2)
            <li>
                <a href="/home/list/inx/{{ $v->id }}">{{ $v->classname }}</a>
            </li>
        @endif
        @endforeach

	</ul>
</div>        
    
    
    <div class="site-header-right">
	    <div class="site-header-search hidden">
		<form id="xlj-search" class="xlj-search-form clearfix" action="search.php" method="get">
			<input class="search-submit" type="submit" value="">
			<div class="search-input-box">
				<input class="search-input" placeholder="" type="text" value="" name="keywords" >
								<a class="search-link" href="/goods-395.html">小辣椒PLAYER</a>
				<ul>
									<li><a href="/goods-395.html">小辣椒PLAYER</a></li>
									<li><a href="/goods-407.html">小辣椒X7 全网通（金色）</a></li>
									<li><a href="/goods-391.html">小辣椒老人机K2</a></li>
								</ul>
						    </div>
		</form>
	    </div>
	    
	    
	    <div class="site-header-cart">
		<a href="/home/car/showinx" id="minCart"><i class="icon2"></i></a>
	    </div>
	    <!-- 显示登录的用户 -->
        <div class="site-header-login" id="asynlogin">
        <i class="icon3"></i>
        @if(session('homeuser'))
        <p><a href="/home/center/inx" class="user-name">{{ session('homeuser')->username }}</a>|<a href="/home/login/out" class="user-name">退出</a></p>
        @else
        <p><a href="/home/login/inx" class="user-name">登录</a>|<a href="/home/register/inx" class="user-name">注册</a></p>
        @endif
        </div>
        <!-- 显示登录的用户 -->
    </div>
    
</div>
</div>
 

 <div id="loadinfos">
  
<div class="main-box">
		<div class="main-content">
    	<div class="main-content-left">
            <div> <!-- class="bd" -->
                <ul>
                    @if($data->pictures)
                    @foreach(json_decode(\App\Http\Controllers\home\homeDetailController::setparam($data->pictures),true) as $v)
                    <li style='margin:0px;padding:0px;'> 
                        <img src="{{ $v }}" width='400' class='turnpic' style="display:none;"/><div style="width:400px;height:400px;display:none;position:relative;z-index:1000;overflow:hidden;border:1px solid orange;"><img src=""></div>
                    </li>
                    @endforeach
                    @endif
                </ul>
            </div>
	
             
            <div class="hd">
                <ul class="ulsign">
                    <li class="sign"></li>
                </ul>
            </div>
<!-- 轮播图和放大镜 -->
<script type="text/javascript" src="/admin/js/jquery-1.8.3.min.js"></script>
    <script>
        //获取所有的图片
        var turnpic = $('.turnpic');
        $(turnpic[0]).show();
        

        //生成对应个数的指示点
        for(var j = 1;j<turnpic.length;j++){
            $('.ulsign').append('<li class="sign"></li>');
        }

        //获取所有的指示点
        var sign = $('.sign');
        $(sign[0]).addClass('on');

        //轮播的方法
        var i = 1;
        function turn(){
            $(turnpic).hide();
            $(turnpic[i]).fadeIn('slow');
            $(sign).removeClass('on');
            $(sign[i]).addClass('on');
            i++;
            if(i>=turnpic.length){
                i=0;
            }
        }

        //加载页面时轮播
        var intval = setInterval(function(){

            if(turnpic.length>=2){
                turn();
            }
            
        },2000);

        //鼠标移入移出主图时，轮播和放大镜的效果
        $(turnpic).mouseover(function(ent){
            clearInterval(intval);
            $(this).next().find('img').attr('src',$(this).attr('src'));
            $(this).next().css('left',500+'px');
            $(this).next().css('top',-400+'px');
            $(this).next().fadeIn('slow');

            //主图相对坐标
            var imgx = $(this).offset().left;
            var imgy = $(this).offset().top;
            

            $(this).mousemove(function(ent){
                //鼠标相对坐标
                var entx = ent.clientX;
                var enty = ent.clientY;
                //鼠标相对图片的坐标
                var x = entx - imgx;
                var y = enty - imgy;
                //给图片定位
                $(this).next().scrollTop(2*y-200);
                $(this).next().scrollLeft(2*x-200);
            });



        }).mouseout(function(){
            $(this).next().fadeOut('slow');
            intval = setInterval(function(){

                if(turnpic.length>=2){
                    turn();
                }
                
            },2000);
        });

        //给指示点绑定鼠标移入移出事件
        $(sign).mouseover(function(){
            clearInterval(intval);
            //获取当前指示点的 键值(位置)
            var pos = $(this).prevAll().length;
            $(turnpic).hide();
            $(turnpic[pos]).fadeIn('slow');
            $(sign).removeClass('on');
            $(sign[pos]).addClass('on');
            i = pos+1;
        }).mouseout(function(){
            intval = setInterval(function(){
                if(turnpic.length>=2){
                    turn();
                }
            },2000);
        });
</script>
<!-- 轮播图和放大镜 -->
       
             
            <a class="prev" href="javascript:void(0)" style="opacity: 0.5; display: none;"></a>
            <a class="next" href="javascript:void(0)" style="opacity: 0.5; display: none;"></a>
		</div>
        @if(session('homeuser'))
            <input type="hidden" id="uinfo" value="{{ session('homeuser')->id }}">
        @endif
        <div class="main-content-right">

        
        	<h1 class="goodid" gdid="{{ $data->id }}">{{ $data->title }}</h1>
        	
            <p class="goods-info-phone">
            	<font color="red">【{{ $data->script }}】</a></font><br>            </p>

                @if($data->version)
                <div class="select-option" id="option-standard">
                    <!--版本的单击选中事件 <li class="select-on"><a href="javascript:void(0);">红辣椒Note3 Pro</a></li> -->
                	<h4>版本</h4>
                    <ul>
                        <ul>
                            @foreach(json_decode(\App\Http\Controllers\home\homeDetailController::setparam($data->version),true) as $v)
    						 <li class="version_list">{{ $v }}</li>
                            @endforeach
    		        	</ul>
                    </ul>
                </div>
                @endif            
                

                @if($data->color)
                <div class="select-option" id="option-color">
            	    <h4>颜色</h4>
                    <ul>
                        @foreach(json_decode(\App\Http\Controllers\home\homeDetailController::setparam($data->color),true) as $v)
                	    <li class="color_list">{{ $v }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif                 
            
                <div class="select-num">
            	<h4>数量</h4>
            	<a id="DelNum" href="javascript:void(0)">-</a>
                <input type="text" class="new_number" value="1" size="3" store="{{ \App\Http\Controllers\home\homeDetailController::countnum($data->id) }}">
                <a id="AddNum" href="javascript:void(0)">+</a>
                </div>


            @if($data->discount)
            <div class="select-package" id="option-package">
            	<h4>套餐及优惠</h4>
            	<ul>
                	@foreach(json_decode(\App\Http\Controllers\home\homeDetailController::setparam($data->discount),true) as $v)
                    <li class="package_list" style='width:180px;height:60px;border:1px solid #ccc;text-align:center;line-height:30px;'>{{ $v }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
        	       

            @if($data->gift)
            <div class="goods-info-premiums clearfix">
                <p>赠品：</p>
                <ul>
                    @foreach(json_decode(\App\Http\Controllers\home\homeDetailController::setparam($data->gift),true) as $v)
                    <li class="gift_list">{{ $v }}</li>
                    @endforeach
                </ul>
            </div>
            @endif   


        	
            <div class="select-buy">
            	<p class="select-buy-price" data-price="￥799.00" data-makeprice="￥899.00">
                    ￥<span>{{ $data->nowprice }}</span>
                    @if($data->oldprice)
                    <i class="old-price" id="ECS_SHOPPRICE">￥{{ $data->oldprice }}</i>
                    @endif
                </p>
                <a class="buy-btn " id="addCart" data-gid="345" data-cid="115" data-thumb="images/345_thumb_P_1460544822427.jpg" data-res="0">立即购买</a>
            </div>



        </div>
    
    
    </div>
</div>
<script>
    //版本绑定选中事件
    if($('.version_list').length>0){
        select($('.version_list'),'selectversion');
    }
    
    //颜色绑定选中事件
    if($('.color_list').length>0){
        select($('.color_list'),'selectcolor');
    }

    //套餐绑定选中事件
    if($('.package_list').length>0){
        select($('.package_list'),'selectpackage');
    }

    //版本、颜色、套餐 选中事件的方法
    function select(obj,type){
        $(obj).click(function(){
            var list = $(obj);
            for (var i = 0; i < list.length; i++) {
                $(list[i]).css('border','1px solid #ccc').removeClass(type);
            };
            $(this).css('border','1px solid red').addClass(type);
        });
    }

    //减商品数量
    $('#DelNum').click(function(){
        var num = $('.new_number').val();
        num--;
        if(num<=1){
            $('.new_number').val(1);
        }else{
            $('.new_number').val(num);
        }
    });

    //加商品数量
    $('#AddNum').click(function(){
        var num = $('.new_number').val();
        num++;
        if(num <= $('.new_number').attr('store')){
            $('.new_number').val(num);
        }else{
            $('.new_number').val($('.new_number').attr('store'));
            alert('最大库存');
        }
    });

    //直接输入商品数量的情况
    $('.new_number').blur(function(){

        var sto = parseInt($(this).attr('store'));
        var num = parseInt($(this).val());

        if(num <= 1){
            $(this).val(1);
        }else if(num > sto){
            $(this).val(sto);
            alert('最大库存');
        }else{
            $(this).val(num);
        }

    });

    //ajax提交数据到购物车
    $('#addCart').click(function(){

        //有版本 没选 显示提示信息
        var version = '';
        var version_switch = false;
        if($('.version_list').length > 0){
            if($('.selectversion').html()){
                version = $('.selectversion').html();
                version_switch = true;
            }else{
                alert('没选版本');
            }
            
        }else{
            version_switch = true;
            
        }

        //有颜色 没选 显示提示信息
        var color = '';
        var color_switch = false;
        if($('.color_list').length > 0){
            if($('.selectcolor').html()){
                color = $('.selectcolor').html();
                color_switch = true;
            }else{
                alert('没选颜色');
            }
        }else{
            color_switch = true;
        }

        //获取套餐的值
        var packg = '';
        if($('.selectpackage').html()){
            packg = $('.selectpackage').html();
        }

        //获取赠品的值
        var gift = '';
        if($('.gift_list').length>0){
            var giftlist = $('.gift_list');
            for (var i = 0; i < giftlist.length; i++) {
                gift+=$(giftlist[i]).html()+';';
            };
        }

        //获取商品数量
        var num = $('.new_number').val();

        //获取商品id
        var goodid = $('.goodid').attr('gdid');

        //获取用户ID
        if($('#uinfo').val()){
            var uid = $('#uinfo').val();
        }
        
        //发送ajax
        if(version_switch && color_switch){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url:'/home/car/inx',
                type:'Post',
                data:{'home_uid':uid,'goodid':goodid,'version':version,'color':color,'packg':packg,'gift':gift,'num':num},
                success:function(event){
                    if(event == '1'){
                        window.location.href="/home/car/showinx";
                    }else if(event == '2'){
                        alert('加入购物车失败');
                    }else{
                        window.location.href="/home/login/inx";
                    }
                },
            });
        }
    });

</script>
        


<!-- ==========================以下是参数======================= -->


	<div class="xlj-prodesc">
        <div class="goods-desc-menu">
             <ul class="hd clearfix">
                 <li class="first on"><a href="#productDetail">产品详情</a> </li>
                 <li><a href="#specifications">规格参数</a></li>
                 <li><a href="#userRating">用户评价<span>(5088)</span></a> </li>
                 <li><a href="#Service">售后服务</a></li>
                 <li><a href="#MachineAppreciate">真机图赏</a></li>
             </ul>
        </div>
        
      <div class="xlj-desc-box set-width">
      
        
        <div class="xlj-box set-width2" >
            <div class="xlj-good-desc">
                                <p>
	<a href="http://www.xiaolajiao.com/goods-437.html" target="_blank"><img alt="" src="images/placeholder.gif" class="lazy" data-original="http://image.xiaolajiao.com/images/upload/image/20170223/20170223142834_74727.jpg" /></a><a href="http://www.xiaolajiao.com/goods-432.html" target="_blank"></a><a href="http://active.xiaolajiao.com/161229/" target="_blank"></a><a href="http://active.xiaolajiao.com/161212/" target="_blank"></a><img alt="" src="images/placeholder.gif" class="lazy" data-original="http://image.xiaolajiao.com/images/upload/image/20160612/20160612165719_79375.jpg" /><img alt="" src="images/placeholder.gif" class="lazy" data-original="http://image.xiaolajiao.com/images/upload/image/20160612/20160612165719_89553.jpg" /><img alt="" src="images/placeholder.gif" class="lazy" data-original="http://image.xiaolajiao.com/images/upload/image/20160612/20160612165719_50130.jpg" /><img alt="" src="images/placeholder.gif" class="lazy" data-original="http://image.xiaolajiao.com/images/upload/image/20160612/20160612165720_69491.jpg" /><img alt="" src="images/placeholder.gif" class="lazy" data-original="http://image.xiaolajiao.com/images/upload/image/20160612/20160612165721_87280.jpg" /><img alt="" src="images/placeholder.gif" class="lazy" data-original="http://image.xiaolajiao.com/images/upload/image/20161117/20161117104833_20330.jpg" /><img alt="" src="images/placeholder.gif" class="lazy" data-original="http://image.xiaolajiao.com/images/upload/image/20160612/20160612165721_71669.jpg" /><img alt="" src="images/placeholder.gif" class="lazy" data-original="http://image.xiaolajiao.com/images/upload/image/20160612/20160612165722_71343.jpg" /><img alt="" src="images/placeholder.gif" class="lazy" data-original="http://image.xiaolajiao.com/images/upload/image/20160612/20160612165722_21257.jpg" /> 
</p>
<p>
	 
</p>
<a href="http://www.xiaolajiao.com/goods-396.html" target="_blank"><img alt="" src="images/placeholder.gif" class="lazy" data-original="http://image.xiaolajiao.com/images/upload/image/20161105/20161105144415_20790.jpg" /></a> 
<p>
	 
</p>      
            </div>
        </div>
        
        
        
        <div class="xlj-box set-width1">
                <div class="bd">
<div style="padding-top: 20px;">主机*1；数据线*1；充电头*1；用户使用手册*1；售后服务指南（带保修卡）*1；取卡针*1；
</div>
                    <div class="godds-desc-par">
                                            
                                            <table border="0" cellpadding="3" cellspacing="1" bgcolor="#dddddd" class="sp_talbe">
                        <tr>
                          <th colspan="2" bgcolor="#FFFFFF">主体</th>
                        </tr>
                                                <tr>
                          <td bgcolor="#FFFFFF" align="right" width="20%" class="f1">品牌</td>
                          <td bgcolor="#FFFFFF" align="left" width="80%">小辣椒</td>
                        </tr>
                                                <tr>
                          <td bgcolor="#FFFFFF" align="right" width="20%" class="f1">型号</td>
                          <td bgcolor="#FFFFFF" align="left" width="80%">红辣椒Note3 pro</td>
                        </tr>
                                                <tr>
                          <td bgcolor="#FFFFFF" align="right" width="20%" class="f1">上市时间</td>
                          <td bgcolor="#FFFFFF" align="left" width="80%">2016年3月</td>
                        </tr>
                                                <tr>
                          <td bgcolor="#FFFFFF" align="right" width="20%" class="f1">操作系统</td>
                          <td bgcolor="#FFFFFF" align="left" width="80%">安卓5.1</td>
                        </tr>
                                                <tr>
                          <td bgcolor="#FFFFFF" align="right" width="20%" class="f1">智能机</td>
                          <td bgcolor="#FFFFFF" align="left" width="80%">是</td>
                        </tr>
                                                <tr>
                          <td bgcolor="#FFFFFF" align="right" width="20%" class="f1">CPU型号</td>
                          <td bgcolor="#FFFFFF" align="left" width="80%">MT6753</td>
                        </tr>
                                                <tr>
                          <td bgcolor="#FFFFFF" align="right" width="20%" class="f1">CPU核数</td>
                          <td bgcolor="#FFFFFF" align="left" width="80%">八核</td>
                        </tr>
                                                <tr>
                          <td bgcolor="#FFFFFF" align="right" width="20%" class="f1">CPU频率</td>
                          <td bgcolor="#FFFFFF" align="left" width="80%">1.3GHZ</td>
                        </tr>
                                                <tr>
                          <td bgcolor="#FFFFFF" align="right" width="20%" class="f1">输入方式</td>
                          <td bgcolor="#FFFFFF" align="left" width="80%">触控</td>
                        </tr>
                                              </table>
                                            
                                            <table border="0" cellpadding="3" cellspacing="1" bgcolor="#dddddd" class="sp_talbe">
                        <tr>
                          <th colspan="2" bgcolor="#FFFFFF">网络</th>
                        </tr>
                                                <tr>
                          <td bgcolor="#FFFFFF" align="right" width="20%" class="f1">网络制式</td>
                          <td bgcolor="#FFFFFF" align="left" width="80%">移动4G/3G,联通4G/3G/2G</td>
                        </tr>
                                                <tr>
                          <td bgcolor="#FFFFFF" align="right" width="20%" class="f1">网络频率</td>
                          <td bgcolor="#FFFFFF" align="left" width="80%">TD-LTE/FDD-LTE/TD-SCDMA/WCDMA/GSM</td>
                        </tr>
                                              </table>
                                            
                                            <table border="0" cellpadding="3" cellspacing="1" bgcolor="#dddddd" class="sp_talbe">
                        <tr>
                          <th colspan="2" bgcolor="#FFFFFF">存储</th>
                        </tr>
                                                <tr>
                          <td bgcolor="#FFFFFF" align="right" width="20%" class="f1">机身内存</td>
                          <td bgcolor="#FFFFFF" align="left" width="80%">32GB ROM</td>
                        </tr>
                                                <tr>
                          <td bgcolor="#FFFFFF" align="right" width="20%" class="f1">运行内存</td>
                          <td bgcolor="#FFFFFF" align="left" width="80%">3GB RAM</td>
                        </tr>
                                                <tr>
                          <td bgcolor="#FFFFFF" align="right" width="20%" class="f1">储存卡类型</td>
                          <td bgcolor="#FFFFFF" align="left" width="80%">MicroSD(TF)</td>
                        </tr>
                                                <tr>
                          <td bgcolor="#FFFFFF" align="right" width="20%" class="f1">最大存储扩展</td>
                          <td bgcolor="#FFFFFF" align="left" width="80%">64GB</td>
                        </tr>
                                              </table>
                                            
                                            <table border="0" cellpadding="3" cellspacing="1" bgcolor="#dddddd" class="sp_talbe">
                        <tr>
                          <th colspan="2" bgcolor="#FFFFFF">显示</th>
                        </tr>
                                                <tr>
                          <td bgcolor="#FFFFFF" align="right" width="20%" class="f1">屏幕尺寸</td>
                          <td bgcolor="#FFFFFF" align="left" width="80%">5.5英寸</td>
                        </tr>
                                                <tr>
                          <td bgcolor="#FFFFFF" align="right" width="20%" class="f1">屏幕色彩</td>
                          <td bgcolor="#FFFFFF" align="left" width="80%">1600万色</td>
                        </tr>
                                                <tr>
                          <td bgcolor="#FFFFFF" align="right" width="20%" class="f1">屏幕材质</td>
                          <td bgcolor="#FFFFFF" align="left" width="80%">TFT</td>
                        </tr>
                                                <tr>
                          <td bgcolor="#FFFFFF" align="right" width="20%" class="f1">分辨率</td>
                          <td bgcolor="#FFFFFF" align="left" width="80%">1920×1080（FHD，1080P）</td>
                        </tr>
                                                <tr>
                          <td bgcolor="#FFFFFF" align="right" width="20%" class="f1">触摸屏</td>
                          <td bgcolor="#FFFFFF" align="left" width="80%">电容屏，多点触控</td>
                        </tr>
                                                <tr>
                          <td bgcolor="#FFFFFF" align="right" width="20%" class="f1">重力感应</td>
                          <td bgcolor="#FFFFFF" align="left" width="80%">支持</td>
                        </tr>
                                                <tr>
                          <td bgcolor="#FFFFFF" align="right" width="20%" class="f1">光线传感器</td>
                          <td bgcolor="#FFFFFF" align="left" width="80%">支持</td>
                        </tr>
                                                <tr>
                          <td bgcolor="#FFFFFF" align="right" width="20%" class="f1">距离感应</td>
                          <td bgcolor="#FFFFFF" align="left" width="80%">支持</td>
                        </tr>
                                              </table>
                                            
                                            <table border="0" cellpadding="3" cellspacing="1" bgcolor="#dddddd" class="sp_talbe">
                        <tr>
                          <th colspan="2" bgcolor="#FFFFFF">娱乐功能</th>
                        </tr>
                                                <tr>
                          <td bgcolor="#FFFFFF" align="right" width="20%" class="f1">音乐播放</td>
                          <td bgcolor="#FFFFFF" align="left" width="80%">支持</td>
                        </tr>
                                                <tr>
                          <td bgcolor="#FFFFFF" align="right" width="20%" class="f1">视频播放</td>
                          <td bgcolor="#FFFFFF" align="left" width="80%">支持</td>
                        </tr>
                                                <tr>
                          <td bgcolor="#FFFFFF" align="right" width="20%" class="f1">收音机</td>
                          <td bgcolor="#FFFFFF" align="left" width="80%">支持</td>
                        </tr>
                                              </table>
                                            
                                            <table border="0" cellpadding="3" cellspacing="1" bgcolor="#dddddd" class="sp_talbe">
                        <tr>
                          <th colspan="2" bgcolor="#FFFFFF">摄像功能</th>
                        </tr>
                                                <tr>
                          <td bgcolor="#FFFFFF" align="right" width="20%" class="f1">前置摄像头</td>
                          <td bgcolor="#FFFFFF" align="left" width="80%">500万像素</td>
                        </tr>
                                                <tr>
                          <td bgcolor="#FFFFFF" align="right" width="20%" class="f1">后置摄像头</td>
                          <td bgcolor="#FFFFFF" align="left" width="80%">1300万像素</td>
                        </tr>
                                                <tr>
                          <td bgcolor="#FFFFFF" align="right" width="20%" class="f1">传感器类型</td>
                          <td bgcolor="#FFFFFF" align="left" width="80%">CMOS</td>
                        </tr>
                                                <tr>
                          <td bgcolor="#FFFFFF" align="right" width="20%" class="f1">闪光灯</td>
                          <td bgcolor="#FFFFFF" align="left" width="80%">LED补光灯</td>
                        </tr>
                                                <tr>
                          <td bgcolor="#FFFFFF" align="right" width="20%" class="f1">自动对焦</td>
                          <td bgcolor="#FFFFFF" align="left" width="80%">支持</td>
                        </tr>
                                              </table>
                                            
                                            <table border="0" cellpadding="3" cellspacing="1" bgcolor="#dddddd" class="sp_talbe">
                        <tr>
                          <th colspan="2" bgcolor="#FFFFFF">传输功能</th>
                        </tr>
                                                <tr>
                          <td bgcolor="#FFFFFF" align="right" width="20%" class="f1">Wi-Fi</td>
                          <td bgcolor="#FFFFFF" align="left" width="80%">支持</td>
                        </tr>
                                                <tr>
                          <td bgcolor="#FFFFFF" align="right" width="20%" class="f1">GPS</td>
                          <td bgcolor="#FFFFFF" align="left" width="80%">支持</td>
                        </tr>
                                                <tr>
                          <td bgcolor="#FFFFFF" align="right" width="20%" class="f1">蓝牙</td>
                          <td bgcolor="#FFFFFF" align="left" width="80%">支持</td>
                        </tr>
                                              </table>
                                            
                                            
                                            <table border="0" cellpadding="3" cellspacing="1" bgcolor="#dddddd" class="sp_talbe">
                        <tr>
                          <th colspan="2" bgcolor="#FFFFFF">其他</th>
                        </tr>
                                                <tr>
                          <td bgcolor="#FFFFFF" align="right" width="20%" class="f1">SIM卡尺寸</td>
                          <td bgcolor="#FFFFFF" align="left" width="80%">小卡+小卡</td>
                        </tr>
                                                <tr>
                          <td bgcolor="#FFFFFF" align="right" width="20%" class="f1">电池类型</td>
                          <td bgcolor="#FFFFFF" align="left" width="80%">聚合物</td>
                        </tr>
                                                <tr>
                          <td bgcolor="#FFFFFF" align="right" width="20%" class="f1">电池容量</td>
                          <td bgcolor="#FFFFFF" align="left" width="80%">2800mAh</td>
                        </tr>
                                                <tr>
                          <td bgcolor="#FFFFFF" align="right" width="20%" class="f1">电池更换</td>
                          <td bgcolor="#FFFFFF" align="left" width="80%">不支持</td>
                        </tr>
                                                <tr>
                          <td bgcolor="#FFFFFF" align="right" width="20%" class="f1">数据线</td>
                          <td bgcolor="#FFFFFF" align="left" width="80%">Micro USB</td>
                        </tr>
                                                <tr>
                          <td bgcolor="#FFFFFF" align="right" width="20%" class="f1">耳机插孔</td>
                          <td bgcolor="#FFFFFF" align="left" width="80%">3.5mm</td>
                        </tr>
                                                <tr>
                          <td bgcolor="#FFFFFF" align="right" width="20%" class="f1">机身尺寸</td>
                          <td bgcolor="#FFFFFF" align="left" width="80%">151.8*76.2*7.9mm</td>
                        </tr>
                                                <tr>
                          <td bgcolor="#FFFFFF" align="right" width="20%" class="f1">机身材质</td>
                          <td bgcolor="#FFFFFF" align="left" width="80%">146g</td>
                        </tr>
                                              </table>
                          
                    </div>
                </div>
        </div>
        
         
         
        <div class="xlj-box set-width1" id="UserEvaluation">
        
            <div class="bd">
                 <div class="goods-percent-list">
                    <div class="goods-percent">
                        <ul id="AllPercent" class="clearfix ">
                                                <li><div class="user-precent-left">
                <img class="np-avatar" src="other/avatar.php" alt="头像">
                <span>158xlj88569745</span></div>
                <div class="user-precent-right"><div class="user-precent-header"><span class="user-date right">2016-11-16 19:35:22</span></div>
                  <div class="user-precent-content"><p>很不错，使用非常顺畅，无论外观和性能，都不逊色千元以上手机，这个手机买的还是很值的</p><dd class="pro_show"><div class="thumb_box clearfix"><ul class="clearfix"><li data-tpc="SHINE"><img src="images/1479469111948170263-46x46.jpg" width="46" height="46" /><i class="alpha_bg" style="top: 40px;"></i></li></ul></div><div class="pic_box"><div class="pic"><ul class="clearfix"><li><img src="images/1479469111948170263-430x300.jpg" /></li></ul><div class="zoom alpha_bg"></div></div><a href="javascript:;" class="btn_prev"></a><a href="javascript:;" class="btn_next"></a></div></dd></div></div></li><li><div class="user-precent-left">
                <img class="np-avatar" src="other/avatar.php" alt="头像">
                <span>阿奎罗88</span></div>
                <div class="user-precent-right"><div class="user-precent-header"><span class="user-date right">2016-11-07 10:03:33</span></div>
                  <div class="user-precent-content"><p>像素很好，刚迎来了小生命，特意买了用来记录小宝贝的点滴成长！</p></div></div></li><li><div class="user-precent-left">
                <img class="np-avatar" src="other/avatar.php" alt="头像">
                <span>5413616513</span></div>
                <div class="user-precent-right"><div class="user-precent-header"><span class="user-date right">2016-11-03 22:50:49</span></div>
                  <div class="user-precent-content"><p>手机外观很好看，电池也很耐用特意买给爸妈的，当作礼物送爸妈很开心，两老用的也很满意。</p></div></div></li><li><div class="user-precent-left">
                <img class="np-avatar" src="other/avatar.php" alt="头像">
                <span>158xlj4545321546</span></div>
                <div class="user-precent-right"><div class="user-precent-header"><span class="user-date right">2016-11-02 17:43:10</span></div>
                  <div class="user-precent-content"><p>宝贝收到了，包装很严实，拆开检查后很满意，手感很好，质量不错，超出期望，好评。</p></div></div></li><li><div class="user-precent-left">
                <img class="np-avatar" src="other/avatar.php" alt="头像">
                <span>嘻哈545</span></div>
                <div class="user-precent-right"><div class="user-precent-header"><span class="user-date right">2016-11-01 15:34:24</span></div>
                  <div class="user-precent-content"><p>速度很快，屏幕色彩很好，电池容量也足够</p></div></div></li>                                                </ul>
                    </div>
                
                                        <div class="more">查看更多评论&gt;&gt;</div>
                    <input name="more_num" type="hidden" id="more_num" value="5" />
                    <input name="comment_type" type="hidden" id="comment_type" value="0" />
                                        <div class="consulting">
                     <form action="" method="post" name="consultForm" id="consultForm" enctype="multipart/form-data">
                      <input name="comment_goodsId" type="hidden" id="comment_goodsId" value="345" />
                            <table>
                                <tr>
                                    <td class="table-left">标签：</td>
                                    <td>
                                        <ul class="user-label">
                                                                                    <li id="CustomLabel" data-sum="0"><i></i>自定义</li>
                                            <li id="CustomSubmit">提交</li>
                                        </ul>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="table-left">图片：</td>
                                    <td>
                                    <ul class="img-list">
                                      <li class="upload-btn" id="oneImgIN">
                                       <a href="javascript:void(0);" class="file">添加图片<input type="file" id="oneImgUp" name="uploadImg[]" /></a>
                                      </li>
                                      <li id="oneImg" style="display:none;">
                                         <img id="oneImgShow" />
                                         <div class="del hide"><em value="删除">X</em></div>
                                      </li>
                                      <li class="upload-btn" id="twoImgIN">
                                       <a href="javascript:void(0);" class="file">添加图片<input type="file" id="twoImgUp" name="uploadImg[]" /></a>
                                      </li>
                                      <li id="twoImg" style="display:none;">
                                         <img id="twoImgShow" />
                                         <div class="del hide"><em value="删除">X</em></div>
                                      </li>
                                      <li class="upload-btn" id="threeImgIN">
                                       <a href="javascript:void(0);" class="file">添加图片<input type="file" id="threeImgUp" name="uploadImg[]" /></a>
                                      </li>
                                      <li id="threeImg" style="display:none;">
                                         <img id="threeImgShow" />
                                         <div class="del hide"><em value="删除">X</em></div>
                                      </li>
                                      <li class="upload-btn" id="fourImgIN">
                                       <a href="javascript:void(0);" class="file">添加图片<input type="file" id="fourImgUp" name="uploadImg[]" /></a>
                                      </li>
                                      <li id="fourImg" style="display:none;">
                                         <img id="fourImgShow" />
                                         <div class="del hide"><em value="删除">X</em></div>
                                      </li>
                                      <li class="upload-btn" id="fiveImgIN">
                                       <a href="javascript:void(0);" class="file">添加图片<input type="file" id="fiveImgUp" name="uploadImg[]" /></a>
                                      </li>
                                      <li id="fiveImg" style="display:none;">
                                         <img id="fiveImgShow" />
                                         <div class="del hide"><em value="删除">X</em></div>
                                      </li>
                                     </ul>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="table-left">心得：</td>
                                    <td><textarea name="content" id="ConsultContent" maxlength="300" ></textarea></td>
                                    
                                </tr>
                                 <tr>
                                    <td></td>
                                    <td><input class="submit" type="submit" name="submit" id="ContentSub" value="提交评论" data-val="0" /></td>
                                </tr>
                            </table>
                      </form>
                  </div>
                 </div>
            </div>
        </div>
        
         
         
        <div class="xlj-box set-width1" id="GoodsService">
           <div class="hd goods-service">
	<h2>
		小辣椒承诺
	</h2>
	<p class="img">
		<img alt="" src="images/20140823153406_33447.jpg" /> 
	</p>
</div>
<div class="hd goods-service">
	<h2>
		关于物流
	</h2>
	<p class="img">
		<img alt="" class="lazy" data-original="http://image.xiaolajiao.com/images/upload/image/20140823/20140823153351_15134.jpg" /> 
	</p>
</div>
<div class="hd goods-service">
	<h2>
		关于发票
	</h2>
	<p class="img">
		<img alt="" class="lazy" data-original="http://image.xiaolajiao.com/images/upload/image/20140823/20140823153240_30608.jpg" /> 
	</p>
</div>
<div class="hd goods-service">
	<h2>
		关于小辣椒
	</h2>
	<p>
		小辣椒成立于2012年2月，小辣椒智能手机是深圳语信时代通信设备有限公司旗下的互联网手机品牌。小辣椒为每一款手机配置全球一流的移动技术与品牌元器件，用互联网销售方式，打造最具性价比和国际品质的智能手机。小辣椒以独有的"挑战"精神，专为渴望不平凡、不甘心平淡、充满激情、坚持梦想、积极乐观、敢于挑战的群体而生，助力他们挑战梦想、绽放青春、创造非凡！
	</p>
	<p class="img">
		<img alt="" class="lazy" data-original="http://image.xiaolajiao.com/images/upload/image/20140823/20140823153219_40226.jpg" /> 
	</p>
</div> 
        </div>
        
        
        
          
        <div class="xlj-box set-width2" id="MachineAppreciate"> 
        	<div class="xlj-good-desc">
         		<img alt="" src="images/placeholder.gif" class="lazy" data-original="http://image.xiaolajiao.com/images/upload/image/20160128/20160128191351_85783.jpg" /><img alt="" src="images/placeholder.gif" class="lazy" data-original="http://image.xiaolajiao.com/images/upload/image/20160128/20160128191351_92377.jpg" /><img alt="" src="images/placeholder.gif" class="lazy" data-original="http://image.xiaolajiao.com/images/upload/image/20160128/20160128191352_55367.jpg" /><img alt="" src="images/placeholder.gif" class="lazy" data-original="http://image.xiaolajiao.com/images/upload/image/20160304/20160304133949_80878.jpg" /> <a href="http://www.xiaolajiao.com/goods-257.html"></a> 
         	</div>
        </div>
          	
        
      </div>
  </div>
<div class="blank"></div>
    <div id="goodsSubBar" class="goods-sub-bar " style=" display:none">
        <div class="block">
            <div class="row">
                <div class="span3">
                    <dl class="goods-sub-bar-info clearfix">
                        <dt>
                        <img src="images/345_thumb_P_1460544822427.jpg">
                                            </dt>
                        <dd>
                            <strong>红辣椒Note3 Pro</strong>
                            <p>
                                <em>￥899.00</em>
                            </p>
                        </dd>
                    </dl>
                </div>
                <div class="span12">
                    <div class="fr">
                                                                                                                 <a class="btn_fp " id="addCart2" href="javascript:void(0);" data-gid="345" data-cid="115" data-thumb="images/345_thumb_P_1460544822427.jpg" data-res="0" data-effect="0">
                                                                      立即购买
                                                                      </a>
                                                                                                    </div>
                    <div id="goodsSubMenu" class="godds-desc-menu">
                        <ul class="clearfix">
                            <li class="first"><a href="#productDetail">产品详情</a> </li>
                            <li><a href="#specifications">规格参数</a></li>
                            <li><a href="#userRating">用户评价<span>(5088)</span></a> </li>
                            <li><a href="#Service">售后服务</a></li>
                            <li><a href="#MachineAppreciate">真机图赏</a></li>
                       </ul>
                    </div>
                </div>
            </div>
        </div>
    </div> 
</div> </div>
 
 <div id="dialog-modal" style="display: none"></div>

@endsection

 