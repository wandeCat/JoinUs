<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\search\ResumeSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="resume-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'resume_id') ?>

    <?= $form->field($model, 'resume_name') ?>

    <?= $form->field($model, 'resume_sex') ?>

    <?= $form->field($model, 'resume_education') ?>

    <?= $form->field($model, 'resume_experience') ?>

    <?php // echo $form->field($model, 'resume_phone') ?>

    <?php // echo $form->field($model, 'resume_email') ?>

    <?php // echo $form->field($model, 'resume_status') ?>

    <?php // echo $form->field($model, 'resume_head') ?>

    <?php // echo $form->field($model, 'resume_workE') ?>

    <?php // echo $form->field($model, 'resume_projectE') ?>

    <?php // echo $form->field($model, 'resume_educational') ?>

    <?php // echo $form->field($model, 'resume_introduction') ?>

    <?php // echo $form->field($model, 'resume_production') ?>

    <?php // echo $form->field($model, 'resume_acquiesce') ?>

    <?php // echo $form->field($model, 'resume_expectW') ?>

    <?php // echo $form->field($model, 'person_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
