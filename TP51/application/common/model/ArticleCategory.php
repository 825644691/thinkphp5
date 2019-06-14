<?php
/**
 * Created by PhpStorm.
 * user: hp
 * Date: 2019/4/27
 * Time: 16:45
 */

namespace app\common\model;
use think\Model;

class ArticleCategory extends  Model{
    protected $pk='id'; //默认主键
    protected $table='zh_article_category';//绑定的数据表
    protected $autoWriteTimestamp=true;//开启自动时间戳
    protected $createTime='create_time';
    protected $updateTime='update_time';
    protected $dateFormat='Y年/m月/d日';

    //开启自动完成
    protected $auto=[];    //无论更新和新增都要设置
    protected $insert=['create_time','status'=>1]; //新增时候有效
    protected  $update=['update_time'];//仅更新有效
}