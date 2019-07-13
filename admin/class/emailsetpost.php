<?php 
@include_once("../../system/webquery.php");
if(empty($_COOKIE['admin_id'])){
	echo "<script language=javascript>alert('非法访问，请检查是否登录！');parent.location.href='login.php';</script>";
}else{
	if(md5($_COOKIE['user']+$SecurityKey) === $_COOKIE['admin_id']){
		
	}else{
		echo "<script language=javascript>alert('信息异常，请重新登录！');parent.location.href='login.php';</script>";	
	}
}
?>
<?php 
include_once("../../system/database.php");
getConnect();
@$smtp_server=$_POST['smtp_server'];
@$cache=$_POST['cache'];
@$send_nickname=$_POST['send_nickname'];
@$send_email=$_POST['send_email'];
@$send_nickpassword=$_POST['send_nickpassword'];
$xg="update yc_emailconfig set smtp_server='$smtp_server',cache='$cache',send_nickname='$send_nickname',send_email='$send_email',send_nickpassword='$send_nickpassword' where id=1";
if(false!==mysql_query($xg)){ 
	echo "信息修改成功!";
}else{
	echo "信息修改失败"; 
}

?>