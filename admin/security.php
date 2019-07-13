<?php 
@include_once("../system/webquery.php");
if(empty($_COOKIE['admin_id'])){
	echo "<script language=javascript>alert('非法访问，请检查是否登录！');parent.location.href='/admin/login.php';</script>";
}else{
	if(md5($_COOKIE['user']+$SecurityKey) === $_COOKIE['admin_id']){
		
	}else{
		echo "<script language=javascript>alert('信息异常，请重新登录！');parent.location.href='/admin/login.php';</script>";	
	}
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>安全设置</title>
  <meta name="renderer" content="webkit">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0">
   <link rel="stylesheet" href="../css/main.css">
	<link rel="stylesheet" href="../css/admin.css">
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
          <div class="layui-card-header">安全设置<span style="color: #FF0004;">(您修改此设置后您将被强制下线一次！)</span></div>
          <div class="layui-card-body">
            <form action="" id="securityform">
            <div class="layui-form" wid100 lay-filter="">
              <div class="layui-form-item">
                <label class="layui-form-label">安全密匙</label>
                <div class="layui-input-inline">
                  <input type="text" name="SecurityKey" value="<?php echo $SecurityKey?>" class="layui-input" onkeyup="this.value=this.value.replace(/\D/g,'')" onafterpaste="this.value=this.value.replace(/\D/g,'')" maxlength="6">
                </div>
                <div class="layui-form-mid layui-word-aux">如：154578，最高6位,生成后台cookie验证md5关键密匙，建议在正式发布程序后固定，否则每次改动会将在线人员全部强制下线</div>
              </div>
              <div class="layui-form-item">
                <label class="layui-form-label">浮动密匙</label>
                <div class="layui-input-inline">
                  <input type="text" name="FloatingKey" value="<?php echo $FloatingKey?>" lay-verify="email" autocomplete="off" class="layui-input" onkeyup="this.value=this.value.replace(/\D/g,'')" onafterpaste="this.value=this.value.replace(/\D/g,'')" maxlength="6">
                </div>
				  		<div class="layui-form-mid layui-word-aux">如：154578，最高6位,浮动密匙（生成前台SESET关键密匙与关键token）</div>
              </div>
              <div class="layui-form-item">
				  </form>
                <div class="layui-input-block">
                  <button class="layui-btn" type="button" id="securitypost">确认保存</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>	
</body>
<script src="../js/jquery.min.js"></script>
<script src="../js/funajax.js"></script>
<script src="../plugns/layui/layui.js"></script> 
<script src='../plugns/layui/lay/modules/layer.js'></script>
<script>
	$("#securitypost").click(function(){/*安全密匙修改*/
		$.ajax({
			url:"../admin/class/securitypost.php",
			type:"post",
			async:true,
			data:$("#securityform").serialize(),
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
