<?php

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
?>
<div class="widget clearfix">
    <div class="col-lg-2" id="subscribe-form">
        <div class="hr-min-top"></div>
        <h3>Подпишись!</h3>
        <span id="subtitle">И узнавай все первым</span>
        <div class="hr-foto-video"></div>
        <?php $form = ActiveForm::begin(['action' => ['subscribe/index']]) ?>
        <p>
            <?= Html::checkbox('Subscribe[news]', 1, ['hidden' => 'hidden', 'id' => 'Subscribe[news]']) ?>
            <?= Html::label('На новости', 'Subscribe[news]') ?>
        </p>
        <p>
            <?= Html::checkbox('Subscribe[tour]', 1, ['hidden' => 'hidden', 'id' => 'Subscribe[tour]']) ?>
            <?= Html::label('На предстоящие турниры', 'Subscribe[tour]') ?>
        </p>
        <div class="hr-foto-video"></div>
        <?= $form->field($model, 'email')->textInput(['id' => 'email-inpt','placeholder' => 'ivanov@example.com','class' => ''] )->label(false) ?>
        <div>
            <?= Html::submitButton('Подписаться', ['id' => 'subscribe-btm']) ?>
        </div
        <?php ActiveForm::end(); ?>
        <div class="hr-min-bottom"></div>
    </div>
</div>