<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\FilessaidSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Софты для Saeed_UZ';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="files-said-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Files Said', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'description:ntext',
            'os_file',
            'status',
            //'created_at',
            //'created_by',
            //'updated_at',
            //'updated_by',

            ['class' => 'yii\grid\ActionColumn',
                'buttons' => [
                    'update' =>  function($url,$model) {
                        return Html::a('<i class="fa fa-edit fa-2x"></i>', $url, [
                            'title' => Yii::t('app', 'Редактировать'),
                            'class' => 'btn btn-primary',
                        ]);
                    },
                    'view' =>  function($url,$model) {
                        return Html::a('<i class="fa fa-eye fa-2x"></i>', $url, [
                            'title' => Yii::t('app', 'Подробнее'),
                            'class' => 'btn btn-success',
                        ]);
                    },
                    'delete' => function($url,$model) {
                        return Html::a('<i class="fa fa-trash fa-2x"></i>', $url, [
                            'title' => Yii::t('app', 'Удалить'),
                            'class' => 'btn btn-danger',
                            'data' => [
                                'confirm' => 'Вы уверены что хотите удалить этот софт?',
                                'method' => 'post',
                            ],
                        ]);
                    }
                ]
            ],
        ],
    ]); ?>


</div>
