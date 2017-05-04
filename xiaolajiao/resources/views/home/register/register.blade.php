<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="Keywords" content="">
<meta name="Description" content="">
<title>用户注册 - 小辣椒手机官网</title>
<link rel="shortcut icon" href="http://account.xiaolajiao.com/favicon.ico">
<link rel="icon" href="http://account.xiaolajiao.com/favicon.ico" mce_href="favicon.ico" type="image/x-icon">
<link href="/home/register/user.css" rel="stylesheet" type="text/css">
<script src="/home/register/linkid.js" async="" type="text/javascript"></script>
<script src="/home/register/analytics.js" async=""></script>
<script src="/home/register/clicki.js" charset="UTF-8" type="text/javascript" id="__clicki_js_tracker_loader__"></script>
<script src="/home/register/10124" charset="utf-8" async="" type="text/javascript"></script>
<script src="/home/register/0" async="" type="text/javascript"></script>
<script src="/home/register/10175.js" async=""></script>
</head>
<body style="background:#f2f2f2;">

<div class="header_bg2">
  <div class="logo_user">
    <a href="/home/index/inx" name="top"><img src="/home/register/logo.gif"></a>
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
    <div class="cor_yellow" id='errorinfo' style='background:orange'>
        <ul>
            <li>{!! session('msg') !!}</li>
        </ul>
    </div>
@endif

<div style=" height:auto;" class="usBox">
  <div class="suc_kuang">
    <div class=" usBox_3 clearfix">
    <h4 class="h4_suc">注册小辣椒帐户</h4>
    <p class="suc_p">小辣椒账户能使用小辣椒手机、小辣椒社区和小辣椒的其他服务。如果您已拥有小辣椒帐户，则可<a href="/home/login/inx" class="cor_yellow">在此登录</a></p>

      <form name="formUser1" autocomplete="off" method="post" action="/home/register/ad" id="tabdiv2">
    	   {{ csrf_field() }}
         <table border="0" cellpadding="5" cellspacing="3" width="100%" align="left">
    	      <tbody>
              <tr>
                <td class="td2" width="20%" align="right">用户名:</td>
                <td id="phoneArea" width="87%">
                <input class="inputBg input_kuang2" id="r_username" size="20" name="username" type="text">
                  <span class="check_tips error_tip">6~16位字母、数字或下划线组合</span>
                </td>
              </tr>
                 <tr>
                <td class="td2" width="20%" align="right">密码:</td>
                <td id="pwdArea">
                  <input class="inputBg input_kuang" id="r_pass" name="pass" type="password">
                  <span class="check_tips error_tip" id="pwd1_code">密码长度6~16位，数字、字母、字符</span>
                </td>
              </tr>
              <tr>
                <td class="td2" width="20%" align="right">确认密码:</td>
                <td id="pwdArea2">
                  <input class="inputBg input_kuang" id="r_repass" name="repass" type="password">
                  <span class="check_tips error_tip" id="pwd2_code"></span>
                </td>
              </tr>
              <tr>
                <td class="td2" width="20%" align="right">邮箱:</td>
                <td id="">
                  <input class="inputBg input_kuang" id="r_email" name="email" type="text">
                  <span class="check_tips error_tip" ></span>
                </td>
              </tr>
    	        <tr>
    	          <td class="td2" width="20%" align="right">手机号码:</td>
    	          <td id="phoneArea" width="87%">
    				      <input class="inputBg input_kuang2" id="r_phone" size="20" name="phone" type="text">
    	            <span class="check_tips error_tip">非中国大陆用户加区域前缀 (香港：+8526*******)</span>
    	          </td>
    	        </tr>
    	        <tr>
    	          <td>&nbsp;</td>
    	          <td align="left">
      	          <input class="btn btn-primary portalmargin_top" value="确认" type="submit">
    	          </td>
    	        </tr>
    			    <tr>
    	          <td>&nbsp;</td>
    	          <td>
                  <p class="p_cor_hui">点击“立即注册”，即表示您同意并愿意遵守小辣椒
                    <a href="http://www.xiaolajiao.com/service/eula.html" class="cor_yellow" target="_blank">用户协议</a>和
                    <a href="http://www.xiaolajiao.com/service/privacy.html" class="cor_yellow" target="_blank">隐私政策</a>
                  </p>
                </td>
    	        </tr>
    	      </tbody>
         </table>
    	</form>
    </div>
    <div class="suc_botm"></div>
  </div>
</div>

<div class="footer block">
<div class="info">
 © <a href="http://www.xiaolajiao.com/">小辣椒手机官网</a> 粤ICP证B2-20130549号 粤ICP备12053227号-3号
 <p>版权所有：深圳语信时代通信设备有限公司 </p>
      <img alt="" src="/home/register/footer_img.gif"> </div>
<div class="believe">
<a target="_blank" href="https://ss.cnnic.cn/verifyseal.dll?sn=e130924440300426112kgc000000&amp;ct=df&amp;a=1&amp;pa=0.8907775566913188"><img src="/home/register/cnnicVerifyseal.png" style="border:none;height:42px;" oncontextmenu="return false;" alt="可信网站"></a>
<a target="_blank" href="https://search.szfw.org/cert/l/CX20130912002773003081"><img alt="诚信网站" src="/home/register/szfwVerifyseal.gif" style="border:none;"></a> 
<a target="_blank" href="http://www.315online.com.cn/member/315130034.html"><img alt="诚信网站" src="/home/register/save.jpg" style="border:none;"></a> 
</div>
</div>
</body>
<script src='/admin/js/jquery-1.8.3.min.js' type='text/javascript'></script>
<script>
  $('#errorinfo').click(function(){
    $(this).slideUp("slow");
  });
</script>
</html>