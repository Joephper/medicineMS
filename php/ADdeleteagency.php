<?php 
require_once('config.php');
if(empty($_GET['aid']))
{
	die('aid is empty');
}
$aid=$_GET['aid'];
mysql_query("DELETE FROM agency WHERE aid='$aid'");
if(mysql_errno())
{
	die('Fail to delete agency with aid $aid');
}else{
	header("Location:../php/ADallagency.php");
}
?>