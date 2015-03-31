<?php

use yii\helpers\Html;
use yii\widgets\Breadcrumbs;

/* @var $this yii\web\View */
/* @var $model common\models\player */

$this->title = $model->lastname . ' ' . $model->firstname . ' ' . $model->middlename;
$smallText = 'Редактирование';
$this->params['breadcrumbs'][] = ['label' => 'Игроки', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->lastname . ' ' . $model->firstname, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Редактирование';
?>
<?php include __DIR__ . '/../sub_views/breadcrumbs.php' ?>
<?php if (!Yii::$app->request->isAjax): ?>
    <h1 class="page-header"><?= $this->title ?> <?= isset($smallText) ? yii\helpers\Html::tag('small', $smallText) : '' ?></h1>
<?php endif; ?>

<?=
$this->render('_form', [
    'model' => $model,
])
?>


