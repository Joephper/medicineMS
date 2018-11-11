<?php 
require_once('config.php');
if(empty($_GET['mid']))
{
	die('mid is empty');
}
$mid=$_GET['mid'];
mysql_query("DELETE FROM medicine WHERE mid='$mid'");
if(mysql_errno())
{
	die('Fail to delete medicine with mid $mid');
}else{
	header("Location:../php/ADallmedicine.php");
}
?>