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

            <?php if(is_array($vo)): $i = 0; $__LIST__ = $vo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="panel panel-info">
                    <div class="panel-heading">
                        <h3 class="panel-title">订单号码：<?php echo mt_rand(999999999999,10000000000000000);?> </h3>
                    </div>
                    <div class="panel-body">

                    <table id="J_tab_fam" border="1" align="center">
                    <tr>
                        <td></td>
                        <td>书名</td>
                        <td>价格</td>
                        <td>作者</td>
                        <td>数量</td>
                    </tr>
                <tr>
                    <td>
                        <img src="/lab12/Public/IMAGE/<?php echo ($vo["image"]); ?>">
                    </td>
                    <td>
                        <?php echo ($vo["book_name"]); ?>
                    </td>
                    <td><?php echo ($vo["price"]); ?></td>
                    <td><?php echo (session('author')); ?></td>
                    <td>1本</td>


                </tr><?php endforeach; endif; else: echo "" ;endif; ?>
        </table>
    </div>
</div>

            <div align="right">
            <a href="/lab12/index.php/Home/Index/destroy" class="btn btn-primary" role="button">
                返回首页
            </a>
            </div>



</body>
</html>