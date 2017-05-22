<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\grid\GridView;

$this->title = 'Show All Customers';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-add">
    <h1><?= Html::encode($this->title) ?></h1>

    <?=
GridView::widget([
    'dataProvider' => $dataProvider,
    //'filterModel' => $model,
    'columns' => [
        '_id',
        [
            'attribute' => 'name',
            'content' => function($dataProvider){
                return $dataProvider['name'];
            },
        ],
        'email:email',
        [
            'attribute' => 'create_on',
            'format' => ['date', 'Y-m-d H:i:s'],
        ],
        'phone',
        [
            'class' => 'yii\grid\ActionColumn',
            'header' => 'Actions',
            'template' => '{update} {delete}',
            'buttons' => [
                'delete' => function ($url, $model, $key) 
                {
                    return Html::a(
                        '<span class="glyphicon glyphicon-remove"></span>', 
                        ['del', 'delId' => $model['name']], 
                        [
                            'title' => 'Delete',
                            'data' => ['confirm' => 'Are you sure about delete？',]
                        ]);    
                },
                'update' => function ($url, $model, $key) {
                    return Html::a(
                        '<span class="glyphicon glyphicon-edit"></span>', 
                        ['update', 'updateId' => $model['name']], 
                        [
                            'title' => 'Update',
                        ]);
                },
            ],
            /*
            'headerOptions' => ['width' => '128', 'class' => 'padding-left-5px',],
            'contentOptions' => ['class' => 'padding-left-5px'],
            
            'buttons' => [
                'delete' => function ($url, $model, $key) {
                    return Html::a('<span class="glyphicon glyphicon-remove"></span>', $url, [
                        'title' => 'Delete',
                        'data-method' => 'post',
                        'data-pjax' => '0',
                    ]);    
                },
                'update' => function ($url, $model, $key) {
                    return Html::a('<span class="glyphicon glyphicon-edit"></span>', $url, [
                        'title' => 'Update',
                        'data-method' => 'post',
                        'data-pjax' => '0',
                    ]);
                },
            ],*/
        ],
    ],
]); ?>

</div>