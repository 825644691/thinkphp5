<?php

class Wechat{
	private $message;

	public function valid(){
		$signature = $_GET["signature"];
		$timestamp = $_GET["timestamp"];
		$nonce = $_GET["nonce"];

		$tmpArr = array(TOKEN, $timestamp, $nonce);
		sort($tmpArr, SORT_STRING);
		$tmpStr = implode($tmpArr);
		$tmpStr = sha1($tmpStr);

		return ( $tmpStr == $signature );
	}

	public function receive(){
		$xmlstr = file_get_contents("php://input");
		if(!empty($xmlstr)){
			$msg = simplexml_load_string($xmlstr, "SimpleXMLElement", LIBXML_NOCDATA);
			$this->message = $msg;
			return $msg;
		}
	}

	public function reply($msg){
		switch ($msg["type"]) {
			// reply(array("type"=>"text","content"=>"这是一个文本消息"));
			case "text":
				$xml = sprintf(
					"<xml>".
						"<ToUserName><![CDATA[%s]]></ToUserName>".
						"<FromUserName><![CDATA[%s]]></FromUserName>".
						"<CreateTime>%s</CreateTime>".
						"<MsgType><![CDATA[text]]></MsgType>".
						"<Content><![CDATA[%s]]></Content>".
					"</xml>",
					$this->message->FromUserName,
					$this->message->ToUserName,
					time(),
					$msg["content"]);

				break;
			
			case "news":
				$articles = "";
                foreach ($msg["articles"] as $article) {
                    $articles .= sprintf(
                    	"<item>".
                            "<Title><![CDATA[%s]]></Title>".
                            "<Description><![CDATA[%s]]></Description>".
                            "<PicUrl><![CDATA[%s]]></PicUrl>".
                            "<Url><![CDATA[%s]]></Url>".
                        "</item>", 
                        $article["title"],
                        $article["description"],
                        $article["picurl"],
                        $article["url"]);
                }
                
                $xml = sprintf(
                	"<xml>".
                        "<ToUserName><![CDATA[%s]]></ToUserName>".
                        "<FromUserName><![CDATA[%s]]></FromUserName>".
                        "<CreateTime>%s</CreateTime>".
                        "<MsgType><![CDATA[news]]></MsgType>".
                        "<ArticleCount>%s</ArticleCount>".
                        "<Articles>%s</Articles>".
                    "</xml>", 
                    $this->message->FromUserName,
                    $this->message->ToUserName,
                    time(),
                    count($msg["articles"]),
                    $articles);

				break;
			
			case "image":
				$xml = sprintf(
					"<xml>".
                        "<ToUserName><![CDATA[%s]]></ToUserName>".
                        "<FromUserName><![CDATA[%s]]></FromUserName>".
                        "<CreateTime>%s</CreateTime>".
                        "<MsgType><![CDATA[image]]></MsgType>".
                        "<Image><MediaId><![CDATA[%s]]></MediaId></Image>".
                    "</xml>", 
                    $this->message->FromUserName,
                    $this->message->ToUserName,
                    time(), 
                    $msg["media_id"]);

				break;
		}
		header("Content-Type: text/xml; charset=UTF-8");
		echo $xml;
	}

	private function httpsRequest($url, $data = null){
		$curl = curl_init();
		curl_setopt($curl, CURLOPT_URL, $url);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
		// curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, TRUE);
		// curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 2);
		if(!empty($data)){
			curl_setopt($curl, CURLOPT_POST, TRUE);
			curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
		}
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
		$result = curl_exec($curl);
		curl_close($curl);
		return json_decode($result, TRUE);
	}

	private function getAccessToken(){
		$file = "d:\access_token.txt";
		if(file_exists($file)){
			$json = file_get_contents($file);
			$json = json_decode($json, TRUE);
			if( isset($json["access_token"])  &&  $json["expires_on"] > time() + 60 ){
				return $json["access_token"];
			}
		}
		
		$url = "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=".APPID."&secret=".APPSECRET;
		$result = $this->httpsRequest($url);
		if(!isset($result["access_token"])){
			exit(json_encode($result));
		}
		$access_token = $result["access_token"];
		$result["expires_on"] = time() + 7200;
		$result = json_encode($result);
		file_put_contents($file, $result);

		return $access_token;
	}

	public function uploadMedia($type, $file){
		$access_token = $this->getAccessToken();
		$url = "https://api.weixin.qq.com/cgi-bin/media/upload?access_token=".$access_token."&type=".$type;
		if(class_exists("CURLFile")){
			$data = array("media"=> new CURLFile(realpath($file)));  // >=PHP5.5
		}else{
			$data = array("media"=> "@".realpath($file));  // <PHP5.5
		}
		$json = $this->httpsRequest($url, $data);
		return $json["media_id"];
	}
}