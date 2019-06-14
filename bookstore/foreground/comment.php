<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">
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
<div class="container" >
    <div class="color">
        <?
        $id=intval($_GET['id']);


        ?>

        <ul class="nav nav-pills ">
            <li class="active"><a href="index.php">首页</a></li>
            <li><a href="#2" data-toggle="pill">福利活动</a></li>
            <li><a href="#3" data-toggle="pill">中奖通知</a></li>
            <li><a href="#4" data-toggle="pill">留言</a></li>



            <li class="nav navbar-nav navbar-right"><a href="Logoout.php"><span class="glyphicon glyphicon-user"></span> 注销</a></li>

        </ul>
    </div>
    <br/>
</div>
<div class="container">
    <div class="tab-content">
        <div class="tab-pane fade in active" id="1">



        </div>
        <div class="tab-pane fade" id="2">
            <img src="images/comment/1.png" alt=""/>
            <img src="images/comment/2.png" alt=""/>





        </div>
        <div class="tab-pane fade" id="3">
            <img src="images/comment/3.png" alt=""/>
            <img src="images/comment/4.png" alt=""/>

        </div>
        <div class="tab-pane fade" id="4" >
            <div class="panel panel-danger">
                <div class="panel-heading">
                    <h3 class="panel-title">留言列表</h3>
                </div>
                <div class="panel-body">
                    <iframe src="comment1.php" width="1100px" frameborder="0" height="400px">
                    </iframe>
                </div>
            </div>
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title">发表留言 </h3>
                </div>
                <iframe src="comment2.php" frameborder="0" width="1100px" height="400px"></iframe>
            </div>
        </div>


    </div>
</div>
</body>
</html>
