<?php 
require_once('config.php');
if(empty($_GET['tid']))
{
	die('tid is empty');
}
$tid=$_GET['tid'];
mysql_query("DELETE FROM stock WHERE tid='$tid'");
if(mysql_errno())
{
	die('Fail to delete stock with tid $tid');
}else{
	header("Location:../php/ADallstock.php");
}
?>