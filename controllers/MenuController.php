<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;


class MenuController extends Controller
{
    public $layout=false; //禁用yii自带样式
    public $enableCsrfValidation = false; //表单跳转，禁用 CSRF 验证

       public function actionAdd()
    {
      $connection = Yii::$app->db;
      $session = Yii::$app->session;
      $u_id=$session->get('u_id');
      $command = $connection->createCommand("SELECT pa_id,pa_name FROM we_public_account where u_id='$u_id'")->queryAll();
      return $this->render('menu_list',array('content'=>$command));
    }
    /*添加菜单接过来的值*/
    public function actionInsert(){
        $content=$_POST['content'];
        $id=$_POST['id'];	
	$connection = Yii::$app->db;
        	$command = $connection->createCommand("select * from we_public_account where pa_id = '$id'")->queryAll();	
  	$appid=$command[0]['pa_appid'];
       	$appsecret=$command[0]['pa_appsecret'];
	$url2="https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=$appid&secret=$appsecret";
	$json=file_get_contents($url2);
	$arr=json_decode($json,true);
	$accesstoken=$arr['access_token'];
	$url="https://api.weixin.qq.com/cgi-bin/menu/create?access_token=".$accesstoken;
		    $ch = curl_init();   //1.初始化    
    curl_setopt($ch, CURLOPT_URL, $url); //2.请求地址    
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'post');//3.请求方式    
    //4.参数如下    
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);//https    
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);       
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);    
    curl_setopt($ch, CURLOPT_AUTOREFERER, 1);    
    curl_setopt($ch, CURLOPT_POSTFIELDS, $content);           
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);    
    $tmpInfo = curl_exec($ch);//6.执行        
    curl_close($ch);//8.关闭    
    var_dump($tmpInfo);  	   
     }
  }
