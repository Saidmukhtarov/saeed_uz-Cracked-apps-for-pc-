<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\FilesSaid */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="files-said-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true])->label('Имя софта') ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6])->label('Описания софта') ?>

    <?= $form->field($model, 'os_file')->fileInput()->label('Софт для компа') ?>

    <?= $form->field($model, 'image')->fileInput()->label('Рисунок софта') ?>

    <?= $form->field($model, 'status')->checkbox()->label('Статус') ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
