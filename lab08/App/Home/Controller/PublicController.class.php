<?php
namespace Home\Controller;
use Think\Think;
use Think\Controller;


class PublicController extends Controller {
    public function verify(){
        $config=[
            'fontSize' => 30,
            'length' => 6,
            'imageH' =>70,
            'useNoise' => false,
        ];
        $Verify = new \Think\Verify($config);
        $Verify->codeSet = '0123456789';

        $Verify->useImgBg = true;
        $Verify->entry();
    }
}