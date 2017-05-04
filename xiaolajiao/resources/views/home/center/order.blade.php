
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
<meta content="" name="Keywords">
<meta content="" name="Description">
<title>用户中心</title>
<link href="favicon.ico" rel="shortcut icon">
<link type="image/x-icon" mce_href="favicon.ico" href="favicon.ico" rel="icon">
<link type="text/css" rel="stylesheet" href="http://theme.xiaolajiao.com/themes/newxlj/css/common.css?v=20161118">
<link type="text/css" rel="stylesheet" href="http://theme.xiaolajiao.com/themes/newxlj/css/all_common.css?v=20161118">
<link type="text/css" rel="stylesheet" href="http://theme.xiaolajiao.com/themes/newxlj/css/user.css?v=20161118">

</head>
<body>
<div id="nTalk_post_hiddenElement" style="left: -10px; top: -10px; visibility: hidden; display: none; width: 1px; height: 1px;"></div>
 

<div class="site-header">
<div class="site-header-relative">

    
    <a href="/home/index/inx"><div class="site-header-logo"></div></a>
    
    
        <div class="site-header-nav" style="display:none">
	<ul>
		<li>
			<a data-id="1" href="category-54-b0.html">红辣椒手机</a>
		</li>
		<li>
			<a data-id="0" href="category-1-b0.html">小辣椒手机</a>
		</li>
		<li>
			<a href="service.php">服务</a>
		</li>
		<li>
			<a href="http://bbs.xiaolajiao.com/default.php">社区</a>
		</li>
		<li>
			<a href="http://www.xiaolajiao.com/activity/buy/">分期</a>
		</li>
	</ul>
</div>        
    
    
    <div class="site-header-right">
	    <div class="site-header-search hidden">
		<form method="get" action="search.php" class="xlj-search-form clearfix" id="xlj-search">
			<input type="submit" value="" class="search-submit">
			<div class="search-input-box">
				<input type="text" name="keywords" value="" placeholder="" class="search-input">
						    </div>
		</form>
	    </div>
	    
	    
	    <div class="site-header-cart">
		<a id="minCart" href="/home/car/showinx"><i class="icon2"></i></a>
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
 
        <div class="container clearfix">
            <div id="ur_here">
 <a href=".">首页</a> <code>&gt;</code> 用户中心 
</div>
            
            <div class="user-article left">
      <div class="userMenu">
	<!-- <h3><a href="user.php">会员中心</a></h3> -->
		<div class="portal_list">
		    <div class="about_list"> 个人中心 </div>
			<ul class="about_menu">
				<li class=""><a href="user.php">我的用户中心</a></li>
				<!-- <li class=""><a href="user.php?act=reservation_list" class="reservation"> 我的预约</a></li> -->
		        <li class="dianji"><a href="/home/center/inx"> 我的订单</a></li>
		        <li><a href="/home/center/wul"> 物流查询</a></li>
			</ul>
		</div>
		<div class="portal_list">
		    <div class="about_list"> 服务中心 </div>
			<ul class="about_menu">
				<li><a href="user.php?act=replacement"> 退换货流程</a></li>
				<li><a href="user.php?act=return_goods">返修流程</a></li>
				<!--<li ><a href="user.php?act=complaints">我的投诉</a></li>-->
			</ul>
		</div>
		<div class="portal_list">
		    <div class="about_list"> 个人信息 </div>
			<ul class="about_menu">
				<li><a href="/home/center/srp">修改密码</a></li>
				<li><a href="user.php?act=address_list">收货地址</a></li>
				<li><a href="user.php?act=transform_points">我的积分</a></li>
				<li><a href="user.php?act=bonus">我的优惠券</a></li>
                <!-- <li ><a href="user.php?act=lacode">我的LA码</a></li> -->
				<li><a href="user.php?act=collection_list"> 我的收藏</a></li>
                <li><a href="user.php?act=reservation_list">我的预约</a></li>
				<li><a href="user.php?act=comment_list"> 商品评价</a></li>
			</ul>
		</div>
