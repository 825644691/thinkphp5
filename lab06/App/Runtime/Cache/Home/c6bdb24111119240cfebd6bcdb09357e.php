<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
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

    </tr><?php endforeach; endif; else: echo "" ;endif; ?>
</body>
</html>