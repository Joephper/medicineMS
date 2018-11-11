<?php require_once('config.php');?>

<?php
$aid=$_POST['aid'];
$aname=$_POST['aname'];
$asex=$_POST['asex'];
$aphone=$_POST['aphone'];

mysql_query("UPDATE agency SET aname='$aname',asex='$asex',aphone='$aphone' WHERE aid='$aid'");
if(mysql_errno())
{
	echo "<script>  alert('系统出错！');javascript:history.go(-1);</script>";
}else{
	echo "<script>  alert('修改成功！');location.href='../php/ADallagency.php'</script>";
}

?>