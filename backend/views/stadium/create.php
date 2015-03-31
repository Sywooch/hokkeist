<?php

use yii\helpers\Html;
use yii\widgets\Breadcrumbs;

/* @var $this yii\web\View */
/* @var $model common\models\stadium */

$this->title = 'Добавление нового стадиона';
$this->params['breadcrumbs'][] = ['label' => 'Stadia', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
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


