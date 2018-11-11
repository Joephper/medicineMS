<?php require_once('config.php');
if(!isset($_POST['key'])){
	die('key is not defined');
}
$key=$_POST['key'];

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="../css/ADallusers.css"/>
<script>
	function check(f)
	{
		if(f.key.value=="")
			{
				alert("请输入关键字！");
				f.key.focus();
				return (false);
			}
	}
	</script>
</head>

<body>
<p class="font">仓库信息管理 > 库存信息管理> 更新库存信息</p>
<section class="webdesigntuts-workshop">
	<form action="../php/searchstock.php" method="post" onSubmit="return check(this)">		    
		<input type="search" placeholder="请输入关键字" name="key">		    	
		<button>搜索</button>
	</form>
</section>
<div>
<div>
<table class="hovertable" style='text-align:center;' border='1'>
	<tr><th>药品编号</th><th>商品批号</th><th>库存总量</th><th>修改</th><th>删除</th></tr>
<?php 
	$result=mysql_query("SELECT * FROM stock where mid='$key' or 
	mid like '%$key%' or ino='$key' or ino like '%$key%' order by mid asc"); //查询stock表所有数据
	$DataCount=mysql_num_rows($result);         //记录信息行数
 
	if($DataCount>0){
		for($i=0;$i<$DataCount;$i++){
		$result_arr=mysql_fetch_assoc($result);  //获取表中的行数组
		$tid=$result_arr['tid'];
		$mid=$result_arr['mid'];
		$ino=$result_arr['ino'];
		$snum=$result_arr['snum'];
		echo "<tr><td><a style='text-decoration:none;color:black;' href='../php/viewmedicine.php?mid=$mid'><i>$mid</i></a></td><td><a style='text-decoration:none;color:black;' href='../php/viewinput.php?ino=$ino'><i>$ino</i></a></td><td>$snum</td>
		<td><a style='text-decoration:none;' href='../php/ADeditstock_1.php?tid=$tid'>修改</a></td>
		<td><a style='text-decoration:none;' href='../php/ADdeletestock.php?tid=$tid'>删除</a></td></tr>";
	}
	}
	else
	{
		echo "<script>alert('查询不到！');window.location.href='../php/ADallstock.php';</script>";
	    
	}	
?>
</table>
</div>
<div align="center"><p>一共查询到<?php echo "$DataCount";?>条库存信息。</p></div>
</div>
</body>
</html>
