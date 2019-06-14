<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
<table border="1">
    <h2><a href="/lab05/index.php/home/index/destroy">注销</a></h2>
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
            <td><a href="/lab05/index.php/home/index/del?id=<?php echo ($vo["id"]); ?>">删除</a></td>
            <td><span onclick='del2(this,"<?php echo ($vo["id"]); ?>")'>删除</span></td>
            <td><span onclick="del3(this,'<?php echo ($vo["id"]); ?>')">删除</span></td>
            <td><span onclick="del4(this,'<?php echo ($vo["id"]); ?>')">删除</span></td>

        </tr><?php endforeach; endif; else: echo "" ;endif; ?>

</table>
</body>
<script type="text/javascript" src="/lab05/Public/jquery-1.11.2.js"></script>
<script type="text/javascript">
    function del2(obj,id){
        $.post('/lab05/index.php/home/index/del2',{id:id},function(data){
           alert(data);
            if(data==1){
                $(obj).parent().parent().remove();
                alert('删除成功');

            }else
            alert("失败");
        });

    }
    function del3(obj,id){
        $.post('/lab05/index.php/home/index/del3',{id:id},function(data){

           if(data.code==200){

               alert(data,info);

           }else{
               alert(data,info);
           }
        },'json');
    }
    function del4(obj,id){
        $.post('/lab05/index.php/home/index/del4',{id:id},function(data){
           alert(data);
            if(data.code==200){
                $(obj).parent().parent().remove();
                alert(data.info);

            }else
            alert(data.info);

        });
    }
</script>

</html>