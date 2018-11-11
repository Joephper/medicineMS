<?php require_once('config.php');
session_start();
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="../css/editusers.css"/>
<script>
	function check(f)
	{	
		if(f.pre_password.value=="")
			{
				alert("请输入原始密码！");
				f.pre_password.focus();
				return (false);
			}
		if(f.password.value=="")
			{
				alert("请输入用户新密码！");
				f.password.focus();
				return (false);
			}
		if(f.re_password.value=="")
			{
				alert("请重新输入新密码！");
				f.re_password.focus();
				return (false);
			}
		if(f.re_password.value!=f.password.value)
			{
				alert("重复密码与输入密码不一致！请重新输入！");
				f.re_password.focus();
				f.re_password.select();
				return (false);
			}
	}
	</script>
</head>

<body>

<?php
	$phone=$_SESSION["phone"];	
	$result=mysql_query("SELECT * FROM $my_user WHERE phone='$phone'");	
	$arr=mysql_fetch_assoc($result);
?>
<div class="nav">
 <ul>
   <li><a href="shouye.php">关于我们</a></li>
   <li><a href="#">新闻资讯</a></li>
   <li><a href="allmedicine.php">产品</a></li>
   <li><a href="#">招纳贤士</a></li>
   <li><a href="#">联系我们</a></li>
   <li><a href="self.php">个人资料</a></li>
 </ul>
</div>
<div class="content">
<div class="left">
<div class="lianjie">
<a href="editusers_1.php">修改个人资料</a>
<a href="editpassword.php">修改密码</a>
</div>
</div>
<div class="page">
<form action="editpassword_2.php" method="post" onSubmit="return check(this)">
<div class="gezi"><span style="display:inline-block;width:100px;text-align:right;">原始密码:</span>
	<input type="password" name="pre_password">
</div>
<div class="gezi"><span style="display:inline-block;width:100px;text-align:right;">新密码:</span>
	<input type="password" name="password">
</div>
<div class="gezi"><span style="display:inline-block;width:100px;text-align:right;">确认密码:</span>
	<input type="password" name="re_password">
</div>
<div class="button">
<input style="width:70px;height:30px;" type="submit" value="保存"></div>
</form>
</div>
</div>
</body>
</html>