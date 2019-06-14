<?php

define("TOKEN", "lxl");
define("APPID", "wx2fdbe721e30a6c5e");
define("APPSECRET", "2d947cc3e92c2198e337aeb52ff54731");

require_once "wechat.class.php";

$wechat = new Wechat();

if ( ! $wechat->valid() ) exit;

if (isset($_GET["echostr"])){
	echo $_GET["echostr"];
	exit;
}

$msg = $wechat->receive();

switch ($msg->MsgType) {
	case "event":
		if($msg->Event == "subscribe"){
			$wechat->reply(array(
				"type"=>"text",
				"content"=>"欢迎关注我的公众号！\n谢谢你长得这么好看还关注我，哈哈！"
			));
		}
		break;

	case "text":
		if(strstr($msg->Content, "你好")){
			date_default_timezone_set("Asia/Shanghai");
			$hour = date("G");
			if($hour >= 6 && $hour < 12){
				$hello = "早上好！[太阳]";
			}elseif ($hour >= 12 && $hour < 15) {
				$hello = "中午好！[太阳]";
			}elseif ($hour >= 15 && $hour < 18) {
				$hello = "下午好！[太阳]";
			}else{
				$hello = "晚上好！[月亮]";
			}
			$wechat->reply(array(
				"type"=>"text",
				"content"=>$hello
			));
		}elseif ($msg->Content == "华软") {
			$wechat->reply(array(
				"type"=>"news",
				"articles"=>array(
					array(
						"title" => "华软软件学院",
						"description" => "官网",
						"picurl" => "https://www.sise.com.cn/sise/fengmian/fmgs_59/images/neirong/09/39.JPG",
						"url" => "http://www.sise.com.cn/"
					),
					array(
						"title" => "软件系",
						"description" => "软件系官网",
						"picurl" => "https://www.sise.com.cn/Public/images/c.png",
						"url" => "http://soft.sise.cn/index.jsp"
					),
					array(
						"title" => "计算机系",
						"description" => "计算机系官网",
						"picurl" => "https://www.sise.com.cn/Public/images/d.png",
						"url" => "http://cs.sise.cn/"
					)
				)
			));
		}elseif ($msg->Content == "小猪佩奇"){
			$media_id = $wechat->uploadMedia("image","peppapig.jpg");
			$wechat->reply(array(
				"type"=>"image",
				"media_id"=>$media_id
			));
		}else{
			$wechat->reply(array(
				"type"=>"text",
				"content"=>"你刚才发了一条文本消息：\n".$msg->Content
			));
		}
		break;
	
	case "voice":
		$wechat->reply(array(
				"type"=>"text",
				"content"=>"你的语音识别结果为：\n".$msg->Recognition
		));
		break;
}