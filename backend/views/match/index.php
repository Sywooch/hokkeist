<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Breadcrumbs;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\match */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Matches';
$this->params['breadcrumbs'][] = $this->title;

Breadcrumbs::widget([
'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
'options' => ['class' => Yii::$app->params['breadcrumbClass']],
])
?>

<h1 class="page-header"><?= Html::encode($this->title) ?> <?=  isset($smallText) ? Html::tag('small', $smallText) : '' ?></h1>

<!-- begin panel -->
<div class="panel panel-inverse">
    <div class="panel-heading">
        <h4 class="panel-title">Panel Title</h4>
    </div>

    <div class="panel-body">
                        <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
        
        <p class="text-right">
            <?= Html::a('Create Match', ['create'], ['class' => 'btn btn-success']) ?>
        </p>

                    <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
        'columns' => [

            		[
		    'attribute' => 'id',
		    'options' => ['style' => 'width:70px;'],
		],
		[
		    'attribute' => 'status',
		    'value' => function ($model, $index, $widget) {
		        return $model->status == 10 ? 'Активный' : 'Не активный';
		     },
		    'filter' => Html::dropDownList('Match[status]', $searchModel->status, ['10' => 'Активный', '0' => 'Не активный']),
		],
		[
		    'attribute' => 'sort',
		    'filter' => false,
		],
		[
		    'attribute' => 'created_at',
		    'format' => 'date',
		    'filter' => false,
		],
		[
		    'attribute' => 'updated_at',
		],
// 		[
// 		    'attribute' => 'creator_id',
// 		],
// 		[
// 		    'attribute' => 'updator_id',
// 		],
// 		[
// 		    'attribute' => 'number',
// 		],
// 		[
// 		    'attribute' => 'day',
// 		],
// 		[
// 		    'attribute' => 'time',
// 		],
// 		[
// 		    'attribute' => 'team_1',
// 		],
// 		[
// 		    'attribute' => 'team_2',
// 		],
// 		[
// 		    'attribute' => 'stadium_id',
// 		],
// 		[
// 		    'attribute' => 'season_id',
// 		],
// 		[
// 		    'attribute' => 'competition_id',
// 		],
// 		[
// 		    'attribute' => 'division_id',
// 		],
// 		[
// 		    'attribute' => 'stage_id',
// 		],
// 		[
// 		    'attribute' => 'group_id',
// 		],
// 		[
// 		    'attribute' => 'tour_id',
// 		],
// 		[
// 		    'attribute' => 'goal_1',
// 		],
// 		[
// 		    'attribute' => 'goal_2',
// 		],
// 		[
// 		    'attribute' => 'points_1',
// 		],
// 		[
// 		    'attribute' => 'points_2',
// 		],
// 		[
// 		    'attribute' => 'result',
// 		],

            ['class' => 'yii\grid\ActionColumn','options' => ['style' => 'width:56px;']],
            ],
            ]); ?>
        
    </div>
</div>