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
		if(f.aname.value=="")
			{
				alert("请输入经办人姓名！");
				f.aname.focus();
				return (false);
			}
		if(f.asex.value=="")
			{
				alert("请输入经办人性别！");
				f.asex.focus();
				return (false);
			}
		if(f.aphone.value=="")
			{
				alert("请输入经办人手机号码！");
				f.aphone.focus();
				return (false);
			}
	}
	</script>
</head>

<body>
<div>
<div>
<p class="font">经办人信息管理 > 更新经办人信息</p>
<section class="webdesigntuts-workshop">
	<form action="../php/searchagency.php" method="post"  onSubmit="return check1(this)">		    
		<input type="search" placeholder="请输入关键字" name="key">		    	
		<button>搜索</button>
	</form>
</section>
</div>
<?php
	if(!empty($_GET['aid'])){
		$aid=$_GET['aid'];  //定义$id
		$result=mysql_query("SELECT * FROM agency WHERE aid='$aid'");
		$arr=mysql_fetch_assoc($result);
	}
	else
	{
		die("aid is not defined");
	}
?>
<div class="page">
<form action="../php/ADeditagency_2.php" method="post" onSubmit="return check(this)">
<div class="gezi"><span style="display:inline-block;width:100px;text-align:right;">编号:</span>
	<input type="text" name="aid" readOnly="true" value="<?php echo $arr['aid']; ?>">
</div>
<div class="gezi"><span style="display:inline-block;width:100px;text-align:right;">姓名:</span>
	<input type="text" name="aname" value="<?php echo $arr['aname']; ?>">
</div>
<div class="gezi"><span style="display:inline-block;width:100px;text-align:right;">性别:</span>
	<input type="text" name="asex" value="<?php echo $arr['asex']; ?>">
</div>

<div class="gezi"><span style="display:inline-block;width:100px;text-align:right;">手机号码:</span>
	<input type="text" name="aphone" value="<?php echo $arr['aphone']; ?>">
</div>

<div class="button">
<input style="width:70px;height:30px;" type="submit" value="保存"></div>
</form>
</div>
</div>
</body>
</html>
