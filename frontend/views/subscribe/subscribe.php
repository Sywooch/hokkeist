<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = "Подписка на новости и предстоящие турниры по Хоккею в ХМАО-Югре";
?>

<h1>Подписка на новости и предстоящие турниры</h1>


<p>Вы можете подписатсья на рассылку новостей и предстоящих турниров. Для этого достаточно указать свой email-адрес.</p>

<?php $form = ActiveForm::begin(); ?>

<?= $form->field($model, 'email')->textInput(['placeholder' => "Укажите ваш электронный адрес", 'class' => 'search-input', 'style' => 'height: 34px; color:white; font-size:13px;'])->label(false); ?>


<p>
    <?= $form->field($model, 'news', [])->checkBox(['style' => 'display:block;'])->label() ?>
    <?= $form->field($model, 'tour', [])->checkBox(['style' => 'display:block;'])->label() ?>
</p>

<?= Html::submitButton('Подписаться', ['class' => 'find-cat-btm', 'style' => 'background:#2c497e; width: 220px; text-align:center;padding: 15px 10px; margin: 0;']) ?>
<?php ActiveForm::end(); ?>