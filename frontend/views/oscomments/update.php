<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\OsComments */

$this->title = 'Update Os Comments: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Os Comments', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="os-comments-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
