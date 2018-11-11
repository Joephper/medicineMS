<?php require_once('config.php');?>
<?php
session_start();
$phone=$_POST["phone"];
$password=$_POST["password"];    
$sql_admin="SELECT count(*) FROM $my_user WHERE phone='$phone' AND password='$password' AND admin='1' limit 1";
$sql_NOadmin="SELECT count(*) FROM $my_user WHERE phone='$phone' AND password='$password' AND admin='0' limit 1";
$sql_Agency="SELECT count(*) FROM $my_user WHERE phone='$phone' AND password='$password' AND admin='2' limit 1";
$re_admin=mysql_query($sql_admin,$conn) or die(mysql_error());
$re_NOadmin=mysql_query($sql_NOadmin,$conn) or die(mysql_error());
$re_Agency=mysql_query($sql_Agency,$conn) or die(mysql_error());
$count_admin=mysql_fetch_row($re_admin);
$count_NOadmin=mysql_fetch_row($re_NOadmin);
$count_Agency=mysql_fetch_row($re_Agency);
if($count_admin[0]>0)                                                                                                  
{
	$_SESSION["phone"]=$phone;
	header("Location:../html/AD.html");
}
if($count_NOadmin[0]>0)
{
	$_SESSION["phone"]=$phone;
	header("Location:../php/shouye.php");
}
if($count_Agency[0]>0)
{
	$_SESSION["phone"]=$phone;
	header("Location:../html/agency.html");
}
if($count_admin[0]==0 && $count_NOadmin[0]==0 && $count_Agency[0]==0)
{
	echo "<script>";
	echo "alert('账号或密码错误！');history.go(-1);";
	echo "</script>";
}
?>