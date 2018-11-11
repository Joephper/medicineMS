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
<p class="font">仓库信息管理 > 进货记录管理 > 更新进货记录</p>
<section class="webdesigntuts-workshop">
	<form action="../php/searchinput.php" method="post" onSubmit="return check(this)">		    
		<input type="search" placeholder="请输入关键字" name="key" >		    	
		<button type="submit">搜索</button>
	</form>
</section>
<div>
<div>
<table class="hovertable" style='text-align:center;' border='1'>
	<tr><th>药品编号</th><th>经办人编号</th><th>供应商编号</th><th>商品批号</th><th>进价（元）</th><th>购进数量</th>
	<th>保质期</th><th>录入时间</th><th>备注</th><th>修改</th><th>删除</th></tr>
<?php 
	$result=mysql_query("SELECT m.mid,m.aid,m.sid,i.* FROM masi m inner join input i on m.ino=i.ino where m.mid='$key' or m.mid like '%$key%' or
	m.aid='$key' or m.aid like '%$key%' or m.sid='$key' or m.sid like '%$key%' or i.ino='$key' or 
	i.ino like '%$key%' or i.year='$key' or i.month='$key' or i.day='$key' or i.itime like '%$key%' or i.idescribe like '%$key%' order by itime desc"); //查询input表
	$DataCount=mysql_num_rows($result);         //记录信息行数
	
	if($DataCount>0){
		for($i=0;$i<$DataCount;$i++){
		$result_arr=mysql_fetch_assoc($result);  //获取表中的行数组
		$mid=$result_arr['mid'];
		$aid=$result_arr['aid'];
		$sid=$result_arr['sid'];
		$ino=$result_arr['ino'];
		$iprice=$result_arr['iprice'];
		$inum=$result_arr['inum'];
		$year=$result_arr['year'];
		$month=$result_arr['month'];
		$day=$result_arr['day'];
		$itime=$result_arr['itime'];
		$idescribe=$result_arr['idescribe'];
		echo "<tr><td><a style='text-decoration:none;color:black;' href='../php/viewmedicine.php?mid=$mid'><i>$mid</i></a></td><td><a style='text-decoration:none;color:black;' href='../php/viewagency.php?aid=$aid'><i>$aid</i></a></td><td><a style='text-decoration:none;color:black;' href='../php/viewsuppliers.php?sid=$sid'><i>$sid</i></a></td><td>$ino</td><td>$iprice</td><td>$inum</td><td>$year-$month-$day</td><td>$itime</td><td>$idescribe</td><td><a style='text-decoration:none;' href='../php/ADeditinput_1.php?ino=$ino'>修改</a></td><td><a style='text-decoration:none;' href='../php/ADdeleteinput.php?ino=$ino'>删除</a></td></tr>";
	}
	}
	else
	{
		echo "<script>alert('查询不到！');window.location.href='../php/ADallinput.php';</script>";
	    
	}		
?>
</table>
</div>
<div align="center"><p>一共查询到<?php echo "$DataCount";?>条进货记录。</p></div>
</div>
</body>
</html>
