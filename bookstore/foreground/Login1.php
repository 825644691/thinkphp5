
<html>
<head>
    <link rel="stylesheet" href="css1/bootstrap.min.css"/>
    <style>
        body{
            margin-left:auto;
            margin-right:auto;
            margin-TOP:100PX;
            width:20em;
        }
        #username{
            width: 200px;

        }
        #password{
            width: 200px;

        }
        #button{
            position: relative;
            left: 30px;
        }
    </style>
</head>
<body>
<script>
    function changing(){
        document.getElementById('checkpic').src="checkcode.php?"+Math.random();
    }
</script>
<form method="post" action="">
    <div class="container">
        <div class="form-group has-feedback">
            <div class="input-group">
                <span class="input-group-addon" id="basic-addon1">账号</span>


                <input id="username" type="text"  name="username" class="form-control" placeholder="用户名" aria-describedby="basic-addon1">
            </div>
            <br/>
            <br/>

            <div class="input-group">
                <span class="input-group-addon" id="basic-addon1">密码</span>


                <span class="glyphicon glyphicon-user form-control-feedback "></span>
                <input  id="password" type="password" name="password" class="form-control" placeholder="密码" aria-describedby="basic-addon1"><br>
            </div>
            <br/>
            <br/>
            <div class="input-group">
                <span class="input-group-addon" id="basic-addon1">验证码</span>

                <input type="text"  name="check" /><br/>
            </div>
            <img id="checkpic" onclick="changing();"
                 src='checkcode.php' />

            <br/>
            <br/>
            <input  name="login" id="button" type="submit"  value="登录" style="width:200px;" class="btn btn-default">


</form>

<?php
session_start();
error_reporting(0);
header('Content-type: text/html; charset=UTF-8');
$link=@mysql_connect('localhost','root','qq369520');
mysql_select_db('myshop');
mysql_query('set names utf8');

if(isset($_POST['login'])){
    $name=$_POST["username"];
    $password=$_POST["password"];
    $pass=md5($password);

    $admin=admin;



    $str=$_POST["check"];
    if(md5($str)==$_SESSION["verification"]){
        $str="select * from user where username = $name";
        $result=mysql_query($str,$link);
        $row=mysql_fetch_assoc($result);
        if ($row) {
            $str="select * from user where username = $name AND password=$password";
            $result1=mysql_query($str,$link);
            $row1=mysql_fetch_assoc($result1);
            if($row1){
                if($row["usergroupid"]==1){
                    echo "<script language=\"JavaScript\"> alert(\"登录成功\")</script>";
                    $_SESSION["username"] = $name;

                    header("Location:admin_finish.php");


                }
                elseif($row["usergroupid"]==0){


                    echo "<script language=\"JavaScript\"> alert(\"登录成功\")</script>";
                    $_SESSION["username"] = $name;
                    header("Location:electronic.php");
                }
                else{
                    echo "<script language=\"JavaScript\"> alert(\"登录失败\")</script>";
                }


            }else{echo "<script language=\"JavaScript\"> alert(\"密码错误\")</script>";}
        } else{echo "<script language=\"JavaScript\"> alert(\"用户名不存在\")</script>";}
    }else{echo "<script language=\"JavaScript\"> alert(\"验证码错误\")</script>";}

}
?>


</body>
</html>

