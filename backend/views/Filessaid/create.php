<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\FilesSaid */

$this->title = 'Добавления софта';
$this->params['breadcrumbs'][] = ['label' => 'Софт', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="files-said-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
