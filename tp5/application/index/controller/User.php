<?php
namespace app\index\controller;



use app\common\model\UserInfo;
use app\common\model\Email;
use think\Controller;
use think\Db;
use think\facade\Validate;
use think\facade\Request;
use PHPMailer\PHPMailer;
use PHPMailer\Exception;
use PHPMailer\SMTP;
use think\Loader;
use think\facade\Session;


class User extends Controller {
    public function sendmsg(){
        $nowtime=date("Y-m-d H:i:s");

        $limit_date = date('Y-m-d H:i:s',strtotime("$nowtime-1 hour"));
        if(Request::isAjax()){
            $data = Request::post();
            $rule = 'app\common\validate\Email';
            $res = $this->validate($data, $rule);
            $code = $this->random_code();
            if(true !== $res){
                return ['status' => false,'message'=>$res];
            }else{
                 $has_email = UserInfo::where('email', $data["email"])->find();
                 if($has_email != null){
                     return ["status" => false,'message'=>"邮箱已经存在"];
                 }else{
                     $result = Email::where('email', $data['email'])->find();
                     if($result == null){
                         Email::create(['email'=>$data['email'],'code' => $code,'time' => 1]);
                         return ["status"=>true];
                     }else{
                         $times_over = Email::where("email", $data["email"])
                                             ->where("ctime", '> time', $limit_date)
                                             ->where("time", ">", 5)->find();
                         if($times_over != null){
                             return ["status"=>false, "message"=>"一小时后重试"];
                         }else{
                             $over_hour = Email::where("email", $data["email"])
                                              ->where("ctime", "< time", $limit_date)->find();
                             if($over_hour != null){
                                 Email::where("email", $data["email"])->delete();
                                 Email::create(['email'=>$data['email'],'code' => $code,'time' => 1]);
                             }else{
                                 Email::where("email", $data["email"])->data(["code"=>$code])->setInc("time");
                             }

                             $this->send_code_to_email($data['email'],$code);
                             return ["status" => true];


                         }
                     }
                 }
            }
        }else{
            return 3;
        }


    }
    public function send_code_to_email($email,$code){
        $toemail=$email;//定义收件人的邮箱
        $sendmail = '825644691@qq.com'; //发件人邮箱
        $sendmailpswd = "ywpiwtukjsvjbejh"; //客户端授权密码,而不是邮箱的登录密码，就是手机发送短信之后弹出来的一长串的密码
        $send_name = '王小明';// 设置发件人信息，如邮件格式说明中的发件人，
        $to_name = '陈大红';//设置收件人信息，如邮件格式说明中的收件人
        $mail = new PHPMailer();
        $mail->isSMTP();// 使用SMTP服务
        $mail->CharSet = "utf8";// 编码格式为utf8，不设置编码的话，中文会出现乱码
        $mail->Host = "SMTP.qq.com";// 发送方的SMTP服务器地址
        $mail->SMTPAuth = true;// 是否使用身份验证
        $mail->Username = $sendmail;//// 发送方的
        $mail->Password = $sendmailpswd;//客户端授权密码,而不是邮箱的登录密码！
        $mail->SMTPSecure = "ssl";// 使用ssl协议方式
        $mail->Port = 465;//  sina端口110或25） //qq  465 587
        $mail->setFrom($sendmail, $send_name);// 设置发件人信息，如邮件格式说明中的发件人，
        $mail->addAddress($toemail, $to_name);// 设置收件人信息，如邮件格式说明中的收件人，
        $mail->addReplyTo($sendmail, $send_name);// 设置回复人信息，指的是收件人收到邮件后，如果要回复，回复邮件将发送到的邮箱地址
        $mail->Subject = "抽屉注册";// 邮件标题
        //$code=$code;
        // session("code",$code);
        //return $code."----".session("code");
        $mail->Body = "$code, 记得回复我哟！么么哒...";// 邮件正文
        //$mail->AltBody = "This is the plain text纯文本";// 这个是设置纯文本方式显示的正文内容，如果不支持Html方式，就会用到这个，基本无用
        $mail->send();

    }
    public function random_code(){
        $arr = array_merge(range('a', 'z'), range('A', 'Z'), range('0', '9'));
        shuffle($arr);
        $arr = array_flip($arr);
        $arr = array_rand($arr, 4);
        $res = '';
        foreach ($arr as $v) {
            $res .= $v;
        }
        return $res;
    }
    public function login(){
        if(Request::isAjax()){
            $data = Request::post();
            $validate = new \app\common\validate\Login;
            $result = $validate->batch()->check($data);
            if($result !== true){
                $error = $validate->getError();
                return ["status"=>false,"message"=>$error];
            }else{
                if(!captcha_check($data["check-code"])){
                    return ["status"=>false,"summary"=>"验证码错误"];
            }else{
                    $is_exist = UserInfo::where("username|email", $data["username"])->find();
                    if($is_exist == null){
                        return ["status" => false, "summary" => "用户名不存在"];
                    }else{
                        $result = UserInfo::where("username|email",$data["username"])->where("password", $data['password'])->find();
                        if($result != null){
                            Session::set("user_id", $result["id"]);
                            Session::set("username", $result["username"]);
                            Session::set("is_login", true);
                            return ["status" => true];
                        }else{
                            return ["status" => false,"summary" => "用户名或者密码错误"];
                        }
                    }

                }
            }

        }
    }
    public function logout(){
        Session::pull('is_login');

        return redirect("index/index");
    }
    public function edit(){
        if(Request::isAjax()){
            $data = Request::post();
            $img = $data["img"];
            $img = str_replace('data:image/png;base64,', '', $img);
            $img = str_replace(' ', '+', $img);
            $img = base64_decode($img);
            $success = file_put_contents("static/upload/".Session::get("username").".jpg", $img);
            $path = "/tp5/public/static/upload/".Session::get("username").'.jpg';
            UserInfo::where("username",Session::get("username"))->data(["secondname" => $data["secondname"],
                                                                                      "gender" => $data["gender"],
                                                                                      "img" => $path,
                                                                                      "signature"=>$data["signature"]
                                                                                        ])->update();
            return ["status"=>true];
            
        }
        $obj = UserInfo::where("username",Session::get("username"))->find();
        $this->assign("objjj",$obj);
        return $this->fetch();
    }
    public function register(){
         if(Request::isAjax()){
             $data = Request::post();

             $validate = new \app\common\validate\User;
             $result = $validate->batch()->check($data);

             if ($result !== true) {
                 $error = $validate->getError();
                 return ["status" => false,"message" => $error];

             }else{
                 $email_code = Email::where("email",$data["email"])->value("code");

                 if($email_code == $data["email-code"]){
                     UserInfo::create(["username"=>$data["username"],"email"=>$data["email"],"password"=>$data["password"]]);
                     return ["status"=>true];
                 }else{
                     return ["status"=>false,"summary"=>"错误"];
                 }

                 }



             }


         }


}