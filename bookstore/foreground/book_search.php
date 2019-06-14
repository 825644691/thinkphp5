<html xmlns="http://www.w3.org/1999/html">
<head lang="en">
    <meta charset="UTF-8">
    <title></title>
    <link rel="stylesheet" href="css1/bootstrap.min.css"/>
    <link rel="stylesheet" type="text/css" href="css/book_search.css">
    <script type="text/javascript" src="js/jquery-3.2.1.js"></script>
    <script type="text/javascript" src="css1/bootstrap.min.js"></script>




</head>
<body>
<div class="top">
    <div id="top">
        <?php
        session_start();
        header("context-type:text/html;charset=utf-8");

        require("conn1.php");
        if(!empty($_SESSION["username"])){
            echo $_SESSION["username"]."欢迎你"."&nbsp&nbsp&nbsp&nbsp"."<a href='#'>进入个人中心</a>&nbsp&nbsp
            <a href='Logoout.php'> 注销</a>";
        }
        else{
            echo " <a href=Login1.php ><font color=black>你好，请登录 </a>&nbsp &nbsp &nbsp &nbsp
    <a href='register.php' ><font color='black'>注册</a>";
        }
        ?>
    </div>

</div>
<div class="search">
    <div class="gwc">
        <a href="gwc2.php"><img src="images/gwc.png" style="width: 40px;height: 40px" alt=""/></a>
    </div>
    <form  method="get" action="book_search.php">
        <div id="search">

            <select name="sel">
                <option value="book_title">书名</option>
                <option value="publish_name">出版社</option>
            </select>
            &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
            <input type="text" name="keyword" >


            <button >搜索</button>
        </div>
    </form>

</div>
<div class="container">
    <div class="img">
        <img src="images/1.png" style="width: 1200px">
        </div>

<?php
error_reporting(0);
require('conn.php');
$a=$_SESSION['sel'];
$b=$_SESSION['keyword'];

if(isset($_GET['page']))                   //判断是否存在page参数,获得页面值，否则取1
{
    $page = intval($_GET['page']);
}
else
{
    $page = 1;
}
$PageSize=4;
$sql="select * from book,publish WHERE book.publish_id=publish.publish_id AND $a LIKE '%$b%'ORDER  BY book_id DESC ";
//$sql="select * from book,publish WHERE book.publish_id=publish.publish_id AND $sel LIKE  '%$keyword%'";
$result=mysql_query($sql);
$RecordCount=mysql_num_rows($result);//记录总数
$PageCount=ceil($RecordCount/$PageSize);
mysql_data_seek($result,($page-1)*$PageSize);
for($i=0;$i<$PageSize;$i++) {
    $row=mysql_fetch_assoc($result);
    if($row){
        ?>

        <div class="row">
        <div class="col-sm-6 col-md-3">
        <div class="thumbnail">
                <img src="images/book/<?=$row['pic'] ?>" alt="" style="width: 150px;height: 150px"/ >

        <div class="caption">
            <a href="" class="">
                <h4><?=$row['book_title'] ?></h4>
                <h4><?=$row['publish_name'] ?></h4>
            </a>
                <p>
                    <button class="btn btn-xs btn-primary">购买</button>
                    <button class="btn btn-xs btn-success">加入购物车</button>
                </p>

        </div>
        </div>
        </div>

    <?php
    }}

if($page==1)
    echo "第一页      上一页";
else echo "<a href='?page=1'>第一页</a><a href='?page=".($page-1)."'>上一页</a>";
for($i=1;$i<=$PageCount;$i++) {
    if ($i == $page)
        echo "$i";
    else
        echo "<a href=?page=$i>$i</li></a>";}
if($page==$PageCount)
    echo "下一页    末页";
else
    echo "<a href='?page=".($page+1)."'>下一页</a><a href='?page=".$PageCount."'>末页</a>";
echo "共".$RecordCount."条记录";
echo "$page/$PageCount 页";
?>
        </div>
    </div>
</body>


</html>