</div>    </div>
    

  
<div class="uo-list-section left">
<div class="row">
    <h2 class="font-size-16 color-333 border-bottom">我的订单 &nbsp;<small class="color-666">（由于数据同步可能带来订单信息及订单状态显示滞后，请稍等一会儿。）</small></h2>

	<!-- 循环每条订单 -->
	@foreach($list as $key => $value)
    <table>
        <tr>
        	<!-- 快递单号 -->
            <th colspan="3">快递单号：{{ $list[$key]['express'] }}</th>
            <!-- 快递单号 -->
        </tr>
        <tr>
            <td class="order-list-goods">

				<!-- 循环每条商品 -->
				@foreach($list[$key] as $k => $v)
				<!-- 商品名称是否设置并且名称不为空 -->
				@if(isset($list[$key][$k]['title']) && $list[$key][$k]['title'] != '')
                <ul>
                    <li class="order-list-img">
                    <!-- 商品图片是否设置 -->
                    @if(isset($list[$key][$k]['picture']))
                        <img src="{{ $list[$key][$k]['picture'] }}" width="50px">
                    @endif
                    </li>
                    <li class="order-list-title">
                    <!-- 商品名称是否设置 -->
                    @if(isset($list[$key][$k]['title']))
                        <a>{{ $list[$key][$k]['title'] }}</a>
                    @endif
                        <br>
                    <!-- 商品价格是否设置 -->
                    @if(isset($list[$key][$k]['price']))
                        {{ $list[$key][$k]['price'] }}  
                    @endif                              
                    </li>
                    <!-- 商品数量是否设置 -->
                    @if(isset($list[$key][$k]['num']))
                    <li>{{ $list[$key][$k]['num'] }}</li>
                    @endif
                </ul>
                @endif
				@endforeach
				<!-- 循环每条商品 -->
            </td>
            <td class="order-list-pay">
            	<!-- 订单总价 -->
                ￥{{ $list[$key]['total'] }}<br>  
                <!-- 订单总价 -->              
            </td>
            <td>
            	<p>
            	@if($list[$key]['state'] == 0)
            	未付款
				@elseif($list[$key]['state'] == 1)
				已付款未发货
				@elseif($list[$key]['state'] == 2)
				已付款已发货
				@elseif($list[$key]['state'] == 3)
				已付款已收货
				@endif
            	</p>
                <a orderid="{{ $list[$key]['id'] }}" orderstate="{{ $list[$key]['state'] }}" onclick="dosetstate(this)" class="URLNet btn btn-primar">

                @if($list[$key]['state'] == 0)
            	立即付款
				@elseif($list[$key]['state'] == 1)
				等待发货
				@elseif($list[$key]['state'] == 2)
				收货
				@elseif($list[$key]['state'] == 3)
				已完成
				@endif

                </a>
            </td>
        </tr>
    </table>
	@endforeach
	<!-- 循环每条订单 -->
<script type="text/javascript" src="/admin/js/jquery-1.8.3.min.js"></script>
<script>
	//修改订单状态
	function dosetstate(obj){
		var id = $(obj).attr('orderid');
		var state = $(obj).attr('orderstate');
		if(state==0 || state==2){
			$.ajax({
				url:'/home/center/sse',
				data:{'id':id,'state':state},
				type:'Get',
				success:function(event){
					if(event == 1){
						alert('付款成功');
						$(obj).attr('orderstate','1');
						$(obj).html('等待发货');
						$(obj).prev('p').html('已付款未发货');
					}else if(event == 11){
						alert('付款失败');
					}else if(event == 2){
						alert('收货成功');
						$(obj).attr('orderstate','3');
						$(obj).html('已完成');
						$(obj).prev('p').html('已付款已收货');
					}else if(event == 12){
						alert('收货失败');
					}
				},
			});
		}
	}
</script>


    <div class="border-top">&nbsp;</div>
     
	 
      
</div>
</div>
</div>
<div class="xlj-footer footer-relative clearfix">
    	<ul class="nums clearfix">
	<li>
		<a rel="nofollow" href="/article-220.html"> <span class="nums1"></span> <strong> <label>7天</label> 退货保障 </strong> </a> 
	</li>
	<li>
		<a rel="nofollow" href="/article-220.html"> <span class="nums2"></span> <strong> <label>15天</label> 换货承诺 </strong> </a> 
	</li>
	<li>
		<a rel="nofollow" href="/article-213.html"> <span class="nums3"></span> <strong> <label>49元起</label> 全场免邮费 </strong> </a> 
	</li>
	<li class="last">
		<a rel="nofollow" href="/poststation.html"> <span class="nums4"></span> <strong> <label>200余家</label> 售后服务网点 </strong> </a> 
	</li>
