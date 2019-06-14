<?php
/**
 * Created by PhpStorm.
 * user: hp
 * Date: 2019/5/12
 * Time: 21:42
 */

namespace app\admin\controller;
use app\admin\common\controller\Base;
use app\common\model\User as UserModel;
use think\facade\Request;
use think\facade\Session;


class User extends  Base
{
    public function  login()
    {
        $this->assign('title', '管理员登录');
        return $this->fetch();
    }

    public function  checkLogin()
    {
        $data = Request::param();
        $map[] = ['email', '=', $data['email']];
        $map[] = ['password', '=', sha1($data['password'])];
        $res = UserModel::where($map)->find();
        if ($res) {
            Session::set('user_id', $res['id']);
            Session::set('user_name', $res['name']);
            Session::set('admin_level', $res['is_admin']);
            $this->success('登录成功', 'admin/user/userList');


        } else {
            $this->error('登录失败', 'admin/user/login');
        }
    }

    public function logout()
    {
        Session::clear();
        $this->success('注销成功', 'admin/user/login');
    }

    //用户列表
    public function userList()
    {
        $data['user_id'] = Session::get('user_id');
        $data['admin_level'] = Session::get('admin_level');

        if ( $data['admin_level']=="超级管理员") {
            $userList = UserModel::select();
        }else{
            $userList = UserModel::where('id', $data['user_id'])->select();
        }
        $this->assign('title', '用户列表');
        $this->assign('empty', '<span style="color: #ff5159">没有任何数据</span>');
        $this->assign('userList', $userList);
        return $this->fetch('userList');
    }
    //用户标记
    public  function  userEdit(){
        $userId=Request::param('id');
        $userInfo=UserModel::where('id',$userId)->find();
        $this->assign('title','编辑用户信息');
        $this->assign('userInfo',$userInfo);
        return $this->fetch('useredit');
    }
    //处理用户修改个人信息
    public function  doEdit(){
        $data=Request::param();
        $id=$data['id'];
        $data['password']=sha1( $data['password']);
        unset($data['id']);
        $res=UserModel::where('id',$id)->data($data)->update();
        if($res){
            $this->success('修改成功','userList');
        }
        $this->error('没有更新或更新失败');

    }
    //删除用户
    public function del(){
        $id=Request::param('id');
        $res=UserModel::where('id',$id)->delete();
        if($res){
            $this->success('删除成功','userList');
        }
        $this->error('没有删除或删除失败');

    }
    public  function  test()
    {

        return 1;
    }
    public function aa(){

       return $this->fetch('user/test');
    }


}