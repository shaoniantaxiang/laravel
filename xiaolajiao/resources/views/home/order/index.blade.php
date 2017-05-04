@extends('home.parent.index')

@section('metalink')
	@include('home.order.metalink')
@endsection




@section('subject')
<div id="nTalk_post_hiddenElement" style="left: -10px; top: -10px; visibility: hidden; display: none; width: 1px; height: 1px;">
	
</div>
    
    <div class="login-info-main">
        <div class="login-info-relative">
            <div class="login-info">
                <div class="login-info-icon"></div>
                <ul>
                    <li class="first"><a href="user.php?act=order_list">我的订单</a></li>
                    <li><a href="user.php?act=transform_points">我的积分</a></li>
                    <li><a href="user.php?act=bonus">我的优惠券</a></li>
                    <li class="last"><a href="http://account.xiaolajiao.com/passport.php?act=logout&amp;callback=http%3A%2F%2Fwww.xiaolajiao.com%2Fflow.php%3Fstep%3Dcheckout">退出登录</a></li>
                </ul>
            </div>
         </div>
    </div>
 
    <div id="xlj_cart_list" class="xlj-cart-main"><div class="xlj-cart-relative">
    <div class="xlj-cart-list">
	<div class="login-info-icon"></div>
		
	<div id="ECS_CARTINFO" class="xlj-cart-list-on">
	    <ul>
						<li>
		    <div class="xlj-cart-list-on-img"><a href="goods-432.html"><img src="http://image.xiaolajiao.com/images/201702/thumb_img/432_thumb_P_1486976698059.jpg?v=20161118" alt="小辣椒K1C 电信版（白色）"></a></div>
		    <div class="xlj-cart-list-on-one">
			<a title="小辣椒K1C 电信版（白色）" href="goods-432.html" class="xlj-cart-list-on-name">小辣椒K1C 电信版（白色）</a>
			<p class="xlj-cart-list-on-price">￥399.00<span>X1</span></p>
		    </div>
		    <div class="xlj-cart-list-on-two">
						<p class="xlj-cart-list-on-color">颜色:白色 
</p>
									<a data-gid="931813" href="javascript:void(0);" class="xlj-cart-list-on-icon">✖ </a>
					    </div>
		</li>
								<li>
		    <div class="xlj-cart-list-on-img"><a href="goods-437.html"><img src="http://image.xiaolajiao.com/images/201703/thumb_img/437_thumb_P_1489484593466.jpg?v=20161118" alt="红辣椒Note4X"></a></div>
		    <div class="xlj-cart-list-on-one">
			<a title="红辣椒Note4X" href="goods-437.html" class="xlj-cart-list-on-name">红辣椒Note4X</a>
			<p class="xlj-cart-list-on-price">￥799.00<span>X1</span></p>
		    </div>
		    <div class="xlj-cart-list-on-two">
						<p class="xlj-cart-list-on-color">颜色:玫瑰金 
</p>
									<a data-gid="931808" href="javascript:void(0);" class="xlj-cart-list-on-icon">✖ </a>
					    </div>
		</li>
					    </ul>
		
	    <div class="xlj-cart-list-on-buy">
		<p>合计：<br><span>￥1198.00元</span></p>
		<a href="flow.php?step=checkout">去结账</a>
	    </div>
	    
	</div>
	
	
	    </div>
</div></div>


<div data-id="0" class="site-header-nav-show nav-show">
	<ul>
		<li>
			<a href="http://www.xiaolajiao.com/goods-432.html"><img src="http://image.xiaolajiao.com/images/upload/image/20170213/20170213173430_21016.png"> 
			<p>
				小辣椒K1C(电信版)
			</p>
<span>¥399</span> </a> 
		</li>
		<li>
			<a href="http://www.xiaolajiao.com/goods-391.html"><img src="http://image.xiaolajiao.com/images/upload/image/20170206/20170206114957_30729.png"> 
			<p>
				小辣椒老人机K2
			</p>
