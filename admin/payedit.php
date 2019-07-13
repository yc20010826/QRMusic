<?php 
@include_once("../system/database.php");
getConnect();
if($_GET['id'] == ''){
	
}else{
	@$id = $_GET['id'];
	@$pay = mysql_fetch_assoc(mysql_query("select * from yc_paylist where id=$id"));
	@$id = $pay['id'];
	@$uid = $pay['uid'];
	@$username = $pay['username'];
	@$orderid = $pay['orderid'];
	@$trade_no = $pay['trade_no'];
	@$money = $pay['money'];
	@$Establishpaytime = $pay['Establishpaytime'];
	@$Completiontime = $pay['Completiontime'];
	@$paystate = $pay['paystate'];
	@$state = $pay['state'];
	if($pay['type'] =='alipay'){
		$type = '支付宝支付';
	}elseif($pay['type'] =='wxpay'){
		$type = '微信支付';
	}elseif($pay['type'] =='qqpay'){
		$type = 'QQ钱包支付';
	}elseif($pay['type'] =='cftpay'){
		$type = '财付通支付';
	}else{
		$type = $pay['type'];
	}
}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>支付详情</title>
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
      <label class="layui-form-label">数据序列</label>
      <div class="layui-input-inline">
		   <input type="hidden" name='id' value="<?php echo $id?>">
        <input value="<?php echo $id?>" type="text" name="username" lay-verify="required" placeholder="无数据" autocomplete="off" class="layui-input" readonly>
      </div>
    </div>
    <div class="layui-form-item">
      <label class="layui-form-label">账户ID号</label>
      <div class="layui-input-inline">
		   <input type="hidden" name='id' value="<?php echo $id?>">
        <input value="<?php echo $uid?>" type="text" name="username" lay-verify="required" placeholder="无数据" autocomplete="off" class="layui-input" readonly>
      </div>
    </div>
    <div class="layui-form-item">
      <label class="layui-form-label">充值账户</label>
      <div class="layui-input-inline">
        <input value="<?php echo $username?>" type="text" name="password" lay-verify="required" placeholder="无数据" autocomplete="off" class="layui-input" readonly>
      </div>
    </div>
    <div class="layui-form-item">
      <label class="layui-form-label">订单单号</label>
      <div class="layui-input-inline">
        <input value="<?php echo $orderid?>" type="text" name="password" lay-verify="required" placeholder="无数据" autocomplete="off" class="layui-input" readonly>
      </div>
    </div>
    <div class="layui-form-item">
      <label class="layui-form-label">网关单号</label>
      <div class="layui-input-inline">
        <input value="<?php echo $trade_no?>" type="text" name="password" lay-verify="required" placeholder="无数据" autocomplete="off" class="layui-input" readonly>
      </div>
    </div>
    <div class="layui-form-item">
      <label class="layui-form-label">充值金额</label>
      <div class="layui-input-inline">
        <input value="<?php echo $money	?>元" type="text" name="password" lay-verify="required" placeholder="无数据" autocomplete="off" class="layui-input" readonly>
      </div>
    </div>
    <div class="layui-form-item">
      <label class="layui-form-label">支付方式</label>
      <div class="layui-input-inline">
        <input value="<?php echo $type?>" type="text" name="password" lay-verify="required" placeholder="无数据" autocomplete="off" class="layui-input" readonly>
      </div>
    </div>
    <div class="layui-form-item">
      <label class="layui-form-label">发起时间</label>
      <div class="layui-input-inline">
       <input value="<?php echo $Establishpaytime?>" type="text" name="password" lay-verify="required" placeholder="无数据" autocomplete="off" class="layui-input" readonly>
      </div>
    </div>
	<div class="layui-form-item">
      <label class="layui-form-label">完成时间</label>
      <div class="layui-input-inline">
        <input value="<?php echo $Completiontime?>" type="text" name="password" lay-verify="required" placeholder="无数据" autocomplete="off" class="layui-input" readonly>
      </div>
    </div>
    <div class="layui-form-item">
      <label class="layui-form-label">充值状态</label>
      <div class="layui-input-inline">
        <input value="<?php echo $paystate?>" type="text" name="password" lay-verify="required" placeholder="无数据" autocomplete="off" class="layui-input" readonly>
      </div>
    </div>
		<div class="layui-form-item">
      <label class="layui-form-label">最终标识</label>
      <div class="layui-input-inline">
        <input value="<?php echo $state?>" type="text" name="password" lay-verify="required" placeholder="无数据" autocomplete="off" class="layui-input" readonly>
      </div>
    </div>
		<div style="height: 5px;"></div>
</form>
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
</html>