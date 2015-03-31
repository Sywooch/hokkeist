<?php

use yii\helpers\Html;
use yii\widgets\Breadcrumbs;

/* @var $this yii\web\View */
/* @var $model common\models\stadium */

$this->title = 'Редактирование: ' . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Стадионы', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Редактирование';
?>
<?php include __DIR__ . '/../sub_views/breadcrumbs.php' ?>
<h1 class="page-header"><?= $this->title ?> <?= isset($smallText) ? yii\helpers\Html::tag('small', $smallText) : '' ?></h1>

<?=
$this->render('_form', [
    'model' => $model,
])
?>
