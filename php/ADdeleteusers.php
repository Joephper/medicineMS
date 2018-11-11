<?php 
require_once('config.php');
if(empty($_GET['id']))
{
	die('id is empty');
}
$id=intval($_GET['id']);
mysql_query("DELETE FROM users WHERE id=$id");
if(mysql_errno())
{
	die('Fail to delete user with id $id');
}else{
	header("Location:../php/ADallusers.php");
}
?>