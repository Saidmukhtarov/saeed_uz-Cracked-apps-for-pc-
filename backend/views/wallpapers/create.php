<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Wallpapers */

$this->title = 'Create Wallpapers';
$this->params['breadcrumbs'][] = ['label' => 'Wallpapers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="wallpapers-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
