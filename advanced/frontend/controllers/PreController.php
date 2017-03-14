<?php
//个人中心可以修改个人信息和简历查看应聘职位
namespace frontend\controllers;
use yii\web\Controller;
use Yii;
class PreController extends Controller{
    public function actionPre(){

    }
    public function actionTest21(){
        return $this->renderPartial('jianli.html');
    }
}
