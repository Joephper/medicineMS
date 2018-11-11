<?php require_once('config.php');?>
<?php
if(!isset($_POST['sid'])){
	die('agency number is not defined');
}
if(!isset($_POST['sname'])){
	die('agency name is not defined');
}
if(!isset($_POST['ssex'])){
	die('agency sex is not defined');
}
if(!isset($_POST['sphone'])){
	die('agency phone is not defined');
}

$sid=$_POST['sid'];
$sname=$_POST['sname'];
$ssex=$_POST['ssex'];
$sphone=$_POST['sphone'];

$sql="SELECT count(*) FROM $my_suppliers WHERE sid='$sid' or sphone='$sphone'";
$re=mysql_query($sql,$conn) or die(mysql_error());
$count=mysql_fetch_row($re);
if($count[0]>0)
{
	echo "<script>  alert('已存在相同的编号或者手机号码！请重新输入！');javascript:history.go(-1);</script>";
}
else
{
	mysql_query("INSERT INTO suppliers(sid,sname,ssex,sphone) VALUES('$sid','$sname','$ssex','$sphone')");
	echo "<script> alert('供应商信息添加成功！');</script>";
}

?>
