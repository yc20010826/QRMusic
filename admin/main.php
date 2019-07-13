<?php 
@include_once("../system/webquery.php");
@include_once("../system/adminquery.php");
?>
<?php 
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
  <title>千软音乐网后台管控系统</title>
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
<body class="layui-layout-body">
<div class="layui-layout layui-layout-admin">
  <div class="layui-header">
    <div class="layui-logo">QianRuan音乐后台</div>
    <!-- 头部区域（可配合layui已有的水平导航） -->
    <ul class="layui-nav layui-layout-left">
      <li class="layui-nav-item"><a href="javascript:;" onClick="index()">后台首页</a></li>
      <li class="layui-nav-item"><a href="javascript:;" onClick="website()">网站设置</a></li>
      <li class="layui-nav-item"><a href="javascript:;">用户管理</a></li>
      <li class="layui-nav-item"><a href="/" target="_blank">预览网站</a></li>
      <li class="layui-nav-item"><a href="javascript:;">技术支持</a></li>
      
    </ul>
    <ul class="layui-nav layui-layout-right">
      <li class="layui-nav-item">
        <a href="javascript:;">
          <img src="http://q1.qlogo.cn/g?b=qq&nk=<?php echo $qq?>&s=100&t=1384608689 " class="layui-nav-img">
          <?php echo $Full_name?>
        </a>
        <dl class="layui-nav-child">
          <dd><a href="javascript:;" onClick='ziliao(<?php echo $_COOKIE['user']?>)'>基本资料</a></dd>
        </dl>
      </li>
      <li class="layui-nav-item"><a href="javascript:;" onClick="loginout()">退出登录</a></li>
    </ul>
  </div>
  
  <div class="layui-side layui-bg-black">
    <div class="layui-side-scroll">
      <!-- 左侧导航区域（可配合layui已有的垂直导航） -->
      <ul class="layui-nav layui-nav-tree"  lay-filter="test">
		  <li class="layui-nav-item"><a href="javascript:;" onClick="index()">后台首页</a></li>
        <li class="layui-nav-item layui-nav-itemed ">
          <a class="" href="javascript:;">平台设置</a>
          <dl class="layui-nav-child">
            <dd><a href="javascript:;" onClick="website()">基本信息</a></dd>
            <dd><a href="javascript:;" onClick="adminuser()">管理列表</a></dd>
            <dd><a href="javascript:;" onClick="email()">邮箱配置</a></dd>
          </dl>
        </li>
		  <li class="layui-nav-item">
          <a class="" href="javascript:;">服务设置</a>
          <dl class="layui-nav-child">
            <dd><a href="javascript:;" onClick="security()">安全设置</a></dd>
            <dd><a href="javascript:;" onClick="mechanism()">机制设置</a></dd>
           	 <!--<dd><a href="javascript:;" onClick="playfun()">功能设置</a></dd>-->
 <!--           <dd><a href="javascript:;">批量处理</a></dd>-->
          </dl>
        </li>
		  <li class="layui-nav-item">
          <a class="" href="javascript:;">用户管理</a>
          <dl class="layui-nav-child">
            <dd><a href="javascript:;" onClick="userlist()">用户信息</a></dd>
 <!--           <dd><a href="javascript:;">用户等级</a></dd>
            <dd><a href="javascript:;">批量处理</a></dd>-->
          </dl>
        </li>
<!--		  <li class="layui-nav-item">
          <a class="" href="javascript:;">资源管理</a>
          <dl class="layui-nav-child">
            <dd><a href="javascript:;">接口设置</a></dd>
          </dl>
        </li>-->
		  <li class="layui-nav-item">
          <a class="" href="javascript:;">财务管理</a>
          <dl class="layui-nav-child">
            <dd><a href="javascript:;" onClick="payapi()">支付接口</a></dd>
            <dd><a href="javascript:;" onClick="paylist()">充值记录</a></dd>
<!--            <dd><a href="javascript:;">余额管理</a></dd>
            <dd><a href="javascript:;">提现管理</a></dd>-->
          </dl>
        </li>
<!--		  <li class="layui-nav-item">
          <a class="" href="javascript:;">信息设置</a>
          <dl class="layui-nav-child">
            <dd><a href="javascript:;">采集接口</a></dd>
            <dd><a href="javascript:;">服务接口</a></dd>
            <dd><a href="javascript:;">用户反馈</a></dd>
            <dd><a href="javascript:;">cookie管理</a></dd>
          </dl>
        </li>-->
		  <li class="layui-nav-item">
          <a class="" href="javascript:;">服务支持</a>
          <dl class="layui-nav-child">
            <dd><a href="javascript:;">云市场</a></dd>
            <dd><a href="javascript:;">官方网站</a></dd>
            <dd><a href="javascript:;">技术支持</a></dd>
            <dd><a href="javascript:;">授权状态</a></dd>
          </dl>
        </li>
		  
      </ul>
    </div>
  </div>
  
  <div class="layui-body">
    <!-- 内容主体区域 -->
   <div style="padding: 15px;">
	  <iframe id="iframe" src="index.php" frameborder="0" class="layadmin-iframe" style="position: absolute;top: 0;bottom: 0;left: 0;right: 0;width: 100%;height: 100%;"></iframe>
	</div>
  </div>
  
  <div class="layui-footer" style="text-align:center;">
    <!-- 底部固定区域 -->
    <?php echo $copyright?> 千软软件开发工作室·杨成 © 版权所有
  </div>
</div>
<!--通用框架js-->
<script src="../plugns/layui/layui.js"></script>
<script src="../plugns/layui/lay/modules/jquery.js"></script>
	
<!-- layer弹窗插件 -->
<script src="../plugns/layer/layer.js"></script>
<script src="../js/config.js"></script>
	
<!-- jQuery文件 -->
<script src="../js/jquery.min.js"></script>
<script>
//JavaScript代码区域
layui.use('element', function(){
  var element = layui.element;
  
});
	var urliframe = document.getElementById("iframe");
	function website(){
		urliframe.src="website.php";
	}
	function index(){
		urliframe.src="index.php";
	}
	function email(){
		urliframe.src="email.php";
	}
	function security(){
		urliframe.src="security.php";
	}
	function loginout(){
		urliframe.src="loginout.php";
	}
	function adminuser(){
		urliframe.src="adminuser.php";
	}
	function userlist(){
		urliframe.src="userlist.php";
	}
	function payapi(){
		urliframe.src="payapi.php";
	}
	function paylist(){
		urliframe.src="paylist.php";
	}
	function mechanism(){
		urliframe.src="mechanism.php";
	}
	function playfun(){
		urliframe.src="playfun.php";
	}
	
	function ziliao(idh){
		layer.open({
			type:2,
			title:"资料修改",
			content:"adminuseredit.php?id="+idh,
			area: ['450px', '600px'],
		});
	}
</script>
</body>
</html>