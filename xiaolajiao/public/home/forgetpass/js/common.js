var xlj = {};
xlj.init = function (){
	$(document).ready(function (){
		$("#tab1").click( function(){xlj.tabschange("#tabdiv2","#tabdiv1");} );
		$("#tab2").click( function(){xlj.tabschange("#tabdiv1","#tabdiv2");} );
		
		$("#inputmobile").bind("blur",function(){
			checkMobile($("#inputmobile").val(),'b');
		});
		
		$("#sendRegister").bind("click",function(){
			checkMobile($("#inputmobile").val(),'b','ok');
		});
		
		$("#verification").bind("blur",function(){
			checkCode($("#verification").val(),'b');
		});
		
		
		$("#pwd1").bind("blur",function(){
			checkPwd1($("#pwd1").val(),'b');
		});
		
		$("#pwd2").bind("blur",function(){
			checkPwd2($("#pwd1").val(),$("#pwd2").val());
		});
		
		
		$("#username").bind("blur",function(){
			checkUsername($("#username").val());
		});
		
		$("#email").bind("blur",function(){
			//$("#searchResult").hide();
			xljCheckEmail($("#email").val());
		});
		
		$("#password1").bind("blur",function(){
			checkPassword1($("#password1").val(),'b');
		});
		
		$("#conform_password").bind("blur",function(){
			checkPassword2($("#password1").val(),$("#conform_password").val());
		});
		
		$("#captcha").bind("blur",function(){
			checkCaptcha($("#captcha").val());
		});
		
		$("#captcha_str").bind("blur",function(){
			checkCaptchaPhone($("#captcha_str").val());
		});
		
		/*登陆*/
		$("#login_username").bind("blur",function(){
			checkLoginUsername($("#login_username").val(),'b');
		});
		$("#login_username").bind("focus",function(){
			checkLoginUsername($("#login_username").val(),'f');
		});
		$("#login_password").bind("blur",function(){
			checkLoginPassword($("#login_password").val(),'b');
		});
	/*	$("#login_password").bind("focus",function(){
			checkLoginPassword($("#login_password").val(),'f');
		});*/
		
		$("#login_password_remove").bind("focus",function(){
			checkLoginPassword($("#login_password").val(),'f');
		});
		
		$("#login_captcha").bind("blur",function(){
			checkLoginCaptcha($("#login_captcha").val(),'b');
		});
		$("#login_captcha").bind("focus",function(){
			checkLoginCaptcha($("#login_captcha").val(),'f');
		});
		
	});
};


function sendemailinfo(string) {
	if(string==''){
		alert('邮件不存在!');
	}else{
		$.ajax({
			type: "GET",
			url: "eventlib/checkevent.php?act=sendemail&auth="+string+"&time="+new Date(),
			data: "",
			dataType: 'html',
			success: function(result) {
				if(result && result != 0){
					alert(result);
				}else{
					alert('邮件发送失败!');
				}
			}
		});
	};
};

function checkLoginCaptcha(username,o){
	if(o=='b'){
		if(username=='' || username=='验证码'){
			$("#login_captcha").val("");
			$("#error_icontwo3").html("请输入验证码");
			$("#littlepop_logo3").css("display","block");
			
		}else{
			
			var patrn = /^[A-Za-z0-9]{4}$/;
			if(!patrn.test(username)) {
				$("#error_icontwo3").html("验证码填写错误");
				$("#littlepop_logo3").css("display","block");
			} else {
				$.ajax({
					type: "GET",
					url: "regmobile/checkecaptchalogin.php?captcha="+username+"&time="+new Date(),
					data: "",
					dataType: 'html',
					success: function(result) {
						if(result=="ok"){
							$("#error_icontwo3").html("");
							$("#littlepop_logo3").css("display","none");
						}else{
							$("#error_icontwo3").html("验证码填写错误");
							$("#littlepop_logo3").css("display","block");
						}
					}
				});
			};
			
			
		}
	}else{
		if(username=='验证码'){
			$("#login_captcha").val("");
		}
		$("#error_icontwo3").html("");
		$("#littlepop_logo3").css("display","none");
		$("#login_captcha").css("color","#333");
		
	}
}


