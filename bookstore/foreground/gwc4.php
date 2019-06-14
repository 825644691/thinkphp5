<html>
<head>
    <style>
        .price{
            margin-left: 900px;
            margin-top: 400px;
        }
        .table2{
            margin-top: 150px;
            margin-left: 250px;
        }
    </style>
</head>
<body>
<form action="gwc6.php" method="get">
<?php
session_cache_limiter('private,must-revalidate');

session_start();
error_reporting(0);

$number=$_SESSION["number"];
echo "<font  size='4px'>订单编号为：</font>".$number;
$count= $_GET['count'];
$_SESSION['count']=$count;

?>
<table width="100%" border="1" cellspacing="0" cellpadding="0">
    <tr align="center">
        <td width="30%" >书本封面</td>
        <td width="30%">书名</td>
        <td width="20%">商品单价</td>
        <td width="20%">商品数量</td>

    </tr>
<?php

if(!empty($_SESSION["gwc"]))
{
    $arr = array();
    $arr = $_SESSION["gwc"];
    //造数组
}
require("conn1.php");
foreach ($arr as $v)
{
    global $db;
    $sql = "select * from book WHERE book_id= '{$v[0]}'";
    $att = $db->query($sql);
    foreach ($att as $a) {
        ?>


        <tr align="center">
        <td><img src="images/book/<?php echo $a[6]?>" style="width: 100px;height: 100px"></td>
        <td><?php echo $a[1]?></td>
        <td><?php echo $a[8]?></td>

        <td><?php
             static $i=0;
            echo $count[$i];
            $i++;
                ?></td>

        </tr>

    <?php
    }
}
?>

    <?php

    $ann = array();
    if (!empty($_SESSION["gwc"])) {
        $ann = $_SESSION["gwc"];

    }
    $zhonglei = $_GET['count'];

    $aa = 0;
    foreach ($ann as $k) {

        $k[0];//书本代号
        $k[1];//水果数量
        $sql1 = "select price from book where book_id='{$k[0]}'";

        $danjia = $db->Query($sql1);

        foreach ($danjia as $n) {
             static $b=0;

            $aa = $aa + $n[0] * $count[$b];
            $b++;
        }


    }

    echo"<br/>
价格:<mark>{$aa}元";
    $_SESSION["price"]=$aa;


    ?>
</table>
    <table border="0" width="50%" class="table2">
        <th   align="center">收货信息</th>
        <tr align="center" >
            <td >收货人:<input type="text" name="name" style="border: none"></td>

        </tr>

        <tr align="center">
            <td> 地  址 :<input type="text" name="address" style="border: none"></td>
        </tr>
        <br/>
        <tr align="center">
            <td> 电  话 :<input type="text" name="phone" style="border: none"></td>

        </tr>
        <br/>
        <tr align="center">
            <td> 邮  编 :<input type="text" name="emailnumber" style="border: none"></td>
        </tr>
        <tr align="center">
            <td>
                <button name="button" style="width: 100px;height: 20px">确定</button>
            </td>
        </tr>

    </table>



</form>
</body>
</html>


