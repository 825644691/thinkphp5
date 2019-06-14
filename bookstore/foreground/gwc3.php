<?php
session_start();
$ids = $_GET["id"];
$arr = $_SESSION["gwc"];
//var_dump($arr);
//取索引2（数量）
foreach ($arr as $key=>$v)
{
    if($v[0]==$ids)
    {
        if($v[1]>1){
            //要删除的数据
            $arr[$key][1]-=1;
        }
        else{
            //数量为1的情况下，移除该数组
            unset($arr[$key]);
        }
    }

}

$_SESSION["gwc"] = $arr;
//记得扔到session里面
header("location:gwc2.php");
//删除完跳转回去