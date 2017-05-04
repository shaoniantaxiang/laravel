// JavaScript Document

cartGoodsList();

/** login load **/
$.getJSON("/ajax_cache.php?act=user_info",{random:(new Date()).getTime()},function(data){
    $("#asynlogin i").remove();
    $("#asynlogin p").remove();
    $("#asynlogin").append(data.data.html);
    loginpoplist();
    $("#register-a,#login-a,#logout-a").each(function(index){
        $(this).attr("href",$(this).attr("href")+"&callback="+encodeURIComponent(window.location.href));
    });
});

if($("#xlj_cart_list").children().length == 0) {
    $.getJSON("/ajax_cache.php?act=cart", function (data) {
        showCartNumber(data.data.number);
        $("#xlj_cart_list").html(data.data.html);
        cartGoodsList();
        delCartData();
    });
} else {
    delCartData();
}

$(function(){
    window.pageConfig={
        compatible:true,
        navId:"home"
    };
    window.pageConfig=window.pageConfig||{};
    pageConfig.wideVersion=(function(){
        return(screen.width<1200);
    })();
    if(pageConfig.wideVersion&&pageConfig.compatible){
        $("body").addClass("root");
    }

    $(window).scroll(function(){
        if($(window).scrollTop() >68 ){$('.site-header').addClass('site-header-move');}
        else{$('.site-header').removeClass('site-header-move');}
    });

    $(".nav-show").mouseover(function(){
        $(".site-header-move").addClass('site-header-movehover');
    });
    $(".nav-show").mouseout(function(){
        $(".site-header-move").removeClass('site-header-movehover');
    });

    /*导航下的商品*/
    $(".site-header-nav").find("a").hover(
        function(event){
            $(".nav-show").eq($(this).attr("data-id")).css("display","block");
        },
        function(event){
            $(".nav-show").eq($(this).attr("data-id")).css("display","none");
    });

    $(".nav-show").mouseover(function(){
        $(".nav-show").eq($(this).attr("data-id")).css("display","block");
		$(".htmleaf-container").css("display","block");
		$("#blurryscroll").css("height","300px");
    });
    $(".nav-show").mouseout(function(){
        $(".nav-show").eq($(this).attr("data-id")).css("display","none");
		$(".htmleaf-container").css("display","none");
		$("#blurryscroll").css("height","68px");
    });

	/*导航下的模糊效果显示*/
	$(".site-header").mouseover(function(){
        $(".htmleaf-container").css("display","block");
    });
    $(".site-header").mouseout(function(){
        $(".htmleaf-container").css("display","none");
    });
    /*
    * 暂时屏蔽，影响分类加入购物车按钮
	var pageContent = document.getElementById('container');
    if(pageContent =! '' && pageContent != undefined) {
        pagecopy = pageContent.cloneNode(true);
        blurryContent = document.getElementById('blurryscroll');
        blurryContent.appendChild(pagecopy);
        window.onscroll = function () {
            blurryContent.scrollTop = window.pageYOffset;
        };
    }
    */

    $(".search-submit").click(function(){
        var keyname = $(".search-input").val();
        if(keyname == "") {
            var valname = $(".search-link").html();
            $(".search-input").val(valname);
            $(".search-link").hide();
            $("#xlj-search").submit();
        }
    });

    /*搜索框*/
     $(".site-header-search").hover(
        function () {
            $(".site-header-search").removeClass("hidden");
            $(".search-input-box").css("left","0");
            
            $(".search-submit").css("border","solid 1px #c3c2c2");
          	$(".search-input").focus(function(){
				$(".search-input-box").css({"left":"0","display":"block"});
        		$(".search-submit").css("border","solid 1px #c3c2c2");
        		$(".search-input-box ul").show();
        		$(".search-link").hide();
			}),$(".search-input").blur(function(){
             	 setTimeout(function(){
		            $(".search-input-box ul").hide();
             		$(".search-link").show();
		        }, 300);
			});
        },
        function () {
			var isFocus=$(".search-input").is(":focus");
			//判断输入框是否获取了焦点
			if(isFocus==true){
				$(".search-input-box").css({"left":"0","display":"block"});
        		$(".search-submit").css("border","solid 1px #c3c2c2");
			}else{
             	$(".search-input-box").css("left","100%");
				$(".site-header-search").addClass("hidden");
             	$(".search-submit").css("border","0");
			}
    	});
	});


/*导航下登录列表*/
function loginpoplist(){
    $(".user-name").hover(
        function(event){
            $(".login-info-relative").css("display","block");
        },
        function(event){
                $(".login-info-relative").css("display","none");
    });

    $(".login-info-relative").mouseover(function(){
        $(".login-info-relative").css("display","block");
    });
    $(".login-info-relative").mouseout(function(){
        $(".login-info-relative").css("display","none");
    });
}

/*购物车商品*/
function cartGoodsList(){
    $(".site-header-cart").hover(
        function(event){
            $(".xlj-cart-list").css("display","block");
        },
        function(event){
                $(".xlj-cart-list").css("display","none");
    });

    $(".xlj-cart-list").mouseover(function(){
        $(".xlj-cart-list").css("display","block");
    });
    $(".xlj-cart-list").mouseout(function(){
        $(".xlj-cart-list").css("display","none");
    });
}