<span>¥459</span> </a> 
		</li>
		<li>
			<a href="http://www.xiaolajiao.com/goods-395.html"><img src="http://image.xiaolajiao.com/images/upload/image/20170210/20170210135612_45031.png"> 
			<p>
				小辣椒PLAYER
			</p>
<span>¥1599</span> </a> 
		</li>
		<li>
			<a href="http://www.xiaolajiao.com/goods-389.html"><img src="http://image.xiaolajiao.com/images/upload/image/20170306/20170306173342_72201.png"> 
			<p>
				小辣椒S33
			</p>
<span>¥1199</span> </a> 
		</li>
		<li>
			<a href="http://www.xiaolajiao.com/goods-414.html"><img src="http://image.xiaolajiao.com/images/upload/image/20161223/20161223103704_22100.png"> 
			<p>
				小辣椒S35
			</p>
<span>¥1599</span> </a> 
		</li>
		<li>
			<a href="http://www.xiaolajiao.com/goods-429.html"><img src="http://image.xiaolajiao.com/images/upload/image/20170221/20170221115442_42920.png"> 
			<p>
				小辣椒S7
			</p>
<span>¥999</span> </a> 
		</li>
	</ul>
</div>
<div data-id="1" class="site-header-nav-show nav-show">
	<ul>
		<li>
			<a href="http://www.xiaolajiao.com/goods-437.html"><img src="http://image.xiaolajiao.com/images/upload/image/20170313/20170313190416_46998.png"> 
			<p>
				红辣椒note4X
			</p>
<span>¥799</span> </a> 
		</li>
		<li>
			<a href="http://www.xiaolajiao.com/goods-423.html"><img src="http://image.xiaolajiao.com/images/upload/image/20161220/20161220105008_87653.png"> 
			<p>
				红辣椒note5
			</p>
<span>¥1199</span> </a> 
		</li>
		<li>
			<a href="http://www.xiaolajiao.com/goods-454.html"><img align="" width="138" height="155" alt="" title="" src="http://image.xiaolajiao.com/images/upload/image/20170420/20170420104247_90947.png"> 
			<p>
				红辣椒Q6
			</p>
<span>¥399</span> </a> 
		</li>
		<li>
			<a href="http://www.xiaolajiao.com/goods-329.html"><img src="http://image.xiaolajiao.com/images/upload/image/20170121/20170121105122_18832.png"> 
			<p>
				红辣椒Note3
			</p>
<span>¥599</span> </a> 
		</li>
		<li>
			<a href="http://www.xiaolajiao.com/goods-345.html"><img src="http://image.xiaolajiao.com/images/upload/image/20170218/20170218115857_18312.png"> 
			<p>
				红辣椒Note3 Pro
			</p>
<span>¥799</span> </a> 
		</li>
		<li>
			<a href="http://www.xiaolajiao.com/goods-348.html"><img src="http://image.xiaolajiao.com/images/upload/image/20170122/20170122172838_79194.png"> 
			<p>
				红辣椒经典一代
			</p>
<span>¥499</span> </a> 
		</li>
	</ul>
</div>

