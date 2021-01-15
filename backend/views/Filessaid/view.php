<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\FilesSaid */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Files Saids', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="files-said-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(' Редактировать', ['update', 'id' => $model->id], ['class' => 'fa fa-edit btn btn-primary']) ?>
        <?= Html::a(' Скачать ', ['download', 'id' => $model->id], ['class' => 'fa fa-download btn btn-success']) ?>
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
            'name',
            'description:ntext',
            'os_file',
            [
                'label' => 'Изображение',
                'format' => 'raw',
                'value' => function ($model) {
                    $image = "<img src='/img/$model->image' style='max-width: 100%;width:15%;'>";
                    return $image;
                }
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
            // 'status',
            'created_by',
            [
                'label' => 'Добавлено в:',
                'value' => date('d/M/Y H:i:s', $model->created_at),
            ],
            'updated_by',
            [
                'label' => 'Обновлено в:',
                'value' => date('d/M/Y H:i:s', $model->updated_at),
            ],
        ],
    ]) ?>

</div>
