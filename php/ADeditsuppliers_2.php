<?php require_once('config.php');?>

<?php
$sid=$_POST['sid'];
$sname=$_POST['sname'];
$ssex=$_POST['ssex'];
$sphone=$_POST['sphone'];

mysql_query("UPDATE suppliers SET sname='$sname',ssex='$ssex',sphone='$sphone' WHERE sid='$sid'");
if(mysql_errno())
{
	echo "<script>  alert('系统出错！');javascript:history.go(-1);</script>";
}else{
	echo "<script>  alert('修改成功！');location.href='../php/ADallsuppliers.php'</script>";
}

?>