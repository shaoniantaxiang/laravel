// JavaScript Document



$(function () {

	

	/*延迟加载*/

     $("img.lazy").lazyload({

        threshold : 200,

        effect : "fadeIn",

        placeholder : "http://image.xiaolajiao.com/images/20150330/placeholder.gif"

    });



	/*客服*/

	$(window).scroll(function(){

		 if ($(window).scrollTop() > $(".preferential-subarea").offset().top){

			 $(".fixed-top").css("display","block");

		}else{

			$(".fixed-top").css("display","none");

		}

	});



	

	/*明星商品*/

	$(".star-goods-li").hover( 

		function(event){

				var a=$(this).children(".star-goods-content");

				var b=$(this).children(".star-goods-details");

				var c=$(this).find(".star-goods-content-text");

				var d=$(this).find(".star-goods-details-links");

				a.stop().css("left","-34%");

				b.stop().css("right","0");

				c.stop().css("left","-100%");

				d.stop().css("right","0");

				$(this).css("background-color","#f5f4f4");

				

		}, function(event){

			var a=$(this).children(".star-goods-content");

			var b=$(this).children(".star-goods-details");

			var c=$(this).find(".star-goods-content-text");

			var d=$(this).find(".star-goods-details-links");

			a.stop().css("left","0");

			b.stop().css("right","-51%");

			c.stop().css("left","0");

			d.stop().css("right","-100%");

			$(this).css("background-color","#ececec");

	});

		

		if($(".star-goods-content").length>5){

			$(".star-move").css("display","block");

		}else{

			$(".star-move").css("display","none");

		}

	

		var star_len=$(".star-goods-content").length;

		var star_width=$(".star-goods-li").width();

		var star_sum=star_len*star_width-(star_width*5)+(10*(star_len-5));

	

		$(".star-move-left").click(function(){

			$(".star-goods").css("margin-left","0");

		})

		

		$(".star-move-right").click(function(){

			$(".star-goods").css("margin-left","-"+star_sum+"px");

		})

	

	

	/*banner图*/

	$(".banner-link-hd li").first().addClass("on");

	 var defaultInd = 0;

	 var list = $('.banner-show');

	 var count = 0;

	 var change = function(newInd, callback){

		 if(count) return;

		 count = 2;

		$(list[defaultInd]).fadeOut(400, function(){

			count--;

			if(count <= 0){

				if(start.timer) window.clearTimeout(start.timer);

				callback && callback();

			}

		});

		 $(list[newInd]).fadeIn(400, function(){

			defaultInd = newInd;

			count--;

			if(count <= 0){

				if(start.timer) window.clearTimeout(start.timer);

				callback && callback();

			}

		});

		roll(newInd);

	}

	

	 var next = function(callback){

		 var newInd = defaultInd + 1;

		 if(newInd >= list.length){

			newInd = 0;

		 }

		 change(newInd, callback);

	 }

	 

	 /*banner点击区域链接*/

	var banner_click=function () {

		var bl=$("#slideBox").children("div").length;

		var arr=[];

		$(".banner-href").click(function(){	

			for(i=0;i<bl;i++){					

				arr[i]=$(".banner-show:eq("+i+")").attr("data-href");

				if($(".banner-show:eq("+i+")").css("display")=="block"){

					window.open(arr[i]);

				}

			}

		});

	}	



	 var start = function(){

		if(start.timer) window.clearTimeout(start.timer);

	 	start.timer = window.setTimeout(function(){

			next(function(){

				start();

			});

	 	}, 3000);

	}

	

	start();

	banner_click();

	

	 $('#js_ban_button_box').on('click', 'a', function(){

	 	var btn = $(this);

		if(btn.hasClass('banner-control-right')){

			//next

			next(function(){

				start();

			});

		}

		else{

			//prev

			 var newInd = defaultInd - 1;

			 if(newInd < 0){

			 	newInd = list.length - 1;

			 }

	 		change(newInd, function(){

			start();

		});

	}

	 return false;

	});



	//图片序号滚动

	var roll = function (newInd) {

		$('.banner-link-hd li').each(function(index, element) {

            	if(newInd == index) {

					$(this).addClass("on");

				} else {

					$(this).removeClass("on");

				}

        });	

	}

	

	/*鼠标悬浮图片停止轮播*/

	$(".banner-link-region").hover(

		function(){

        	clearInterval(start.timer);

		},function(){

			start();

		}

	)

	



	//图片序号点击

	var link= function () {

		$(".banner-link-hd").find("li").each(function(index,item){ 

			$(this).click(function(ind){ 

				if($(this).attr("class") != 'on') {

					change(index, function(){

						start();

					});

				}

				

			});

		});

	}

	link();	



	/*精选配件,评论字数限制*/

	$(".review").each(function(){

		var maxwidth=27;

		if($(this).text().length>maxwidth){

			$(this).text($(this).text().substring(0,maxwidth));

			$(this).html($(this).html()+'…');

		}

	});





	/*底部广告滚动*/

	$(".website-content ul li").hover(function () {

                jQuery(this).find(".prev,.next").stop(true, true).fadeTo("show", 0.5)

            }



            , function () {

                jQuery(this).find(".prev,.next").fadeOut()

            }



    );

    $(".website-content ul li").slide({

        titCell: ".hd ul",

        mainCell: ".bd ul",

        effect: "fold",

        autoPlay: true,

        autoPage: true,

        trigger: "click",

        startFun: function (i) {

            var curLi = jQuery(".website-content .bd li").eq(i);

            if (!!curLi.attr("_src")) {

                curLi.css("background-image", curLi.attr("_src")).removeAttr("_src")

            }



        }

    });

});	