<div class="site-header">
<div class="site-header-relative">

    
    <a href="/home/index/inx"><div class="site-header-logo"></div></a>
    
    
        
    
    
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
     <div class="navbar step-two">
            <span>1 我的购物车</span>
            <span class="on">2 填写核对订单信息</span>
            <span>3 成功提交订单</span>
     </div>
     <div class="checkout-box">
       <form id="theForm" name="theForm" method="post" action="flow.php">
        <div class="checkout-box-bd">
	         
         <div class="xlj-box">
             <div class="box-hd ">
                 <h2 class="title">收货地址</h2>
             </div>
             <div class="box-bd">
                 <div id="checkoutAddrList" class="clearfix xlj-address-list">
                     <div data-type="checkout" id="AddNewAddre" class="item use-new-addr">
                         <span class="icon-add"></span>添加新地址
                     </div>
                 </div>
             </div>
            </div>
     
	 	          <div id="checkoutPayment">
             
             <div class="xlj-box">
                 <div class="box-hd ">
                     <h2 class="title">支付方式</h2>
                 </div>
                 <div class="box-bd-chekout">
                    <p>在线支付</p>
                     <input type="hidden" checked="checked" value="0" name="payment">
                 </div>
             </div>
             
                          <div class="xlj-box">
                 <div class="box-hd ">
                     <h2 class="title">配送方式<span style="color:#666; font-size: 14px; padding-left: 10px; font-weight: normal ">（快递不能到达地区默认发EMS）</span></h2>
                 </div>
                 <div class="box-bd-chekout">
                   <ul class="checkout-shipment-list clearfix" id="checkoutShipmentList">
                                             <label style="display:none;" for="ECS_NEEDINSURE">
                            <input type="checkbox" disabled="true" value="1" onclick="selectInsure(this.checked)" id="ECS_NEEDINSURE" name="need_insure">
                            配送是否需要保价 
                        </label>
                     </ul>
                 </div>
             </div>
                          
         </div>
         
                  <div class="xlj-box">
             <div class="box-hd">
                 <h2 class="title">最佳送货时间</h2>
             </div>
             <div class="box-bd-chekout">
                 <ul class="checkout-besttime-list  clearfix">
                     <li class="item"><input type="radio" id="best_time_0" value="不限送货时间（周一至周日）" name="best_time" checked="checked"><label for="best_time_0">不限送货时间<span>（周一至周日）</span></label></li>
                     <li class="item "><input type="radio" id="best_time_1" value="工作日送货（周一至周五）" name="best_time"><label for="best_time_1">工作日送货<span>（周一至周五）</span></label></li>
                     <li class="item "><input type="radio" id="best_time_2" value="双休日、假日送货（周六至周日）" name="best_time"><label for="best_time_2">双休日、假日送货<span>（周六至周日）</span></label></li>
                 </ul>
             </div>
         </div>
			         
         
                  <div class="xlj-box ">
             <div class="box-hd">
                 <h2 class="title">发票信息</h2>
             </div>
             <div class="box-bd-chekout">
                 <ul class="checkout-invoice-list  clearfix">

                     <li class="item">
                        <input type="radio" checked="checked" id="noInvoice" name="need_inv" value="0">
                         <label for="noInvoice">不开发票</label>&nbsp;&nbsp;&nbsp;&nbsp;
                         <input type="radio" id="Invoice" name="need_inv" value="1">
                         <label for="Invoice">普通发票</label>
                     </li>
                     <li style="display: none" class="item">
                            发票抬头：<input type="radio" checked="checked" id="Personal" name="inv_payee" value="个人">
                            <label for="Personal">个人</label>&nbsp;&nbsp;&nbsp;&nbsp;
                            <input type="radio" id="Company" name="inv_payee" value="单位">
                            <label for="Company">公司</label><span>（请确认单位名称正确,以免因名称错误耽搁您的报销）</span>

                     </li>
                     <li style="display: none" id="CompanyName" class="item ">
                         单位名称：<input type="text" name="inv_payee_info">
                     </li>
                     <li style="display: none; position: relative">
                         发票内容：发票内容为您购买商品的明细
                         <input type="hidden" value="商品明细" name="inv_content">
                     </li>
                 </ul>

             </div>
         </div>
                  
     </div>
            <div class="checkout-box-ft clearfix">
         
         <div class="checkout-goods-box" id="checkoutGoodsList">
             <div class="xlj-box">
                 <div class="box-hd">
                     <h2 class="title">商品信息</h2>
                 </div>
                 <div class="box-bd-chekout">
                     <table cellspacing="0" cellpadding="0" class="checkout-goods-list">
                        <thead>
	                        <tr>
	                            <th class="col-1">商品名称</th>
	                            <th class="col-2">价格</th>
	                            <th class="col-2">购买数量</th>
	                            <th class="col-2">小计</th>
	                        </tr>
                        </thead>
                        <tbody>
                        	@foreach($data as $v)
                            <tr>
                                <td class="col-1">{{ $v['title'] }}</td>
                                <td class="col-2">￥{{ $v['price'] }}元</td>
                                <td class="col-2">{{ $v['num'] }}</td>
                                <td class="col-2">￥{{ $v['price']*$v['num'] }}元</td>
								
                            </tr>
                            @endforeach

                            @foreach($newpackg as $v)
                            @if($v != '')
                            <tr>
                                <td class="col-1">{{ $v }}</td>
                                <td class="col-2">￥0元</td>
                                <td class="col-2">1</td>
                                <td class="col-2">￥0元</td>
                            </tr>
                            @endif
                            @endforeach

							@foreach($newgift as $v)
                            @if($v != '')
                            <tr>
                                <td class="col-1">{{ $v }}</td>
                                <td class="col-2">￥0元</td>
                                <td class="col-2">1</td>
                                <td class="col-2">￥0元</td>
                            </tr>
							@endif
                            @endforeach
                        </tbody>
                     </table>
                     <div class="checkout-count clearfix">
                          <div class="checkout-count-extend">
                             <div class="count-radio">
                                 <input type="checkbox" id="Coupons"><label for="Coupons">使用优惠券</label>
                             </div>
                              <div style="display: none;">
                                  <div class="hd">
                                      <ul><li class="on">填写优惠券号码</li><li>查看我账户中的优惠券</li></ul>
                                  </div>
                                  <div class="bdc">
                                      <div class="coupons-box">
                                      <input type="hidden" value="21,73,48,72,76,80,86,87,88,90,91,92,93,94,95,105,106,107,108,109,110,111,114,115,116,117,118,119,120,121,128,129,130,131,135,136,138,139,140,141,142,145,146,147,148,149,150,151,152,156,155,157,158,159,160,161,162,163,164,165,166,167,168,170,171,172,173,174,175,176,177" name="bonus_type_ids">
                                              <table>
                                                  <tbody><tr><td><input type="text" name="bonus_sn" class="coupnosnumber"></td> </tr>
                                                  <tr><td><input type="button" value="取消" class="reset">
                                                          <a href="javascript:void(0)" class=" submit">使用优惠券</a></td> </tr>
                                              </tbody></table>

                                      </div>
                                      <div class="coupons-box" style="display: none;">
                                              <table>
                                                  <tbody><tr><td>
                                                     <div class="select-outer">
                                                        <div class="select-inner">
                                                <select class="select" id="ECS_BONUS" onchange="changeBonus(this.value)" name="bonus">
                                                  <option selected="" value="0">请选择优惠券</option>
                                                                                                  </select>
                                                 </div>
                                                 </div>
                                                      </td> </tr>
                                              </tbody></table>

                                      </div>
                                  </div>
                              </div>
                          </div>
                          <div id="checkout-price" class="checkout-price">
                         <ul>
          <li>
         9件
     </li>
          <li>
         金额合计：￥{{ $newtotal }}元
     </li>
     <li>
         优惠抵扣：-￥0.00元
     </li>
     <li>
         运费：￥0.00元
     </li>
                                         <li>
         总计：<strong id="totalPrice">￥{{ $newtotal }}元</strong>
     </li>
 </ul>                         </div>
                     </div>
                    </div>
		                  <div id="chechout_address_bottom" class="check-address clearfix">
                                      </div>
		            </div>
        </div>
         
     </div>
            <div class="go-next clearfix">
                
                <a data-val="0" id="orderNow" orderid="{{ $id }}" class="btn btn-primary">立即下单</a>
            </div>
            <input type="hidden" value="done" name="step">
            <input type="hidden" value="1493260963137851366" name="repeat_time">
        </form>
     </div>
