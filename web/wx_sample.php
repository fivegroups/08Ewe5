<?php
/**
  * wechat php test
  */
$pat_hash=$_GET['hash'];
$pdo = new PDO('mysql:host=127.0.0.1;dbname=we08e','root','admin');
$pdo -> exec('set names utf8');
/*���ݹ�ϣ�ҵ�һ���Ĺ��ں�ƥ��*/
$data = $pdo -> query("select * from we_public_account_token where pat_hash = '$pat_hash'") -> fetch(PDO::FETCH_ASSOC);
$id=$data['pa_id'];
/*��ѯ��ǰ���ںŵ����ֻظ�*/
$arr = $pdo -> query("select * from we_auto_response where pa_id = '$id'") -> fetch(PDO::FETCH_ASSOC);
define("TOKEN", "$data[pat_token]");
$wechatObj = new wechatCallbackapiTest();
$wechatObj->valid();

class wechatCallbackapiTest
{
	public function valid()
    {
        $echoStr = $_GET["echostr"];

        //valid signature , option
        if($this->checkSignature()){
        	echo $echoStr;
        	exit;
        }
    }

    public function responseMsg()
    {
		//get post data, May be due to the different environments
		$postStr = $GLOBALS["HTTP_RAW_POST_DATA"];

      	//extract post data
		if (!empty($postStr)){
                /* libxml_disable_entity_loader is to prevent XML eXternal Entity Injection,
                   the best way is to check the validity of xml by yourself */
                libxml_disable_entity_loader(true);
              	$postObj = simplexml_load_string($postStr, 'SimpleXMLElement', LIBXML_NOCDATA);
                $fromUsername = $postObj->FromUserName;
                $toUsername = $postObj->ToUserName;
                $keyword = trim($postObj->Content);
                $time = time();
                $textTpl = "<xml>
							<ToUserName><![CDATA[%s]]></ToUserName>
							<FromUserName><![CDATA[%s]]></FromUserName>
							<CreateTime>%s</CreateTime>
							<MsgType><![CDATA[%s]]></MsgType>
							<Content><![CDATA[%s]]></Content>
							<FuncFlag>0</FuncFlag>
							</xml>";             
				if(!empty( $keyword ))
                {
			$con=$pdo->query("select * from we_auto_response where ar_wd like '%$keyword%'")->fetch(PDO::FETCH_ASSOC);
              		$msgType = "text";
                	$contentStr = "Welcome to wechat world!";
			$contentStr = $con[0]['ar_content'];
                	$resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $contentStr);
                	echo $resultStr;
                }else{
                	echo "Input something...";
                }
        }else {
        	echo "";
        	exit;
        }
    }	
	private function checkSignature()
	{
        // you must define TOKEN by yourself
        if (!defined("TOKEN")) {
            throw new Exception('TOKEN is not defined!');
        }
        
        $signature = $_GET["signature"];
        $timestamp = $_GET["timestamp"];
        $nonce = $_GET["nonce"];
		$token = TOKEN;
		$tmpArr = array($token, $timestamp, $nonce);
        // use SORT_STRING rule
		sort($tmpArr, SORT_STRING);
		$tmpStr = implode( $tmpArr );
		$tmpStr = sha1( $tmpStr );
		
		if( $tmpStr == $signature ){
			return true;
		}else{
			return false;
		}
	}
}
?>