<?php
//公司中心可以修改企业信息和应聘者简历查看应聘职位
namespace frontend\controllers;
use yii\web\Controller;
use Yii;
    class ComController extends Controller{
    public function actionCom(){

    }
    public function actionTest19(){
        return $this->renderPartial('index04.html');
    }
    public function actionTest26(){
        return $this->renderPartial('myhome.html');
    }
}
