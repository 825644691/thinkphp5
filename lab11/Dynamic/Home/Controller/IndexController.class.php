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

        //除了静态定义之外，我们也可以采用动态完成的方式来解决不同的处理规则。
        $rules = array (
            array('status','1'),  // 新增的时候把status字段设置为1
            array('password','md5',3,'function') , // 对password字段在新增和编辑的时候使md5函数处理
        );

        /*
         *  如果采用动态验证的方式，就比较灵活，可以根据不同的需要，
         * 在操作同一个模型的时候使用不同的验证规则，例如上面的静态验证方式可以改为：
         * */

        $validate = array(
            array('username','require','用户名必须有！'), //默认情况下用正则进行验证
            array('password','require','密码必须有'),
            array('username','','帐号名称已经存在！',0,'unique',1), // 在新增的时候验证name字段是否唯一
            array('repassword','password','确认密码不正确',0,'confirm'), // 验证确认密码是否和密码一致
            array('password','checkPwd','密码格式不正确',0,'function'), // 自定义函数验证密码格式
        );

        $User = M('User');
        if (!$User->validate($validate)->auto($rules)->create()){ // 创建数据对象
            // 如果创建失败 表示验证没有通过 输出错误提示信息
            exit($User->getError());
        }else{
            // 验证通过 写入新增数据
            $count=$User->add();
        }

        if($count){
            $this->success('增加成功');
        }
        else{
            $this->error('增加失败');
        }
    }
}