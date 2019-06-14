<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title></title>
    <link rel="stylesheet" href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>


    <?php if(is_array($vo)): $i = 0; $__LIST__ = $vo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">购物车</h3>
            </div>
            <div class="panel-body">
            <div class="col-sm-6 col-md-3">
                <div class="thumbnail">
                    <img src="/lab12/Public/IMAGE/<?php echo ($vo["image"]); ?>"
                         alt="">
                    <div class="caption">
                        <h3><?php echo ($vo["book_name"]); ?></h3>

                        <p>

                            <a class="btn btn-default" role="button">
                                <?php echo ($vo["price"]); ?>元
                            </a>
                        </p>
                    </div>
                </div>
            </div>

        <a href="/lab12/index.php/Home/Index/gwc4?id=<?php echo ($vo["id"]); ?>" class="btn btn-primary" role="button">
            删除
        </a>



            </div>
            <div align="right">
            <a href="/lab12/index.php/Home/Index/gwc5?id=<?php echo ($msg["id"]); ?>" class="btn btn-primary" role="button">
                提交订单
            </a>
                </div>
        </div><?php endforeach; endif; else: echo "" ;endif; ?>




</body>
</html>