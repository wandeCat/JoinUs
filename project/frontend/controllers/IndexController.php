<?php
//没有登录也能访问的页面网站主站
namespace frontend\controllers;
use yii\web\Controller;
use Yii;
class IndexController extends Controller{
	//引入公共header头部
    public $layout='header';
    
    public function actionIndex(){
        return $this->render('index.php');
    }
    
}
