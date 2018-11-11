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
		if(f.mid.value=="")
			{
				alert("请输入药品！");
				f.mid.focus();
				return (false);
			}
		if(f.ino.value=="")
			{
				alert("请输入商品批号！");
				f.ino.focus();
				return (false);
			}
		if(f.snum.value=="")
			{
				alert("请输入库存总量！");
				f.snum.focus();
				return (false);
			}
	}
	</script>
</head>

<body>
<div>
<div>
<p class="font">仓库信息管理 > 库存信息管理 > 更新库存信息</p>
<section class="webdesigntuts-workshop">
	<form action="../php/searchstock.php" method="post"  onSubmit="return check1(this)">		    
		<input type="search" placeholder="请输入关键字" name="key">		    	
		<button>搜索</button>
	</form>
</section>
</div>
<?php
	if(!empty($_GET['tid'])){
		$tid=$_GET['tid'];  //定义$id
		$result=mysql_query("SELECT * FROM stock WHERE tid='$tid'");
		$arr=mysql_fetch_assoc($result);
	}
	else
	{
		die("tid is not defined");
	}
?>
<div class="page">
<form action="../php/ADeditstock_2.php" method="post" onSubmit="return check(this)">
<div style="display: none;"><span style="display:inline-block;width:100px;text-align:right;">库存序号:</span>
	<input type="text" name="tid" value="<?php echo $arr['tid']; ?>">
</div>
<div class="gezi"><span style="display:inline-block;width:100px;text-align:right;">药品编号:</span>
	<input type="text" name="mid" value="<?php echo $arr['mid']; ?>">
</div>
<div class="gezi"><span style="display:inline-block;width:100px;text-align:right;">商品批号:</span>
	<input type="text" name="ino" value="<?php echo $arr['ino']; ?>">
</div>
<div class="gezi"><span style="display:inline-block;width:100px;text-align:right;">库存总量:</span>
	<input type="text" name="snum" value="<?php echo $arr['snum']; ?>">
</div>

<div class="button">
<input style="width:70px;height:30px;" type="submit" value="保存"></div>
</form>
</div>
</div>
</body>
</html>
