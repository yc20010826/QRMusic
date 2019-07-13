<?php 
include_once("../../system/database.php");
include_once("../../system/webquery.php");
getConnect();
if($_POST['username'] == ''||$_POST['password'] == ''){
	echo "
	 <script>
	 	alert('用户名密码不能为空！'); 
		history.back();
	 </script>";
}else{
	@$username=$_POST['username'];
	@$password=md5($_POST['password']);
	$xg="select * from yc_admin where username='$username'";
	 if(false!==mysql_query($xg)){ 
		 $sql = mysql_fetch_assoc(mysql_query($xg));
		 if($password === $sql['password']){
			$maid = md5($sql['id']+$SecurityKey);
			$uid = $sql['id'];
			$Full_name = $sql['Full_name'];
			setcookie("admin_id",$maid, time()+4600,'/admin');
			setcookie("user",$uid, time()+4600,'/admin');
			setcookie("Full_name",$Full_name, time()+4600,'/admin');
			echo "
				 <script>
					alert('登录成功！');
					location.assign('../main.php');
				 </script>";  
		 }else{
			echo "
				 <script>
					alert('登录失败！');
					history.back();
				 </script>";  
		 }
	 }else{
		echo "
		 <script>
			alert('登录失败！');
			history.back();
		 </script>"; 
	 }
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>登录网关</title>
  <meta name="renderer" content="webkit">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0">
</head>