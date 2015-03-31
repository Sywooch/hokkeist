<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Match */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="match-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <?= $form->field($model, 'sort')->textInput() ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <?= $form->field($model, 'creator_id')->textInput() ?>

    <?= $form->field($model, 'updator_id')->textInput() ?>

    <?= $form->field($model, 'number')->textInput() ?>

    <?= $form->field($model, 'day')->textInput() ?>

    <?= $form->field($model, 'time')->textInput() ?>

    <?= $form->field($model, 'team_1')->textInput() ?>

    <?= $form->field($model, 'team_2')->textInput() ?>

    <?= $form->field($model, 'stadium_id')->textInput() ?>

    <?= $form->field($model, 'season_id')->textInput() ?>

    <?= $form->field($model, 'competition_id')->textInput() ?>

    <?= $form->field($model, 'division_id')->textInput() ?>

    <?= $form->field($model, 'stage_id')->textInput() ?>

    <?= $form->field($model, 'group_id')->textInput() ?>

    <?= $form->field($model, 'tour_id')->textInput() ?>

    <?= $form->field($model, 'goal_1')->textInput() ?>

    <?= $form->field($model, 'goal_2')->textInput() ?>

    <?= $form->field($model, 'points_1')->textInput() ?>

    <?= $form->field($model, 'points_2')->textInput() ?>

    <?= $form->field($model, 'result')->dropDownList([ 'maintime' => 'Maintime', ], ['prompt' => '']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Сохранить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
