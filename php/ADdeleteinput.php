<?php 
require_once('config.php');
if(empty($_GET['ino']))
{
	die('ino is empty');
}
$ino=$_GET['ino'];
mysql_query("DELETE FROM input WHERE ino='$ino'");
if(mysql_errno())
{
	die('Fail to delete input with ino $ino');
}else{
	header("Location:../php/ADallinput.php");
}
?>