<?php
namespace Home\Controller;
use Think\Controller;
use Think\Think;
class IndexController extends Controller {
    public function index(){
        $this->show('<style type="text/css">*{ padding: 0; margin: 0; } div{ padding: 4px 48px;} body{ background: #fff; font-family: "微软雅黑"; color: #333;font-size:24px} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.8em; font-size: 36px } a,a:hover{color:blue;}</style><div style="padding: 24px 48px;"> <h1>:)</h1><p>欢迎使用 <b>ThinkPHP</b>！</p><br/>版本 V{$Think.version}</div><script type="text/javascript" src="http://ad.topthink.com/Public/static/client.js"></script><thinkad id="ad_55e75dfae343f5a1"></thinkad><script type="text/javascript" src="http://tajs.qq.com/stats?sId=9347272" charset="UTF-8"></script>','utf-8');
    }
    public function homework(){
        $m=new \Home\Model\UserModel();
        $count=$m->count();
        $Page=new \Think\Page($count,2);
        $show=$Page->show();
        $r=$m->order('id')->limit($Page->firstRow.','.$Page->listRows)->select();

        $this->assign('list',$r);
        $this->assign('page',$show);
        $this->display();
    }
    public function edit() {
        $condition['id'] = $_GET['id'];
        $m = M('message');
        $result = $m->where($condition)->find();
        $this->assign('edit', $result);
        $this->display();
    }
    public function updateMessage() {
        $data = array(
            'title' => $_POST['updateTitle'],
            'content' => $_POST['updateContent'],
            'auther' => $_POST['updateAuthor'],
            'time' => date('d/m/Y H:m:s')
        );
        $m = M('message');
        $m->create($data);
        $result = $m->where('id=%d', $_POST['id'])->save($data);
        if($result) {
            redirect('homework');
        } else {
            $this->error('error', 'message');
        }
    }
    public function order(){
        $word = $_POST['word'];
        $queryText = $_POST['queryText'];
        $m=M('message');
        $count=$m->count();
        $Page=new \Think\Page($count,2);
        $show=$Page->show();
        $data[$word] = array('like',"%$queryText%");
        $msg = $m->where($data)->order($_POST['orderWay'])->limit($Page->firstRow.','.$Page->listRows)->select();

        $this->ajaxReturn($msg, 'JSON');

    }
    public function page(){
        $m=new \Home\Model\UserModel();
        $count=$m->count();
        $Page=new \Think\Page($count,2);
        $show=$Page->show();
    }
    public function del4(){
        $m=M('message');
        $c=$m->delete($_POST['id']);
        if($c){
            $arr=array(
                "info"=>"删除成功",
                "code"=>"200",
            );
        }else{
            $arr=array(
                "info"=>"删除失败",
                "code"=>"400",
            );
        }
        $this->ajaxReturn($arr);
    }
    public function addMessage() {
        $data = array(
            'title' => $_POST['addTitle'],
            'content' => $_POST['addContent'],
            'auther' => $_POST['addAuthor'],
            'time' => date('d/m/Y H:m:s')
        );
        $code=I('post.code');
        $verify=new \Think\Verify();
        $res=$verify->check($code);
        $m = M('message');
        $result = $m->data($data)->add();
        if($res&&$result) {
            redirect('homework');
        } else {
            $this->error('error', '__URL__/addMsg.html');
        }
    }
}