@extends('home.parent.index')


@section('metalink')
	@include('home.index.metalink')
@endsection


@section('script')
	@include('home.index.script')
@endsection


@section('subject')
<div class="site-banner" id="slideBox">


@foreach($lunbo as $v)
<div class="banner-show banner-href" style="display:block;background-image: url({{ $v->pic }});" class="indexturn"></div>
@endforeach

</div>

    

    <div class="login-info-main">

        <div class="login-info-relative">

            <div class="login-info">

                <div class="login-info-icon"></div>

                <ul>

                    <li class="first"><a href="user.php?act=order_list">我的订单</a></li>

                    <li><a href="user.php?act=transform_points">我的积分</a></li>

                    <li><a href="user.php?act=bonus">我的优惠券</a></li>

                    <li class="last"><a href="http://account.xiaolajiao.com/passport.php?act=logout&callback=http%3A%2F%2Fwww.xiaolajiao.com%2F">退出登录</a></li>

                </ul>

            </div>

         </div>

    </div>

 

    <div class="xlj-cart-main" id="xlj_cart_list"></div>



<!--=====================顶部导航栏《小辣椒》选项=========================-->

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

<!--=====================顶部导航栏《小辣椒》选项=========================-->

<!--=====================顶部导航栏《红辣椒》选项=========================-->

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
<!--=====================顶部导航栏《红辣椒》选项=========================-->


<div class="site-header">

<div class="site-header-relative">



    

    <a href="/home/index/inx"><div class="site-header-logo"></div></a>

    

    

        <div class="site-header-nav">

	<ul>
<!--=====================顶部导航栏《选项卡》选项=========================-->
		
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
<!--=====================顶部导航栏《选项卡》选项=========================-->
		

	</ul>

</div>        

    

    

    <div class="site-header-right">

	    <div class="site-header-search hidden">

		<form id="xlj-search" class="xlj-search-form clearfix" action="search.php" method="get">

			<input class="search-submit" type="submit" value="">

			<div class="search-input-box">

				<input class="search-input" placeholder="" type="text" value="" name="keywords" >
							<!--=====================顶部导航栏 右边《搜索(放大镜)》选项=========================-->
								<a class="search-link" href="/goods-395.html">小辣椒PLAYER</a>

				<ul>

									<li><a href="/goods-395.html">小辣椒PLAYER</a></li>

									<li><a href="/goods-407.html">小辣椒X7 全网通（金色）</a></li>

									<li><a href="/goods-391.html">小辣椒老人机K2</a></li>

								</ul>
							<!--=====================顶部导航栏 右边《搜索(放大镜)》选项=========================-->
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



 <div id="J_topBn" class="site-bn site-bn-bg">

    <div class="container clearfix">

        <div class="site-bn-main">

            <div class="links">

                <a class="btn-link-common btn-link" href="http://www.xiaolajiao.com/goods-341.html">立即抢购</a>

                 <a class="btn-link-common btn-enter J_closeBn" href="javascript: void(0);">

                 <span class="counter J_counter">5秒</span> 进入官网</a>

            </div>

        </div>

        <a class="close J_closeBn" href="javascript:void(0);"><i class="iconfont">&#xe602;</i></a>

    </div>

</div>



 

         

        <div class="category-column">

            <div class="goods-category">

            <ul>

	<!--分类列表循环-->

	<li class="goods-category-li">

		<div class="goods-category-name">
		@foreach($type as $v)
		@if($v->id == 1)
			<div class="goods-category-title">

				<a href="/home/list/inx/{{ $v->id }}">{{ $v->classname }}</a> 

			</div>
		@endif
		@endforeach
			<div class="goods-category-links">

				<ul>
					
					@foreach($good as $v)
					@if(($v->typeid==9 || $v->typeid==10 || $v->typeid==11) && $v->dppg==1 && $v->dpps==3 && $v->state==1)
					<li>

						<a href="/home/detail/inx/{{ $v->id }}">{{ $v->title }}</a> 

					</li>
					@endif
					@endforeach
					

				</ul>

			</div>

		</div>

		<div class="goods-category-second">

			<ul>

				@foreach($good as $v)
				@if(($v->typeid==9 || $v->typeid==10 || $v->typeid==11) && $v->dppg==1 && $v->dpps==2 && $v->state==1)
				<li>
					
					<a href="/home/detail/inx/{{ $v->id }}">
						<img src="{{ $v->main_figure }}" />
						<span>{{ $v->title }}</span>
					</a> 

				</li>
				@endif
				@endforeach
				

			</ul>

			

		</div>

	</li>

