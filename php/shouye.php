<?php require_once('config.php');
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="../css/shouye.css" type="text/css" > 
<title>万家制药</title>
<style>
	body{ background-color:#2E2E2E;}
	.zy-Slide section{ color: #FFFFFF; border-width: 1px; border-style: solid; }
</style>
</head>

<body>
<div class="content">
<div class="logo">
	<span>
        <img src="../image/logo.png" width="60" height="60">
        <img src="../image/ss.png">
    </span>
<div class="login">
<span class="right">
	<?php 
	if(!isset($_SESSION["phone"]))
	{
?>
		<a style="text-decoration: none;margin-right:20px;" href="../html/index.html">登录</a>
<?php
	}
	else{
		$phone=$_SESSION["phone"];	
		$result=mysql_query("SELECT * FROM $my_user WHERE phone='$phone'");	
		$result_arr=mysql_fetch_assoc($result);	
		$name=$result_arr['name'];	
		echo "欢迎您！$name";
?>
		<a style="text-decoration: none;" href="logout1.php">注销</a>
<?php	}	?>
</span>
</div>
</div>
<div class="nav">
 <ul>
   <li><a href="shouye.php">关于我们</a></li>
   <li><a href="#">新闻资讯</a></li>
   <li><a href="allmedicine.php">产品</a></li>
   <li><a href="#">招纳贤士</a></li>
   <li><a href="#">联系我们</a></li>
   <li><a href="../php/self.php">个人资料</a></li>
 </ul>
</div>
<div class="header">
<div id="Slide2" class="zy-Slide">
	<!--prev:元素中的文本通常会保留空格和换行符。而文本也会呈现为等宽字体。-->
	<section><img width="48" height="40" src="../image/left.png" /></section>
	<section><img width="48" height="40" src="../image/right.png" /></section>
	<ul>
		<!--alt + shift : 可以创建一个矩形选择区域-->
		<li><img src="../image/1.jpg" /></li>
		<li><img src="../image/2.jpg" /></li>
		<li><img src="../image/3.jpg" /></li>
		<li><img src="../image/4.jpg" /></li>
		<li><img src="../image/5.jpg" /></li>
		<li><img src="../image/6.jpg" /></li>
		<li><img src="../image/7.jpg" /></li>
	</ul>
</div>

</div>
<div class="page">内容资讯展示</div>
<script src="../js/jquery.min.js"></script>
<script src="../js/jquery.zySlide.js"></script>
<script src="../js/index.js"></script>
</body>
</html>
<!--100+50+330+300+100=>