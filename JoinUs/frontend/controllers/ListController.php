<?php
//职位列表
namespace frontend\controllers;
use yii\web\Controller;
use Yii;
class ListController extends Controller{
    public function actionList(){

    }
    public function actionTest23(){
        return $this->renderPartial('list.html');
    }
}
