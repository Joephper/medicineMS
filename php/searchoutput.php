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
<p class="font">仓库信息管理 > 销售记录管理 > 更新销售记录</p>
<section class="webdesigntuts-workshop">
	<form action="../php/searchoutput.php" method="post" onSubmit="return check(this)">		    
		<input type="search" placeholder="请输入关键字" name="key" >		    	
		<button type="submit">搜索</button>
	</form>
</section>
<div>
<div>
<table class="hovertable" style='text-align:center;' border='1'>
	<tr><th>用户编号</th><th>药品编号</th><th>经办人编号</th><th>商品批号</th><th>症状</th>
	<th>购买数量</th><th>录入时间</th><th>备注</th><th>修改</th><th>删除</th></tr>
<?php 
	$result=mysql_query("SELECT * FROM output where mid='$key' or mid like '%$key%' or
	aid='$key' or aid like '%$key%' or id='$key' or id like '%$key%' or ino='$key' or 
	ino like '%$key%' or otime like '%$key%' order by otime desc"); //查询output表
	$DataCount=mysql_num_rows($result);         //记录信息行数
	
	if($DataCount>0){
		for($i=0;$i<$DataCount;$i++){
		$result_arr=mysql_fetch_assoc($result);  //获取表中的行数组
		$oid=$result_arr['oid'];
		$id=$result_arr['id'];
		$mid=$result_arr['mid'];
		$aid=$result_arr['aid'];
		$ino=$result_arr['ino'];
		$symptom=$result_arr['symptom'];
		$onum=$result_arr['onum'];
		$otime=$result_arr['otime'];
		$odescribe=$result_arr['odescribe'];
		echo "<tr><td><a style='text-decoration:none;color:black;' href='../php/viewusers.php?id=$id'><i>$id</i></a></td><td><a style='text-decoration:none;color:black;' href='../php/viewmedicine.php?mid=$mid'><i>$mid</i></a></td><td><a style='text-decoration:none;color:black;' href='../php/viewagency.php?aid=$aid'><i>$aid</i></a></td><td><a style='text-decoration:none;color:black;' href='../php/viewinput.php?ino=$ino'><i>$ino</i></a></td><td>$symptom</td><td>$onum</td><td>$otime</td><td>$odescribe</td>
		<td><a style='text-decoration:none;' href='../php/ADeditoutput_1.php?oid=$oid'>修改</a></td><td><a style='text-decoration:none;' href='../php/ADdeleteoutput.php?oid=$oid'>删除</a></td></tr>";
	}
	}
	else
	{
		echo "<script>alert('查询不到！');window.location.href='../php/ADalloutput.php';</script>";
	    
	}		
?>
</table>
</div>
<div align="center"><p>一共查询到<?php echo "$DataCount";?>条销售记录。</p></div>
</div>
</body>
</html>
