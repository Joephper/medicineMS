<?php require_once('config.php');
session_start();
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">

</head>
<style>
	*{
		margin: 0 auto;
	}
	.header{
		height: 100px;
		background-color:#222222;
	}
	.top{
	    height:60px;
	}
	.bottom
	{
	    height:40px;
		background-color:#eaedef;
	}
	.left{
		margin-left: 20px;
		position: absolute;
		float: left;
		height:40px;
		line-height:40px;
		text-align:center
	}
	.right
	{
	    position:relative;
	    float:right;
		height:40px;
		line-height:40px;
		text-align:center;
	}
	</style>
<body>
<div class="header">
<div class="top" align="center">
<span>
<img src="../image/logo.png" width="60" height="60">
<img src="../image/ss.png">
</span>
</div>
<div class="bottom">
<span class="left">

<?php 
	if(!isset($_SESSION["phone"]))
	{
?>
		<a style="text-decoration: none;margin-right:20px;" href="../html/index.html" target="_top">登录</a>
<?php
	}
	else{
		$phone=$_SESSION["phone"];	
		$result=mysql_query("SELECT * FROM $my_user WHERE phone='$phone'");	
		$result_arr=mysql_fetch_assoc($result);	
		$name=$result_arr['name'];	
		echo "欢迎您！$name";
?>
		<a style="text-decoration: none;" href="..//html/index.html" target="_top">退出</a>
<?php	}	?>
</span>
<span class="right" id="show_time">
<script>   
setInterval("show_time.innerHTML=new Date().toLocaleString()+' 星期'+'日一二三四五六'.charAt(new Date().getDay());",1000);  
</script>
</span>
</div>
</div>
</body>
</html>