</ul>
<div class="footer-links clearfix">
	<dl class="col-links col-links-first">
		<dt>
			帮助中心
		</dt>
		<dd>
			<a href="/article-217.html" rel="nofollow">支付方式</a> 
		</dd>
		<dd>
			<a href="/article-213.html" rel="nofollow">配送方式</a> 
		</dd>
		<dd>
			<a href="/article-208.html" rel="nofollow">购物指南</a> 
		</dd>
	</dl>
	<dl class="col-links ">
		<dt>
			服务支持
		</dt>
		<dd>
			<a href="http://bbs.xiaolajiao.com/5.php" rel="nofollow">相关下载</a> 
		</dd>
		<dd>
			<a href="/article-220.html" rel="nofollow">售后政策</a> 
		</dd>
		<dd>
			<a href="/article-214.html" rel="nofollow">物流查询</a> 
		</dd>
	</dl>
	<dl class="col-links ">
		<dt>
			小辣椒基地
		</dt>
		<dd>
			<a href="/poststation.html" rel="nofollow">服务网点</a> 
		</dd>
		<dd>
			<a href="/authorize.php" rel="nofollow">品牌授权商</a> 
		</dd>
		<dd>
			<a href="/poststation.php?act=line" rel="nofollow">线下合作零售店</a> 
		</dd>
	</dl>
	<dl class="col-links ">
		<dt>
			关于小辣椒
		</dt>
		<dd>
			<a href="/article-205.html" rel="nofollow">加入我们</a> 
		</dd>
		<dd>
			<a href="/article-206.html" rel="nofollow">联系我们</a> 
		</dd>
		<dd>
			<a href="/article-201.html" rel="nofollow">了解小辣椒</a> 
		</dd>
	</dl>
	<dl class="col-links ">
		<dt>
			关注我们
		</dt>
		<dd>
			<a rel="nofollow" href="http://weibo.com/u/3811361823?topnav=1&amp;wvr=5&amp;topsug=1"><span class="sina"></span>新浪微博</a> 
		</dd>
		<dd class="kongjian">
			<a rel="nofollow" href="http://t.qq.com/xiaolajiaoshouji2013"><span class="qq"></span>腾讯微博</a> 
		</dd>
		<dd>
			<a rel="nofollow" href="http://bbs.xiaolajiao.com/"> <span class="bbs"></span>官方社区</a> 
		</dd>
	</dl>
	<div class="col-contact">
		<p class="phone">
			400-166-5678
		</p>
		<p>
			仅收市话费，周一至周日9:00-21:00 <br>
		</p>
<a target="_blank" href="service.php?act=contact#server-online" class="serive" rel="nofollow"><span></span>在线客服</a> 
	</div>
</div>        <div class="info ">
        	<li></li>
 &copy; <a href="http://www.xiaolajiao.com">小辣椒手机官网</a> 粤ICP证B2-20130549号 粤ICP备12053227号-3号
 <p>版权所有：深圳小辣椒通信设备有限公司 </p>
      
  <img src="http://theme.xiaolajiao.com/themes/newxlj/images/footer_img.gif?v=20161118" alt="小辣椒手机官网">
   
   </div>
   <div class="believe">
<a href="http://www.315online.com.cn/member/315130034.html" target="_blank"><img style="border:none;" src="http://theme.xiaolajiao.com/themes/newxlj/images/save.jpg?v=20161118" alt="诚信网站"></a> 

</div>
</div>


<div class="fixed-tab">
	<div onclick="javascript:NTKF.im_openInPageChat('kf_9850_1385955436328');ga('richTracker.send', 'event', 'kefu', 'click','kefu big');" class="fixed-kefu">
		<img src="themes/newxlj/images/kefu.png">
		<span>客服</span>
		<ul>
			<li onclick="javascript:NTKF.im_openInPageChat('kf_9850_1385955436328');ga('richTracker.send', 'event', 'kefu1', 'click','kefu1');">售前客服</li>
			<li onclick="javascript:NTKF.im_openInPageChat('kf_9850_1385955449629');ga('richTracker.send', 'event', 'kefu2', 'click','kefu2');">售后客服</li>
		</ul>
	</div>
	<a target="_self" href="#top" class="fixed-top"></a>
</div>



</body></html>