<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Job */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="job-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'job_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'job_company_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'job_nature')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'job_trade')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'job_city')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'job_district')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'job_tag')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'job_education')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'job_experience')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'job_wage')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'job_contents')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'job_email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'job_addtime')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'job_status')->textInput() ?>

    <?= $form->field($model, 'job_hot')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
