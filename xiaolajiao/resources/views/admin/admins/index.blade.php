@extends('admin.parent.parent')
@section('content')

<div id="tableHover" class="block-area">
	<h3 class="block-title">管理员列表</h3>

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
	<button class="block-title" id='addyonghu'>添加管理员</button>
	<!--显示用户列表-->
	<div class="table-responsive overflow" style="overflow: hidden;" tabindex="5003">
	    <table class="table table-bordered table-hover tile">
	        <thead>
	            <tr>
	                <th>ID</th>
	                <th>用户名</th>
	                <th>密码</th>
	                <th>性别</th>
	                <th>电话</th>
	                <th>邮箱</th>
	                <th>权限</th>
	                <th>操作</th>
	            </tr>
	        </thead>
	        <tbody id='t_body'>

	        </tbody>
	    </table>
	</div>
	<!--显示用户列表-->
	<!--显示页码-->
	<div class='row'>
		<ul class="pagination" id='index_page'></ul>
	</div>
	<!--显示页码-->
</div>



<!--添加用户信息-->
<div id='doaddyonghu' style='float:right;position:fixed;width:100%;height:100%;opacity:0.9;background:black;display:none;'>
	<h3 class="block-title">添加管理员</h3>
    <table style='position:relative;width:600px;height:60px;top:200px;left:200px;' border='1px solid'>
	    <form>
	        <!-- Telephone -->
	        <tr>
	            <td>用户名</td>
	            <td><input type="text" name='username' class="input-sm validate[required,custom[phone]] form-control"></td>
	        </tr>

	        <tr>
	            <td>性别</td>
	            <td>
                    <div>
                        <input type="radio" name="sex" value='1'>男
                    </div>
                    <div>
                        <input type="radio" name="sex" value='2'>女
                    </div>
                </td>
	        </tr>
	        
	        <!-- URL -->
	        <tr>
	            <td>密码</td>
	            <td><input type="text" name='pass' class="input-sm form-control validate[required,custom[url]]"></td>
	        </tr>

	        <tr>
	            <td>重复密码</td>
	            <td><input type="text" name='repass' class="input-sm form-control validate[required,custom[url]]"></td>
	        </tr>
	        
	        <!-- Email -->
	        <tr>
	            <td>手机/电话</td>
	            <td><input type="text" name='phone' class="form-control input-sm validate[required,custom[email]]"></td>
	        </tr>
	        
	        <!-- IP Address -->
	        <tr>
	            <td>邮箱</td>
	            <td><input type="text" name='email' class="form-control input-sm validate[required,custom[ipv4]]"></td>
	        </tr>
	        <tr>
	        	<td><input value="添加" id="sbt" class="btn btn-sm"></td>
	        	<td><input value="取消" id="qxtj" class="btn btn-sm"></td>
	        </tr>
	    </form>
    </table>
</div>
<!--添加用户信息-->

<!--修改用户信息-->
<div id='xianshiyonghu' style='float:right;position:fixed;width:100%;height:100%;opacity:0.9;background:black;display:none;'>
	<h3 class="block-title">修改管理员</h3>
    <table style='position:relative;width:600px;height:60px;top:200px;left:200px;' border='1px solid'>
	    <form>
	        
	        <tr>
	            <td>原密码</td>
	            <td><input type="text" name='oldpass' class="input-sm form-control validate[required,custom[url]]"></td>
	        </tr>
	        <!-- URL -->
	        <tr>
	            <td>密码</td>
	            <td><input type="text" name='pass' class="input-sm form-control validate[required,custom[url]]"></td>
	        </tr>

	        <tr>
	            <td>重复密码</td>
	            <td><input type="text" name='repass' class="input-sm form-control validate[required,custom[url]]"></td>
	        </tr>
	        
	        <tr>
	        	<td><input value="修改" id="xgsbt" class="btn btn-sm"></td>
	        	<td><input value="取消" id="xgtj" class="btn btn-sm"></td>
	        </tr>
	    </form>
    </table>
</div>
<!--修改用户信息-->


<script src='/admin/js/jquery-1.8.3.min.js' type='text/javascript'></script>