<!--END分类列表循环--><!--分类列表循环-->

	<li class="goods-category-li">

		<div class="goods-category-name">

			@foreach($type as $v)
			@if($v->id == 2)
				<div class="goods-category-title">

					<a href="/home/list/inx/{{ $v->id }}">{{ $v->classname }}</a> 

				</div>
			@endif
			@endforeach

			<div class="goods-category-links">

				<ul>

					@foreach($good as $v)
					@if(($v->typeid==12 || $v->typeid==13) && $v->dppg==1 && $v->dpps==3 && $v->state==1)
					<li>

						<a href="/home/detail/inx/{{ $v->id }}">{{ $v->title }}</a> 

					</li>
					@endif
					@endforeach

				</ul>

			</div>

		</div>

		<div class="goods-category-second">

			<ul>

				@foreach($good as $v)
				@if(($v->typeid==12 || $v->typeid==13) && $v->dppg==1 && $v->dpps==2 && $v->state==1)
				<li>
					
					<a href="/home/detail/inx/{{ $v->id }}">
						<img src="{{ $v->main_figure }}" />
						<span>{{ $v->title }}</span>
					</a> 

				</li>
				@endif
				@endforeach

			</ul>

		</div>

	</li>

<!--END分类列表循环--><!--分类列表循环-->

	<li class="goods-category-li">

		<div class="goods-category-name">

			@foreach($type as $v)
			@if($v->id == 3)
				<div class="goods-category-title">

					<a href="/home/list/inx/{{ $v->id }}">{{ $v->classname }}</a> 

				</div>
			@endif
			@endforeach

			<div class="goods-category-links">

				<ul>

					@foreach($good as $v)
					@if(($v->typeid==14 || $v->typeid==15 || $v->typeid==16) && $v->dppg==1 && $v->dpps==3 && $v->state==1)
					<li>

						<a href="/home/detail/inx/{{ $v->id }}">{{ $v->title }}</a> 

					</li>
					@endif
					@endforeach

				</ul>

			</div>

		</div>

		<div class="goods-category-second">

			<ul>

				@foreach($good as $v)
				@if(($v->typeid==14 || $v->typeid==15 || $v->typeid==16) && $v->dppg==1 && $v->dpps==2 && $v->state==1)
				<li>
					
					<a href="/home/detail/inx/{{ $v->id }}">
						<img src="{{ $v->main_figure }}" />
						<span>{{ $v->title }}</span>
					</a> 

				</li>
				@endif
				@endforeach

			</ul>

		</div>

	</li>

<!--END分类列表循环--><!--分类列表循环-->

	<li class="goods-category-li">

		<div class="goods-category-name">

			@foreach($type as $v)
			@if($v->id == 4)
				<div class="goods-category-title">

					<a href="/home/list/inx/{{ $v->id }}">{{ $v->classname }}</a> 

				</div>
			@endif
			@endforeach

			<div class="goods-category-links">

				<ul>

					@foreach($good as $v)
					@if(($v->typeid==17 || $v->typeid==18 || $v->typeid==19 || $v->typeid==20) && $v->dppg==1 && $v->dpps==3 && $v->state==1)
					<li>

						<a href="/home/detail/inx/{{ $v->id }}">{{ $v->title }}</a> 

					</li>
					@endif
					@endforeach

				</ul>

			</div>

		</div>

		<div class="goods-category-second">

			<ul>

				@foreach($good as $v)
				@if(($v->typeid==17 || $v->typeid==18 || $v->typeid==19 || $v->typeid==20) && $v->dppg==1 && $v->dpps==2 && $v->state==1)
				<li>
					
					<a href="/home/detail/inx/{{ $v->id }}">
						<img src="{{ $v->main_figure }}" />
						<span>{{ $v->title }}</span>
					</a> 

				</li>
				@endif
				@endforeach

			</ul>

		</div>

	</li>

<!--END分类列表循环--><!--分类列表循环-->

	<li class="goods-category-li">

		<div class="goods-category-name">

			@foreach($type as $v)
			@if($v->id == 5)
				<div class="goods-category-title">

					<a href="/home/list/inx/{{ $v->id }}">{{ $v->classname }}</a> 

				</div>
			@endif
			@endforeach

			<div class="goods-category-links">

				<ul>

					@foreach($good as $v)
					@if(($v->typeid==21 || $v->typeid==22 || $v->typeid==23) && $v->dppg==1 && $v->dpps==3 && $v->state==1)
					<li>

						<a href="/home/detail/inx/{{ $v->id }}">{{ $v->title }}</a> 

					</li>
					@endif
					@endforeach

				</ul>

			</div>

		</div>

		<div class="goods-category-second">

			<ul>

				@foreach($good as $v)
				@if(($v->typeid==21 || $v->typeid==22 || $v->typeid==23) && $v->dppg==1 && $v->dpps==2 && $v->state==1)
				<li>
					
					<a href="/home/detail/inx/{{ $v->id }}">
						<img src="{{ $v->main_figure }}" />
						<span>{{ $v->title }}</span>
					</a> 

				</li>
				@endif
				@endforeach

			</ul>

		</div>

	</li>

