<?php 
include_once("system/webquery.php")
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="user-scalable=no,width=device-width,initial-scale=1,maximum-scale=1">
<title>Signin/Signup</title>
<link rel="stylesheet" type="text/css" href="css/common.css">
<link rel="stylesheet" type="text/css" href="css/login.css">
<script src="js/jquery.min.js"></script>
</head>
<body>
<div class="login_cont">
<div class="login_nav">
<div class="nav_slider">
<a href="#" class="signup">注册</a>
<a href="#" class="signin focus">登录</a>
</div>
</div>
<form id="regform">
<div class="input_signup">
<!-- <input class="input" id="user_name" type="text" aria-label="用户名（包含字母／数字／下划线" placeholder="用户名">
<div class="hint">请填写符合格式的用户名</div> -->
<input class="input" id="user_email" type="text" aria-label="邮箱" placeholder="邮箱" name="email">
<div class="hint">请填写邮箱</div>
<!-- <input class="input" id="phone" type="text" class="account" aria-label="手机号（仅支持中国大陆）" placeholder="手机号（仅支持中国大陆）">
<div class="hint">请填写手机号</div> -->
<input class="input" id="password" type="password" aria-label="密码" placeholder="密码（不少于 6 位）" name="password">
<div class="hint">请填写符合格式的密码</div>
<input class="input" id="phone" type="text" aria-label="手机号" placeholder="手机号" name="phone">
<div class="hint">请输入手机号</div>
<input type="button" class="button" name="button" value="注册" id="reg">
</div>
</form>
<form id="loginform">
<div class="input_signin active">
<input class="input" id="login_user_name" type="text" aria-label="用户名" placeholder="用户名/邮箱号" name="email">
<div class="hint">请输入用户名/邮箱号</div>
<input class="input" id="login_password" type="password" aria-label="密码" placeholder="密码" name="password">
<div class="hint">请输入密码</div>
<input type="button" class="button" name="button" value="登录" id="login">
<div style="color:#eb420f; font-size:20px; margin-top:10px;">提示：每天可以免费下载<?php echo $wzcDownNum?>首歌曲,请注册登录之后再继续下载！</div>
<!-- <div class="forget">
<a href="forget.html">忘记密码？</a>
</div> -->
</div>
</form>
</div>
<!-- layer弹窗插件 -->
<script type="text/javascript" src="plugns/layer/layer.js"></script>
<script type="text/javascript" src="js/login.js"></script>
<script type="text/javascript" src="js/config.js"></script>
<script type="text/javascript" src="js/form.js"></script>
<script type="text/javascript" src="js/jquery.min.js"></script>
<script>
$("#login").click(function(){
	$.ajax({
		type:"post",
		url:"class/userloginpost.php",
		async:true,
		data:$("#loginform").serialize(),
		success:function(data){
			if(data =="登录失败"||data =="用户名密码不能为空"||data =="账户已被封禁"){
				layer.msg(data,{icon: 5});
			}else{
				layer.msg(data,{icon: 1});
				parent.location.reload();
			}
		},
		Error:function(data){
			layer.msg('登录失败',{icon: 5});
		},
	});
});
$("#reg").click(function(){
	$.ajax({
		type:"post",
		url:"class/userregpost.php",
		async:true,
		data:$("#regform").serialize(),
		success:function(data){
			if(data !="注册成功，请登录！"){
				layer.msg(data,{icon: 5});
			}else{
				layer.msg(data,{icon: 1});
				parent.location.reload();
			}
		},
		Error:function(data){
			layer.msg('注册失败',{icon: 5});
		},
	});
});
</script>
</body>
</html>
