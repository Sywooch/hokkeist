<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Breadcrumbs;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\stage */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Стадии';
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
            <?= Html::a('Create Stage', ['create'], ['class' => 'btn btn-success']) ?>
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
		    'filter' => Html::dropDownList('stage[status]', $searchModel->status, ['10' => 'Активный', '0' => 'Не активный']),
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
// 		    'attribute' => 'name',
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
// 		    'attribute' => 'type',
// 		],
// 		[
// 		    'attribute' => 'tours_count',
// 		],
// 		[
// 		    'attribute' => 'round_count',
// 		],
// 		[
// 		    'attribute' => 'players_count',
// 		],
// 		[
// 		    'attribute' => 'points_win',
// 		],
// 		[
// 		    'attribute' => 'points_win_overtime',
// 		    'format' => 'datetime',
// 		],
// 		[
// 		    'attribute' => 'points_win_shootouts',
// 		],
// 		[
// 		    'attribute' => 'points_draw',
// 		],
// 		[
// 		    'attribute' => 'points_defeat',
// 		],
// 		[
// 		    'attribute' => 'points_defeat_overtime',
// 		    'format' => 'datetime',
// 		],
// 		[
// 		    'attribute' => 'points_defeat_shootouts',
// 		],

            ['class' => 'yii\grid\ActionColumn','options' => ['style' => 'width:56px;']],
            ],
            ]); ?>
        
    </div>
</div>