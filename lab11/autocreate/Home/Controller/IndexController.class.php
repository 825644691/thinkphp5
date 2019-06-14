<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
        $this->display();
    }
    public function verify(){
        ob_clean();
        $config = [
            'fontSize' => 15, // 验证码字体大小
            'length' => 4, // 验证码位数
            'imageH' => 0,  //验证码高度，0为自动
            'useNoise'    =>    false, // 关闭验证码杂点
        ];
        $Verify = new \Think\Verify($config);
        // 设置验证码字符为纯数字
        $Verify->codeSet = '0123456789';
        // 验证码字体使用 ThinkPHP/Library/Think/Verify/ttfs/5.ttf
        $Verify->fontttf = '5.ttf';
        // 开启验证码背景图片功能 随机使用 ThinkPHP/Library/Think/Verify/bgs 目录下面的图片
        $Verify->useImgBg = true;
        $Verify->entry();
    }

    //新增
    public function do_add(){

        //检测验证码
        $code=I('post.code');
        $verify = new \Think\Verify();
        $res = $verify->check($code);


        $rules = array (
            array('status','1'),  // 新增的时候把status字段设置为1

        );


        $validate = array(
            array('title','require','标题必须有！'), //默认情况下用正则进行验证
            array('content','require','内容必须有'),
            array('author','require','作者必须有'),
            array('title','0,30','标题长度不得超过30个字符',3,'length')

        );



        if(!$res){
            $this->error("验证码错误，不能增加留言",'data');
        }

        //静态自动完成之后，即可使用如下代码新增或编辑
        $m=D('message');// 实例化message对象
        if (!$m->validate($validate)->create()){ // 创建数据对象
            // 如果创建失败 表示验证没有通过 输出错误提示信息
            exit($m->getError());
        }else{
            // 验证通过 写入新增数据
            $count=$m->add();
        }
        //如果你没有定义任何自动验证规则的话，则不需要判断create方法的返回值：
        /*
        $m = D("User"); // 实例化User对象
        $m->create(); // 生成数据对象
        $count=$m->add(); // 新增用户数据
         */

        if($count){
            $this->success('增加成功');
        }
        else{
            $this->error('增加失败');
        }
    }
}