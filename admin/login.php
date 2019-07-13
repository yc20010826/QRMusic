<?php 
include_once("../system/webquery.php");
?><!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>管理员登录</title>
<link rel="stylesheet" href="../css/main.css">
<link rel="stylesheet" href="../css/style-adminlogin.css">
<!-- 小屏幕样式修复 -->
<link rel="stylesheet" type="text/css" href="../css/small.css">
<!-- 美化样式文件 -->
<link rel="stylesheet" href="../plugns/layui/css/layui.css">
<!-- 滚动条美化样式文件 -->
<link rel="stylesheet" type="text/css" href="../css/jquery.mCustomScrollbar.min.css">
<!-- layer弹窗插件样式文件 -->
<link rel="stylesheet" href="../plugns/layer/skin/default/layer.css?v=3.0.2302" id="layuicss-skinlayercss">
</head>

<body>
	<div class="main">
		<div class="login-form">
			<h1>后台登录</h1>
			<div class="head"><img src="../images/userlogin.png" alt=""/></div>
			<form id="loginform" method="post" action="class/loginpost.php">
				<input name="username" type="text" class="text" value="用户名" onFocus="this.value = '';" onBlur="if (this.value == '') {this.value = '用户名';}" />
				<input name="password" type="password" value="" />
				<div class="submit"><input type="submit" value="登录" id="adminlogin"></div>	
				<p><a href="#">忘记密码?</a></p>
			</form>
		</div>
	</div>
<script src="../js/jquery.min.js"></script>
<script src="../js/funajax.js"></script>
</body>

</html>