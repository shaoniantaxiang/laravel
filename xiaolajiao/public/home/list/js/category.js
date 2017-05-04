$(function(){
    /*product*/
    var $productList = $('.fitting-list-box');

    $productList.on({
        'mouseenter': function() {
            $(this).find(".item-buy").show();
        },
        'mouseleave': function() {
            $(this).find(".item-buy").hide();
        }
    }, 'li');
    $productList.off("click").on('click', '.goodsinfo', function(e) {
        var $this = $(this);
		e.preventDefault();
		var infos = new Object();
		
		infos.goods_id = $(this).attr("data-gid");
		infos.cid      = 0;
		infos.thumb    = $this.parent().find(".fitting-img img").attr("src");
		infos.number   = 1;
		infos.effect   = 1;
		infos.spec     = null;
		infos.plans    = null;
		infos.types    = 1;
		addToCart(infos);
		
        if ($this.hasClass('disable')) {
            return false;
        }
        $this.addClass('disable');
    });
    /*product filter*/
    $("#FilterPro").on("click",function(){
        var url;
        if(this.checked && $("#fittId").val() == 0){
        	$("#fittId").val(1);
            url=$("#fittShow").val();
        }else{
        	$("#fittId").val(0);
            url=$("#fittHidn").val();
        }
    	location.href=url;
    })
})