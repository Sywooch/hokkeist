<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\Breadcrumbs;

/* @var $this yii\web\View */
/* @var $model common\models\ArticleCategory */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Article Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

Breadcrumbs::widget([
'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
'options' => ['class' => Yii::$app->params['breadcrumbClass']],
])
?>

<h1 class="page-header"><?=  $this->title ?> <?=  isset($smallText) ? yii\helpers\Html::tag('small', $smallText) : '' ?></h1>

<div data-sortable-id="ui-general-1" class="panel panel-inverse">
    <div class="panel-heading">
        <h4 class="panel-title">Panel title</h4>
    </div>
    <div class="panel-body">

        <p>
            <?= Html::a('Редактировать', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
            'confirm' => 'Вы действительно хотите удалить эту запись?',
            'method' => 'post',
            ],
            ]) ?>
        </p>

        <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
                    [
		    'attribute' => 'id',
            ],
            [
		    'attribute' => 'name',
            ],
            [
		    'attribute' => 'alias',
            ],
            [
		    'attribute' => 'parent',
            ],
            [
		    'attribute' => 'status',
		    'value' => $model->status == 10 ? 'Активный' : 'Не активный',
            ],
            [
		    'attribute' => 'keywords',
            ],
            [
		    'attribute' => 'description',
            ],
        ],
        ]) ?>
    </div>
</div>
