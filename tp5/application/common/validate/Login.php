<?php

namespace app\common\validate;

use think\Validate;


class Login extends Validate
{
    protected $batchValidate = true;
    protected $rule = [
        'username|用户名' => 'require',
        'password|密码' => 'require',

    ];

}
