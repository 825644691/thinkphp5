<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index()
    {
        $this->display();
    }
    public  function  upload(){



        $upload=new \Think\Upload();
        $upload->maxSize   =     3145728 ;// 设置附件上传大小
        $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
        $upload->savePath  =      './Uploads/'; // 设置附件上传目录
        $upload->saveName = array('uniqid','');
        $upload->autoSub  = true;
        $upload->subName  = array('date','Ymd');


        $info   =   $upload->upload();



        if(!$info) {
            $this->error($upload->getError());
        }else{
            foreach($info as $file){
                $model = M('upload');
                $data['name']=$file['savename'];
                $data['path']=$file['savepath'];
                $data['time']=NOW_TIME;
                $model->add($data);
            }
        }

    }


}