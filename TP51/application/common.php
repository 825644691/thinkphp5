<?php
/*公共函数文件*/

use think\Db;

//根据用户主键id,查询用户名称
if(!function_exists('getUserName')){

    function getUserName($id){
        return Db::table('zh_user')->where('id',$id)->value('name');
    }
}
//过滤文章摘要
function getArtContent($content){
    return mb_substr(strip_tags($content),0,10).'...';
}

//根据用户主键id,查询用户名称
if(!function_exists('getCateName')){

    function getCateName($cateId){
        return Db::table('zh_article_category')->where('id',$cateId)->value('name');
    }
}
