<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\OsComments */

$this->title = 'Create Os Comments';
$this->params['breadcrumbs'][] = ['label' => 'Os Comments', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="os-comments-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
