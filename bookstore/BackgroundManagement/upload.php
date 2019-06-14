<meta charset="utf-8"/>
<?php
session_start();
header("content-type:text/html;charset=utf-8");
require_once "del_dir.php";
/*版本五：
1.使用$_FILES超全局变量获取上传文件信息（前提是已经提交了表单）
2.过滤上传文件的错误号
3.判断文件大小
4.过滤上传文件的类型
5.为上传后的文件名定义(随机获取一个文件名)
6.保存上传的文件到指定目录*/
//1.使用$_FILES超全局变量获取上传文件信息（前提是已经提交了表单）
if( isset($_POST['button']) ) {
    include('conn.php');
    $filename = $_FILES['myFile']['name'];
    $_SESSION['file_name'] = $filename;
    echo "<script>alert('".$_SESSION['file_name']."')</script>";
    $type = $_FILES['myFile']['type'];
    $tmp_name = $_FILES['myFile']['tmp_name'];
    $size = $_FILES['myFile']['size'];
    $error = $_FILES['myFile']['error'];




    $sql = "insert into book (book_id,book_title,author,publish_id,introduction,type,total,price,pic)
          values('".$_POST['book_id']."','".$_POST['book_title']."','".$_POST['author']."','".$_POST['publish_id']."','".$_POST['introduction']."','".$_POST['type']."','".$_POST['total']."','".$_POST['price']."','$filename')";
    $arr=mysql_query($sql,$conn);
    if ($arr){
        echo "<script language=javascript>alert('添加成功！');window.location='book_admin2.php'</script>";
    }
    else{
        echo "<script>alert('添加失败');history.go(-1);</script>";
    }


//2.过滤上传文件的错误号
    if ($error > 0) {
        switch ($error) {//获取错误信息
            case 1:
                $info =
                    "上传得文件超过了 php.ini中upload_max_filesize 选项中的最大值.";
                break;
            case 2:
                $info = "上传文件大小超过了html中MAX_FILE_SIZE 选项中的最大值.";
                break;
            case 3:
                $info = "文件只有部分被上传";
                break;
            case 4:
                $info = "没有文件被上传.";
                break;
            case 6:
                $info = "找不到临时文件夹.";
                break;
            case 7:
                $info = "文件写入失败！";
                break;
        }
        die("上传文件错误,原因:" . $info);
    }

//3.过滤上传文件的类型
    $typelist = array("image/jpeg",
        "image/jpg", "image/png");//定义允许的类型
    if (!in_array($type, $typelist)) {
       die("上传文件类型非法!" . $type);
       exit;
    }

//4.本次上传文件大小的过滤（自己选择）
    if ($size > 5120*1024) {
        die("上传文件大小超出5M");
        exit;
    }

//5.保存上传的文件到指定目录
//  ../upload/ 上一级目录
//   ./upload/  和 "upload/" 当前目录

    $path = "../foreground/images/book";//定义一个上传后的目录

    if (!(file_exists($path))) {
        if (!mkdir($path, 0777))    //在当前目录中创建path目录
            echo "创建文件夹失败";
    }

    //重命名文件
//    $date=date('Ymdhis');//得到当前时间,如;2007070516314
//    $filename=$date.".".pathinfo($filename)['extension'];//得到一个新的文件为'20070705163148.jpg',即新的路径

    $path .= "/" . $filename;
    if (is_uploaded_file($tmp_name)) {//判断是否是一个上传的文件
        if (move_uploaded_file($tmp_name,$path)) {//执行文件上传(移动上传文件)
            echo "文件上传成功!";
            echo "<p>上传的图片文件：<img src='" . $path . "'/></p>";
            echo $path;

        } else {
            die("上传文件失败！");
        }
    } else {
        die("不是一个上传文件!");
    }

}
elseif( isset($_POST['save_only']) ) {
    $filename = $_FILES['myFile']['name'];
    $type = $_FILES['myFile']['type'];
    $tmp_name = $_FILES['myFile']['tmp_name'];
    $size = $_FILES['myFile']['size'];
    $error = $_FILES['myFile']['error'];

//2.过滤上传文件的错误号
    if ($error > 0) {
        switch ($error) {//获取错误信息
            case 1:
                $info = "上传得文件超过了 php.ini中upload_max_filesize 选项中的最大值.";
                break;
            case 2:
                $info = "上传文件大小超过了html中MAX_FILE_SIZE 选项中的最大值.";
                break;
            case 3:
                $info = "文件只有部分被上传";
                break;
            case 4:
                $info = "没有文件被上传.";
                break;
            case 6:
                $info = "找不到临时文件夹.";
                break;
            case 7:
                $info = "文件写入失败！";
                break;
        }
        die("上传文件错误,原因:" . $info);
    }

//3.过滤上传文件的类型
    $typelist = array("image/jpeg", "image/jpg", "image/png");//定义允许的类型
    if (!in_array($type, $typelist)) {
        die("上传文件类型非法!" . $type);
        exit;
    }

//4.本次上传文件大小的过滤（自己选择）
    if ($size > 5120*1014) {
        die("上传文件大小超出5M");
        exit;
    }

//5.保存上传的文件到指定目录
//  ../upload/ 上一级目录
//   ./upload/  和 "upload/" 当前目录

    $path = "upload";//定义一个上传后的目录

    if ((file_exists($path))) {
        delDir($path);}

        if (!mkdir($path, 0777))    //在当前目录中创建path目录
            echo "创建文件夹失败";

    //重命名文件
    $date=date('Ymdhis');//得到当前时间,如;2007070516314
    $filename=$date.".".pathinfo($filename)['extension'];//得到一个新的文件为'20070705163148.jpg',即新的路径

    $path .= "/" . $filename;
    if (is_uploaded_file($tmp_name)) {//判断是否是一个上传的文件
        if (move_uploaded_file($tmp_name,$path)) {//执行文件上传(移动上传文件)
            echo "文件上传成功!";
            echo "<p>上传的图片文件：<img src='" . $path . "'/></p>";
            echo $path;

        } else {
            die("上传文件失败！");
        }
    } else {
        die("不是一个上传文件!");
    }

}
else
    echo "错误页面";
?>


