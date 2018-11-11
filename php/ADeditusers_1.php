<?php require_once('config.php');?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="../css/edit.css"/>
<script>
	function check1(f)
	{
		if(f.key.value=="")
			{
				alert("请输入关键字！");
				f.key.focus();
				return (false);
			}
	}
	function check(f)
	{	
		if(f.name.value=="")
			{
				alert("请输入注册用户姓名！");
				f.name.focus();
				return (false);
			}
		if(f.sex.value=="")
			{
				alert("请输入注册用户性别！");
				f.sex.focus();
				return (false);
			}
		if(f.age.value=="")
			{
				alert("请输入注册用户年龄！");
				f.age.focus();
				return (false);
			}
		if(f.phone.value=="")
			{
				alert("请输入注册用户手机号码！");
				f.phone.focus();
				return (false);
			}
		if(f.identity.value=="")
			{
				alert("请输入注册用户身份证号码！");
				f.identity.focus();
				return (false);
			}
		if(f.address.value=="")
			{
				alert("请输入注册用户家庭住址！");
				f.address.focus();
				return (false);
			}
		if(f.password.value=="")
			{
				alert("请输入注册用户密码！");
				f.password.focus();
				return (false);
			}
		if(f.admin.value=="")
			{
				alert("请更改权限设置！");
				f.admin.focus();
				return (false);
			}
	}
	</script>
</head>

<body>
<div>
<div>
<p class="font">用户信息管理 > 更新用户信息</p>
<section class="webdesigntuts-workshop">
	<form action="../php/searchusers.php" method="post" onSubmit="return check1(this)">		    
		<input type="search" placeholder="请输入关键字" name="key">		    	
		<button>搜索</button>
	</form>
</section>
</div>
<?php
	if(!empty($_GET['id'])){
		$id=intval($_GET['id']);  //定义$id
		$result=mysql_query("SELECT * FROM users WHERE id=$id");
		$arr=mysql_fetch_assoc($result);
	}
	else
	{
		die("id is not defined");
	}
?>
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
<div class="gezi"><span style="display:inline-block;width:100px;text-align:right;">密码:</span>
	<input type="text" name="password" value="<?php echo $arr['password']; ?>">
</div>
<div class="gezi"><span style="display:inline-block;width:100px;text-align:right;">管理员权限:</span>
	<input type="text" name="admin" value="<?php echo $arr['admin']; ?>">
</div>
<div class="button">
<input style="width:70px;height:30px;" type="submit" value="保存"></div>
</form>
</div>
</div>
</body>
</html>
