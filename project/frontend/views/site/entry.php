<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
<?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'email') ?>

	<? echo $form->field($model, 'sex')->radioList(['1'=>'男','0'=>'女']) ?>

	<? echo $form->field($model, 'hobby[]')->checkboxList(['0'=>'篮球','1'=>'足球','2'=>'羽毛球','3'=>'乒乓球']) ?>

    <div class="form-group">
        <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
    </div>

<?php ActiveForm::end(); ?>
