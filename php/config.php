
<?php
$mysql_server="localhost";       //服务器名
$mysql_username="root";          //连接服务器的用户名
$mysql_password="";              //练接服务器的密码
$db_name="ms";                   //服务器上的可用数据库
$my_user="users";                //用户信息表名称
$my_agency="agency";             //经办人信息表名称
$my_suppliers="suppliers";       //供应商信息表名称
$my_medicine="medicine";         //药品信息表名称
$my_input="input";               //进货记录表名称
$my_output="output";             //销售记录表名称
$my_stock="stock";               //库存表名称
$my_masi="masi";                 //medicine,agency,suppliers,input联合关系表名称
//建立数据库链接
$conn = @mysql_connect($mysql_server,$mysql_username,$mysql_password) or die("系统故障！");  //连接服务器
mysql_select_db($db_name,$conn);    //选择操作的数据库
mysql_query("SET NAMES 'UTF8'");    //设置编码
?>