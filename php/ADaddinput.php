<?php require_once('config.php');?>
<?php
if(!isset($_POST['mid'])){
	die('medicine number is not defined');
}
if(!isset($_POST['aid'])){
	die('agency number is not defined');
}
if(!isset($_POST['sid'])){
	die('suppliers number is not defined');
}
if(!isset($_POST['ino'])){
	die('input number is not defined');
}
if(!isset($_POST['iprice'])){
	die('input iprice is not defined');
}
if(!isset($_POST['inum'])){
	die('input inum is not defined');
}
if(!isset($_POST['year'])){
	die('input year is not defined');
}
if(!isset($_POST['month'])){
	die('input month is not defined');
}
if(!isset($_POST['day'])){
	die('input day is not defined');
}
if(!isset($_POST['idescribe'])){
	die('input idescribe is not defined');
}

$mid=$_POST['mid'];
$aid=$_POST['aid'];
$sid=$_POST['sid'];
$ino=$_POST['ino'];
$iprice=$_POST['iprice'];
$inum=$_POST['inum'];
$year=$_POST['year'];
$month=$_POST['month'];
$day=$_POST['day'];
$idescribe=$_POST['idescribe'];

$sql_4="SELECT count(*) FROM $my_medicine WHERE mid='$mid'";
$re_4=mysql_query($sql_4,$conn) or die(mysql_error());
$count_4=mysql_fetch_row($re_4);
if($count_4[0]==0)
{
	echo "<script>  alert('系统并不存在此药品编号！请确认信息是否有误！');javascript:history.go(-1);</script>";
	exit();
}
$sql_5="SELECT count(*) FROM $my_agency WHERE aid='$aid'";
$re_5=mysql_query($sql_5,$conn) or die(mysql_error());
$count_5=mysql_fetch_row($re_5);
if($count_5[0]==0)
{
	echo "<script>  alert('系统并不存在此经办人编号！请确认信息是否有误！');javascript:history.go(-1);</script>";
	exit();
}
$sql_3="SELECT count(*) FROM $my_suppliers WHERE sid='$sid'";
$re_3=mysql_query($sql_3,$conn) or die(mysql_error());
$count_3=mysql_fetch_row($re_3);
if($count_3[0]==0)
{
	echo "<script>  alert('系统并不存在此供应商编号！请确认信息是否有误！');javascript:history.go(-1);</script>";
	exit();
}
$sql_1="SELECT count(*) FROM $my_input WHERE ino='$ino'";
$sql_2="SELECT count(*) FROM $my_masi WHERE mid='$mid' and aid='$aid' and sid='$sid' and ino='$ino'";
$re_1=mysql_query($sql_1,$conn) or die(mysql_error());
$re_2=mysql_query($sql_2,$conn) or die(mysql_error());
$count_1=mysql_fetch_row($re_1);
$count_2=mysql_fetch_row($re_2);
if($count_1[0]>0)
{
	echo "<script>  alert('该系统已存在此商品批号！请重新输入！');javascript:history.go(-1);</script>";
}
else
{
	mysql_query("INSERT INTO input(ino,iprice,inum,year,month,day,idescribe) VALUES('$ino',$iprice,$inum,'$year','$month','$day','$idescribe')");
}
if($count_2[0]>0)
{
	echo "<script>  alert('系统已同时存在相同的药品编号、经办人编号、供应商编号以及商品批号！请确认信息是否有误！');javascript:history.go(-1);</script>";
}
else
{
	mysql_query("INSERT INTO masi(mid,aid,sid,ino) VALUES('$mid','$aid','$sid','$ino')");
	mysql_query("INSERT INTO stock(mid,ino,snum) VALUES('$mid','$ino',$inum)");
	echo "<script> alert('进货记录添加成功！');</script>";
}
?>
