<?php


namespace app\index\controller;
use think\Db;
use think\facade\Request;
use think\facade\Session;
use app\common\model\UserInfo;
use think\Controller;


class Index extends Controller
{
    public function index()
    {
        $map = [];
        $keyword = Request::param("keyword");
        if(!empty($keyword)){
            $map1 = [
                ['name','like','%'.$keyword."%"],
            ];
            $map2 = [
                ['type','like','%'.$keyword.'%'],
            ];
            $book = Db::table('book')->whereOr($map1,$map2)->paginate(8);


        }else{
            $book = Db::table("book")->where($map)->paginate(8);
        }

        $obj = UserInfo::where("username", Session::get("username"))->find();
        $this->assign("book", $book);
        $this->assign("objjj", $obj);
        return $this->fetch();
    }

    public function gwc()
    {
        if (Request::isAjax()) {
            $username = Session::get("username");


            if (!empty($username)) {
                $gwc = Session::get("gwc");
                $ids = Request::post()["id"];
                if (empty($gwc)) {
                    //如果点击的购物车是空的（第一次添加）

                    //如果购物车里是空的，造二维数组，
                    $arr = array(
                        array($ids, 1)
                        //一维数组，取ids，第一次点击增加一个
                    );
                    Session::set("gwc", $arr);
                    //扔到session里面
                } else //这里不是第一次点击
                {
                    //先判断购物车里是否已经有了该商品，用$ids
                    $arr = Session::get("gwc");
                    //把购物车的状态取出来

                    $chuxian = false;
//定义一个变量；用来表示是否出现，默认是未出现
                    foreach ($arr as $v) {
                        //便利他
                        //如果这里面有这件商品
                        if ($v[0] == $ids) //如果取过来的$v[0]（商品的代号）等于$ids那么就证明购物车中已经有了这一件商品
                        {
                            $chuxian = true;
                            //如果出现，直接把chuxian改成true

                        }
                    }
                    if ($chuxian) {
                        //购物车中有此商品
                        for ($i = 0; $i < count($arr); $i++) {
                            if ($arr[$i][0] == $ids) {
                                //把点到的商品编号加1
                                $arr[$i][1] += 1;
                            }
                        }
                        Session::set("gwc", $arr);

                    } else {
                        //这里就只剩下：购物车里有东西，但是并没有这件商品
                        $asg = array($ids, 1);
                        //设一个小数组
                        $arr[] = $asg;
                        Session::set("gwc", $arr);
                    }

                }
                return ["status" => true];
//                $da = Session::get("gwc");
//                foreach ($da as $v){
//                    $id = $v[0];
//                    $msg = Db::table("book")->where("id",$id)->find();
//                    $data = [
//                        "username" => $_SESSION["username"],
//                        "bookname" => $msg["name"],
//
//
//                    ];
//
//                }

            } else {
                return ["status" => false];

            }
        }
    }

    public function shop()
    {
        $data = Request::get("id");
        $obj = UserInfo::where("username", Session::get("username"))->find();
        $this->assign("objjj", $obj);
        $shop = Db::table("book")->where("id", $data)->select();
        $price = $shop[0]["price"];
        $shop[0]["number"] = "1";
        $shop[0]["allprice"] = $price;
        $this->assign("shop", $shop);
        return $this->fetch();

    }

    public function gwc2()
    {
        $gwc = Session::get("gwc");

        if (!empty($gwc)) {
            $arr = array();
            $arr = $gwc;
            //造数组
        }
        $result = [];
        foreach ($arr as $v) {
            $id = $v[0];
            $b = Db::table("book")->where("id", $id)->find();
            $allprice = (int)$b["price"] * (int)$v[1];
            $result[] = [
                "id" => $b["id"],
                "name" => $b["name"],
                "price" => $b["price"],
                "number" => $v[1],
                "src" => $b["src"],
                "allprice" => $allprice,
            ];

        }
        $obj = UserInfo::where("username", Session::get("username"))->find();
        $this->assign("objjj", $obj);
        $this->assign("shop", $result);
        return $this->fetch("index/shop");
    }

    public function order()
    {
        $data = Request::post();
        $result = [];
        $str = date('Ymd') . substr(implode(NULL, array_map('ord', str_split(substr(uniqid(), 7, 13), 1))), 0, 8);
        foreach ($data as $k=>$v){
            $msg = Db::table("book")->where("id", $k)->find();
            $result[] = [
                "book_id" => $msg["id"],
                "user_id" => Session::get("user_id"),
                "count" => $v,
                "money" => $msg["price"],
                "bookname" => $msg["name"],
                "order" => $str,
            ];
        }

        Db::table("gouwuche")->data($result)->insertAll();
        return redirect("index");
//        $gwc = Session::get("gwc");
//
//        if (!empty($gwc)) {
//            $arr = array();
//            $arr = $gwc;
//            //造数组
//        }
//        $str = date('Ymd') . substr(implode(NULL, array_map('ord', str_split(substr(uniqid(), 7, 13), 1))), 0, 8);
//
//
//        foreach ($arr as $v) {
//            $id = $v[0];
//            $b = Db::table("book")->where("id", $id)->find();
//            $result = [
//                "user_id" => Session::get("user_id"),
//                "count" => $v[1],
//                "money" => $b["price"],
//                "bookname" => $b["name"],
//                "order" => $str,
//            ];
//            Db::table("gouwuche")->data($result)->insert();
//            Session::pull('gwc');
//
//
//        }
//
//
//        return redirect("index");
    }
    public function MyOrder(){
        $user_id = Session::get("user_id");
        $data = Db::table("gouwuche")->where("user_id", $user_id)->select();
        $result = [];
        foreach ($data as $v){
            if(!array_key_exists($v["order"], $result)){
                $result[$v["order"]] = [];
            }
            $result[$v["order"]]["id"] = $v["order"];
            $result[$v["order"]]["name"][] = [
                "book_id" => $v["book_id"],
                "bookname" => $v["bookname"],
                "money" => $v["money"],
                "count" => $v["count"],
                "allprice" => (int)$v["count"]*(int)$v["money"],
                "id" => $v["id"]
            ];
        }
//        foreach ($data as $v){
//            if(!array_key_exists($v["order"], $result)){
//                $result[$v["order"]] = [];
//
//            }
//                $result[$v["order"]]["name"][] = [
//                "bookname" => $v["bookname"],
//                "money" => $v["money"],
//                "count" => $v["count"],
//            ];
//
//        }

        $this->assign("items", $result);
        return $this->index();
    }
}