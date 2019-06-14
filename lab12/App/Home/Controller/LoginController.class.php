<?php
namespace Home\Controller;
use Think\Controller;
header('content-type:text/html;charset=utf-8');
class LoginController extends Controller
{
    public function log(){
        $user['username']=$_POST['username'];
        $user['password']=$_POST['password'];
        $code=I('post.code');
        $m=M(user);
        $verify=new \Think\Verify();
        $res=$verify->check($code);
        $msg=$m->where($user)->find();
        if(($user['username']==$msg['username'])&&($user['password']==$msg['password'])){
            if($res){
                $_SESSION['username']=$msg['username'];
                $this->redirect('Index/index');
            }else{
                $this->error('用户名或者密码错误', 'login.html');
            }


        }
        else{
            echo '失败';
        }
    }

    public function login(){
        $this->display();
    }
    public function register(){
        $this->display();
    }
    public function reg(){
        $validate = array(
            array('username','require','用户名不能为空'), //默认情况下用正则进行验证
            array('password','require','密码不能为空'),
            array('username','0,10','用户名不能超过10个字符','3','length'),
            array('password','0,10','密码不能超过10个字符',3,'length')

        );
        $n['username']=$_POST['username'];
        $data = array(
         'username' =>$_POST['username'],
         'password' =>$_POST['password']
     );
        $code=I('post.code');
        $verify=new \Think\Verify();
        $res=$verify->check($code);
        $m=M(user);
        $re=$m->validate($validate)->create();
        $msg=$m->where($n)->count();

        if($res&&$re){
            if($msg==0){
               $result = $m->data($data)->add();
                if($result){
                    $this->redirect('login');
                }else{
                    $this->error('error', 'register.html');
                }

            }else{
                $this->error('用户名已经存在', 'register.html');
            }
        }else{
            $this->error($m->getError(), 'register.html');

        }

    }


}