<?php require_once('config.php');?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="../css/medicine.css"/>
<script src="jquery-1.6.min.js"></script>
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
		<input type="search" placeholder="请输入关键字" name="key">		    	
		<button>搜索</button>
	</form>
</section>
<div>
<table class="hovertable" style='text-align:center;' border='1'>
	<tr><th>序号</th><th>编号</th><th>名字</th><th>售价（元）</th><th>类别</th><th>详情</th></tr>
<?php 
	$id=1;
    $Page_size=5; 
	$result=mysql_query("SELECT * FROM medicine"); //查询suppliers表所有数据
	$DataCount=mysql_num_rows($result);         //记录信息行数
	$page_count = ceil($DataCount/$Page_size);
	
	$init=1; 
	$page_len=7; 
	$max_p=$page_count; 
	$pages=$page_count; 

	//判断当前页码 
	if(empty($_GET['page'])||$_GET['page']<0){ 
		$page=1; 
	}else { 
		$page=$_GET['page']; 
	} 


	$offset=$Page_size*($page-1); 
	$sql="select * from $my_medicine limit $offset,$Page_size"; 
	$result=mysql_query($sql,$conn);
 
	if($Page_size>=$DataCount)
	{
		for($i=0;$i<$DataCount;$i++){
		$result_arr=mysql_fetch_assoc($result);  //获取表中的行数组
		$mid=$result_arr['mid'];
		$mname=$result_arr['mname'];
		$price=$result_arr['price'];
		$material=$result_arr['material'];
		$mmode=$result_arr['mmode'];
		$function=$result_arr['function'];
		$class=$result_arr['class'];
		echo "<tr>";
		echo "<td>";
		echo $id++;
		echo "</td>";
		echo "<td>$mid</td><td>$mname</td><td>$price</td><td>$class</td><td><a style='text-decoration:none;' href='../php/viewmedicine.php?mid=$mid'>详情</a></td></tr>";	
		}
	}
	else{
		for($i=0;$i<$Page_size;$i++){
		$result_arr=mysql_fetch_assoc($result);  //获取表中的行数组
		$mid=$result_arr['mid'];
		$mname=$result_arr['mname'];
		$price=$result_arr['price'];
		$material=$result_arr['material'];
		$mmode=$result_arr['mmode'];
		$function=$result_arr['function'];
		$class=$result_arr['class'];
		echo "<tr>";
		echo "<td>";
		echo $id++;
		echo "</td>";
		echo "<td>$mid</td><td>$mname</td><td>$price</td><td>$class</td><td><a style='text-decoration:none;' href='../php/viewmedicine.php?mid=$mid'>详情</a></td></tr>";	
		}
	}
			
?>
<?php 
	$page_len = ($page_len%2)?$page_len:$pagelen+1;//页码个数 
	$pageoffset = ($page_len-1)/2;//页码个数左右偏移量 

	$key='<div class="page">'; 
	$key.="<span>$page/$pages</span> "; //第几页,共几页 

	if($page!=1){ 
		$key.="<a href=\"".$_SERVER['PHP_SELF']."?page=1\">第一页</a> "; //第一页 
		$key.="<a href=\"".$_SERVER['PHP_SELF']."?page=".($page-1)."\">上一页</a>"; //上一页 
	}
	else { 
		$key.="第一页 ";//第一页 
		$key.="上一页"; //上一页 
	} 
	if($pages>$page_len){ 
		//如果当前页小于等于左偏移 
		if($page<=$pageoffset){ 
			$init=1; 
			$max_p = $page_len; 
		}else{//如果当前页大于左偏移 
			//如果当前页码右偏移超出最大分页数 
			if($page+$pageoffset>=$pages+1){ 
				$init = $pages-$page_len+1; 
			}else{ 
				//左右偏移都存在时的计算 
				$init = $page-$pageoffset; 
				$max_p = $page+$pageoffset; 
			} 
		} 
	} 
	for($i=$init;$i<=$max_p;$i++){ 
		if($i==$page){ 
			$key.=' <span>'.$i.'</span>'; 
		} else { 
			$key.=" <a href=\"".$_SERVER['PHP_SELF']."?page=".$i."\">".$i."</a>"; 
		} 
	} 
	if($page!=$pages){ 
		$key.=" <a href=\"".$_SERVER['PHP_SELF']."?page=".($page+1)."\">下一页</a> ";//下一页 
		$key.="<a href=\"".$_SERVER['PHP_SELF']."?page={$pages}\">最后一页</a>"; //最后一页 
	}else { 
		$key.="下一页 ";//下一页 
		$key.="最后一页"; //最后一页 
	} 
	$key.='</div>'; 
?> 
<tr> 
<td colspan="8"><?php echo $key?></td> 
</tr> 
</table>

<div align="center"><p>系统中共有<?php echo "$DataCount";?>条药品信息。</p></div>
</div>
</body>
</html>
