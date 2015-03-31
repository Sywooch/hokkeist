<?php

use yii\helpers\Html;
use yii\widgets\Breadcrumbs;

/* @var $this yii\web\View */
/* @var $model common\models\city */

$this->title = 'Добавить новый город';
$this->params['breadcrumbs'][] = ['label' => 'Города', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<?php include __DIR__ . '/../sub_views/breadcrumbs.php' ?>

<?php if (!Yii::$app->request->isAjax): ?>
    <h1 class="page-header"><?= $this->title ?> <?= isset($smallText) ? yii\helpers\Html::tag('small', $smallText) : '' ?></h1>
<?php endif; ?>
    
<?php
$form = $this->render('_form', [
    'model' => $model,
        ])
?>
<?php if (!Yii::$app->request->isAjax): ?>
    <div class="row">
        <div class="col-md-6">
            <div data-sortable-id="ui-general-1" class="panel panel-inverse">
                <div class="panel-heading">
                    <h4 class="panel-title">Новый город</h4>
                </div>
                <div class="panel-body">
    <?= $form ?>
                </div>
            </div>
        </div>
    </div>
    <?php else: ?>
    <div class="tab-content">
    <?= $form ?>
    </div>
<?php endif; ?>