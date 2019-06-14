<?php
namespace app\index\controller;
use app\common\controller\Base;
use app\common\model\Article;
use app\common\model\ArticleCategory;
use think\Controller;
use think\Db;
use think\db\Where;
use think\facade\Request;
use think\facade\Session;

class Index extends  Base
{
    public function index()
    {
        //查询条件
        $keyword=Request::param('keyword');
        $map1=[
                   ['title','like','%'.$keyword.'%'],
                   ['status','=','1']
              ];
        $map2 = [
                    ['content','like','%'.$keyword.'%'],
                    ['status','=','1']
                ];

        $cateId=Request::param('category_id');
        if(isset($cateId)){
            //查询条件3
            $map[]=['cate_id','=',$cateId];
            //显示导航条的文章类型
            $res=ArticleCategory::get($cateId);
            //帖子显示,分页
            $articleList=Db::table('zh_article')
                ->where($map)
               ->where(function ($query) use ($map1,$map2){
                   $query->whereOr([$map1,$map2]);
               })
                ->order('create_time','desc')
                ->paginate(4);
            $this->assign('cateName',$res->name);
        }else{
            $this->assign('cateName','全部文章');
            $articleList=Db::table('zh_article')
                ->whereOr([$map1,$map2])
                ->order('create_time','desc')
                ->paginate(4);
        }
        $this->view->assign('empty','没有文章');
        $this->view->assign('articleList',$articleList);
        return $this->fetch();
    }

    public function hello($name = 'ThinkPHP5')
    {
        return 'hello,' . $name;
    }

    //添加文章界面
    public  function  insert(){
        //1登录才允许发布
        $this->isLogin();

        //2.获取栏目信息
        $categoryList=ArticleCategory::all();
        if(count($categoryList)>0){
            $this->assign('cateList',$categoryList);
        }else{
            $this->error('请先添加栏目','url:index/index');
        }
        return $this->fetch();

    }
    //保存文章
    public  function save(){
        if(Request::isPost()){
            $data=Request::post();
            $res=$this->validate($data,'app\common\validate\Article');
            if(true!==$res){
                echo '<script>alert("'.$res.'");window.history.back(-1); </script>';
            }else{
                $file=Request::file('title_img');//获取上传的图片
                $info=$file->validate([
                    'size'=>1000000,
                    'ext'=>'jpeg,jpg,png,gif'
                ])->move('uploads/');//验证文件
                if($info){
                    $data['title_img']=$info->getSaveName();//将上传的图片名字给$data
                }else{
                   $this->error($file->getError());

                }
                if(Article::create($data)){
                    $this->success('发布成功','url:index/index');
                }else{
                    $this->error('发布失败','url:index\insert');
                }


            }
        }else{
            $this->error('请求类型错误','url:index/insert');
        }

    }
    //显示文章详情
    public  function detail()
    {
        $artId = Request::param('artId');
        $user_id = Session::get('user_id');
        $where = [];
        if (!empty($user_id)) {
            $where[] = ['user_id', '=', $user_id];
            $where[] = ['article_id', '=', $artId];
        }else{
            $where[] = ['article_id', '=', "0"];//写出一个不可能的where
        }
        $fav = Db::table('zh_user_fav')->where($where)->find();
        if (is_null($fav)) {
            $this->assign('fav', '收藏');
         } else {
            $this->assign('fav', '已收藏');
         }


        $art = Article::get(function ($query) use ($artId){
            $query->where('id','=',$artId)->setInc('pv');
        });

        if (!empty($art)) {
        $this->assign('art', $art);
          }
        $this->assign('title','详情页');
        return $this->fetch('detail');

    }
    /**
     *收藏文章
     */
    public function fav(){

        if(!Request::isAjax()){
            return ['status'=>-1,'message'=>'请求类型错误'];
        }
        $data=Request::param();
        if(empty($data['session_id'])){
            return ['status'=>-2,'message'=>'请先登录再操作'];
        }

        $condition[]=['user_id','=',$data['session_id']];
       $condition[]=['article_id','=',$data['article_id']];
        $fav=Db::table('zh_user_fav')->where($condition)->find();
        if(is_null($fav)){
            $shuju=[
                'user_id'=>$data['session_id'],
                'article_id'=>$data['article_id'],
            ];
            Db::table('zh_user_fav')->data($shuju)->insert();
            $this->assign('fav','0');
            return ['status'=>1,'message'=>'收藏'];
        }else{
            Db::table('zh_user_fav')->where($condition)->delete();
            $this->assign('fav','1');
            return ['status'=>0,'message'=>'已收藏'];
        }



    }
    public  function  ok(){
        if(!Request::isAjax()){
            return ['status'=>-1,'message'=>'请求类型错误'];
        }
        $data=Request::param();
        if(empty($data['session_id'])){
            return ['status'=>-2,'message'=>'请先登录再操作'];
        }
        $condition[]=['user_id','=',$data['session_id']];
        $condition[]=['article_id','=',$data['article_id']];
        $fav=Db::table('zh_user_like')->where($condition)->find();
        if(is_null($fav)){
            $shuju=[
                'user_id'=>$data['session_id'],
                'article_id'=>$data['article_id'],
            ];
            Db::table('zh_user_like')->data($shuju)->insert();
            return ['status'=>1,'message'=>'点赞成功'];
        }else{
            Db::table('zh_user_fav')->where($condition)->delete();
            return ['status'=>0,'message'=>'已取消点赞'];
        }
        }



}
