<?php
/**
 * Created by PhpStorm.
 * user: hp
 * Date: 2019/4/27
 * Time: 16:45
 */

namespace app\common\model;
use think\Model;

class User extends  Model{
    protected $pk='id'; //默认主键
    protected $table='zh_user';//绑定的数据表
    protected $autoWriteTimestamp=true;//开启自动时间戳
    protected $createTime='create_time';
    protected $updateTime='update_time';
    protected $dateFormat='Y年/m月/d日';


  /*  //获取器
    public  function getStatusAttr($value){
        $status=['0'=>'未激活','1'=>'激活'];
        return $status[$value];
    }*/
    public  function getIsAdminAttr($value){
        $status=['0'=>'会员','1'=>'超级管理员'];
        return $status[$value];
    }

    //修改器
    public  function setPasswordAttr($value){
        return sha1($value);
    }

}