<?php 
require_once('config.php');
if(empty($_GET['oid']))
{
	die('oid is empty');
}
$oid=$_GET['oid'];
mysql_query("DELETE FROM output WHERE oid='$oid'");
if(mysql_errno())
{
	die('Fail to delete output with oid $oid');
}else{
	header("Location:../php/ADalloutput.php");
}
?>