function checkLoginPassword(username,o){
	if(o=='b'){
		if(username=='' || username=='密码'){
			$("#login_password").val("");
			$("#error_icontwo2").html("请输入密码");
			$("#littlepop_logo2").css("display","block");
			
		}else{
			$("#error_icontwo2").html("");
			$("#littlepop_logo2").css("display","none");
		}
	}else{
		$("#login_password_remove").remove();
		$("#login_password").css("display","block");
		$("#login_password").focus();
		if(username=='密码'){
			$("#login_password").val("");
		}
		$("#error_icontwo2").html("");
		$("#littlepop_logo2").css("display","none");
		$("#login_password").css("color","#333");
		
	}
}


function checkLoginUsername(username,o){
	
	if(o=='b'){
		if(username=='' || username=='邮箱/手机号码/用户名'){
			$("#login_username").val("");
			$("#error_icontwo").html("请输入帐户名");
			$("#littlepop_logo").css("display","block");
			
		}else{
			$flag=0;
			var patrn = /^\w+((-\w+)|(\.\w+))*\@[A-Za-z0-9]+((\.|-)[A-Za-z0-9]+)*\.[A-Za-z0-9]+$/;
			var patrn2 = /^[a-zA-Z]\w{2,15}$/;
			var patrn3 = /^1[3|4|5|8|7][0-9]\d{8}$/;
			if(!patrn.test(username) && !patrn3.test(username) && !patrn2.test(username)){
				$flag=1;
			}
			if($flag==1){
				$("#error_icontwo").html("帐户名错误");
				$("#littlepop_logo").css("display","block");
			}else{
				$("#error_icontwo").html("");
				$("#littlepop_logo").css("display","none");
			}
		}
	}else{
		if(username=='邮箱/手机号码/用户名'){
			$("#login_username").val("");
		}
		$("#login_username").css("color","#333");
		$("#error_icontwo").html("");
		$("#littlepop_logo").css("display","none");
		
	}
}


function RegisterCheckFormEmail(){
	checkUsername($("#username").val());
	xljCheckEmail($("#email").val());
	checkPassword1($("#password1").val(),'b');
	checkPassword2($("#password1").val(),$("#conform_password").val());
	checkCaptcha($("#captcha").val());
	

	if($("#usernameArea").attr('class')=="ajax_error_on" && $("#emailArea").attr('class')=="ajax_error_on" && $("#passwordArea").attr('class')=="ajax_error_on" && $("#passwordArea2").attr('class')=="ajax_error_on" && $("#captchaArea").attr('class')=="ajax_error_on"){
		return true;
	}else{
		return false;
	}
}

function checkCaptcha(string) {
	if(string==''){
		$("#captcha_code").html("请填写验证码");
		$("#captcha_code").css("display","block");
		$("#captchaArea").removeClass('ajax_error_on');
		$("#captchaArea").addClass('ajax_error')
	}else{
		
		var patrn = /^[A-Za-z0-9]{4}$/;
		if(!patrn.test(string)) {
			$("#captcha_code").html("验证码填写错误");
			$("#captcha_code").css("display","block");
			$("#captchaArea").removeClass('ajax_error_on');
			$("#captchaArea").addClass('ajax_error')
		} else {
			$.ajax({
				type: "GET",
				url: "eventlib/checkevent.php?act=captcha&captcha="+string+"&time="+new Date(),
				data: "",
				dataType: 'html',
				success: function(result) {
					if(result=="ok"){
						$("#captcha_code").html("");
						$("#captchaArea").removeClass('ajax_error');
						$("#captchaArea").addClass('ajax_error_on');
					}else{
						$("#captcha_code").html("验证码填写错误");
						$("#captcha_code").css("display","block");
						$("#captchaArea").removeClass('ajax_error_on');
						$("#captchaArea").addClass('ajax_error')
					}
				}
			});
	
			
		};
	};

};


