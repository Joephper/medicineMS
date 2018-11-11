<?php require_once('config.php');?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="../css/editmedicine.css"/>
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
		if(f.mname.value=="")
			{
				alert("请输入药品名称！");
				f.mname.focus();
				return (false);
			}
		if(f.price.value=="")
			{
				alert("请输入药品单价！");
				f.price.focus();
				return (false);
			}
		if(f.material.value=="")
			{
				alert("请输入药品成分！");
				f.material.focus();
				return (false);
			}
		if(f.mmode.value=="")
			{
				alert("请输入药品用法用量！");
				f.mmode.focus();
				return (false);
			}
		if(f.function.value=="")
			{
				alert("请输入药品功能主治！");
				f.function.focus();
				return (false);
			}
		if(f.class.value=="")
			{
				alert("请输入药品类别！");
				f.class.focus();
				return (false);
			}
	}
	</script>
</head>

<body>
<div>
<div>
<p class="font">药品信息管理 > 更新药品信息</p>
<section class="webdesigntuts-workshop">
	<form action="../php/searchmedicine.php" method="post"  onSubmit="return check1(this)">		    
		<input type="search" placeholder="请输入关键字" name="key">		    	
		<button>搜索</button>
	</form>
</section>
</div>
<?php
	if(!empty($_GET['mid'])){
		$mid=$_GET['mid'];  //定义$id
		$result=mysql_query("SELECT * FROM medicine WHERE mid='$mid'");
		$arr=mysql_fetch_assoc($result);
	}
	else
	{
		die("mid is not defined");
	}
?>
<div class="page">
<form action="../php/ADeditmedicine_2.php" method="post" onSubmit="return check(this)">
<div class="gezi"><span style="display:inline-block;width:100px;text-align:right;">编号:</span>
	<input type="text" name="mid" readOnly="true" value="<?php echo $arr['mid']; ?>">
</div>
<div class="gezi"><span style="display:inline-block;width:100px;text-align:right;">药品名称:</span>
	<input type="text" name="mname" style="width:200px;" value="<?php echo $arr['mname']; ?>">
</div>
<div class="gezi"><span style="display:inline-block;width:100px;text-align:right;">药品单价:</span>
	<input type="text" name="price" value="<?php echo $arr['price']; ?>">元
</div>
<div class="material"><span style="display:inline-block;width:80px;text-align:right;">药品成分:</span>
	<textarea name="material" style="width:480px; height:100px;"><?php echo $arr['material']; ?></textarea>
</div>
<div class="gezi"><span style="display:inline-block;width:100px;text-align:right;">用法用量:</span>
	<input type="text" name="mmode" style="width:160px;" value="<?php echo $arr['mmode']; ?>">
</div>
<div class="material"><span style="display:inline-block;width:80px;text-align:right;">功能主治:</span>
	<textarea name="function" style="width:480px; height:100px;"><?php echo $arr['function']; ?></textarea>
</div>

<div class="gezi"><span style="display:inline-block;width:100px;text-align:right;">药品类别:</span>
	<input type="text" name="class" value="<?php echo $arr['class']; ?>">
</div>

<div class="button">
<input style="width:70px;height:30px;" type="submit" value="保存"></div>
</form>
</div>
</div>
</body>
</html>
