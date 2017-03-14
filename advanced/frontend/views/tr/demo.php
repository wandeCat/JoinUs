<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View *//* @var $form yii\widgets\ActiveForm *//* @var $model app\models\LoginForm */

$this->title = 'Login';
?>
<h1><?= Html::encode($this->title) ?></h1> //获取动态标题

<p>Please fill out the following fields to login:</p>

<?php $form = ActiveForm::begin(); ?>

<?//= $form->field($model, 'username') ?><!--  //文本框-->
<?//= $form->field($model, 'password')->passwordInput() ?><!-- //密码框-->

<?= Html::submitButton('Login') ?>  //提交按钮

<?php ActiveForm::end();?>