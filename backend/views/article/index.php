<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Breadcrumbs;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\article */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Текстовые материалы';
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
        <h4 class="panel-title">Список записей</h4>
    </div>

    <div class="panel-body">
        <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

        <p class="text-right">
            <?= Html::a('Добавить новый', ['create'], ['class' => 'btn btn-success']) ?>
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
                    'attribute' => 'title',
                    'format' => 'html',
                    'value' => function($model) {
                        return Html::a($model->title, ['update', 'id' => $model->id]);
                    }
                        ],
//                        [
//                            'attribute' => 'subtitle',
//                            'format' => 'ntext',
//                            'value' => function($model, $index, $widget) {
//                                return \yii\helpers\StringHelper::truncateWords(strip_tags($model->subtitle), 10);
//                            }
//                        ],
                        [
                            'attribute' => 'category_id',
                            'value' => function($model, $index, $widget) {
                                return $model->category->name;
                            },
                            'filter' => Html::dropDownList('Article[category_id]', $searchModel->category_id, \yii\helpers\ArrayHelper::map(common\models\ArticleCategory::find()->all(), 'id', 'name', 'parent_id'), ['class' => 'form-control'])
                        ],
 		[
 		    'attribute' => 'publish_at',
                    'format' => 'date'
 		],
                                    [
 		    'attribute' => 'created_at',
                    'format' => 'date'
 		],
// 		[
// 		    'attribute' => 'created_at',
// 		    'format' => 'date',
// 		    'filter' => false,
// 		],
// 		[
// 		    'attribute' => 'modified_at',
// 		],
// 		[
// 		    'attribute' => 'creator_id',
// 		],
// 		[
// 		    'attribute' => 'author_alias',
// 		],
// 		[
// 		    'attribute' => 'updator_id',
// 		],
// 		[
// 		    'attribute' => 'status',
// 		    'value' => function ($model, $index, $widget) {
// 		        return $model->status == 10 ? 'Активный' : 'Не активный';
// 		     },
// 		    'filter' => Html::dropDownList('Article[status]', $searchModel->status, ['10' => 'Активный', '0' => 'Не активный']),
// 		],
// 		[
// 		    'attribute' => 'comments',
// 		],
// 		[
// 		    'attribute' => 'imgtitle',
// 		],
// 		[
// 		    'attribute' => 'showImage',
// 		],
// 		[
// 		    'attribute' => 'hits',
// 		],
// 		[
// 		    'attribute' => 'sort',
// 		    'filter' => false,
// 		],
                        ['class' => 'yii\grid\ActionColumn', 'options' => ['style' => 'width:56px;']],
                    ],
                ]);
                ?>

    </div>
</div>