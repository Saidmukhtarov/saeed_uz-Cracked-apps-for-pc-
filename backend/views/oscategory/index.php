<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel common\models\OsCategorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Категории софта';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="os-category-index">

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
            'title',
            [
                'label' => 'Статус:',
                'value' => function($model){
                    if($model->status == 0){
                        return 'Неактивен';
                    }
                    elseif ($model->status == 1){
                        return 'Активен';
                    }
                    elseif ($model->status == 3){
                        return 'Удалён';
                    }
                    else{
                        return 'Неизвестно';
                    }
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
                                'confirm' => 'Вы уверены что хотите удалить этот пост?',
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
