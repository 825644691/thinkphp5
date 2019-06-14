<?php
namespace Home\Controller;
use Org\Util\Date;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
        $this->message();
    }
    //对留言表全查
    public function message() {
        $m = M('message');
        $msg = $m->select();
        $this->assign('msg', $msg);
        $this->display();
    }
    //查询并排序
    public function queryAndOrder() {
        $word = $_POST['word'];
        $queryText = $_POST['queryText'];
        $m = M('message');
        $data[$word] = array('like', "%$queryText%");
        $msg = $m->where($data)->order($_POST['orderWay'])->select();
        $this->ajaxReturn($msg, 'JSON');
    }
    //删除一条留言
    public function deteleMsg() {
        $m = M("message");
        $result = $m->delete($_POST['id']);
        if($result) {
            echo 1;
        } else {
            echo 0;
        }
    }
    //添加留言
    public function addMessage() {
        $data = array(
            'title' => $_POST['addTitle'],
            'content' => $_POST['addContent'],
            'author' => $_POST['addAuthor'],
            'time' => date('d/m/Y H:m:s')
        );
        $m = M('message');
        $result = $m->data($data)->add();
        if($result) {
            redirect('message');
        } else {
            $this->error('error', '__URL__/addMsg.html');
        }
    }
    //查询一条留言，用于修改
    public function edit() {
        $condition['id'] = $_GET['id'];
        $m = M('message');
        $result = $m->where($condition)->find();
        $this->assign('edit', $result);
        $this->display();
    }
    //修改单条留言
    public function updateMessage() {
        $data = array(
            'title' => $_POST['updateTitle'],
            'content' => $_POST['updateContent'],
            'author' => $_POST['updateAuthor'],
            'time' => date('d/m/Y H:m:s')
        );
        $m = M('message');
        $m->create($data);
        $result = $m->where('id=%d', $_POST['id'])->save($data);
        if($result) {
            redirect('message');
        } else {
            $this->error('error', 'message');
        }
    }
}