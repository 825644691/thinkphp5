<?php
namespace Home\Model;
use Think\Model;
class UserModel extends Model {

    protected $tableName ='message';//表名，不带前缀
    protected $tablePrefix = 'tp_';  //前缀
    protected $trueTableName='tp_user';  //全部表名，带前缀
    protected $dbName ='thinkphp';//数据库名

    protected $connection=array(
        'DB_TYPE'               =>  'mysql',     // 数据库类型
        'DB_HOST'               =>  'localhost', // 服务器地址
        'DB_USER'               =>  'root',      // 用户名
        'DB_PWD'                =>  '',          // 密码
        'DB_PORT'               =>  '3306',        // 端口
        'DB_PREFIX'             =>  'tp_',    // 数据库表前缀
        'DB_CHARSET'            =>  'utf8',      // 数据库编码默认采用utf8
    );


}

?>