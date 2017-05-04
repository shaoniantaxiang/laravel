@extends('admin.parent.parent')
@section('content')

<div id="tableHover" class="block-area">
	<h3 class="block-title">商品列表</h3>

	<div class='row'>
		<!--选择页大小-->
		<div class="col-md-2 m-b-15">
			<label>页大小</label>
			<select class="form-control m-b-10">
				<option value="5">5</option>
	            <option value='10'>10</option>
	            <option value='15'>15</option>
	            <option value='20'>20</option>
	        </select>
	    </div>
	    <!--选择页大小-->
	    <!--搜索内容-->
	    <div class="col-md-2 pull-right">
	    	<label>搜索内容</label>
	        <input type="text" class="form-control m-b-10" id='keyword'>
	    </div>
	    <!--搜索内容-->
	</div>
	<button class="block-title" id='addyonghu'>添加商品</button>
	<!--显示商品列表-->
	<div class="table-responsive overflow" style="overflow: hidden;" tabindex="5003">
	    <table class="table table-bordered table-hover tile">
	        <thead>
	            <tr>
	                <th>ID</th>
	                <th>商品名(标题)</th>
	                <th>商品副标题</th>
	                <th>商品描述</th>
	                <th>首页是否显示</th>
	                <th>显示位置</th>
	                <th>版本</th>
	                <th>颜色</th>
	                <th>优惠</th>
	                <th>现价</th>
	                <th>原价</th>
	                <th>赠品</th>
	                <th>主图</th>
	                <th>库存量</th>
	                <th>状态</th>
	                <th>操作</th>
	            </tr>
	        </thead>
	        <tbody id='t_body'>

	        </tbody>
	    </table>
	</div>
	<!--显示商品列表-->
	<!--显示页码-->
	<div class='row'>
		<ul class="pagination" id='index_page'></ul>
	</div>
	<!--显示页码-->
</div>



