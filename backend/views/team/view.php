<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\Breadcrumbs;

/* @var $this yii\web\View */
/* @var $model common\models\team */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Команды', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
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
<legend>Осноная информация 

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
            <div style="border-radius: 50%; text-align: center; font-size: 26px; font-weight: bold; color:#ccc; padding-top: 124px;  width: 100%; height: 300px; background: #fbfbfb; border: 1px dashed #ccc">Логотип</div>
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
                        'attribute' => 'status',
                        'value' => $model->status == 10 ? 'Активный' : 'Не активный',
                    ],
                    [
                        'attribute' => 'name',
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
                    ],
                    [
                        'attribute' => 'email',
                        'format' => 'email',
                    ],
                    [
                        'attribute' => 'site',
                    ],
                    [
                        'attribute' => 'site_nhl',
                    ],
                    [
                        'attribute' => 'description',
                        'format' => 'html',
                    ],
                    [
                        'attribute' => 'sort',
                    ],
                    [
                        'attribute' => 'status',
                        'value' => $model->statusLabel
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
                    [
                        'attribute' => 'organization_id',
                        'value' => $model->organization->name,
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
                'label' => 'Команда',
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
