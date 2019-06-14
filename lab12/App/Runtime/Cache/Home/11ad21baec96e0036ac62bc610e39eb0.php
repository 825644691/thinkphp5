<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Bootstrap 附加导航（Affix）插件</title>
    <link rel="stylesheet" href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>
<body>

<nav class="navbar navbar-default" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">bookstore</a>
            <form class="navbar-form navbar-left" role="search">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Search"  name="queryText" id="queryText">
                </div>
                <button type="submit" class="btn btn-default" onclick="queryAndOrder()">提交</button>
            </form>

            <ul class="nav nav-tabs">
                <li class="active"><a href="#">Home</a></li>
                <li><a href="#">SVN</a></li>
                <li><a href="#">iOS</a></li>
                <li><a href="#">VB.Net</a></li>

            </ul>
        </div>
        <ul class="nav navbar-nav navbar-right">


            <li><a href="<?php echo U('Login/register');?>"><span class="glyphicon glyphicon-user"></span> 注册</a></li>
            <li><a href="<?php echo U('Login/login');?>"><span class="glyphicon glyphicon-log-in"></span> 登录</a></li>

        </ul>

</div>
</nav>


<div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="2000">
    <!-- 轮播（Carousel）指标 -->
    <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active" ></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>
    <!-- 轮播（Carousel）项目 -->
    <div class="carousel-inner">
        <div class="item active">
            <img src="/lab12/Public/IMAGE/4.jpg" align="center" alt="First slide">
            <div class="carousel-caption">标题 1</div>
        </div>
        <div class="item">
            <img src="/lab12/Public/IMAGE/2.jpg" align="center" alt="Second slide">
            <div class="carousel-caption">标题 2</div>
        </div>
        <div class="item">
            <img src="/lab12/Public/IMAGE/3.jpg" align="center" alt="Third slide">
            <div class="carousel-caption">标题 3</div>
        </div>
    </div>
    <!-- 轮播（Carousel）导航 -->
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev" data-parse="hover">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>


<div class="row">
    <?php if(is_array($msg)): $i = 0; $__LIST__ = $msg;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$msg): $mod = ($i % 2 );++$i;?><div class="col-sm-6 col-md-3">
        <div class="thumbnail">
            <img src="/lab12/Public/IMAGE/<?php echo ($msg["image"]); ?>"
                 alt="通用的占位符缩略图">
            <div class="caption">
               <div id="content"> <h3><?php echo ($msg["book_name"]); ?></h3></div>
                <p>一些示例文本。一些示例文本。</p>
                <p>
                    <a href="/lab12/index.php/Home/Index/gwc1?id=<?php echo ($msg["id"]); ?>" class="btn btn-primary" role="button">
                        购买
                    </a>
                    <a href="/lab12/index.php/Home/Index/gwc3?id=<?php echo ($msg["id"]); ?>" class="btn btn-default" role="button">
                        加入购物车
                    </a>
                </p>
            </div>
        </div>
    </div><?php endforeach; endif; else: echo "" ;endif; ?>
    <div align="center" >

        <?php echo ($page); ?>
    </div>
</body>

<script>


    //查询并排序，更新表格
    function queryAndOrder() {
        var way = $('#orderSelect').val();
        var word = $('#querySelect').val();
        var queryText = $('#queryText').val();
        $.post('/lab12/index.php/Home/Index/queryAndOrder', {orderWay:way, word:word, queryText:queryText}, function(data) {


            for(var i = 0; i < data.length; i++) {
                msg = msg + data[i].book_name;
            }

            $('#content').html(msg);
        });
    }
</script>
</html>