</div>


<div id="adddiv" style="width:100%;height:100%;position:fixed;display:none;background:black;"> <!-- display: none; -->
	<div id="subdiv" class="ui-dialog ui-widget ui-widget-content ui-corner-all ui-front ui-draggable ui-resizable" style="position: relative; height: auto; width: 512px; top: -1700px; left: 0.5px;" tabindex="-1" role="dialog" aria-describedby="dialog-modal" aria-labelledby="ui-id-1"><div class="ui-dialog-titlebar ui-widget-header ui-corner-all ui-helper-clearfix"><span id="ui-id-1" class="ui-dialog-title">收货地址</span><button class="ui-button ui-widget ui-state-default ui-corner-all ui-button-icon-only ui-dialog-titlebar-close" role="button" aria-disabled="false" title="close"><span class="ui-button-icon-primary ui-icon ui-icon-closethick"></span><span class="ui-button-text">close</span></button></div><div style="width: auto; min-height: 0px; max-height: none; height: 360px;" id="dialog-modal" class="ui-dialog-content ui-widget-content"> 
	 <div id="AddrBackdrop" class="xlj-edit-addr-backdrop"></div>
	 <div id="editAddrBox" class="xlj-edit-addr-box">
	 <form onsubmit="return checkConsignee(this)" name="theFormAddress" method="post" action="user.php">
	     <div class="bd">
	         <div class="item">
	             <label>收货人姓名</label><input type="text" value="" autocomplete="off" maxlength="15" placeholder="收货人姓名" class="input" id="Consignee" name="consignee">
	         </div>
	         <div class="item">
	             <label>联系电话</label><input type="text" value="" autocomplete="off" placeholder="11位手机号" id="Telephone" class="input" name="mobile">
	        </div>
	         <div class="item">
	             <select style="display:none;" id="selCountries_0" name="country">
	             <option value="1"></option>
	             </select>
	            <select class="select-address" onchange="region.changed(this, 2, 'selCities_0')" id="selProvinces_0" name="province">
	            	<option value="0">请选择省</option>
                    <option value="1">北京</option>
                    <option value="2">天津</option>
                    <option value="3">河北</option>
                    <option value="4">山西</option>
                    <option value="5">内蒙</option>
                    <option value="6">辽宁</option>
                    <option value="7">吉林</option>
                    <option value="8">黑龙江</option>
                    <option value="9">上海</option>
                    <option value="10">江苏</option>
                    <option value="11">浙江</option>
                    <option value="12">安徽</option>
                    <option value="13">福建</option>
                    <option value="14">江西</option>
                    <option value="15">山东</option>
                    <option value="16">河南</option>
                    <option value="17">湖北</option>
                    <option value="18">湖南</option>
                    <option value="19">广东</option>
                    <option value="20">广西</option>
                    <option value="21">海南</option>
                    <option value="22">重庆</option>
                    <option value="23">四川</option>
                    <option value="24">贵州</option>
                    <option value="25">云南</option>
                    <option value="26">西藏</option>
                    <option value="27">陕西</option>
                    <option value="28">甘肃</option>
                    <option value="29">青海</option>
                    <option value="30">宁夏</option>
                    <option value="31">新疆</option>
                    <option value="32">台湾</option>
                    <option value="33">香港</option>
                    <option value="34">澳门</option>
                    <option value="35">海外</option>
                    <option value="36">其他</option>
	            </select>
	            <select class="select-address" onchange="region.changed(this, 3, 'selDistricts_0')" id="selCities_0" name="city">
	            	<option value="0">请选择市</option>
	            </select>
	            <select class="select-address" id="selDistricts_0" name="district">
	            	<option value="0">请选择区</option>
	            </select>
	             </div>
	         <div class="item">
	               <label>路名或街道地址，门牌号</label>
	             <textarea placeholder="路名或街道地址，门牌号" id="Street" class="input-area" name="address"></textarea>
	        </div>
	         <div class="item">
	             <label>邮政编码</label><input type="text" value="" autocomplete="off" placeholder="邮政编码" class="input zipcode" id="Zipcode" name="zipcode">
	         </div>
	         <div class="item ft">
	            <input type="hidden" value="act_edit_address" name="act">
	            <input type="hidden" value="checkout" name="myact">
	            <input type="hidden" value="" name="address_id">
	             <input type="" value="确认收货地址" id="addok" class="btn  btn-primary btn-ok">
	             <input type="button" value="取消" id="addback" class="btn   btn-back ">
	         </div>
	     </div>
	     </form>
	 </div>
	 
	</div><div class="ui-resizable-handle ui-resizable-n" style="z-index: 90;"></div><div class="ui-resizable-handle ui-resizable-e" style="z-index: 90;"></div><div class="ui-resizable-handle ui-resizable-s" style="z-index: 90;"></div><div class="ui-resizable-handle ui-resizable-w" style="z-index: 90;"></div><div class="ui-resizable-handle ui-resizable-se ui-icon ui-icon-gripsmall-diagonal-se" style="z-index: 90;"></div><div class="ui-resizable-handle ui-resizable-sw" style="z-index: 90;"></div><div class="ui-resizable-handle ui-resizable-ne" style="z-index: 90;"></div><div class="ui-resizable-handle ui-resizable-nw" style="z-index: 90;"></div>
	</div>
