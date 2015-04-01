<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

$this->title = $name;
Yii::$app->controller->layout = 'content';
?>

<h1><?= $this->title ?></h1>

<p>Произошла ошибка:  <b><?= nl2br(Html::encode($message)) ?></b></p>
<br />
<p>
    Вы можете вернуться на <a href="/">главную страницу</a> или воспользоваться поиском
</p>


