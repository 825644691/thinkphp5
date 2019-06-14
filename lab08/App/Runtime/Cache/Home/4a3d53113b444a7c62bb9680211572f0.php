<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>新增留言</title>
</head>
<body>
    <h1>新增留言</h1>
    <form method="post" action="/lab08/index.php/Home/Index/addMessage">s
        留言标题：
        <input type="text" name="addTitle"><br/><br/>
        留言内容：
        <textarea cols="50" rows="6" name="addContent"></textarea><br/><br/>
        留言作者：
        <input type="text" name="addAuthor"><br/><br/>
        验证码:<input type="text" name="code" />
        <img src="<?php echo U('public/verify');?>" onclick='this.src = this.src+"?"+Math.random();'>
        <br>
        <button type="submit">确认新增</button>
    </form>
    <a href="/lab08/index.php/Home/Index/message">返回首页</a>
</body>
</html>