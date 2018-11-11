<?php 
require_once('config.php');
if(empty($_GET['sid']))
{
	die('sid is empty');
}
$sid=$_GET['sid'];
mysql_query("DELETE FROM suppliers WHERE sid='$sid'");
if(mysql_errno())
{
	die('Fail to delete suppliers with sid $sid');
}else{
	header("Location:../php/ADallsuppliers.php");
}
?>