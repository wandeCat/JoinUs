<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Place */

$this->title = 'Info add';
$this->params['breadcrumbs'][] = ['label' => 'Places', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="place-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('info', [
        'model' => $model,
        'upload_model'=>$upload_model,
    ]) ?>

</div>
