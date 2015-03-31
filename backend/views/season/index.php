<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Breadcrumbs;
use yii\helpers\Url;
use yii\bootstrap\Modal;
use kartik\select2;
use yii\helpers\ArrayHelper;
use common\models\User;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\season */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Игровые сезоны';
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
    'header' => '<h4 class="modal-title">Добавить новый сезон</h4>',
]);
echo "<div id='modalContent'></div>";
Modal::end();
?>

<h1 class="page-header"><?= Html::encode($this->title) ?> <?= isset($smallText) ? Html::tag('small', $smallText) : '' ?></h1>

<!-- begin panel -->
<div class="<?= Yii::$app->params['panel']['class'] ?>">
    <div class="panel-heading">
        <h4 class="panel-title">Список сезонов</h4>
    </div>

    <div class="panel-body">
        <?php // echo $this->render('_search', ['model' => $searchModel]);   ?>

        <p class="text-right">
            <?= Html::a('Очистить фильтр поиска', ['index'], ['class' => 'btn btn-link']) ?>    
            <?=
            Html::button(
                    'Добавить новый сезон', ['value' => Url::to(['create']),
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
                            'filter' => select2\Select2::widget([
                                'name' => 'season[creator_id]',
                                'value' => $searchModel->creator_id,
                                'data' => array_merge(["" => ""], ArrayHelper::map(User::find()->asArray()->all(), 'id', 'username')),
                            ]),
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
// 		    'attribute' => 'active',
// 		],
// 		[
// 		    'attribute' => 'changed',
// 		],
                        ['class' => 'yii\grid\ActionColumn', 'options' => ['style' => 'width:56px;']],
                    ],
                ]);
                ?>

    </div>
</div>