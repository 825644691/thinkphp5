<?php
/**
 * Created by PhpStorm.
 * User: hp
 * Date: 2019/5/25
 * Time: 19:51
 */

namespace app\admin\controller;

use app\admin\common\controller\Base;
use app\common\model\Article as ArtModel;
use app\common\model\ArticleCategory;
use think\facade\Request;
use think\facade\Session;

class Article extends  Base
{

    //文章管理的首页
    public function index()
    {
        $this->isLogin();
        return $this->redirect('artList');
    }

    //文章列表
    public function artList()
    {
        $this->isLogin();

        $userId = Session::get('user_id');
        $isAdmin = Session::get('admin_level');
        $artList = ArtModel::where('user_id',$userId)->paginate(3);
        if($isAdmin=="超级管理员")
        {
            $artList = ArtModel::where('')->paginate(3);
        }

       $page = $artList->render();
        $cateList = ArtModel::all();
        $this->assign('title', '文章管理');
        $this->assign('empty', '没有分类');
        $this->assign('artList', $artList);
        $this->assign('page', $page);
        return $this->fetch('artList');

    }

    //编辑文章
    public function  artEdit()
    {
        $artId = Request::param('id');
        $artInfo = ArtModel::where('id', $artId)->find();
        $cateList = ArticleCategory::all();
        $this->assign('title', '文章编辑');
        $this->assign('empty', '没有分类');
        $this->assign('artInfo', $artInfo);
        $this->assign('cateList', $cateList);
        return $this->fetch('artEdit');
    }

    //处理编辑
    public function doEdit()
    {
        $data = Request::param();
        $img=Request::file('title_img');
        $info=$img->validate(['ext'=>'jpg,png,gif'])->move('uploads/');
        if($info){
            $data['title_img'] = $info->getSaveName();
        }else{
            $this->error($info->getError(),'cateEdit');
        }
        $artId = $data['id'];
        unset($data['id']);
        $result = ArtModel::where('id', $artId)->update($data);
        if ($result) {
            $this->success('编辑成功', 'artList');
        } else {
            $this->error('编辑失败', 'artEdit');
        }
    }


    /**
     * 删除分类类型
     */

    public function del(){
        $id=Request::param('id');
        $res=ArtModel::where('id',$id)->delete();
        if($res){
            $this->success('删除成功','artList');
        }
        $this->error('没有删除或删除失败');

    }
    /**
     * 展示添加分类类型
     */
    public function add()
    {
        $this->assign('title', '文章管理');
        return $this->fetch('arteadd');
    }

    /**
     * 处理添加分类类型
     */
    public function doAdd()
    {
        $data=Request::param();
        if(ArtModel::create($data)){
            $this->success('添加成功','artList');
        }
        $this->error('没有删除或删除失败');
    }

}