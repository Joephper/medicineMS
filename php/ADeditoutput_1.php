<?php require_once('config.php');?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="../css/ADeditoutput.css"/>
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
				alert("请输入药品编号！");
				f.mid.focus();
				return (false);
			}
		if(f.aid.value=="")
			{
				alert("请输入经办人编号！");
				f.aid.focus();
				return (false);
			}
		if(f.id.value=="")
			{
				alert("请输入顾客编号！");
				f.id.focus();
				return (false);
			}
		if(f.ino.value=="")
			{
				alert("请输入商品批号！");
				f.ino.focus();
				return (false);
			}
		if(f.symptom.value=="")
			{
				alert("请输入顾客症状！");
				f.symptom.focus();
				return (false);
			}
		if(f.onum.value=="")
			{
				alert("请输入药品购买数量！");
				f.onum.focus();
				return (false);
			}
	}
	</script>
</head>

<body>
<div>
<div>
<p class="font">仓库信息管理 > 销售记录管理 > 更新销售记录</p>
<section class="webdesigntuts-workshop">
	<form action="../php/searchoutput.php" method="post"  onSubmit="return check1(this)">		    
		<input type="search" placeholder="请输入关键字" name="key">		    	
		<button>搜索</button>
	</form>
</section>
</div>
<?php
	if(!empty($_GET['oid'])){
		$oid=$_GET['oid'];  //定义$oid
		$result=mysql_query("SELECT * FROM output WHERE oid='$oid'");
		$arr=mysql_fetch_assoc($result);
	}
	else
	{
		die("oid is not defined");
	}
?>

<div class="page">
<form action="../php/ADeditoutput_2.php" method="post" onSubmit="return check(this)">
<div style="display: none;"><span style="display:inline-block;width:100px;text-align:right;">序号:</span>
	<input type="text" name="oid" value="<?php echo $arr['oid']; ?>">
</div>
<div class="gezi"><span style="display:inline-block;width:100px;text-align:right;">顾客编号:</span>
	<input type="text" name="id" value="<?php echo $arr['id']; ?>">
</div>
<div class="gezi"><span style="display:inline-block;width:100px;text-align:right;">药品编号:</span>
	<input type="text" name="mid" value="<?php echo $arr['mid']; ?>">
</div>
<div class="gezi"><span style="display:inline-block;width:100px;text-align:right;">经办人编号:</span>
	<input type="text" name="aid" value="<?php echo $arr['aid']; ?>">
</div>
<div class="gezi"><span style="display:inline-block;width:100px;text-align:right;">商品批号:</span>
	<input type="text" name="ino" readOnly="true" value="<?php echo $arr['ino']; ?>">
</div>
<div class="symptom"><span style="display:inline-block;width:80px;text-align:right;">症状:</span>
	<textarea name="symptom" style="width:480px; height:100px;"><?php echo $arr['symptom']; ?></textarea>
</div>
<div class="gezi"><span style="display:inline-block;width:100px;text-align:right;">购买数量:</span>
	<input type="text" name="onum" value="<?php echo $arr['onum']; ?>">盒
</div>
<div class="odescribe"><span style="display:inline-block;width:80px;text-align:right;">备注:</span>
	<textarea name="odescribe" style="width:480px; height:100px;"><?php echo $arr['odescribe']; ?></textarea>
</div>

<div class="button">
<input style="width:70px;height:30px;" type="submit" value="保存"></div>
</form>
</div>
</div>

</body>
</html>
