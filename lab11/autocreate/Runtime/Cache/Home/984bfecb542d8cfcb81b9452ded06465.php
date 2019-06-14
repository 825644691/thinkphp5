<?php if (!defined('THINK_PATH')) exit();?>﻿<html>
<head>
    <meta charset="utf-8">
    <title>新增留言</title>
    <style>
        input,textarea{
            margin-bottom: 10pt;
            width: 300pt;
        }

        input[id="v"]{
            width: 50pt;
        }
    </style>
</head>
<body>
<h1>新增留言</h1>
<form action='<?php echo U("do_add");?>' method="post">
    留言标题：<input type="text"name='tl' /><br>
    留言内容：<textarea rows="3" cols="40" name='content'></textarea><br>
    留言作者：<input type="text" name='auther' /><br>
    验证码：<input type="text" name="code" id="v"/>
    <!--<img src='verify' onclick='this.src = this.src+"?"+Math.random();' name="code" />-->
    <img src='<?php echo U("verify");?>' onclick='this.src = this.src+"?"+Math.random();' name="code" />
    <br>
    <input type="submit" value="提交修改" style="width: 60pt;"/>
</form>
</body>
</html>