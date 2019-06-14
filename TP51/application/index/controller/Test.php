<?php
/**
 * 测试专用
 */

namespace app\index\controller;
use app\common\model\User;
use think\Controller;
use phpmailer\phpmailer;
use think\Db;

class Test extends Controller
{
    //测试whereor
    public function  select(){
        $map1 = [
            ['content', 'like', '这%'],
            ['title', 'like', '%mysql'],
        ];
        $map2 = [
            ['content', 'like', '支付宝支付'],
            ['title', 'like', 'qqq'],
        ];

        $reuslt = Db::table('zh_article')->whereOr([$map1,$map2])->select();
        var_dump($reuslt);

    }

    public  function  email()
    {
        $toemail = '893895297@qq.com'; //定义收件人邮箱;
        $mail = new PHPMailer();
        $mail->isSMTP();    //使用SMTP服务
        $mail->CharSet = 'utf8';
        $mail->Host = 'smtp.163.com'; //发送方的SMTP服务器地址
        $mail->SMTPAuth =true ;//是否使用身份验证
        $mail->Username = 'hjw1799@163.com'; //发送方油箱
        $mail->Password = 'qq123456'; //发送方授权密码
        $mail->SMTPSecure = "ssl";
        $mail->Port = 994;
        $mail->setFrom("hjw1799@163.com","黄胖虎");// 设置发件人信息，如邮件格式说明中的发件人，这里会显示为Mailer(xxxx@163.com），Mailer是当做名字显示
        $mail->addAddress($toemail,'Wang');// 设置收件人信息，如邮件格式说明中的收件人，这里会显示为Liang(yyyy@163.com)
        $mail->addReplyTo("xxx@163.com","Reply");// 设置回复人信息，指的是收件人收到邮件后，如果要回复，回复邮件将发送到的邮箱地址
        //$mail->addCC("xxx@163.com");// 设置邮件抄送人，可以只写地址，上述的设置也可以只写地址(这个人也能收到邮件)
        //$mail->addBCC("xxx@163.com");// 设置秘密抄送人(这个人也能收到邮件)
        //$mail->addAttachment("bug0.jpg");// 添加附件


        $mail->Subject = "这是爸爸我从程序发来的";// 邮件标题
        $mail->Body = "你要每天快乐,也要每天想我";// 邮件正文
        //$mail->AltBody = "This is the plain text纯文本";// 这个是设置纯文本方式显示的正文内容，如果不支持Html方式，就会用到这个，基本无用

        if(!$mail->send()){// 发送邮件
            echo "Message could not be sent.";
            echo "Mailer Error: ".$mail->ErrorInfo;// 输出错误信息
        }else{
            echo '发送成功';
        }
    }

    public function  test1()
    {
        return $this->fetch();
    }



}