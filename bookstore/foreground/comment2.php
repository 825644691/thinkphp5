<html>
<head lang="en">
    <meta charset="UTF-8">
    <title></title>
    <link rel="stylesheet" href="css1/bootstrap.min.css"/>
    <script type="text/javascript" src="js/jquery-3.2.1.js"></script>
    <script type="text/javascript" src="css1/bootstrap.min.js"></script>
    <style>
        .color{
            background-color:lightpink;
        }

    </style>

</head>
<body>
<div class="panel-body">
    <form class="form-horizontal" role="form">
        <div class="form-group">
            <label for="theme" class="col-sm-2 control-label">留言主题</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="theme" id="theme" placeholder="请输入您的主题">
            </div>
        </div>


        <div class="form-group">
            <label for="content" class="col-sm-2 control-label">留言内容</label>
            <div class="col-sm-10">
                            <textarea class="form-control" id="content" name="content" rows="3" >
                                </textarea>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <input type="submit" name="submit" class="btn btn-default">
            </div>
        </div>

    </form>
</div>

</body>
</html>
<?php
session_start();
error_reporting(0);
$link=@mysql_connect('localhost','root','qq369520');
mysql_select_db('myshop');
mysql_query('set names utf8');
if(isset($_GET['submit'])) {
    $theme = $_GET['theme'];
    $content = $_GET['content'];
    $username=$_SESSION["username"];
    if ($theme != null  && $content != null) {
        mysql_query("insert into comment(username,theme,content)VALUES ('$username','$theme','$content')");
        echo "<script>alert('留言成功 ')</script> ";
    } else if($theme == null && $content != null){

        echo "<script>alert('请输入留言主题')</script> ";
    }else if($theme != null  &&$content == null ){

        echo "<script>alert('请输入您要输入的留言内容')</script> ";
    }else{
        echo "<script>alert('请完善您要输入的信息')</script> ";
    }
}