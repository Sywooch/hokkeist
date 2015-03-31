<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\Season;

/* @var $this yii\web\View */
/* @var $model common\models\competition */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="competition-form">
    <div class="row">
        <div class="col-lg-6">



            <?php $form = ActiveForm::begin(); ?>

            <?php ob_start() ?>
            <legend>Основные данные</legend>

            <?php // print_r($model->getErrors()); ?>
            <?= $form->field($model, 'name')->textInput(['maxlength' => 255]) ?>
            <?= $form->field($model, 'fullname')->textInput(['maxlength' => 255]) ?>
            <?= $form->field($model, 'season_id')->dropDownList(ArrayHelper::map(Season::find()->asArray()->all(), 'id', 'name'), ['prompt' => '']) ?>

            <legend>Состояние</legend>
            <?= $form->field($model, 'is_now')->checkbox(['value' => $model::IS_NOW]) ?>
            <?= $form->field($model, 'is_request_now')->checkbox(['value' => $model::IS_REQUEST_NOW]) ?>
            <?= $form->field($model, 'is_modered')->checkbox(['value' => $model::IS_MODERED]) ?>
            <?= $form->field($model, 'is_closed')->checkbox(['value' => $model::IS_CLOSED]) ?>
            <?= $form->field($model, 'for_import')->checkbox(['value' => $model::FOR_IMPORT]) ?>
            <?= $form->field($model, 'hashtag')->textInput(['maxlength' => 150]) ?>

            <?php $tab_1 = ob_get_clean() ?>

            <?php ob_start() ?>
            <legend>Служебная информация</legend>
            <div class="row">
                <div class="col-md-4">
                    <?= $form->field($model, 'sort')->textInput() ?>
                </div>
            </div>

            <?= $form->field($model, 'status')->checkbox(['value' => $model::STATUS_ACTIVE]) ?>

            <?php $tab_2 = ob_get_clean() ?>

            <?php ob_start() ?>
            <div class="modal-footer">
                <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Сохранить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
            </div>
            <?php $button = ob_get_clean() ?>

            <?=
            \yii\bootstrap\Tabs::widget([
                'navType' => 'nav-pills',
                'items' => [
                    [
                        'label' => 'Основное',
                        'content' => $tab_1 . $button,
                        'active' => true
                    ],
                    [
                        'label' => 'Другое',
                        'content' => $tab_2 . $button,
                        'headerOptions' => [],
                    ],
                ],
            ]);
            ?>
            <?php ActiveForm::end(); ?>

        </div>
    </div>
</div>
