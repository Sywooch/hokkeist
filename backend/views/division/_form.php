<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use common\models\Season;
use common\models\Competition;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model common\models\division */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="division-form">
    <div class="row">
        <div class="col-lg-6">
            <?php $form = ActiveForm::begin(); ?>

            <?php ob_start() ?>
            <legend>Основные данные</legend>
            <?= $form->field($model, 'name')->textInput(['maxlength' => 255]) ?>

            <?= $form->field($model, 'season_id')->dropDownList(ArrayHelper::map(Season::find()->asArray()->all(), 'id', 'name'), ['prompt' => '']) ?>
            <?= $form->field($model, 'competition_id')->dropDownList(ArrayHelper::map(Competition::find()->asArray()->all(), 'id', 'name'), ['prompt' => '']) ?>
            <?= $form->field($model, 'start_year')->textInput(['maxlength' => 4, 'placeholder' => 'Введите год рождения']) ?>
            <?= $form->field($model, 'end_year')->textInput(['maxlength' => 4, 'placeholder' => 'Введите год рождения']) ?>


            <?= $form->field($model, 'is_bid')->checkbox(['value' => $model::STATUS_BID]) ?>
            <?= $form->field($model, 'is_modered')->checkbox(['value' => $model::STATUS_MODERED]) ?>
            <?= $form->field($model, 'is_closed')->checkbox(['value' => $model::STATUS_CLOSED]) ?>


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
                'navType' => 'nav-tabs', //nav-tabs-inverse
//                'class' => 'nav-tabs-inverse',
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
