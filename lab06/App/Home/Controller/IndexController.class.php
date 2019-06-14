<?php
namespace Home\Controller;
use Home\Model\MessageModel;
use Home\Model\UserModel;
use Think\Controller;
use Think\Model;
class IndexController extends Controller {


    public function data(){
        $m=new MessageModel();
        $r=$m->select();
        var_dump($r);
    }
    public function homework1(){
        $m=new \Home\Model\MessageModel();
        $r=$m->select();
        $this->assign('list',$r);
        $this->display();
    }
    public function homework2(){
        $m=new Model('message','tp_','mysql://root:8256@localhost/mysql');
        $r=$m->select();
        $this->assign('list',$r);
        $this->display();
    }
    public function homework3(){
        $m=M('message');
        $r=$m->select();
        $this->assign('list',$r);
        $this->display();

    }
    public function homework4(){
        $m=D('message');
        $r=$m->select();
        $this->assign('list',$r);
        $this->display();
    }
    public function homework5(){
        $m=new Model();
        $r=$m->query('SELECT * FROM tp_message');
        $this->assign('list',$r);
        $this->display();
    }
    public function homework6(){
        $m=M('message');
        $c=$m->select(array('order'=>'title'));
        $r=$m->query('SELECT * FROM tp_message');
        $this->assign('list',$c);
        $this->display();
    }
}