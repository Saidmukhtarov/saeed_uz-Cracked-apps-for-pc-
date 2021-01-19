<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel common\models\WallpapersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Обои';
$this->params['breadcrumbs'][] = 'Обои';
?>
<div class="wallpapers-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Создать новый', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            [
                'attribute' => 'Изображение',
                'format' => 'raw',
                'value' => function($model){
                    $img = "<img src='/wallpapers/$model->image' style='max-width: 50%;'>";
                    return $img;
                }
            ],
            // 'created_at',
            // 'created_by',
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

    <?php Pjax::end(); ?>

</div>
