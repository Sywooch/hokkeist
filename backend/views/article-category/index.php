<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Breadcrumbs;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\articleCategory */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Article Categories';
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
            <?= Html::a('Create Article Category', ['create'], ['class' => 'btn btn-success']) ?>
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
		    'attribute' => 'name',
		],
		[
		    'attribute' => 'alias',
		],
		[
		    'attribute' => 'parent',
		],
		[
		    'attribute' => 'status',
		    'value' => function ($model, $index, $widget) {
		        return $model->status == 10 ? 'Активный' : 'Не активный';
		     },
		    'filter' => Html::dropDownList('ArticleCategory[status]', $searchModel->status, ['10' => 'Активный', '0' => 'Не активный']),
		],
// 		[
// 		    'attribute' => 'keywords',
// 		],
// 		[
// 		    'attribute' => 'description',
// 		],

            ['class' => 'yii\grid\ActionColumn','options' => ['style' => 'width:56px;']],
            ],
            ]); ?>
        
    </div>
</div>