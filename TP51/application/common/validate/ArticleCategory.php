<?php
/**
 * Created by PhpStorm.
 * user: hp
 * Date: 2019/4/29
 * Time: 9:46
 */

namespace app\common\validate;


use think\Validate;

class ArticleCategory extends Validate{
    protected  $rule=[
        'name|栏目名称'=>'require|length:3,20|chsAlpha',

    ];
}