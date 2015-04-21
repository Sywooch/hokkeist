<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Breadcrumbs;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\photoGallery */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Фотогалерея';
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
        <h4 class="panel-title">Список фотогалерей</h4>
    </div>

    <div class="panel-body">
        <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

        <p class="text-right">
            <?= Html::a('Очистить фильтр поиска', ['index'], ['class' => 'btn btn-link']) ?>    
            <?= Html::a('Добавить новую галерею', ['create'], ['class' => 'btn btn-success']) ?>
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
                    'value' => function ($model) {
                        return Html::a($model->name, ['view', 'id' => $model->id]);
                    }
                        ],
//                [
//                    'attribute' => 'status',
//                    'value' => function ($model, $index, $widget) {
//                        return $model->status == 10 ? 'Активный' : 'Не активный';
//                    },
//                    'filter' => Html::dropDownList('PhotoGallery[status]', $searchModel->status, ['10' => 'Активный', '0' => 'Не активный']),
//                ],
//                [
//                    'attribute' => 'sort',
//                    'filter' => false,
//                ],
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
// 		    'attribute' => 'description',
// 		    'format' => 'ntext',
// 		],
// 		[
// 		    'attribute' => 'count_photos',
// 		],
// 		[
// 		    'attribute' => 'hits',
// 		],
                        ['class' => 'yii\grid\ActionColumn', 'options' => ['style' => 'width:56px;']],
                    ],
                ]);
                ?>

    </div>
</div>