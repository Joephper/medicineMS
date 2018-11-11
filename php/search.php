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
<link rel="stylesheet" type="text/css" href="../css/medicine.css"/>
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
<div class="nav">
 <ul>
   <li><a href="shouye.php">关于我们</a></li>
   <li><a href="#">新闻资讯</a></li>
   <li><a href="allmedicine.php">产品</a></li>
   <li><a href="#">招纳贤士</a></li>
   <li><a href="#">联系我们</a></li>
   <li><a href="../php/self.php">个人资料</a></li>
 </ul>
</div>
<section class="webdesigntuts-workshop">
	<form action="../php/search.php" method="post" onSubmit="return check(this)">		    
		<input type="search" placeholder="请输入关键字" name="key" >		    	
		<button type="submit">搜索</button>
	</form>
</section>
<div>
<div>
<table class="hovertable" style='text-align:center;' border='1'>
	<tr><th>编号</th><th>名字</th><th>售价（元）</th><th>类别</th><th>详情</th></tr>
<?php 
	$result=mysql_query("SELECT * FROM medicine where mid='$key' or 
	mid like '%$key%' or mname='$key' or mname like '%$key%' or class='$key' 
	or class like '%$key%' or price='%$key%' or function like '%$key%' order by mid asc"); //查询medicine表
	$DataCount=mysql_num_rows($result);         //记录信息行数
	
	if($DataCount>0){
		for($i=0;$i<$DataCount;$i++){
		$result_arr=mysql_fetch_assoc($result);  //获取表中的行数组
		$mid=$result_arr['mid'];
		$mname=$result_arr['mname'];
		$price=$result_arr['price'];
		$material=$result_arr['material'];
		$mmode=$result_arr['mmode'];
		$function=$result_arr['function'];
		$class=$result_arr['class'];
		echo "<tr><td>$mid</td><td>$mname</td><td>$price</td><td>$class</td><td><a style='text-decoration:none;' href='../php/viewmedicine.php?mid=$mid'>详情</a></td></tr>";
	}
	}
	else
	{
		echo "<script>alert('查询不到！');window.location.href='../php/allmedicine.php';</script>";
	    
	}		
?>
</table>
</div>
<div align="center"><p>一共查询到<?php echo "$DataCount";?>条药品信息。</p></div>
</div>
</body>
</html>
