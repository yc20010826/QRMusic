<?php 
@include_once("../system/webquery.php");
if(empty($_COOKIE['admin_id'])){
	echo "<script language=javascript>alert('非法访问，请检查是否登录！');parent.location.href='login.php';</script>";
}else{
	if(md5($_COOKIE['user']+$SecurityKey) === $_COOKIE['admin_id']){
		
	}else{
		echo "<script language=javascript>alert('信息异常，请重新登录！');parent.location.href='login.php';</script>";	
	}
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>邮件服务</title>
  <meta name="renderer" content="webkit">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0">
   <link rel="stylesheet" href="../css/main.css">
	<link rel="stylesheet" href="../css/admin.css">
	<link rel="stylesheet" href="../plugns/layui/css/layui.css" media="all">
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

  <div class="layui-fluid" style="margin-top: 10px;">
    <div class="layui-row layui-col-space15">
      <div class="layui-col-md12">
        <div class="layui-card">
          <div class="layui-card-header">邮件服务</div>
          <div class="layui-card-body">
            <form id="emailform">
            <div class="layui-form" wid100 lay-filter="">
              <div class="layui-form-item">
                <label class="layui-form-label">SMTP服务器</label>
                <div class="layui-input-inline">
                  <input type="text" name="smtp_server" value="<?php echo $smtp_server?>" class="layui-input">
                </div>
                <div class="layui-form-mid layui-word-aux">如：smtp.163.com</div>
              </div>
              <div class="layui-form-item">
                <label class="layui-form-label">SMTP端口号</label>
                <div class="layui-input-inline" style="width: 80px;">
                  <input type="text" name="cache" lay-verify="number" value="<?php echo $cache?>" class="layui-input">
                </div>
                <div class="layui-form-mid layui-word-aux">一般为 25 或 465</div>
              </div>
              <div class="layui-form-item">
                <label class="layui-form-label">发件人邮箱</label>
                <div class="layui-input-inline">
                  <input type="text" name="send_email" value="<?php echo $send_email?>" lay-verify="email" autocomplete="off" class="layui-input">
                </div>
              </div>
              <div class="layui-form-item">
                <label class="layui-form-label">发件人昵称</label>
                <div class="layui-input-inline">
                  <input type="text" name="send_nickname" value="<?php echo $send_nickname?>" autocomplete="off" class="layui-input">
                </div>
              </div>
              <div class="layui-form-item">
                <label class="layui-form-label">邮箱登入密码</label>
                <div class="layui-input-inline">
                  <input type="text" name="send_nickpassword" value="<?php echo $send_nickpassword?>" autocomplete="off" class="layui-input">
                </div>
              </div>
				</form>
              <div class="layui-form-item">
                <div class="layui-input-block">
                  <button class="layui-btn" lay-submit lay-filter="set_system_email" id="set_system_email" type="button">确认保存</button>
                </div>
              </div>
            </div>
            
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
<script type="text/javascript" src="../js/login.js"></script>
<script type="text/javascript" src="../js/config.js"></script>
<script type="text/javascript" src="../js/form.js"></script>
<script type="text/javascript" src="../js/jquery.min.js"></script>
<script src="../plugns/layui/layui.js"></script> 
<script src="../plugns/layui/lay/modules/layer.js"></script>
<script>
$("#set_system_email").click(function(){
	$.ajax({
		type:"post",
		url:"class/emailsetpost.php",
		async:true,
		data:$("#emailform").serialize(),
		success:function(msg){
			if(msg !="信息修改成功!"){
				layer.msg(msg,{icon: 5});
			}else{
				layer.msg(msg,{icon: 1});
				window.location.reload();
			}
		},
		Error:function(msg){
			layer.msg('信息修改失败！',{icon: 5});
		},
	});
});	
</script>
</html>
