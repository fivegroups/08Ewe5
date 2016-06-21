<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;



class AutoresponseController extends Controller
{
    //执行自定义文字回复规则
    //的展示
    public function actionShow()
    {
        $session=\Yii::$app->session;
        $pa_id=$session->get('pa_id');
        //echo $pa_id;die;
        //print_r($command);die;
        $connection = Yii::$app->db;
        $command = $connection->createCommand("SELECT * from we_auto_response where pa_id='$pa_id'")->queryAll();
        //var_dump($command);die；
        $connection = Yii::$app->db;
        $com = $connection->createCommand("SELECT pa_name from we_public_account where pa_id='$pa_id'")->queryAll();
        //var_dump($com);die;
        //return $this->renderPartial('auto_response_list',array("content"=>$command));
        return $this->renderPartial('auto_response_list',["content"=>$command,'arr'=>$com]);
    }

    //执行自定义文字回复规则的添加
    public $enableCsrfValidation = false;
    public function actionAdd()
    {
        $method =  Yii::$app->request->method;
        if($method != 'POST'){
            $connection = Yii::$app->db;
            $session = Yii::$app->session;
            $u_id=$session->get('u_id');
            $command = $connection->createCommand("SELECT pa_id,pa_name FROM we_public_account where u_id='$u_id'")->queryAll();
            return $this->renderPartial('auto_response_add',array('content'=>$command));
        }else{
            $data = Yii::$app->request->post();
            $name = $data['m_rule_name'];
            $type = $data['m_rule_type'];
            $wd  = $data['m_wd'];
            $content = $data['m_content'];
            $pa_id = $data['pa_id'];
            $connection = Yii::$app->db;
            $command = $connection->createCommand()->insert('we_auto_response',['ar_rule_name'=>"$name",'ar_type'=>"$type",'ar_wd'=>"$wd",'ar_content'=>"$content",'pa_id'=>"$pa_id"])->execute();
            if($command){
                //echo '<script>alert("添加成功")</script>';
                $session=\Yii::$app->session;
                $session->set('pa_id',$pa_id);
                return $this->redirect("index.php?r=autoresponse/show");
            }else{
                echo '<script>alert("error")</script>';
            }
        }
    }
      //删除
    public function actionDels()
    {

     $request = Yii::$app->request;
     $ar_id = $request->post('ar_id'); 
     //print_r($ar_id);die;
     $connection = \Yii::$app->db;
      $command = $connection->createCommand("delete from we_auto_response where ar_id='$ar_id'");
     $re=$command->execute();
     if($re)
      {
        echo 1;
      }
     }
      //显示修改页面
    public function actionUpdates()
    {
        $request = Yii::$app->request;
        $id = $request->get('id');
        //print_r($id);die;
        $connection = \Yii::$app->db;
        $command = $connection->createCommand("SELECT * FROM we_auto_response where ar_id='$id'");
        $data = $command->queryAll();
       return $this->renderPartial('auto_response_update',['data'=>$data]);
    }
      //操作修改
    public function actionUpdate()
    {
        $request = Yii::$app->request;
        $post = $request->post(); 
       $id=$post['hid'];
        $ar_rule_name=$post['m_rule_name'];
        $ar_type=$post['m_rule_type'];
        $ar_wd=$post['m_wd'];
        $ar_content=$post['m_content'];
        $connection=\Yii::$app->db;
        // UPDATE
        $request=$connection->createCommand()->update('we_auto_response', [
            'ar_rule_name' => $ar_rule_name,
            'ar_type' =>$ar_type,
            'ar_wd' =>$ar_wd,
            'ar_content' =>$ar_content
            ], "ar_id='$id'")->execute();
        if($request)
        {
            echo "<script>alert('修改成功');location.href='index.php?r=autoresponse/show'</script>";
        }
        else
        {
            echo "<script>alert('修改失败');location.href='index.php?r=autoresponse/updates'</script>";
        }
 }
}