function checkCaptchaPhone(string) {
	if(string==''){
		$("#captcha_str_code").html("请填写验证码");
		$("#captcha_str_code").css("display","block");
		$("#captchastrArea").removeClass('ajax_error_on');
		$("#captchastrArea").addClass('ajax_error')
	}else{
		
		var patrn = /^[A-Za-z0-9]{4}$/;
		if(!patrn.test(string)) {
			$("#captcha_str_code").html("验证码填写错误");
			$("#captcha_str_code").css("display","block");
			$("#captchastrArea").removeClass('ajax_error_on');
			$("#captchastrArea").addClass('ajax_error')
		} else {
			$.ajax({
				type: "GET",
				url: "eventlib/checkevent.php?act=captcha&captcha="+string+"&time="+new Date(),
				data: "",
				dataType: 'html',
				success: function(result) {
					if(result=="ok"){
						$("#captcha_str_code").html("");
						$("#captchastrArea").removeClass('ajax_error');
						$("#captchastrArea").addClass('ajax_error_on');
					}else{
						$("#captcha_str_code").html("验证码填写错误");
						$("#captchas_code").css("display","block");
						$("#captchastrArea").removeClass('ajax_error_on');
						$("#captchastrArea").addClass('ajax_error')
					}
				}
			});
	
			
		};
	};

};

changeCaptcha = function(){
	var captcha_img = $("#captcha_img");

	captcha_img.attr("src","captcha_ver.php?"+Math.random());

};
changeCaptchaPhone= function(){

    var captcha_img_phone = $("#captcha_img_phone");

    captcha_img_phone.attr("src","captcha_ver.php?"+Math.random()+"abc");
};
function checkPassword1(pwd,o) {
	if(o=='b'){
		if(pwd==''){
			$("#password1_code").html("请填写密码");
			$("#password1_code").css("display","block");
			$("#passwordArea").removeClass('ajax_error_on');
			$("#passwordArea").addClass('ajax_error')
		}else{
			if( pwd.length < 6 || pwd.length > 16){
				$("#password1_code").html("密码长度为6~16位");
				$("#password1_code").css("display","block");
				$("#passwordArea").removeClass('ajax_error_on');
				$("#passwordArea").addClass('ajax_error')
			}else if( /[^\x00-\x7f]/.test(pwd) ){
			  	$("#password1_code").html("密码长度6~16位，数字、字母、字符至少包含两种");
				$("#password1_code").css("display","block");
				$("#passwordArea").removeClass('ajax_error_on');
				$("#passwordArea").addClass('ajax_error')
			}else if(/^\d+$/.test(pwd)){
				$("#password1_code").html("密码不能全为数字");
				$("#password1_code").css("display","block");
				$("#passwordArea").removeClass('ajax_error_on');
				$("#passwordArea").addClass('ajax_error')
			}else if(/^[A-Za-z]+$/.test(pwd)){
				$("#password1_code").html("密码不能全为字母");
				$("#password1_code").css("display","block");
				$("#passwordArea").removeClass('ajax_error_on');
				$("#passwordArea").addClass('ajax_error')
			}else if( /^[^A-Za-z0-9]+$/.test(pwd) ){
				$("#password1_code").html("密码不能全为字符");
				$("#password1_code").css("display","block");
				$("#passwordArea").removeClass('ajax_error_on');
				$("#passwordArea").addClass('ajax_error')
			}else{
				$("#password1_code").html("");
				$("#passwordArea").removeClass('ajax_error');
				$("#passwordArea").addClass('ajax_error_on');
			}
		}
	}
};

