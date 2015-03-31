<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Breadcrumbs;
use yii\helpers\Url;
use yii\bootstrap\Modal;
use yii\helpers\ArrayHelper;
use common\models\City;
/* @var $this yii\web\View */
/* @var $searchModel app\models\search\organization */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Организации';
$this->params['breadcrumbs'][] = $this->title;

echo Breadcrumbs::widget([
    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
    'options' => ['class' => Yii::$app->params['breadcrumbClass']],
])
?>

<h1 class="page-header"><?= Html::encode($this->title) ?> <?= isset($smallText) ? Html::tag('small', $smallText) : '' ?></h1>

<!-- begin panel -->
<div class="panel panel-inverse">
    <div class="panel-heading">
        <h4 class="panel-title">Список организаций</h4>
    </div>

    <div class="panel-body">
        <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

        <p class="text-right">
            <?= Html::a('Очистить фильтр поиска', ['index'], ['class' => 'btn btn-link']) ?>
            <?= Html::a('Добавить новую организацию', ['create'], ['class' => 'btn btn-success']) ?>
        </p>

        <?=
        GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [

                [
                    'attribute' => 'id',
                    'options' => ['style' => 'width:70px;'],
                ],
                [
                    'attribute' => 'name',
                    'format' => 'html',
                    'value' => function ($model, $index, $widget) {
                        return Html::a($model->name, ['view', 'id' => $model->id], ['title' => $model->fullname]);
                    },
                        ],
//		[
//		    'attribute' => 'fullname',
//		],
//		[
//		    'attribute' => 'abbr',
//		],
                        [
                            'attribute' => 'city_id',
                            'value' => function ($model, $index, $widget) {
                                return $model->city->name;
                            },
                            'filter' => Html::dropDownList('organization[city_id]', $searchModel->city_id, ArrayHelper::merge(['' => '-- Все --'], ArrayHelper::map(City::find()->asArray()->all(), 'id', 'name')), ['class' => 'form-control']),
                        ],
// 		[
// 		    'attribute' => 'created_at',
// 		    'format' => 'date',
// 		    'filter' => false,
// 		],
// 		[
// 		    'attribute' => 'updated_at',
// 		],
                        [
                            'attribute' => 'address',
                        ],
                        [
                            'attribute' => 'phone',
                        ],
// 		[
// 		    'attribute' => 'email',
// 		    'format' => 'email',
// 		],
// 		[
// 		    'attribute' => 'about',
// 		    'format' => 'ntext',
// 		],
// 		[
// 		    'attribute' => 'creator',
// 		],
// 		[
// 		    'attribute' => 'updator',
// 		],
//                        [
//                            'attribute' => 'status',
//                            'value' => function ($model, $index, $widget) {
//                                return $model->status == 10 ? 'Активный' : 'Не активный';
//                            },
//                            'filter' => Html::dropDownList('organization[status]', $searchModel->status, ['10' => 'Активный', '0' => 'Не активный']),
//                        ],
                        ['class' => 'yii\grid\ActionColumn', 'options' => ['style' => 'width:56px;']],
                    ],
                ]);
                ?>

    </div>
</div>