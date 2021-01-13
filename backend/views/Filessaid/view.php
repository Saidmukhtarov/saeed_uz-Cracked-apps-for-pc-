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
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Download', ['download', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
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
