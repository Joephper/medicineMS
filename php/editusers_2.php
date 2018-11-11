<?php require_once('config.php');?>

<?php
$id=$_POST['id'];
$name=$_POST['name'];
$sex=$_POST['sex'];
$age=$_POST['age'];
$phone=$_POST['phone'];
$identity=$_POST['identity'];
$address=$_POST['address'];

mysql_query("UPDATE users SET name='$name',sex='$sex',age=$age,phone='$phone',identity='$identity',
address='$address' WHERE id=$id");
if(mysql_errno())
{
	echo "<script>  alert('已经存在同名账号或者身份证号！');javascript:history.go(-1);</script>";
}
else{
	echo "<script>  alert('修改成功！');location.href='../php/editusers_1.php'</script>";	
}

?>