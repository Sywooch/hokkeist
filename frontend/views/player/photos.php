<?php
/* @var $this yii\web\View */
$this->title = "Фотографии игрока: " . $model->fullname . '(ХК "' . $model->team->name . ", " . $model->city->name . ')';
?>
<div class="content-container">
    <h1><?= $this->title ?></h1>

    <p>
        К сожалению, фотографии этого игрока пока отсутствует.
    </p>
    <p><?= yii\helpers\Html::a('Вернуться назад', ['player/view', 'id' => $model->id]) ?></p>
</div>
