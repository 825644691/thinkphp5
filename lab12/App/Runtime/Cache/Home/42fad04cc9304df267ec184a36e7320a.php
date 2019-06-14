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
<nav class="navbar navbar-default" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">个人中心</a>
        </div>
        <ul class="nav navbar-nav navbar-right">
            <li><a href="<?php echo U('Index/destroy1');?>"><span class="glyphicon glyphicon-user"></span> 欢迎您    <?php echo (session('username')); ?></a></li>
            <li><a href="/lab12/index.php/Home/Index/index"><span class="glyphicon glyphicon-log-in"></span>返回首页 </a></li>
        </ul>
    </div>
</nav>
<?php if(is_array($vo)): $i = 0; $__LIST__ = $vo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title">订单号码：<?php echo mt_rand(999999999999,10000000000000000);?></h3>
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


                <button onclick='del(this, "<?php echo ($vo["id"]); ?>")' class="btn btn-primary">删除</button>





        </div>

    </div><?php endforeach; endif; else: echo "" ;endif; ?>
</body>
<script>
    function del(obj, id) {
        var conn = confirm("删除后无法恢复，是否删除？");
        if(conn == true) {
            $.post('/lab12/index.php/Home/Index/deleteMsg', {id:id}, function (data) {
                if(data == 1) {
                    $(obj).parent().parent().remove();
                } else {
                    alert("删除失败");
                }
            });
        }
    }
</script>
</html>