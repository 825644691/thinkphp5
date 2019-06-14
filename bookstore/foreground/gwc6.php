<?php
session_start();

require("conn1.php");
require("conn.php");
if(!empty($_SESSION["gwc"]))
{
    $arr = array();
    $arr = $_SESSION["gwc"];
    //造数组
}


if(isset($_GET["button"])){

    $cou= $_SESSION['count'];



    $id=$_SESSION["number"];
    $price=$_SESSION["price"];
    $name=$_GET["name"];
    $address=$_GET["address"];
    $phone=$_GET["phone"];
    $email=$_GET["emailnumber"];
    $username=$_SESSION["username"];



                foreach ($arr as $v) {
                    global $db;
                    $sql1 = "select * from book WHERE book_id= '{$v[0]}'";
                    $arr = $db->Query($sql1);
                    static $i = 0;

                    foreach ($arr as $v) {
                        $sql = "insert into ord(id,book_id,username,book_title,price,name,quantity,address, phone,email)VALUES('$id','{$v[0]}','$username','{$v[1]}','$price','$name','$cou[$i]','$address','$phone','$email')";
                        $stmt = $db->prepare($sql);

                        $i++;
                        $stmt->execute();

                        header("location:finish.php");



                    }
                }



}



?>