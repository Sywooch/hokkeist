<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Breadcrumbs;

use yii\helpers\ArrayHelper;
use common\models\Season;
/* @var $this yii\web\View */
/* @var $searchModel app\models\search\competition */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Соревнования';
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
        <h4 class="panel-title">Список соревнований</h4>
    </div>

    <div class="panel-body">
        <p class="text-right">
            <?= Html::a('Очистить фильтр поиска', ['index'], ['class' => 'btn btn-link']) ?>    
            <?= Html::a('Добавить новое соревнование', ['create'], ['class' => 'btn btn-success']) ?>
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
                [
                    'attribute' => 'name',
                    'format' => 'html',
                    'value' => function ($model, $index, $widget) {
                        return Html::a($model->name, ['view', 'id' => $model->id], ['title' => $model->fullname]);
                    },
                        ],
                            [
                    'attribute' => 'season_id',
                    'format' => 'html',
                    'value' => function ($model, $index, $widget) {
                        return $model->season->name;
                    },
                             'filter' => Html::dropDownList('competition[season_id]', $searchModel->season_id, ArrayHelper::map(Season::find()->asArray()->all(), 'id', 'name'), ['class' => 'form-control','prompt' => '--- все ---']), 
                        ],
//                [
//                    'attribute' => 'status',
//                    'value' => function ($model, $index, $widget) {
//                        return $model->status == 10 ? 'Активный' : 'Не активный';
//                    },
//                    'filter' => Html::dropDownList('competition[status]', $searchModel->status, ['10' => 'Активный', '0' => 'Не активный']),
//                ],
                        [
                            'attribute' => 'created_at',
                            'format' => 'date',
                            'filter' => yii\jui\DatePicker::widget([
                                'model' => $searchModel,
                                'attribute' => 'created_at',
                                'options' => ['class' => 'form-control'],
//                                'dateFormat' => 'dd-MM-yyyy',
                            ]),
                        ],
                        [
                            'attribute' => 'updated_at',
                            'format' => 'date',
                            'filter' => yii\jui\DatePicker::widget([
                                'model' => $searchModel,
                                'attribute' => 'updated_at',
                                'options' => ['class' => 'form-control'],
//                                'dateFormat' => 'dd-MM-yyyy',
                            ]),
                        ],

// 		[
// 		    'attribute' => 'is_now',
// 		],
// 		[
// 		    'attribute' => 'is_request_now',
// 		],
// 		[
// 		    'attribute' => 'transition_type',
// 		],
// 		[
// 		    'attribute' => 'is_modered',
// 		],
// 		[
// 		    'attribute' => 'is_closed',
// 		],
// 		[
// 		    'attribute' => 'hashtag',
// 		],
// 		[
// 		    'attribute' => 'for_import',
// 		],
                        ['class' => 'yii\grid\ActionColumn', 'options' => ['style' => 'width:56px;']],
                    ],
                ]);
                ?>

    </div>
</div>