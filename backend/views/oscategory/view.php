<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\OsCategory */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Категории софта', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="os-category-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(' Редактировать', ['update', 'id' => $model->id], ['class' => 'fa fa-edit btn btn-primary']) ?>
        <?= Html::a(' Удалить', ['delete', 'id' => $model->id], [
            'class' => 'fa fa-trash btn btn-danger',
            'data' => [
                'confirm' => 'Вы уверены, что хотите удалить этот элемент?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            [
                'label' => 'Названия',
                'value' => $model->title,
            ],
            [
                'label' => 'Статус:',
                'value' => function($model){
                    if($model->status == 0){
                        return 'Неактивен';
                    }
                    elseif ($model->status == 1){
                        return 'Активен';
                    }
                    else{
                        return 'Неизвестно';
                    }
                }
            ],
            [
                'label' => 'Добавлено в:',
                'value' => date('d/M/Y H:i:s', $model->created_at),
            ],
            [
                'label' => 'Добавил(а):',
                'value' => $model->created_by,
            ],
            [
                'label' => 'Обновлено в:',
                'value' => date('d/M/Y H:i:s', $model->updated_at),
            ],
            [
                'label' => 'Обновил(а):',
                'value' => $model->updated_by,
            ],
        ],
    ]) ?>

</div>
