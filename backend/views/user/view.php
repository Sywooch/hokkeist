<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\Breadcrumbs;

/* @var $this yii\web\View */
/* @var $model common\models\User */

$this->title = $model->first_name . ' ' . $model->last_name . ' (' . $model->username . ')';
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$smallText = 'Администратор';
?>

<?php include __DIR__ . '/../sub_views/breadcrumbs.php' ?>

<h1 class="page-header"><?= $this->title ?> <?= isset($smallText) ? yii\helpers\Html::tag('small', $smallText) : '' ?></h1>

<div data-sortable-id="ui-general-1" class="panel panel-inverse">
    <div class="panel-heading">
        <?php include __DIR__ . '/../sub_views/edit_del_buttons.php' ?>
        <h4 class="panel-title">Просмотр данных пользователя</h4>
    </div>
    <div class="panel-body">
        <?=
        DetailView::widget([
            'model' => $model,
            'attributes' => [
                'id',
                'username',
                [
                    'attribute' => 'status',
                    'value' => $model->status == 10 ? 'Активный' : 'Не активный',
                    'filter' => Html::dropDownList('user[status]', $searchModel->status, ['10' => 'Активный', '0' => 'Не активный']),
                ],
                'email:email',
                [
                    'attribute' => 'created_at',
                    'format' => 'raw',
                    'value' => Yii::$app->formatter->asDate($model->created_at == '0000-00-00 00:00:00' ? NULL : $model->created_at, 'long'),
                ],
                [
                    'attribute' => 'updated_at',
                    'format' => 'raw',
                    'value' => Yii::$app->formatter->asDate($model->updated_at == '0000-00-00 00:00:00' ? NULL : $model->updated_at, 'long'),
                ],
            ],
        ])
        ?>
    </div>
</div>






