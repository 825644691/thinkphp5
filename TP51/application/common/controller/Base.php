<?php
/**
 * 基础控制器
 * 必须继承think\Controller.php
 */

namespace app\common\controller;
use app\common\model\ArticleCategory;
use think\Controller;
use think\facade\Session;
class Base extends  Controller{

    /**
     * 初始化方法
     * 创建常理,公共方法
     * 在所有的方法之前被调用
     */
    public function initialize()
    {
        $this->showNav();
    }
    //防止重复登录
    protected  function logined(){
        if(Session::has('user_id')){
            $this->error('你已经登录,请勿重复','url:index/index');
        }
    }
    //检查是否登录
     protected  function  isLogin(){
        if(!Session::has('user_id')){
            $this->error('请先登录','url:user/login');
        }
    }
    //显示导航
    public function  showNav(){
        $cateList=ArticleCategory::where('status',1)->order('sort','asc')->all();
        $this->assign('cateList',$cateList);
    }



}