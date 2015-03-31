<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Breadcrumbs;
use yii\helpers\ArrayHelper;
use common\models\City;
use common\models\Organization;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\team */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Команды';
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
        <h4 class="panel-title">Список команд</h4>
    </div>

    <div class="panel-body">
        <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

        <p class="text-right">
            <?= Html::a('Очистить фильтр поиска', ['index'], ['class' => 'btn btn-link']) ?>    
            <?= Html::a('Добавить новую команду', ['create'], ['class' => 'btn btn-success']) ?>
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
                        return Html::a($model->name, ['view', 'id' => $model->id]);
                    },
                        ],
                        [
                            'attribute' => 'city_id',
                            'value' => function ($model, $index, $widget) {
                                return $model->city->name;
                            },
                            'filter' => Html::dropDownList('team[city_id]', $searchModel->city_id, ArrayHelper::merge(['' => '-- Все --'], ArrayHelper::map(City::find()->asArray()->all(), 'id', 'name')), ['class' => 'form-control']),
                        ],
                                    [
                            'attribute' => 'organization_id',
                            'value' => function ($model, $index, $widget) {
                                return $model->organization->name;
                            },
                            'filter' => Html::dropDownList('team[organization_id]', $searchModel->organization_id, ArrayHelper::merge(['' => '-- Все --'], ArrayHelper::map(Organization::find()->asArray()->all(), 'id', 'name')), ['class' => 'form-control']),
                        ],
//                [
//                    'attribute' => 'status',
//                    'value' => function ($model, $index, $widget) {
//                        return $model->status == 10 ? 'Активный' : 'Не активный';
//                    },
//                    'filter' => Html::dropDownList('team[status]', $searchModel->status, ['10' => 'Активный', '0' => 'Не активный'], ['class' => 'form-control', 'prompt' => '-- Любой --']),
//                ],
                        [
                            'attribute' => 'phone',
                        ],
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
// 		    'attribute' => 'cteator_id',
// 		],
// 		[
// 		    'attribute' => 'updator_id',
// 		],
// 		
// 		[
// 		    'attribute' => 'abbr',
// 		],
// 		
// 		[
// 		    'attribute' => 'email',
// 		    'format' => 'email',
// 		],
// 		[
// 		    'attribute' => 'site',
// 		],
// 		[
// 		    'attribute' => 'site_nhl',
// 		],
// 		[
// 		    'attribute' => 'description',
// 		    'format' => 'ntext',
// 		],
                        ['class' => 'yii\grid\ActionColumn', 'visible' => Yii::$app->user->can('actionButtons'), 'options' => ['style' => 'width:56px;']],
                    ],
                ]);
                ?>

    </div>
</div>