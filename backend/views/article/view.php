<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\Breadcrumbs;

/* @var $this yii\web\View */
/* @var $model common\models\Article */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Articles', 'url' => ['index']];
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
		    'attribute' => 'title',
            ],
            [
		    'attribute' => 'subtitle',
            'format' => 'ntext',
            ],
            [
		    'attribute' => 'fulltext',
            'format' => 'ntext',
            ],
            [
		    'attribute' => 'category_id',
            ],
            [
		    'attribute' => 'publish_at',
            ],
            [
		    'attribute' => 'created_at',
            ],
            [
		    'attribute' => 'modified_at',
            ],
            [
		    'attribute' => 'creator_id',
            ],
            [
		    'attribute' => 'author_alias',
            ],
            [
		    'attribute' => 'updator_id',
            ],
            [
		    'attribute' => 'status',
		    'value' => $model->status == 10 ? 'Активный' : 'Не активный',
            ],
            [
		    'attribute' => 'comments',
            ],
            [
		    'attribute' => 'imgtitle',
            ],
            [
		    'attribute' => 'showImage',
            ],
            [
		    'attribute' => 'hits',
            ],
            [
		    'attribute' => 'sort',
            ],
        ],
        ]) ?>
    </div>
</div>
