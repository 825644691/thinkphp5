<?php
/**
 * Created by PhpStorm.
 * User: hp
 * Date: 2019/5/25
 * Time: 19:51
 */

namespace app\admin\controller;

use app\admin\common\controller\Base;
use app\common\model\ArticleCategory;
use think\facade\Request;

class Cate extends  Base
{

    //分类管理的首页
    public function index()
    {
        $this->isLogin();
        return $this->redirect('cateList');
    }

    //分类列表
    public function cateList()
    {
        $this->isLogin();
        $cateList = ArticleCategory::all();
        $this->assign('title', '分类管理');
        $this->assign('empty', '没有分类');
        $this->assign('cateList', $cateList);
        return $this->fetch('cateList');

    }

    //编辑列表
    public function  cateEdit()
    {
        $cateId = Request::param('id');
        $cateInfo = ArticleCategory::where('id', $cateId)->find();
        $this->assign('title', '分类编辑');
        $this->assign('empty', '没有分类');
        $this->assign('cateInfo', $cateInfo);
        return $this->fetch('cateEdit');
    }

    //处理编辑
    public function doEdit()
    {
        $data = Request::param();
        $cateId = $data['id'];
        unset($data['id']);
        $result = ArticleCategory::where('id', $cateId)->update($data);
        if ($result) {
            $this->success('编辑成功', 'cateList');
        } else {
            $this->error('编辑失败', 'cateEdit');
        }
    }


   /**
    * 删除分类类型
    */

    public function del(){
        $id=Request::param('id');
        $res=ArticleCategory::where('id',$id)->delete();
        if($res){
            $this->success('删除成功','cateList');
        }
        $this->error('没有删除或删除失败');

    }
    /**
     * 展示添加分类类型
     */
    public function add()
    {
        $this->assign('title', '分类管理');
        return $this->fetch('cateadd');
    }

    /**
     * 处理添加分类类型
     */
    public function doAdd()
    {
        $data=Request::param();
        if(ArticleCategory::create($data)){
            $this->success('添加成功','cateList');
        }
        $this->error('没有删除或删除失败');
    }

}