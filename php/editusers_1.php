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
		if(f.name.value=="")
			{
				alert("请输入用户姓名！");
				f.name.focus();
				return (false);
			}
		if(f.sex.value=="")
			{
				alert("请输入用户性别！");
				f.sex.focus();
				return (false);
			}
		if(f.age.value=="")
			{
				alert("请输入用户年龄！");
				f.age.focus();
				return (false);
			}
		if(f.phone.value=="")
			{
				alert("请输入用户手机号码！");
				f.phone.focus();
				return (false);
			}
		if(f.identity.value=="")
			{
				alert("请输入用户身份证号码！");
				f.identity.focus();
				return (false);
			}
		if(f.address.value=="")
			{
				alert("请输入用户家庭住址！");
				f.address.focus();
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
   <li><a href="../php/self.php">个人资料</a></li>
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
<form action="../php/editusers_2.php" method="post" onSubmit="return check(this)">
<div class="gezi" style="display: none;"><span style="display:inline-block;width:100px;text-align:right;">用户序号:</span>
	<input type="text" name="id" readOnly="true" value="<?php echo $arr['id']; ?>">
</div>
<div class="gezi"><span style="display:inline-block;width:100px;text-align:right;">用户姓名:</span>
	<input type="text" name="name" value="<?php echo $arr['name']; ?>">
</div>
<div class="gezi"><span style="display:inline-block;width:100px;text-align:right;">性别:</span>
	<input type="text" name="sex" value="<?php echo $arr['sex']; ?>">
</div>
<div class="gezi"><span style="display:inline-block;width:100px;text-align:right;">年龄:</span>
	<input type="text" name="age" value="<?php echo $arr['age']; ?>">
</div>
<div class="gezi"><span style="display:inline-block;width:100px;text-align:right;">手机号码:</span>
	<input type="text" name="phone" value="<?php echo $arr['phone']; ?>">
</div>
<div class="gezi"><span style="display:inline-block;width:100px;text-align:right;">身份证号码:</span>
	<input type="text" name="identity" value="<?php echo $arr['identity']; ?>">
</div>
<div class="gezi"><span style="display:inline-block;width:100px;text-align:right;">家庭住址:</span>
	<input type="text" name="address" style="width:300px;" value="<?php echo $arr['address']; ?>">
</div>

<div class="button">
<input style="width:70px;height:30px;" type="submit" value="保存"></div>
</form>
</div>
</div>
</body>
</html>
