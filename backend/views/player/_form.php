<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\City;
use yii\jui\DatePicker;
use common\models\Team;

/* @var $this yii\web\View */
/* @var $model common\models\player */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="player-form">

    <?php $form = ActiveForm::begin(); ?>


    <?php ob_start() ?>
    <legend>Личные данные</legend>
    <div class="row">
        <div class="col-md-4">
            <?= $form->field($model, 'lastname')->textInput(['maxlength' => 100]) ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'firstname')->textInput(['maxlength' => 100]) ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'middlename')->textInput(['maxlength' => 100]) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <?= $form->field($model, 'id_')->textInput(['maxlength' => 20]) ?>
        </div>
        <div class="col-md-4">
            <?=
            $form->field($model, 'birthday')->widget('yii\jui\DatePicker', [
                'options' => ['class' => 'form-control'],
                'clientOptions' => [
                    'changeYear' => true,
                    'changeMonth' => true,
                    'yearRange' => (date('Y') - Yii::$app->params['age']['max']) . ':' . (date('Y') - Yii::$app->params['age']['min'])
                ],
            ])
            ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'birth_place')->textInput(['maxlength' => 150]) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3">
            <?=
            $form->field($model, 'height', [
                'inputTemplate' => '<div class="input-group">{input}<span class="input-group-addon">см</span></div>',
            ])->textInput()
            ?>
        </div>
        <div class="col-md-3">
            <?=
            $form->field($model, 'weight', [
                'inputTemplate' => '<div class="input-group">{input}<span class="input-group-addon">кг</span></div>',
            ])->textInput()
            ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($model, 'grip')->dropDownList([ 'Левый' => 'Левый', 'Правый' => 'Правый',], ['prompt' => '']) ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($model, 'role')->dropDownList([ 'Вратарь' => 'Вратарь', 'Защитник' => 'Защитник', 'Нападающий' => 'Нападающий',], ['prompt' => '']) ?>
        </div>
    </div>
    <?= $form->field($model, 'team_id')->dropDownList($model->teamList, ['prompt' => '']) ?>

    <legend>Служебная информация</legend>


    <?= $form->field($model, 'sort')->textInput() ?>

    <?= $form->field($model, 'status')->checkbox(['value' => $model::STATUS_ACTIVE]) ?>

    <?php // $form->field($model, 'death_date')->textInput()   ?>

    <?php $tab_1 = ob_get_clean() ?>

    <?php ob_start() ?>
    <legend>Контактные данные</legend>
    <div class="row">
        <div class="col-md-4">
            <?= $form->field($model, 'city_id')->dropDownList(ArrayHelper::map(City::find()->asArray()->all(), 'id', 'name'), ['prompt' => '']) ?>
        </div>
        <div class="col-md-8">
            <?= $form->field($model, 'address')->textInput(['maxlength' => 150]) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'email')->textInput(['maxlength' => 100]) ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'phone')->textInput(['maxlength' => 50]) ?>
        </div>
    </div>

    <legend>Паспортные данные</legend>
    <div class="row">
        <div class="col-md-4">
            <?= $form->field($model, 'pass_serial')->textInput() ?>
        </div>
        <div class="col-md-8">
            <?= $form->field($model, 'pass_number')->textInput() ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <?=
            $form->field($model, 'pass_issue_date')->widget('yii\jui\DatePicker', [
                'options' => ['class' => 'form-control'],
                'clientOptions' => [
                    'changeYear' => true,
                    'changeMonth' => true,
                    'yearRange' => '1980:2015'
                ],
            ])
            ?>
        </div>
        <div class="col-md-8">
            <?= $form->field($model, 'pass_issued')->textInput(['maxlength' => 100]) ?>
        </div>
    </div>
    <legend>Свидетельство о рождении</legend>
    <?= $form->field($model, 'birth_certificate')->textInput() ?>

    <legend>Загран. паспорт</legend>
    <?= $form->field($model, 'foreign_pass')->textInput(['maxlength' => 150]) ?>
    <?php $tab_2 = ob_get_clean() ?>

    <?php ob_start() ?>
    <legend>Загрузка файлов</legend>
    <blockquote class="f-s-14">
        <p>Вы можете загрузить сюда необходимые документы.</p>
    </blockquote>
    <form enctype="multipart/form-data" method="POST" action="assets/global/plugins/jquery-file-upload/server/php/" id="fileupload" class="">
        <div class="row fileupload-buttonbar">
            <div class="col-md-7">
                <span class="btn btn-success fileinput-button">
                    <i class="fa fa-plus"></i>
                    <span>Add files...</span>
                    <input type="file" multiple="" name="files[]">
                </span>
                <button class="btn btn-primary start" type="submit">
                    <i class="fa fa-upload"></i>
                    <span>Start upload</span>
                </button>
                <button class="btn btn-warning cancel" type="reset">
                    <i class="fa fa-ban"></i>
                    <span>Cancel upload</span>
                </button>
                <button class="btn btn-danger delete" type="button">
                    <i class="glyphicon glyphicon-trash"></i>
                    <span>Delete</span>
                </button>
                <!-- The global file processing state -->
                <span class="fileupload-process"></span>
            </div>
            <!-- The global progress state -->
            <div class="col-md-5 fileupload-progress fade">
                <!-- The global progress bar -->
                <div aria-valuemax="100" aria-valuemin="0" role="progressbar" class="progress progress-striped active">
                    <div style="width:0%;" class="progress-bar progress-bar-success"></div>
                </div>
                <!-- The extended global progress state -->
                <div class="progress-extended">&nbsp;</div>
            </div>
        </div>
        <!-- The table listing the files available for upload/download -->
        <table class="table table-striped" role="presentation"><tbody class="files"></tbody></table>
        <div class="alert alert-danger">Upload server currently unavailable - Wed Feb 25 2015 15:19:49 GMT+0500 (YEKT)</div></form>
    <?php $tab_3 = ob_get_clean() ?>

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
                'label' => 'Дополнительно',
                'content' => $tab_2 . $button,
                'headerOptions' => [],
            ],
            [
                'label' => 'Документы',
                'content' => $tab_3 . $button,
                'headerOptions' => [],
            ],
            [
                'label' => 'Фотографии',
                'content' => '<legend>Фотографии игрока</legend><p>Фотографии отсутствуют</p>',
            ],
        ],
    ]);
    ?>

    <?php ActiveForm::end(); ?>

</div>
