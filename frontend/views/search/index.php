<?php

use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\bootstrap\ButtonGroup;
use yii\bootstrap\Button;

$this->title = !$_GET['text'] ? "Поиск по сайту" : 'Результаты поиска';
$names = ['team' => 'Поиск по командам ', 'player' => 'Поиск по игрокам ', 'news' => 'Поиск в новостях '];

$function = function($res, $key, $names) {
    $resText = count($res) == 0 ? 'не дал результатов' : Html::tag('small', 'Найдено ' . count($res));
    echo Html::beginTag('h2') . $names[$key] . $resText . Html::endTag('h2');
    for ($i = 0; $i < count($res); $i++)
        try {
            echo $this->render('_' . $key, ['model' => $res[$i], 'i' => $i]);
        } catch (Exception $exc) {
            throw new \yii\web\HttpException(500, 'Во время выполнения поиска произошла ошибка');
        }
};
?>
<div id='search-result'>
    <h1><?= $this->title ?></h1>
    <?php $form = ActiveForm::begin(['action' => '/search', 'method' => 'GET']); ?>
    <?= $form->field($model, 'text')->textInput(['placeholder' => "Что будем искать", 'class' => 'search-input', 'style' => 'height: 34px; color:white; font-size:13px;'])->label(false); ?>

    <?php
    echo ButtonGroup::widget([
        'buttons' => [
            Html::submitButton('Найти', ['class' => (empty($model->target)) ? 'find-cat-btm  a' : 'find-cat-btm ', 'style' => 'background:#2c497e; width: 150px; margin-right: 7px']),
            Html::submitButton('По командам', ['class' => ($model->target == 'team') ? 'find-cat-btm  a' : 'find-cat-btm ', 'name' => 'SearchForm[target]', 'value' => 'team']),
            Html::submitButton('По игрокам', ['class' => ($model->target == 'player') ? 'find-cat-btm  a' : 'find-cat-btm ', 'name' => 'SearchForm[target]', 'value' => 'player']),
            Html::submitButton('В новостях', ['class' => ($model->target == 'news') ? 'find-cat-btm  a' : 'find-cat-btm ', 'name' => 'SearchForm[target]', 'value' => 'news']),
        ],
        'options' => ['class' => 'form-group ']
    ]);
    ActiveForm::end();
    
    echo !empty($result) ? '<div class="hr"></div>' : '';
    
    if (!empty($model->text)) {
        if (empty($model->target) && count($result) == 3) {
            array_multisort($result, SORT_DESC);
            foreach ($result as $key => $res) {
                $function($res, $key, $names);
            }
        } else if (!empty($model->target)) {
            $function($result, $model->target, $names);
        }
    }
    ?>
</div>