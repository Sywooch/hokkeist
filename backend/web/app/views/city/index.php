<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Breadcrumbs;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\city */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Cities';
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
        <?= Html::a('Create City', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [

            'id',
            'name',
            'sort',
            'active',
            'created_at',
            // 'updated_at',
            // 'creator',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    
    </div>
</div>