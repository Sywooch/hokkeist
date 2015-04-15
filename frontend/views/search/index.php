<?php

use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\bootstrap\ButtonGroup;
use yii\bootstrap\Button;

$this->title = !$_GET['text'] ? "Поиск по сайту" : 'Результаты поиска';
?>
<div id='search-result'>
    <h1><?= $this->title ?></h1>
    <?php $form = ActiveForm::begin(['action' => '/search', 'method' => 'GET']); ?>
    <?= $form->field($model, 'text')->textInput(['placeholder' => "Что будем искать", 'class' => 'search-input', 'style' => 'height: 34px;'])->label(false); ?>


    <?=
    ButtonGroup::widget([
        'buttons' => [
            Html::submitButton('По клубам', ['class' => 'find-cat-btm ' . (1 == 2) ? 'find-cat-btm  active' : '', 'name' => 'SearchForm[target]', 'value' => 'team']),
            Html::submitButton('По игрокам', ['class' => 'find-cat-btm', 'name' => 'SearchForm[target]', 'value' => 'player']),
            Html::submitButton('В новостях', ['class' => 'find-cat-btm', 'name' => 'SearchForm[target]', 'value' => 'news']),
        ],
        'options' => ['class' => 'form-group ']
    ]);
    ?>

    <?php ActiveForm::end();
    ?>
    <?= !empty($result) ? '<div class="hr"></div>' : ''; ?> 
<!--<input type='submit' value="Искать" >-->
    <?php
    switch ($model->target) {
        case 'player':
            echo yii\helpers\Html::tag('h2', 'Поиск по игрокам <small>Найдено ' . count($result) . '</small>');
            for ($i = 0; $i < count($result); $i++)
                echo $this->render('_player', ['model' => $result[$i], 'i' => $i]);
            break;

        default:
            break;
    }
    ?>
</div>