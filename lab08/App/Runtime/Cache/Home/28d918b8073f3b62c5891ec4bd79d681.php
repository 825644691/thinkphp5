<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title></title>
</head>
<style>
    .t{

        margin:0 auto;
    }
</style>
<body>
<h1  align="center">留言表---查询 修改 删除</h1><br>
<h3 align="center">排序
<select id="orderSelect">
    <option>id</option>
    <option>title</option>
    <option>content</option>
    <option>author</option>
    <option>time</option>
</select>
    <button onclick='ord()'>排序</button>
    <a href="/lab08/index.php/Home/Index/addMsg">新增留言</a>

</br>
</h3>
<h3 align="center">
    查询
    <select id="querySelect">
        <option>id</option>
        <option>title</option>
        <option>content</option>
        <option>author</option>
        <option>time</option>
    </select>
    <input type="text" name="queryText" id="queryText">
    <button onclick="ord()">查询</button>
</h3>

<div id="content">
<table id="J_tab_fam" border="1" align="center">
    <tr>
        <td>留言id</td>
        <td>留言标题</td>
        <td>留言内容</td>
        <td>留言作者</td>
        <td>留言时间</td>
        <td>删除</td>
        <td>修改</td>

    </tr>
    <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
            <td>
                <?php echo ($vo["id"]); ?>
            </td>
            <td>
                <?php echo ($vo["title"]); ?>
            </td>
            <td><?php echo ($vo["content"]); ?></td>
            <td><?php echo ($vo["auther"]); ?></td>
            <td><?php echo ($vo["time"]); ?></td>
            <td><span onclick="del4(this,'<?php echo ($vo["id"]); ?>')">删除</span></td>
            <td><a href="/lab08/index.php/Home/Index/edit?id=<?php echo ($msg["id"]); ?>">修改</a></td>

        </tr><?php endforeach; endif; else: echo "" ;endif; ?>

</table>

</div>
<div align="center">

    <?php echo ($page); ?>
</div>
</body>
<script type="text/javascript" src="/lab08/Public/jquery-1.11.2.js"></script>
<script type="text/javascript">
 function ord(){
     var way = $('#orderSelect').val();
     var word =$('#querySelect').val();
     var queryText = $('#queryText').val();
     $.post('/lab08/index.php/Home/Index/order',{orderWay:way,word:word,queryText:queryText},function(data) {
         var msg = "<table border=1 align=center>";
         msg += "<th>id</th><th>标题</th><th>内容</th><th>作者</th><th>时间(d/m/y)</th><th>删除</th><th>修改</th>";
         for(var i=0;i<data.length;i++){
             msg = msg + "<tr>"
                       + "<td>"+data[i].id+"</td>"
                       + "<td>"+data[i].title+"</td>"
                       + "<td>"+data[i].content+"</td>"
                       + "<td>"+data[i].auther+"</td>"
                       + "<td>"+data[i].time+"</td>"
                       + "<td><span onclick='del4(this, " + data[i].id + ")'>删除</span></td>"
                       + "<td><a href='/lab08/index.php/Home/Index/edit?id=" + data[i].id + "'>修改</a></td>"
                       + "</tr>";
         }
         msg = msg + "</table>";



         $('#content').html(msg);




     });

 }
 function del4(obj,id){
     $.post('/lab08/index.php/Home/Index/del4',{id:id},function(data){

         if(data.code==200){

             alert(data.info);

         }else
             alert(data.info);

     });
 }
</script>
</html>