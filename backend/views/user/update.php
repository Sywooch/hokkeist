<?php

use yii\helpers\Html;
use yii\widgets\Breadcrumbs;

/* @var $this yii\web\View */
/* @var $model common\models\User */

$this->title = 'Редактирование пользователя:' . ' ' . $model->username;
$this->params['breadcrumbs'][] = ['label' => 'Пользователи', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->username, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Редактирование';
?>


<h1 class="page-header"><?= $this->title ?> <?= isset($smallText) ? yii\helpers\Html::tag('small', $smallText) : '' ?></h1>

<div class="row">
    <div class="col-md-6">
        <div data-sortable-id="ui-general-1" class="panel panel-inverse">
            <div class="panel-heading">
                <h4 class="panel-title">Редактирование пользователя</h4>
            </div>
            <div class="alert alert-success fade in">
                <span data-dismiss="alert" class="close">×</span>
                <i class="fa fa-check fa-2x pull-left"></i>
                <p>Данные пользователя успешно сохранены!</p>
            </div>
            <div class="panel-body">
                <?=
                $this->render('_form', [
                    'model' => $model,
                ])
                ?>
            </div>
        </div>
    </div>
</div>
