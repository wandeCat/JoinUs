<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PlaceSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '旅游路线';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="place-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('创建路线', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [

            ['class' => 'yii\grid\SerialColumn'],
            'id',
            'name:url',
            'path',
            'recom',
			[
				"class" => "yii\grid\ActionColumn",
				"header" => "操作",
				"buttons" => [
					"get-xxx" => function ($url, $model, $key) { 
						return Html::a("详情", $url, ["title" => "获取xxx"] ); 
					},
				],
			],
        ],
    ]); ?>
</div>

