<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
    <h1>修改数据</h1>
    <form method="post" action="/thinkphp/lab08/index.php/Home/Index/updateMessage">
        <?php if(is_array($msg)): $i = 0; $__LIST__ = $msg;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><input type="hidden" name="id" value="<?=$_GET['id']?>">
        留言标题：
        <input type="text" name="updateTitle" value=""><br/><br/>
        留言内容：
        <textarea cols="50" rows="6" name="updateContent"><?php echo ($vo["content"]); ?></textarea><br/><br/>
        留言作者：
        <input type="text" name="updateAuther" value=""><br/><br/>
        <button type="submit">提交修改</button><?php endforeach; endif; else: echo "" ;endif; ?>
    </form>
</body>
</html>