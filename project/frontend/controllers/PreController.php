<?php
//个人中心可以修改个人信息和简历查看应聘职位
namespace frontend\controllers;
use yii\web\Controller;
use Yii;
use app\models\YiiCompanyInfo;
use app\models\UploadForm;
use yii\web\UploadedFile;
class PreController extends Controller{
     public $layout='header';
     public $enableCsrfValidation=false;
     public function actionPre(){

    }
    //主页
    public function actionMyhome()
    {
        $model = new YiiCompanyInfo();
         //获取cookie登录信息
        $cookies = Yii::$app->request->cookies;
        $user=unserialize($cookies->getValue('user'));
        $list=$model->select($user['company_id']);

        return $this->render('myhome.php',['list'=>$list]);
    }
    //创建新职位
    public function actionAddwork()
    {
        return $this->render('create.php');
    }
    //编辑公司信息
    public function actionIndex(){
        return $this->render('index01.php');
    }
    //编辑简历方法
    public function actionCreate()
    {
    	$model = new YiiCompanyInfo();
    	$upload_model = new UploadForm();
    	if (Yii::$app->request->isPost) {
            //获取cookie登录信息
    		 $cookies = Yii::$app->request->cookies;
            $user=unserialize($cookies->getValue('user'));
    	 	$post=\Yii::$app->request->post();
           //上传过程
    	 	$upload_model->company_logo = \yii\web\UploadedFile::getInstance('company_logo');
           
            if ($upload_model->company_logo && $upload_model->validate()) {
                $filename='logoimage/' . $upload_model->company_logo->baseName . '.' . $upload_model->company_logo->extension;
                
                $upload_model->company_logo->saveAs($filename);
                $post['company_logo']='http://localhost/yii3/JoinUs/project/frontend/web/'.$filename;
             }
              //print_r($post); die;
             $a= yii::$app->db->createCommand()->insert('yii_company_info', [
                    'company_id' => $user['company_id'],
                    'company_name' => $post['company_name'],
                    'company_desc' => $post['company_desc'],
                    'company_address' => $post['company_address'],
                    'company_phone' => $post['company_phone'],
                    'company_index' => $post['company_index'],
                    'company_type' => $post['company_type'],
                    'company_logo' => $post['company_logo'],
                    'company_scale' => $post['company_scale'],
                    'company_radio' => $post['company_radio'],
            ])->execute(); 
             // var_dump($model->create($post));     
    	 	if ($a) {
    	 		return $this->render('success.php');
    	 	}
    		
    	 }else{
    	 	return $this->renderPartial('index01.php');
    	 } 
    }

}
