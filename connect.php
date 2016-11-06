<?php
$host="localhost";
$db_user="root";
$db_pass="123";
$db_name="mydb";
$timezone="Asia/Shanghai";

//1.连接数据库,注意区分Mysql版本
$link=mysqli_connect($host,$db_user,$db_pass,$db_name);
//mysql_select_db($db_name,$link);
//mysql_query("SET names UTF8");

//去除PHP显示页面乱码
header("Content-Type: text/html; charset=utf-8");
date_default_timezone_set($timezone); //北京时间

//2.判断数据库是否连接成功
if(mysqli_connect_errno($link) == 0) {
	//连接成功
} else {
	//连接失败
	echo mysqli_connect_errno($link);
}
?>
