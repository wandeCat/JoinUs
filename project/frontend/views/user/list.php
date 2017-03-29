<?php
   use yii\widgets\DetailView;
   echo DetailView::widget([
      'model' => $model,
      'attributes' => [
         'id',
         //formatted as html
         'name:html',
         [
            'label' => 'e-mail',
            'value' => $model->email,
         ],
         [
         'label' => '头像',
         'format' => [
         'image', 
         [
         'width'=>'84',
         'height'=>'84'
         ]
         ],
         'value' => function ($model) { 
         return $model->file; 
         }
         ],
      ],
   ]);
?>