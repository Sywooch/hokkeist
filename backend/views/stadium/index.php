<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Breadcrumbs;
use yii\helpers\Url;
use yii\bootstrap\Modal;
use yii\helpers\ArrayHelper;
use common\models\City;
/* @var $this yii\web\View */
/* @var $searchModel app\models\search\stadium */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Стадионы';
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
        <h4 class="panel-title">Список стадионов</h4>
    </div>

    <div class="panel-body">
        <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

        <p class="text-right">
            <?= Html::a('Очистить фильтр поиска', ['index'],['class' => 'btn btn-link']) ?>
            <?=
            Html::button(
                    'Добавить новый стадион', ['value' => Url::to(['stadium/create']),
                'id' => 'modalButton',
                'class' => 'btn btn-success',
            ])
            ?>
        </p>



        <?php
        Modal::begin([
            'id' => 'modal',
            'options' => ['style' => ''],
            'header' => '<h4 class="modal-title">Создать новый стадион</h4>',
//            'footer' => Html::submitButton($model->isNewRecord ? 'Создать' : 'Сохранить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']),
        ]);
        echo '<div id=\'modalContent\'></div>';
        Modal::end();
        ?>

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
//                [
//                    'attribute' => 'fullname',
//                ],
                        [
                            'attribute' => 'abbr',
                        ],
// 		[
// 		    'attribute' => 'description',
// 		    'format' => 'ntext',
// 		],
                        [
                            'attribute' => 'city_id',
                            'value' => function ($model, $index, $widget) {
                                return $model->city->name;
                            },
                            'filter' => Html::dropDownList('stadium[city_id]', $searchModel->city_id, ArrayHelper::merge(['' => '-- Все --'],ArrayHelper::map(City::find()->asArray()->all(), 'id', 'name')),['class' => 'form-control']),
                        ],
                        [
                            'attribute' => 'address',
                        ],
                        [
                            'attribute' => 'phone',
                        ],
// 		[
// 		    'attribute' => 'capacity',
// 		],
// 		[
// 		    'attribute' => 'created_at',
// 		    'format' => 'date',
// 		    'filter' => false,
// 		],
// 		[
// 		    'attribute' => 'updated_at',
// 		],
// 		[
// 		    'attribute' => 'sort',
// 		    'filter' => false,
// 		],
// 		[
// 		    'attribute' => 'active',
// 		],
// 		[
// 		    'attribute' => 'creator_id',
// 		],
// 		[
// 		    'attribute' => 'updator_id',
// 		],
                        ['class' => 'yii\grid\ActionColumn', 'options' => ['style' => 'width:56px;']],
                    ],
                ]);
                ?>

    </div>
</div>