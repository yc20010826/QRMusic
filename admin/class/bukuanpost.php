<?php 
@include_once("../../system/database.php");
$id=$_POST['id'];
$username=$_POST['username'];
$paystate=$_POST['paystate'];
$orderid=$_POST['orderid'];
$type='后台补款';
$Completiontime=date("Y-m-d H:i:s");
$jine = $_POST['money']*10;
if($orderid==''|| empty($orderid)){
	echo "单号异常";
}else{
	getConnect();
	$query = "select state from yc_paylist where orderid=$orderid";
	$zhixing = mysql_query($query);
	$qushuju = mysql_fetch_assoc($zhixing);
	$state = $qushuju['state'];
	if($state == '1'){
		echo "该订单已入账，无需手工补单";
	}else{
		$sql = mysql_fetch_assoc(mysql_query("select * from yc_users where id='$id'"));
		$Jurisdiction=$sql['Jurisdiction']+$jine;
		$xg = "update yc_users set Jurisdiction='$Jurisdiction' where id='$id'";
		$log ="update yc_paylist set Completiontime='$Completiontime',paystate='管理员补款充值成功',state='1',trade_no='$orderid',type='$type' where orderid='$orderid'";
		if(false!==mysql_query($log)){ 
			if(false!==mysql_query($xg)){ 
				echo "补款成功";
			}else{
				echo "补款失败1"; 
			}
		}else{
			echo "补款失败2"; 
		}
	}
};

?>