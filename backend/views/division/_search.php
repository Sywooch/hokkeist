<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\search\division */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="division-search">

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

    <?php // echo $form->field($model, 'season_id') ?>

    <?php // echo $form->field($model, 'competition_id') ?>

    <?php // echo $form->field($model, 'start_year') ?>

    <?php // echo $form->field($model, 'end_year') ?>

    <?php // echo $form->field($model, 'is_modered') ?>

    <?php // echo $form->field($model, 'is_closed') ?>

    <?php // echo $form->field($model, 'is_bid') ?>

    <?php // echo $form->field($model, 'name') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
