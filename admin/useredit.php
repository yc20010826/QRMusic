<?php 
@include_once("../system/database.php");
getConnect();
if($_GET['id'] == ''){
	@$id = '95859';
	@$user = mysql_fetch_assoc(mysql_query("select * from yc_users where id=$id"));
	@$userid = $user['id'];
	@$Full_name = $user['Full_name'];
	@$username = $user['username'];
	@$qq = $user['qq'];
	@$balance = $user['balance'];
	@$email = $user['email'];
	@$phone = $user['phone'];
	@$Jurisdiction = $user['Jurisdiction'];
	@$state = $user['state'];	
}else{
	@$id = $_GET['id'];
	@$user = mysql_fetch_assoc(mysql_query("select * from yc_users where id=$id"));
	@$userid = $user['id'];
	@$Full_name = $user['Full_name'];
	@$username = $user['username'];
	@$qq = $user['qq'];
	@$balance = $user['balance'];
	@$email = $user['email'];
	@$phone = $user['phone'];
	@$Jurisdiction = $user['Jurisdiction'];
	@$state = $user['state'];
}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>用户修改</title>
<link rel="stylesheet" href="../css/main.css">
<link rel="stylesheet" href="../css/admin.css">
<!-- 小屏幕样式修复 -->
<link rel="stylesheet" type="text/css" href="../css/small.css">
<!-- 美化样式文件 -->
<link rel="stylesheet" href="../plugns/layui/css/layui.css">
<!-- 滚动条美化样式文件 -->
<link rel="stylesheet" type="text/css" href="../css/jquery.mCustomScrollbar.min.css">
<link rel="stylesheet" type="text/css" href="../plugns/layui/css/layui.css">
<!-- layer弹窗插件样式文件 -->
<link rel="stylesheet" href="../plugns/layer/skin/default/layer.css?v=3.0.2302" id="layuicss-skinlayercss">
</head>

<body>
<form id="adminusereditform">
	<div class="layui-form" lay-filter="layuiadmin-form-admin" id="layuiadmin-form-admin" style="padding: 20px 50px 0 0;">
    <div class="layui-form-item">
      <label class="layui-form-label">登录账号</label>
      <div class="layui-input-inline">
		   <input type="hidden" name='id' value="<?php echo $id?>">
        <input value="<?php echo $username?>" type="text" name="username" lay-verify="required" placeholder="请输入用户名" autocomplete="off" class="layui-input" readonly>
      </div>
    </div>
    <div class="layui-form-item">
      <label class="layui-form-label">登录密码</label>
      <div class="layui-input-inline">
        <input value="" type="text" name="password" lay-verify="required" placeholder="不修改请留空" autocomplete="off" class="layui-input">
      </div>
    </div>
    <div class="layui-form-item">
      <label class="layui-form-label">姓名昵称</label>
      <div class="layui-input-inline">
        <input value="<?php echo $Full_name?>" type="text" name="Full_name" lay-verify="qq" placeholder="请输入昵称或姓名" autocomplete="off" class="layui-input">
      </div>
    </div>
    <div class="layui-form-item">
      <label class="layui-form-label">用户Q Q</label>
      <div class="layui-input-inline">
        <input value="<?php echo $qq?>" type="text" name="qq" lay-verify="qq" placeholder="请输入QQ" autocomplete="off" class="layui-input">
      </div>
    </div>
    <div class="layui-form-item">
      <label class="layui-form-label">绑定手机</label>
      <div class="layui-input-inline">
        <input value="<?php echo $phone?>" type="text" name="phone" lay-verify="phone" placeholder="请输入号码" autocomplete="off" class="layui-input">
      </div>
    </div>
    <div class="layui-form-item">
      <label class="layui-form-label">绑定邮箱</label>
      <div class="layui-input-inline">
        <input lay-verify='email' value="<?php echo $email?>" type="text" name="email" lay-verify="email" placeholder="请输入邮箱" autocomplete="off" class="layui-input">
      </div>
    </div>
    <div class="layui-form-item">
      <label class="layui-form-label">账户余额</label>
      <div class="layui-input-inline">
        <input value="<?php echo $balance?>" type="text" name="balance" lay-verify="required" placeholder="账户余额" autocomplete="off" class="layui-input">
      </div>
    </div>
	<div class="layui-form-item">
      <label class="layui-form-label">下载剩余</label>
      <div class="layui-input-inline">
        <input value="<?php echo $Jurisdiction?>" type="text" name="Jurisdiction" lay-verify="required" placeholder="请输入剩余下载次数" autocomplete="off" class="layui-input">
      </div>
    </div>
    <div class="layui-form-item">
      <label class="layui-form-label">账号状态</label>
      <div class="layui-input-inline">
        <input value="<?php echo $state?>" type="text" name="state" lay-verify="required" placeholder="请输入账号状态，0为关闭，1为启用" autocomplete="off" class="layui-input">
      </div>
    </div>
</form>
  </div>
	<div style="text-align: center;">
		<button type="button" class="layui-btn layui-btn-normal" id="aduserpost">保存修改</button>
	</div>
</body>
<!--通用框架js-->
<script src="../plugns/layui/layui.js"></script>
<script src="../plugns/layui/lay/modules/jquery.js"></script>
	
<!-- layer弹窗插件 -->
<script src="../plugns/layer/layer.js"></script>
<script src="../js/config.js"></script>
	
<!-- jQuery文件 -->
<script src="../js/jquery.min.js"></script>
<script>
	$("#aduserpost").click(function(){
		$.ajax({
			url:"class/userpost.php",
			type:"post",
			async:true,
			data:$("#adminusereditform").serialize(),
			success:function(msg){
				if(msg !="信息修改成功!"){
					layer.msg(msg,{icon: 5});
				}else{
					layer.msg(msg,{icon: 1});
					window.location.reload();
				}
			},
			Error:function(msg){
				layer.msg('修改失败');
			},
		});
	});
</script>
</html>