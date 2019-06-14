<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title></title>
    <script src="/thinkphp/lab08/Public/JS/jquery-1.6.2.min.js"></script>
    <style>
        body,div,table{
            margin: 10px auto;
            text-align: center;
        }
        table{
            width: 80%;
        }
        .aa{
            border: solid 1px #000000;
            width: 600px;
            padding: 5px;
        }
        td{
            padding: 5px 10px;
        }
    </style>
</head>
<body>
    <h1>留言表---查询、修改、增加</h1>
    <div class="aa">
        排序
        <select id="orderSelect">
            <option>id</option>
            <option>title</option>
            <option>content</option>
            <option>author</option>
            <option>time</option>
        </select>
        <button onclick="queryAndOrder()">排序</button>
        <a href="/thinkphp/lab08/index.php/Home/Index/addMsg">新增留言</a>
    </div>
    <div class="aa">
        查询
        <select id="querySelect">
            <option>id</option>
            <option>title</option>
            <option>content</option>
            <option>author</option>
            <option>time</option>
        </select>
        <input type="text" name="queryText" id="queryText"/>
        <button onclick="queryAndOrder()">查询</button>
    </div>
    <div id="content">
        <table border="1">
            <th>id</th>
            <th>标题</th>
            <th>内容</th>
            <th>作者</th>
            <th>时间(d/m/y)</th>
            <th>删除</th>
            <th>修改</th>
            <?php if(is_array($msg)): $i = 0; $__LIST__ = $msg;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$msg): $mod = ($i % 2 );++$i;?><tr>
                    <td><?php echo ($msg["id"]); ?></td>
                    <td><?php echo ($msg["title"]); ?></td>
                    <td><?php echo ($msg["content"]); ?></td>
                    <td><?php echo ($msg["author"]); ?></td>
                    <td><?php echo ($msg["time"]); ?></td>
                    <td><button onclick='del(this, "<?php echo ($msg["id"]); ?>")'>删除</button></td>
                    <td><a href="/thinkphp/lab08/index.php/Home/Index/edit?id=<?php echo ($msg["id"]); ?>">修改</a></td>
                </tr><?php endforeach; endif; else: echo "" ;endif; ?>
        </table>
    </div>

    <script>
        //删除
        function del(obj, id) {
            var conn = confirm("删除后无法恢复，是否删除？");
            if(conn == true) {
                $.post('/thinkphp/lab08/index.php/Home/Index/deteleMsg', {id:id}, function (data) {
                    if(data == 1) {
                        $(obj).parent().parent().remove();
                    } else {
                        alert("删除失败");
                    }
                });
            }
        }
        //查询并排序，更新表格
        function queryAndOrder() {
            var way = $('#orderSelect').val();
            var word = $('#querySelect').val();
            var queryText = $('#queryText').val();
            $.post('/thinkphp/lab08/index.php/Home/Index/queryAndOrder', {orderWay:way, word:word, queryText:queryText}, function(data) {
                var msg = "<table border=1>";
                msg += "<th>id</th><th>标题</th><th>内容</th><th>作者</th><th>时间(d/m/y)</th><th>删除</th><th>修改</th>";
                for(var i = 0; i < data.length; i++) {
                    msg = msg + "<tr>"
                               + "<td>" + data[i].id + "</td>"
                               + "<td>" + data[i].title + "</td>"
                               + "<td>" + data[i].content + "</td>"
                               + "<td>" + data[i].author + "</td>"
                               + "<td>" + data[i].time + "</td>"
                               + "<td><button onclick='del(this, " + data[i].id + ")'>删除</button></td>"
                               + "<td><a href='/thinkphp/lab08/index.php/Home/Index/edit?id=" + data[i].id + "'>修改</a></td>"
                               + "</tr>";
                }
                msg = msg + "</table>";
                $('#content').html(msg);
            });
        }
    </script>
</body>
</html>