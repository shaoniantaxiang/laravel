<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="Keywords" content="" />

<meta name="Description" content="" />

<title>取回密码 - 小辣椒手机官网</title>

<link rel="shortcut icon" href="favicon.ico" />

<link rel="icon" href="favicon.ico" mce_href="favicon.ico" type="image/x-icon" >

<link href="/home/forgetpass/css/user.css" rel="stylesheet" type="text/css" />

</head>

<body style="background:#f2f2f2;">

<div class="header_bg2">

 <div class="logo_user" >

 <a href="/home/index/inx" name="top"><img  src="/home/forgetpass/images/logo.gif" /></a>

</div>

</div>
 
@if (session('msg'))
    <div class="retrieve_pwd" id='successinfo' style='background:orange'>
        <ul>
            <li>{!! session('msg') !!}</li>
        </ul>
    </div>
@endif
 <div class="suc_content forgetpassword">

  <div class="suc_kuang">

    <div class="hei_513" id="getPasswordArea">

      <p class="retrieve_pwd">取回帐户密码</p>

      <form id="forgetPassword" action="/home/findpass/cps" method="post">
          {{ csrf_field() }}

          <p class="p_tips">请输入验证码和密码：</p>

          <div id="forget" class="forget_area">

            <input type="text" name="sjcode" value="验证码" style="float:left;margin:10px;" class="inputBg input_kuang6">
            <input type="text" name="pass" value="密码" style="float:left;margin:10px;" class="inputBg input_kuang6">

            <span class="check_tips error_tip" id="user_input_ischeck_span"></span>
          </div>  

  		    <div class="clearfix"></div>

          <div class="sub_bg">

          <input type="submit" id="user_input_mobile" value="下一步" class="no_bg" style="cursor: pointer;">

          </div>

      </form>

	  

    </div>

    <div class="suc_botm"></div>

  </div>

</div>
<div class="footer block">

<div class="info">

 © <a href="http://www.xiaolajiao.com">小辣椒手机官网</a> 粤ICP证B2-20130549号 粤ICP备12053227号-3号

 <p>版权所有：深圳语信时代通信设备有限公司 </p>

      <img alt="" src="/home/forgetpass/images/footer_img.gif"> </div>

<div class="believe">

<a target="_blank" href="https://ss.cnnic.cn/verifyseal.dll?sn=e130924440300426112kgc000000&ct=df&a=1&pa=0.8907775566913188"><img src="/home/forgetpass/images/cnnicVerifyseal.png" style="border:none;height:42px;" oncontextmenu="return false;" alt="可信网站"></a>

<a target="_blank" href="https://search.szfw.org/cert/l/CX20130912002773003081"><img alt="诚信网站" src="/home/forgetpass/images/szfwVerifyseal.gif" style="border:none;"></a> 

<a target="_blank" href="http://www.315online.com.cn/member/315130034.html"><img alt="诚信网站" src="/home/forgetpass/images/save.jpg" style="border:none;"></a> 

</div>

</div>

<div style="display: none;">

</div>

</body>
<script src='/admin/js/jquery-1.8.3.min.js' type='text/javascript'></script>
<script>
  $('#successinfo').click(function(){
    $(this).slideUp("slow");
  });
</script>
</html>