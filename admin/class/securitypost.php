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
@$SecurityKey=$_POST['SecurityKey'];
@$FloatingKey=$_POST['FloatingKey'];
if($FloatingKey == ''||$FloatingKey == null ||$SecurityKey == ''||$SecurityKey == null){
	echo "密匙不能为空！";
}else{
	$xg="update yc_config set FloatingKey='$FloatingKey',SecurityKey='$SecurityKey' where id=1";
	 if(false!==mysql_query($xg)){ 
		 echo "信息修改成功!";
	 }else{
		echo "信息修改失败！"; 
	 }
}

?>