function delCartData(){
    $("#ECS_CARTINFO .xlj-cart-list-on-icon").off().on("click",function(){
        var dataGid=$(this).attr("data-gid");
        deleteCartGoods(dataGid);
    });
}

function getByteLen(val) {
    var len = 0;
    for (var i = 0; i < val.length; i++) {
        var a = val.charAt(i);
        if (a.match(/[^\x00-\xff]/ig) != null)
        {
            len += 2;
        }
        else
        {
            len += 1;
        }
    }
    return len;
}

/* *
 * 添加商品到购物车
 */
function addToCart(infos)
{
	var goods    = new Object();
	var spec_arr = new Array();

	goods = infos;
	spec_arr[0] = infos.spec;
	goods.spec  = spec_arr;
	//goods.parent = (typeof(infos.cid) == "undefined") ? 0 : parseInt(infos.cid);
    $.post("flow.php?step=add_to_cart", 'goods=' + $.toJSON(infos), addToCartResponse, "json");
}
/* *
 * 处理添加商品到购物车的反馈信息
 */
function addToCartResponse(result)

{

    if (result.error > 0)
    {
        // 预约跳转
        if (result.error == 9)
        {
            location.href = result.urls;
        }
        else if (result.error == 8)
        {
            if (confirm(result.message))
            {
                location.href = result.urls;
            }
        }
        // 如果需要缺货登记，跳转
        else if (result.error == 2)
        {
            ArrivalNotice(result.goods_id);
        }
        // 没选规格，弹出属性选择框
        else if (result.error == 6)
        {
            openSpeDiv(result.message, result.goods_id, result.parent);
        }
        else
        {
            alert(result.message);
        }
    }
    else
    {
        addToCartEffect(result['goods_id'], result['thumb'], result['effect']);

        var cartInfo = document.getElementById('xlj_cart_list');
        var cart_url = 'flow.php';//直接进购物车

        showCartNumber(result.number);

        if (cartInfo)
        {
			$.getScript(result.js+"public/common.js"+result.PARAMETER_CDN);
            cartInfo.innerHTML = result.content;
        }

        if (result.one_step_buy == '1')
        {
            location.href = cart_url;
        }
        else
        {
            if(result.url){
                location.href = result.url;
            }else{
                switch(result.confirm_type)
                {
                    case '1' :
                        if (confirm(result.message)) location.href = cart_url;
                        break;
                    case '2' :
                        if (!confirm(result.message)) location.href = cart_url;
                        break;
                    case '3' :
                        location.href = cart_url;
                        break;
                    default :
                        break;
                }
            }
        }
    }
}

/* *
 * 移动飞到购物车效果
 */
function addToCartEffect(goods_id, eimg, effect )
{
    if(effect == 3) {
        $('#addCart2').css({position:"relative",overflow:"hidden"});
        var c = $("<span>");
        c.html('<i class="cart_icon-add-success"></i>加入成功!').appendTo(
                $('#addCart2')).addClass("item-action-cart").animate(
            {top:"0px"},500,function(){{
                var a=$(this);
                setTimeout(function(){
                    a.animate({top:"50px"},500,function(){
                        $(this).remove();
                    });
                }, 800);
            }}
        );
    } else if(effect == 5) {
        goToCart(goods_id);
        location.href = location.href;
    }else if(effect == 1) {
        goToCart(goods_id);

    } else if(effect == 4){
        var eveSuccess;

        eveSuccess = $('<div class="item-action-icon"><span class="icon-common icon-add-success"></span>已成功加入购物车</div>'),


            $('#list_'+goods_id).append(eveSuccess);

        eveSuccess.animate({'bottom': '-2px'},  100, 'linear', function () {
            $(this).parent().find(".add-goodCart").attr('disabled',true).css("background",'#ccc')
            $(this).animate({'bottom': '-3px'},  100, 'linear').delay('1000').animate({'bottom': '-2px'},  100, 'linear', function () {
                $(this).animate({'bottom': '-40px'},  100, 'linear', function() {


                    $(this).parent().find(".add-goodCart").attr('disabled',false).css("background",'#fff');
                    $(this).remove();
                });
            });
        });


       }else {
        if($('#cart_'+goods_id).length > 0) {
            var set_top = parseInt($('#cart_'+goods_id).offset().top);
            var set_left = parseInt($('#cart_'+goods_id).offset().left)-700;
        } else {
            var set_top = 450;
            var set_left = 230;
        }

        var $pic = $('<div class="to-cart-effect"><img src="'+eimg+'" width="150" /></div>');
        $pic.css({position:'absolute', top:set_top, left:($(window).width()/2)+set_left, zindex:'9999'});
        $(document.body).append($pic);
        $pic.animate({width:0, top:20,left:($(window).width()/2)+400});
        $pic.children("img").animate({width:0, top:20,left:($(window).width()/2)+400}, "normal",function(){
            $pic.css("display","none");
        });
    }
}

