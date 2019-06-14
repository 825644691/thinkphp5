    <html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="css1/bootstrap.min.css"/>
    <link rel="stylesheet" type="text/css" href="css/electronic.css">

    <script type="text/javascript" src="js/jquery-3.2.1.js"></script>
    <script type="text/javascript" src="css1/bootstrap.min.js"></script>

</head>
<body>
<div class="top">
    <div id="top">
        <?php

        error_reporting(0);
        session_start();
        header("context-type:text/html;charset=utf-8");

        require("conn1.php");
        if(!empty($_SESSION["username"])){
            echo $_SESSION["username"]."欢迎你"."&nbsp&nbsp&nbsp&nbsp"."<a href='order.php'>进入个人中心</a>&nbsp&nbsp
            <a href='Logoout.php'> 注销</a>";
        }
        else{
            echo " <a href=Login1.php ><font color=black>你好，请登录 </a>&nbsp &nbsp &nbsp &nbsp
    <a href='register.php' ><font color='black'>注册</a>";
        }
        ?>
    </div>

</div>

<div class="search">
    <div class="gwc">
        <a href="gwc2.php"><img src="images/gwc.png" style="width: 40px;height: 40px" alt=""/></a>
    </div>
    <form  method="get" action="book_search.php">
        <div id="search" >

            <select name="sel" >
                <option value="book_title">书名</option>
                <option value="publish_name">出版社</option>
            </select>
            &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
            <input type="text" name="keyword"   placeholder="请输入关键字">


            <button class="btn btn-primary" type="button">搜索</button>
        </div>
    </form>

</div>
<div class="nav">
    <ul class="nav nav-tabs nav-justified">
        <li class="search"><a href="index.php">首页</a></li>
        <li class="search"><a href="electronic.php">电子书</a></li>
        <li class="search"><a href="">特色书店</a></li>
        <li class="search"><a href="ReadTool.php">阅读器</a></li>
        <li class="search"><a href="comment.php">社区</a></li>

    </ul>


</div>
<div>
    <div class="banner">
        <div class="img">
            <img src="images/2.png" style="width: 1100px;">


        </div>
    </div><!-- banner-->
    <div class="container">
        <div class="container1">
            <img src="images/electronic/5.jpg" style="width: 1100px;">
        </div><!--contain1-->
        <div class="container2">
            <?php
            error_reporting(0);
            require('conn.php');
            $keyword=trim($_GET['keyword']);
            $sel=$_GET['sel'];
            $sql="select * from book limit 4";
            $arr = $db->Query($sql);
            foreach ($arr as $v){
                    ?>
                    <div class="col-sm-7 col-md-3">
                        <div class="thumbnail">
                            <img src="images/book/<?php echo $v[6] ?>" alt="" style="width: 70px;height: 70px"/ >

                            <div class="caption">
                                <a href="" class="">
                                    <h5><?php echo $v[1] ?></h5>

                                    <h5><font color="#ff1493">$<?php echo $v[8] ?></font></h5>
                                </a>
                                <p>

                                    <a href='gwc7.php?book_id=<?php echo $v[0]?>' class="btn btn-xs btn-primary">购买</a>
                                    <a href='gwc1.php?book_id=<?php echo $v[0]?>' class="btn btn-xs btn-primary">购物车</a>
                                </p>

                            </div><!--caption-->
                        </div><!--thumbnail-->
                    </div>


                <?php
                }

            ?>


        </div><!--contain2-->


        <div class="container3">
            <img src="images/electronic/2.jpg" style="width: 1100px;">
        </div><!--contain3-->
        <div class="container4">
            <?php
            require('conn1.php');

            $sql1="select * from book order by book_id desc limit 4 ";
            $ar = $db->Query($sql1);
            foreach ($ar as $a){

                    ?>


                    <div class="col-sm-7 col-md-3">
                        <div class="thumbnail">
                            <img src="images/book/<?php echo $a[6] ?>" alt="" style="width: 70px;height: 70px"/ >

                            <div class="caption">
                                <a href="" class="">
                                    <h5><?php echo $a[1] ?></h5>

                                    <h5><font color="#ff1493">$<?php echo $a[8] ?></font></h5>
                                </a>
                                <p>
                                    <a href='gwc1.php?book_id=<?php echo $a[0]?>' class="btn btn-xs btn-primary">购买</a>
                                  <a href='gwc1.php?book_id=<?php echo $a[0]?>' class="btn btn-xs btn-primary">购物车</a>
                                </p>

                            </div><!--caption-->
                        </div><!--thumbnail-->
                    </div><!--thumbnail-->



                <?php
                }

            ?>

        </div><!--contain4-->

    </div><!--contain-->

</body>



</html>
<?php
class VeriCode{
    private $type;
    private $length;
    private $clear;

    private $code;

    public function __construct($type,$length=10,$clear=true){
        $this->type=$type;
        $this->length=$length;
        $this->clear=$clear;
    }

    public function setType($type){
        $this->type = $type;
    }

    public function generate(){
        $nums=range(0,9); // 数字数组
        $lower=range('a','z'); // 小写字母数组
        $upper=range('A','Z'); // 大写字母数组
        $ignore=array('0','o','O','1','l','I','9','q'); // 难辨认的字符数组

        $chars=array();
        if($this->type==1)
            $chars=$nums; // 只需要数字数组
        elseif($this->type==2)
            $chars=array_merge($nums,$lower); // 数字+小写字母
        elseif($this->type==3)
            $chars=array_merge($nums,$lower,$upper); // 数字+小写字母+大写字母
        if($this->clear)
            $chars=array_diff($chars,$ignore); // 排除难辨认字符

        shuffle($chars); // 打乱数组
        $keys=array_rand($chars,$this->length); // 随机取出length个字符，返回它们的key
        $code="";
        foreach($keys as $key)
            $code.=$chars[$key]; // 通过key可以去$chars中找到具体的值，并在循环中拼接起来

        $this->code=$code;
    }

    public function getCode(){
        return $this->code;
    }
}
?>
<?php
session_start();
$code = new VeriCode(1,10,false);
$code->generate();
$number=$code->getCode();
$_SESSION["number"]=$number;

?>
