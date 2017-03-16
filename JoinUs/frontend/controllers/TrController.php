<?php
namespace frontend\controllers;
use  frontend\models\TR;
use yii\web\Controller;
use Yii;
class TrController extends Controller{
    public function actionTest(){
//        $model = new TR();
//        $res=\YII::$app->response;
        $res=TR::find()->orderBy('t_hgd desc')->asArray()->all();
//        $arr=$res->one();
//        print_r($res);die;
//        echo '123';
        return $this->renderPartial('index', [
            'res' => $res,
        ]);
    }
    public function actionDemo(){
        return $this->renderPartial('demo');
    }
}