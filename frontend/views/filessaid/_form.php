	<?php
	use yii\helpers\Html;
	use yii\widgets\ActiveForm;
	 $form = ActiveForm::begin(); ?>
	<?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'content')->textarea(['rows' => 6]) ?>
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>
    <?php ActiveForm::end(); ?>