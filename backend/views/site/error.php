<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

$this->title = $name;
?>

<h1 class="page-header"><?= $this->title ?> <?= isset($smallText) ? yii\helpers\Html::tag('small', $smallText) : '' ?></h1>

<!-- begin panel -->
<div data-sortable-id="ui-general-1" class="panel">
    <div class="panel-heading">
        <h4 class="panel-title">Описание ошибки</h4>
    </div>
    <div class="panel-body">
        <div class="alert alert-danger">
            <?= nl2br(Html::encode($message)) ?>
        </div>

        <p>
            The above error occurred while the Web server was processing your request.
        </p>
        <p>
            Please contact us if you think this is a server error. Thank you.
        </p>
        <hr />
        <div>
            <a class="btn btn-success" href="<?= $_SERVER['HTTP_REFERER'] ?>">Вернуться назад</a>
        </div>
    </div>
</div>
