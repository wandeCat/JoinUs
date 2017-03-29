<?php
namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
class CookieController extends Controller
{
	function actionIndex()
	{
		$cookies = Yii::$app->response->cookies;

		// 在要发送的响应中添加一个新的cookie
		$cookies->add(new \yii\web\Cookie([
		    'name' => 'test',
		    'value' => '2',
		]));
	}

	function actionGet()
	{
		$cookies = Yii::$app->request->cookies;

		$language = $cookies->getValue('test', 'en');
		var_dump($language);
	}
}
