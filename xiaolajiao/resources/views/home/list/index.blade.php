@extends('home.parent.index')


@section('metalink')
    @include('home.list.metalink')
@endsection


@section('script')
    @include('home.list.script')
@endsection


@section('subject')


    <div class="login-info-main">

        <div class="login-info-relative">

            <div class="login-info">

                <div class="login-info-icon"></div>

                <ul>

                    <li class="first"><a href="user.php?act=order_list">我的订单</a></li>

                    <li><a href="user.php?act=transform_points">我的积分</a></li>

                    <li><a href="user.php?act=bonus">我的优惠券</a></li>

                    <li class="last"><a href="http://account.xiaolajiao.com/passport.php?act=logout&callback=http%3A%2F%2Fwww.xiaolajiao.com%2Fcategory-54-b0.html">退出登录</a></li>

                </ul>

            </div>

         </div>

    </div>

 

    <div class="xlj-cart-main" id="xlj_cart_list"></div>





<div class="site-header-nav-show nav-show" data-id="0">

    <ul>
        @foreach($good as $v)
        @if(($v->typeid==12 || $v->typeid==13) && $v->dppg==1 && $v->dpps==1 && $v->state==1)
        <li>

            <a href="/home/detail/inx/{{ $v->id }}"><img src="{{ $v->main_figure }}" /> 

                <p>

                    {{ $v->title }}

                </p>

                <span>{{ $v->nowprice }}</span>
            </a> 

        </li>
        @endif
        @endforeach
    </ul>
</div>

<div class="site-header-nav-show nav-show" data-id="1">

    <ul>

        @foreach($good as $v)
        @if(($v->typeid==9 || $v->typeid==10 || $v->typeid==11) && $v->dppg==1 && $v->dpps==1 && $v->state==1)
        <li>

            <a href="/home/detail/inx/{{ $v->id }}"><img src="{{ $v->main_figure }}" /> 

                <p>

                    {{ $v->title }}

                </p>

                <span>{{ $v->nowprice }}</span>
            </a> 

        </li>
        @endif
        @endforeach

    </ul>
</div>



<div class="site-header">

<div class="site-header-relative">



    

    <a href="/home/index/inx"><div class="site-header-logo"></div></a>

    

    

        <div class="site-header-nav">

	<ul>

		@foreach($type as $v)
        @if($v->id == 1)
            <li>
                <a href="/home/list/inx/{{ $v->id }}" data-id="1">{{ $v->classname }}</a>
            </li>
        @endif
        @endforeach

        @foreach($type as $v)
        @if($v->id == 2)
            <li>
                <a href="/home/list/inx/{{ $v->id }}" data-id="0">{{ $v->classname }}</a>
            </li>
        @endif
        @endforeach

        @foreach($type as $v)
        @if($v->id!=1 && $v->id!=2 && $v->xswz!=2)
            <li>
                <a href="/home/list/inx/{{ $v->id }}">{{ $v->classname }}</a>
            </li>
        @endif
        @endforeach

	</ul>

</div>        

    

    

    <div class="site-header-right">

	    <div class="site-header-search hidden">

		<form id="xlj-search" class="xlj-search-form clearfix" action="search.php" method="get">

			<input class="search-submit" type="submit" value="">

			<div class="search-input-box">

				<input class="search-input" placeholder="" type="text" value="" name="keywords" >

								<a class="search-link" href="/goods-395.html">小辣椒PLAYER</a>

				<ul>

									<li><a href="/goods-395.html">小辣椒PLAYER</a></li>

									<li><a href="/goods-407.html">小辣椒X7 全网通（金色）</a></li>

									<li><a href="/goods-391.html">小辣椒老人机K2</a></li>

								</ul>

						    </div>

		</form>

	    </div>

	    

	    

	    <div class="site-header-cart">

		<a href="/home/car/showinx" id="minCart"><i class="icon2"></i></a>

	    </div>

	    

	    <!-- 显示登录的用户 -->
        <div class="site-header-login" id="asynlogin">
        <i class="icon3"></i>
        @if(session('homeuser'))
        <p><a href="/home/center/inx" class="user-name">{{ session('homeuser')->username }}</a>|<a href="/home/login/out" class="user-name">退出</a></p>
        @else
        <p><a href="/home/login/inx" class="user-name">登录</a>|<a href="/home/register/inx" class="user-name">注册</a></p>
        @endif
        </div>
        <!-- 显示登录的用户 -->

    </div>

    



</div>

</div>

 

 



 <div class="htmleaf-container">

    <div id="blurryscroll" aria-hidden="true"></div>