function checkPassword2(pwd1,pwd2) {

	if(pwd2==''){
		$("#password2_code").html("请填写确认密码");
		$("#password2_code").css("display","block");
		$("#passwordArea2").removeClass('ajax_error_on');
		$("#passwordArea2").addClass('ajax_error')
	}else if(pwd2!=pwd1){
		$("#password2_code").html("密码填写不一致");
		$("#password2_code").css("display","block");
		$("#passwordArea2").removeClass('ajax_error_on');
		$("#passwordArea2").addClass('ajax_error');
	}else{
		$("#password2_code").html("");
		$("#passwordArea2").removeClass('ajax_error');
		$("#passwordArea2").addClass('ajax_error_on');
	}

};


function xljCheckEmail(mail) {
	if(mail==''){
		$("#email_span").html("请填写邮箱");
		$("#email_span").css("display","block");
		$("#emailArea").addClass('ajax_error')
	}else{
		var patrn = /^\w+((-\w+)|(\.\w+))*\@[A-Za-z0-9]+((\.|-)[A-Za-z0-9]+)*\.[A-Za-z0-9]+$/;
		if(!patrn.test(mail)) {
			$("#email_span").css("display","block");
			$("#email_span").html("邮箱填写错误，请重新填写");
			$("#emailArea").addClass('ajax_error');
		} else {
			$.ajax({
				type: "GET",
				url: "eventlib/checkevent.php?act=checkemail&email="+mail+"&time="+new Date(),
				data: "",
				dataType: 'html',
				success: function(result) {
					if(result=="ok"){
						$("#email_span").html("");
						$("#emailArea").removeClass('ajax_error');
						$("#emailArea").addClass('ajax_error_on');
					}else{
						$("#email_span").css("display","block");
						$("#email_span").html("邮箱已经被注册,请重新填写");
						$("#emailArea").removeClass('ajax_error_on');
						$("#emailArea").addClass('ajax_error');
					}
				}
			});
			
		};
	}
}
	


function checkUsername(username){
		if(username==''){
			$("#username_span").html("请填写用户名");
			$("#username_span").css("display","block");
			$("#username_span").parent().removeClass('ajax_error_on');
			$("#username_span").parent().addClass('ajax_error')
		}else{
			var patrn = /^[a-zA-Z0-9_\u4e00-\u9fa5]{3,16}$/;
			if(!patrn.test(username)) {
				$("#username_span").css("display","block");
				$("#username_span").html("用户名由3-16位字符组成");
				$("#username_span").parent().removeClass('ajax_error_on');
				$("#username_span").parent().addClass('ajax_error');
			} else {
				$.ajax({
					type: "GET",
					url: "eventlib/checkevent.php?act=checkname&username="+username+"&time="+new Date(),
					data: "",
					dataType: 'html',
					success: function(result) {
						if(result=="ok"){
							$("#username_span").html("");
							$("#username_span").parent().removeClass('ajax_error');
							$("#username_span").parent().addClass('ajax_error_on');
						}else{
							$("#username_span").css("display","block");
							$("#username_span").html("用户名已经存在,请重新填写");
							$("#username_span").parent().removeClass('ajax_error_on');
							$("#username_span").parent().addClass('ajax_error');
						}
					}
				});
				
			};
		}


};




function checksendRegister(){
	var sendRegisterButton=document.getElementById('sendRegister');
	sendRegisterButton.disabled = true;
	var time = 60;
	(function() {
		if (time > 1) {
			time--;
			sendRegisterButton.value = "再次获取(" + time + ")";
			sendRegisterButton.style.color = "#999";
			setTimeout(arguments.callee, 1000);
		} else {
			sendRegisterButton.disabled = false;
			sendRegisterButton.value = "发送验证短信";
			sendRegisterButton.style.color = "#000";
		}
	})();
};

