<html>
<head>

    <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
    <script src="js/add.js" type="text/javascript" charset="utf-8"></script>
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.6.1.min.js"></script>

    <script>
        $(function() {
            $(".add").click(function() {
                var t = $(this).parent().find('input[class*=text_box]');
                if(t.val()==""||undefined||null){
                    t.val(0);
                }
                t.val(parseInt(t.val()) + 1)
                setTotal();
            })
            $(".min").click(function() {
                var t = $(this).parent().find('input[class*=text_box]');
                if(t.val()==""||undefined||null){
                    t.val(0);
                }
                t.val(parseInt(t.val()) - 1)
                if(parseInt(t.val()) < 0) {
                    t.val(0);
                }
                setTotal();
            })
            $(".text_box").keyup(function(){
                var t = $(this).parent().find('input[class*=text_box]');
                if(parseInt(t.val())==""||undefined||null || isNaN(t.val())) {
                    t.val(0);
                }
                setTotal();
            })
            function setTotal() {
                var s = 0;
                $("#tab").each(function() {
                    var t = $(this).find('input[class*=text_box]').val();
                    var p = $(this).find('span[class*=price]').text();
                    if(parseInt(t)==""||undefined||null || isNaN(t) || isNaN(parseInt(t))){
                        t=0;
                    }
                    s += parseInt(t) * parseFloat(p);
                });
                $("#total").html(s.toFixed(2));
            }
            setTotal();
        })
    </script>

</head>
<body>
<h1>查看购物车</h1>
<?php
session_start();

$number=$_SESSION["number"]


?>


订单编号:<?php echo $number?>
<form action="gwc4.php" method="get">
    <table id="tab" width="100%" border="1" cellspacing="0" cellpadding="0">
        <tr>
            <td>商品名称</td>
            <td>商品单价</td>
            <td>商品数量</td>
            <td>操作</td>
        </tr>

        <?php
        error_reporting(0);

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
            foreach ($att as $a)
            {
                ?>
                <tr>
                    <td><?php echo $a[1]?></td>
                    <td><span class="price">

                            <?php echo $a[8]?>
                        </span></td>
                     <td><input class="min" name="" type="button" value="-" />
                        <input class="text_box" name="count[]" type="text" value="1" style="width:30px; text-align: center; color: #0F0F0F;"/>
                        <input class="add" name="" type="button" value="+" />

                    </td>


                    <td><a href='gwc3.php?id=<?php echo $a[0]?>'>删除</a> </td>
                </tr>

            <?php
            }
        }
        ?>

    </table>
    <p>总价:<label id="total"></label></p>

    <input type="submit" name="submit"/>

</form>
</body>
</html><?php
if(!empty($_SESSION["gwc"]))
{
    $arr = array();
    $arr = $_SESSION["gwc"];
    //造数组
}
if(isset($_GET["submit"])) {

    require("conn1.php");
    foreach ($arr as $v){
        global $db;
        $sql1 = "select * from book WHERE book_id= '{$v[0]}'";
        $arr = $db->Query($sql1);

        foreach ($arr as $v) {
            $sql = "insert into ord()VALUES ('$num','{$v[1]}','{$v[3]}','{$v[2]}')";
            $stmt = $db->prepare($sql);

            $stmt->execute();
            echo "成功";
        }
    }}
?>




