<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="Keywords" content="" />

<meta name="Description" content="" />

<title>修改密码 - 小辣椒手机官网</title>

<link rel="shortcut icon" href="favicon.ico" />

<link rel="icon" href="favicon.ico" mce_href="favicon.ico" type="image/x-icon" >

<link href="/home/centerresetpass/css/user.css" rel="stylesheet" type="text/css" />
<meta name="csrf-token" content="{{ csrf_token() }}">

</head>

<body style="background:#f2f2f2;">

<div class="header_bg2">

 <div class="logo_user" >

 <a href="/home/index/inx" name="top"><img  src="/home/centerresetpass/images/logo.gif" /></a>

</div>

</div><div  style=" height:auto;" class="usBox">

<div class="suc_kuang">

  <div class=" usBox_3 clearfix" >

<p class="suc_p_left">小辣椒账户 &gt; <span>{{ session('homeuser')->username }} 修改密码</span></p>

<p class="suc_p_right"></p>

  <div class="radio_quyu2">

    <p >请重设您的帐户密码</p>

  <form name="formUser1" method="post" action="passport.php" id="tabdiv2">

	   <table width="100%"  border="0" align="left" cellpadding="5" cellspacing="3">

         <tbody>

                     <tr>

              <td >

                  	<p>当前密码</p><input type="text" id="spwd1" class="inputBg input_kuang4 disText" maxlength="25" style="display: block;">

              </td>

         </tr>

                     <tr>

              <td >

                  	<p>新密码</p><input type="text" id="spwd2" class="inputBg input_kuang4 disText" maxlength="16" style="display: block;">
              </td>

         </tr>	

        <tr>

          <td style="padding-top:5px;" align="left">

            <input name="act" type="hidden" value="act_changepassword" >

            <input type="hidden" value="" name="callback">

            <input name="submit" id="submit1" value="提交" class="btn btn-primary portalmargin_top " style="border:none;" >

          </td>

        </tr>

	   </tbody>

      </table>

	    </form>



 

  </div>

  </div>
<script type="text/javascript" src="/admin/js/jquery-1.8.3.min.js"></script>
<script>
    //判断输入的原密码是否正确
    $('#spwd1').blur(function(){
        var oldpass = $(this).val();
        if(oldpass){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url:'/home/center/cop',
                data:{'oldpass':oldpass},
                type:'Post',
                success:function(event){
                    if(event==1){
                        $('#submit1').attr('makesure','1');
                    }else{
                        $('#submit1').removeAttr('makesure');
                        alert('原密码不对');
                    }
                },
            });
        }
    });

    //改密码
    $('#submit1').click(function(){
        var newpass = $('#spwd2').val();
        var oldpass = $('#spwd1').val();
        var makesure = $(this).attr('makesure');
        if(newpass && oldpass && makesure=='1'){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url:'/home/center/drp',
                data:{'newpass':newpass},
                type:'Post',
                success:function(event){
                    if(event==1){
                        alert('修改成功');
                        window.location.href="/home/login/inx";
                    }else{
                        alert('修改失败');
                    }
                },
            });
        }else{
            alert('填的信息不全或原密码不对');
        }
    });
</script>
<div class="suc_botm"></div>

  </div>

 

</div>

<div class="footer block">

<div class="info">

 © <a href="http://www.xiaolajiao.com">小辣椒手机官网</a> 粤ICP证B2-20130549号 粤ICP备12053227号-3号

 <p>版权所有：深圳语信时代通信设备有限公司 </p>

      <img alt="" src="/home/centerresetpass/images/footer_img.gif"> </div>

<div class="believe">

<a target="_blank" href="https://ss.cnnic.cn/verifyseal.dll?sn=e130924440300426112kgc000000&ct=df&a=1&pa=0.8907775566913188"><img src="/home/centerresetpass/images/cnnicVerifyseal.png" style="border:none;height:42px;" oncontextmenu="return false;" alt="可信网站"></a>

<a target="_blank" href="https://search.szfw.org/cert/l/CX20130912002773003081"><img alt="诚信网站" src="/home/centerresetpass/images/szfwVerifyseal.gif" style="border:none;"></a> 

<a target="_blank" href="http://www.315online.com.cn/member/315130034.html"><img alt="诚信网站" src="/home/centerresetpass/images/save.jpg" style="border:none;"></a> 

</div>

</div>



          

        




        

            

        

</div></body>

</html>