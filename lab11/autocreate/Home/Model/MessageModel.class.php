<?php
namespace Home\Model;
use Think\Model;
class MessageModel extends Model {

    protected $tableName ='message';//表名，不带前缀
    protected $tablePrefix = 'tp_';  //前缀
    protected $trueTableName='tp_message';  //全部表名，带前缀
    protected $dbName ='mysql';//数据库名

    protected $connection=array(
        'DB_TYPE'               =>  'mysql',     // 数据库类型
        'DB_HOST'               =>  'localhost', // 服务器地址
        'DB_USER'               =>  'root',      // 用户名
        'DB_PWD'                =>  '8256',          // 密码
        'DB_PORT'               =>  '3306',        // 端口
        'DB_PREFIX'             =>  'tp_',    // 数据库表前缀
        'DB_CHARSET'            =>  'utf8',      // 数据库编码默认采用utf8
    );
    protected $_map=array(
        //表单    =>    字段
        'tl'=>'title',

    );

    //以下为自动完成的静态方式
    protected $_auto = array (
        // 对password字段在新增和编辑的时候使md5函数处理，只做样例，写在这里无意义
        array('password','md5',3,'function') ,
        array('auther','getName',1,'callback'), // 对name字段在新增的时候回调getName方法
        array('time','time',2,'function'), // 对time字段在更新的时候写入当前时间戳
    );

    protected function getName(){
        $name = I('session.username','无名氏');;
        return $name;
    }

    protected $_validate = array(
        array('content','require','留言内容必须有！'), //默认情况下用正则进行验证
     );

}

?>