<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Place */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="place-form">

<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>

    <?= $form->field($model, 'name')->textInput()->label('姓名') ?>

    <?= $form->field($model, 'tel')->textInput() ?>

    <?= $form->field($model, 'email')->textInput() ?>

   <?= $form->field($upload_model, 'file')->fileInput()?>
 
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
