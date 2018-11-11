<?php require_once('config.php');?>
<?php
if(!isset($_POST['mid'])){
	die('medicine number is not defined');
}
if(!isset($_POST['mname'])){
	die('medicine name is not defined');
}
if(!isset($_POST['price'])){
	die('medicine price is not defined');
}
if(!isset($_POST['material'])){
	die('medicine material is not defined');
}
if(!isset($_POST['mmode'])){
	die('medicine mode is not defined');
}
if(!isset($_POST['function'])){
	die('medicine function is not defined');
}
if(!isset($_POST['class'])){
	die('medicine class is not defined');
}

$mid=$_POST['mid'];
$mname=$_POST['mname'];
$price=$_POST['price'];
$material=$_POST['material'];
$mmode=$_POST['mmode'];
$function=$_POST['function'];
$class=$_POST['class'];

$sql="SELECT count(*) FROM $my_medicine WHERE mid='$mid'";
$re=mysql_query($sql,$conn) or die(mysql_error());
$count=mysql_fetch_row($re);
if($count[0]>0)
{
	echo "<script>  alert('该系统已存在此编号！请重新编号！');javascript:history.go(-1);</script>";
}
else
{
	mysql_query("INSERT INTO medicine(mid,mname,price,material,mmode,function,class) VALUES('$mid','$mname',$price,'$material','$mmode','$function','$class')");
	echo "<script> alert('药品信息添加成功！');</script>";
}

?>
