<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
<form action="/lab05/index.php/home/login/log" method="get">
用户名：<input type="text" name="username">
密码：<input type="text" name="password">
    <img src="<?php echo U('public/verify');?>" onclick='this.src = this.src+"?"+Math.random();'>
    <input type="submit" value="提交">
</form>
</body>
</html>