function RegisterCheckFormMobile(){
	checkMobile($("#inputmobile").val(),'b');
    checkCaptchaPhone($("#captcha_str").val(),'b');
	checkCode($("#verification").val(),'b');
	checkPwd1($("#pwd1").val(),'b');
	checkPwd2($("#pwd1").val(),$("#pwd2").val());
	
	if($("#phoneArea").attr('class')=="ajax_error_on" && $("#codeArea").attr('class')=="ajax_error_on" && $("#pwdArea").attr('class')=="ajax_error_on" && $("#pwdArea2").attr('class')=="ajax_error_on"){
		ga('richTracker.send', 'event', 'register', 'click','register user');
		return true;
	}else{
		return false;
	}
}


function checkPwd1(pwd,o) {
	if(o=='b'){
		if(pwd==''){
			$("#pwd1_code").html("请填写密码");
			$("#pwd1_code").css("display","block");
			$("#pwdArea").removeClass('ajax_error_on');
			$("#pwdArea").addClass('ajax_error')
		}else{
			if( pwd.length < 6 || pwd.length > 16){
				$("#pwd1_code").html("密码长度为6~16位");
				$("#pwd1_code").css("display","block");
				$("#pwdArea").removeClass('ajax_error_on');
				$("#pwdArea").addClass('ajax_error')
			}else if( /[^\x00-\x7f]/.test(pwd) ){
			  	$("#pwd1_code").html("密码长度6~16位，数字、字母、字符至少包含两种");
				$("#pwd1_code").css("display","block");
				$("#pwdArea").removeClass('ajax_error_on');
				$("#pwdArea").addClass('ajax_error')
			}else if(/^\d+$/.test(pwd)){
				$("#pwd1_code").html("密码不能全为数字");
				$("#pwd1_code").css("display","block");
				$("#pwdArea").removeClass('ajax_error_on');
				$("#pwdArea").addClass('ajax_error')
			}else if(/^[A-Za-z]+$/.test(pwd)){
				$("#pwd1_code").html("密码不能全为字母");
				$("#pwd1_code").css("display","block");
				$("#pwdArea").removeClass('ajax_error_on');
				$("#pwdArea").addClass('ajax_error')
			}else if( /^[^A-Za-z0-9]+$/.test(pwd) ){
				$("#pwd1_code").html("密码不能全为字符");
				$("#pwd1_code").css("display","block");
				$("#pwdArea").removeClass('ajax_error_on');
				$("#pwdArea").addClass('ajax_error')
			}else{
				$("#pwd1_code").html("");
				$("#pwdArea").removeClass('ajax_error');
				$("#pwdArea").addClass('ajax_error_on');
			}
		}
	}
};

function checkPwd2(pwd1,pwd2) {

	if(pwd2==''){
		$("#pwd2_code").html("请填写确认密码");
		$("#pwd2_code").css("display","block");
		$("#pwdArea2").removeClass('ajax_error_on');
		$("#pwdArea2").addClass('ajax_error')
	}else if(pwd2!=pwd1){
		$("#pwd2_code").html("密码填写不一致");
		$("#pwd2_code").css("display","block");
		$("#pwdArea2").removeClass('ajax_error_on');
		$("#pwdArea2").addClass('ajax_error');
	}else{
		$("#pwd2_code").html("");
		$("#pwdArea2").removeClass('ajax_error');
		$("#pwdArea2").addClass('ajax_error_on');
	}

};

