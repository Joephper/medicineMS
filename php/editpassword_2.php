<?php require_once('config.php');
session_start();
?>
<?php
$pre_password=$_POST['pre_password'];
$password=$_POST['password'];
$re_password=$_POST['re_password'];
	
$phone=$_SESSION["phone"];	
$result=mysql_query("SELECT * FROM $my_user WHERE phone='$phone'");	
$arr=mysql_fetch_assoc($result);
$correct=$arr['password'];
if($correct!=$pre_password)
{
	echo "<script>alert('原始密码输入错误！');javascript:history.go(-1);</script>";
}
else{
	mysql_query("UPDATE users SET password='$password' WHERE phone='$phone'");
	echo "<script>  alert('修改成功！');location.href='../php/editusers_1.php'</script>";
}
?>