<!--添加商品信息-->
<div id='doaddyonghu' style='float:right;position:fixed;width:100%;height:100%;opacity:0.9;background:black;display:none;'>
	<h3 class="block-title">添加商品</h3>
    <table style='position:relative;width:600px;height:60px;top:0px;left:300px;' border='1px solid'>
	    <form id='mycss'>
	    	<tr>
	            <td>类别</td>
	            <td>
	            	<select name="typeid" class="form-control input-sm validate[required]" style='background:#ccc'>
	            		<option value="0" path='0,'>--请选择分类--</option>
	            	</select>
	            </td>
	        </tr>
	        <tr>
	            <td>商品名(标题)</td>
	            <td><input type="text" name='title' class="input-sm validate[required,custom[phone]] form-control"></td>
	        </tr>
	        <tr>
	            <td>商品副标题</td>
	            <td><input type="text" name='subtitle' class="input-sm form-control validate[required,custom[url]]"></td>
	        </tr>
	        <tr>
	            <td>商品描述</td>
	            <td><input type="text" name='script' class="input-sm form-control validate[required,custom[url]]"></td>
	        </tr>
	        <tr>
	            <td>首页是否显示</td>
	            <td>
                    <select name="dppg" class="form-control input-sm validate[required]" style='background:#ccc'>
	            		<option value="0">不显示</option>
	            		<option value="1">显示</option>
	            	</select>
                </td>
	        </tr>
	        <tr id='isxswz' style='display:none'>
	            <td>显示位置</td>
	            <td>
	        		<select name="dpps" class="form-control input-sm validate[required]" style='background:#ccc'>
	            		<option value="0">--选择显示位置--</option>
	            		<option value="1">顶部导航栏</option>
	            		<option value="2">左侧导航栏(js效果中)</option>
	            		<option value="3">左侧导航栏(非js效果中)</option>
	            		<option value="4">明星单品</option>
	            		<option value="5">推荐(小图)</option>
	            		<option value="6">推荐(大图)</option>
	            		<option value="7">特惠(小图)</option>
	            		<option value="8">特惠(大图)</option>
	            		<option value="9">精选配件(小图)</option>
	            		<option value="10">精选配件(大图)</option>
	            	</select>
                </td>
	        </tr>
	        <tr>
	            <td>版本</td>
	            <td >
	            	<div style='float:left'><input type="checkbox" name='version[]' value='Note'>Note</div>
	            	<div style='float:left'><input type="checkbox" name='version[]' value='Note3'>Note3</div>
	            	<div style='float:left'><input type="checkbox" name='version[]' value='Note5'>Note5</div>
	            	<div style='float:left'><input type="checkbox" name='version[]' value='Note3 Pro'>Note3 Pro</div>
	            	<div style='float:left'><input type="checkbox" name='version[]' value='2GB+32GB'>2GB+32GB</div>
	            	<div style='float:left'><input type="checkbox" name='version[]' value='3GB+32GB'>3GB+32GB</div>
	            </td>
	        </tr>
	        <tr>
	            <td>颜色</td>
	            <td>
	            	<div style='float:left'><input type="checkbox" name='color[]' value='白色'>白色</div>
	            	<div style='float:left'><input type="checkbox" name='color[]' value='红色'>红色</div>
	            	<div style='float:left'><input type="checkbox" name='color[]' value='玫瑰金'>玫瑰金</div>
	            	<div style='float:left'><input type="checkbox" name='color[]' value='银色'>银色</div>
	            	<div style='float:left'><input type="checkbox" name='color[]' value='纯白色'>纯白色</div>
	            	<div style='float:left'><input type="checkbox" name='color[]' value='前黑后白'>前黑后白</div>
	            </td>
	        </tr>
	        <tr>
	            <td>优惠</td>
	            <td>
	            	<div><input type="checkbox" name='discount[]' value='数据线+充电头,仅售￥28.00,省￥70.00'>数据线+充电头,仅售￥28.00,省￥70.00</div>
	            	<div><input type="checkbox" name='discount[]' value='活塞耳机,仅售￥19.00,省￥70.00'>活塞耳机,仅售￥19.00,省￥70.00</div>
	            	<div><input type="checkbox" name='discount[]' value='数据线,仅售￥9.9,省￥59.1'>数据线,仅售￥9.9,省￥59.1</div>
	            	<div><input type="checkbox" name='discount[]' value='16G内存卡,仅售￥39.00,省￥80.00'>16G内存卡,仅售￥39.00,省￥80.00</div>
	            	<div><input type="checkbox" name='discount[]' value='数据线+充电头,仅售￥28.00,省￥20.00'>数据线+充电头,仅售￥28.00,省￥20.00</div>
	            	<div><input type="checkbox" name='discount[]' value='数据线,仅售￥9.90,省￥9.10'>数据线,仅售￥9.90,省￥9.10</div>
	            	<div><input type="checkbox" name='discount[]' value='数据线+充电头,仅售￥28.00,省￥150.00'>数据线+充电头,仅售￥28.00,省￥150.00</div>
	            	<div><input type="checkbox" name='discount[]' value='数据线,仅售￥9.90,省￥139.10'>数据线,仅售￥9.90,省￥139.10</div>
	            </td>
	        </tr>
	        <tr>
	            <td>现价</td>
	            <td><input type="text" name='nowprice' class="form-control input-sm validate[required,custom[ipv4]]"></td>
	        </tr>
	        <tr>
	            <td>原价</td>
	            <td><input type="text" name='oldprice' class="form-control input-sm validate[required,custom[ipv4]]"></td>
	        </tr>
	        <tr>
	            <td>赠品</td>
	            <td>
	            	<div style='float:left'><input type="checkbox" name='gift[]' value='配件礼包'>配件礼包</div>
	            	<div style='float:left'><input type="checkbox" name='gift[]' value='指环扣配件'>指环扣配件</div>
	            	<div style='float:left'><input type="checkbox" name='gift[]' value='卡套'>卡套</div>
	            	<div style='float:left'><input type="checkbox" name='gift[]' value='品牌耳机'>品牌耳机</div>
	            	<div style='float:left'><input type="checkbox" name='gift[]' value='耳机保护壳'>耳机保护壳</div>
	            	<div style='float:left'><input type="checkbox" name='gift[]' value='VR眼睛'>VR眼睛</div>
	            </td>
	        </tr>
	        
	        <tr>
	            <td>库存量</td>
	            <td><input type="text" name='store' class="form-control input-sm validate[required,custom[ipv4]]"></td>
	        </tr>
	        <tr>
	            <td>状态</td>
	            <td>
		            <select name="state" class="form-control input-sm validate[required]" style='background:#ccc'>
	            		<option value="1">在售</option>
	            		<option value="2">下架</option>
	            	</select>
            	</td>
	        </tr>
	        <tr>
	        	<td><input value="下一步" id="sbt" class="btn btn-sm" vale='下一步'></td>
	        	<td><input value="取消" id="qxtj" class="btn btn-sm" vale='取消'></td>
	        </tr>
	    </form>
    </table>
