<?php
//没有登录也能访问的页面网站主站
namespace frontend\controllers;
use yii\web\Controller;
use Yii;
class IndexController extends Controller{
    
    public function actionIndex(){
        return $this->renderPartial('index.php');
    }
    
}
