$(function(){
	pageload();

    try {
	  onload_leftTime();
	}
	catch (e) {};

	/*新版goods页面*/
	
	/*详情页前三张图取消延时加载*/
	$(".xlj-good-desc").find("img").each(function(index,key){
		if(index <= 1) {
			$(this).attr("src",$(this).attr("data-original"));
			$(this).removeAttr("class");
            $(this).removeAttr("data-original");
		}
	});
	
	
	/*套餐商品*/
	$(".package-on:odd").css("left","236px");
	$(".package-list:odd").css("left","-236px");


	/*套餐选中状态,不能切换选择*/
	$(".package-name").click(function(){
		if($(".select-package>ul>li").find($(this)).hasClass("select-on")){
			$(this).removeClass("select-on");
			$(this).parent().find(".package-list>ul").removeClass("select-on");
			$(this).parent().find(".package-on").removeClass("package-on-change");
		}else{
			$(".package-name").removeClass("select-on");
			$(this).addClass("select-on");
			$(".package-list>ul").removeClass("select-on")
			$(this).parent().find(".package-list>ul").addClass("select-on");
			$(".package-on").removeClass("package-on-change")
			$(this).parent().find(".package-on").addClass("package-on-change");
		}
	});

	/*型号切换*/
	$("#option-standard li").off().on("click",function(){
		if($(this).hasClass("select-on")){
			return;
		}else{
			$(this).addClass("select-on").siblings().removeClass("select-on");
		}
	});

	/*颜色切换*/
	$("#option-color li").off().on("click",function(){
		if($(this).hasClass("select-on")){
			return;
		}else{
			$(this).addClass("select-on").siblings().removeClass("select-on");
		}
	});


	/*套餐内商品颜色切换*/
	$(".package-list-color>ul>li").off().on("click",function(){
		if($(this).hasClass("select-color")){
			return;
		}else{
			$(this).addClass("select-color").siblings().removeClass("select-color");
		}

        var imgs = $(this).attr('data-thumb');
        $('#dis_'+$(this).attr('data-cid')+' img').attr('src',imgs);
	});


	/*产品bananer图片展示*/
	jQuery(".main-content-left").hover(function () {
			jQuery(this).find(".prev,.next").stop(true, true).fadeTo("show", 0.5)
		}
		, function () {
			jQuery(this).find(".prev,.next").fadeOut()
		}
	);
	jQuery(".main-content-left").slide({
		titCell: ".hd ul",
		mainCell: ".bd ul",
		effect: "fold",
		autoPlay: true,
		autoPage: true,
		trigger: "click",
		interTime:"4000",
		startFun: function (i) {
			var curLi = jQuery(".main-content-left .bd li").eq(i);
			if (!!curLi.attr("_src")) {
				curLi.css("background-image", curLi.attr("_src")).removeAttr("_src")
			}

		}
	});
	/*end 新版goods页面*/



	$("#CustomLabel").off().on("click",function(){
		var _this=$(this);
		var numlength=$(".user-label").find("li").length;

		var sum = _this.attr("data-sum");
		if(sum > 2){
			alert("最多只能自定义三个标签")
		 }else {
			 // 插入一个文本框,并选中里面内容
			 var inputObj = $('<li><input type="text" class="user-label-input" maxlength="10" /></li>');
			 $(this).hide().before(inputObj).prev().find("input").select();
			 _this.attr("data-sum",Number(_this.attr("data-sum"))+1);
		 }

	});
    /*产品详情配件加入购物车*/
    $('.add-goodCart').off("click").on('click',  function(e) {
        var $this = $(this);
			var infos = new Object();
			infos.goods_id = $(this).attr("data-gid");
			infos.cid      = 0;
			infos.thumb    = $this.parent().find("img").attr("src");
			infos.number   = 1;
			infos.spec     = null;
			infos.plans    = null;
			infos.effect   = 4;
			infos.types    = 1;
			addToCart(infos);
			e.preventDefault();
    });
	$("#CustomSubmit").off().on("click",function(){
		var userLabelInput= $(".user-label-input")
		if(userLabelInput.val()!=""){
			var text=userLabelInput.val();
			  if(getByteLen(text)>10){
					alert("自定义标签不能超过10个字符");
			  }else{

				  var numlength=$(".user-label").find("li").length;
				  var data_num=100+numlength;
				  $(".user-label-input").parent().html('<input id="userLabel'+data_num+'" type="checkbox"  name="items[]" checked value="'+text+'" /><label for="userLabel'+data_num+'">'+text+'</label>');
				  if($("#CustomLabel").attr("data-sum") > 2){
					  $(this).hide();
				  }else{
					  $("#CustomLabel").show();
				  }
			  }
		}else{
			alert("请自定义内容")
		}

	});
	/*加入购物车*/
	$("#addCart").off().on("click",function(e){
		e.preventDefault();

		/*
		 * @param integer $goods_id 商品ID
		 * @param integer $cid 分类ID
		 * @param string $thumb 商品图
		 * @param integer $number 数量
		 * @param integer $spec 属性（颜色，大小）
		 * @param integer $plans 商品套餐
		 * @param integer $effect 加入购物车效果
		 * @param integer $types 商品类型
		*/
		var infos = new Object();
		infos.goods_id = $(this).attr("data-gid");
		infos.cid      = $(this).attr("data-cid");
		infos.thumb    = $(this).attr("data-thumb");
		infos.number   = $('#number').val();
		infos.spec     = ($("#spec_info").length > 0) ? $('#spec_info').val() : null;
		infos.plans    = ($("#plans_id").length > 0) ? $('#plans_id').val() : null;
        infos.goodsArr = ($("#goods_arr").length > 0) ? $('#goods_arr').val() : null;
		infos.effect   = 0;

		infos.premiums = new Array();
		var pre = new Array();
		$('.goods-info-premiums select').each(function(i){
			pre[i] = $(this).find("option:selected");
			if(pre[i].val()) {
				infos.premiums[i] = pre[i].attr("data-id")+","+pre[i].val();
			}
		});

		if(infos.cid > 0) {
			infos.types = 0;
		} else {
			infos.types  = 1;
		}
		if(infos.plans) {
			infos.types  = ($("#plans_id").length > 0) ? 2 : 0;
		}
		addToCart(infos);
	})

	$("#addCart2").off().on("click",function(e){
		e.preventDefault();
		var infos = new Object();
		infos.goods_id = $(this).attr("data-gid");
		infos.cid      = $(this).attr("data-cid");
		infos.thumb    = $(this).attr("data-thumb");
		infos.number   = $('#number').val();
		infos.spec     = ($("#spec_info").length > 0) ? $('#spec_info').val() : null;
		infos.plans    = ($("#plans_id").length > 0) ? $('#plans_id').val() : null;
		infos.effect   = $(this).attr("data-effect");

		infos.premiums = new Array();
		var pre = new Array();
		$('.goods-info-premiums select').each(function(i){
			pre[i] = $(this).find("option:selected");
			if(pre[i].val()) {
				infos.premiums[i] = pre[i].attr("data-id")+","+pre[i].val();
			}
		});

		if(infos.cid > 0) {
			infos.types = 0;
		} else {
			infos.types  = 1;
		}
		if(infos.plans) {
			infos.types  = ($("#plans_id").length > 0) ? 2 : 0;
		}
		addToCart(infos);
	})

	/*预约*/
	$("#addReservation").off().on("click",function(e){
		var gid=$(this).attr("data-gid");
		var pid=$('#spec_info').val();
		$.ajax({
			type: "GET",
			dataType:"JSON",
			cache:false,
			url: "eventlib/goods.php?act=reservation",
			data: 'gid=' + gid + '&pid=' + pid,
			success: function(result){
				var reserve_info="";
				if(result.error != 0 && result.error != 5) {
					alert(result.message);
					if(result.error == 1) {
						location.href = result.url;
					}
				} else {
					if(result.error == 5 ) {
						var titlestr = '您已经预约过了';
					} else {
						var titlestr = '恭喜您！预约成功';
					}
					if(gid == 423) {
						var messagestr = '您已获得红辣椒note5抢购资格，请于1月4日10:00准时抢购。';
					}else if(gid == 430){
						var messagestr = '您已获得note5灰色版抢购资格，抢购于1月10日10:00准时开始！';
					}else {
						var messagestr = '您已获得抢购资格，请准时抢购。';
					}
					
					$(".reserve_div,.reserve_smark").show();
					reserve_info='<div class="reserve_div">'
									+'<h6>'+titlestr+' </h6>'
									+'<p>'+messagestr+'</p>'
									+'<div class="reserve_button">确定</div>'
									+'<div class="reserve_close">&times;</div>'
								+'</div><div class="reserve_smark"></div>';
					$('body').append(reserve_info);				
					$(".reserve_button,.reserve_close").on("click",function(){
						$(".reserve_div,.reserve_smark").remove();
					});
				}
									
			}
		});
	})

	/*喜欢*/
	$(".love-btn").on("click",function(){
        if (!isClick) {
			return
		}
        isClick = false;
		var gid=$("#goods_id").val();
        $.ajax({
            type: "GET",
            dataType:"JSON",
            cache:false,
            url: "eventlib/goods.php?act=like_goods",
            data: 'gid=' + gid,
            success: function(result){
                if(result.error == 0) {
                    isLoaded = true;
                    $(".love-p span").html(Number($(".love-p span").text())+1);
                }
            }
        });
	})
    isClick = true;
	/* *
	 * 添加商品到收藏夹
	 */
	$("#Favorites").off().on("click",function(){
		var gid=$(this).attr("data-gid");
		$.ajax({
			type: "GET",
			dataType:"JSON",
			url: "eventlib/goods.php?act=collect",
			data: 'id=' + gid,
			success: function(result){
                if(result.error == 0) {
					var a=$(".love-p").children("span").text();
					a++;
					$(".love-p").children("span").text(a);
				}
				alert(result.message);
			}
		});
	});

	/*点击跳转到商品评价*/
	  $("#view_comment_count").off().on("click",function(){
		$(".goods-desc-menu li").each(function(index){
			if(index == 2) {
			    $(this).addClass("on");
			} else {
			    $(this).removeClass("on");
			}
		});
		$(".xlj-desc-box .xlj-box").each(function(index){
			if(index == 2) {
			    $(this).css({'display':'block'});
			} else {
			    $(this).css({'display':'none'});
			}
		});
		$("html,body").animate({scrollTop:$(".goods-desc-menu").offset().top},1000);
	});

	/*型号切换*/
	$("#option-standard li").off().on("click",function(){
		if($(this).hasClass("select-on")){
			return;
		}else{
			$(this).addClass("select-on").siblings().removeClass("select-on");
			var gid = $(this).find("a").attr("data-gid");
			$.ajax({
				type: "POST",
				dataType:"JSON",
				url: "goods.php",
				data: 'event=1&id=' + gid,
				success: function(result){
					$(document).attr("title",result.title);
					$.getScript(result.js+"goods.js"+result.PARAMETER_CDN);
					pageload();
					$("#loadinfos").html(result.content);
                    $.getScript('themes/newxlj/script/uploadPreview.min.js');
				}
			});
		}
	});

	/*颜色切换*/
	$("#option-color li").off().on("click",function(){
		if($(this).hasClass("select-on")){
			return;
		}else{
			$(this).addClass("select-on").siblings().removeClass("select-on");
			var gid = $(this).find("a").attr("data-gid");
			$("#spec_info").val(gid);
			var id = $("#goods_id").val();

			if($("#types").val() == 1) {
				var urls = 'goods.php';
			} else {
				var urls = 'exchange.php?act=view&';
			}
			$.ajax({
				type: "POST",
				dataType:"JSON",
				url: urls,
				data: 'event=1&id='+id+'&gid='+gid,
				success: function(result){
					$(document).attr("title",result.title);
					$.getScript(result.js+"goods.js"+result.PARAMETER_CDN);
					pageload();
					$("#loadinfos").html(result.content);
					$.getScript('themes/newxlj/script/uploadPreview.min.js');
				}
			});
		}
	});

    $("#option-package li").bind("click",function(){

        var marketPrice = $(this).attr("data-market-price");
        var totalPrice = $(this).attr("data-total-price");

        if($(this).find("div").attr("class") == "package-name select-on") {
            if(marketPrice != "" && marketPrice != undefined) {
                $("#ECS_SHOPPRICE").html(marketPrice);
            }
            if(totalPrice != "" && totalPrice != undefined) {
                $(".select-buy-price span").html(totalPrice);
            }

            batchGoods = [];
            $(this).find("li").each(function(k,v){
                if($(v).attr("class") != undefined && $(v).attr("class") == 'select-color') {
                    speciaSelected = $(v).attr("data-gid");
                    batchGoods.push(speciaSelected);
                }

            });

            $("#goods_arr").val(batchGoods.join("_"));
            $("#plans_id").val($(this).attr("data-gid"));
        } else {
            $("#ECS_SHOPPRICE").html($(".select-buy-price").attr("data-makeprice"));
            $(".select-buy-price span").html($(".select-buy-price").attr("data-price"));
            $("#goods_arr").val("");
            $("#plans_id").val("");
        }
    });

	/*套餐切换*/
	$(".goods-info-plans li").off().on("click",function(){
		if($(this).hasClass("select-on")){
			return;
		}else{
			$(this).addClass("select-on").siblings().removeClass("select-on");
			var gid = $(this).find("a").attr("data-gid");
			var sid = $(this).find("a").attr("data-sid");
			$.ajax({
				type: "GET",
				dataType:"JSON",
				url: "eventlib/goods.php",
				data: 'act=plans_price&id=' + gid+ '&sid=' + sid,
				success: function(result){
					if($("#ECS_SHOPPRICE").length > 0) {
						$("#ECS_SHOPPRICE").html(result.price);
					} else {
						$(".price-num").html(result.price);
					}
					$("#plans_id").val(result.sid);
				}
			});
		}
	});

	/*数量切换*/
	  $("#DelNum").off().on("click",function(){
		var numInput=$(this).parent().find("#number");
		var num=$(this).parent().find("#number").val();

		if(num>1){
			num--;
			numInput.val(num);
		}else{return}
	});
	$("#AddNum").off().on("click",function(){
		var numInput=$(this).parent().find("#number");
		var num=$(this).parent().find("#number").val();

		if(num<1){
			return;
		}else{
			num++;
			numInput.val(num);}
	});
	/*加载更多数据*/
	$(".more").off().on("click",function(){
		   var _this=this;
		   var parent= $(this).parent().parent().parent().attr("id");
		   var ul=$(this).parent().find("ul");
		   var text=$(this).html();
		   if(parent&&parent=="Faqs"){
			   $.ajax({

				   type: "GET",
				   dataType:"JSON",
				   url: "test.json",
				   data: null,
				   beforeSend:function(){
						$(_this).html("加载中……");
				   },
				   complete:function(){
					   $(_this).html(text);
				   },
					   success: function(result){
							var x=5;
							var list=[];
							if(x<1){
								alert("没有更多留言");
							}else{
								for(var i=0;i<x;i++){
									list.push('<li>');
									list.push('<h2><span>?</span>收藏商品功能'+i+'</h2>');
									list.push('<p><span>··</span>点击"收藏"按钮，页面会弹出收藏成功的提示。您可在"个人中心"的我的收藏查看所有收藏商品。在我的收藏中可以选择加入购物车，或删除已收藏的商品。</p>');
									list.push('</li>')
								}
								$(list.join("")).appendTo(ul);
							}


				   }
			   });
		   }else if(parent&&parent=="goodsFaq"){
			   $.ajax({

				   type: "GET",
				   dataType:"JSON",
				   url: "test.json",
				   data: null,
				   beforeSend:function(){
					   $(_this).html("加载中……");
				   },
				   complete:function(){
					   $(_this).html(text);
				   },
				   success: function(result){
					   var x=5;
					   var list=[];
					   if(x<1){
						   alert("没有更多留言");
					   }else{
						   for(var i=0;i<x;i++){
							   list.push('<li>');
							   list.push('<h2><span>?</span><strong>咨询内容：</strong>'+i+'</h2>');
							   list.push('<p><span>··</span><strong>小辣椒商城回复：</strong>页面会弹出收藏成功的提示。您可在"个人中心"的我的收藏查看所有收藏商品。在我的收藏中可以选择加入购物车，或删除已收藏的商品。</p>');
							   list.push('</li>')
						   }
						   $(list.join("")).appendTo(ul);
					   }


				   }
			   });
		   }else if(parent&&parent=="UserEvaluation"){


			  var num= ($("#"+parent).find(".all-percent li")).index($(".all-percent li.on")[0])
			   $.ajax({

				   type: "GET",
				   dataType:"JSON",
				   url: "eventlib/goods.php?act=comment_more",
				   data: "goods_id="+$('#goods_id').val()+'&more_num='+$('#more_num').val()+'&comment_type='+$('#comment_type').val(),
				   beforeSend:function(){
					   $(_this).html("加载中……");
				   },
				   complete:function(){
					   $(_this).html(text);
				   },
				   success: function(result){
					   $('#AllPercent').last().append(result.message);
					   $("#more_num").val(result.more_num);
					   if(result.data_num != 5) {
						   $(".more").hide();
					   }
					   $.getScript('themes/newxlj/script/loadjs.js');
				   }
			   });
		   }
	});

	/*表单提交*/
	$("#ContentSub").off().on("click",function(e){
		e.stopPropagation();
		e.preventDefault();
		var str="";
		var ConsultContent=$("#ConsultContent").val();
		var stat=$('[name=comment_rank]:radio:checked').val();

		if($(this).attr("data-val") == 1){
			alert("评论已经提交, 请等待显示!");
			return false;
		}

		if(ConsultContent==""){
			alert("您尚未输入评论内容!");
			return false;
		}
		else if(getByteLen(ConsultContent)>600){
			alert("您输入的咨询内容超过字数限制，请减少字数输入！");
			return false;
		}

		$("#consultForm").ajaxSubmit({
			url:"eventlib/goods.php?act=comment_insert",
			type:"post",
			enctype:"multipart/form-data",
			contentType: "application/x-www-form-urlencoded; charset=utf-8",
			dataType:"json",
			beforeSend:function(){
				$('#ContentSub').val('提交中...');
				$('#ContentSub').attr('disabled',"true");
			},
			success: function(result){
				if(result.error == 2) {
					if(confirm(result.message)) {
						location = result.url;
					}
				} else
				if(result.error == 0) {
					alert(result.message);
					$('#ConsultContent').val('');
					$("#ContentSub").attr("data-val",1);
				} else {
					alert(result.message);
				}
				$('#ContentSub').val('提交评论');
				$('#ContentSub').removeAttr("disabled");
			},
			error: function() {
				alert('错误信息，请与我们联系！');
				$('#ContentSub').val('提交评论');
				$('#ContentSub').removeAttr("disabled");
			}
		});
	});

	 /*
	 * 切换评论类型
	 */
	$("#percentComment li").on("click",function(){
		var comment_type = 0;
		var code = $(this).attr("data-code");
		var nums = $(this).attr("data-num");

		if(nums < 1) {
		    return false;
		}

		var AllPercent = $('#AllPercent');
		if(code == 'GoodPercent') {
			comment_type = 1;
		} else
		if(code == 'GeneralPercent') {
			comment_type = 2;
		} else
		if(code == 'BadPercent') {
			comment_type = 3;
		}
		$.ajax({
		   type: "GET",
		   dataType:"JSON",
		   url: "eventlib/goods.php?act=comment_more",
		   data: "goods_id="+$('#goods_id').val()+'&more_num=0&comment_type='+comment_type,
		   beforeSend:function(){
			   $(AllPercent).html("加载中……");
		   },
		   success: function(result){
			   $(AllPercent).html(result.message);
			   $("#more_num").val(result.more_num);
			   $("#comment_type").val(comment_type);
			   if(result.data_num != 5) {
				   $(".more").hide();
			   } else {
				   $(".more").show();
			   }
			   $.getScript('themes/newxlj/script/loadjs.js');
		   }
		});
	});
    $(document).off("click","#close").on("click","#close",function(e){
        e.stopPropagation();
        $("#dialog-modal").dialog("close");
    });
    $(document).off("click","#ArrivalSubmit").on("click","#ArrivalSubmit",function(){
        var ArrivalTel=$("#ArrivalTel").val(),
            ArrivalEmail=$("#ArrivalEmail").val(),
            tel=/^1[3|4|5|8|7][0-9]\d{8}$/,
            temail = /([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)/;
        if(ArrivalTel==""){
            alert("联系电话不能为空！");
            return;
        }else if(!tel.test(ArrivalTel)){
            alert("联系电话不正确！");
            return;
        }else if(ArrivalEmail==""){
            alert("电子邮箱不能为空！");
        }else if(!temail.test(ArrivalEmail)){
            alert("电子邮箱不正确！");
        }else{
            $("#dialog-modal").dialog("close");
		    document.forms['out_of_stock'].submit();
            return true;
        }
    })
})

/*加载指定参数*/
function pageload(){
	$(".xlj-prodesc").slide({titCell:".goods-desc-menu li",mainCell:".xlj-desc-box"});
	$("#UserEvaluation").slide({titCell:".all-percent li",mainCell:".goods-percent"});
	$(".imgInfo").slide({mainCell:".imgInfo_img ul",effect:"left",titCell:".picture img",titOnClassName:"onbg",prevCell:"#goodsPicPrev",nextCell:"#goodsPicNext",trigger:"click"});
	$("img.lazy").lazyload({
		threshold : 200,
		effect : "fadeIn",
		placeholder : "http://theme.xiaolajiao.com/themes/newxlj/images/placeholder.gif"
	});
}

function evelazyload() {
	$("img.commentlazy").lazyload({
		threshold : 200,
		event: "sporty",
		placeholder : "http://theme.xiaolajiao.com/themes/newxlj/images/placeholder.gif"
	});
	$(window).bind("load", function() {
		 var timeout = setTimeout(function() {
			$("img.commentlazy").trigger("sporty");
		 }, 2000);
	 });
}

/*详情页滚动BAR*/
$(function(){

    var desc_top = $(".xlj-prodesc").offset().top;

    $(window).scroll(function(){
        if ($(window).scrollTop() > $(".xlj-prodesc").offset().top + 52){
            $("#goodsSubBar").show().addClass("goods-sub-bar-play");
            var goodLi=$(".goods-desc-menu ul li");
            for(var mi=0;mi<goodLi.length;mi++){
                if($(goodLi[mi]).hasClass('on')){
                    $("#goodsSubMenu ul li").eq(mi).addClass("on").siblings().removeClass("on");
                }
            }
		$(".back-top").css("display","block");

        }else{
            $("#goodsSubBar").hide().removeClass("goods-sub-bar-play");
			$(".back-top").css("display","none");
        }

    });

    $("#goodsSubMenu ul li").on("click",function(){
        $(this).addClass("on").siblings().removeClass("on")
        var i = $(this).index();
        $(".goods-desc-menu ul li").eq(i).click();
        $("html,body").animate({scrollTop:$(".xlj-prodesc").offset().top})
    })
	
	$(".reserve_button,.reserve_close").on("click",function(){
		$(".reserve_div,.reserve_smark").hide();
	});
});