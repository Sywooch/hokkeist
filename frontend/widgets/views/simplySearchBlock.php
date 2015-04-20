<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

//yii\helpers\VarDumper::dump($model,15,true);
//die();
?>

<div class="widget clearfix">
    <?php $form = ActiveForm::begin(['action' => '/search', 'method' => 'GET']); ?>
    <div id="simple-search">
        <div class="hr-min-top"></div>
        <h3>Простой поиск</h3>
        <div id="hr-review-search"></div>
        <?= $form->field($model, 'text')->textInput(['placeholder' => "Что будем искать",'class' => ''])->label(false); ?>
        <?= Html::submitButton('Найти', ['class' => 'btn btn-primary', 'id' => 'find-btm']) ?>

        <?= Html::submitButton('По клубам', ['class' => 'find-cat-btm', 'name' => 'SearchForm[target]', 'value' => 'team']) ?>
        <?= Html::submitButton('По игрокам', ['class' => 'find-cat-btm', 'name' => 'SearchForm[target]', 'value' => 'player']) ?>
        <?= Html::submitButton('По новостям', ['class' => 'find-cat-btm', 'name' => 'SearchForm[target]', 'value' => 'news']) ?>

        <div class="hr-min-bottom"></div>
    </div>
    <?php ActiveForm::end(); ?>
</div>