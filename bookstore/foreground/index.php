<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="css1/bootstrap.min.css"/>
    <link rel="stylesheet" type="text/css" href="css/index.css">
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
            echo $_SESSION["username"]."欢迎你"."&nbsp&nbsp&nbsp&nbsp"."<a href='person.php'>进入个人中心</a>&nbsp&nbsp
            <a href='Logoout.php'> 注销</a>";
        }
        else{
            echo " <a href=Login.php ><font color=black>你好，请登录 </a>&nbsp &nbsp &nbsp &nbsp
    <a href='register.php' ><font color='black'>注册</a>";
        }
        ?>
        </div>

</div>
<div class="search">
    <div class="gwc">
        <a href="gwc2.php"><img src="images/gwc.png" style="width: 40px;height: 40px" alt=""/></a>
    </div>
    <form  method="get" action="book_search_session.php">
        <div id="search">

            <select name="sel">
                <option value="book_title">书名</option>
                <option value="publish_name">出版社</option>
            </select>
            &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
            <input type="text" name="keyword" >


            <button name="submit">搜索</button>
        </div>
    </form>

</div>

<div class="nav">
    <ul class="nav nav-tabs nav-justified">
        <li class="search"><a href="index.php">首页</a></li>
        <li class="search"><a href="electronic.php">电子书</a></li>
        <li class="search"><a href="novel.php">小说</a></li>
        <li class="search"><a href="presell.php">预售</a></li>
        <li class="search"><a href="comment.php">社区</a></li>

    </ul>


</div>
<div class="banner">
    <div class="carousel slide" id="slidershow" data-ride="carousel">
        <!-- 设置轮播图片播放顺序-->
        <ol class="carousel-indicators">
            <li class="active" data-target="#slidershow" data-slide-to="0">
                <li data-target="#slidershow" data-slide-to="1"></li>
            <li data-target="#slidershow" data-slide-to="2"></li>
            <li data-target="#slidershow" data-slide-to="3"></li>
            </ol>
        <!-- 设置轮播图片-->
        <div class="carousel-inner">
            <div class="item active">
                <img src="images/1.jpg" alt="" style="width: 100%;height: 500px">
                 <!--添加对应的标题和内容
                <div class="carousel-caption">
                   <h4>标题一</h4>
                   <p>hello</p>
                   </div>
                   -->



                </div>
            <div class="item">
                <img src="images/2.jpg" alt="" style="width: 100%;height: 500px">
                <!--添加对应的标题和内容
                <div class="carousel-caption">
                    <h4>标题二</h4>
                    <p>hello</p>
                </div>
                   -->
            </div>
            <div class="item">
                <img src="images/3.jpg" alt="" style="width: 100%;height: 500px">
                <!--添加对应的标题和内容
                <div class="carousel-caption">
                    <h4>标题三</h4>
                    <p>hello</p>
                </div>
                   -->
            </div>
            <div class="item">
                <img src="images/4.jpg" alt="" style="width: 100%;height: 500px">
                <!--添加对应的标题和内容
                <div class="carousel-caption">
                    <h4>标题四</h4>
                    <p>hello</p>
                </div>
                   -->
            </div>
</div>
        <!--设置轮播图片控制器-->
        <a href="#slidershow" data-slide="prev" class="left carousel-control" role="button">
       <span class="glyphicon glyphicon-chevron-left"></span>
    </a>
        <a href="#slidershow" data-slide="next" class="right carousel-control" role="button">
            <span class="glyphicon glyphicon-chevron-right"></span>
        </a>
    </div>
    </div>




<div class="contain1">
    <div class="panel panel-success">
        <div class="panel-heading">
            <h3 class="panel-title">精选好书</h3>
        </div>

    <div class="panel-body">
        <div class="col-lg-3">
                <a href="" class="thumbnail">
                    <img src="images/book/1.png" style="width: 150px;height: 150px">
                </a>
                <div class="caption">
                    <h3 style="font-size: 15px">PHP从入门</h3>
                    <p>$99</p>
                    <p>
                        <button class="btn btn-xs btn-primary">购买</button>
                        <button class="btn btn-xs btn-success">加入购物车</button>
                    </p>
                </div>
        </div>
        <div class="col-lg-3">
                <a href="" class="thumbnail">
                    <img src="images/book/16.png" style="width: 150px;height: 150px">
                </a>
                <div class="caption">
                    <h3 style="font-size: 15px">Java基础</h3>
                    <p>$96</p>
                    <p>
                        <button class="btn btn-xs btn-primary">购买</button>
                        <button class="btn btn-xs btn-success">加入购物车</button>
                    </p>
                </div>
                </div>
        <div class="col-lg-3">
                    <a href="" class="thumbnail">
                        <img src="images/book/10.png" style="width: 150px;height: 150px">
                    </a>
                    <div class="caption">
                        <h3 style="font-size: 15px">Java深入</h3>
                        <p>$97</p>
                        <p>
                            <button class="btn btn-xs btn-primary">购买</button>
                            <button class="btn btn-xs btn-success">加入购物车</button>
                        </p>
                    </div>
        </div>
        <div class="col-lg-3">
            <a href="" class="thumbnail">
                <img src="images/book/20.png" style="width: 150px;height: 150px">
            </a>
            <div class="caption">
                <h3 style="font-size: 15px">杂货无忧</h3>
                <p>$99</p>
                <p>
                    <button class="btn btn-xs btn-primary">购买</button>
                    <button class="btn btn-xs btn-success">加入购物车</button>
                </p>
            </div>
        </div>
        </div>
    </div>
    </div>



