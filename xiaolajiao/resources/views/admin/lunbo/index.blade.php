@extends('admin.parent.parent')

@section('content')

<div id="tableHover" class="block-area">
	<h3 class="block-title">首页轮播图列表</h3>


	<button class="block-title" id='addyonghu'>添加轮播图</button>
	<!--显示商品列表-->
	<div class="table-responsive overflow" style="overflow: hidden;" tabindex="5003">
	    <table class="table table-bordered table-hover tile">
	        <thead>
	            <tr>
	                <th>ID</th>
	                <th>图片</th>
	                <th>操作</th>
	            </tr>
	        </thead>
	        <tbody id='t_body'>

	        </tbody>
	    </table>
	</div>
	<!--显示商品列表-->
</div>



<!--添加轮播图-->
<div id='addpic' style='float:right;position:fixed;width:100%;height:100%;opacity:0.9;background:black;display:none;'>
	
	<script id="editor" type="text/plain" style="width:1024px;height:500px;"></script>

	<button id='addfinish'>完成</button>

</div>
<!--添加轮播图-->

<script src='/admin/js/jquery-1.8.3.min.js' type='text/javascript'></script>
<script type="text/javascript" charset="utf-8" src="/uedit/ueditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="/uedit/ueditor.all.min.js"> </script>
<script type="text/javascript" charset="utf-8" src="/uedit/lang/zh-cn/zh-cn.js"></script>
<script type="text/javascript">
	var ue = UE.getEditor('editor');
</script>
<script>
	//aja 方法
	var aja = function(){
		$.ajax({
			url:'/admins/lunbo/show',
			data:{},
			dataType:'json',
			type:'Get',
			success:function(event){
				show(event);
			},
		});
	}

	//生成数据列表
	var show = function(event){

		//生成列表
		$('#t_body').find('tr').remove();//删除之前已有的 tr

		var t_body = $('#t_body');
		var res = $(event);
		for (var i = 0; i < res.length; i++) {

			var str = '';
			str += '<tr>';
			str += '<td>'+res[i]['id']+'</td>';
			str += '<td><img src="'+res[i]['pic']+'" width="90"/></td>';
			str += '<td><a idd="'+res[i]['id']+'" onclick="del(this)">删除</a></td>';
			str += '</tr>';
			$(t_body).append(str);
		};
	}

	//页面加载时，触发ajax
	aja();

	//显示添加图片的页面
	$('#addyonghu').click(function(){
		$('#addpic').fadeIn('slow');
	});

	//执行插入图片
	$('#addfinish').click(function(){
		$.ajax({
			url:'/admins/lunbo/pph',
			type:'Get',
			async:false,
			success:function(){

			}
		});
		$('#addpic').fadeOut('slow');
		aja();
	});

	//删除图片信息
	function del(obj){
		$.ajaxSetup({
		    headers: {
		        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		    }
		});
		var id = $(obj).attr('idd');
		$.ajax({
			url:'/admins/lunbo/dlt',
			type:'Post',
			async:false,
			data:{'id':id},
			success:function(event){
				alert(event);
			}
		});
		aja();//调用一次 ajax()
	}
</script>
@endsection