<?php
/**
 * Created by PhpStorm.
 * user: hp
 * Date: 2019/4/24
 * Time: 12:20
 */

namespace app\index\controller;

use app\common\controller\Base;
use app\common\model\User as UserModel;
use think\Db;
use think\facade\Request;
use think\facade\Session;
use phpmailer\phpmailer;

class User extends  Base{
    //注册
    public  function  register(){
        $this->assign('title','用户注册');
        return $this->fetch();
    }
    //处理用户提交的注册信息
    public  function  insert()
    {
        if (Request::isAjax())
        {
            //验证数据
            $data = Request::post();
           $validate = new \app\common\validate\User();
           $res = $validate->batch()->check($data);
            if (true !== $res)
            {
                $error = $validate->getError();
                return ['status' => false, 'message' => $error];
            }else
            {
                        $email = $data['email'];
                        $active_url = "http://localhost/TP51/public/index.php/index/user/activeEmail?ActiCode=" ;
                        $token = $this->makeToken();
                        $this->email($email,$active_url,$token);
                        $data['ActiCode'] = $token;
                        $data['token_exptime'] = date("Y-m-d H:i:s", time());//生成激活链接的时间
                    if ($user = UserModel::create($data)) {
                        $result = UserModel::get($user->id);
                        Session::set('user_id', $result->id);
                        Session::set('user_name', $result->name);
                        return ['status' => true];
                    } else {
                        $error = "注册失败";
                        return ['status' => false, 'message' => $error];
                    }
                }

             }
        else
        {
            $this->error('请求类型错误', 'index/Index/index');
            return 0;
        }
    }

    //发送邮件
    public  function  email($email,$active_url,$token)
    {
        $toemail = $email; //定义收件人邮箱;
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


        $mail->Subject = "测试";// 邮件标题
        $mail->Body = "
        恭喜您，注册成功！请点击链接激活您的帐户:" . "$active_url" . "$token" . "
    如果以上链接无法点击，请将它复制到你的浏览器地址栏中进入访问，该链接24小时内有效。
        ";// 邮件正文
        //$mail->AltBody = "This is the plain text纯文本";// 这个是设置纯文本方式显示的正文内容，如果不支持Html方式，就会用到这个，基本无用

        if(!$mail->send()){// 发送邮件
            echo "Message could not be sent.";
            echo "Mailer Error: ".$mail->ErrorInfo;// 输出错误信息
        }else{
            echo '发送成功';
        }
    }

    //生成邮件token
    public function makeToken()
    {
        $time = time();
        $num = rand(0,100);
        $token=md5($time.$num);
        return $token;
    }


    //邮箱激活处理
    public  function  activeEmail(){
        $actiCode = Request::param('ActiCode');
        if(!empty($actiCode))
        {
            $result = Db::table('zh_user')->where('ActiCode',$actiCode)->find();
            if($result){
                 $nowtime = date("Y-m-d H:i:s", time());
                 $token_exptime = Db::table('zh_user')->field('token_exptime')->where('ActiCode',$actiCode)->find();
                $time = strtotime($nowtime) - strtotime($token_exptime['token_exptime']);
                $day = floor($time/86400);
               // $t=$time%86400;
              //  $hours = floor($t/3600);
                if($day<=1&&$result['status']==0)
                {
                    Db::table('zh_user')->where('ActiCode',$actiCode)->data(['status'=>'1'])->update();
                }else
                {
                    echo "你已经激活或者激活时间过期";
                }

            }
        }

    }

    //用户登录
    public function  login(){
        $this->logined();
        return $this->fetch('login',['title'=>'用户登录']);

    }

    //用户登录验证与查询
    public function  loginCheck(){
        if (Request::isAjax()) {
            //验证数据
            $data=Request::post();
            //定义验证 规则
            $rule=[
                'email|邮箱'=>'require|email',
                'password|密码'=>'require|alphaNum',
            ];
            //开始验证
            $res=$this->validate($data,$rule);
            if(true!==$res){
                return ['status'=>-1,'message'=>$res];
            }else{
                $result=UserModel::where('email',$data['email'])->where('password',sha1($data['password']))->find();
                if (null==$result) {
                    return ['status' => 0, 'message' => "抱歉,邮箱或密码错误"];
                } else {
                    //将用户数据写进session
                    Session::set('user_id',$result->id);
                    Session::set('user_name',$result->name);
                    return ['status' => 1, 'message' => "恭喜你,登录成功"];
                }
            }
        } else {
            $this->error('请求类型错误', 'index/user/login');

        }
    }

    //用户退出登录
    public  function  logout(){
       // Session::delete('user_id');
        //Session::delete('user_name');
        Session::clear();
        $this->success('退出登录成功','url:index/index');
    }

}