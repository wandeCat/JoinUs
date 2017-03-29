<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\search\JobSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="job-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'job_id') ?>

    <?= $form->field($model, 'job_name') ?>

    <?= $form->field($model, 'job_company_id') ?>

    <?= $form->field($model, 'job_nature') ?>

    <?= $form->field($model, 'job_trade') ?>

    <?php // echo $form->field($model, 'job_city') ?>

    <?php // echo $form->field($model, 'job_district') ?>

    <?php // echo $form->field($model, 'job_tag') ?>

    <?php // echo $form->field($model, 'job_education') ?>

    <?php // echo $form->field($model, 'job_experience') ?>

    <?php // echo $form->field($model, 'job_wage') ?>

    <?php // echo $form->field($model, 'job_contents') ?>

    <?php // echo $form->field($model, 'job_email') ?>

    <?php // echo $form->field($model, 'job_addtime') ?>

    <?php // echo $form->field($model, 'job_status') ?>

    <?php // echo $form->field($model, 'job_hot') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
