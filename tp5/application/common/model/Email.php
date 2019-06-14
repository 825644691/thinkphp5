<?php
namespace app\common\model;

use think\Model;

class Email extends Model{
    protected $pk = "id";
    protected $table ="sendmsg";
    protected $createTime = "ctime";
//    protected $auto=[];//无论新增还是更新都要设置
//    protected $update=['ctime'];//仅更新有效

}