</div>
<!--添加商品信息-->

<!--添加图片-->
<div id='addpic' style='float:right;position:fixed;width:100%;height:100%;opacity:0.9;background:black;display:none;'>
	
	<script id="editor" type="text/plain" style="width:1024px;height:500px;"></script>

	<button id='addfinish'>完成</button>

</div>
<!--添加图片-->

<!--修改商品信息-->
<div id='xianshiyonghu' style='float:right;position:fixed;width:100%;height:100%;opacity:0.9;background:black;display:none;'>
	<h3 class="block-title">修改商品</h3>
    <table style='position:relative;width:600px;height:60px;top:100px;left:200px;' border='1px solid'>
	    <form>
	        <tr>
	            <td>商品名(标题)</td>
	            <td><input type="text" name='title' class="input-sm validate[required,custom[phone]] form-control"></td>
	        </tr>
	        <tr>
	            <td>商品副标题</td>
	            <td><input type="text" name='subtitle' class="input-sm form-control validate[required,custom[url]]"></td>
	        </tr>
	        <tr>
	            <td>商品描述</td>
	            <td><input type="text" name='script' class="input-sm form-control validate[required,custom[url]]"></td>
	        </tr>
			 <tr>
	            <td>现价</td>
	            <td><input type="text" name='nowprice' class="form-control input-sm validate[required,custom[ipv4]]"></td>
	        </tr>
	        <tr>
	            <td>原价</td>
	            <td><input type="text" name='oldprice' class="form-control input-sm validate[required,custom[ipv4]]"></td>
	        </tr>
			<tr>
	            <td>库存量</td>
	            <td><input type="text" name='store' class="form-control input-sm validate[required,custom[ipv4]]"></td>
	        </tr>
	        <tr>
	            <td>状态</td>
	            <td>
		            <select name="state" class="form-control input-sm validate[required]" style='background:#ccc'>
	            		<option value="1">在售</option>
	            		<option value="2">下架</option>
	            	</select>
            	</td>
	        </tr>
	        <tr>
	        	<td><input value="修改" id="xgsbt" class="btn btn-sm"></td>
	        	<td><input value="取消" id="xgtj" class="btn btn-sm"></td>
	        </tr>
	    </form>
    </table>
</div>
<!--修改商品信息-->
<script src='/admin/js/jquery-1.8.3.min.js' type='text/javascript'></script>
<script type="text/javascript" charset="utf-8" src="/ueditor/ueditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="/ueditor/ueditor.all.min.js"> </script>
<script type="text/javascript" charset="utf-8" src="/ueditor/lang/zh-cn/zh-cn.js"></script>
<script type="text/javascript">
	var ue = UE.getEditor('editor');
