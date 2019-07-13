<?php 
include_once("../system/webquery.php");
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=0">
<meta name="renderer" content="webkit">
<meta name="author" content="mengkun">
<meta name="generator" content="KodCloud">
<meta http-equiv="Cache-Control" content="no-siteapp">
<!-- 强制移动设备以app模式打开页面(即在移动设备下全屏，仅支持部分浏览器) -->
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-touch-fullscreen" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<meta name="full-screen" content="yes"><!--UC强制全屏-->
<meta name="browsermode" content="application"><!--UC应用模式-->
<meta name="x5-fullscreen" content="true"><!--QQ强制全屏-->
<meta name="x5-page-mode" content="app"><!--QQ应用模式-->
<title>网站设置</title>
<link rel="stylesheet" href="../css/main.css">
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
	<?php 
	include_once("../system/header.php");
	?>
	<div class="subject">
		<h2 align="center">网站设置</h2>
		<form class="layui-form" action="">
		网站名称：<input type="text" name="title" required lay-verify="required" placeholder="请输入标题" autocomplete="off" class="layui-input" value="<?php echo $title?>"> 
		站长QQ：<input type="text" name="title" required lay-verify="required" placeholder="请输入标题" autocomplete="off" class="layui-input" value="<?php echo $Contact_QQ?>"> 
		网站简介：<textarea name="" required lay-verify="required" placeholder="请输入" class="layui-textarea"><?php echo $description?><?php echo $keywords?></textarea>
		网站关键字：<textarea name="" required lay-verify="required" placeholder="请输入" class="layui-textarea"><?php echo $keywords?></textarea>
		网站底部版权：<textarea name="" required lay-verify="required" placeholder="请输入" class="layui-textarea"><?php echo $copyright?></textarea>
		网站底部备案：<textarea name="" required lay-verify="required" placeholder="请输入" class="layui-textarea"><?php echo $icp?></textarea>
		</form>
		<div class="btncole">
			<button type="button" class="layui-btn layui-btn-normal">立即修改</button>
			<button type="button" class="layui-btn">取消操作</button>
		</div>
	</div>
	<?php 
	include_once("../system/footer.php");
	?>	
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
layui.use('element', function(){
  var element = layui.element; //导航的hover效果、二级菜单等功能，需要依赖element模块
  
  //监听导航点击
  element.on('nav(demo)', function(elem){
    //console.log(elem)
    layer.msg(elem.text());
  });
});
</script>
</html>