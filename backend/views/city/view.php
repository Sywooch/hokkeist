<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\Breadcrumbs;

/* @var $this yii\web\View */
/* @var $model common\models\city */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Города', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<?php include __DIR__ . '/../sub_views/breadcrumbs.php' ?>

<h1 class="page-header"><?= $this->title ?> <?= isset($smallText) ? yii\helpers\Html::tag('small', $smallText) : '' ?></h1>

<div data-sortable-id="ui-general-1" class="panel panel-inverse">
    <div class="panel-heading">
        <?php include __DIR__ . '/../sub_views/edit_del_buttons.php' ?>
        <h4 class="panel-title">Просмотр города</h4>
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
                    'attribute' => 'sort',
                ],
                [
                    'attribute' => 'status',
                    'value' => $model->statusLabel
                ],
                [
                    'attribute' => 'created_at',
                ],
                [
                    'attribute' => 'updated_at',
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
