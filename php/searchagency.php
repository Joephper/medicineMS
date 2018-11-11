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
<p class="font">经办人信息管理 > 更新经办人信息</p>
<section class="webdesigntuts-workshop">
	<form action="../php/searchagency.php" method="post" onSubmit="return check(this)">		    
		<input type="search" placeholder="请输入关键字" name="key" >		    	
		<button type="submit">搜索</button>
	</form>
</section>
<div>
<div>
<table class="hovertable" style='text-align:center;' border='1'>
	<tr><th>编号</th><th>名字</th><th>性别</th><th>手机号</th><th>修改</th><th>删除</th></tr>
<?php 
	$result=mysql_query("SELECT * FROM agency where aid='$key' or 
	aid like '%$key%' or aname='$key' or aphone='$key' or aname like '%$key%' 
	or aphone like '%$key%' order by aid asc"); //查询agency表所有数据
	$DataCount=mysql_num_rows($result);         //记录信息行数
	
	if($DataCount>0){
		for($i=0;$i<$DataCount;$i++){
		$result_arr=mysql_fetch_assoc($result);  //获取表中的行数组
		$aid=$result_arr['aid'];
		$aname=$result_arr['aname'];
		$asex=$result_arr['asex'];
		$aphone=$result_arr['aphone'];
		echo "<tr><td>$aid</td><td>$aname</td><td>$asex</td>
		<td>$aphone</td><td><a style='text-decoration:none;' href='../php/ADeditagency_1.php?aid=$aid'>修改</a></td>
		<td><a style='text-decoration:none;' href='../php/ADdeleteagency.php?aid=$aid'>删除</a></td></tr>";
	}
	}
	else
	{
		echo "<script>alert('查询不到！');window.location.href='../php/ADallagency.php';</script>";
	    
	}		
?>
</table>
</div>
<div align="center"><p>一共查询到<?php echo "$DataCount";?>条经办人信息。</p></div>
</div>
</body>
</html>
