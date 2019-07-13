<?php 
@include_once("../../system/database.php");
getConnect();
if($_POST['id'] == ''){
	echo "系统错误"; 
}else{
@$id = $_POST['id'];
@$username = $_POST['username'];
@$Full_name = $_POST['Full_name'];
@$qq = $_POST['qq'];
@$email = $_POST['email'];
@$phone = $_POST['phone'];
@$Jurisdiction = $_POST['Jurisdiction'];
@$state = $_POST['state'];
@$password  = $_POST['password'];
	if($password == ''){
		$xg = "update yc_admin set username='$username',Full_name='$Full_name',qq='$qq',email='$email',phone='$phone',Jurisdiction='$Jurisdiction',state='$state' where id='$id'";
		if(false!==mysql_query($xg)){ 
			echo "信息修改成功!";
		 }else{
			echo "修改失败"; 
		 }
	}else{
		@$mdpassword = md5($password);
		$xg = "update yc_admin set username='$username',Full_name='$Full_name',password='$mdpassword',qq='$qq',email='$email',phone='$phone',Jurisdiction='$Jurisdiction',state='$state' where id='$id'";
		if(false!==mysql_query($xg)){ 
			echo "信息修改成功!";
		 }else{
			echo "修改失败"; 
		 }
	}
}
?>