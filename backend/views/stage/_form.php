<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\stage */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="stage-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <?= $form->field($model, 'sort')->textInput() ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <?= $form->field($model, 'creator_id')->textInput() ?>

    <?= $form->field($model, 'updator_id')->textInput() ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'season_id')->textInput() ?>

    <?= $form->field($model, 'competition_id')->textInput() ?>

    <?= $form->field($model, 'division_id')->textInput() ?>

    <?= $form->field($model, 'type')->dropDownList([ 'round' => 'Round', 'playoff' => 'Playoff', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'tours_count')->textInput() ?>

    <?= $form->field($model, 'round_count')->textInput() ?>

    <?= $form->field($model, 'players_count')->textInput() ?>

    <?= $form->field($model, 'points_win')->textInput() ?>

    <?= $form->field($model, 'points_win_overtime')->textInput() ?>

    <?= $form->field($model, 'points_win_shootouts')->textInput() ?>

    <?= $form->field($model, 'points_draw')->textInput() ?>

    <?= $form->field($model, 'points_defeat')->textInput() ?>

    <?= $form->field($model, 'points_defeat_overtime')->textInput() ?>

    <?= $form->field($model, 'points_defeat_shootouts')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Сохранить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
