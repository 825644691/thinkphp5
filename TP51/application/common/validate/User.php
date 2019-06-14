<?php
/**
 * Created by PhpStorm.
 * user: hp
 * Date: 2019/4/27
 * Time: 16:47
 */

namespace app\common\validate;
use think\Validate;

class User extends Validate{
    // 是否批量验证
    protected $batchValidate = true;
    protected  $rule=[
        'name|用户名'=>'require|length:5,20|chsAlphaNum',
        'email|邮箱'=>'require|email|unique:zh_user',
        'mobile|手机号 '=>'require|mobile|unique:zh_user',
        'password|密码'=>'require|length:6,20|alphaNum|confirm',
        'password_confirm|确认密码' =>'require|confirm:password'
        /*'name|姓名'=>[
            'require'=>'require',
            'length'=>'5,20',
            'chsAlphaNum'=>'chsAlphaNum',
        ],
        'email|邮箱'=>[
            'require'=>'require',
            'email'=>'email',
            'unique'=>'zh_user',
        ],
        'mobile|手机号'=>[
            'require'=>'require',
            'mobile'=>'mobile',
            'unique'=>'zh_user',
            'number'=>'number',
        ],
        'password|密码'=>[
         //   'require'=>'require',
            'length'=>'6,20',
            'alphaNum'=>'alphaNum',
          //  'confirm'=>'confirm',
        ],*/

    ];

}