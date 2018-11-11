<?php require_once('config.php');?>
<?php
if(!isset($_POST['aid'])){
	die('agency number is not defined');
}
if(!isset($_POST['aname'])){
	die('agency name is not defined');
}
if(!isset($_POST['asex'])){
	die('agency sex is not defined');
}
if(!isset($_POST['aphone'])){
	die('agency phone is not defined');
}

$aid=$_POST['aid'];
$aname=$_POST['aname'];
$asex=$_POST['asex'];
$aphone=$_POST['aphone'];

$sql="SELECT count(*) FROM $my_agency WHERE aid='$aid' or aphone='$aphone'";
$re=mysql_query($sql,$conn) or die(mysql_error());
$count=mysql_fetch_row($re);
if($count[0]>0)
{
	echo "<script>  alert('已存在相同的编号或者手机号码！请重新输入！');javascript:history.go(-1);</script>";
}
else
{
	mysql_query("INSERT INTO agency(aid,aname,asex,aphone) VALUES('$aid','$aname','$asex','$aphone')");
	echo "<script> alert('经办人信息添加成功！');</script>";
}

?>
