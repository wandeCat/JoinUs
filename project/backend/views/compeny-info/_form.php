<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CompanyInfo */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="company-info-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'company_id')->textInput() ?>

    <?= $form->field($model, 'company_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'company_desc')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'company_address')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'company_phone')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'company_index')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'company_type')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'company_scale')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'company_radio')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'company_logo')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
