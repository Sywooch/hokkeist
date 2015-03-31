<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\search\stage */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="stage-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'status') ?>

    <?= $form->field($model, 'sort') ?>

    <?= $form->field($model, 'created_at') ?>

    <?= $form->field($model, 'updated_at') ?>

    <?php // echo $form->field($model, 'creator_id') ?>

    <?php // echo $form->field($model, 'updator_id') ?>

    <?php // echo $form->field($model, 'name') ?>

    <?php // echo $form->field($model, 'season_id') ?>

    <?php // echo $form->field($model, 'competition_id') ?>

    <?php // echo $form->field($model, 'division_id') ?>

    <?php // echo $form->field($model, 'type') ?>

    <?php // echo $form->field($model, 'tours_count') ?>

    <?php // echo $form->field($model, 'round_count') ?>

    <?php // echo $form->field($model, 'players_count') ?>

    <?php // echo $form->field($model, 'points_win') ?>

    <?php // echo $form->field($model, 'points_win_overtime') ?>

    <?php // echo $form->field($model, 'points_win_shootouts') ?>

    <?php // echo $form->field($model, 'points_draw') ?>

    <?php // echo $form->field($model, 'points_defeat') ?>

    <?php // echo $form->field($model, 'points_defeat_overtime') ?>

    <?php // echo $form->field($model, 'points_defeat_shootouts') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
