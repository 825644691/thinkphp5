<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
<h1>修改留言</h1>
<form method="post" action="/lab08/index.php/Home/Index/updateMessage">
    <input type="hidden" name="id" value="<?php echo ($edit["id"]); ?>">
    留言标题：
    <input type="text" name="updateTitle" value="<?php echo ($edit["title"]); ?>"><br/><br/>
    留言内容：
    <textarea cols="50" rows="6" name="updateContent"><?php echo ($edit["content"]); ?></textarea><br/><br/>
    留言作者：
    <input type="text" name="updateAuthor" value="<?php echo ($edit["author"]); ?>"><br/><br/>
    <button type="submit">确认修改</button>
</form>
<a href="/lab08/index.php/Home/Index/message">返回首页</a>
</body>
</html>