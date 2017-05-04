@extends('admin.parent.parent')
@section('content')

<div id="tableHover" class="block-area">
	<h3 class="block-title">商品类别列表</h3>

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
	<button class="block-title" id='addyonghu'>添加商品类别</button>
	<!--显示商品类别列表-->
	<div class="table-responsive overflow" style="overflow: hidden;" tabindex="5003">
	    <table class="table table-bordered table-hover tile">
	        <thead>
	            <tr>
	                <th>ID</th>
	                <th>类别名称</th>
	                <th>pid</th>
	                <th>path</th>
	                <th>首页是否显示</th>
	                <th>显示位置</th>
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



<!--添加商品类别信息-->
<div id='doaddyonghu' style='float:right;position:fixed;width:100%;height:100%;opacity:0.9;background:black;display:none;'>
	<h3 class="block-title">添加商品类别</h3>
    <table style='position:relative;width:600px;height:60px;top:200px;left:200px;' border='1px solid'>
	    <form>
	        <!-- Telephone -->
			<tr>
	            <td>父类别</td>
	            <td>
	            	<select name="pid" class="form-control input-sm validate[required]" style='background:#ccc'>
	            		<option value="0">--一级分类--</option>
	            	</select>
	            </td>
	        </tr>
	        <tr>
	            <td>类别名称</td>
	            <td><input type="text" name='classname' class="input-sm validate[required,custom[phone]] form-control"></td>
	        </tr>

	        <tr id='issysfxs'>
	            <td>首页是否显示</td>
	            <td>
                    <select name="xssyxswz" class="form-control input-sm validate[required]" style='background:#ccc'>
	            		<option value="0">不显示</option>
	            		<option value="1">显示</option>
	            	</select>
                </td>
	        </tr>
	        
	        <tr id='isxswz' style='display:none'>
	        	<td>显示位置</td>
	        	<td>
	        		<select name="qdsyxswz" class="form-control input-sm validate[required]" style='background:#ccc'>
	            		<option value="0">--选择显示位置--</option>
	            		<option value="1">顶部</option>
	            		<option value="2">左侧导航</option>
	            		<option value="3">顶部和左侧导航</option>
	            	</select>
                </td>
	        </tr>
	        <tr>
	        	<td><input value="添加" id="sbt" class="btn btn-sm"></td>
	        	<td><input value="取消" id="qxtj" class="btn btn-sm"></td>
	        </tr>
	    </form>
    </table>
</div>
<!--添加商品类别信息-->

<!--修改商品类别信息-->
<div id='xianshiyonghu' style='float:right;position:fixed;width:100%;height:100%;opacity:0.9;background:black;display:none;'>
	<h3 class="block-title">修改商品类别</h3>
    <table style='position:relative;width:600px;height:60px;top:200px;left:200px;' border='1px solid'>
	    <form>
	        
	        <tr>
	            <td>类别名称</td>
	            <td><input type="text" name='classname' class="input-sm form-control validate[required,custom[url]]"></td>
	        </tr>
	        
	        <tr>
	        	<td><input value="修改" id="xgsbt" class="btn btn-sm"></td>
	        	<td><input value="取消" id="xgtj" class="btn btn-sm"></td>
	        </tr>
	    </form>
    </table>
</div>
<!--修改商品类别信息-->


<script src='/admin/js/jquery-1.8.3.min.js' type='text/javascript'></script>

