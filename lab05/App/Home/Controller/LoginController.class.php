<?php
namespace Home\Controller;
use Think\Controller;
header('content-type:text/html;charset=utf-8');
class LoginController extends Controller
{
    public function log(){
        $user=I(username);
        $pwd=I(password);
        if(($user=='1640129240')&&($pwd=='123')){
            $_SESSION['username']='1640129240';
            $this->redirect('Index/data');

        }
        else{
            echo '失败';
        }
    }
    public function login(){
        $this->display();
    }


}