</div>
<script type="text/javascript" src="/admin/js/jquery-1.8.3.min.js"></script>    
<script>
	//select框 选择地址
	$('#AddNewAddre').click(function(){
		$('#adddiv').fadeIn('slow');
		$('select').change(function(){

			var thisobj = $(this);
			$(this).nextAll('select').children().remove();
			var id = $(this).val();
			$.ajax({
				url:'/home/order/ads',
				type:'Get',
				data:{'id':id},
				dataType:'json',
				success:function(event){
					var str = ''
					for (var i = 0; i < $(event).length; i++) {
						str += '<option value="'+$(event[i]).attr('id')+'">'+$(event[i]).attr('name')+'</option>'
					};
					$(thisobj).next('select').append(str);
				},
			});
		});
	});

	//执行添加
	$('#addok').click(function(){
		//获取各标签的值
		var lxname = $('input[name="consignee"]').val();
		var phone = $('input[name="mobile"]').val();
		var sheng = $('select[name="province"]').val();
		var shi = $('select[name="city"]').val();
		var xian = $('select[name="district"]').val();
		var menpaihao = $('textarea[name="address"]').val();
		var youbian =$('input[name="zipcode"]').val();
		//触发ajax，生成地址的标签
		if(lxname && phone && sheng && shi && xian && menpaihao && youbian){
			//订单号
			var id = $('#orderNow').attr('orderid');
			//地址option标签中间的文字
			var sheng = $('select[name="province"]').find("option:selected").text();
			var shi = $('select[name="city"]').find("option:selected").text();
			var xian = $('select[name="district"]').find("option:selected").text();
			//发送ajax
			$.ajaxSetup({
	            headers: {
	                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	            }
	        });
			$.ajax({
				url:'/home/order/adds',
				type:'Post',
				data:{'id':id,'lxname':lxname,'phone':phone,'sheng':sheng,'shi':shi,'xian':xian,'menpaihao':menpaihao,'youbian':youbian},
				success:function(){
					$('#checkoutAddrList').find('dl').remove();
					var str = `<dl data-addressid="109994" class="item checked-on">
							         <dt>
							             <strong class="consignee">`+lxname+`</strong>
							         </dt>
							         <dd>
							             <p class="telphone">`+phone+`</p>
							             <p class="address">`+sheng+shi+xian+menpaihao+`</p>
							             <p class="zipcode">`+youbian+`</p>
							         </dd>
							     </dl>`;
					$('#checkoutAddrList').prepend(str);
					$('#adddiv').fadeOut('slow');
				},
			});
		}else{
			alert('信息不全');
		}
	});

	//取消添加
	$('#addback').click(function(){
		$('#adddiv').fadeOut('slow');
	});
	
    // id="orderNow" orderid="{{ $id }}" href="/home/order/pfo/{{ $id }}"
    $('#orderNow').click(function(){

        if($('.checked-on').length > 0){
            window.location.href="/home/order/pfo/"+$('#orderNow').attr('orderid');
        }else{
            alert('地址没填');
        }
    });
</script>
@endsection