<!--END分类列表循环-->

</ul>        </div>

        

        

        <div class="banner-link-region banner-href">

        	<div class="banner-control" id="js_ban_button_box"> 

            <a href="javascript:;" class="banner-control-left"></a> 

            <a href="javascript:;" class="banner-control-right"></a> </div>

        </div>

        

        
	<!-- 首页轮播图 指示点 -->
      <!--   <div class="banner-link-hd">

           <ul>

	     	     <li></li>

	     	     <li></li>

	     	     <li></li>

	     	   </ul>

	</div> -->
	<!-- 首页轮播图 指示点 -->
    </div>

  </div> 

 

 

     

	<div class="star-goods-list">

    	<h2>小辣椒明星产品</h2>

        <div class="star-move">

          <a class="star-move-left" href="javascript:void(0)">&lt;</a>

          <a class="star-move-right" href="javascript:void(0)">&gt;</a>

        </div>

        <div class="star-goods">

           <ul>

	<!--循环-->
	@foreach($good as $v)
	@if($v->dppg==1 && $v->dpps==4 && $v->state==1)
	<li class="star-goods-li">

		<span class="sign" style="background-color:#83c44e;">新品</span> 

		<div class="star-goods-content">

			<img src="{{ $v->main_figure }}" /> 

			<div class="star-goods-content-text">

				<p class="star-goods-content-title">

					{{ $v->title }}

				</p>

				<p class="star-goods-content-introduce">

					{{ $v->subtitle }}

				</p>

				<p class="star-goods-content-price">

					¥{{ $v->nowprice }}

				</p>

			</div>

		</div>

		<div class="star-goods-details" style="right:-51%;">

			<p class="star-goods-details-title">

				{{ $v->title }}

			</p>

			<p class="star-goods-details-price">

				¥{{ $v->nowprice }}

			</p>

			<ul class="star-goods-details-parameter ">
				
				@foreach(json_decode(\App\Http\Controllers\home\homeIndexController::setscript($v->script),true) as $val)
				<li>

					{{ $val }}

				</li>
				@endforeach
				

			</ul>

		</div>

		<div class="star-goods-details-links" style="right:-101%;">

			<a class="star-goods-details-links01" href="/home/detail/inx/{{ $v->id }}">立即购买</a> <a class="star-goods-details-links02" href="/home/detail/inx/{{ $v->id }}">查看详情</a> 

		</div>

	</li>
	@endif
	@endforeach
<!--END循环-->

</ul>        </div>

    </div> 

 	

	<div class="recommend-for-your">

    	<h2>为你推荐</h2>

        <a class="preferential-subarea-more" href="/home/list/inx/1">查看全部>></a>

        <div class="recommend-big">
			@foreach($good as $v)
			@if($v->dppg==1 && $v->dpps==6 && $v->state==1)
			<a href="/home/detail/inx/{{ $v->id }}" target="_blank">
				<img class="lazy" src="{{ $v->main_figure }}">
			</a>
			@endif
			@endforeach
		</div>

        

        <div class="etui-right">

        	<ul>
				
				@foreach($good as $v)
				@if($v->dppg==1 && $v->dpps==5 && $v->state==1)
		                <li class="preferential-normal ">

                    <a href="/home/detail/inx/{{ $v->id }}" target="_blank">

                        <img src="{{ $v->main_figure }}">

                        <p class="preferential-normal-title">{{ $v->title }}</p>