</div>

 

 

 <div class="container" id="container">

		<h3 class="pro-title">商品列表</h3>

		<div class="filter-lists">

                                <dl class="xlj-filter-list xlj-filter-list-first category-filter-list clearfix">

                    <dt>商品分类：</dt>

                                        <dd>

                        <ul id="typeCat" class="clearfix">
                            @foreach($type as $v)
						    <li><a typeid="{{ $v->id }}" onclick='doTop(this)'>{{ $v->classname }}</a></li>
                            @endforeach
                        </ul>

                    </dd>

                                    </dl>

                                                <dl class="xlj-filter-list  category-filter-list clearfix">

                    <dt>适配机型：</dt>

                    <dd>

                        <ul  class="clearfix secondtype">
                            @foreach($subtype as $v)
                            <li><a typeid="{{ $v->id }}" onclick='doSecond(this)'>{{ $v->classname }}</a></li>
                            @endforeach
                        </ul>

                    </dd>

                </dl>

   </div>

          <div class="xlj-fitting">

                <span>排序方式：</span>

                <ul>
                    <li><a class="ascend" order="1"><i></i>按价格排序</a></li>
                    <li><a class="tiorder" order="1"><i></i>按添加时间</a></li>
                </ul>

                <div class="more">

                <div class="filter-stock">

                <input name="text" type="hidden" id="fittShow" value="category.php?category=54&display=grid&brand=0&promote=1&price_min=0&price_max=0&filter_attr=0&page=1&sort=goods_id&order=DESC" />

                <input name="text" type="hidden" id="fittHidn" value="category.php?category=54&display=grid&brand=0&promote=0&price_min=0&price_max=0&filter_attr=0&page=1&sort=goods_id&order=DESC" />

                <input name="text" type="hidden" id="fittId" value="0" />         

                </div>

            </div>

          </div>

        <div class="fitting-list-box clearfix">

        	<div class="fitting-box">

        		<ul class="goods_list">
                    @foreach($goods as $v)
                    <li class="tehui">

                    	<div class="item-content" id="list_437">

       						<a class="fitting-img" href="/home/detail/inx/{{ $v->id }}" title="{{ $v->title }}">
                                <img id="cart_437" src="{{ $v->main_figure }}" alt="{{ $v->title }}">
                            </a>

                            <span class="item-title">{{ $v->title }}</span>

                            <span class="item-price">￥{{ $v->nowprice }}元</span>

                            

                            <a class="item-buy goodsinfo" style="display:none" href="" data-gid="437" ><i>+</i>加入购物车</a>

                            <span class="item-flag">新品</span>

                        </div>

                    </li>
                    @endforeach


                </ul>

           </div>

        </div>
</div>
<script type="text/javascript" src="/admin/js/jquery-1.8.3.min.js"></script>
<script>
    //生成二级分类
    function setType(obj){
        $('.secondtype').find('li').remove();

        for (var i = 0; i < obj.length; i++) {
            $('.secondtype').append('<li><a typeid="'+$(obj[i]).attr('id')+'" onclick="doSecond(this)">'+$(obj[i]).attr('classname')+'</a></li>');
        };

    }

    //生成商品列表
    function setgood(obj){
        $('.goods_list').find('li').remove();
        
        for (var i = 0; i < obj.length; i++) {
            $('.goods_list').append('<li class="tehui"><div class="item-content" id="list_437"><a class="fitting-img" href="/home/detail/inx/'+$(obj[i]).attr('id')+'" title="'+$(obj[i]).attr('title')+'"><img id="cart_437" src="'+$(obj[i]).attr('main_figure')+'" alt="'+$(obj[i]).attr('title')+'"></a><span class="item-title">'+$(obj[i]).attr('title')+'</span><span class="item-price">￥'+$(obj[i]).attr('nowprice')+'元</span><span class="item-flag">新品</span></div></li>');
        };
    }

    //点击一级分类发送ajax
    function doTop(obj){
        var id = $(obj).attr('typeid');
        $.ajax({
            url:'/home/list/inxinx',
            data:{'id':id},
            type:'Get',
            dataType:'json',
            success:function(event){
                setType($(event).attr('subtype'));
                setgood($(event).attr('goods'));
            },
        });
    }

    //点击二级分类发送ajax
    function doSecond(obj){
        var id = $(obj).attr('typeid');
        $.ajax({
            url:'/home/list/sndinx',
            data:{'id':id},
            type:'Get',
            dataType:'json',
            success:function(event){
                setgood(event);
            },
        });
    }

    //按价格排序
    $('.ascend').click(function(){

        setorder($(this),1);
    });

    //按添加时间排序
    $('.tiorder').click(function(){
        setorder($(this),2);
    });

    //时间、价格排序方法
    function setorder(obj,type){
        var id = $(obj).attr('order');
        if($(obj).attr('order') == 1){
            $(obj).attr('order',2);
        }else{
            $(obj).attr('order',1);
        }
        $.ajax({
            url:'/home/list/ord',
            data:{'id':id,'type':type},
            type:'Get',
            dataType:'json',
            success:function(event){
                setgood(event);
            },
        });
    }
</script>

@endsection

 

 