<?php require_once('config.php');?>
<?php
if(!isset($_POST['mid'])){
	die('output mid is not defined');
}
if(!isset($_POST['ino'])){
	die('output ino is not defined');
}
if(!isset($_POST['snum'])){
	die('stock snum is not defined');
}

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
$sql="SELECT count(*) FROM $my_stock WHERE mid='$mid' and ino='$ino'";
$re=mysql_query($sql,$conn) or die(mysql_error());
$count=mysql_fetch_row($re);
if($count[0]>0)
{
	echo "<script>  alert('已同时存在相同的药品编号和商品批号！请重新输入！');javascript:history.go(-1);</script>";
}
else
{
	mysql_query("INSERT INTO stock(mid,ino,snum) VALUES('$mid','$ino',$snum)");
	echo "<script> alert('库存信息添加成功！');</script>";
}

?>
