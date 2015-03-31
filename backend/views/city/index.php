<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Breadcrumbs;
use yii\helpers\Url;
use yii\bootstrap\Modal;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\city */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Города';
$this->params['breadcrumbs'][] = $this->title;

echo Breadcrumbs::widget([
    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
    'options' => ['class' => Yii::$app->params['breadcrumbClass']],
])
?>

<?php
Modal::begin([
    'id' => 'modal',
    'options' => ['style' => ''],
    'header' => '<h4 class="modal-title">Добавить новый город</h4>',
]);
echo "<div id='modalContent'></div>";
Modal::end();
?>

<h1 class="page-header"><?= Html::encode($this->title) ?> <?= isset($smallText) ? Html::tag('small', $smallText) : '' ?></h1>

<!-- begin panel -->
<div class="panel panel-inverse">
    <div class="panel-heading">
        <h4 class="panel-title">Список городов</h4>
    </div>

    <div class="panel-body">
        <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

        <p class="text-right">
             <?= Html::a('Очистить фильтр поиска', ['index'], ['class' => 'btn btn-link']) ?>    
            <?=
            Html::button(
                    'Добавить новый город', ['value' => Url::to(['create']),
                'id' => 'modalButton',
                'class' => 'btn btn-success',
            ])
            ?>
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
                        return Html::a($model->name, ['view', 'id' => $model->id]);
                    },
                        ],
                        
                        [
                            'attribute' => 'creator_id',
                            'value' => function ($model, $index, $widget) {
                                return $model->creator->fullNameWithLogin;
                            },
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
 		[
 		    'attribute' => 'sort',
 		],
// 		[
// 		    'attribute' => 'creator',
// 		],
                        ['class' => 'yii\grid\ActionColumn'],
                    ],
                ]);
                ?>

    </div>
</div>