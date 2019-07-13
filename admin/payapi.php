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
          <div class="layui-card-header">支付接口配置</div>
          <div class="layui-card-body">
            <form id="paysetform">
            <div class="layui-form" wid100 lay-filter="">
              <div class="layui-form-item">
                <label class="layui-form-label">API服务器</label>
                <div class="layui-input-inline">
                  <input type="text" name="payurl" value="<?php echo $payurl?>" class="layui-input">
                </div>
                <div class="layui-form-mid layui-word-aux">如：http://pay.zimukj.cn/</div>
              </div>
              <div class="layui-form-item">
                <label class="layui-form-label">访问端口</label>
                <div class="layui-input-inline" style="width: 80px;">
                  <input type="text" name="paytransport" lay-verify="number" value="<?php echo $dkh?>" class="layui-input">
                </div>
                <div class="layui-form-mid layui-word-aux">一般为 80 或 443</div>
              </div>
              <div class="layui-form-item">
                <label class="layui-form-label">收单ID号</label>
                <div class="layui-input-inline">
                  <input type="text" name="payid" value="<?php echo $payid?>" lay-verify="email" autocomplete="off" class="layui-input">
                </div>
              </div>
              <div class="layui-form-item">
                <label class="layui-form-label">网关密匙</label>
                <div class="layui-input-inline">
                  <input type="text" name="paykey" value="<?php echo $paykey?>" autocomplete="off" class="layui-input">
                </div>
              </div>
					</form>
              <div class="layui-form-item">
                <div class="layui-input-block">
                  <button class="layui-btn"  id="paysetpost" type="button">确认保存</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
  <script src="../plugns/layui/layui.js"></script> 
  <script src='../plugns/layui/lay/modules/layer.js'></script>
  <script src="../js/jquery.min.js"></script>
  <script src="../js/funajax.js"></script>
<script>
	$("#paysetpost").click(function(){/*支付接口修改*/
		$.ajax({
			url:"../admin/class/paysetpost.php",
			type:"post",
			async:true,
			data:$("#paysetform").serialize(),
			success:function(data){
				if(data !="信息修改成功!"){
					layer.msg(data,{icon: 5});
				}else{
					layer.msg(data,{icon: 1});
					window.location.reload();
				}
			},
			Error:function(data){
				layer.msg('修改失败');
			},
		});
	});	
</script>
</html>
