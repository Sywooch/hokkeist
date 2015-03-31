<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\Breadcrumbs;

/* @var $this yii\web\View */
/* @var $model common\models\stage */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Stages', 'url' => ['index']];
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
		    'attribute' => 'status',
		    'value' => $model->status == 10 ? 'Активный' : 'Не активный',
            ],
            [
		    'attribute' => 'sort',
            ],
            [
		    'attribute' => 'created_at',
            ],
            [
		    'attribute' => 'updated_at',
            ],
            [
		    'attribute' => 'creator_id',
            ],
            [
		    'attribute' => 'updator_id',
            ],
            [
		    'attribute' => 'name',
            ],
            [
		    'attribute' => 'season_id',
            ],
            [
		    'attribute' => 'competition_id',
            ],
            [
		    'attribute' => 'division_id',
            ],
            [
		    'attribute' => 'type',
            ],
            [
		    'attribute' => 'tours_count',
            ],
            [
		    'attribute' => 'round_count',
            ],
            [
		    'attribute' => 'players_count',
            ],
            [
		    'attribute' => 'points_win',
            ],
            [
		    'attribute' => 'points_win_overtime',
            'format' => 'datetime',
            ],
            [
		    'attribute' => 'points_win_shootouts',
            ],
            [
		    'attribute' => 'points_draw',
            ],
            [
		    'attribute' => 'points_defeat',
            ],
            [
		    'attribute' => 'points_defeat_overtime',
            'format' => 'datetime',
            ],
            [
		    'attribute' => 'points_defeat_shootouts',
            ],
        ],
        ]) ?>
    </div>
</div>
