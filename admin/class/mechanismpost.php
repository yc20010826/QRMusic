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
@$regDownNum=$_POST['regDownNum'];
@$wzcDownNum=$_POST['wzcDownNum'];
$xg="update yc_config set authDownNum='$wzcDownNum',regDownNum='$regDownNum' where id=1";
if(false!==mysql_query($xg)){ 
	echo "信息修改成功!";
}else{
	echo "信息修改失败"; 
}

?>