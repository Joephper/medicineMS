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
		if(f.sname.value=="")
			{
				alert("请输入供应商姓名！");
				f.sname.focus();
				return (false);
			}
		if(f.ssex.value=="")
			{
				alert("请输入供应商性别！");
				f.ssex.focus();
				return (false);
			}
		if(f.sphone.value=="")
			{
				alert("请输入供应商手机号码！");
				f.sphone.focus();
				return (false);
			}
	}
	</script>
</head>

<body>
<div>
<div>
<p class="font">供应商信息管理 > 更新供应商信息</p>
<section class="webdesigntuts-workshop">
	<form action="../php/searchsuppliers.php" method="post"  onSubmit="return check1(this)">		    
		<input type="search" placeholder="请输入关键字" name="key">		    	
		<button>搜索</button>
	</form>
</section>
</div>
<?php
	if(!empty($_GET['sid'])){
		$sid=$_GET['sid'];  //定义$id
		$result=mysql_query("SELECT * FROM suppliers WHERE sid='$sid'");
		$arr=mysql_fetch_assoc($result);
	}
	else
	{
		die("sid is not defined");
	}
?>
<div class="page">
<form action="../php/ADeditsuppliers_2.php" method="post" onSubmit="return check(this)">
<div class="gezi"><span style="display:inline-block;width:100px;text-align:right;">编号:</span>
	<input type="text" name="sid" readOnly="true"  value="<?php echo $arr['sid']; ?>">
</div>
<div class="gezi"><span style="display:inline-block;width:100px;text-align:right;">姓名:</span>
	<input type="text" name="sname" value="<?php echo $arr['sname']; ?>">
</div>
<div class="gezi"><span style="display:inline-block;width:100px;text-align:right;">性别:</span>
	<input type="text" name="ssex" value="<?php echo $arr['ssex']; ?>">
</div>

<div class="gezi"><span style="display:inline-block;width:100px;text-align:right;">手机号码:</span>
	<input type="text" name="sphone" value="<?php echo $arr['sphone']; ?>">
</div>

<div class="button">
<input style="width:70px;height:30px;" type="submit" value="保存"></div>
</form>
</div>
</div>
</body>
</html>