<p class="preferential-normal-introduce">{{ $v->subtitle }}</p>						<p class="preferential-normal-price3">819356人推荐</p>

			                    </a>

                </li>
                @endif
				@endforeach

		    </ul>

        </div>

    </div> 

   

	<div class="preferential-subarea">

    	<h2>小辣椒特惠及套餐</h2>

        <a class="preferential-subarea-more" href="/home/list/inx/2">查看全部>></a>

        

    	<div class="etui">

        	<div class="etui-left">

						
		@foreach($good as $v)
		@if($v->dppg==1 && $v->dpps==8 && $v->state==1)
		<div class="etui-long ">
			<a href="/home/detail/inx/{{ $v->id }}" target="_blank">
				<img class="lazy" src="{{ $v->main_figure }}">
			</a>
		</div>
		@endif
		@endforeach
		

								<!-- <div class="etui-long revise-top">

		<a href="affiche.php?ad_id=605&uri=http://www.xiaolajiao.com/goods-396.html" target="_blank"><img class="lazy" data-original="http://image.xiaolajiao.com/data/afficheimg/1489402674861480912.jpg?v=20161118"></a>

		</div> -->

				            </div>

               

            <div class="etui-right">

                <ul>

                @foreach($good as $v)
                @if($v->dppg==1 && $v->dpps==7 && $v->state==1)

		                        <li class="preferential-normal ">

                        <a href="/home/detail/inx/{{ $v->id }}" target="_blank">

                        <img src="{{ $v->main_figure }}">

                        <p class="preferential-normal-title">{{ $v->title }}</p>

<p class="preferential-normal-introduce">{{ $v->subtitle }}</p>

<p class="preferential-normal-price1">¥{{ $v->nowprice }}<span>¥{{ $v->oldprice }}</span></p>                        </a>

                    </li>
				@endif
				@endforeach
                                    </ul>

            </div>   

                 

         </div>   

	</div>

 

     

	<div class="selection-parts-list">

    	<h2>精选配件</h2>

        <div class="selection-parts">

        	<div class="selection-parts-left">
					
					@foreach($good as $v)
					@if($v->dppg==1 && $v->dpps==10 && $v->state==1)
						<a href="/home/detail/inx/{{ $v->id }}" target="_blank">
							<img class="lazy" src="{{ $v->main_figure }}">
						</a>
					@endif
					@endforeach
				            </div>

        	<div class="selection-parts-right">

            	<ul>

				@foreach($good as $v)
				@if($v->dppg==1 && $v->dpps==9 && $v->state==1)
				    <li >

		    <a href="/home/detail/inx/{{ $v->id }}" target="_blank">
		    <img class="lazy" src="{{ $v->main_figure }}">

		    <p class="selection-parts-right-title">{{ $v->title }}</p>

<p class="selection-parts-right-introduce"></p>

<p class="selection-parts-right-price">¥{{ $v->nowprice }}</p>		    </a>

		                        </li>
		        @endif
				@endforeach




		            	</ul>

            </div>

        

        </div>

    </div> 

     

	<div class="website-content">

    	<h2>内容</h2>

        <div class="website-content-list">

        	<ul>

                

                <li>

                         

                            <div class="hd">

                                <ul>

                                    <li></li>

                                </ul>

                            </div>

                        

                        	

                            <div class="bd">

                                <ul>

				                                        <li><a href="http://" target="_blank" rel="nofollow"><img class="lazy" data-original="http://image.xiaolajiao.com/data/article/1483581344469848935.jpg?v=20161118">

				    <p class="activity-title">神探夏洛克来啦！</p>

				    <p class="activity-content">三年等三集，卷福回归，小辣椒邀您一起观看神探夏洛克</p>

				    </a>

				    </li>

				                                        <li><a href="http://bbs.xiaolajiao.com/thread-61892-1-1.html" target="_blank" rel="nofollow"><img class="lazy" data-original="http://image.xiaolajiao.com/images/upload/image/20160804/20160804195001_45215.png">

				    <p class="activity-title">七夕秀恩爱，好礼送不停</p>

				    <p class="activity-content">七夕快到了

还在担心没礼物吗

不用担心

小辣椒好礼送不停

