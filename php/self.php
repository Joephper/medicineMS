<?php require_once('config.php');
session_start();
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="../css/self.css"/>
</head>

<body>
<?php 
	if(!isset($_SESSION["phone"]))
	{
		echo "<script>alert('请先登录！');window.location.href='../html/index.html'</script>";
	}
	else{
		$phone=$_SESSION["phone"];	
		$result=mysql_query("SELECT * FROM $my_user WHERE phone='$phone'");	
		$arr=mysql_fetch_assoc($result);	
		
	}
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
<div class="page">
<form action="../php/editusers_1.php">
<div class="gezi" style="display: none;"><span style="display:inline-block;width:100px;text-align:right;">用户序号:</span>
	<input type="text" disabled="disabled" name="id" readOnly="true" value="<?php echo $arr['id']; ?>">
</div>
<div class="gezi"><span style="display:inline-block;width:100px;text-align:right;">用户姓名:</span>
	<input type="text" disabled="disabled" name="name" value="<?php echo $arr['name']; ?>">
</div>
<div class="gezi"><span style="display:inline-block;width:100px;text-align:right;">性别:</span>
	<input type="text" disabled="disabled" name="sex" value="<?php echo $arr['sex']; ?>">
</div>
<div class="gezi"><span style="display:inline-block;width:100px;text-align:right;">年龄:</span>
	<input type="text" disabled="disabled" name="age" value="<?php echo $arr['age']; ?>">
</div>
<div class="gezi"><span style="display:inline-block;width:100px;text-align:right;">手机号码:</span>
	<input type="text" disabled="disabled" name="phone" value="<?php echo $arr['phone']; ?>">
</div>
<div class="gezi"><span style="display:inline-block;width:100px;text-align:right;">身份证号码:</span>
	<input type="text" disabled="disabled" name="identity" value="<?php echo $arr['identity']; ?>">
</div>
<div class="gezi"><span style="display:inline-block;width:100px;text-align:right;">家庭住址:</span>
	<input type="text" disabled="disabled" name="address" style="width:300px;" value="<?php echo $arr['address']; ?>">
</div>
<div class="button">
	<input type="submit" value="修改">
</div>
</form>
</div>
</body>
</html>