<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Resume */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="resume-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'resume_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'resume_sex')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'resume_education')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'resume_experience')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'resume_phone')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'resume_email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'resume_status')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'resume_head')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'resume_workE')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'resume_projectE')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'resume_educational')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'resume_introduction')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'resume_production')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'resume_acquiesce')->textInput() ?>

    <?= $form->field($model, 'resume_expectW')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'person_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
