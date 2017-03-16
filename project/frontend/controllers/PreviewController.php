<?php
//简历具体的修改页面
namespace frontend\controllers;
use yii\web\Controller;
use Yii;
class PreviewController extends Controller{
    public function actionPreview(){

    }
    public function actionTest28(){
        return $this->renderPartial('preview.html');
    }
}
