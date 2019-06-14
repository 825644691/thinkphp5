<?php
require("conn.php");
if(isset($_POST['submit'])){

 $id=$_POST["id"];



}
?>
<table>


    <tr><td>ID</td><td>图片</td><td>书名</td><td>数量</td><td>价格</td><td>订单号:</td><tr>


        <?php
        session_start();
        error_reporting(0);
        $link=@mysql_connect('localhost','root','qq369520');
        mysql_select_db('myshop');
        mysql_query('set names utf8');
        $username=$_SESSION["username"];



        if(isset($_GET['page']))                   //判断是否存在page参数,获得页面值，否则取1
        {
            $page = intval($_GET['page']);
        }
        else
        {
            $page = 1;
        }
        $PageSize=4;
        $sql="select * from ord,book WHERE ord.id=$id AND  ord.book_id=book.book_id";
        $result=mysql_query($sql);
        $RecordCount=mysql_num_rows($result);//记录总数
        $PageCount=ceil($RecordCount/$PageSize);
        mysql_data_seek($result,($page-1)*$PageSize);
        for($i=0;$i<$PageSize;$i++) {
        $row=mysql_fetch_assoc($result);
        if($row){
        ?>
    <tr align="center">
        <td class="td_bg" width="3%"><?php echo $row["book_id"]?></td>
        <td class="td_bg" width="20%" height="26"><img src="images/book/<?php echo $row["pic"]?>" style="width: 100px;height: 100px"></td>
        <td class="td_bg" width="5%" height="26"><?php echo $row["book_title"]?></td>
        <td class="td_bg" width="5%" height="26"><?php echo$row["quantity"]?></td>
        <td width="11%" height="26" class="td_bg"><?php echo $row["price"]?></td>
        <td width="11%" height="26" class="td_bg"><?php echo $row["id"]?></td>
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
    </tr>

</table>
