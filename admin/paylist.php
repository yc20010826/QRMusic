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
				<div class="layui-card-header">充值记录</div>
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
								  <th>商户单号</th>
								  <th>充值金额</th>
								  <th>创建时间</th>
								  <th>完成时间</th>
								  <th>充值状态</th>
								  <th>最终标识</th>
								  <th>操作</th>
								</tr> 
							  </thead>
							  <tbody>
								<?php 
								@include_once("../system/database.php");
								getConnect();
								$y = mysql_query("select * from yc_paylist ORDER BY Establishpaytime DESC  LIMIT 50 ");
								while($pay = mysql_fetch_assoc($y)){
									echo"
									<form id='listadminuser".$pay['id']."'>
										<tr>
										  <td name='id'>".$pay['uid']."</td>
										  <td>".$pay['username']."</td>
										  <td>".$pay['orderid']."</td>
										  <td>".$pay['money']."元</td>
										  <td>".$pay['Establishpaytime']."</td>
										  <td>".$pay['Completiontime']."</td>
										  <td>".$pay['paystate']."</td>
										  <td>".$pay['state']."</td>
										  <td>
											  <div style='padding-bottom: 0px;'>
												<a class='layui-btn layui-btn-normal layui-btn-xs' lay-event='edit' id='edit' onClick='ziliao(".$pay['id'].")'><i class='layui-icon layui-icon-search'></i>查看详情</a>
												<a class='layui-btn layui-btn-danger layui-btn-xs' lay-event='del' id='del' onClick='bukuan(".$pay['id'].")'><i class='layui-icon layui-icon-auz'></i>到账补款</a>
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
				title:"订单详情",
				content:"payedit.php?id="+idh,
				area: ['450px', '700px'],
				//btnAlign:"c",
				//btn:['关闭'],
			});
	}
	function bukuan(idh){
		layer.open({
				type:2,
				title:"支付补款",
				content:"paybukuan.php?id="+idh,
				area: ['430px', '500px'],
				//btnAlign:"c",
				//btn:['关闭'],
			});
	}
</script>
</html>