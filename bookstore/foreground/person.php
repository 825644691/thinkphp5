<?php
require("conn1.php");
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">

    <title>个人信息</title>
    <link href="css1/bootstrap.min.css" rel="stylesheet">

	<link href="css/order.css" rel="stylesheet">
</head>

<body>
	<header id="header">
		<div class="header-middle">
			<div class="container">
				<div class="row">
					<div class="col-sm-4">
						<div class="logo pull-left">
							<a href="index.php"><img src="images/logo.jpg" alt="" /></a>
						</div>
					</div>
					<div class="col-sm-8">
						<div class="shop-menu pull-right">
							<ul class="nav navbar-nav">
								<li><a href="">免费注册</a></li>
								<li><a href=""><i class="fa fa-user"></i> 个人中心</a></li>
								<li><a href=""><i class="fa fa-star"></i> 收藏</a></li>
                                <li><a href="gwc2.php"><i class="fa fa-shopping-cart"></i> 购物车</a></li>
								<li><a href="Login1.php"><i class="fa fa-lock"></i> 登陆</a></li>
                                <li><a href="Logoout.php"><i class="fa fa-crosshairs"></i> 注销</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>	
	
		<div class="header-bottom">
			<div class="container">
				<div class="row">
					<div class="col-sm-8">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						<div class="mainmenu pull-left">
							<ul class="nav navbar-nav collapse navbar-collapse">
								<li><a href="index.php">首页</a></li>
                                <li><a href="#">商品详情</a></li>
                                <li><a href="#">商品</a></li>
                                <li><a href="#" >小编推荐</a></li>
                                <li><a href="#" >实时热卖</a></li>
                                <li><a href="#">查看</a></li>
								<li><a href="#">联系</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-4">	
					</div>
				</div>
			</div>
		</div>
	</header>

	<div class="container">
			<div class="row">
				<div class="col-lg-2">
					<a href="person.php"><h3><button>信息修改</button></h3></a>
					<a href="order.php"><h3><button>订单查询</button></h3></a>
				</div>
				<div class="col-lg-1">
					<img src="images/g.png"  style="width: 40px;height: 40px"/>
				</div>
				<div class="col-lg-3 col-lg-offset-1">
                    <?php
                    session_start();
                    $a=$_SESSION["username"] ?>
					<h3>用户名：<?=$a ?></h3><br />
					<div class="form-group">
							<form action="#" method="post">
								<p><input type="password" class="form-control input-lg" placeholder="密码" name="password"/></p><br />
                                <p><input type="password" class="form-control input-lg" placeholder="确定密码" name="password1"/></p><br />
                                <p><input type="text" class="form-control input-lg" placeholder="邮箱" name="email"/></p><br />
                                <p><input type="text" class="form-control input-lg" placeholder="手机号码" name="mobile"/></p><br />
								<button type="submit" class="btn btn-success" name="submit">保存修改</button>
							</form>
					</div>
				</div>
				
			</div>
		</div>
	
	<footer id="footer"><!--Footer-->
		<div class="footer-widget">
			<div class="container">
				<div class="row">
					<div class="col-sm-2">
						<div class="single-widget">
							<h3><i class="fa fa-thumbs-o-up"></i> 服务</h3>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="">网上帮助p</a></li>
								<li><a href="">联系我们</a></li>
								<li><a href="">订单状态</a></li>
								<li><a href="">换地点</a></li>
								<li><a href="">常见问题解答</a></li>
							</ul>
						</div>
					</div>
                    <div class="col-sm-2">
                        <div class="single-widget">
                            <h3><i class="fa fa-jpy"></i> 支付方式</h3>
                            <ul class="nav nav-pills nav-stacked">
                                <li><a href="">货到付款</a></li>
                                <li><a href="">网上支付</a></li>
                                <li><a href="">礼品卡支付</a></li>
                                <li><a href="">银行支付</a></li>
                                <li><a href="">他人代付</a></li>
                            </ul>
                        </div>
                    </div>
					<div class="col-sm-2">
						<div class="single-widget">
							<h3><i class="fa fa-align-center"></i> 政策</h3>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="">使用条款</a></li>
								<li><a href="">隐私政策</a></li>
								<li><a href="">退款政策</a></li>
								<li><a href="">计费系统</a></li>
								<li><a href="">服务系统</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							<h3><i class="fa fa-user"></i> 关于购物者</h3>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="">公司信息</a></li>
								<li><a href="">招聘</a></li>
								<li><a href="">商店地址</a></li>
								<li><a href="">公司计划</a></li>
								<li><a href="">版权</a></li>
							</ul>
						</div>
					</div>
                    <div class="col-sm-3 col-sm-offset-1">
                        <div class="single-widget">
                            <h1>扫一扫，有惊喜</h1>
                            <form action="#" class="searchform">
                                <img src="images/footer.jpg" align="center">
                            </form>
                        </div>
                    </div>
				</div>
			</div>
		</div>
		
		<div class="footer-bottom">
			<div class="container">
				<div class="row">
					<p class="pull-left">版权所有@2017 SANRENXING 保留所有权利.</p>
					<p class="pull-right">联系电话：100861126854</p>
				</div>
			</div>
		</div>
	</footer>

    <script src="js/jquery-3.2.1.min.js"></script>
	<script src="css1/bootstrap.min.js"></script>

</body>
</html>
<?php

error_reporting(0);

if(isset($_POST["submit"])) {

    $password = $_POST["password"];
    $password1 = $_POST["password1"];
    $email = $_POST["email"];
    $mobile = $_POST["mobile"];
    $a=$_SESSION["username"];



    if ($password == "" || $password1 == "") {
        echo "<script> alert('密码不能为空，请重新输入')</script>";

    }
    elseif(strlen($password) < 6){
        echo "<script> alert('帐号密码不能小于6位')</script>";}
    elseif ($password != $password1) {
        echo "<script> alert('两次密码不一样，无法修改密码，请重新输入')</script>";

    }


    else{

        $sql="update user set user.password='$password',user.email='$email',user.mobile='$mobile'WHERE user.username='$a'";

        $db->query($sql)or die('执行失败');

       // echo "<script> alert('恭喜你，修改成功'); </script>";
      //  header("refresh:3;url=Login1.php");

        //成功插入  $sql="insert into USER (username,password)VALUES('$username','$password') ";
        // 成功执行 $db->query($sql)or die('hhh');
    }
}

    ?>