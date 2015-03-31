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
?>
<?php include __DIR__ . '/../sub_views/breadcrumbs.php' ?>

<h1 class="page-header"><?= $this->title ?> <?= isset($smallText) ? yii\helpers\Html::tag('small', $smallText) : '' ?></h1>

<div data-sortable-id="ui-general-1" class="panel panel-inverse">
    <div class="panel-heading">
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
        <h4 class="panel-title">Просмотр игрока</h4>
    </div>
    <div class="panel-body">

        <?=
        DetailView::widget([
            'model' => $model,
            'attributes' => [
                [
                    'attribute' => 'id',
                ],
                [
                    'attribute' => 'firstname',
                ],
                [
                    'attribute' => 'lastname',
                ],
                [
                    'attribute' => 'middlename',
                ],
                [
                    'attribute' => 'birthday',
                    'format' => 'date',
                ],
                [
                    'attribute' => 'birth_place',
                ],
                [
                    'attribute' => 'height',
                ],
                [
                    'attribute' => 'weight',
                ],
                [
                    'attribute' => 'grip',
                ],
                [
                    'attribute' => 'role',
                ],
                [
                    'attribute' => 'death_date',
                ],
                [
                    'attribute' => 'email',
                    'format' => 'email',
                ],
                [
                    'attribute' => 'phone',
                ],
                [
                    'attribute' => 'pass_serial',
                ],
                [
                    'attribute' => 'pass_number',
                ],
                [
                    'attribute' => 'pass_issue_date',
                ],
                [
                    'attribute' => 'pass_issued',
                ],
                [
                    'attribute' => 'foreign_pass',
                ],
                [
                    'attribute' => 'address',
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
                    'attribute' => 'team_id',
                    'value' => $model->team->name,
                ],
            ],
        ])
        ?>
    </div>
</div>
