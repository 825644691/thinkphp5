<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title></title>
    <script type="text/javascript" src="/teacher/Public/jquery-1.11.2.js"></script>
    <link rel="stylesheet" href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="/teacher/Public/countdown/jquery.countdown.css">
    <script src="/teacher/Public/jquery/jquery.js"></script>
    <script src="/teacher/Public/countdown/jquery.countdown.js"></script>
</head>
<body>
<h1></h1>
<div class="timedown">
    <div class="jumbotron">
        <div class="container">
            <h1>欢迎使用！</h1>
            <p><div id="timedown">距离下课还有120分钟</div></p>
            <div id="content"><a class="btn btn-primary btn-lg" role="button" id="begin" onclick="swi()">
                上课</a>
            </div>
        </div>
    </div>


</div>



</body>
<script type="text/javascript" src="/teacher/Public/jquery-1.11.2.js"></script>
<script type="text/javascript">
    function swi(){
        $.post('/teacher/index.php/Home/Index/swi',{},function(data) {
            var msg = "<a class='btn btn-primary btn-lg' role='button' onclick='si()'>";
            msg += "下课";
            msg = msg + "</a>";

            var ms="距离结束还有";
            ms+=data.info-1;
            ms+="分钟";
            $('#timedown').html(ms);

            $('#content').html(msg);

            var i=data.info-1;
            var str="距离下课还有";
            var st="分钟";
            setInterval(function () {

                i-=1;

                str=str+i+st;
                $("#timedown").html(str);
            },60000);
        });
    }
    function si(){


            $.post('/teacher/index.php/Home/Index/si',{},function(data) {
               if(data.info==1){
                   var conn=confirm("时间已到，是否提交");
               }else{
                   var conn=confirm("时间未到，是否提前结束课程");
               }
                if(conn==true){
                    var msg = "<a class='btn btn-primary btn-lg' role='button'  href='/teacher/index.php/Home/Index/estimate'>";
                    msg += "评价学生";
                    msg = msg + "</a>";
                    $('#content').html(msg);
                }

            });




    }
    // $(function(){

</script>
</html>