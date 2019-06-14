<html>
<head>
    <link rel="stylesheet" type="text/css" href="css/register.css">



</head>
<body>
<script>
    function changing(){
        document.getElementById('checkpic').src="checkcode.php?"+Math.random();
    }
</script>


<form method="post" action="">



       <div class="register-box">
           <label for="username" class="username_label">用  户  名
               <input type="text" name="username" placeholder="请输入用户名" />
               </label>


       </div>

    <div class="register-box">
        <label for="password" >设 置 密 码
            <input type="text" name="password" placeholder="请输入密码" />
        </label>

    </div>

    <div class="register-box">
        <label for="password1" >确 定 密 码
            <input type="text" name="password1" placeholder="请再次输入密码" />
        </label>

    </div>


    <div class="register-box">
        <label for="email" >输 入 邮 箱
            <input type="email" name="email" placeholder="请输入用邮箱" />
        </label>

    </div>

    <div class="register-box">
        <label for="mobile" >手 机 号 码
            <input type="text" name="mobile" placeholder="请输入手机号码" />
        </label>

    </div>





    <div class="submit-button">

    <input type="submit" name="submit" value="立 即 注 册">
    </div>

</form>



</body>
</html>

<?php
error_reporting(0);
header("context-type:text/html;charset=utf-8");
require("conn1.php");

if(isset($_POST["submit"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $password1 = $_POST["password1"];
    $email = $_POST["email"];
    $mobile = $_POST["mobile"];




    $result =$db->query("select * from user WHERE username='$username'");

    if ($username == "" || $password == "" || $password1 == "") {
        echo "<script> alert('账号，密码不能为空，请重新输入')</script>";

    }
    elseif(strlen($username) < 6||strlen($password) < 6){
        echo "<script> alert('帐号密码不能小于6位')</script>";}
    elseif($result->rowCount()!=0){
        echo "<script> alert('账号已经存在')</script>";

    }


    elseif ($password != $password1) {
        echo "<script> alert('两次密码不一样，无法注册，请重新输入')</script>";

    }


    else{

         $usergroupid=0;
        $sql = "insert into USER (username,password,email,mobile,usergroupid)VALUES('$username','$password','$email','$mobile','$usergroupid')";
        $db->query($sql);

        echo "<script> alert('恭喜你，注册成功'); </script>";
        header("Location:register_finish.php");
       // header("refresh:3;url=Login.php");

        //成功插入  $sql="insert into USER (username,password)VALUES('$username','$password') ";
        // 成功执行 $db->query($sql)or die('hhh');
    }
}

?>
