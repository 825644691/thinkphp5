<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="css1/bootstrap.min.css"/>
    <link rel="stylesheet" type="text/css" href="css/electronic.css">
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
            <div id="search" >

                <select name="sel" >
                    <option value="book_title">书名</option>
                    <option value="publish_name">出版社</option>
                </select>
                &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
                <input type="text" name="keyword"   placeholder="请输入关键字">


                <button class="btn btn-primary" type="button">搜索</button>
            </div>
        </form>

    </div>
    <div class="nav">
        <ul class="nav nav-tabs nav-justified">
            <li class="search"><a href="index.php">首页</a></li>
            <li class="search"><a href="novel.php">小说</a></li>
            <li class="search"><a href="">特色书店</a></li>
            <li class="search"><a href="ReadTool.php">阅读器</a></li>
            <li class="search"><a href="comment.php">社区</a></li>

        </ul>


    </div>
    <div>
    <div class="banner">
        <div class="img">
            <img src="images/3.png" style="width: 1100px;">


        </div>
  </div><!-- banner-->
        <div class="container">
            <div class="container1">
                    <img src="images/electronic/6.jpg" style="width: 1100px;">
                </div><!--contain1-->
                <div class="container2">
                    <?php
                    error_reporting(0);
                    require('conn.php');
                    $keyword=trim($_GET['keyword']);
                    $sel=$_GET['sel'];



                    if(isset($_GET['page']))                   //判断是否存在page参数,获得页面值，否则取1
                    {
                        $page = intval($_GET['page']);
                    }
                    else
                    {
                        $page = 1;
                    }
                    $PageSize=4;
                    $sql="select * from book,publish WHERE book.publish_id=publish.publish_id ORDER  BY book_id  ASC limit 16,19 ";
                    //$sql="select * from book,publish WHERE book.publish_id=publish.publish_id AND $sel LIKE  '%$keyword%'";
                    $result=mysql_query($sql);
                    $RecordCount=mysql_num_rows($result);//记录总数
                    $PageCount=ceil($RecordCount/$PageSize);
                    mysql_data_seek($result,($page-1)*$PageSize);
                    for($i=0;$i<$PageSize;$i++) {
                    $row=mysql_fetch_assoc($result);
                    if($row){
                    ?>


                        <div class="col-sm-7 col-md-3">
                            <div class="thumbnail">
                                <img src="images/book/<?=$row['pic'] ?>" alt="" style="width: 70px;height: 70px"/ >

                                <div class="caption">
                                    <a href="#" class="">
                                        <h5><?=$row['book_title'] ?></h5>

                                        <h5><font color="#ff1493">$<?=$row['price'] ?></font></h5>
                                    </a>
                                    <p>
                                        <a href='gwc7.php?book_id=<?=$row['book_id']?>' class="btn btn-xs btn-primary">购买</a>
                                        <a href='gwc1.php?book_id=<?=$row['book_id']?>' class="btn btn-xs btn-primary">购物车</a>

                                    </p>

                                </div><!--caption-->
                            </div><!--thumbnail-->
                        </div>


                        <?php
                        }}

                        ?>


                </div><!--contain2-->


                    <div class="container3">
                        <img src="images/electronic/2.jpg" style="width: 1100px;">
                    </div><!--contain3-->
                    <div class="container4">
                        <?php

                        if(isset($_GET['page']))                   //判断是否存在page参数,获得页面值，否则取1
                        {
                            $page = intval($_GET['page']);
                        }
                        else
                        {
                            $page = 1;
                        }
                        $PageSize=4;
                        $sql="select * from book,publish WHERE book.publish_id=publish.publish_id  ORDER  BY book_id DESC limit 1,5 ";
                        //$sql="select * from book,publish WHERE book.publish_id=publish.publish_id AND $sel LIKE  '%$keyword%'";
                        $result=mysql_query($sql);
                        $RecordCount=mysql_num_rows($result);//记录总数
                        $PageCount=ceil($RecordCount/$PageSize);
                        mysql_data_seek($result,($page-1)*$PageSize);
                        for($i=0;$i<$PageSize;$i++) {
                        $row=mysql_fetch_assoc($result);
                        if($row){
                        ?>


                            <div class="col-sm-7 col-md-3">
                                <div class="thumbnail">
                                    <img src="images/book/<?=$row['pic'] ?>" alt="" style="width: 70px;height: 70px"/ >

                                    <div class="caption">
                                        <a href="#" class="">
                                            <h5><?=$row['book_title'] ?></h5>

                                            <h5><font color="#ff1493"><?=$row['price'] ?></font></h5>
                                        </a>
                                        <p>
                                            <a href='gwc7.php?book_id=<?=$row['book_id']?>' class="btn btn-xs btn-primary">购买</a>
                                            <a href='gwc1.php?book_id=<?=$row['book_id']?>' class="btn btn-xs btn-primary">购物车</a>
                                        </p>

                                    </div><!--caption-->
                                </div><!--thumbnail-->
                            </div><!--thumbnail-->



                            <?php
                            }}

                            ?>

        </div><!--contain4-->

    </div><!--contain-->

    </body>



</html>