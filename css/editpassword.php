<?php require_once('config.php');
session_start();
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="../css/editusers.css"/>
</head>

<body>

<?php
	$phone=$_SESSION["phone"];	
	$result=mysql_query("SELECT * FROM $my_user WHERE phone='$phone'");	
	$arr=mysql_fetch_assoc($result);
?>
<div class="nav">
 <ul>
   <li><a href="#">关于我们</a></li>
   <li><a href="#">新闻资讯</a></li>
   <li><a href="#">产品</a></li>
   <li><a href="#">招纳贤士</a></li>
   <li><a href="#">联系我们</a></li>
   <li><a href="../php/self.php">个人资料</a></li>
 </ul>
</div>
<div class="content">
<div class="left">
<a href="editusers_1.php">修改个人资料</a>
<a href="editpassword.php">
</div>
<div class="page">
<form action="../php/ADeditusers_2.php" method="post" onSubmit="return check(this)">
<div class="gezi"><span style="display:inline-block;width:100px;text-align:right;">用户序号:</span>
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
<div class="gezi"><span style="display:inline-block;width:100px;text-align:right;">原始密码:</span>
	<input type="password" name="password" onblur="checkUserPassword(this.value);">
	<div class="span"><span id="checkUserPasswordResult" style="color: red "></span> </div>
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