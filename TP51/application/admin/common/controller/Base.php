<?php
namespace app\admin\common\controller;

use think\Controller;
use think\facade\Session;

class Base extends  Controller{


    protected  function  initialize(){

    }
    protected  function  isLogin(){
        if(!Session::get('user_id')){
            $this->error('请先登录','url:admin/user/login');
        }
    }



}