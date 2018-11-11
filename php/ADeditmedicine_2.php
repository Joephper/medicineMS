<?php require_once('config.php');?>

<?php
$mid=$_POST['mid'];
$mname=$_POST['mname'];
$price=$_POST['price'];
$material=$_POST['material'];
$mmode=$_POST['mmode'];
$function=$_POST['function'];
$class=$_POST['class'];

mysql_query("UPDATE medicine SET mname='$mname',price='$price',material='$material',
mmode='$mmode',function='$function',class='$class' WHERE mid='$mid'");
if(mysql_errno())
{
	echo "<script>  alert('系统出错！');javascript:history.go(-1);</script>";
}else{
	echo "<script>  alert('修改成功！');location.href='../php/ADallmedicine.php'</script>";
}

?>