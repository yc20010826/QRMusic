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
  <title>功能配置</title>
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
          <div class="layui-card-header">功能配置</div>
          <div class="layui-card-body">
            <form action="" id="securityform">
            <div class="layui-form" wid100 lay-filter="playfun">
					<div class="layui-form-item">
                <label class="layui-form-label">是否自动播放</label>
                <div class="layui-input-inline">
                  <input type="checkbox" name="autoplay" lay-skin="switch" lay-text="开启|关闭" value="true" lay-filter="autoplay">
                </div>
                <div class="layui-form-mid layui-word-aux">此选项在移动端可能无效</div>
              </div>
					
              <div class="layui-form-item">
                <label class="layui-form-label">开启封面背景</label>
                <div class="layui-input-inline">
                  <input type="checkbox" name="coverbg" lay-skin="switch" lay-text="开启|关闭" value="true">
                </div>
				  		<div class="layui-form-mid layui-word-aux">*电脑端，开启后随歌曲封面更换网站背景，开启后会有些卡</div>
					</div>
					<div class="layui-form-item">
                <label class="layui-form-label">开启封面背景</label>
                <div class="layui-input-inline">
                  <input type="checkbox" name="mcoverbg" lay-skin="switch" lay-text="开启|关闭" value="true">
                </div>
				  		<div class="layui-form-mid layui-word-aux">*移动端，开启后随歌曲封面更换网站背景，开启后会有些卡</div>
					</div>
					<div class="layui-form-item">
                <label class="layui-form-label">进度条闪动点</label>
                <div class="layui-input-inline">
                  <input type="checkbox" name="dotshine" lay-skin="switch" lay-text="开启|关闭" value="true">
                </div>
				  		<div class="layui-form-mid layui-word-aux">*电脑端，是否开启播放进度条的小点闪动效果[不支持IE](true/false) *开启后会有些卡</div>
					</div>
					<div class="layui-form-item">
                <label class="layui-form-label">进度条闪动点</label>
                <div class="layui-input-inline">
                  <input type="checkbox" name="mdotshine" lay-skin="switch" lay-text="开启|关闭" value="true">
                </div>
				  		<div class="layui-form-mid layui-word-aux">*移动端，是否开启播放进度条的小点闪动效果[不支持IE](true/false) *开启后会有些卡</div>
					</div>
					<div class="layui-form-item">
                <label class="layui-form-label">开启调试模式</label>
                <div class="layui-input-inline">
                  <input type="checkbox" name="debug" lay-skin="switch" lay-text="开启|关闭" value="true">
                </div>
				  		<div class="layui-form-mid layui-word-aux">是否开启DEBUG调试模式</div>
					</div>
					
              <div class="layui-form-item">
                <label class="layui-form-label">结果单页条数</label>
                <div class="layui-input-inline">
                  <select name="loadcount" lay-verify="">
							  <option value=""></option>
							  <option value="20">20</option>
							  <option value="30">30</option>
							  <option value="40">40</option>
							  <option value="50">50</option>
							</select>
                </div>
                <div class="layui-form-mid layui-word-aux">前台搜索结果一次加载多少条，请勿过多，视你的服务器性能</div>
              </div>
            </div>
              <div class="layui-form-item">
				  </form>
                <div class="layui-input-block">
                  <button class="layui-btn" type="button" id="playfunpost">确认保存</button>
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
	layui.use('form', function(){
	  var form = layui.form;
		form.on('checkbox(playfun)', function(data){
		  console.log(data.elem); //得到checkbox原始DOM对象
		  console.log(data.elem.checked); //是否被选中，true或者false
		  console.log(data.value); //复选框value值，也可以通过data.elem.value得到
		  console.log(data.othis); //得到美化后的DOM对象
		});
	});
</script>
<script>
	$("#playfunpost").click(function(){/*功能修改*/
		$.ajax({
			url:"1.txt",
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
