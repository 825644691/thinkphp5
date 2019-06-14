<?php
header('content-type:text/html;charset=utf-8;');
$dsn="mysql:host=localhost;dbname=myshop";
$db=new PDO($dsn,'root','qq369520');
$db->query('set name gb2312');
$db->query("set character set 'utf-8'");

if(!$dsn){
    die('链接数据库失败'.mysql_error());

}




?>