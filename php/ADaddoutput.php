<?php require_once('config.php');?>
<?php
if(!isset($_POST['id'])){
	die('users number is not defined');
}
if(!isset($_POST['mid'])){
	die('medicine number is not defined');
}
if(!isset($_POST['aid'])){
	die('agency number is not defined');
}
if(!isset($_POST['ino'])){
	die('input number is not defined');
}
if(!isset($_POST['symptom'])){
	die('users symptom is not defined');
}
if(!isset($_POST['onum'])){
	die('output onum is not defined');
}
if(!isset($_POST['odescribe'])){
	die('output odescribe is not defined');
}

$id=$_POST['id'];
$mid=$_POST['mid'];
$aid=$_POST['aid'];
$ino=$_POST['ino'];
$symptom=$_POST['symptom'];
$onum=$_POST['onum'];
$odescribe=$_POST['odescribe'];
$sql_1="SELECT count(*) FROM $my_user WHERE id='$id'";
$re_1=mysql_query($sql_1,$conn) or die(mysql_error());
$count_1=mysql_fetch_row($re_1);
if($count_1[0]==0)
{
	echo "<script>  alert('系统并不存在此用户编号！请确认信息是否有误！');javascript:history.go(-1);</script>";
	exit();
}
$sql_2="SELECT count(*) FROM $my_medicine WHERE mid='$mid'";
$re_2=mysql_query($sql_2,$conn) or die(mysql_error());
$count_2=mysql_fetch_row($re_2);
if($count_2[0]==0)
{
	echo "<script>  alert('系统并不存在此药品编号！请确认信息是否有误！');javascript:history.go(-1);</script>";
	exit();
}
$sql_3="SELECT count(*) FROM $my_agency WHERE aid='$aid'";
$re_3=mysql_query($sql_3,$conn) or die(mysql_error());
$count_3=mysql_fetch_row($re_3);
if($count_3[0]==0)
{
	echo "<script>  alert('系统并不存在此经办人编号！请确认信息是否有误！');javascript:history.go(-1);</script>";
	exit();
}
$sql_4="SELECT count(*) FROM $my_input WHERE ino='$ino'";
$re_4=mysql_query($sql_4,$conn) or die(mysql_error());
$count_4=mysql_fetch_row($re_4);
if($count_4[0]==0)
{
	echo "<script>  alert('系统并不存在此商品批号！请确认信息是否有误！');javascript:history.go(-1);</script>";
	exit();
}
$sql_5="SELECT * FROM $my_masi WHERE ino='$ino'";
$result=mysql_query($sql_5,$conn) or die(mysql_error());
$result_arr=mysql_fetch_assoc($result);
if($mid!=$result_arr['mid'])
{
	echo "<script>  alert('商品批号与药品编号不符！请确认信息是否有误！');javascript:history.go(-1);</script>";
	exit();
}
$sql="SELECT count(*) FROM $my_output WHERE id='$id' and mid='$mid' and aid='$aid' and ino='$ino'";
$re=mysql_query($sql,$conn) or die(mysql_error());
$count=mysql_fetch_row($re);
if($count[0]>0)
{
	echo "<script>  alert('系统已同时存在相同的用户编号、经办人编号、供应商编号以及商品批号！请确认信息是否有误！');javascript:history.go(-1);</script>";
	exit();
}
else
{
	mysql_query("INSERT INTO output(id,mid,aid,ino,symptom,onum,odescribe) VALUES($id,'$mid','$aid','$ino','$symptom',$onum,'$odescribe')");
	$result=mysql_query("SELECT * FROM stock WHERE mid='$mid' and ino='$ino'");
	$result_arr=mysql_fetch_assoc($result);
	$snum=$result_arr['snum'];
	mysql_query("UPDATE stock SET snum='$snum'-'$onum' WHERE mid='$mid' and ino='$ino'");
	echo "<script> alert('销售记录添加成功！');window.location.href='../php/ADalloutput.php';</script>";
}
?>
