<?php require_once('config.php');?>
<?php
if(!isset($_POST['name'])){
	die('user name is not defined');
}
if(!isset($_POST['sex'])){
	die('user sex is not defined');
}
if(!isset($_POST['age'])){
	die('user age is not defined');
}
if(!isset($_POST['phone'])){
	die('user phone is not defined');
}
if(!isset($_POST['identity'])){
	die('user identity is not defined');
}
if(!isset($_POST['address'])){
	die('user address is not defined');
}
if(!isset($_POST['password'])){
	die('user password is not defined');
}
$name=$_POST['name'];
$sex=$_POST['sex'];
$age=$_POST['age'];
$phone=$_POST['phone'];
$identity=$_POST['identity'];
$address=$_POST['address'];
$password=$_POST['password'];
$sql="SELECT count(*) FROM $my_user WHERE phone='$phone' or identity='$identity'";
$re=mysql_query($sql,$conn) or die(mysql_error());
$count=mysql_fetch_row($re);
if($count[0]>0)
{
	echo "<script>  alert('已经存在同名账号或者身份证号！');javascript:history.go(-1);</script>";
}
else
{
	mysql_query("INSERT INTO users(name,sex,age,phone,identity,address,password) VALUES('$name','$sex',$age,'$phone','$identity','$address','$password')");
	echo "<script>  alert('注册成功！');</script>";
    header("Location:../html/index.html");
}

?>