/*配件加入购物车*/
function goToCart(goods_id){
    var eveSuccess;

    eveSuccess = $('<div class="item-action-icon"><span class="icon-common icon-add-success"></span>已成功加入购物车</div>'),


        $('#list_'+goods_id).append(eveSuccess);

    eveSuccess.animate({'bottom': '-7px'},  100, 'linear', function () {
        $(this).animate({'bottom': '-10px'},  100, 'linear').delay('1000').animate({'bottom': '-7px'},  100, 'linear', function () {
            $(this).animate({'bottom': '-65px'},  100, 'linear', function() {
                $(this).remove();

            });
        });

    });

    eveSuccess.on('click', function () {

        $(this).clearQueue().animate({'bottom': '-10px'},  100, 'linear', function () {
            $(this).animate({'bottom': '-65px'},  100, 'linear', function() {
                $(this).remove();

            });
        })
    });
}
/**
 * 获得选定的商品属性
 */
function getSelectedAttributes(formBuy)
{
    var spec_arr = new Array();
    var j = 0;

    for (i = 0; i < formBuy.elements.length; i ++ )
    {
        var prefix = formBuy.elements[i].name.substr(0, 5);

        if (prefix == 'spec_' && (
            ((formBuy.elements[i].type == 'radio' || formBuy.elements[i].type == 'checkbox') && formBuy.elements[i].checked) ||
                formBuy.elements[i].tagName == 'SELECT')||formBuy.elements[i].type == 'hidden')
        {
            spec_arr[j] = formBuy.elements[i].value;
            j++ ;
        }
    }

    return spec_arr;
}

/*删除商品*/
function deleteCartGoods(rec_id)
{
    $.post('delete_cart_goods.php', 'id='+rec_id+'&random='+Math.random(), deleteCartGoodsResponse,  'JSON');
}

/**
 * 接收返回的信息
 */
function deleteCartGoodsResponse(res)
{
    if (res.error)
    {
        alert(res.err_msg);
    }
    else
    {
		$.getScript(res.js+"public/common.js"+res.PARAMETER_CDN);
        showCartNumber(res.number);
        $('#xlj_cart_list').html(res.content);
    }
}
/**
 * 数量添加减少
 */

function changenum(rec_id, diff)
{
    var goods_number =Number($('#goods_number_' + rec_id).val()) + Number(diff);
    if(goods_number > 0) {
        change_goods_number(rec_id,goods_number);
    }
}
function change_goods_number(rec_id, goods_number)
{
	if(goods_number < 1) {
		alert('数量不能为零！');
	} else {
    	$.post('flow.php?step=ajax_update_cart', 'rec_id=' + rec_id +'&random='+Math.random()+'&goods_number=' + goods_number, change_goods_number_response, 'JSON');
	}
}
function change_goods_number_response(result)
{
    if (result.error == 0)
    {
        var rec_id = result.rec_id;
        for(i=0; i < result.goods_list.length; i++) {

            if(!result.goods_list[i].goods_type) {
                $('#goods_number_' +result.goods_list[i].rec_id).val(result.goods_list[i].goods_number);//更新数量
                $('#goods_subtotal_' +result.goods_list[i].rec_id).html(result.goods_subtotal);//更新小计
				$('#goods_discount_' +result.goods_list[i].rec_id).html(result.goods_list[i].total_price_discount);//更新已优惠
				$('.goods_gift_' +result.goods_list[i].rec_id).html(result.goods_list[i].goods_number);//更新赠品数量
            } else {
                $('#goods_number_' +result.goods_list[i].rec_id).html(result.goods_list[i].goods_number);//更新数量
				$('#goods_discount_' +result.goods_list[i].rec_id).html(result.goods_list[i].total_price_discount);//更新已优惠
            }

            if (result.goods_list[i].goods_number <= 0) {// 数量为零则隐藏所在行
                $('#tr_goods_' +result.goods_list[i].rec_id).css({"display": "none"});
            }
        }
        $('.total #money').html(result.total_desc);//更新合计
		$('.total #discount').html(result.goods_price_discount_format);//更新合计
        if ($('#xlj_cart_list')) {//更新购物车数量
		    $.getScript(result.js+"public/common.js"+result.PARAMETER_CDN);
            showCartNumber(result.number)
            $('#xlj_cart_list').html(result.cart_info);
        }
    } else
    if (result.message != '') {
        alert(result.message);
    }
}
function ArrivalNotice(id){
    $.getScript("themes/newxlj/script/library/jquery-ui.js", function(){
        $.ajax({
            type: "get",
            dataType: "json",
            url: "goods.php?act=out_of_stock",
            data:"goods_id="+id+"&t="+new Date().getTime(),
            success: function(data){
				if(data.error == 1) {
					if (confirm(data.message)) location.href = data.url;
				} else {
                    $("#dialog-modal").html(data.message).show().dialog({width: 550,height:260,modal: true});
				}
            }
        });
    });
}

function showCartNumber(number) {
    if(number > 0) {
        if($('#cartNumber').text() > 0) {
            $('#cartNumber').html(number);
        } else {
            $('#minCart').append('<span id="cartNumber">'+number+'</span>');
        }
    } else {
        $('#cartNumber').remove();
    }
}