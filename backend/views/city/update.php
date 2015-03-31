<?php

use yii\helpers\Html;
use yii\widgets\Breadcrumbs;

/* @var $this yii\web\View */
/* @var $model common\models\city */

$this->title = 'Редактирование: ' . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Города', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Редактирование';
?>

<?php include __DIR__ . '/../sub_views/breadcrumbs.php' ?>

<h1 class="page-header"><?=  $this->title ?> <?=  isset($smallText) ? yii\helpers\Html::tag('small', $smallText) : '' ?></h1>

<div class="row">
    <div class="col-md-6">
        <div data-sortable-id="ui-general-1" class="panel panel-inverse">
            <div class="panel-heading">
                <h4 class="panel-title">Редактирование</h4>
            </div>
            <div class="panel-body">
                <?= $this->render('_form', [
                'model' => $model,
                ]) ?>
            </div>
        </div>
    </div>
</div>