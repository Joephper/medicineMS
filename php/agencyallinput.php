<?php require_once('config.php');?>
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
	function del() 
	{
		var msg = "删除后系统中对应有关的记录将同时删除！\n\n您确定要删除吗？";
		if (confirm(msg)==true){
			return true;
		}else{
			return false;
		}
	}
	</script>
</head>

<body>
<p class="font">仓库信息管理 > 进货记录管理 > 浏览进货记录</p>
<section class="webdesigntuts-workshop">
	<form action="../php/agencysearchinput.php" method="post" onSubmit="return check(this)">		    
		<input type="search" placeholder="请输入关键字" name="key">		    	
		<button>搜索</button>
	</form>
</section>
<table class="hovertable" style='text-align:center;' border='1'>
	<tr><th>药品编号</th><th>经办人编号</th><th>供应商编号</th><th>商品批号</th><th>进价（元）</th><th>购进数量</th>
	<th>保质期</th><th>录入时间</th><th>备注</th></tr>
<?php 
	$id=1;
    $Page_size=5; 
	$result=mysql_query("SELECT m.mid,m.aid,m.sid,i.* FROM masi m inner join input i on m.ino=i.ino order by i.itime desc"); 
	
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
	$sql="SELECT m.mid,m.aid,m.sid,i.* FROM masi m inner join input i on m.ino=i.ino order by i.itime desc limit $offset,$Page_size"; 
	$result=mysql_query($sql,$conn);
 
	if($Page_size>=$DataCount)
	{
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
		echo "<tr><td><a style='text-decoration:none;color:black;' href='../php/viewmedicine.php?mid=$mid'><i>$mid</i></a></td><td><a style='text-decoration:none;color:black;' href='../php/viewagency.php?aid=$aid'><i>$aid</i></a></td><td><a style='text-decoration:none;color:black;' href='../php/viewsuppliers.php?sid=$sid'><i>$sid</i></a></td><td>$ino</td><td>$iprice</td><td>$inum</td><td>$year-$month-$day</td><td>$itime</td><td>$idescribe</td></tr>";
		}
	}
	else{
		for($i=0;$i<$Page_size;$i++){
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
		echo "<tr><td><a style='text-decoration:none;color:black;' href='../php/viewmedicine.php?mid=$mid'><i>$mid</i></a></td><td><a style='text-decoration:none;color:black;' href='../php/viewagency.php?aid=$aid'><i>$aid</i></a></td><td><a style='text-decoration:none;color:black;' href='../php/viewsuppliers.php?sid=$sid'><i>$sid</i></a></td><td>$ino</td><td>$iprice</td><td>$inum</td><td>$year-$month-$day</td><td>$itime</td><td>$idescribe</td></tr>";
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
<td colspan="11"><?php echo $key?></td> 
</tr> 
</table>
<div align="center"><p>系统中共有<?php echo "$DataCount";?>条进货记录。</p></div>

</body>
</html>
