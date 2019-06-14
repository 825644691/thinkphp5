<?php
namespace app\common\model;

use think\Model;

class UserInfo extends Model{
    protected $pk = "id";
    protected $table ="userinfo";

    protected $createTime = "ctime";

}