<?php require_once('config.php');
if(!empty($_GET['aid'])){
		$aid=$_GET['aid'];  //定义$id
		$result=mysql_query("SELECT * FROM agency WHERE aid='$aid'");
		$arr=mysql_fetch_assoc($result);
	}
	else
	{
		die("aid is not defined");
	}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="../css/edit.css"/>
</head>

<body>
<div class="btnPrint">
<input id="btnPrint" type="button" value="打印" onclick="javascript:window.print();" />
<input id="btnPrint" type="button" value="打印预览" onclick=preview(1)/>
</div>
<script>
function preview(oper)
{
if (oper <10)
{
var bdhtml=window.document.body.innerHTML;//获取当前页的html代码
var sprnstr="<!–startprint"+oper+"–>";//设置打印開始区域
var eprnstr="<!–endprint"+oper+"–>";//设置打印结束区域
var prnhtml=bdhtml.substring(bdhtml.indexOf(sprnstr)+18);//从開始代码向后取html
var prnhtmlprnhtml=prnhtml.substring(0,prnhtml.indexOf(eprnstr));//从结束代码向前取html
window.document.body.innerHTML=prnhtml;
window.print();
window.document.body.innerHTML=bdhtml;
} else {
window.print();
}
}
</script>
<!–startprint1–><div class="page">
<form>
<div class="gezi"><span style="display:inline-block;width:100px;text-align:right;">编号:</span>
	<input type="text" name="aid" disabled="disabled" value="<?php echo $arr['aid']; ?>">
</div>
<div class="gezi"><span style="display:inline-block;width:100px;text-align:right;">姓名:</span>
	<input type="text" name="aname" disabled="disabled" value="<?php echo $arr['aname']; ?>">
</div>
<div class="gezi"><span style="display:inline-block;width:100px;text-align:right;">性别:</span>
	<input type="text" name="asex" disabled="disabled" value="<?php echo $arr['asex']; ?>">
</div>

<div class="gezi"><span style="display:inline-block;width:100px;text-align:right;">手机号码:</span>
	<input type="text" name="aphone" disabled="disabled" value="<?php echo $arr['aphone']; ?>">
</div>
</form>
</div><!–endprint1–>
</body>
</html>