<script>
	//aja 方法
	var aja = function(){
		$.ajax({
			url:'/admins/type/inx',
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
			if(res[i]['sysfxs'] == '0'){//首页是否显示
				var a = '不显示';
			}else{
				var a = '显示';
			}
			if(res[i]['xswz'] == '0'){//首页显示位置
				var b = '没指定位置或不显示';
			}else if(res[i]['xswz'] == '1'){
				var b = '顶部';
			}else if(res[i]['xswz'] == '2'){
				var b = '左侧导航';
			}else{
				var b = '顶部和左侧导航';
			}
			var str = '';
			str += '<tr>';
			str += '<td>'+res[i]['id']+'</td>';
			str += '<td>'+res[i]['classname']+'</td>';
			str += '<td>'+res[i]['pid']+'</td>';
			str += '<td>'+res[i]['path']+'</td>';
			str += '<td>'+a+'</td>';
			str += '<td>'+b+'</td>';
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
			url:'/admins/type/inx',
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
			url:'/admins/type/inx',
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
				url:'/admins/type/inx',
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
			url:'/admins/type/slt',
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
					var option = $('<option value="'+res[i]['id']+'" path="'+res[i]['path']+'">'+str+res[i]['classname']+'</option>');
					$('#doaddyonghu').find('select[name="pid"]').append(option);
				};
			},
		});
	});
	
	//显示 首页是否显示
	$('#doaddyonghu').find('select[name="pid"]').change(function(){
		if(!($('select[name="pid"]').val() == 0 || ($('select[name="pid"]').find('option:selected').attr('path').split(',').length == 2))){
			alert('只能添加一级分类和二级分类');
			$('#doaddyonghu').find('input[name="classname"]').attr('disabled',true);//不能输入类别名
			$('#doaddyonghu').find('input[name="classname"]').val('');
		}else{
			$('#doaddyonghu').find('input[name="classname"]').attr('disabled',false);//可以输入类别名
		}

		if($('select[name="pid"]').val() == 0){
			$('#doaddyonghu').find('#issysfxs').fadeIn("slow");
		}else{
			$('#doaddyonghu').find('#issysfxs').fadeOut("slow");
			$('#doaddyonghu').find('#isxswz').fadeOut("slow");
			guiling();
		}
	});
	
	//显示 显示的位置
	$('#doaddyonghu').find('select[name="xssyxswz"]').change(function(){
		if($(this).val() == 0){
			$('#doaddyonghu').find('#isxswz').fadeOut("slow");
			guiling();
		}else if($(this).val() == 1){
			$('#doaddyonghu').find('#isxswz').fadeIn("slow");
		}
	});

	//添加分类div下的select选择框的归0方法
	function guiling(){
		$('#doaddyonghu').find('select[name="xssyxswz"]').val(0);// 是否显示归0
		$('#doaddyonghu').find('select[name="qdsyxswz"]').val(0);// 显示位置归0
	}

	//执行添加
	$('#sbt').click(function(){
		$.ajaxSetup({
		    headers: {
		        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		    }
		});
		//获取所有的值
		var pid = $('#doaddyonghu').find('select[name="pid"]').val();
		var classname = $('#doaddyonghu').find('input[name="classname"]').val();
		var sysfxs = $('#doaddyonghu').find('select[name="xssyxswz"]').val();
		var xswz = $('#doaddyonghu').find('select[name="qdsyxswz"]').val();
		// alert(pid+classname+sysfxs+xswz);
		//判断 并发送ajax
		if(classname){
			$.ajax({
				url:'/admins/type/ad',
				type:'Post',
				async:false,
				data:{'pid':pid,'classname':classname,'sysfxs':sysfxs,'xswz':xswz},
				success:function(event){
					alert(event);
				},
	        });
			aja();//调用一次 ajax()
			$('#qxtj').click();//模拟 点击事件
			$('select:eq(0)').val(5);//分页select 变成5
			$('#keyword').val('');//清空搜索内容
		}else{
			alert('没写类别名称');
		}
	});

	// 取消 隐藏添加分类信息页面
	$('#qxtj').click(function(){
		$('#doaddyonghu').fadeOut("slow");
		// 清空数据
		$('#doaddyonghu').find('input[name="classname"]').val('');
		$('#doaddyonghu').find('#isxswz').fadeOut("slow");
		$('#doaddyonghu').find('#issysfxs').fadeIn("slow");
		$('#doaddyonghu').find('input[name="classname"]').attr('disabled',false);//可以输入类别名
		$('#doaddyonghu').find('select[name="pid"]').find('option[value="0"]').siblings().remove();//删除父类里的option

		guiling();
	});

	//删除商品类别信息
	function del(obj){
		$.ajaxSetup({
		    headers: {
		        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		    }
		});
		var id = $(obj).attr('idd');
		$.ajax({
			url:'/admins/type/dlt',
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

	//显示商品类别修改信息窗口
	function edit(obj){
		var id = $(obj).attr('idd');

		$('#xianshiyonghu').fadeIn("slow");

		$('#xianshiyonghu').find('input[name="classname"]').attr('id',id);
	}

	//执行修改
	$('#xgsbt').click(function(){
		//获取各值
		var id = $('#xianshiyonghu').find('input[name="classname"]').attr('id');
		var classname = $('#xianshiyonghu').find('input[name="classname"]').val();
		//判断值 并发送ajax
		if(classname){
			$.ajaxSetup({
			    headers: {
			        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			    }
			});
			$.ajax({
				url:'/admins/type/upt',
				data:{'id':id,'classname':classname},
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
			alert('类别名没写');
		}
	});

	// 取消修改 隐藏
	$('#xgtj').click(function(){
		$('#xianshiyonghu').fadeOut("slow");
		$('#xianshiyonghu').find('input[name="classname"]').removeAttr('id');
		$('#xianshiyonghu').find('input[name="classname"]').val('');
	});
</script>
@endsection