<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\Breadcrumbs;

/* @var $this yii\web\View */
/* @var $model common\models\stadium */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Стадионы', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>

<?php include __DIR__ . '/../sub_views/breadcrumbs.php' ?>

<h1 class="page-header"><?= $this->title ?> <?= isset($smallText) ? yii\helpers\Html::tag('small', $smallText) : '' ?></h1>

<div data-sortable-id="ui-general-1" class="panel panel-inverse">
    <div class="panel-heading">
        <?php include __DIR__ . '/../sub_views/edit_del_buttons.php' ?>
        <h4 class="panel-title">Просмотр</h4>
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
                    'attribute' => 'name',
                ],
                [
                    'attribute' => 'fullname',
                ],
                [
                    'attribute' => 'abbr',
                ],
                [
                    'attribute' => 'city_id',
                    'value' => $model->city->name,
                ],
                [
                    'attribute' => 'address',
                ],
                [
                    'attribute' => 'phone',
                ],
                [
                    'attribute' => 'description',
                    'format' => 'ntext',
                ],
                [
                    'attribute' => 'capacity',
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
                    'attribute' => 'creator_id',
                    'format' => 'raw',
                    'value' => $model->creator->getFullNameWithLogin(true, ['target' => '_blank']),
                ],
                [
                    'attribute' => 'updator_id',
                ],
                [
                    'attribute' => 'status',
                    'value' => $model->statusLabel
                ],
            ],
        ])
        ?>
    </div>
</div>