<script>
	//aja 方法
	var aja = function(){
		$.ajax({
			url:'/admins/admins',
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
			if(res[i]['grade'] == '0'){//判断账户是否已激活
				var a = '普通管理员';
			}else{
				var a = '超级管理员';
			}
			if(res[i]['sex'] == '1'){//判断账户是否已激活
				var b = '男';
			}else{
				var b = '女';
			}
			var str = '';
			str += '<tr>';
			str += '<td>'+res[i]['id']+'</td>';
			str += '<td>'+res[i]['username']+'</td>';
			str += '<td>'+res[i]['pass']+'</td>';
			str += '<td>'+b+'</td>';
			str += '<td>'+res[i]['phone']+'</td>';
			str += '<td>'+res[i]['email']+'</td>';
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
			url:'/admins/admins',
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
			url:'/admins/admins',
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
				url:'/admins/admins',
				type:'Get',
				data:{'num':$('select:eq(0)').val(),'keyword':$('#keyword').val(),'page':$(page).attr('zdypage')},
				dataType:'json',
				success:function(event){
					show(event);
				},
			});
	};

	//显示添加用户信息页面
	$('#addyonghu').click(function(){
		$('#doaddyonghu').fadeIn("slow");
	});
	
	//执行添加
	$('#sbt').click(function(){
		$.ajaxSetup({
		    headers: {
		        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		    }
		});
		//获取所有的值
		var username = $('#doaddyonghu').find('input[name="username"]').val();
		var sex = $('#doaddyonghu').find('input[name="sex"]:checked').val();
		var pass = $('#doaddyonghu').find('input[name="pass"]').val();
		var repass = $('#doaddyonghu').find('input[name="repass"]').val();
		var phone = $('#doaddyonghu').find('input[name="phone"]').val();
		var email = $('#doaddyonghu').find('input[name="email"]').val();
		//判断 并发送ajax
		if(username && pass && repass && phone && email){
			$.ajax({
				url:'/admins/admins',
				type:'Post',
				async:false,
				data:{'username':username,'sex':sex,'pass':pass,'repass':repass,'phone':phone,'email':email},
				success:function(event){
					alert(event);
				}, 
	        });
			aja();//调用一次 ajax()
			$('#qxtj').click();//模拟 点击事件
			$('select:eq(0)').val(5);//select 变成5
			$('#keyword').val('');//清空搜索内容
		}else{
			alert('信息填写不完整，重新填写请');
		}
	});

	//取消 隐藏添加用户信息页面
	$('#qxtj').click(function(){
		$('#doaddyonghu').fadeOut("slow");
		//清空数据
		$('#doaddyonghu').find('input[name="username"]').val('');
		$('#doaddyonghu').find('input[name="pass"]').val('');
		$('#doaddyonghu').find('input[name="repass"]').val('');
		$('#doaddyonghu').find('input[name="phone"]').val('');
		$('#doaddyonghu').find('input[name="email"]').val('');
	});

	//删除用户信息
	function del(obj){
		$.ajaxSetup({
		    headers: {
		        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		    }
		});
		var id = $(obj).attr('idd');
		$.ajax({
			url:'/admins/admins/dlt',
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

	//显示用户修改信息窗口
	function edit(obj){
		var id = $(obj).attr('idd');

		$('#xianshiyonghu').fadeIn("slow");

		$('#xianshiyonghu').find('input[name="oldpass"]').attr('id',id);
	}

	//执行修改
	$('#xgsbt').click(function(){
		//获取各值
		var id = $('#xianshiyonghu').find('input[name="oldpass"]').attr('id');
		var oldpass = $('#xianshiyonghu').find('input[name="oldpass"]').val();
		var pass = $('#xianshiyonghu').find('input[name="pass"]').val();
		var repass = $('#xianshiyonghu').find('input[name="repass"]').val();
		//判断值 并发送ajax
		if(oldpass && pass && repass && (pass==repass)){
			$.ajaxSetup({
			    headers: {
			        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			    }
			});
			$.ajax({
				url:'/admins/admins/upt',
				data:{'id':id,'oldpass':oldpass,'pass':pass},
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
		$('#xianshiyonghu').find('input[name="oldpass"]').removeAttr('id');
		$('#xianshiyonghu').find('input[name="oldpass"]').val('');
		$('#xianshiyonghu').find('input[name="pass"]').val('');
		$('#xianshiyonghu').find('input[name="repass"]').val('');
	});
</script>
@endsection