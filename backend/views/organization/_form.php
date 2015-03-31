<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\City;

/* @var $this yii\web\View */
/* @var $model common\models\organization */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="organization-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => 100]) ?>

    <?= $form->field($model, 'fullname')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'abbr')->textInput(['maxlength' => 100]) ?>

    <?= $form->field($model, 'city_id')->dropDownList(ArrayHelper::map(City::find()->asArray()->all(), 'id', 'name')) ?>

    <?= $form->field($model, 'address')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'phone')->textInput(['maxlength' => 100]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => 100]) ?>

    <?php
    echo yii\imperavi\Widget::widget([
        // You can either use it for model attribute
        'model' => $model,
        'attribute' => 'about',
        // or just for input field
//        'name' => 'my_input_name',
        // Some options, see http://imperavi.com/redactor/docs/
        'options' => [
//            'toolbar' => false,
//            'css' => 'wym.css',
        ],
        'plugins' => [
            'fullscreen',
//            'clips'
        ]
    ]);
    ?>


    <?= $form->field($model, 'status')->checkbox(['value' => $model::STATUS_ACTIVE]) ?>

    <div class="modal-footer">
        <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Сохранить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
