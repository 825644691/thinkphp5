
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>注册</title>
    <link rel="stylesheet" href="css1/bootstrap.min.css"/>
    <link rel="stylesheet" type="text/css" href="css/electronic.css">

    <script type="text/javascript" src="js/jquery-3.2.1.js"></script>
    <script type="text/javascript" src="css1/bootstrap.min.js"></script>

    <link href="css/order.css" rel="stylesheet">
</head>

<body>
<header id="header">
    <div class="header-middle">
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <div class="logo pull-left">
                        <a href="index.html"><img src="images/logo.jpg" alt="" /></a>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="shop-menu pull-right">
                        <ul class="nav navbar-nav">
                            <li><a href="">免费注册</a></li>
                            <li><a href=""><i class="fa fa-user"></i> 个人中心</a></li>
                            <li><a href=""><i class="fa fa-star"></i> 收藏</a></li>
                            <li><a href="#"><i class="fa fa-crosshairs"></i> 查看</a></li>
                            <li><a href="gwc2.php"><i class="fa fa-shopping-cart"></i> 购物车</a></li>
                            <li><a href="Login1.php"><i class="fa fa-lock"></i> 登陆</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="header-bottom">
        <div class="container">
            <div class="row">
                <div class="col-sm-8">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <div class="mainmenu pull-left">
                        <ul class="nav navbar-nav collapse navbar-collapse">
                            <li><a href="index.php">首页</a></li>
                            <li><a href="#">商品详情</a></li>
                            <li><a href="#">商品</a></li>
                            <li><a href="#" >小编推荐</a></li>
                            <li><a href="#" >实时热卖</a></li>
                            <li><a href="#">查看</a></li>
                            <li><a href="#">联系</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-4">
                </div>
            </div>
        </div>
    </div>
</header>

<div class="container">
    <div class="row">
        <div class="col-lg-2">
            <a href="person.php"><h3><button>信息修改</button></h3></a>
            <a href="order.php"><h3><button>订单查询</button></h3></a>
        </div>
        <div class="col-lg-10">
            <div class="row">

            </div>
            <div class="row">
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
                        $sql="select DISTINCT id from ord WHERE username=$username";
                        $result=mysql_query($sql);

                        $RecordCount=mysql_num_rows($result);//记录总数
                        $PageCount=ceil($RecordCount/$PageSize);
                        mysql_data_seek($result,($page-1)*$PageSize);
                        for($i=0;$i<$PageSize;$i++) {
                        $row=mysql_fetch_assoc($result);
                        if($row){
                        ?>
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <h3 class="panel-title">订单号：<?php echo $row["id"]?></h3>
                                </div>
                                <div class="panel-body">

                                    <?php
                                    $sql1="select * from ord,book WHERE ord.book_id=book.book_id and id='".$row['id']."'";
                                    $result1=mysql_query($sql1);
                                    while($rows=mysql_fetch_array($result1)) {
                                        ?>

                                        书号:  <?php echo $rows["book_id"]?> &nbsp &nbsp &nbsp &nbsp
                                        <img src="images/book/<?php echo $rows["pic"]?>"
                                             style="width: 100px;height: 100px">
                                        书名：  <?php echo $rows["book_title"]?>&nbsp &nbsp &nbsp &nbsp
                                        数量：  <?php echo $rows["quantity"]?>&nbsp &nbsp &nbsp &nbsp
                                        价格：  <?php echo $rows["price"]?>&nbsp &nbsp &nbsp &nbsp
                                        <br>
                                    <?php
                                    }
                                        ?>
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


                </table>
                <form action="order1.php" method="post"><tr><td>输入货单号:<input name="id" type=text/><input type="submit" name="submit" value="查询"></td></tr>
                </form>






            </div>
        </div>
    </div>
</div>

<footer id="footer"><!--Footer-->
    <div class="footer-widget">
        <div class="container">
            <div class="row">
                <div class="col-sm-2">
                    <div class="single-widget">
                        <h3><i class="fa fa-thumbs-o-up"></i> 服务</h3>
                        <ul class="nav nav-pills nav-stacked">
                            <li><a href="">网上帮助p</a></li>
                            <li><a href="">联系我们</a></li>
                            <li><a href="">订单状态</a></li>
                            <li><a href="">换地点</a></li>
                            <li><a href="">常见问题解答</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="single-widget">
                        <h3><i class="fa fa-jpy"></i> 支付方式</h3>
                        <ul class="nav nav-pills nav-stacked">
                            <li><a href="">货到付款</a></li>
                            <li><a href="">网上支付</a></li>
                            <li><a href="">礼品卡支付</a></li>
                            <li><a href="">银行支付</a></li>
                            <li><a href="">他人代付</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="single-widget">
                        <h3><i class="fa fa-align-center"></i> 政策</h3>
                        <ul class="nav nav-pills nav-stacked">
                            <li><a href="">使用条款</a></li>
                            <li><a href="">隐私政策</a></li>
                            <li><a href="">退款政策</a></li>
                            <li><a href="">计费系统</a></li>
                            <li><a href="">服务系统</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="single-widget">
                        <h3><i class="fa fa-user"></i> 关于购物者</h3>
                        <ul class="nav nav-pills nav-stacked">
                            <li><a href="">公司信息</a></li>
                            <li><a href="">招聘</a></li>
                            <li><a href="">商店地址</a></li>
                            <li><a href="">公司计划</a></li>
                            <li><a href="">版权</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-3 col-sm-offset-1">
                    <div class="single-widget">
                        <h1>扫一扫，有惊喜</h1>
                        <form action="#" class="searchform">
                            <img src="images/footer.jpg" align="center">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <p class="pull-left">版权所有@2017 SANRENXING 保留所有权利.</p>
                <p class="pull-right">联系电话：100861126854</p>
            </div>
        </div>
    </div>
</footer>


</body>
</html>