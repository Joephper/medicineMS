<?php require_once('config.php');?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="../css/ADeditinput.css"/>
<script language="javascript" type="text/javascript" src="../js/addinput.js" charset="gb2312"> </script>
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
		if(f.sid.value=="")
			{
				alert("请输入供应商编号！");
				f.sid.focus();
				return (false);
			}
		if(f.iprice.value=="")
			{
				alert("请输入药品进价！");
				f.iprice.focus();
				return (false);
			}
		if(f.inum.value=="")
			{
				alert("请输入药品购进数量！");
				f.inum.focus();
				return (false);
			}
	}
	</script>
</head>

<body>
<div>
<div>
<p class="font">仓库信息管理 > 进货记录管理 > 更新进货记录</p>
<section class="webdesigntuts-workshop">
	<form action="../php/searchinput.php" method="post"  onSubmit="return check1(this)">		    
		<input type="search" placeholder="请输入关键字" name="key">		    	
		<button>搜索</button>
	</form>
</section>
</div>
<?php
	if(!empty($_GET['ino'])){
		$ino=$_GET['ino'];  //定义$ino
		$result=mysql_query("SELECT m.mid,m.aid,m.sid,i.* FROM masi m inner join input i on m.ino=i.ino WHERE i.ino='$ino'");
		$arr=mysql_fetch_assoc($result);
	}
	else
	{
		die("ino is not defined");
	}
?>

<div class="page">
<form action="../php/ADeditinput_2.php" method="post" onSubmit="return check(this)">
<div class="gezi"><span style="display:inline-block;width:100px;text-align:right;">药品编号:</span>
	<input type="text" name="mid" value="<?php echo $arr['mid']; ?>">
</div>
<div class="gezi"><span style="display:inline-block;width:100px;text-align:right;">经办人编号:</span>
	<input type="text" name="aid" value="<?php echo $arr['aid']; ?>">
</div>
<div class="gezi"><span style="display:inline-block;width:100px;text-align:right;">供应商编号:</span>
	<input type="text" name="sid" value="<?php echo $arr['sid']; ?>">
</div>
<div class="gezi"><span style="display:inline-block;width:100px;text-align:right;">商品批号:</span>
	<input type="text" name="ino" readOnly="true" value="<?php echo $arr['ino']; ?>">
</div>
<div class="gezi"><span style="display:inline-block;width:100px;text-align:right;">进价:</span>
	<input type="text" name="iprice" value="<?php echo $arr['iprice']; ?>">元
</div>
<div class="gezi"><span style="display:inline-block;width:100px;text-align:right;">购进数量:</span>
	<input type="text" name="inum" value="<?php echo $arr['inum']; ?>">
</div>
<div class="date">
<span style="display:inline-block;width:100px;text-align:right;">*保质期：</span><select id="selYear" name="year"></select> 
<select id="selMonth" name="month"></select> 
<select id="selDay" name="day"></select> 
<script type="text/javascript"> 
var selYear = window.document.getElementById("selYear"); 
var selMonth = window.document.getElementById("selMonth"); 
var selDay = window.document.getElementById("selDay"); 
// 新建一个DateSelector类的实例，将三个select对象传进去 
new DateSelector(selYear, selMonth, selDay, <?php echo $arr['year']; ?>, <?php echo $arr['month']; ?>, <?php echo $arr['day']; ?>); 
</script> 
</div>
<div class="material"><span style="display:inline-block;width:80px;text-align:right;">备注:</span>
	<textarea name="idescribe" style="width:480px; height:100px;"><?php echo $arr['idescribe']; ?></textarea>
</div>

<div class="button">
<input style="width:70px;height:30px;" type="submit" value="保存"></div>
</form>
</div>
</div>

</body>
</html>
