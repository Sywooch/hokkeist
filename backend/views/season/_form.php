<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\season */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="season-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => 100]) ?>
    <?= $form->field($model, 'sort')->textInput() ?>
    <?= $form->field($model, 'status')->checkbox(['value' => $model::STATUS_ACTIVE]) ?>

    <div class="modal-footer">
        <?= Html::submitButton($model->isNewRecord ? 'Добавить' : 'Сохранить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>
