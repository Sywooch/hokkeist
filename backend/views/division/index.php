<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Breadcrumbs;
use yii\helpers\ArrayHelper;
use common\models\Season;
use common\models\Competition;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\division */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Дивизионы';
$this->params['breadcrumbs'][] = $this->title;

Breadcrumbs::widget([
    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
    'options' => ['class' => Yii::$app->params['breadcrumbClass']],
])
?>

<h1 class="page-header"><?= Html::encode($this->title) ?> <?= isset($smallText) ? Html::tag('small', $smallText) : '' ?></h1>

<!-- begin panel -->
<div class="panel panel-inverse">
    <div class="panel-heading">
        <h4 class="panel-title">Список дивизионов</h4>
    </div>

    <div class="panel-body">
        <p class="text-right">
            <?= Html::a('Очистить фильтр поиска', ['index'], ['class' => 'btn btn-link']) ?>    
            <?= Html::a('Добавить новый дивизион', ['create'], ['class' => 'btn btn-success']) ?>
        </p> 

        <?=
        GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [

                [
                    'attribute' => 'id',
                    'options' => ['style' => 'width:50px;'],
                ],
                'name',
                [
                    'attribute' => 'season_id',
                    'format' => 'html',
                    'value' => function ($model, $index, $widget) {
                        return $model->season->name;
                    },
                             'filter' => Html::dropDownList('division[season_id]', $searchModel->season_id, ArrayHelper::map(Season::find()->asArray()->all(), 'id', 'name'), ['class' => 'form-control','prompt' => '--- все ---']), 
                        ],
                            [
                    'attribute' => 'competition_id',
                    'format' => 'html',
                    'value' => function ($model, $index, $widget) {
                        return $model->competition->name;
                    },
                             'filter' => Html::dropDownList('division[competition_id]', $searchModel->competition_id, ArrayHelper::map(Competition::find()->asArray()->all(), 'id', 'name'), ['class' => 'form-control','prompt' => '--- все ---']), 
                        ],
                            
//                [
//                    'attribute' => 'status',
//                    'value' => function ($model, $index, $widget) {
//                        return $model->status == 10 ? 'Активный' : 'Не активный';
//                    },
//                    'filter' => Html::dropDownList('division[status]', $searchModel->status, ['10' => 'Активный', '0' => 'Не активный']),
//                ],
              
// 		[
// 		    'attribute' => 'creator_id',
// 		],
// 		[
// 		    'attribute' => 'updator_id',
// 		],
// 		[
// 		    'attribute' => 'season_id',
// 		],
// 		[
// 		    'attribute' => 'competition_id',
// 		],
// 		[
// 		    'attribute' => 'start_year',
// 		],
// 		[
// 		    'attribute' => 'end_year',
// 		],
// 		[
// 		    'attribute' => 'is_modered',
// 		],
// 		[
// 		    'attribute' => 'is_closed',
// 		],
// 		[
// 		    'attribute' => 'is_bid',
// 		],
                ['class' => 'yii\grid\ActionColumn', 'options' => ['style' => 'width:56px;']],
            ],
        ]);
        ?>

    </div>
</div>