<?php
/**
 * Created by PhpStorm.
 * user: hp
 * Date: 2019/5/12
 * Time: 21:09
 */

namespace app\admin\controller;
use app\admin\common\controller\Base;

class Index extends  Base{
    public  function  index(){
        $this->isLogin();
        return $this->redirect('user/userList');
    }


}
