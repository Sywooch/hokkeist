<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\City;
use yii\jui\DatePicker;

/* @var $this yii\web\View */
/* @var $model common\models\team */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="team-form">
    <?php $form = ActiveForm::begin([ 'options' => ['enctype' => 'multipart/form-data']]); ?>

    <?php ob_start() ?>
    <legend>Основные данные</legend>
    <div class="row">
        <div class="col-md-4">
            <?= $form->field($model, 'name')->textInput(['maxlength' => 100]) ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'abbr')->textInput(['maxlength' => 100]) ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'organization_id')->dropDownList(ArrayHelper::map(common\models\Organization::find()->asArray()->all(), 'id', 'name'), ['prompt' => '']) ?>
        </div>
    </div>

    <?= $form->field($model, 'logo')->fileInput() ?>

    <?= Html::activeLabel($model, 'description') ?>
    <?php
    echo yii\imperavi\Widget::widget([
        // You can either use it for model attribute
        'model' => $model,
        'attribute' => 'description',
        // or just for input field
//        'name' => 'my_input_name',
        // Some options, see http://imperavi.com/redactor/docs/
        'options' => [
//            'toolbar' => false,
            'css' => 'wym.css',
        ],
        'plugins' => [
            'fullscreen',
//            'clips'
        ]
    ]);
    ?>

    <legend>Контактные данные</legend>
    <div class="row">
        <div class="col-md-4">
            <?= $form->field($model, 'city_id')->dropDownList(ArrayHelper::map(City::find()->asArray()->all(), 'id', 'name'), ['prompt' => '']) ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'phone')->textInput() ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'email')->textInput() ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <?= $form->field($model, 'site')->textInput(['maxlength' => 255]) ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'site_nhl')->textInput(['maxlength' => 255]) ?>
        </div>
    </div>





    <legend>Служебная информация</legend>


    <div class="row">
        <div class="col-md-4">
            <?= $form->field($model, 'sort')->textInput() ?>
        </div>
    </div>

    <?= $form->field($model, 'status')->checkbox(['value' => $model::STATUS_ACTIVE]) ?>

    <?php $tab_1 = ob_get_clean() ?>


    <?php ob_start() ?>
    <?= $this->renderFile('@app/views/sub_views/load_files.php', ['type' => 'team']) ?>
    <?php $tab_3 = ob_get_clean() ?>

    <?php ob_start() ?>
    <legend>Логотип</legend>
    <?= $form->field($model, 'image_')->fileInput() ?>

    <?php
    if (!$model->isNewRecord && $image = $model->getImage('_medium', ['style' => 'max-width:100%'])) {
        echo $form->field($model, 'deleteImage')->checkbox();
        echo $image;
    }
    ?>

    <legend>Фотографии</legend>
    <p><i>Фотографии отсутствуют</i></p>

    <?php $photos = ob_get_clean() ?>

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
                'label' => 'Документы',
                'content' => $tab_3 . $button,
                'headerOptions' => [],
            ],
            [
                'label' => 'Фотографии и логотип',
                'content' => $photos . $button,
            ],
        ],
    ]);
    ?>

    <?php ActiveForm::end(); ?>


</div>
