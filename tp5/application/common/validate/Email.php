<?php
namespace app\common\validate;

use think\Validate;

class Email extends Validate{
    protected $rule=[
        'email|邮箱'=>'require|email',



    ];
}