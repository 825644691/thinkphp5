<?php
namespace Home\Model;
use Think\Model;
class MessageModel extends Model{
    protected $tableName='message';
    protected $tablePrefix='tp_';
    protected $trueTableName='tp_message';
    protected $dbName='mysql';


    protected $connection=array(
        'DB_TYPE'               =>  'mysql',     // 数据库类型
        'DB_HOST'               =>  'localhost', // 服务器地址

        'DB_USER'               =>  'root',      // 用户名
        'DB_PWD'                =>  '8256',          // 密码
        'DB_PORT'               =>  '3306',        // 端口
        'DB_PREFIX'             =>  'tp_',    // 数据库表前缀
        'DB_CHARSET'           => 'utf8',
    );
}