<div class="contain2">
    <div class="panel panel-danger">
        <div class="panel-heading">
            <h3 class="panel-title">免邮专区</h3>
        </div>

        <div class="panel-body">

            <div class="col-lg-3">
                <a href="" class="thumbnail">
                    <img src="images/book/24.png" style="width: 150px;height: 150px">
                </a>
                <div class="caption">
                    <h3 style="font-size: 15px">恶意</h3>
                    <p>$98</p>
                    <p>
                        <button class="btn btn-xs btn-primary">购买</button>
                        <button class="btn btn-xs btn-success">加入购物车</button>
                    </p>
                </div>
            </div>
            <div class="col-lg-3">
                <a href="" class="thumbnail">
                    <img src="images/book/21.png" style="width: 150px;height: 150px">
                </a>
                <div class="caption">
                    <h3 style="font-size: 15px">十宗罪</h3>
                    <p>$88</p>
                    <p>
                        <button class="btn btn-xs btn-primary">购买</button>
                        <button class="btn btn-xs btn-success">加入购物车</button>
                    </p>
                </div>
            </div>
            <div class="col-lg-3">
                <a href="" class="thumbnail">
                    <img src="images/book/8.png" style="width: 150px;height: 150px">
                </a>
                <div class="caption">
                    <h3 style="font-size: 15px">PHP应用</h3>
                    <p>$77</p>
                    <p>
                        <button class="btn btn-xs btn-primary">购买</button>
                        <button class="btn btn-xs btn-success">加入购物车</button>
                    </p>
                </div>
            </div>
            <div class="col-lg-3">
                <a href="" class="thumbnail">
                    <img src="images/book/9.png" style="width: 150px;height: 150px">
                </a>
                <div class="caption">
                    <h3 style="font-size: 15px">Java程序设计</h3>
                    <p>$99</p>
                    <p>
                        <button class="btn btn-xs btn-primary">购买</button>
                        <button class="btn btn-xs btn-success">加入购物车</button>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

    <div class="contain3">
        <div class="panel panel-info">
            <div class="panel-heading">
                <h3 class="panel-title">科普科技</h3>
            </div>

            <div class="panel-body">

                <div class="col-lg-3">
                    <a href="" class="thumbnail">
                        <img src="images/book/10.png" style="width: 150px;height: 150px">
                    </a>
                    <div class="caption">
                        <h3 style="font-size: 15px">Java学习</h3>
                        <p>$66</p>
                        <p>
                            <button class="btn btn-xs btn-primary">购买</button>
                            <button class="btn btn-xs btn-success">加入购物车</button>
                        </p>
                    </div>
                </div>
                <div class="col-lg-3">
                    <a href="" class="thumbnail">
                        <img src="images/book/4.png" style="width: 150px;height: 150px">
                    </a>
                    <div class="caption">
                        <h3 style="font-size: 15px">PHP学习手册</h3>
                        <p>$81</p>
                        <p>
                            <button class="btn btn-xs btn-primary">购买</button>
                            <button class="btn btn-xs btn-success">加入购物车</button>
                        </p>
                    </div>
                </div>
                <div class="col-lg-3">
                    <a href="" class="thumbnail">
                        <img src="images/book/18.png" style="width: 150px;height: 150px">
                    </a>
                    <div class="caption">
                        <h3 style="font-size: 15px">大雪中的山庄</h3>
                        <p>$99</p>
                        <p>
                            <button class="btn btn-xs btn-primary">购买</button>
                            <button class="btn btn-xs btn-success">加入购物车</button>
                        </p>
                    </div>
                </div>
                <div class="col-lg-3">
                    <a href="" class="thumbnail">
                        <img src="images/book/12.png" style="width: 150px;height: 150px">
                    </a>
                    <div class="caption">
                        <h3 style="font-size: 15px">Java编程思想</h3>
                        <p>$88</p>
                        <p>
                            <button class="btn btn-xs btn-primary">购买</button>
                            <button class="btn btn-xs btn-success">加入购物车</button>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>





<div class="footer">
    <footer class="container-fluid foot-wrap">
        <!--采用container，使得页尾内容居中 -->
        <div class="container">
            <div class="row">
                <div class="row-content col-lg-3 ">
                    <h3>Subscribe</h3>
                    <ul>
                        <li><a href="#">Newsletter</a></li>
                        <li><a href="#">RSS feed</a></li>
                        <li><a href="#">RSS to Email</a></li>
                        <li><a href="#">Product Hunt</a></li>

                    </ul>
                </div>
                <div class="row-content col-lg-3">
                    <h3>BROWSE</h3>
                    <ul>
                        <li><a href="#">Home</a></li>
                        <li><a href="#">Gallery</a></li>
                        <li><a href="#">Templates</a></li>
                        <li><a href="#">Resources</a></li>

                    </ul>
                </div>
                <div class="row-content col-lg-3 ">
                    <h3>INFORMATION</h3>
                    <ul>
                        <li><a href="#">About</a></li>
                        <li><a href="#">Why One Page?</a></li>
                        <li><a href="#">OPL Blog</a></li>
                        <li><a href="#">Product Hunt</a></li>

                    </ul>
                </div>



                <div class="row-content col-lg-3 ">
                    <h3>OPL THEMES</h3>
                    <ul>
                        <li><a href="#">Browse All</a></li>
                        <li><a href="#">East Java</a></li>
                        <li><a href="#">Clutterless</a></li>
                        <li><a href="#">Mapped</a></li>
                    </ul>
                </div>

            </div><!--/.row -->
        </div><!--/.container-->



    </footer>

</div>
</body>

</html>