function checkCode(code,o) {
	if(o=='b'){
		if(code==''){
			$("#code_span").css("display","block");
			$("#code_span").html("请填写手机验证码");
			$("#codeArea").removeClass('ajax_error_on');
			$("#codeArea").addClass('ajax_error')
		}else{
			var patrn = /^[A-Za-z0-9]{6}$/;
			if(!patrn.test(code)) {
				$("#code_span").css("display","block");
				$("#code_span").html("手机验证码错误，请重新填写");
				$("#codeArea").removeClass('ajax_error_on');
				$("#codeArea").addClass('ajax_error');
			} else {
				$.ajax({
					type: "GET",
					url: "eventlib/checkevent.php?act=checkphonecaptcha&code="+code+"&mobile="+$("#inputmobile").val()+"&time="+new Date(),
					data: "",
					dataType: 'html',
					success: function(result) {
						if(result=="ok"){
							$("#code_span").html("");
							$("#codeArea").removeClass('ajax_error');
							$("#codeArea").addClass('ajax_error_on');
						}else{
							$("#code_span").css("display","block");
							$("#code_span").html("手机验证码错误，请重新填写");
							$("#codeArea").removeClass('ajax_error_on');
							$("#codeArea").addClass('ajax_error');
						}
					}
				});
				
			};
		}

	}
};

checkMobile = function (mobile,o,c){
	if(o=='b'){
		if(mobile=='' || mobile=='请填写手机号码'){
			$("#mobile_span").html("请填写手机号码");
			$("#mobile_span").css("display","block");
			$("#phoneArea").removeClass('ajax_error_on');
			$("#phoneArea").addClass('ajax_error');
		}else{
			var patrn = /^1[3|4|5|8|7][0-9]\d{8}$/;	// 11 位手机
			if(!patrn.test(mobile)) {
				$("#mobile_span").css("display","block");
				$("#mobile_span").html("手机号码格式错误");
				$("#phoneArea").removeClass('ajax_error_on');
				$("#phoneArea").addClass('ajax_error');
			} else {
				$.ajax({
					type: "GET",
					url: "eventlib/checkevent.php?act=mobilephone&mobile="+mobile+"&time="+new Date(),
					data: "",
					dataType: 'html',
					success: function(result) {
						if(result=="ok"){
							if(c=='ok'){
								if($("#captcha_str").val()==''){
										$("#captcha_str_code").css("display","block");
										$("#captcha_str_code").html("请填写验证码");
										$("#captchastrArea").removeClass('ajax_error_on');
										$("#captchastrArea").addClass('ajax_error');
								}else{
									$.ajax({
										type: "GET",
										url: "eventlib/checkevent.php?act=captcha&captcha="+$("#captcha_str").val()+"&time="+new Date(),
										data: "",
										dataType: 'html',
										success: function(result) {
											if(result=="ok"){
												$("#captcha_str_code").html("");
												$("#captchastrArea").removeClass('ajax_error');
												$("#captchastrArea").addClass('ajax_error_on');
												checksendRegister();
												$.ajax({
													type: "GET",
													url: "eventlib/checkevent.php?act=phonecaptcha&mobile="+mobile+"&captcha="+$("#captcha_str").val()+"&time="+new Date(),
													data: "",
													dataType: 'html',
													success: function(result) {
														if(result=="ok"){
															
														}else{
															$("#code_span").css("display","block");
															$("#code_span").html("手机验证码错误!");
															$("#codeArea").removeClass('ajax_error_on');
															$("#codeArea").addClass('ajax_error');
														}
													}
												});
											}else{
												$("#captcha_str_code").css("display","block");
												$("#captcha_str_code").html("验证码错误，请重新填写");
												$("#captchastrArea").removeClass('ajax_error_on');
												$("#captchastrArea").addClass('ajax_error');
											}
										}
									});
								}
							} else {
								$("#mobile_span").html("");
								$("#phoneArea").removeClass('ajax_error');
								$("#phoneArea").addClass('ajax_error_on');	
							}
						} else {
							$("#phoneArea").addClass('ajax_error');
							$("#mobile_span").html("手机号码已被注册");
							$("#phoneArea").removeClass('ajax_error_on');
							$("#mobile_span").css("display","block");
						}
				   }
			   });
			}
		}
	}
};

xlj.tabschange = function (sourceId,targetId){
	$(sourceId).hide();
	$(targetId).show();
};

xlj.init();