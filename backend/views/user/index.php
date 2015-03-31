<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Breadcrumbs;
use kartik\select2;
use yii\helpers\ArrayHelper;
use common\models\User;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\user */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Пользователи сайта';
$this->params['breadcrumbs'][] = $this->title;
$smallText = 'Те, которые имею доступ в админку в той или иной степени';
Breadcrumbs::widget([
    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
    'options' => ['class' => Yii::$app->params['breadcrumbClass']],
])
?>

<h1 class="page-header"><?= $this->title ?> <?= isset($smallText) ? yii\helpers\Html::tag('small', $smallText) : '' ?></h1>
<!-- begin panel -->
<div class="panel panel-inverse">
    <div class="panel-heading">
        <h4 class="panel-title">Список пользователей сайта</h4>
    </div>
    <div class="panel-body">
        <p class="text-right">
            <?= Html::a('Очистить фильтр поиска', ['index'], ['class' => 'btn btn-link']) ?>  
            <?= Html::a('Создать нового пользователя', ['create'], ['class' => 'btn btn-success']) ?>
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
                    'attribute' => 'username',
                    'format' => 'raw',
                    'value' => function ($model, $index, $widget) {
                        return Html::a($model->username, ['user/view', 'id' => $model->id], ['title' => 'Смотерть карточку пользователя']);
                    },
                        ],
                        [
                            'attribute' => 'first_name',
                            'format' => 'raw',
                            'value' => function ($model, $index, $widget) {
                                return $model->first_name . ' ' . $model->last_name;
                            },
                            'filter' => Html::textInput('user[first_name]', $searchModel->first_name, ['class' => 'form-control']),
                        ],
                        [
                            'attribute' => 'status',
                            'value' => function ($model, $index, $widget) {
                                return $model->status == 10 ? 'Активный' : 'Не активный';
                            },
                            'filter' => Html::dropDownList('user[status]', $searchModel->status, ['10' => 'Активный', '0' => 'Не активный'], ['class' => 'form-control']),
                        ],
                        // 'password_hash',
                        // 'password_reset_token',
                        'email:email',
                        [
                            'attribute' => 'creator_id',
                            'value' => function ($model, $index, $widget) {
                                return $model->creator->fullNameWithLogin;
                            },
                            'filter' => select2\Select2::widget([
                                'name' => 'user[creator_id]',
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
                        ['class' => 'yii\grid\ActionColumn', 'options' => ['style' => 'width:56px;']],
                    ],
                ]);
                ?>

    </div>
</div>


