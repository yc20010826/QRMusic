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
@$url=$_POST['url'];
@$title=$_POST['title'];
@$description=$_POST['description'];
@$keywords=$_POST['keywords'];
@$Contact_QQ=$_POST['Contact_QQ'];
@$copyright=$_POST['copyright'];
@$icp=$_POST['icp'];
if($title == ''||$title == null){
	echo "
	 <script>
	 	alert('Title网站名称不能为空！'); 
		history.back();
	 </script>";
}else{
	$xg="update yc_config set url='$url',title='$title',description='$description',keywords='$keywords',Contact_QQ='$Contact_QQ',copyright='$copyright',icp='$icp' where id=1";
	 if(false!==mysql_query($xg)){ 
		 echo "
		 <script>
			alert('信息修改成功！');
			history.back();
		 </script>";
	 }else{
		echo "
		 <script>
			alert('信息修改失败！');
			history.back();
		 </script>"; 
	 }
}

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>网站设置</title>
  <meta name="renderer" content="webkit">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0">
</head>