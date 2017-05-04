var jsCommentFed = {
		productShow : function(){
			var currentIndex = 0;
			var liArr = $(".pro_show .thumb_box li");
			liArr.bind({
				"mouseover":function(){
					$(this).find("i").css({"top":0});
				},
				"mouseout":function(){
					$(this).find("i").css({"top":40});
				},
				"click":function(){
					currentIndex = $(this).index();
					var pic = $(this).parents(".pro_show").find(".pic_box .pic");
					move(pic.find("ul"),$(this));
					$(this).parents(".pro_show").find(".pic_box").show(350);
				}
			})

			$(".pro_show .btn_prev").click(function(){
				currentIndex--;
				var len = $(this).parents(".pro_show").find(".thumb_box li").length;
				if(currentIndex < 0) currentIndex = len - 1;
				var obj = $(this).siblings(".pic").find("ul");
				var btn = $($(this).parents(".pro_show").find(".thumb_box li")[currentIndex])
				move(obj,btn);
			})
			$(".pro_show .btn_next").click(function(){
				currentIndex++;
				var len = $(this).parents(".pro_show").find(".thumb_box li").length;
				if(currentIndex > len - 1) currentIndex = 0;
				var obj = $(this).siblings(".pic").find("ul");
				var btn = $($(this).parents(".pro_show").find(".thumb_box li")[currentIndex])
				move(obj,btn);
			})
			function move(obj,btn){
				obj.stop().animate({"left":-430 * currentIndex});
				btn.addClass("cur").siblings().removeClass("cur");
			}

			$(".pro_show .pic").bind({
				"mouseover":function(){
					$(this).find(".zoom").show();
				},
				"mousemove":function(e){
					var disX = e.pageX - $(this).offset().left - 20;
					var disY = e.pageY - $(this).offset().top - 20;
					$(this).find(".zoom").css({left:disX,top:disY})
				},
				"mouseout":function(){
					$(this).find(".zoom").hide();
				}
			})
			$(".pro_show .pic .zoom").click(function(){
				$(this).parents(".pic_box").hide(350);
				$(this).parents(".pro_show").find(".thumb_box li").removeClass("cur");
			})

		},

		main : function(){
			this.productShow();
		}
}

$(function(){
	jsCommentFed.main();
});