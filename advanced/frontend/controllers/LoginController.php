<?php
//用户登录注册页面分企业用户和个人用户
namespace frontend\controllers;
use yii\web\Controller;
use Yii;
class UserController extends Controller{
    public function actionUser(){

    }
    public function actionTest24(){
        return $this->renderPartial('login.html');
    }
    public function actionTest29(){
        return $this->renderPartial('register.html');
    }
}