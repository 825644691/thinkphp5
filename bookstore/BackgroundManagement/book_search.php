<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>php make page list</title>
    <style type="text/CSS">
        .table{
            border: 1px solid #CAF2FF;/*边框颜色*/
            margin-top: 5px;
            margin-bottom: 5px;
            background:#a8c7ce;
        }
        .td_bgf {
            background:#d3eaef;
            color:#000000;
        }

        .td_bg {
            background:#ffffff;
            color:#344b50;
        }
        .bg_tr {
            font-family: "微软雅黑,Verdana, 新宋体";
            color:#e1e2e3;/*标题字体色*/
            font-size:12px;
            font-weight:bolder;
            background:deepskyblue;/*标题背景色*/

            line-height: 22px;
        }td {
             color:#1E5494;
             font-size:12px;
             line-height: 18px;
         }
        .page{color: #ffffff;}
        .page a:visited {
            text-decoration: none;
            color:#ffffff;
        }
    </style>
</head>
<body>
<table width="100%" border="0" align="center" cellpadding="2" cellspacing="1" class="table">
    <tr>
        <td width="100%" height="27" valign="top" bgcolor="#FFFFFF" class="bg_tr"> 后台管理 >> 图书查询</td>
    <tr>
        <td height="27" valign="top" bgcolor="#FFFFFF" class="bg_tr">
            <form id="form1" name="form1" method="post" action="book_search_session.php" style="margin:0px; padding:0px;">
                <table width="45%" height="42" border="0" align="center" cellpadding="0" cellspacing="0" class="bk">
                    <tr>
                        <td width="36%" align="center">
                            <select name="seltype" id="seltype">
                                <option value="book_id">图书序号</option>
                                <option value="book_title">图书名称</option>
                                <option value="price">图书价格</option>
                                <option value="author">作者</option>
                                <option value="type">图书类别</option>
                            </select>
                        </td>
                        <td width="31%" align="center">
                            <input type="text" name="search" id="search" />
                        </td>
                        <td width="33%" align="center">
                            <input type="submit" name="button" id="button" value="查询" />
                        </td>
                    </tr>
                </table>
            </form>
        </td>
    </tr>
</table>
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC" class="table" >
    <tr>
        <td width="3%" height="35" align="center" bgcolor="#FFFFFF">ID</td>
        <td width="5%" align="center" bgcolor="#FFFFFF">封面</td>
        <td width="5%" align="center" bgcolor="#FFFFFF">书名</td>
        <td width="5%" align="center" bgcolor="#FFFFFF">作者</td>
        <td width="3%" align="center" bgcolor="#FFFFFF">出版社id</td>
        <td width="15%" align="center" bgcolor="#FFFFFF">书本内容</td>
        <td width="5%" align="center" bgcolor="#FFFFFF">类别</td>

        <td width="5%" align="center" bgcolor="#FFFFFF">入库总量</td>
        <td width="5%" align="center" bgcolor="#FFFFFF">价格</td>

    </tr>
    <?php
session_start();
    $link=@mysql_connect('localhost','root','qq369520');
    mysql_select_db('myshop');
    mysql_query('set names utf8');

    $Page_size=8;

    $result=mysql_query('select * from book');
    $count = mysql_num_rows($result);
    $page_count = ceil($count/$Page_size);

    $init=1;
    $page_len=7;
    $max_p=$page_count;
    $pages=$page_count;

    //判断当前页码
    if(empty($_GET['page'])||$_GET['page']<0){
        $page=1;
    }else {
        $page=$_GET['page'];
    }

    $offset=$Page_size*($page-1);
    error_reporting(0);
    $a= $_SESSION['seltype'];
    $b= $_SESSION['search'];
    $sql="select * from book where $a like '%$b%'limit $offset,$Page_size " ;
    $result=mysql_query($sql,$link);
    while($row=mysql_fetch_assoc($result))
    {
        ?>
        <tr align="center">

            <td class="td_bg" width="4%"><?php echo $row["book_id"]?></td>
            <td class="td_bg" width="4%"><img src="../foreground/images/book/<?php echo $row["pic"]?> "style="width: 40px;height: 40px" alt=""/></td>
            <td class="td_bg" width="6%" height="26"><?php echo $row["book_title"]?></td>
            <td class="td_bg" width="6%" height="26"><?php echo $row["author"]?></td>
            <td class="td_bg" width="6%" height="26"><?php echo $row["publish_id"]?></td>
            <td class="td_bg" width="6%" height="26"><?php echo $row["introduction"]?></td>
            <td class="td_bg" width="6%" height="10" class="td_bg"><?php echo $row["type"]?></td>
            <td class="td_bg" width="6%" height="10" class="td_bg"><?php echo $row["total"]?></td>

            <td class="td_bg" width="6%" height="26"><?php echo $row["price"]?></td>
        </tr>
    <?php
    }

    $page_len = ($page_len%2)?$page_len:$pagelen+1;//页码个数
    $pageoffset = ($page_len-1)/2;//页码个数左右偏移量

    $key='<div class="page">';
    $key.="<span>$page/$pages</span> "; //第几页,共几页
    if($page!=1){
        $key.="<a href=\"".$_SERVER['PHP_SELF']."?page=1\">首页</a> "; //第一页
        $key.="<a href=\"".$_SERVER['PHP_SELF']."?page=".($page-1)."\">上一页</a>"; //上一页
    }else {
        $key.="首页 ";//第一页
        $key.="上一页"; //上一页
    }
    if($pages>$page_len){
        //如果当前页小于等于左偏移
        if($page<=$pageoffset){
            $init=1;
            $max_p = $page_len;
        }else{//如果当前页大于左偏移
            //如果当前页码右偏移超出最大分页数
            if($page+$pageoffset>=$pages+1){
                $init = $pages-$page_len+1;
            }else{
                //左右偏移都存在时的计算
                $init = $page-$pageoffset;
                $max_p = $page+$pageoffset;
            }
        }
    }
    for($i=$init;$i<=$max_p;$i++){
        if($i==$page){
            $key.=' <span>'.$i.'</span>';
        } else {
            $key.=" <a href=\"".$_SERVER['PHP_SELF']."?page=".$i."\">".$i."</a>";
        }
    }
    if($page!=$pages){
        $key.=" <a href=\"".$_SERVER['PHP_SELF']."?page=".($page+1)."\">下一页</a> ";//下一页
        $key.="<a href=\"".$_SERVER['PHP_SELF']."?page={$pages}\">最后一页</a>"; //最后一页
    }else {
        $key.="下一页 ";//下一页
        $key.="最后一页"; //最后一页
    }
    $key.='</div>';
    ?>
    <tr>
        <td colspan="8"    style="background:deepskyblue" ><div align="center"><?php echo $key?></div></td>
    </tr>
</table>
</body>
</html> 