<?php require_once('config.php');?>

<?php
$tid=$_POST['tid'];
$mid=$_POST['mid'];
$ino=$_POST['ino'];
$snum=$_POST['snum'];

$sql_2="SELECT count(*) FROM $my_medicine WHERE mid='$mid'";
$re_2=mysql_query($sql_2,$conn) or die(mysql_error());
$count_2=mysql_fetch_row($re_2);
if($count_2[0]==0)
{
	echo "<script>  alert('系统并不存在此药品编号！请确认信息是否有误！');javascript:history.go(-1);</script>";
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
mysql_query("UPDATE stock SET mid='$mid',ino='$ino',snum='$snum' WHERE tid='$tid'");
if(mysql_errno())
{
	echo "<script>  alert('系统出错！');javascript:history.go(-1);</script>";
}else{
	echo "<script>  alert('修改成功！');location.href='../php/ADallstock.php'</script>";
}

?>