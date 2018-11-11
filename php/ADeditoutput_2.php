<?php require_once('config.php');?>
<?php
$oid=$_POST['oid'];
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
mysql_query("UPDATE output SET id='$id',mid='$mid',aid='$aid',ino='$ino',symptom='$symptom',onum='$onum',
odescribe='$odescribe' WHERE oid='$oid'");
if(mysql_errno())
{
	echo "<script>  alert('系统出错！');javascript:history.go(-1);</script>";
}else{
	echo "<script>  alert('修改成功！');location.href='../php/ADalloutput.php'</script>";
}

?>