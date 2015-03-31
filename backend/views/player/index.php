<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Breadcrumbs;
use yii\helpers\ArrayHelper;
use common\models\City;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\player */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Игроки';
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
        <h4 class="panel-title">Список игроков</h4>
    </div>

    <div class="panel-body">
        <?php // echo $this->render('_search', ['model' => $searchModel]);   ?>

        <p class="text-right">
            <?= Html::a('Очистить фильтр поиска', ['index'], ['class' => 'btn btn-link']) ?>    
            <?= Html::a('Добавить нового игрока', ['create'], ['class' => 'btn btn-success']) ?>
        </p>

        <?=
        GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [

                [
                    'attribute' => 'id_',
                    'options' => ['style' => 'width:70px;'],
                    'header' => Html::a('ID','#', ['data-sort' =>'_id']),
                    'format' => 'html',
                    'filter' => Html::textInput('player[id_]', $searchModel->id_),
                    'value' => function ($model, $index, $widget) {
                            return Html::a($model->id_, ['view', 'id' => $model->id]);
                        },
//                                'sort' => false,
                ],
                [
                    'attribute' => 'lastname',
                ],
                [
                    'attribute' => 'firstname',
                ],
//                [
//                    'attribute' => 'middlename',
//                ],
                [
                    'attribute' => 'birthday',
                    'format' => 'html',
                    'value' => function ($model, $index, $widget) {
                        return Yii::$app->formatter->asDate($model->birthday, 'dd.MM.yyyy') . ' <small>(' . $model->age . ' лет)</small>';
                    },
                ],
// 		[
// 		    'attribute' => 'height',
// 		],
// 		[
// 		    'attribute' => 'weight',
// 		],
                [
                    'attribute' => 'grip',
                    'filter' => Html::dropDownList('player[grip]', $searchModel->role, [ 'Левый' => 'Левый', 'Правый' => 'Правый'], ['class' => 'form-control', 'prompt' => '-- Любой --'])
                ],
                [
                    'attribute' => 'role',
                    'filter' => Html::dropDownList('player[role]', $searchModel->role, [ 'Вратарь' => 'Вратарь', 'Защитник' => 'Защитник', 'Нападающий' => 'Нападающий'], ['class' => 'form-control', 'prompt' => '-- Любой --'])
                ],
// 		[
// 		    'attribute' => 'death_date',
// 		],
// 		[
// 		    'attribute' => 'birth_place',
// 		],
// 		[
// 		    'attribute' => 'email',
// 		    'format' => 'email',
// 		],
// 		[
// 		    'attribute' => 'phone',
// 		],
// 		[
// 		    'attribute' => 'pass_serial',
// 		],
// 		[
// 		    'attribute' => 'pass_number',
// 		],
// 		[
// 		    'attribute' => 'pass_issue_date',
// 		],
// 		[
// 		    'attribute' => 'pass_issued',
// 		],
// 		[
// 		    'attribute' => 'foreign_pass',
// 		],
// 		[
// 		    'attribute' => 'address',
// 		],
                [
                    'attribute' => 'city_id',
                    'value' => function ($model, $index, $widget) {
                        return $model->city->name;
                    },
                    'filter' => Html::dropDownList('player[city_id]', $searchModel->city_id, ArrayHelper::map(City::find()->asArray()->all(), 'id', 'name'), ['class' => 'form-control', 'prompt' => '-- Любой --']),
                ],
// 		[
// 		    'attribute' => 'sort',
// 		    'filter' => false,
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
// 		    'attribute' => 'creator_id',
// 		],
// 		[
// 		    'attribute' => 'updator_id',
// 		],
// 		[
// 		    'attribute' => 'status',
// 		    'value' => function ($model, $index, $widget) {
// 		        return $model->status == 10 ? 'Активный' : 'Не активный';
// 		     },
// 		    'filter' => Html::dropDownList('player[status]', $searchModel->status, ['10' => 'Активный', '0' => 'Не активный']),
// 		],
                [
                    'attribute' => 'team_id',
                    'value' => function ($model, $index, $widget) {
                        return $model->team->name;
                    },
                    'filter' => Html::dropDownList('player[team_id]', $searchModel->team_id, $searchModel->teamList, ['class' => 'form-control', 'prompt' => '-- Любая --']),
                ],
                ['class' => 'yii\grid\ActionColumn', 'options' => ['style' => 'width:56px;']],
            ],
        ]);
        ?>

    </div>
</div>