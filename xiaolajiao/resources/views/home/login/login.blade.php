<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="Keywords" content="">
    <meta name="Description" content="">
    <title>用户登录 - 小辣椒手机官网</title>
    <link rel="shortcut icon" href="http://account.xiaolajiao.com/favicon.ico">
    <link rel="icon" href="http://account.xiaolajiao.com/favicon.ico" mce_href="favicon.ico" type="image/x-icon">
    <link href="/home/login/user.css" rel="stylesheet" type="text/css">
    <script src="/home/login/linkid.js" async="" type="text/javascript"></script>
    <script src="/home/login/analytics.js" async=""></script>
    <script src="/home/login/clicki.js" charset="UTF-8" type="text/javascript" id="__clicki_js_tracker_loader__"></script>
    <script src="/home/login/10124" charset="utf-8" async="" type="text/javascript"></script>
    <script src="/home/login/0" async="" type="text/javascript"></script>
    <script src="/home/login/10175.js" async=""></script>
    <script type="text/javascript" src="/home/login/formValidatorRegex.js"></script>
    <script src='/admin/js/jquery-1.8.3.min.js' type='text/javascript'></script>
    
</head>
<body style="background:#f2f2f2;">

<div class="header_bg2">
    <div class="logo_user">
        <a href="/home/index/inx" name="top">
            <img src="/home/login/logo.gif">
        </a>
    </div>
</div>

@if (count($errors) > 0)
    <div class="cor_yellow" id='errorinfo' style='background:orange'>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if (session('msg'))
    <div class="cor_yellow" id='successinfo' style='background:orange'>
        <ul>
            <li>{!! session('msg') !!}</li>
        </ul>
    </div>
@endif

<div class="block">
<div class="usBox clearfix">
<div class="login_form">
<div class="usBox_1 clearfix">
<h4 style="margin-top:-10px">&nbsp;&nbsp;欢迎登录&nbsp;&nbsp;
    <span>
        <a target="_blank" href="http://bbs.xiaolajiao.com/thread-13291-1-1.html">(账号不能登陆？请点击)</a>
    </span><br/>
    <span style="margin-left:10px;font-size:15px;color:red;display:none" id='info'>haha</span>
</h4>
<form name="formLogin" action="/home/login/chk" method="post" id="formLogin">
{{ csrf_field() }}
	<div class="login_tdon">
    	<input name="username" id="" placeholder="邮箱/手机号码/用户名" class="inputBg input_kuang4" type="text">
        <span  class="error" id="login_usernameTip"></span>
	</div>
	<div class="login_tdon" id="pw">
        <input name="pass" placeholder="密码" id="" class="inputBg input_kuang4" maxlength="25" type="password">
        <span id="login_passwordTip"></span>
	</div>
    <div>
        <input type="text" name="yzcode"  placeholder="输入验证码" class="inputBg input_kuang4" style="width:150px">
        <img style="vertical-align: middle;cursor: pointer;" onclick="this.src='/home/login/cod/'+Math.random()" src="/home/login/cod/{{ time() }}">
        <span id="captcha_str_code" class="check_tips error_tip"></span>
              
    </div>
    <div class="login_tdon2">
        <div class="left">
            <input name="remember" id="remember" value="1" checked="checked" type="checkbox">
            <label for="remember">保存登录信息</label>
        </div>
        <div class="right">
        	<a title="忘记密码?" href="/home/findpass/inx">忘记密码?</a>
        </div>
	</div>
    <div class="login_tdon" style="height:50px">
        <input value="立即登录" class="btn btn-primary portalmargin_top " style="border:none; width:100%; margin-top:-30px;*margin-top:0;" type="submit">
    </div>
    <div class="login_tdon3">
        <div class="left">
        <span>其它帐号登录：</span>
        	<ul>
            	<li><a class="qq" title="qq" target="_blank" href="http://account.xiaolajiao.com/passport.php?act=oath&amp;type=qq&amp;callback=http%3A%2F%2Fwww.xiaolajiao.com%2Fuser.php">qq</a></li>
                <li><a class="weibo" title="微博" target="_blank" href="http://account.xiaolajiao.com/passport.php?act=oath&amp;type=weibo&amp;callback=http%3A%2F%2Fwww.xiaolajiao.com%2Fuser.php">微博</a></li>
                <li><a class="zfb" title="支付宝" target="_blank" href="http://account.xiaolajiao.com/passport.php?act=oath&amp;type=alipay&amp;callback=http%3A%2F%2Fwww.xiaolajiao.com%2Fuser.php">支付宝</a></li>
            </ul>
        </div>
        <div class="right">
        	<a title="免费注册" href="/home/register/inx">免费注册</a>
        </div>
	</div>
</form>

</div>
</div>
</div>
</div> 
<div class="blank"></div>
<div class="footer block">
    <div class="info">
         © <a href="http://www.xiaolajiao.com/">小辣椒手机官网</a> 粤ICP证B2-20130549号 粤ICP备12053227号-3号
         <p>版权所有：深圳语信时代通信设备有限公司 </p>
        <img alt="" src="/home/login/footer_img.gif">
    </div>
    <div class="believe">
        <a target="_blank" href="https://ss.cnnic.cn/verifyseal.dll?sn=e130924440300426112kgc000000&amp;ct=df&amp;a=1&amp;pa=0.8907775566913188"><img src="/home/login/cnnicVerifyseal.png" style="border:none;height:42px;" oncontextmenu="return false;" alt="可信网站"></a>
        <a target="_blank" href="https://search.szfw.org/cert/l/CX20130912002773003081"><img alt="诚信网站" src="/home/login/szfwVerifyseal.gif" style="border:none;"></a> 
        <a target="_blank" href="http://www.315online.com.cn/member/315130034.html"><img alt="诚信网站" src="/home/login/save.jpg" style="border:none;"></a> 
    </div>
</div>
</body>

<script>
  $('#successinfo').click(function(){
    $(this).slideUp("slow");
  });
  $('#errorinfo').click(function(){
    $(this).slideUp("slow");
  });
</script>
</html>