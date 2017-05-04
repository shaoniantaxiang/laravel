@extends('admin.parent.parent')
@section('content')

<div id="tableHover" class="block-area">
	<h3 class="block-title">订单列表</h3>

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
	
	<!--显示商品类别列表-->
	<div class="table-responsive overflow" style="overflow: hidden;" tabindex="5003">
	    <table class="table table-bordered table-hover tile">
	        <thead>
	            <tr>
	                <th>订单ID</th>
	                <th>用户ID</th>
	                <th>商品标题</th>
	                <th>价格</th>
	                <th>数量</th>
	                <th>赠品</th>
	                <th>套餐</th>
	                <th>总价</th>
	                <th>收货地址</th>
	                <th>订单号</th>
	                <th>订单状态</th>
	                <th>操作</th>
	            </tr>
	        </thead>
	        <tbody id='t_body'>

	        </tbody>
	    </table>
	</div>
	<!--显示商品类别列表-->
	<!--显示页码-->
	<div class='row'>
		<ul class="pagination" id='index_page'></ul>
	</div>
	<!--显示页码-->
</div>


<!--添加订单号-->
<div id='xianshiyonghu' style='float:right;position:fixed;width:100%;height:100%;opacity:0.9;background:black;display:none;'>
	<h3 class="block-title">添加订单号</h3>
    <table style='position:relative;width:600px;height:60px;top:200px;left:200px;' border='1px solid'>
	    <form>
	        
	        <tr>
	            <td>订单号</td>
	            <td><input type="text" name='classname' class="input-sm form-control validate[required,custom[url]]"></td>
	        </tr>
	        
	        <tr>
	        	<td><input value="确定" id="xgsbt" class="btn btn-sm"></td>
	        	<td><input value="取消" id="xgtj" class="btn btn-sm"></td>
	        </tr>
	    </form>
    </table>
</div>
<!--添加订单号-->



<script src='/admin/js/jquery-1.8.3.min.js' type='text/javascript'></script>

<script>
	//aja 方法
	var aja = function(){
		$.ajax({
			url:'/admins/order/inx',
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
			
			if(res[i]['state'] == '0'){//首页显示位置
				var a = '待付款';
				var b = '未付款';
			}else if(res[i]['state'] == '1'){
				var a = '发货';
				var b = '已付款未发货';
			}else if(res[i]['state'] == '2'){
				var a= '待收货';
				var b = '已付款已发货';
			}else{
				var a = '已完成';
				var b = '已完成';
			}
			var str = '';
			str += '<tr>';
			str += '<td>'+res[i]['id']+'</td>';
			str += '<td>'+res[i]['home_uid']+'</td>';
			str += '<td>'+res[i]['newtitle']+'</td>';
			str += '<td>'+res[i]['price']+'</td>';
			str += '<td>'+res[i]['num']+'</td>';
			str += '<td>'+res[i]['gift']+'</td>';
			str += '<td>'+res[i]['packg']+'</td>';
			str += '<td>'+res[i]['total']+'</td>';
			str += '<td>'+res[i]['address']+'</td>';
			str += '<td>'+res[i]['express']+'</td>';
			str += '<td>'+b+'</td>';
			str += '<td><a idd="'+res[i]['id']+'" orderstate="'+res[i]['state']+'" onclick="edit(this)">'+a+'</a></td>';
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
			url:'/admins/order/inx',
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
			url:'/admins/order/inx',
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
				url:'/admins/order/inx',
				type:'Get',
				data:{'num':$('select:eq(0)').val(),'keyword':$('#keyword').val(),'page':$(page).attr('zdypage')},
				dataType:'json',
				success:function(event){
					show(event);
				},
			});
	};
	//执行修改订单装填 或 显示添加快递单号
	function edit(obj){
		var id = $(obj).attr('idd');
		var state = $(obj).attr('orderstate');
		var express = $(obj).parent().prev().prev().html();
		if(state == '1'){//只有是代发货才能 修改订单状态或填写快递单号
			if(express == 'null'){//快递单号为空时，填写快递单号
				$('#xianshiyonghu').fadeIn('slow');
				$('#xgtj').click(function(){
					$('#xianshiyonghu').fadeOut('slow');
				});
				$('#xgsbt').click(function(){
					if($('input[name="classname"]').val() == ''){
						alert('没写快递单号');//会提示三次???????????????
					}else{
						$(obj).parent().prev().prev().html($('input[name="classname"]').val());
						$('#xianshiyonghu').fadeOut('slow');
					}
				});
			}else{//快递单号不为空，修改订单状态
				$.ajax({
					url:'/admins/order/sos',
					data:{'id':id,'express':express},
					type:'Get',
					success:function(event){
						if(event == '1'){
							alert('发货成功');
							$(obj).attr('orderstate','2');
							$(obj).html('待收货');
							$(obj).parent().prev().html('已付款已发货');
						}else{
							alert('发货失败');
						}
					},
				});
			}
		}
	}



</script>
@endsection