<?php
session_start();

?>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

    <link  href="js/jquery-3.2.1.js" type="text/css" rel="stylesheet"/>
</head>
<body>

    <!-- 布局中部 -->
    <div id="middle">
        <div id="logout_middle">
            <H3 style="COLOR: #880000">登录成功</H3>
            <H4>欢迎你的到来!<br />系统将在
                <input type="text" style='font-size:18px; border:0px; width:20px;'
                       readonly="true" value="5" id="time">秒后前往管理页面！
            </H4>
        </div>
        <!-- 时间函数 -->
        <script language="javascript">
            var t = 5;
            var time = document.getElementById("time");
            function fun()
            {
                t--;
                time.value = t;
                if(t<=0)
                {
                    location.href="../BackgroundManagement/admin.html";

                }
            }
            var inter = setInterval("fun()",1000);
        </script>
</body>
</html>  