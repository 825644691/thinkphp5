<html>
<head lang="en">
    <meta charset="UTF-8">
    <title></title>
    <link rel="stylesheet" href="css1/bootstrap.min.css"/>
    <script type="text/javascript" src="js/jquery-3.2.1.js"></script>
    <script type="text/javascript" src="css1/bootstrap.min.js"></script>
    <style>
        .color{
            background-color:lightpink;
        }

    </style>

</head>
</html>
<?php
error_reporting(0);
$link=@mysql_connect('localhost','root','qq369520');
mysql_select_db('myshop');
mysql_query('set names utf8');



if(isset($_GET['page']))                   //判断是否存在page参数,获得页面值，否则取1
{
    $page = intval($_GET['page']);
}
else
{
    $page = 1;
}
$PageSize=2;
$sql="select * from comment order by username DESC ";
$result=mysql_query($sql);
$RecordCount=mysql_num_rows($result);//记录总数
$PageCount=ceil($RecordCount/$PageSize);
mysql_data_seek($result,($page-1)*$PageSize);
for($i=0;$i<$PageSize;$i++) {
    $row=mysql_fetch_assoc($result);
    if($row){
        ?>
        <div class="panel panel-warning">
        <div class="panel-heading">
            <h3 class="panel-title">
                <img src="images/6.jpg" alt="" style="width: 50px;height: 50px"/>
               留言人： <?php echo $row['username'] ?><hr><br><br>
                主题:<?php echo $row['theme'] ?><hr><br><br>
                内容：<?php echo $row['content'] ?><hr><br><br>

            </h3>
        </div>
        <div class="panel-body">







        </div>





        <br>
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