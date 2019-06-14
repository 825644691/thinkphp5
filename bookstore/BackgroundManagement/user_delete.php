<?php
include('conn.php');
$sql ="delete from user where id='".$_GET['id']."'";
$arry=mysql_query($sql,$conn);
if($arry){
    echo "<script> alert('删除成功');location='user_management.php';</script>";
}
else
    echo "删除失败";
?>