<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\Breadcrumbs;

/* @var $this yii\web\View */
/* @var $model common\models\Match */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Matches', 'url' => ['index']];
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
		    'attribute' => 'number',
            ],
            [
		    'attribute' => 'day',
            ],
            [
		    'attribute' => 'time',
            ],
            [
		    'attribute' => 'team_1',
            ],
            [
		    'attribute' => 'team_2',
            ],
            [
		    'attribute' => 'stadium_id',
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
		    'attribute' => 'stage_id',
            ],
            [
		    'attribute' => 'group_id',
            ],
            [
		    'attribute' => 'tour_id',
            ],
            [
		    'attribute' => 'goal_1',
            ],
            [
		    'attribute' => 'goal_2',
            ],
            [
		    'attribute' => 'points_1',
            ],
            [
		    'attribute' => 'points_2',
            ],
            [
		    'attribute' => 'result',
            ],
        ],
        ]) ?>
    </div>
</div>
