<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\search\competition */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="competition-search">

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

    <?php // echo $form->field($model, 'name') ?>

    <?php // echo $form->field($model, 'fullname') ?>

    <?php // echo $form->field($model, 'is_now') ?>

    <?php // echo $form->field($model, 'is_request_now') ?>

    <?php // echo $form->field($model, 'transition_type') ?>

    <?php // echo $form->field($model, 'is_modered') ?>

    <?php // echo $form->field($model, 'is_closed') ?>

    <?php // echo $form->field($model, 'hashtag') ?>

    <?php // echo $form->field($model, 'for_import') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
