<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Wallpapers */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Обои', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="wallpapers-view">

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
                'value' => $model->name,
            ],
            [
                'label' => 'Изображение',
                'format' => 'raw',
                'value' => function ($model) {
                    $image = "<img src='/wallpapers/$model->image' style='max-width: 100%;width:15%;'>";
                    return $image;
                }
            ],
            [
                'label' => 'Добавлено в:',
                'value' => date('d/M/Y H:i:s', $model->created_at),
            ],
            [
                'label' => 'Добавил(а)',
                'value' => $model->created_by,
            ],
            [
                'label' => 'Обновлено в:',
                'value' => date('d/M/Y H:i:s', $model->updated_at),
            ],
            [
                'label' => 'Обновил(а)',
                'value' => $model->updated_by,
            ],
        ],
    ]) ?>

</div>
