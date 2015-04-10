<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\Breadcrumbs;

/* @var $this yii\web\View */
/* @var $model common\models\player */

$this->title = $model->lastname . ' ' . $model->firstname . ' ' . $model->middlename;
//$smallText = 'Просмотр';
$this->params['breadcrumbs'][] = ['label' => 'Игроки', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$smallText = $model->status == \common\models\Team::STATUS_ACTIVE ? 'Активен' : 'Помещен в архив';
?>
<?php include __DIR__ . '/../sub_views/breadcrumbs.php' ?>

<h1 class="page-header"><?= $this->title ?> <?= isset($smallText) ? yii\helpers\Html::tag('small', $smallText) : '' ?></h1>

<?php ob_start(); ?>
<legend>Основная информация 
    <div class="btn-group pull-right">
        <?= Html::a('<i class="fa fa-lg fa-plus"></i> Создать нового игрока', ['create'], ['class' => 'btn btn-link btn-sm m-r-5']) ?>
        <?= Html::a('<i class="fa fa-lg fa-edit"></i> Редактировать', ['update', 'id' => $model->id], ['class' => 'btn btn-primary btn-sm m-r-5']) ?>
        <?=
        Html::a('<i class="fa fa-lg fa-trash"></i> Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger btn-sm',
            'data' => [
                'confirm' => 'Вы действительно хотите удалить эту запись?',
                'method' => 'post',
            ],
        ])
        ?>
    </div>
</legend>

<div class="row">
    <div class="col-lg-3">
        <?php
        if (!$model->isNewRecord && $image = $model->getImage('_medium', ['style' => 'max-width:100%'])):
            echo $image;
        else :
            ?>
            <div style="text-align: center; font-size: 26px; color:#ccc; padding-top: 124px;  width: 100%; height: 300px;">Фото<br/>не загружено</div>
        <?php endif ?>


    </div>
    <div class="col-lg-9">
        <?=
        DetailView::widget([
            'model' => $model,
            'attributes' => [
                [
                    'attribute' => 'id',
                ],
                [
                    'attribute' => 'team_id',
                    'value' => Html::a($model->team->name, ['team/view', 'id' => $model->team_id]),
                    'format' => 'html',
                ],
                [
                    'attribute' => 'birthday',
//                    'format' => 'date',
                    'visible' => !empty($model->birthday),
                    'value' =>Yii::$app->formatter->asDate($model->birthday, 'php:d.m.Y'),
                ],
                [
                    'attribute' => 'birth_place',
                    'visible' => !empty($model->birth_place),
                ],
                [
                    'attribute' => 'height',
                    'visible' => !empty($model->height),
                ],
                [
                    'attribute' => 'weight',
                    'visible' => !empty($model->weight),
                ],
                [
                    'attribute' => 'grip',
                    'visible' => !empty($model->grip),
                ],
                [
                    'attribute' => 'role_id',
                    'value' => $model->role->name,
                ],
                [
                    'attribute' => 'death_date',
                    'visible' => !empty($model->death_date),
                ],
                [
                    'attribute' => 'email',
                    'format' => 'email',
                    'visible' => !empty($model->email),
                ],
                [
                    'attribute' => 'phone',
                    'visible' => !empty($model->phone),
                ],
                [
                    'attribute' => 'pass_serial',
                    'label' => 'Паспорт',
                    'visible' => !empty($model->pass_serial),
                    'value' => $model->pass_serial . ' ' . $model->pass_number . ', выдан ' . $model->pass_issued . ' ' . $model->pass_issue_date,
                ],
                
                [
                    'attribute' => 'foreign_pass',
                    'visible' => !empty($model->foreign_pass),
                ],
                [
                    'attribute' => 'address',
                    'visible' => !empty($model->address),
                ],
                [
                    'attribute' => 'city_id',
                    'value' => $model->city->name,
                ],
                [
                    'attribute' => 'created_at',
                    'format' => 'datetime',
                ],
                [
                    'attribute' => 'updated_at',
                    'format' => 'datetime',
                ],
                [
                    'attribute' => 'creator_id',
                    'format' => 'raw',
                    'value' => $model->creator->getFullNameWithLogin(true, ['target' => '_blank']),
                ],
                [
                    'attribute' => 'updator_id',
                    'format' => 'raw',
                    'value' => $model->updator_id ? $model->updator->getFullNameWithLogin(true, ['target' => '_blank']) : NULL,
                ],
            ],
        ])
        ?>

    </div>
</div>
<?php $main = ob_get_clean() ?>

<?php ob_start(); ?>
<legend>Игры в этом сезоне</legend>
<p>Информация отсутствует</p>
<?php $games = ob_get_clean() ?>

<?=
\yii\bootstrap\Tabs::widget([
    'navType' => 'nav-pills',
    'items' => [
        [
            'label' => 'Основное',
            'content' => $main,
            'active' => true
        ],
        [
            'label' => 'История игр',
            'content' => $games,
            'headerOptions' => [],
        ],
//        [
//            'label' => 'Фотографии',
//            'enabled' => false,
//            'content' => '<legend>Фотографии игрока</legend><p>Фотографии отсутствуют</p>',
//        ],
    ],
]);
?>
