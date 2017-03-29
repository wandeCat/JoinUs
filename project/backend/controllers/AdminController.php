<?php
namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
class AdminController extends Controller
{
	public $layout=false;
	function actionIndex(){
		return $this->render('index.html');
	} 
	function actionCurd(){
		return $this->render('crud.html');
	} 
	function actionLogin(){
		return $this->render('login.html');
	} 
}