<?php require_once('config.php');?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="../css/ADeditinput.css"/>
<script language="javascript" type="text/javascript" src="../js/addinput.js" charset="gb2312"> </script>
</head>

<body>
<?php
	if(!empty($_GET['ino'])){
		$ino=$_GET['ino'];  //定义$ino
		$result=mysql_query("SELECT m.mid,m.aid,m.sid,i.* FROM masi m inner join input i on m.ino=i.ino WHERE i.ino='$ino'");
		$arr=mysql_fetch_assoc($result);
	}
	else
	{
		die("ino is not defined");
	}
?>
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
<div class="gezi"><span style="display:inline-block;width:100px;text-align:right;">药品编号:</span>
	<input type="text" disabled="disabled" name="mid" value="<?php echo $arr['mid']; ?>">
</div>
<div class="gezi"><span style="display:inline-block;width:100px;text-align:right;">经办人编号:</span>
	<input type="text" disabled="disabled" name="aid" value="<?php echo $arr['aid']; ?>">
</div>
<div class="gezi"><span style="display:inline-block;width:100px;text-align:right;">供应商编号:</span>
	<input type="text" disabled="disabled" name="sid" value="<?php echo $arr['sid']; ?>">
</div>
<div class="gezi"><span style="display:inline-block;width:100px;text-align:right;">商品批号:</span>
	<input type="text" disabled="disabled" name="ino" readOnly="true" value="<?php echo $arr['ino']; ?>">
</div>
<div class="gezi"><span style="display:inline-block;width:100px;text-align:right;">进价:</span>
	<input type="text" disabled="disabled" name="iprice" value="<?php echo $arr['iprice']; ?>">元
</div>
<div class="gezi"><span style="display:inline-block;width:100px;text-align:right;">购进数量:</span>
	<input type="text" disabled="disabled" name="inum" value="<?php echo $arr['inum']; ?>">
</div>
<div class="date">
<span style="display:inline-block;width:100px;text-align:right;">*保质期：</span><select disabled="disabled" id="selYear" name="year"></select> 
<select disabled="disabled" id="selMonth" name="month"></select> 
<select disabled="disabled" id="selDay" name="day"></select> 
<script type="text/javascript"> 
var selYear = window.document.getElementById("selYear"); 
var selMonth = window.document.getElementById("selMonth"); 
var selDay = window.document.getElementById("selDay"); 
// 新建一个DateSelector类的实例，将三个select对象传进去 
new DateSelector(selYear, selMonth, selDay, <?php echo $arr['year']; ?>, <?php echo $arr['month']; ?>, <?php echo $arr['day']; ?>); 
</script> 
</div>
<div class="material"><span style="display:inline-block;width:80px;text-align:right;">备注:</span>
	<textarea disabled="disabled" name="idescribe" style="width:480px; height:100px;"><?php echo $arr['idescribe']; ?></textarea>
</div>
</form>
</div><!–endprint1–>

</body>
</html>
