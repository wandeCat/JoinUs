<?php
namespace frontend\ours;
use Yii;
use yii\web\Controller;
class PublicController extends Controller
{
	public $user;
	public function init()
	{
		$this->user=unserialize(yii::$app->request->cookies->getValue('user'));
	}
}