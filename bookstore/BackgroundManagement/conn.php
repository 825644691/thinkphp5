<?php
header('content-type:text/html;charset=utf-8;');
/*****************************
 *数据库连接
 *****************************/
$conn = @mysql_connect("localhost","root","qq369520");
if (!$conn){
    die("连接数据库失败：" . mysql_error());

}

mysql_select_db("myshop", $conn);
//字符转换，读库
mysql_query("set character set 'utf-8'");
//写库
mysql_query("set names 'utf-8'");
?>
