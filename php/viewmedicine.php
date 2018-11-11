<?php require_once('config.php');
if(!empty($_GET['mid'])){
		$mid=$_GET['mid'];  //定义$id
		$result=mysql_query("SELECT * FROM medicine WHERE mid='$mid'");
		$arr=mysql_fetch_assoc($result);
	}
	else
	{
		die("mid is not defined");
	}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="../css/editmedicine.css"/>
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
	<input type="text" disabled="disabled" name="mid" readOnly="true" value="<?php echo $arr['mid']; ?>">
</div>
<div class="gezi"><span style="display:inline-block;width:100px;text-align:right;">药品名称:</span>
	<input type="text" disabled="disabled" name="mname" style="width:200px;" value="<?php echo $arr['mname']; ?>">
</div>
<div class="gezi"><span style="display:inline-block;width:100px;text-align:right;">药品单价:</span>
	<input type="text" disabled="disabled" name="price" value="<?php echo $arr['price']; ?>">元
</div>
<div class="material"><span style="display:inline-block;width:80px;text-align:right;">药品成分:</span>
	<textarea disabled="disabled" name="material" style="width:480px; height:100px;"><?php echo $arr['material']; ?></textarea>
</div>
<div class="gezi"><span style="display:inline-block;width:100px;text-align:right;">用法用量:</span>
	<input disabled="disabled" type="text" name="mmode" style="width:160px;" value="<?php echo $arr['mmode']; ?>">
</div>
<div class="material"><span style="display:inline-block;width:80px;text-align:right;">功能主治:</span>
	<textarea disabled="disabled" name="function" style="width:480px; height:100px;"><?php echo $arr['function']; ?></textarea>
</div>

<div class="gezi"><span style="display:inline-block;width:100px;text-align:right;">药品类别:</span>
	<input disabled="disabled" type="text" name="class" value="<?php echo $arr['class']; ?>">
</div>
</form>
</div><!–endprint1–>

</body>
</html>
