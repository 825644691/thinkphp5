<?php
return array(
    /* 数据库设置 */
    'DB_TYPE'               =>  'mysql',     // 数据库类型
    'DB_HOST'               =>  'localhost', // 服务器地址
    'DB_NAME'               =>  'thinkphp',          // 数据库名
    'DB_USER'               =>  'root',      // 用户名
    'DB_PWD'                =>  'qq369520',          // 密码
    'DB_PORT'               =>  '3306',        // 端口
    'DB_PREFIX'             =>  'tp_',    // 数据库表前缀
    'DB_CHARSET'            =>  'utf8',      // 数据库编码默认采用utf8

    'SHOW_PAGE_TRACE'       =>true,         //显示页面TRACE信息


    'URL_ROUTER_ON'   => true,              //启动路由

    'URL_ROUTE_RULES'=>array(
        'jw/jw' => 'Home/index/index',
     ),









);