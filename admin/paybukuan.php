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
		$type = '';
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
<form id="bukuanform">
	<div class="layui-form" lay-filter="layuiadmin-form-admin" id="layuiadmin-form-admin" style="padding: 20px 50px 0 0;">
	<div class="layui-form-item">
      <label class="layui-form-label">订单单号</label>
      <div class="layui-input-inline">
        <input value="<?php echo $orderid?>" type="text" name="orderid" lay-verify="required" placeholder="无数据" autocomplete="off" class="layui-input" readonly>
      </div>
    <div class="layui-form-item">
      <label class="layui-form-label">充值账户</label>
      <div class="layui-input-inline">
		  <input type="hidden" name='id' value="<?php echo $uid?>">
        <input value="<?php echo $username?>" type="text" name="username" lay-verify="required" placeholder="无数据" autocomplete="off" class="layui-input" readonly>
      </div>
    </div>
    <div class="layui-form-item">
      <label class="layui-form-label">充值金额</label>
      <div class="layui-input-inline">
		  <input type="hidden" name='money' value="<?php echo $money?>">
        <input value="<?php echo $money	?>元" type="text" name="moneys" lay-verify="required" placeholder="无数据" autocomplete="off" class="layui-input" readonly>
      </div>
    </div>
    <div class="layui-form-item">
      <label class="layui-form-label">充值状态</label>
      <div class="layui-input-inline">
        <input value="<?php echo $paystate?>" type="text" name="paystate" lay-verify="required" placeholder="无数据" autocomplete="off" class="layui-input" readonly>
      </div>
    </div>
		<div class="layui-form-item">
      <label class="layui-form-label">最终标识</label>
      <div class="layui-input-inline">
        <input value="<?php echo $state?>" type="text" name="state" lay-verify="required" placeholder="无数据" autocomplete="off" class="layui-input" readonly>
      </div>
    </div>
		<div style="text-align: center; width: 100%; margin-left: 7%; color: #FF0004"><p>风险提示：请确认您已收到货款，此操作后将对该账户补款！</p></div>
		<div style="height: 5px;"></div>
</form>
  </div>
	<div style="text-align: center;">
		<button type='button' class='layui-btn layui-btn-danger' id='bukuan' style='margin-left: 40px;'>立即补款到账</button>
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
$("#bukuan").click(function(){
		$.ajax({
			url:"class/bukuanpost.php",
			type:"post",
			async:true,
			data:$("#bukuanform").serialize(),
			success:function(msg){
				if(msg !="补款成功"){
					layer.msg(msg,{icon: 5});
				}else{
					layer.msg(msg,{icon: 1});
					window.location.reload();
				}
			},
			Error:function(msg){
				layer.msg('补款失败');
			},
		});
});	
$("#errnot").click(function(){
	layer.msg("该订单已入账，无需操作补款",{icon: 5});
});
</script>
</html>