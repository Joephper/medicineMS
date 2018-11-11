<?php require_once('config.php');?>
<?php
session_start();
unset($_SESSION["phone"]);
header("Location:shouye.php");
?>