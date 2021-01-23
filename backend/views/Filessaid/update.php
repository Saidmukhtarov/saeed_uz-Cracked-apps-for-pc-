<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\FilesSaid */

$this->title = 'Редактировать софт: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Софты', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Редактировать';
?>
<div class="files-said-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'oscatList' => $oscatList,
    ]) ?>

</div>