</p>

				    </a>

				    </li>

				                                        <li><a href="http://bbs.xiaolajiao.com/thread-59644-1-1.html" target="_blank" rel="nofollow"><img class="lazy" data-original="http://image.xiaolajiao.com/images/upload/image/20160518/20160518191603_16356.png">

				    <p class="activity-title">小辣椒荣誉测试团招募（第七期）：新机试用，约不？</p>

				    <p class="activity-content">你想搞机吗？想免费试用小辣椒的手机吗？想得到小辣椒送出的神秘礼物吗？心动不如行动，赶紧报名参加吧！</p>

				    </a>

				    </li>

				                                        <li><a href="http://bbs.xiaolajiao.com/thread-59525-1-1.html" target="_blank" rel="nofollow"><img class="lazy" data-original="http://image.xiaolajiao.com/images/upload/image/20160512/20160512112549_85091.png">

				    <p class="activity-title">小辣椒社区升级新玩法——随便拍</p>

				    <p class="activity-content">即日起，为了使辣粉更好的玩转小辣椒社区，更好的找到需要的资源，小辣椒社区版块将全面升级，特教辣粉们玩转随手拍版块！</p>

				    </a>

				    </li>

				                                        <li><a href="http://bbs.xiaolajiao.com/thread-59329-1-1.html" target="_blank" rel="nofollow"><img class="lazy" data-original="http://image.xiaolajiao.com/images/upload/image/20160429/20160429151257_62293.png">

				    <p class="activity-title">小辣椒社区社区版主团队招募中！</p>

				    <p class="activity-content">招募！招募！招募！重要的事情说三遍！小辣椒社区招募版主，礼品多多，活动多多，想参加的赶紧行动起来吧！</p>

				    </a>

				    </li>

				                                    </ul>

                             </div>

                                    

                            <h3>热门内容</h3>

                        

                        <a class="prev" href="javascript:void(0)"></a>

                        <a class="next" href="javascript:void(0)"></a>

                </li>

		

                

                <li>

                         

                            <div class="hd">

                                <ul>

                                    <li></li>

                                </ul>

                            </div>

                        

                        	

                            <div class="bd">

                                <ul>

				                                        <li><a href="http://download.xiaolajiao.com/ilagame/" target="_blank" rel="nofollow"><img class="lazy" data-original="http://image.xiaolajiao.com/images/upload/image/20151218/20151218161856_36195.jpg">

				    <p class="activity-title">小辣椒游戏中心</p>

				    <p class="activity-content">最新，最全，最具人气

游戏丰富，界面简洁，急速下载，安全稳定

精选游戏每日推荐 攻略礼包发不停</p>

				    </a>

				    </li>

				                                        <li><a href="http://bbs.xiaolajiao.com/thread-58739-1-1.html" target="_blank" rel="nofollow"><img class="lazy" data-original="http://image.xiaolajiao.com/images/upload/image/20160329/20160329112213_67805.jpg">

				    <p class="activity-title">唯美仙侠3D手游-青丘狐传说</p>

				    <p class="activity-content">360度真3D大世界，全息无限制城战，自定义情缘恋爱系统，开启浪漫家园同居生活，打造唯美仙侠3DMMO手游！</p>

				    </a>

				    </li>

				                                    </ul>

                             </div>

                                    

                            <h3>游戏</h3>     

                        

                        <a class="prev" href="javascript:void(0)"></a>

                        <a class="next" href="javascript:void(0)"></a>

                </li>

                

                

                

                <li>

                         

                            <div class="hd">

                                <ul>

                                    <li></li>

                                </ul>

                            </div>

                        

                        	

                            <div class="bd">

                                <ul>

				                                        <li><a href="http://www.xiaolajiao.com/article-392.html" target="_blank"><img class="lazy" data-original="http://image.xiaolajiao.com/data/article/1480757918202049601.jpg?v=20161118">

				    <p class="activity-title">小辣椒PLAYER测评</p>

				    <p class="activity-content">汇总Player在各大科技专业媒体对Player手机的测评作品，看看这里面是否有关于Player你最想要了解的问题及答案呢，快前往各大科技媒体，进一步了解超智能VR手机吧。</p>

				    </a>

				    </li>

				                                    </ul>

                             </div>

                                    

                            <h3>测评与视频</h3>        

                        

                        <a class="prev" href="javascript:void(0)"></a>

                        <a class="next" href="javascript:void(0)"></a>

                </li>

                

                

            	<li>

                         

                            <div class="hd">

                                <ul>

                                    <li></li>

                                </ul>

                            </div>

                        

                        	

                            <div class="bd">

                                <ul>

				                                        <li><a href="http://www.xiaolajiao.com" target="_blank"><img class="lazy" data-original="http://image.xiaolajiao.com/data/article/1460966976074376982.jpg?v=20161118">

				    <p class="activity-title">扫码立即享受1对1售后服务！</p>

				    <p class="activity-content">小辣椒官网微信服务号上线啦！在线客服，订单查询，最新资讯，资源下载，即时随手解决手机和订单问题！快来微信扫一扫吧！</p>

				    </a>

				    </li>

				                                    </ul>

                             </div>    

                            <h3>售后服务</h3>                                

                        

                        <a class="prev" href="javascript:void(0)"></a>

                        <a class="next" href="javascript:void(0)"></a>

                </li>

                

            </ul>

        </div>

    </div>  

@endsection
