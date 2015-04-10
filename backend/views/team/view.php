<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\Breadcrumbs;

/* @var $this yii\web\View */
/* @var $model common\models\team */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Команды', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

$smallText = $model->status == \common\models\Team::STATUS_ACTIVE ? 'Активна' : 'Помещена в архив';
?>
<?php include __DIR__ . '/../sub_views/breadcrumbs.php' ?>

<h1 class="page-header"><?= $this->title ?> <?= isset($smallText) ? yii\helpers\Html::tag('small', $smallText) : '' ?></h1>


<?php ob_start(); ?>
<div class="row">
    <?php foreach ($model->players as $player): ?>
        <div class="col-lg-6">
            <?= $this->render('_player', ['model' => $player]); ?>
        </div>
    <?php endforeach; ?>
</div>
<?php $players = ob_get_clean() ?>

<?php ob_start(); ?>
<legend>Игры в этом сезоне</legend>
<p>Информация отсутствует</p>
<?php $games = ob_get_clean() ?>


<?php ob_start(); ?>
<legend>Документы команды</legend>
<p>Информация отсутствует</p>
<?php $docs = ob_get_clean() ?>

<?php ob_start(); ?>
<legend>Основная информация 
    <div class="btn-group pull-right">
        <?= Html::a('<i class="fa fa-lg fa-new"></i> Создать новую команду', ['create'], ['class' => 'btn btn-link btn-sm m-r-5']) ?>
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
            <div style="text-align: center; font-size: 26px; color:#ccc; padding-top: 124px;  width: 100%; height: 300px;">Логотип<br/>не загружен</div>
        <?php endif ?>


    </div>
    <div class="col-lg-9">
        <h4>О команде</h4>
        <?= $model->description ? $model->description : '<p><i>Описание отсутствует</i></p>'; ?>
        <?=
        DetailView::widget([
            'model' => $model,
            'attributes' => [
                [
                    'attribute' => 'id',
                ],
                [
                    'attribute' => 'abbr',
                ],
                [
                    'attribute' => 'city_id',
                    'value' => $model->city->name,
                ],
                [
                    'attribute' => 'phone',
                    'visible' => !empty($model->phone),
                ],
                [
                    'attribute' => 'email',
                    'format' => 'email',
                    'visible' => !empty($model->email),
                ],
                [
                    'attribute' => 'site',
                    'visible' => !empty($model->site),
                ],
                [
                    'attribute' => 'site_nhl',
                    'visible' => !empty($model->site_nhl),
                ],
                [
                    'attribute' => 'organization_id',
                    'value' => $model->organization->name,
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
            'label' => 'Игроки',
            'content' => $players,
            'headerOptions' => [],
        ],
        [
            'label' => 'История игр',
            'content' => $games,
            'headerOptions' => [],
        ],
        [
            'label' => 'Документы',
            'content' => $docs,
            'headerOptions' => [],
        ],
        [
            'label' => 'Фотографии',
            'content' => '<legend>Фотографии команды</legend><p>Фотографии отсутствуют</p>',
        ],
    ],
]);
?>
