var Fpwd = {};
/**
 * 初始化
 */
Fpwd.init = function (){
	$(document).ready(function (){
		$("#user_input_mobile").click(function (){Fpwd.nextPwdInputHtml();});
		$("#forgetPassword").submit(function() {return false;});
		$("#user").bind("blur",function(){
			checkMobileEmail($("#user").val(),'b');
		});
		$("#user").bind("focus",function(){
			checkMobileEmail($("#user").val(),'f');
		});
		// $("#user_input_ischeck").blur(function(){Fpwd.checkemailormobile(this);});
	});
};


function checksendRegisterGetPwd(){
	var user_button_again=document.getElementById('user_button_again');
	user_button_again.disabled = true;
	var time = 60;
	(function() {
		if (time > 1) {
			time--;
			user_button_again.value = "再次获取(" + time + ")";
			setTimeout(arguments.callee, 1000);
		} else {
			user_button_again.disabled = false;
			user_button_again.value = "发送验证短信";
		}
	})();
};


function checkMobileEmail(string,o){
	if(o=='b'){
		if(string=='' || string=='邮箱/手机号码'){
			$("#user").val("邮箱/手机号码");
			$("#user").css("color","#999");
			$("#user_input_ischeck_span").html("请输入邮箱或手机号码");
			$("#forget").addClass('ajax_error');
			
		}else{
			$flag=0;
			var patrn = /^\w+((-\w+)|(\.\w+))*\@[A-Za-z0-9]+((\.|-)[A-Za-z0-9]+)*\.[A-Za-z0-9]+$/;
			var patrn3 = /^1[3|4|5|8|7][0-9]\d{8}$/;
			if(!patrn.test(string) && !patrn3.test(string)){
				$flag=1;
			}
			if($flag==1){
				$("#user_input_ischeck_span").html("邮箱或手机号码格式不对");
				$("#forget").addClass('ajax_error');
			}else{
				$("#user_input_ischeck_span").html("");
				$("#forget").removeClass('ajax_error');
			}
		}
	}else{
		if(string=='邮箱/手机号码'){
			$("#user").val("");
		}
		$("#user").css("color","#333");
		$("#user_input_ischeck_span").html("");
		$("#forget").removeClass('ajax_error');
		
	}
}

Fpwd.nextPwdInputHtml = function (){
		checkMobileEmail($("#user").val(),'b');
		
		if($("#forget").attr('class')!="forget_area"){
			return;
		}
	
		$.ajax({
		type: "get",
		datatype: "json",
		url: "regmobile/findpassword.php",
		data: "email="+$("#user").val(),
		success: function (json){
			// console.log(json);
			var data = eval("("+json+")");
			// console.log(data.html);
			if(data.error == 1){
				$("#forget").addClass('ajax_error');
				$("#user_input_ischeck_span").html(data.html);
			} else {
				$("#forgetPassword").html(data.html);
				checksendRegisterGetPwd();
				$("#user_button_again").click( function(){Fpwd.againcode();} );
				
				$("#user_input_incode").bind("blur",function(){
					Fpwd.checkMobileCode3();
				});
				$("#user_input_incode").bind("focus",function(){
					Fpwd.checkMobileCode2();
				});
				
				$("#user_input_mobile_next").click( function(){Fpwd.checkMobileCode();} );
			}
		}
	});
};

Fpwd.againcode = function (){
	$("#forget").removeClass('ajax_error');
	checksendRegisterGetPwd();
	$.ajax({
		type: "get",
		dataType: "text",
		url: "regmobile/againcode.php",
		success: function (data){
			$("#user_span_again").html(data);
		}
	});
};

Fpwd.checkMobileCode2 = function (){
	if($("#user_input_incode").val()=='输入验证码'){
		$("#user_input_incode").val("");
	}
	$("#user_input_incode").css("color","#333");
	$("#user_span_again").html("");
	$("#forget").removeClass('ajax_error');
}

Fpwd.checkMobileCode3 = function (){
	if($("#user_input_incode").val()=='' || $("#user_input_incode").val()=='输入验证码'){
		$("#user_input_incode").css("color","#999");
		$("#user_span_again").html("请输入验证码");
		$("#forget").addClass('ajax_error');
		
	}else{
		$.ajax({
			type: "get",
			dataType: "text",
			url: "regmobile/pwdcheckmobilecode.php",
			data:"sendmobilecode=" + $("#user_input_incode").val(), 
			success: function (data){
				
				if(data == 1) {
					$("#forget").addClass('ajax_error');
					$("#user_span_again").html("验证码不正确或已经过期");
				} else {
					$("#forget").removeClass('ajax_error');
					$("#user_span_again").html("");
				}
	
			}
		});
	}
};

Fpwd.checkMobileCode = function (){
	if($("#user_input_incode").val()=='' || $("#user_input_incode").val()=='输入验证码'){
		$("#user").val("输入验证码");
		$("#user").css("color","#999");
		$("#user_span_again").html("请输入验证码");
		$("#forget").addClass('ajax_error');
		
	}else{
		$.ajax({
			type: "get",
			dataType: "text",
			url: "regmobile/pwdcheckmobilecode.php",
			data:"sendmobilecode=" + $("#user_input_incode").val(), 
			success: function (data){
				
				if(data == 1) {
					$("#forget").addClass('ajax_error');
					$("#user_span_again").html("验证码不正确或已经过期");
				} else {
					$("#forget").removeClass('ajax_error');
					$("#forgetPassword").html(data);
					
					$("#new_password").bind("blur",function(){
						checkPassword1($("#new_password").val(),'b');
					});
					
					$("#confirm_password").bind("blur",function(){
						checkPassword2($("#new_password").val(),$("#confirm_password").val());
					});
					
					$("#user_button_modifypwd").click( function(){Fpwd.modifyPwd();});	
				}
	
			}
		});
	}
};

/**
 * 手机修改密码的ajax调用 
 */
Fpwd.modifyPwd = function () {
	checkPassword1($("#new_password").val(),'b');
	checkPassword2($("#new_password").val(),$("#confirm_password").val());
	if($("#passwordArea").attr('class')=="ajax_error" || $("#passwordArea2").attr('class')=="ajax_error"){
		return;
	}
	
	// console.log("ok");
	$.ajax({
		type: "get",
		dataType: "text",
		url: "regmobile/modifypwdmobile.php",
		data:"sendmobilecode=" + $("#sendmobilecode").val()+"&password="+$("#new_password").val() + "&confirm_password=" + $("#confirm_password").val(), 
		success: function (data){
			// window.location.href = data;
			$("#forgetPassword").html('<p class="p_tips">修改成功</p><p class="p_tips_a"><a href="passport.php">返回登录页</a> </p>');
		}
	});
};

Fpwd.init();




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