<?php
//用户登录注册页面分企业用户和个人用户
namespace frontend\controllers;

use yii\web\Controller;
use Yii;
use app\models\User_Person;
use app\models\User_Company;

class UserController extends Controller{

	public $enableCsrfValidation=false;
	public $layout=false;
    
    public function actionLogin(){
    	if(Yii::$app->request->post()){
    		$data['password']=md5($data['password']);
    		$model = new \app\models\User_Person();
    		$cout1 = $model->getOne1($data);
    		$cout2 = $model->getOne2($data);
    		$cout3 = $model->getOne3($data);
    		$cout4 = $model->getOne4($data);
    		echo $cout3;die;

			
/*
			$model2 = new \app\models\User_Company();
*/

    	}else{
    		return $this->renderPartial('login.php');
    	}
    }

    public function actionRegister(){
    	if($data=Yii::$app->request->post()){
    		$data['password']=md5($data['password']);
    		if($data['type']==0){
    			$model = new \app\models\User_Person();
    			//print_r($data);die;
    			$cout1 = $model->getOne1($data);
    			$cout2 = $model->getOne2($data);
    			if($cout1||$cout2){
    				echo "用户名已存在";
    			}else{
    				$result=$model->create($data);
	    			if($result){
	    				return $this->redirect(array('/index/index'));
	    			}else{
	    				echo "注册失败";
	    			}
    			}	
    		}else{
    			$model = new \app\models\User_Company();
    			//print_r($data);die;
    			$cout1 = $model->getOne1($data);
    			$cout2 = $model->getOne2($data);
    			if($cout1||$cout2){
    				echo "用户名已存在";
    			}else{
    				$result=$model->create($data);
	    			if($result){
	    				return $this->redirect(array('/index/index'));
	    			}else{
	    				echo "注册失败";
	    			}
    			}
    		}
    	}else{
    		return $this->renderPartial('register.php');
    	}       
    }

    public function actionReset(){
    	return $this->renderPartial('reset.php');
    }

}