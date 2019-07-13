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
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>管理用户</title>
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

<body style="margin-top:10px; ">
	<div class="layui-fluid">
    <div class="layui-row layui-col-space15">
      <div class="layui-col-md12">
        <div class="layui-card">
				<div class="layui-card-header">用户列表</div>
          		<div class="layui-card-body" pad15>
							<table class="layui-table">
							  <colgroup>
								<col width="150">
								<col width="200">
								<col>
							  </colgroup>
							  <thead>
								<tr>
								  <th>用户ID</th>
								  <th>用户账号</th>
								  <th>Q  Q号码</th>
								  <th>手机号码</th>
								  <th>邮箱号码</th>
								  <th>剩余下载次数</th>
								  <th>账户状态</th>
								  <th>操作</th>
								</tr> 
							  </thead>
							  <tbody>
								<?php 
								@include_once("../system/database.php");
								getConnect();
								$y = mysql_query("select * from yc_users");
								while($user = mysql_fetch_assoc($y)){
									echo"
									<form id='listadminuser".$user['id']."'>
										<tr>
										  <td name='id'>".$user['id']."</td>
										  <td>".$user['username']."</td>
										  <td>".$user['qq']."</td>
										  <td>".$user['phone']."</td>
										  <td>".$user['email']."</td>
										  <td>".$user['Jurisdiction']."</td>
										  <td>".$user['state']."</td>
										  <td>
											  <div style='padding-bottom: 0px;'>
												<a class='layui-btn layui-btn-normal layui-btn-xs' lay-event='edit' id='edit' onClick='ziliao(".$user['id'].")'><i class='layui-icon layui-icon-edit'></i>编辑</a>
          									<a class='layui-btn layui-btn-danger layui-btn-xs' lay-event='del' id='del' onClick='del(".$user['id'].")'><i class='layui-icon layui-icon-delete'></i>删除</a>
											  </div>
										  </td>
										</tr>
									</form>
									";
								}
								?>
							  </tbody>
							</table>
						</div>
					</div>
				</div>
		  	</div>
		</div>
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
	function ziliao(idh){
			layer.open({
				type:2,
				title:"资料修改",
				content:"useredit.php?id="+idh,
				area: ['450px', '600px'],
			});
	}
	function del(idh){
		layer.msg("删除功能暂未上线",{icon:5});
	}
</script>
</html>