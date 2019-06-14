<?php
/**
 * Created by PhpStorm.
 * User: 天选之人
 * Date: 2018/4/3
 * Time: 15:16
 */
?>
<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
<table border="1">
    <volist name="list" id="vo">
        <tr>
            <td>
                <{$vo.id}>
            </td>
            <td>
                <{$vo.title}>
            </td>
            <td><{$vo.content}></td>
            <td><{$vo.auther}></td>
            <td><{$vo.time}></td>
            <td><a href="__URL__/del?id=<{vo.id}>"></a>删除</td>
            <td><span onclick="del2(this,'<{vo.id}>')">删除</span></td>
            <td><span onclick="del3(this,'<{vo.id}>')">删除</span></td>
            <td><span onclick="del4(this,'<{vo.id}>')">删除</span></td>

        </tr>


    </volist>

</table>
</body>
</html>