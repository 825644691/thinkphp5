<?php
namespace app\common\validate;

use think\Validate;
use app\common\model\Email;

class User extends Validate{
    protected $batchValidate = true;
    protected $rule=[
        'username|用户名'=>'require|unique:userinfo',
        'email|邮箱'=>'require|email|unique:userinfo',
        'password|密码'=>'require',

    ];

}

