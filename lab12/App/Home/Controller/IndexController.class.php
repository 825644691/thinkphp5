<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {

    public function message(){
        $m=new \Home\Model\UserModel();
        $count=$m->count();
        $Page=new \Think\Page($count,4);
        $show=$Page->show();
        $r=$m->order('id')->limit($Page->firstRow.','.$Page->listRows)->select();

        $this->assign('msg',$r);
        $this->assign('page',$show);
        $this->display();

    }
    public function person(){
        $user['username']=$_SESSION['username'];
        $s=M('order');
        $r=$s->where($user)->select();
        $this->assign('vo',$r);
        $this->display();
    }
    public function deleteMsg() {
        $m = M("order");
        $result = $m->delete($_POST['id']);
        if($result) {
            echo 1;
        } else {
            echo 0;
        }
    }
    public function index(){
        $m=new \Home\Model\UserModel();
        $count=$m->count();
        $Page=new \Think\Page($count,4);
        $show=$Page->show();
        $r=$m->order('id')->limit($Page->firstRow.','.$Page->listRows)->select();

        $this->assign('msg',$r);
        $this->assign('page',$show);
        $this->display();

    }
    public function gwc4(){
        session_start();
        $ids = $_GET["id"];
        $arr = $_SESSION["gwc"];
//var_dump($arr);
//取索引2（数量）
        foreach ($arr as $key=>$v)
        {
            if($v[0]==$ids)
            {
                if($v[1]>1){
                    //要删除的数据
                    $arr[$key][1]-=1;
                }
                else{
                    //数量为1的情况下，移除该数组
                    unset($arr[$key]);
                }
            }

        }

        $_SESSION["gwc"] = $arr;
//记得扔到session里面
        redirect('gwc2');
//删除完跳转回去
    }
    public function gwc2(){
        if(!empty($_SESSION["gwc"]))
        {
            $arr = array();
            $arr = $_SESSION["gwc"];
            //造数组
        }
        else{
            $this->empty1();
        }
        foreach ($arr as $v){
            $user['id']=$v[0];
            $m=new \Home\Model\UserModel();
            $s=M('order');
            $r=$m->where($user)->select();
            $msg=$m->where($user)->find();
            $data = array(
                'user'=>$_SESSION['username'],
                'book_name' => $msg['book_name'],
                'price' => $msg['price'],
                'author' => $msg['auther'],
                'image' => $msg['image'],
            );
            $result = $s->data($data)->add();

            $this->assign('vo',$r);
            $this->display();
        }

    }
    public function queryAndOrder() {
        $word = $_POST['word'];
        $queryText = $_POST['queryText'];
        $m = M('message');
        $data[$word] = array('like', "%$queryText%");
        $msg = $m->where($data)->order($_POST['orderWay'])->select();
        $this->ajaxReturn($msg, 'JSON');
    }

    public function _before_gwc1()
    {
        if ($_SESSION['username'] == null) {

            $this->redirect('Login/login');

        }
    }
    public function gwc5(){

        if(!empty($_SESSION["gwc"]))
        {
            $arr = array();
            $arr = $_SESSION["gwc"];
            //造数组
        }else{
            $this->empty1();
        }

        foreach ($arr as $v){
            $user['id']=$v[0];

            $m=new \Home\Model\UserModel();
            $r=$m->where($user)->select();

            $this->assign('vo',$r);
            $this->display();
        }

    }
    public function destroy(){

        unset($_SESSION['gwc']);
        $this->redirect('Index/index');

    }
    public function destroy1(){

        $_SESSION.session_destroy();
        $this->redirect('Index/message');

    }
    public function gwc3(){
        session_start();
//
        if(!empty($_SESSION["username"])) {
            $ids = $_GET["id"];
            if (empty($_SESSION["gwc"])) {
                //如果点击的购物车是空的（第一次添加）

                //如果购物车里是空的，造二维数组，
                $arr = array(
                    array($ids, 1)
                    //一维数组，取ids，第一次点击增加一个
                );
                $_SESSION["gwc"] = $arr;
                //扔到session里面
            } else //这里不是第一次点击
            {
                //先判断购物车里是否已经有了该商品，用$ids
                $arr = $_SESSION["gwc"];
                //把购物车的状态取出来

                $chuxian = false;
//定义一个变量；用来表示是否出现，默认是未出现
                foreach ($arr as $v) {
                    //便利他
                    //如果这里面有这件商品
                    if ($v[0] == $ids) //如果取过来的$v[0]（商品的代号）等于$ids那么就证明购物车中已经有了这一件商品
                    {
                        $chuxian = true;
                        //如果出现，直接把chuxian改成true

                    }
                }
                if ($chuxian) {
                    //购物车中有此商品
                    for ($i = 0; $i < count($arr); $i++) {
                        if ($arr[$i][0] == $ids) {
                            //把点到的商品编号加1
                            $arr[$i][1] += 1;
                        }
                    }
                    $_SESSION["gwc"] = $arr;

                } else {
                    //这里就只剩下：购物车里有东西，但是并没有这件商品
                    $asg = array($ids, 1);
                    //设一个小数组
                    $arr[] = $asg;
                    $_SESSION["gwc"] = $arr;
                }

            }
            $this->redirect('Index/index');

        }
        else{
            $this->redirect('Login/login');

        }
    }
    public function gwc1(){
        session_start();
//
        if(!empty($_SESSION["username"])) {
            $ids = $_GET["id"];
            if (empty($_SESSION["gwc"])) {
                //如果点击的购物车是空的（第一次添加）

                //如果购物车里是空的，造二维数组，
                $arr = array(
                    array($ids, 1)
                    //一维数组，取ids，第一次点击增加一个
                );
                $_SESSION["gwc"] = $arr;
                //扔到session里面
            } else //这里不是第一次点击
            {
                //先判断购物车里是否已经有了该商品，用$ids
                $arr = $_SESSION["gwc"];
                //把购物车的状态取出来

                $chuxian = false;
//定义一个变量；用来表示是否出现，默认是未出现
                foreach ($arr as $v) {
                    //便利他
                    //如果这里面有这件商品
                    if ($v[0] == $ids) //如果取过来的$v[0]（商品的代号）等于$ids那么就证明购物车中已经有了这一件商品
                    {
                        $chuxian = true;
                        //如果出现，直接把chuxian改成true

                    }
                }
                if ($chuxian) {
                    //购物车中有此商品
                    for ($i = 0; $i < count($arr); $i++) {
                        if ($arr[$i][0] == $ids) {
                            //把点到的商品编号加1
                            $arr[$i][1] += 1;
                        }
                    }
                    $_SESSION["gwc"] = $arr;

                } else {
                    //这里就只剩下：购物车里有东西，但是并没有这件商品
                    $asg = array($ids, 1);
                    //设一个小数组
                    $arr[] = $asg;
                    $_SESSION["gwc"] = $arr;
                }

            }
            $this->redirect('Index/gwc2');

        }
        else{
            $this->redirect('Login/login');

        }
    }
}