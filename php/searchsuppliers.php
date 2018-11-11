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
<p class="font">供应商信息管理 > 更新供应商信息</p>
<section class="webdesigntuts-workshop">
	<form action="../php/searchsuppliers.php" method="post" onSubmit="return check(this)">		    
		<input type="search" placeholder="请输入关键字" name="key" >		    	
		<button type="submit">搜索</button>
	</form>
</section>
<div>
<div>
<table class="hovertable" style='text-align:center;' border='1'>
	<tr><th>编号</th><th>名字</th><th>性别</th><th>手机号</th><th>修改</th><th>删除</th></tr>
<?php 
	$result=mysql_query("SELECT * FROM suppliers where sid='$key' or 
	sid like '%$key%' or sname='$key' or sphone='$key' or sname like '%$key%' 
	or sphone like '%$key%' order by sid asc"); //查询suppliers表所有数据
	$DataCount=mysql_num_rows($result);         //记录信息行数
	
	if($DataCount>0){
		for($i=0;$i<$DataCount;$i++){
		$result_arr=mysql_fetch_assoc($result);  //获取表中的行数组
		$sid=$result_arr['sid'];
		$sname=$result_arr['sname'];
		$ssex=$result_arr['ssex'];
		$sphone=$result_arr['sphone'];
		echo "<tr><td>$sid</td><td>$sname</td><td>$ssex</td>
		<td>$sphone</td><td><a style='text-decoration:none;' href='../php/ADeditsuppliers_1.php?sid=$sid'>修改</a></td>
		<td><a style='text-decoration:none;' href='../php/ADdeletesuppliers.php?sid=$sid'>删除</a></td></tr>";
	}
	}
	else
	{
		echo "<script>alert('查询不到！');window.location.href='../php/ADallsuppliers.php';</script>";
	    
	}		
?>
</table>
</div>
<div align="center"><p>一共查询到<?php echo "$DataCount";?>条供应商信息。</p></div>
</div>
</body>
</html>
