<?php if (!defined('THINK_PATH')) exit();?>﻿<html>
<head>
    <meta charset="utf-8">
    <title>新增用户</title>
    <style>
        input,textarea{
            margin-bottom: 10pt;
            width: 80pt;
        }
        input[type="radio" ]{
            width: 30pt;
        }
    </style>
</head>
<body>
<h1>新增用户</h1>
<form action='<?php echo U("do_add");?>' method="post">
    用 户 &nbsp; 名：<input type="text"name='username' /><br>
    密&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  码：<input type="password" name='password' /><br>
    确认密码：<input type="password" name='repassword' /><br>
    性别：<input type="radio"  name="sex" value="1" checked/>男
         <input type="radio"  name="sex" value="0"/>女
    <br>    <br>
    <input type="submit" value="提交修改" style="width: 60pt;"/>
</form>
</body>
</html>