</script>
<script>
	var d = new Date();
	//aja 方法
	var aja = function(){
		$.ajax({
			url:'/admins/good/inx',
			data:{'page':1},
			dataType:'json',
			type:'Get',
			success:function(event){
				show(event);
			},
		});
	}

	//生成数据列表 分页 的方法
	var show = function(event){

		//生成列表
		$('#t_body').find('tr').remove();//删除之前已有的 tr

		var t_body = $('#t_body');
		var res = $(event).attr('res');
		for (var i = 0; i < res.length; i++) {
			//商品状态
			if(res[i]['state'] == '1'){var a = '在售';}else{var a = '下架';}
			//首页是否显示
			if(res[i]['dppg'] == '0'){var b = '不显示';}else{var b = '显示';}
			//显示位置
			if(res[i]['dpps'] == '0'){var c = '不显示或没指定';}else if(res[i]['dpps'] == '1'){var c = '顶部导航栏';}else if(res[i]['dpps'] == '2'){var c = '左侧js中';}else if(res[i]['dpps'] == '3'){var c = '左侧非js中';}else if(res[i]['dpps'] == '4'){var c = '明星单品';}else if(res[i]['dpps'] == '5'){var c = '推荐(小图)';}else if(res[i]['dpps'] == '6'){var c = '推荐(大图)';}else if(res[i]['dpps'] == '7'){var c = '特惠(小图)';}else if(res[i]['dpps'] == '8'){var c = '特惠(大图)';}else if(res[i]['dpps'] == '9'){var c = '精选配件';}

			var str = '';
			str += '<tr>';
			str += '<td>'+res[i]['id']+'</td>';
			str += '<td>'+res[i]['title']+'</td>';
			str += '<td>'+res[i]['subtitle']+'</td>';
			str += '<td>'+res[i]['script']+'</td>';
			str += '<td>'+b+'</td>';
			str += '<td>'+c+'</td>';
			str += '<td>'+res[i]['version']+'</td>';
			str += '<td>'+res[i]['color']+'</td>';
			str += '<td>'+res[i]['discount']+'</td>';
			str += '<td>'+res[i]['nowprice']+'</td>';
			str += '<td>'+res[i]['oldprice']+'</td>';
			str += '<td>'+res[i]['gift']+'</td>';
			str += '<td><img src="'+res[i]['main_figure']+'" width="50"/></td>';
			str += '<td>'+res[i]['store']+'</td>';
			str += '<td>'+a+'</td>';
			str += '<td><a idd="'+res[i]['id']+'" onclick="del(this)">删除</a>|<a idd="'+res[i]['id']+'" onclick="edit(this)">修改</a></td>';
			str += '</tr>';
			$(t_body).append(str);
		};

		//生成页码
		$('#index_page').find('li').remove();//删除之前的页码

		var nowpage = parseInt($(event).attr('nowpage'));//当前页码
		var page_num = parseInt($(event).attr('page_num'));//最大页码
		var indexul = $('#index_page');
		var strr = '';
		if(page_num>=5 && nowpage<=(page_num-2) && nowpage>=3){
			strr += '<li><a onclick="doclick(this)" zdypage="'+1+'"><<</a></li>';
			strr += '<li><a onclick="doclick(this)" zdypage="'+(parseInt(nowpage)-2)+'">'+(parseInt(nowpage)-2)+'</a></li>';
			strr += '<li><a onclick="doclick(this)" zdypage="'+(parseInt(nowpage)-1)+'">'+(parseInt(nowpage)-1)+'</a></li>';
			strr += '<li><a onclick="doclick(this)" zdypage="'+nowpage+'">'+nowpage+'</a></li>';
			strr += '<li><a onclick="doclick(this)" zdypage="'+(parseInt(nowpage)+1)+'">'+(parseInt(nowpage)+1)+'</a></li>';
			strr += '<li><a onclick="doclick(this)" zdypage="'+(parseInt(nowpage)+2)+'">'+(parseInt(nowpage)+2)+'</a></li>';
			strr += '<li><a onclick="doclick(this)" zdypage="'+page_num+'">>></a></li>';
		}else if(page_num>=5 && nowpage<3){
			strr += '<li minpage=""><a onclick="doclick(this)" zdypage="'+1+'"><<</a></li>';
			strr += '<li><a onclick="doclick(this)" zdypage="'+1+'">'+1+'</a></li>';
			strr += '<li><a onclick="doclick(this)" zdypage="'+2+'">'+2+'</a></li>';
			strr += '<li><a onclick="doclick(this)" zdypage="'+3+'">'+3+'</a></li>';
			strr += '<li><a onclick="doclick(this)" zdypage="'+4+'">'+4+'</a></li>';
			strr += '<li><a onclick="doclick(this)" zdypage="'+5+'">'+5+'</a></li>';
			strr += '<li><a onclick="doclick(this)" zdypage="'+page_num+'">>></a></li>';
		}else if(page_num>=5 && nowpage>(page_num-2)){
			strr += '<li><a onclick="doclick(this)" zdypage="'+1+'"><<</a></li>';
			strr += '<li><a onclick="doclick(this)" zdypage="'+(page_num-4)+'">'+(page_num-4)+'</a></li>';
			strr += '<li><a onclick="doclick(this)" zdypage="'+(page_num-3)+'">'+(page_num-3)+'</a></li>';
			strr += '<li><a onclick="doclick(this)" zdypage="'+(page_num-2)+'">'+(page_num-2)+'</a></li>';
			strr += '<li><a onclick="doclick(this)" zdypage="'+(page_num-1)+'">'+(page_num-1)+'</a></li>';
			strr += '<li><a onclick="doclick(this)" zdypage="'+page_num+'">'+page_num+'</a></li>';
			strr += '<li><a onclick="doclick(this)" zdypage="'+page_num+'">>></a></li>';
		}else if(page_num<5){
			strr += '<li><a onclick="doclick(this)" zdypage="'+1+'"><<</a></li>';
			for (var i = 1; i <= $(event).attr('page_num'); i++) {
				strr += '<li><a onclick="doclick(this)" zdypage="'+i+'">'+i+'</a></li>';
			};
			strr += '<li><a onclick="doclick(this)" zdypage="'+page_num+'">>></a></li>';
		}
		$(indexul).append(strr);
	}

	//页面加载时，触发ajax
	aja();

	//选择页大小时，触发ajax
	$('select:eq(0)').change(function(){
		$.ajax({
			url:'/admins/good/inx',
			type:'Get',
			data:{'num':$(this).val(),'keyword':$('#keyword').val()},
			dataType:'json',
			success:function(event){
				show(event);
			},
		});
	});

	//搜索内容时，触发ajax
	$('#keyword').keyup(function(){
		$.ajax({
			url:'/admins/good/inx',
			type:'Get',
			data:{'num':$('select:eq(0)').val(),'keyword':$(this).val()},
			dataType:'json',
			success:function(event){
				show(event);
			},
		});
	});

	//选择跳页时，触发ajax
	function doclick(page){
		
		$.ajax({
			url:'/admins/good/inx',
			type:'Get',
			data:{'num':$('select:eq(0)').val(),'keyword':$('#keyword').val(),'page':$(page).attr('zdypage')},
			dataType:'json',
			success:function(event){
				show(event);
			},
		});
	};

	//显示添加商品分类页面
	$('#addyonghu').click(function(){
		$('#doaddyonghu').fadeIn("slow");
		$.ajax({
			url:'/admins/good/slt',
			type:'Get',
			dataType:'json',
			success:function(event){
				var res = $(event);
				for (var i = 0; i < res.length; i++) {
					var num = res[i]['path'].split(',').length-2;
					var str = '';
					for (var j = 0; j < num; j++) {
						str += str.concat('|--');
					};
					var option = $('<option value="'+res[i]['id']+'"  path="'+res[i]['path']+'">'+str+res[i]['classname']+'</option>');
					$('#doaddyonghu').find('select[name="typeid"]').append(option);
				};
			},
		});
	});
	
	//显示选择 前台显示位置的 select框
	$('#doaddyonghu').find('select[name="dppg"]').change(function(){
		if($(this).val() == 0){
			$('#doaddyonghu').find('#isxswz').fadeOut("slow");
			$('#doaddyonghu').find('select[name="dpps"]').val(0);
		}else if($(this).val() == 1){
			$('#doaddyonghu').find('#isxswz').fadeIn("slow");
		}
	});

	//只能在二级类别下上传商品
	$('#doaddyonghu').find('select[name="typeid"]').change(function(){

		if($(this).find('option:checked').attr('path').split(',').length != 3 ){
			alert('只能在二级分类上添加商品');
		}
	});
	//执行添加
	$('#sbt').click(function(){
		$.ajaxSetup({
		    headers: {
		        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		    }
		});
		//获取所有的值。拼接input type是checkbox的值
		var typeid = $('#doaddyonghu').find('select[name="typeid"]').val();
		var title = $('#doaddyonghu').find('input[name="title"]').val();
		var subtitle = $('#doaddyonghu').find('input[name="subtitle"]').val();
		var script = $('#doaddyonghu').find('input[name="script"]').val();
		var dppg = $('#doaddyonghu').find('select[name="dppg"]').val();
		var dpps = $('#doaddyonghu').find('select[name="dpps"]').val();
		var version = $('#doaddyonghu').find('input[name="version[]"]:checked');
		var color = $('#doaddyonghu').find('input[name="color[]"]:checked');
		var discount = $('#doaddyonghu').find('input[name="discount[]"]:checked');
		var nowprice = $('#doaddyonghu').find('input[name="nowprice"]').val();
		var oldprice = $('#doaddyonghu').find('input[name="oldprice"]').val();
		var gift = $('#doaddyonghu').find('input[name="gift[]"]:checked');
		var store = $('#doaddyonghu').find('input[name="store"]').val();
		var state = $('#doaddyonghu').find('select[name="state"]').val();

		//处理input是checkbox的值
		var new_version = '';
		for (var i = 0; i < version.length; i++) {new_version += $(version[i]).val()+'@';};
		var new_color = '';
		for (var i = 0; i < color.length; i++) {new_color += $(color[i]).val()+'@';};
		var new_discount = '';
		for (var i = 0; i < discount.length; i++) {new_discount += $(discount[i]).val()+'@';};
		var new_gift = '';
		for (var i = 0; i < gift.length; i++) {new_gift += $(gift[i]).val()+'@';};

		//判断 并发送ajax
		if($('#doaddyonghu').find('select[name="typeid"]').find('option:checked').attr('path').split(',').length == 3){
			if(title && subtitle && script && nowprice && store){
				$.ajax({
					url:'/admins/good/ad',
					type:'Post',
					async:false,
					data:{'typeid':typeid,'title':title,'subtitle':subtitle,'script':script,'dppg':dppg,'dpps':dpps,'version':new_version,'color':new_color,'discount':new_discount,'nowprice':nowprice,'oldprice':oldprice,'gift':new_gift,'store':store,'state':state},
					success:function(event){
						alert('继续添加商品图片');
					},
		        });
				aja();//调用一次 ajax()
				$('#qxtj').click();//模拟 点击事件
				$('select:eq(0)').val(5);//select 变成5
				$('#keyword').val('');//清空搜索内容
				$('#addpic').fadeIn('slow');//显示 插入图片的模态框
			}else{
				alert('信息填写不完整，重新填写请');
			}
		}else{
			alert('只能在二级分类添加商品');
		}
	});


	//执行插入图片
	$('#addfinish').click(function(){
		$.ajax({
			url:'/admins/good/pph',
			type:'Get',
			async:false,
			success:function(){

			}
		});
		$('#addpic').fadeOut('slow');
		aja();
	});


	//取消 隐藏添加商品信息页面，并将各input值归零
	$('#qxtj').click(function(){
		$('#doaddyonghu').fadeOut("slow");
		$('#doaddyonghu').find('select[name="typeid"]').find('option[value="0"]').siblings().remove();
		$('#doaddyonghu').find('input[type="text"]').val('');
		$('#doaddyonghu').find('#sbt').val('下一步');
		$('#doaddyonghu').find('#qxtj').val('取消');
		$('#doaddyonghu').find('select').val(0);
		$('#doaddyonghu').find('select[name="state"]').val('1');
		$('#doaddyonghu').find('#isxswz').fadeOut("slow");	
	});

	//删除商品信息
	function del(obj){
		$.ajaxSetup({
		    headers: {
		        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		    }
		});
		var id = $(obj).attr('idd');
		$.ajax({
			url:'/admins/good/dlt',
			type:'Post',
			async:false,
			data:{'id':id},
			success:function(event){
				alert(event);
			}
		});
		aja();//调用一次 ajax()
		$('select:eq(0)').val(5);//select 变成5
		$('#keyword').val('');//清空搜索内容
	}

	// 显示商品修改信息窗口
	function edit(obj){
		var id = $(obj).attr('idd');
		$('#xianshiyonghu').fadeIn("slow");
		$('#xianshiyonghu').find('input[name="title"]').attr('id',id);
		$.ajax({
			url:'/admins/good/fid',
			data:{'id':id},
			dataType:'json',
			async:false,
			type:'Get',
			success:function(event){
				$('#xianshiyonghu').find('input[name="title"]').val($(event).attr('title'));
				$('#xianshiyonghu').find('input[name="subtitle"]').val($(event).attr('subtitle'));
				$('#xianshiyonghu').find('input[name="script"]').val($(event).attr('script'));
				$('#xianshiyonghu').find('input[name="nowprice"]').val($(event).attr('nowprice'));
				$('#xianshiyonghu').find('input[name="oldprice"]').val($(event).attr('oldprice'));
				$('#xianshiyonghu').find('input[name="store"]').val($(event).attr('store'));
				$('#xianshiyonghu').find('input[name="title"]').val($(event).attr('title'));
				$('#xianshiyonghu').find('select[name="state"]').val($(event).attr('state'));
			},
		});
	}

	//执行修改
	$('#xgsbt').click(function(){
		//获取各值
		var id = $('#xianshiyonghu').find('input[name="title"]').attr('id');
		var title = $('#xianshiyonghu').find('input[name="title"]').val();
		var subtitle = $('#xianshiyonghu').find('input[name="subtitle"]').val();
		var script = $('#xianshiyonghu').find('input[name="script"]').val();
		var nowprice = $('#xianshiyonghu').find('input[name="nowprice"]').val();
		var oldprice = $('#xianshiyonghu').find('input[name="oldprice"]').val();
		var store = $('#xianshiyonghu').find('input[name="store"]').val();
		var state = $('#xianshiyonghu').find('select[name="state"]').val();
		//判断值 并发送ajax
		if(title && subtitle && script && nowprice && store){
			$.ajaxSetup({
			    headers: {
			        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			    }
			});
			$.ajax({
				url:'/admins/good/upt',
				data:{'id':id,'title':title,'subtitle':subtitle,'script':script,'nowprice':nowprice,'oldprice':oldprice,'store':store,'state':state},
				type:'Post',
				async:false,
				success:function(event){
					alert(event);
				},
			});
			aja();//调用一次 ajax()
			$('#xgtj').click();//模拟 点击事件
			$('select:eq(0)').val(5);//select 变成5
			$('#keyword').val('');//清空搜索内容
		}else{
			alert('信息不完整或密码不相同');
		}
	});

	//取消修改 隐藏
	$('#xgtj').click(function(){
		$('#xianshiyonghu').fadeOut("slow");
		$('#xianshiyonghu').find('input').val('');
		$('#xianshiyonghu').find('#xgsbt').val('修改');
		$('#xianshiyonghu').find('#xgtj').val('取消');
		aja();
	});
</script>
@endsection