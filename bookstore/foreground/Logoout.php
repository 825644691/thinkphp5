<?php
/**
 * Created by PhpStorm.
 * User: hp
 * Date: 2017/12/6
 * Time: 14:34
 */

header('Content-type:text/html;charset=utf-8');

    session_start();
    session_destroy();
   session_unset();
    header("location:index.php");

?>