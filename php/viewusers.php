<?php require_once('config.php');?>
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

<?php
	if(!empty($_GET['id'])){
		$id=intval($_GET['id']);  //定义$id
		$result=mysql_query("SELECT * FROM users WHERE id=$id");
		$arr=mysql_fetch_assoc($result);
	}
	else
	{
		die("id is not defined");
	}
?>
<!–startprint1–><div class="page">
<form>
<div class="gezi"><span style="display:inline-block;width:100px;text-align:right;">用户序号:</span>
	<input type="text" disabled="disabled" name="id" readOnly="true" value="<?php echo $arr['id']; ?>">
</div>
<div class="gezi"><span style="display:inline-block;width:100px;text-align:right;">用户姓名:</span>
	<input type="text" disabled="disabled" name="name" value="<?php echo $arr['name']; ?>">
</div>
<div class="gezi"><span style="display:inline-block;width:100px;text-align:right;">性别:</span>
	<input type="text" disabled="disabled" name="sex" value="<?php echo $arr['sex']; ?>">
</div>
<div class="gezi"><span style="display:inline-block;width:100px;text-align:right;">年龄:</span>
	<input type="text" disabled="disabled" name="age" value="<?php echo $arr['age']; ?>">
</div>
<div class="gezi"><span style="display:inline-block;width:100px;text-align:right;">手机号码:</span>
	<input type="text" disabled="disabled" name="phone" value="<?php echo $arr['phone']; ?>">
</div>
<div class="gezi"><span style="display:inline-block;width:100px;text-align:right;">身份证号码:</span>
	<input type="text" disabled="disabled" name="identity" value="<?php echo $arr['identity']; ?>">
</div>
<div class="gezi"><span style="display:inline-block;width:100px;text-align:right;">家庭住址:</span>
	<input type="text" disabled="disabled" name="address" style="width:300px;" value="<?php echo $arr['address']; ?>">
</div>
<div class="gezi"><span style="display:inline-block;width:100px;text-align:right;">密码:</span>
	<input type="text" disabled="disabled" name="password" value="<?php echo $arr['password']; ?>">
</div>
<div class="gezi"><span style="display:inline-block;width:100px;text-align:right;">管理员权限:</span>
	<input type="text" disabled="disabled" name="admin" value="<?php echo $arr['admin']; ?>">
</div>
</form>
</div><!–endprint1–>

</body>
</html>
