<?php
namespace Home\Controller;
use Think\Controller;
header('content-type:text/html;charset=utf-8');
class IndexController extends Controller
{
    public function index()
    {
        echo '1640129240梁晓礼';
    }
    public function _empty(){
        echo '方法名错误';
        $this->redirect('index',array(),5,'页面专条中');
    }
    #public function _initialize(){
    #    if(isset($_SESSION['username'])!='1640129240'){
    #        $this->redirect('Login/login');
    #    }
    #}
    public function data()
    {
        $user = M('message');
        $data = $user->select();
        $this->assign('list', $data);
        $this->display();
    }
    public function destroy(){
        if($_SESSION['username']!=0) {
            $_SESSION . session_destroy();
            $this->error('注销成功', 'data', 3);
        }else{
            $this->error('注销失败，目前没登陆', 'data', 3);
        }
    }
    public function _before_del(){
        if($_SESSION['username']!='1640129240'){

            $this->redirect('Login/login');

        }


    }
    public function del()
    {


        $m = M('message');
        $c = $m->delete($_GET['id']);




    }
    public function del2(){
        $m=M('message');
        $c=$m->delete($_POST['id']);
        if($c){
            echo '1';
        }else{
            echo '0';
        }

    }
    public function  del3(){
        $m=M('message');
        $c=$m->delete($_POST['id']);
        if($c){
            $arr=array(
                "info"=>"删除成功",
                "code"=>"200",
            );
        }else{
            $arr=array(
                "info"=>"删除失败",
                "code"=>"400",
            );
        }
        echo json_encode($arr);
    }
    public function del4(){
        $m=M('message');
        $c=$m->delete($_POST['id']);
        if($c){
            $arr=array(
              "info"=>"删除成功",
                "code"=>"200",
            );
        }else{
            $arr=array(
                "info"=>"删除失败",
                "code"=>"400",
            );
        }
        $this->ajaxReturn($arr);
    }
}