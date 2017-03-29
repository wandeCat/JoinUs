<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\search\CompenyInfoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="company-info-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'company_id') ?>

    <?= $form->field($model, 'company_name') ?>

    <?= $form->field($model, 'company_desc') ?>

    <?= $form->field($model, 'company_address') ?>

    <?= $form->field($model, 'company_phone') ?>

    <?php // echo $form->field($model, 'company_index') ?>

    <?php // echo $form->field($model, 'company_type') ?>

    <?php // echo $form->field($model, 'company_scale') ?>

    <?php // echo $form->field($model, 'company_radio') ?>

    <?php // echo $form->field($model, 'company_logo') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
