<?php
namespace Home\Controller;
use Think\Controller;
header('content-type:text/html;charset=utf-8');
class EmptyController extends Controller
{
public function index(){
    echo '控制器错误';
}
}