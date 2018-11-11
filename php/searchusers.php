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
<!-数据查询操作->
<p class="font">用户信息管理 > 浏览用户信息</p>
<section class="webdesigntuts-workshop">
	<form action="../php/searchusers.php" method="post" onSubmit="return check(this)">		    
		<input type="search" name="key" placeholder="请输入关键字">		    	
		<button>搜索</button>
	</form>
</section>
<div>
<div>
<table class="hovertable" style='text-align:center;' border='1'>
	<tr><th>序号</th><th>名字</th><th>性别</th><th>手机号</th><th>详情</th><th>修改</th><th>删除</th></tr>
<?php 
	$result=mysql_query("SELECT * FROM users where id='$key' or name='$key' or phone='$key' 
	or identity='$key' or name like '%$key%' or phone like '%$key%' or identity like '%$key%' order by id asc"); //查询users表所有数据
	$DataCount=mysql_num_rows($result);
	if($DataCount>0)         //记录信息行数
	{
		for($i=0;$i<$DataCount;$i++){
		$result_arr=mysql_fetch_assoc($result);  //获取表中的行数组
		$id=$result_arr['id'];
		$name=$result_arr['name'];
		$sex=$result_arr['sex'];
		$age=$result_arr['age'];
		$phone=$result_arr['phone'];
		$identity=$result_arr['identity'];
		$address=$result_arr['address'];
		$password=$result_arr['password'];
		echo "<tr><td>$id</td><td>$name</td><td>$sex</td>
		<td>$phone</td><td><a style='text-decoration: none;' href='viewusers.php?id=$id'>详情</a></td>
		<td><a style='text-decoration:none;' href='../php/ADeditusers_1.php?id=$id'>修改</a></td>
		<td><a style='text-decoration:none;' href='../php/ADdeleteusers.php?id=$id' onclick='javascript:return del();'>删除</a></td></tr>";
	    }
	}
	else
	{
		echo "<script>alert('查询不到！');window.location.href='../php/ADallusers.php';</script>";
	    
	}
		
?>
</table>
</div>
<div align="center"><p>一共查询到<?php echo "$DataCount";?>条用户信息。</p></div>
</div>
</body>
</html>
